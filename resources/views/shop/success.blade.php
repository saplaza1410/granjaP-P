@extends('layouts.public')
@section('title', 'Pedido Confirmado')

@push('styles')
<style>
    @keyframes scaleIn {
        from { opacity:0; transform:scale(0.5); }
        to   { opacity:1; transform:scale(1); }
    }
    @keyframes bounceIn {
        0%   { opacity:0; transform:scale(0.3); }
        50%  { opacity:1; transform:scale(1.08); }
        70%  { transform:scale(0.95); }
        100% { transform:scale(1); }
    }
    .success-circle { animation: bounceIn 0.7s cubic-bezier(0.36, 0.07, 0.19, 0.97) forwards; }
    .step-card { transition: transform 0.2s; }
    .step-card:hover { transform: translateY(-3px); }
</style>
@endpush

@section('content')

{{-- ============================
     HERO DE ÉXITO
     ============================ --}}
<div style="background:linear-gradient(135deg, #1a4731 0%, #2d6a4f 60%, #52b788 100%); padding:3.5rem 1.5rem 3rem; text-align:center;">
    {{-- Círculo animado --}}
    <div class="success-circle"
         style="width:96px; height:96px; background:#fff; border-radius:50%; display:inline-flex; align-items:center; justify-content:center; font-size:3rem; margin-bottom:1.5rem; box-shadow:0 8px 32px rgba(0,0,0,0.2);">
        ✅
    </div>

    <h1 class="font-display fade-in" style="color:#fff; font-size:2.4rem; margin-bottom:0.75rem; line-height:1.2;">
        ¡Pedido Recibido!
    </h1>

    <p class="fade-in" style="color:#c8e6c9; font-size:1.05rem; max-width:480px; margin:0 auto 1.5rem; line-height:1.6;">
        Gracias <strong style="color:#fff;">{{ $order->customer_name }}</strong>,
        te contactaremos pronto por WhatsApp para confirmar tu pedido.
    </p>

    {{-- Número de pedido --}}
    <div class="fade-in" style="display:inline-block; background:rgba(255,255,255,0.15); border:2px solid rgba(255,255,255,0.4); border-radius:12px; padding:0.75rem 2rem; backdrop-filter:blur(4px);">
        <div style="color:#95d5b2; font-size:0.78rem; font-weight:700; text-transform:uppercase; letter-spacing:1px; margin-bottom:0.2rem;">
            Número de pedido
        </div>
        <div class="font-display" style="color:#fff; font-size:1.8rem; font-weight:700; letter-spacing:1px;">
            # {{ $order->order_number }}
        </div>
    </div>
</div>

<div style="max-width:780px; margin:0 auto; padding:2.5rem 1.5rem;">

    {{-- ============================
         RESUMEN DEL PEDIDO
         ============================ --}}
    <div style="background:#fff; border-radius:16px; box-shadow:0 4px 24px rgba(0,0,0,0.08); border:1px solid #e8f5e9; overflow:hidden; margin-bottom:2rem;">

        {{-- Cabecera --}}
        <div style="background:#f0faf5; padding:1.25rem 1.5rem; border-bottom:1px solid #e8f5e9; display:flex; justify-content:space-between; align-items:center;">
            <h2 class="font-display" style="color:#1a4731; font-size:1.15rem; margin:0;">
                Resumen de tu pedido
            </h2>
            <span style="font-size:0.82rem; color:#888;">
                {{ $order->created_at->format('d/m/Y · H:i') ?? '' }}
            </span>
        </div>

        {{-- Tabla de items --}}
        <div style="padding:0 1.5rem;">
            <table style="width:100%; border-collapse:collapse;">
                <thead>
                    <tr style="border-bottom:1px solid #f0f9f4;">
                        <th style="padding:0.75rem 0; text-align:left; font-size:0.78rem; color:#888; font-weight:700; text-transform:uppercase; letter-spacing:0.5px;">Producto</th>
                        <th style="padding:0.75rem 0; text-align:center; font-size:0.78rem; color:#888; font-weight:700; text-transform:uppercase; letter-spacing:0.5px; width:70px;">Cant.</th>
                        <th style="padding:0.75rem 0; text-align:right; font-size:0.78rem; color:#888; font-weight:700; text-transform:uppercase; letter-spacing:0.5px; width:110px;">Precio</th>
                        <th style="padding:0.75rem 0; text-align:right; font-size:0.78rem; color:#888; font-weight:700; text-transform:uppercase; letter-spacing:0.5px; width:110px;">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $item)
                    <tr style="border-bottom:1px solid #f5faf7;">
                        <td style="padding:0.85rem 0; display:flex; align-items:center; gap:0.6rem;">
                            <span style="font-size:1.5rem;">{{ $item->emoji ?? '📦' }}</span>
                            <span style="font-size:0.9rem; color:#1a4731; font-weight:600;">{{ $item->product_name ?? $item->name }}</span>
                        </td>
                        <td style="padding:0.85rem 0; text-align:center; font-size:0.9rem; color:#555;">
                            {{ $item->quantity }}
                        </td>
                        <td style="padding:0.85rem 0; text-align:right; font-size:0.9rem; color:#555;">
                            ${{ number_format($item->unit_price ?? $item->price, 0, ',', '.') }}
                        </td>
                        <td style="padding:0.85rem 0; text-align:right; font-size:0.9rem; font-weight:700; color:#2d6a4f;">
                            ${{ number_format(($item->unit_price ?? $item->price) * $item->quantity, 0, ',', '.') }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Totales --}}
        <div style="padding:1.25rem 1.5rem; border-top:2px solid #e8f5e9; background:#f8fdfb;">
            <div style="display:flex; justify-content:space-between; font-size:0.9rem; margin-bottom:0.5rem;">
                <span style="color:#555;">Subtotal productos</span>
                <span style="font-weight:600; color:#333;">${{ number_format($order->subtotal ?? $order->total_amount, 0, ',', '.') }} COP</span>
            </div>
            @if(isset($order->delivery_method) && $order->delivery_method === 'delivery')
            <div style="display:flex; justify-content:space-between; font-size:0.9rem; margin-bottom:0.5rem;">
                <span style="color:#555;">Envío a domicilio</span>
                <span style="font-weight:600; color:#333;">$5.000 COP</span>
            </div>
            @endif
            <div style="display:flex; justify-content:space-between; align-items:center; padding-top:0.75rem; border-top:1px dashed #c8e6c9; margin-top:0.5rem;">
                <span style="font-weight:800; color:#1a4731; font-size:1rem;">TOTAL</span>
                <span style="font-weight:800; color:#2d6a4f; font-size:1.4rem;">
                    ${{ number_format($order->total_amount, 0, ',', '.') }} COP
                </span>
            </div>
        </div>

        {{-- Info de entrega --}}
        <div style="padding:1.25rem 1.5rem; border-top:1px solid #e8f5e9; display:flex; gap:2rem; flex-wrap:wrap; font-size:0.88rem;">
            <div>
                <div style="color:#888; font-size:0.78rem; text-transform:uppercase; font-weight:700; margin-bottom:0.25rem;">Método de entrega</div>
                <div style="color:#1a4731; font-weight:600;">
                    @if(isset($order->delivery_method) && $order->delivery_method === 'delivery')
                        🚚 Domicilio en Planeta Rica
                    @else
                        🏪 Recogida en finca
                    @endif
                </div>
            </div>
            @if(isset($order->delivery_method) && $order->delivery_method === 'delivery' && $order->delivery_address)
            <div>
                <div style="color:#888; font-size:0.78rem; text-transform:uppercase; font-weight:700; margin-bottom:0.25rem;">Dirección</div>
                <div style="color:#1a4731; font-weight:600;">{{ $order->delivery_address }}</div>
            </div>
            @endif
            @if($order->customer_phone)
            <div>
                <div style="color:#888; font-size:0.78rem; text-transform:uppercase; font-weight:700; margin-bottom:0.25rem;">Teléfono de contacto</div>
                <div style="color:#1a4731; font-weight:600;">{{ $order->customer_phone }}</div>
            </div>
            @endif
        </div>

    </div>

    {{-- ============================
         QUÉ SIGUE
         ============================ --}}
    <div style="margin-bottom:2.5rem;">
        <h2 class="font-display" style="color:#1a4731; font-size:1.25rem; text-align:center; margin-bottom:1.5rem;">
            ¿Qué sigue?
        </h2>
        <div style="display:grid; grid-template-columns:repeat(3, 1fr); gap:1rem;">

            <div class="step-card" style="background:#fff; border-radius:12px; padding:1.5rem 1rem; text-align:center; box-shadow:0 2px 12px rgba(0,0,0,0.06); border:1px solid #e8f5e9;">
                <div style="font-size:2.5rem; margin-bottom:0.75rem;">📱</div>
                <div style="background:#e8f5e9; color:#2d6a4f; font-size:0.7rem; font-weight:800; padding:2px 10px; border-radius:99px; display:inline-block; margin-bottom:0.5rem; text-transform:uppercase; letter-spacing:0.5px;">Paso 1</div>
                <p style="font-size:0.85rem; color:#444; line-height:1.5; margin:0;">
                    Te llamamos o escribimos por WhatsApp en los próximos <strong>30 minutos</strong> para confirmar tu pedido.
                </p>
            </div>

            <div class="step-card" style="background:#fff; border-radius:12px; padding:1.5rem 1rem; text-align:center; box-shadow:0 2px 12px rgba(0,0,0,0.06); border:1px solid #e8f5e9;">
                <div style="font-size:2.5rem; margin-bottom:0.75rem;">✅</div>
                <div style="background:#e8f5e9; color:#2d6a4f; font-size:0.7rem; font-weight:800; padding:2px 10px; border-radius:99px; display:inline-block; margin-bottom:0.5rem; text-transform:uppercase; letter-spacing:0.5px;">Paso 2</div>
                <p style="font-size:0.85rem; color:#444; line-height:1.5; margin:0;">
                    Cuando tu pedido esté <strong>listo</strong>, te avisamos para coordinar la entrega o recogida.
                </p>
            </div>

            <div class="step-card" style="background:#fff; border-radius:12px; padding:1.5rem 1rem; text-align:center; box-shadow:0 2px 12px rgba(0,0,0,0.06); border:1px solid #e8f5e9;">
                <div style="font-size:2.5rem; margin-bottom:0.75rem;">🚚</div>
                <div style="background:#e8f5e9; color:#2d6a4f; font-size:0.7rem; font-weight:800; padding:2px 10px; border-radius:99px; display:inline-block; margin-bottom:0.5rem; text-transform:uppercase; letter-spacing:0.5px;">Paso 3</div>
                <p style="font-size:0.85rem; color:#444; line-height:1.5; margin:0;">
                    Recibes tu pedido <strong>fresco del día</strong>, directo de la granja a tu mesa.
                </p>
            </div>

        </div>
    </div>

    {{-- ============================
         BOTONES DE ACCIÓN
         ============================ --}}
    @php
        $waText = urlencode("Hola, acabo de hacer el pedido #{$order->order_number} por un total de $" . number_format($order->total_amount, 0, ',', '.') . " COP. ¿Pueden confirmarlo?");
    @endphp

    <div style="display:flex; gap:1rem; justify-content:center; flex-wrap:wrap;">
        <a href="/tienda" class="btn-outline" style="font-size:0.95rem; padding:0.75rem 1.75rem;">
            Hacer otro pedido →
        </a>
        <a href="https://wa.me/57XXXXXXXXXX?text={{ $waText }}"
           target="_blank"
           style="background:#25d366; color:#fff; padding:0.75rem 1.75rem; border-radius:8px; font-weight:700; font-size:0.95rem; text-decoration:none; display:inline-flex; align-items:center; gap:0.5rem; transition:background 0.2s;"
           onmouseover="this.style.background='#1ebe5a'" onmouseout="this.style.background='#25d366'">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
            </svg>
            Escribir por WhatsApp
        </a>
    </div>

</div>

@endsection
