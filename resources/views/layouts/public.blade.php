<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Granja Planeta Rica') · Granja Planeta Rica</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        farm: {
                            dark: '#1a4731',
                            medium: '#2d6a4f',
                            light: '#52b788',
                            mint: '#95d5b2',
                            cream: '#fdf6ec',
                            earth: '#8b5e3c',
                            sun: '#f4a261',
                        }
                    },
                    fontFamily: {
                        serif: ['Playfair Display', 'serif'],
                        sans: ['Lato', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Lato', sans-serif; background: #fdf6ec; color: #1a1a1a; }
        .font-display { font-family: 'Playfair Display', serif; }
        /* Animación fade-in */
        @keyframes fadeInUp { from { opacity:0; transform:translateY(20px); } to { opacity:1; transform:translateY(0); } }
        .fade-in { animation: fadeInUp 0.5s ease forwards; }
        /* Badge */
        .badge-cat { display:inline-block; padding:2px 10px; border-radius:99px; font-size:0.75rem; font-weight:600; }
        /* Card hover */
        .product-card { transition: transform 0.2s, box-shadow 0.2s; }
        .product-card:hover { transform: translateY(-4px); box-shadow: 0 12px 32px rgba(0,0,0,0.12); }
        /* Button */
        .btn-green { background:#2d6a4f; color:#fff; padding:0.6rem 1.5rem; border-radius:8px; font-weight:700; transition:background 0.2s; cursor:pointer; border:none; display:inline-block; text-decoration:none; }
        .btn-green:hover { background:#1a4731; }
        .btn-outline { border:2px solid #2d6a4f; color:#2d6a4f; padding:0.55rem 1.4rem; border-radius:8px; font-weight:700; transition:all 0.2s; cursor:pointer; background:transparent; display:inline-block; text-decoration:none; }
        .btn-outline:hover { background:#2d6a4f; color:#fff; }
        /* Number input */
        .qty-input { width:60px; text-align:center; border:1px solid #ccc; border-radius:6px; padding:4px; }
        /* Scrollbar bonito */
        ::-webkit-scrollbar { width: 6px; } ::-webkit-scrollbar-track { background: #f1f1f1; } ::-webkit-scrollbar-thumb { background: #52b788; border-radius: 3px; }
    </style>
    @stack('styles')
</head>
<body>
    <!-- NAVBAR -->
    <nav style="background:#1a4731; position:sticky; top:0; z-index:50; box-shadow:0 2px 8px rgba(0,0,0,0.2);">
        <div style="max-width:1200px; margin:0 auto; padding:0.75rem 1.5rem; display:flex; align-items:center; justify-content:space-between;">
            <a href="/" style="text-decoration:none; display:flex; align-items:center; gap:0.5rem;">
                <span style="font-size:1.5rem;">🌿</span>
                <span class="font-display" style="color:#fff; font-size:1.1rem; font-weight:700; letter-spacing:0.5px;">GRANJA PLANETA RICA</span>
            </a>
            <div style="display:flex; align-items:center; gap:1.5rem;">
                <a href="/" style="color:#95d5b2; text-decoration:none; font-size:0.9rem; font-weight:600; transition:color 0.2s;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='#95d5b2'">Inicio</a>
                <a href="/tienda" style="color:#95d5b2; text-decoration:none; font-size:0.9rem; font-weight:600;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='#95d5b2'">Tienda</a>
                <a href="/#nuestra-granja" style="color:#95d5b2; text-decoration:none; font-size:0.9rem; font-weight:600;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='#95d5b2'">La Granja</a>
                <a href="/tienda/carrito" style="color:#fff; text-decoration:none; font-size:0.9rem; font-weight:700; background:#f4a261; padding:0.4rem 1rem; border-radius:99px; display:flex; align-items:center; gap:0.4rem;" onmouseover="this.style.background='#e8925a'" onmouseout="this.style.background='#f4a261'">
                    🛒
                    Carrito
                    @php $cartCount = collect(session('cart', []))->sum('quantity'); @endphp
                    @if($cartCount > 0)
                        <span style="background:#fff; color:#1a4731; border-radius:99px; font-size:0.7rem; font-weight:800; padding:1px 7px; min-width:20px; text-align:center;">{{ $cartCount }}</span>
                    @endif
                </a>
            </div>
        </div>
    </nav>

    <!-- FLASH MESSAGES -->
    @if(session('cart_success'))
    <div style="background:#d1fae5; border-left:4px solid #10b981; padding:1rem 1.5rem; max-width:1200px; margin:1rem auto;">
        {{ session('cart_success') }}
    </div>
    @endif
    @if(session('cart_error'))
    <div style="background:#fee2e2; border-left:4px solid #ef4444; padding:1rem 1.5rem; max-width:1200px; margin:1rem auto;">
        {{ session('cart_error') }}
    </div>
    @endif

    <!-- CONTENIDO -->
    <main>
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer style="background:#1a4731; color:#95d5b2; padding:2rem 1.5rem; margin-top:4rem;">
        <div style="max-width:1200px; margin:0 auto; display:grid; grid-template-columns:1fr 1fr; gap:2rem;">
            <div>
                <div class="font-display" style="color:#fff; font-size:1.1rem; margin-bottom:1rem;">🌿 Granja Planeta Rica</div>
                <p style="font-size:0.9rem; line-height:1.7;">
                    📍 Planeta Rica, Córdoba, Colombia<br>
                    📱 WhatsApp: <a href="https://wa.me/57XXXXXXXXXX" style="color:#52b788; text-decoration:none;">+57 [número]</a><br>
                    🕐 Lunes a Sábado · 6:00 am - 6:00 pm
                </p>
            </div>
            <div>
                <div style="font-weight:700; color:#fff; margin-bottom:1rem;">Navegación</div>
                <div style="display:flex; flex-direction:column; gap:0.5rem; font-size:0.9rem;">
                    <a href="/" style="color:#95d5b2; text-decoration:none;">Inicio</a>
                    <a href="/tienda" style="color:#95d5b2; text-decoration:none;">Tienda</a>
                    <a href="/tienda/carrito" style="color:#95d5b2; text-decoration:none;">Carrito</a>
                    <a href="/admin" style="color:#52b788; text-decoration:none; font-size:0.8rem; margin-top:0.5rem;">Panel de administración →</a>
                </div>
            </div>
        </div>
        <div style="border-top:1px solid #2d6a4f; margin-top:2rem; padding-top:1rem; text-align:center; font-size:0.8rem; color:#52b788;">
            © 2026 Granja Planeta Rica · Todos los derechos reservados · Hecho con 💚 en Colombia
        </div>
    </footer>

    <!-- WhatsApp Float -->
    <a href="https://wa.me/57XXXXXXXXXX?text=Hola%2C%20quiero%20hacer%20un%20pedido"
       style="position:fixed; bottom:1.5rem; right:1.5rem; background:#25d366; color:#fff; border-radius:50%; width:56px; height:56px; display:flex; align-items:center; justify-content:center; box-shadow:0 4px 16px rgba(37,211,102,0.4); text-decoration:none; transition:transform 0.2s, box-shadow 0.2s; z-index:100;"
       title="Escríbenos por WhatsApp"
       onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
        <svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
        </svg>
    </a>

    @stack('scripts')
</body>
</html>
