@extends('layouts.public')
@section('title', 'Confirmar Pedido')

@section('content')

{{-- ============================
     HEADER CHECKOUT
     ============================ --}}
<div style="background:linear-gradient(135deg, #1a4731 0%, #2d6a4f 100%); padding:2.5rem 1.5rem 2rem;">
    <div style="max-width:1200px; margin:0 auto;">
        {{-- Breadcrumb --}}
        <nav style="font-size:0.82rem; color:#95d5b2; margin-bottom:1rem;">
            <a href="/" style="color:#95d5b2; text-decoration:none;">Inicio</a>
            <span style="margin:0 0.4rem; color:#52b788;">/</span>
            <a href="/tienda" style="color:#95d5b2; text-decoration:none;">Tienda</a>
            <span style="margin:0 0.4rem; color:#52b788;">/</span>
            <a href="/tienda/carrito" style="color:#95d5b2; text-decoration:none;">Carrito</a>
            <span style="margin:0 0.4rem; color:#52b788;">/</span>
            <span style="color:#fff;">Confirmar</span>
        </nav>
        <h1 class="font-display" style="color:#fff; font-size:2rem; margin-bottom:0;">
            Confirmar Pedido
        </h1>
    </div>
</div>

<div style="max-width:1200px; margin:0 auto; padding:2rem 1.5rem;">

    {{-- Indicador de progreso --}}
    <div style="display:flex; align-items:center; justify-content:center; gap:0; margin-bottom:2.5rem;">
        <div style="display:flex; flex-direction:column; align-items:center; gap:0.3rem;">
            <div style="width:32px; height:32px; border-radius:50%; background:#c8e6c9; color:#1a4731; display:flex; align-items:center; justify-content:center; font-weight:800; font-size:0.85rem;">✓</div>
            <span style="font-size:0.75rem; color:#52b788; font-weight:600;">Carrito</span>
        </div>
        <div style="width:60px; height:2px; background:#c8e6c9; margin-bottom:1.2rem;"></div>
        <div style="display:flex; flex-direction:column; align-items:center; gap:0.3rem;">
            <div style="width:32px; height:32px; border-radius:50%; background:#2d6a4f; color:#fff; display:flex; align-items:center; justify-content:center; font-weight:800; font-size:0.85rem;">2</div>
            <span style="font-size:0.75rem; color:#2d6a4f; font-weight:700;">Confirmar</span>
        </div>
        <div style="width:60px; height:2px; background:#e0e0e0; margin-bottom:1.2rem;"></div>
        <div style="display:flex; flex-direction:column; align-items:center; gap:0.3rem;">
            <div style="width:32px; height:32px; border-radius:50%; background:#e8f5e9; color:#999; display:flex; align-items:center; justify-content:center; font-weight:800; font-size:0.85rem;">3</div>
            <span style="font-size:0.75rem; color:#999;">Listo</span>
        </div>
    </div>

    {{-- ============================
         LAYOUT DOS COLUMNAS
         ============================ --}}
    <div style="display:grid; grid-template-columns:1fr 340px; gap:2rem; align-items:start;">

        {{-- ======= COLUMNA IZQUIERDA: FORMULARIO ======= --}}
        <div>
            <form action="/tienda/pedido" method="POST" id="checkout-form">
                @csrf

                {{-- ---- SECCIÓN 1: TUS DATOS ---- --}}
                <div style="background:#fff; border-radius:12px; padding:1.75rem; box-shadow:0 2px 16px rgba(0,0,0,0.06); border:1px solid #e8f5e9; margin-bottom:1.5rem;">

                    <h2 style="font-size:1.05rem; font-weight:800; color:#1a4731; margin-bottom:1.5rem; display:flex; align-items:center; gap:0.5rem;">
                        <span style="background:#e8f5e9; color:#2d6a4f; width:28px; height:28px; border-radius:50%; display:inline-flex; align-items:center; justify-content:center; font-size:0.85rem;">1</span>
                        Tus datos de contacto
                    </h2>

                    {{-- Nombre --}}
                    <div style="margin-bottom:1.25rem;">
                        <label style="display:block; font-weight:700; color:#333; font-size:0.88rem; margin-bottom:0.4rem;">
                            Nombre completo <span style="color:#ef4444;">*</span>
                        </label>
                        <input type="text"
                               name="customer_name"
                               value="{{ old('customer_name') }}"
                               placeholder="Ej: María García López"
                               required
                               style="width:100%; padding:0.65rem 0.9rem; border:1px solid {{ $errors->has('customer_name') ? '#ef4444' : '#ddd' }}; border-radius:8px; font-size:0.95rem; box-sizing:border-box; transition:border-color 0.2s; outline:none; background:#fafafa;"
                               onfocus="this.style.borderColor='#2d6a4f'" onblur="this.style.borderColor='{{ $errors->has('customer_name') ? '#ef4444' : '#ddd' }}'">
                        @error('customer_name')
                        <p style="color:#ef4444; font-size:0.8rem; margin-top:0.3rem;">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Teléfono --}}
                    <div style="margin-bottom:1.25rem;">
                        <label style="display:block; font-weight:700; color:#333; font-size:0.88rem; margin-bottom:0.4rem;">
                            Teléfono / WhatsApp <span style="color:#ef4444;">*</span>
                        </label>
                        <input type="tel"
                               name="customer_phone"
                               value="{{ old('customer_phone') }}"
                               placeholder="+57 300 000 0000"
                               required
                               style="width:100%; padding:0.65rem 0.9rem; border:1px solid {{ $errors->has('customer_phone') ? '#ef4444' : '#ddd' }}; border-radius:8px; font-size:0.95rem; box-sizing:border-box; outline:none; background:#fafafa;"
                               onfocus="this.style.borderColor='#2d6a4f'" onblur="this.style.borderColor='{{ $errors->has('customer_phone') ? '#ef4444' : '#ddd' }}'">
                        @error('customer_phone')
                        <p style="color:#ef4444; font-size:0.8rem; margin-top:0.3rem;">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Email (opcional) --}}
                    <div>
                        <label style="display:block; font-weight:700; color:#333; font-size:0.88rem; margin-bottom:0.4rem;">
                            Correo electrónico <span style="color:#999; font-weight:400;">(opcional)</span>
                        </label>
                        <input type="email"
                               name="customer_email"
                               value="{{ old('customer_email') }}"
                               placeholder="correo@ejemplo.com"
                               style="width:100%; padding:0.65rem 0.9rem; border:1px solid {{ $errors->has('customer_email') ? '#ef4444' : '#ddd' }}; border-radius:8px; font-size:0.95rem; box-sizing:border-box; outline:none; background:#fafafa;"
                               onfocus="this.style.borderColor='#2d6a4f'" onblur="this.style.borderColor='#ddd'">
                        @error('customer_email')
                        <p style="color:#ef4444; font-size:0.8rem; margin-top:0.3rem;">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                {{-- ---- SECCIÓN 2: ENTREGA ---- --}}
                <div style="background:#fff; border-radius:12px; padding:1.75rem; box-shadow:0 2px 16px rgba(0,0,0,0.06); border:1px solid #e8f5e9; margin-bottom:1.5rem;">

                    <h2 style="font-size:1.05rem; font-weight:800; color:#1a4731; margin-bottom:1.5rem; display:flex; align-items:center; gap:0.5rem;">
                        <span style="background:#e8f5e9; color:#2d6a4f; width:28px; height:28px; border-radius:50%; display:inline-flex; align-items:center; justify-content:center; font-size:0.85rem;">2</span>
                        Método de entrega
                    </h2>

                    @error('delivery_method')
                    <p style="color:#ef4444; font-size:0.8rem; margin-bottom:1rem; background:#fee2e2; padding:0.5rem 0.75rem; border-radius:6px;">{{ $message }}</p>
                    @enderror

                    {{-- Opción: Recogida en finca --}}
                    <label for="delivery_pickup"
                           style="display:flex; gap:1rem; padding:1rem 1.25rem; border:2px solid #ddd; border-radius:10px; cursor:pointer; margin-bottom:0.75rem; transition:border-color 0.2s; align-items:flex-start;"
                           id="label_pickup">
                        <input type="radio"
                               name="delivery_method"
                               id="delivery_pickup"
                               value="pickup"
                               {{ old('delivery_method', 'pickup') == 'pickup' ? 'checked' : '' }}
                               style="margin-top:3px; accent-color:#2d6a4f; width:18px; height:18px;"
                               onchange="toggleDelivery(this.value)">
                        <div style="flex:1;">
                            <div style="font-weight:700; color:#1a4731; font-size:0.95rem; margin-bottom:0.25rem;">
                                🏪 Recogida en finca
                                <span style="background:#dcfce7; color:#166534; font-size:0.72rem; padding:2px 8px; border-radius:99px; margin-left:0.4rem; font-weight:700;">GRATIS</span>
                            </div>
                            <div style="font-size:0.83rem; color:#666; line-height:1.5;">
                                Lunes a Sábado · 6:00 am – 6:00 pm<br>
                                📍 Planeta Rica, Córdoba
                            </div>
                        </div>
                    </label>

                    {{-- Opción: Domicilio --}}
                    <label for="delivery_home"
                           style="display:flex; gap:1rem; padding:1rem 1.25rem; border:2px solid #ddd; border-radius:10px; cursor:pointer; transition:border-color 0.2s; align-items:flex-start;"
                           id="label_home">
                        <input type="radio"
                               name="delivery_method"
                               id="delivery_home"
                               value="delivery"
                               {{ old('delivery_method') == 'delivery' ? 'checked' : '' }}
                               style="margin-top:3px; accent-color:#2d6a4f; width:18px; height:18px;"
                               onchange="toggleDelivery(this.value)">
                        <div style="flex:1;">
                            <div style="font-weight:700; color:#1a4731; font-size:0.95rem; margin-bottom:0.25rem;">
                                🚚 Domicilio en Planeta Rica
                                <span style="background:#fff9c4; color:#713f12; font-size:0.72rem; padding:2px 8px; border-radius:99px; margin-left:0.4rem; font-weight:700;">+$5.000 COP</span>
                            </div>
                            <div style="font-size:0.83rem; color:#666; line-height:1.5;">
                                Coordinaremos dirección y horario contigo
                            </div>
                        </div>
                    </label>

                    {{-- Campo dirección (oculto por defecto) --}}
                    <div id="address-field" style="margin-top:1rem; display:{{ old('delivery_method') == 'delivery' ? 'block' : 'none' }};">
                        <label style="display:block; font-weight:700; color:#333; font-size:0.88rem; margin-bottom:0.4rem;">
                            Dirección de entrega <span style="color:#ef4444;">*</span>
                        </label>
                        <input type="text"
                               name="delivery_address"
                               id="delivery_address"
                               value="{{ old('delivery_address') }}"
                               placeholder="Calle, barrio, referencia…"
                               style="width:100%; padding:0.65rem 0.9rem; border:1px solid {{ $errors->has('delivery_address') ? '#ef4444' : '#ddd' }}; border-radius:8px; font-size:0.95rem; box-sizing:border-box; outline:none; background:#fafafa;"
                               onfocus="this.style.borderColor='#2d6a4f'" onblur="this.style.borderColor='#ddd'">
                        @error('delivery_address')
                        <p style="color:#ef4444; font-size:0.8rem; margin-top:0.3rem;">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                {{-- ---- SECCIÓN 3: NOTAS ---- --}}
                <div style="background:#fff; border-radius:12px; padding:1.75rem; box-shadow:0 2px 16px rgba(0,0,0,0.06); border:1px solid #e8f5e9; margin-bottom:1.75rem;">

                    <h2 style="font-size:1.05rem; font-weight:800; color:#1a4731; margin-bottom:1.25rem; display:flex; align-items:center; gap:0.5rem;">
                        <span style="background:#e8f5e9; color:#2d6a4f; width:28px; height:28px; border-radius:50%; display:inline-flex; align-items:center; justify-content:center; font-size:0.85rem;">3</span>
                        Notas adicionales <span style="color:#999; font-weight:400; font-size:0.85rem;">(opcional)</span>
                    </h2>

                    <textarea name="notes"
                              rows="3"
                              placeholder="¿Alguna indicación especial para tu pedido? (horario, referencias, preferencias…)"
                              style="width:100%; padding:0.65rem 0.9rem; border:1px solid #ddd; border-radius:8px; font-size:0.9rem; box-sizing:border-box; resize:vertical; min-height:90px; outline:none; font-family:inherit; background:#fafafa;"
                              onfocus="this.style.borderColor='#2d6a4f'" onblur="this.style.borderColor='#ddd'">{{ old('notes') }}</textarea>

                </div>

                {{-- BOTÓN SUBMIT --}}
                <button type="submit" class="btn-green"
                        style="width:100%; font-size:1.1rem; padding:1rem; border-radius:12px; text-align:center; display:block; letter-spacing:0.3px;">
                    ✅ Confirmar Pedido
                </button>

                <p style="text-align:center; color:#888; font-size:0.8rem; margin-top:0.75rem;">
                    Al confirmar, recibirás un número de pedido y te contactaremos por WhatsApp.
                </p>

            </form>
        </div>

        {{-- ======= COLUMNA DERECHA: RESUMEN ======= --}}
        <div style="position:sticky; top:80px;">
            <div style="background:linear-gradient(135deg, #f0faf5, #e8f5e9); border-radius:12px; padding:1.5rem; border:1px solid #c8e6c9; box-shadow:0 2px 16px rgba(0,0,0,0.06);">

                <h2 class="font-display" style="color:#1a4731; font-size:1.15rem; margin-bottom:1.25rem; padding-bottom:0.75rem; border-bottom:1px solid #c8e6c9;">
                    Tu pedido
                </h2>

                {{-- Lista de items --}}
                <div style="display:flex; flex-direction:column; gap:0.75rem; margin-bottom:1.25rem;">
                    @foreach($cart as $productId => $item)
                    <div style="display:flex; justify-content:space-between; align-items:center; font-size:0.88rem;">
                        <div style="display:flex; align-items:center; gap:0.5rem; flex:1; min-width:0;">
                            <span>{{ $item['emoji'] ?? '📦' }}</span>
                            <span style="color:#333; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">{{ $item['name'] }}</span>
                            <span style="color:#999; white-space:nowrap; font-size:0.8rem;">× {{ $item['quantity'] }}</span>
                        </div>
                        <span style="font-weight:700; color:#2d6a4f; white-space:nowrap; margin-left:0.75rem;">
                            ${{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}
                        </span>
                    </div>
                    @endforeach
                </div>

                {{-- Línea separadora --}}
                <div style="border-top:1px dashed #c8e6c9; margin-bottom:1.25rem;"></div>

                {{-- Subtotal --}}
                <div style="display:flex; justify-content:space-between; font-size:0.9rem; margin-bottom:0.5rem;">
                    <span style="color:#555;">Subtotal</span>
                    <span style="font-weight:600; color:#1a4731;">${{ number_format($subtotal, 0, ',', '.') }} COP</span>
                </div>

                {{-- Envío --}}
                <div style="display:flex; justify-content:space-between; font-size:0.9rem; margin-bottom:1rem;" id="summary-shipping">
                    <span style="color:#555;">Envío</span>
                    <span style="color:#888; font-size:0.85rem;" id="shipping-label">Gratis (recogida)</span>
                </div>

                {{-- Total --}}
                <div style="background:#fff; border-radius:8px; padding:1rem; border:1px solid #c8e6c9;">
                    <div style="display:flex; justify-content:space-between; align-items:center;">
                        <span style="font-weight:800; color:#1a4731; font-size:0.95rem;">Total</span>
                        <span style="font-weight:800; color:#2d6a4f; font-size:1.35rem;" id="total-display">
                            ${{ number_format($subtotal, 0, ',', '.') }} COP
                        </span>
                    </div>
                </div>

                {{-- Garantías --}}
                <div style="margin-top:1.25rem; display:flex; flex-direction:column; gap:0.5rem; font-size:0.8rem; color:#555;">
                    <div style="display:flex; align-items:center; gap:0.5rem;">
                        <span>🌿</span><span>Producto fresco y natural</span>
                    </div>
                    <div style="display:flex; align-items:center; gap:0.5rem;">
                        <span>📱</span><span>Confirmación por WhatsApp</span>
                    </div>
                    <div style="display:flex; align-items:center; gap:0.5rem;">
                        <span>🔒</span><span>Sin pago anticipado requerido</span>
                    </div>
                </div>

            </div>
        </div>

    </div>{{-- fin grid --}}

</div>

@endsection

@push('scripts')
<script>
    const subtotal = {{ $subtotal }};
    const shippingCost = 5000;

    function formatCOP(n) {
        return '$' + Math.round(n).toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.') + ' COP';
    }

    function toggleDelivery(value) {
        const addressField = document.getElementById('address-field');
        const shippingLabel = document.getElementById('shipping-label');
        const totalDisplay = document.getElementById('total-display');
        const labelPickup = document.getElementById('label_pickup');
        const labelHome = document.getElementById('label_home');

        if (value === 'delivery') {
            addressField.style.display = 'block';
            document.getElementById('delivery_address').setAttribute('required', 'required');
            shippingLabel.textContent = '+$5.000 COP';
            totalDisplay.textContent = formatCOP(subtotal + shippingCost);
            if (labelHome) labelHome.style.borderColor = '#2d6a4f';
            if (labelPickup) labelPickup.style.borderColor = '#ddd';
        } else {
            addressField.style.display = 'none';
            document.getElementById('delivery_address').removeAttribute('required');
            shippingLabel.textContent = 'Gratis (recogida)';
            totalDisplay.textContent = formatCOP(subtotal);
            if (labelPickup) labelPickup.style.borderColor = '#2d6a4f';
            if (labelHome) labelHome.style.borderColor = '#ddd';
        }
    }

    // Inicializar según el valor seleccionado (para old() en errores de validación)
    document.addEventListener('DOMContentLoaded', function () {
        const selected = document.querySelector('input[name="delivery_method"]:checked');
        if (selected) {
            toggleDelivery(selected.value);
        }
    });
</script>
@endpush
