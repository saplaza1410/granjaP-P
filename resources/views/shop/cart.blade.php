@extends('layouts.public')
@section('title', 'Mi Carrito')

@section('content')

{{-- ============================
     HEADER DEL CARRITO
     ============================ --}}
<div style="background:linear-gradient(135deg, #1a4731 0%, #2d6a4f 100%); padding:2.5rem 1.5rem 2rem;">
    <div style="max-width:1200px; margin:0 auto;">
        {{-- Breadcrumb --}}
        <nav style="font-size:0.82rem; color:#95d5b2; margin-bottom:1rem;">
            <a href="/" style="color:#95d5b2; text-decoration:none;">Inicio</a>
            <span style="margin:0 0.4rem; color:#52b788;">/</span>
            <a href="/tienda" style="color:#95d5b2; text-decoration:none;">Tienda</a>
            <span style="margin:0 0.4rem; color:#52b788;">/</span>
            <span style="color:#fff;">Carrito</span>
        </nav>
        <h1 class="font-display" style="color:#fff; font-size:2rem; margin-bottom:0;">
            🛒 Mi Carrito
        </h1>
    </div>
</div>

<div style="max-width:1200px; margin:0 auto; padding:2rem 1.5rem;">

    @if(empty($cart))

    {{-- ============================
         CARRITO VACÍO
         ============================ --}}
    <div style="text-align:center; padding:4rem 1rem; background:#fff; border-radius:16px; box-shadow:0 2px 16px rgba(0,0,0,0.06); border:1px solid #e8f5e9;">
        <div style="font-size:5rem; margin-bottom:1.5rem;">🛒</div>
        <h2 class="font-display" style="color:#1a4731; font-size:1.6rem; margin-bottom:0.75rem;">
            Tu carrito está vacío
        </h2>
        <p style="color:#666; font-size:1rem; margin-bottom:2rem;">
            Explora nuestro catálogo y agrega productos frescos de la granja.
        </p>
        <a href="/tienda" class="btn-green" style="font-size:1rem; padding:0.75rem 2rem;">
            Ver productos →
        </a>
    </div>

    @else

    {{-- ============================
         LAYOUT DOS COLUMNAS
         ============================ --}}
    <div style="display:grid; grid-template-columns:1fr 340px; gap:2rem; align-items:start;">

        {{-- ======= COLUMNA IZQUIERDA: ITEMS ======= --}}
        <div>
            <div style="background:#fff; border-radius:12px; box-shadow:0 2px 16px rgba(0,0,0,0.06); border:1px solid #e8f5e9; overflow:hidden;">

                {{-- Cabecera tabla --}}
                <div style="background:#f8fdfb; padding:1rem 1.5rem; border-bottom:1px solid #e8f5e9; display:grid; grid-template-columns:1fr auto auto auto; gap:1rem; align-items:center;">
                    <span style="font-size:0.82rem; font-weight:700; color:#666; text-transform:uppercase; letter-spacing:0.5px;">Producto</span>
                    <span style="font-size:0.82rem; font-weight:700; color:#666; text-transform:uppercase; letter-spacing:0.5px; text-align:center; min-width:70px;">Precio</span>
                    <span style="font-size:0.82rem; font-weight:700; color:#666; text-transform:uppercase; letter-spacing:0.5px; text-align:center; min-width:90px;">Cantidad</span>
                    <span style="font-size:0.82rem; font-weight:700; color:#666; text-transform:uppercase; letter-spacing:0.5px; text-align:right; min-width:90px;">Subtotal</span>
                </div>

                {{-- Items del carrito --}}
                @foreach($cart as $productId => $item)
                <div style="padding:1.25rem 1.5rem; border-bottom:1px solid #f0f9f4; display:grid; grid-template-columns:1fr auto auto auto; gap:1rem; align-items:center;">

                    {{-- Producto: emoji + nombre --}}
                    <div style="display:flex; align-items:center; gap:0.75rem;">
                        <span style="font-size:2rem;">{{ $item['emoji'] ?? '📦' }}</span>
                        <div>
                            <div style="font-weight:700; color:#1a4731; font-size:0.95rem;">{{ $item['name'] }}</div>
                            <div style="font-size:0.78rem; color:#999;">por {{ $item['unit'] ?? 'unidad' }}</div>
                        </div>
                    </div>

                    {{-- Precio unitario --}}
                    <div style="text-align:center; min-width:70px; color:#555; font-size:0.9rem;">
                        ${{ number_format($item['price'], 0, ',', '.') }}
                    </div>

                    {{-- Cantidad con formulario de actualización --}}
                    <div style="text-align:center; min-width:90px;">
                        <form action="/tienda/carrito/actualizar" method="POST" style="display:flex; align-items:center; gap:0.25rem;">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $productId }}">
                            <input type="number"
                                   name="quantity"
                                   value="{{ $item['quantity'] }}"
                                   min="{{ $item['min_order'] ?? 1 }}"
                                   max="999"
                                   style="width:55px; text-align:center; border:1px solid #ccc; border-radius:6px; padding:5px; font-size:0.88rem;"
                                   onchange="this.form.submit()">
                        </form>
                    </div>

                    {{-- Subtotal + botón eliminar --}}
                    <div style="text-align:right; min-width:90px; display:flex; align-items:center; justify-content:flex-end; gap:0.75rem;">
                        <span style="font-weight:800; color:#2d6a4f; font-size:0.95rem;">
                            ${{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}
                        </span>
                        <a href="/tienda/carrito/eliminar/{{ $productId }}"
                           title="Eliminar del carrito"
                           onclick="return confirm('¿Eliminar este producto del carrito?')"
                           style="color:#ef4444; text-decoration:none; font-size:1.1rem; line-height:1; display:inline-flex; align-items:center;">
                            🗑️
                        </a>
                    </div>

                </div>
                @endforeach

                {{-- Pie: seguir comprando --}}
                <div style="padding:1rem 1.5rem; background:#f8fdfb; display:flex; align-items:center; justify-content:space-between;">
                    <a href="/tienda" style="color:#2d6a4f; text-decoration:none; font-size:0.88rem; font-weight:600; display:inline-flex; align-items:center; gap:0.3rem;">
                        ← Seguir comprando
                    </a>
                    <span style="font-size:0.82rem; color:#999;">
                        {{ collect($cart)->sum('quantity') }} {{ collect($cart)->sum('quantity') == 1 ? 'producto' : 'productos' }} en el carrito
                    </span>
                </div>
            </div>
        </div>

        {{-- ======= COLUMNA DERECHA: RESUMEN ======= --}}
        <div style="position:sticky; top:80px;">
            <div style="background:linear-gradient(135deg, #f0faf5, #e8f5e9); border-radius:12px; padding:1.5rem; border:1px solid #c8e6c9; box-shadow:0 2px 16px rgba(0,0,0,0.06);">

                <h2 class="font-display" style="color:#1a4731; font-size:1.2rem; margin-bottom:1.5rem; padding-bottom:0.75rem; border-bottom:1px solid #c8e6c9;">
                    Resumen del pedido
                </h2>

                {{-- Desglose --}}
                <div style="display:flex; flex-direction:column; gap:0.6rem; margin-bottom:1.25rem; font-size:0.92rem;">
                    <div style="display:flex; justify-content:space-between;">
                        <span style="color:#555;">Subtotal</span>
                        <span style="font-weight:600; color:#1a4731;">${{ number_format($total, 0, ',', '.') }} COP</span>
                    </div>
                    <div style="display:flex; justify-content:space-between;">
                        <span style="color:#555;">Envío a domicilio</span>
                        <span style="color:#888; font-size:0.85rem;">Se calcula al pedir</span>
                    </div>
                </div>

                {{-- Total --}}
                <div style="background:#fff; border-radius:8px; padding:1rem; margin-bottom:1.5rem; border:1px solid #c8e6c9;">
                    <div style="display:flex; justify-content:space-between; align-items:center;">
                        <span style="font-weight:800; color:#1a4731; font-size:1rem;">Total estimado</span>
                        <span style="font-weight:800; color:#2d6a4f; font-size:1.4rem;">${{ number_format($total, 0, ',', '.') }} COP</span>
                    </div>
                    <p style="font-size:0.75rem; color:#888; margin-top:0.4rem;">
                        * El envío se suma si eliges domicilio (+$5.000)
                    </p>
                </div>

                {{-- Botón continuar --}}
                <a href="/tienda/pedido" class="btn-green" style="width:100%; text-align:center; font-size:1rem; padding:0.85rem 1rem; display:block; box-sizing:border-box; border-radius:10px;">
                    Continuar con el pedido →
                </a>

                <div style="text-align:center; margin-top:1rem;">
                    <a href="/tienda" style="color:#2d6a4f; text-decoration:none; font-size:0.85rem; font-weight:600;">
                        ← Seguir comprando
                    </a>
                </div>

                {{-- Info adicional --}}
                <div style="margin-top:1.5rem; padding-top:1.25rem; border-top:1px solid #c8e6c9; display:flex; flex-direction:column; gap:0.5rem; font-size:0.8rem; color:#555;">
                    <div style="display:flex; align-items:center; gap:0.5rem;">
                        <span>🌿</span>
                        <span>Producto fresco de la granja</span>
                    </div>
                    <div style="display:flex; align-items:center; gap:0.5rem;">
                        <span>📱</span>
                        <span>Te confirmamos por WhatsApp</span>
                    </div>
                    <div style="display:flex; align-items:center; gap:0.5rem;">
                        <span>🚚</span>
                        <span>Recogida o domicilio en Planeta Rica</span>
                    </div>
                </div>
            </div>
        </div>

    </div>{{-- fin grid --}}

    @endif

</div>

@endsection
