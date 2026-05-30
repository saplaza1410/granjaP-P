<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $products = Product::where('is_available', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get()
            ->groupBy('category');

        $featured = Product::where('is_available', true)
            ->where('is_featured', true)
            ->orderBy('sort_order')
            ->get();

        return view('shop.index', compact('products', 'featured'));
    }

    public function addToCart(Request $request, Product $product)
    {
        $quantity = max(1, (int) $request->input('quantity', 1));
        $quantity = max($quantity, $product->min_order);

        $cart = session('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $quantity;
        } else {
            $cart[$product->id] = [
                'product_id' => $product->id,
                'name'       => $product->name,
                'emoji'      => $product->emoji,
                'price'      => (float) $product->price,
                'unit'       => $product->unit,
                'quantity'   => $quantity,
            ];
        }

        session(['cart' => $cart]);

        return redirect()->back()->with('cart_success', "✅ {$product->emoji} {$product->name} agregado al carrito.");
    }

    public function cart()
    {
        $cart  = session('cart', []);
        $total = collect($cart)->sum(fn ($item) => $item['price'] * $item['quantity']);
        return view('shop.cart', compact('cart', 'total'));
    }

    public function updateCart(Request $request)
    {
        $cart       = session('cart', []);
        $quantities = $request->input('quantities', []);

        foreach ($quantities as $productId => $qty) {
            $qty = (int) $qty;
            if ($qty <= 0) {
                unset($cart[$productId]);
            } else {
                if (isset($cart[$productId])) {
                    $cart[$productId]['quantity'] = $qty;
                }
            }
        }

        session(['cart' => $cart]);
        return redirect()->route('shop.cart')->with('cart_success', 'Carrito actualizado.');
    }

    public function removeFromCart(int $productId)
    {
        $cart = session('cart', []);
        unset($cart[$productId]);
        session(['cart' => $cart]);
        return redirect()->route('shop.cart')->with('cart_success', 'Producto eliminado del carrito.');
    }

    public function checkout()
    {
        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->route('shop.index')->with('cart_error', 'Tu carrito está vacío.');
        }
        $subtotal = collect($cart)->sum(fn ($item) => $item['price'] * $item['quantity']);
        return view('shop.checkout', compact('cart', 'subtotal'));
    }

    public function placeOrder(Request $request)
    {
        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->route('shop.index');
        }

        $validated = $request->validate([
            'customer_name'    => 'required|string|max:120',
            'customer_phone'   => 'required|string|max:20',
            'customer_email'   => 'nullable|email|max:120',
            'customer_address' => 'nullable|string|max:300',
            'delivery_method'  => 'required|in:domicilio,recogida',
            'customer_notes'   => 'nullable|string|max:500',
        ]);

        $subtotal    = collect($cart)->sum(fn ($item) => $item['price'] * $item['quantity']);
        $deliveryFee = $validated['delivery_method'] === 'domicilio' ? 5000 : 0;
        $total       = $subtotal + $deliveryFee;

        $order = Order::create([
            'order_number'     => Order::generateOrderNumber(),
            'customer_name'    => $validated['customer_name'],
            'customer_phone'   => $validated['customer_phone'],
            'customer_email'   => $validated['customer_email'],
            'customer_address' => $validated['customer_address'],
            'delivery_method'  => $validated['delivery_method'],
            'status'           => 'pendiente',
            'subtotal'         => $subtotal,
            'delivery_fee'     => $deliveryFee,
            'total'            => $total,
            'customer_notes'   => $validated['customer_notes'],
        ]);

        foreach ($cart as $item) {
            OrderItem::create([
                'order_id'     => $order->id,
                'product_id'   => $item['product_id'],
                'product_name' => $item['name'],
                'product_unit' => $item['unit'],
                'unit_price'   => $item['price'],
                'quantity'     => $item['quantity'],
                'subtotal'     => $item['price'] * $item['quantity'],
            ]);
        }

        session()->forget('cart');

        return redirect()->route('shop.success', $order)->with('order_success', true);
    }

    public function success(Order $order)
    {
        return view('shop.success', compact('order'));
    }
}
