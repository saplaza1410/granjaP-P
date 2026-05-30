<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Granja Planeta Rica · Productos Frescos</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700;900&family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">

    <!-- Tailwind CSS Play CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'verde-oscuro': '#1a4731',
                        'verde-medio': '#2d6a4f',
                        'verde-claro': '#52b788',
                        'verde-menta': '#95d5b2',
                        tierra: '#8b5e3c',
                        crema: '#fdf6ec',
                        sol: '#f4a261',
                        whatsapp: '#25d366',
                    },
                    fontFamily: {
                        playfair: ['"Playfair Display"', 'serif'],
                        lato: ['Lato', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <style>
        :root {
            --verde-oscuro: #1a4731;
            --verde-medio: #2d6a4f;
            --verde-claro: #52b788;
            --verde-menta: #95d5b2;
            --tierra: #8b5e3c;
            --crema: #fdf6ec;
            --sol: #f4a261;
            --whatsapp: #25d366;
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'Lato', sans-serif;
            background: var(--crema);
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        /* ===== ANIMACIONES ===== */
        @keyframes bounceArrow {
            0%, 100% { transform: translateX(-50%) translateY(0); animation-timing-function: cubic-bezier(0.8,0,1,1); }
            50% { transform: translateX(-50%) translateY(-12px); animation-timing-function: cubic-bezier(0,0,0.2,1); }
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes floatAnim {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-8px); }
        }

        @keyframes pulseRing {
            0% { transform: scale(1); opacity: 1; }
            100% { transform: scale(1.5); opacity: 0; }
        }

        .hero-content { animation: fadeInUp 1s ease both; }
        .animate-float-card { animation: floatAnim 4s ease-in-out infinite; }

        .fade-in-section {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.7s ease, transform 0.7s ease;
        }
        .fade-in-section.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* ===== NAVBAR ===== */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            background: var(--verde-oscuro);
            padding: 0 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 70px;
            box-shadow: 0 2px 20px rgba(0,0,0,0.3);
            transition: box-shadow 0.3s;
        }

        .navbar-logo {
            font-family: 'Playfair Display', serif;
            font-size: 1.2rem;
            font-weight: 700;
            color: #fff;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            white-space: nowrap;
            flex-shrink: 0;
        }

        .navbar-links {
            display: flex;
            align-items: center;
            gap: 2rem;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .navbar-links a {
            color: rgba(255,255,255,0.85);
            text-decoration: none;
            font-size: 0.95rem;
            font-weight: 400;
            transition: color 0.2s, border-bottom-color 0.2s;
            padding-bottom: 2px;
            border-bottom: 2px solid transparent;
        }

        .navbar-links a:hover {
            color: #fff;
            border-bottom-color: var(--verde-menta);
        }

        .btn-pedir {
            background: var(--sol);
            color: #1a2e0a;
            font-weight: 700;
            padding: 0.55rem 1.4rem;
            border-radius: 999px;
            text-decoration: none;
            font-size: 0.9rem;
            transition: filter 0.2s, transform 0.2s;
            white-space: nowrap;
            flex-shrink: 0;
        }
        .btn-pedir:hover { filter: brightness(1.1); transform: scale(1.04); }

        .hamburger {
            display: none;
            flex-direction: column;
            gap: 5px;
            cursor: pointer;
            padding: 4px;
            background: none;
            border: none;
        }
        .hamburger span {
            display: block;
            width: 24px;
            height: 2px;
            background: #fff;
            border-radius: 2px;
            transition: all 0.3s;
        }

        .mobile-menu {
            display: none;
            position: fixed;
            top: 70px;
            left: 0;
            right: 0;
            background: var(--verde-oscuro);
            padding: 1rem 1.5rem;
            z-index: 999;
            border-top: 1px solid rgba(255,255,255,0.1);
            flex-direction: column;
            gap: 0.5rem;
        }
        .mobile-menu.open { display: flex; }
        .mobile-menu a {
            color: rgba(255,255,255,0.85);
            text-decoration: none;
            font-size: 1rem;
            padding: 0.6rem 0;
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }
        .mobile-menu a:hover { color: #fff; }
        .mobile-menu .btn-pedir-mobile {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            align-self: flex-start;
            margin-top: 0.5rem;
            background: var(--sol);
            color: #1a2e0a;
            font-weight: 700;
            padding: 0.55rem 1.4rem;
            border-radius: 999px;
            text-decoration: none;
            font-size: 0.9rem;
            border-bottom: none;
        }

        @media (max-width: 768px) {
            .hamburger { display: flex; }
            .navbar-links-wrapper { display: none; }
        }

        /* ===== HERO ===== */
        .hero {
            min-height: 100vh;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background: linear-gradient(160deg, #1a4731 0%, #2d6a4f 40%, #52b788 80%, #95d5b2 100%);
            padding-top: 70px;
        }

        .hero-svg-bg {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
        }

        .hero-content {
            position: relative;
            z-index: 10;
            text-align: center;
            padding: 2rem 1.5rem;
            max-width: 820px;
        }

        .hero-badge {
            display: inline-block;
            background: rgba(255,255,255,0.15);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.3);
            color: #fff;
            font-size: 0.82rem;
            font-weight: 700;
            padding: 0.4rem 1.2rem;
            border-radius: 999px;
            margin-bottom: 1.5rem;
            letter-spacing: 0.05em;
            text-transform: uppercase;
        }

        .hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2.8rem, 7vw, 5.5rem);
            font-weight: 900;
            color: #fff;
            line-height: 1.05;
            margin: 0 0 0.5rem;
            text-shadow: 0 2px 20px rgba(0,0,0,0.3);
        }

        .hero-subtitle {
            font-family: 'Playfair Display', serif;
            font-size: clamp(1rem, 2.5vw, 1.35rem);
            color: var(--verde-menta);
            font-style: italic;
            margin-bottom: 1.3rem;
        }

        .hero-desc {
            color: rgba(255,255,255,0.88);
            font-size: 1rem;
            max-width: 560px;
            margin: 0 auto 2.2rem;
            line-height: 1.75;
        }

        .hero-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-hero-primary {
            background: #fff;
            color: var(--verde-oscuro);
            font-weight: 700;
            padding: 0.88rem 2rem;
            border-radius: 999px;
            text-decoration: none;
            font-size: 1rem;
            transition: filter 0.2s, transform 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
        }
        .btn-hero-primary:hover { filter: brightness(0.95); transform: translateY(-2px); }

        .btn-hero-whatsapp {
            background: var(--whatsapp);
            color: #fff;
            font-weight: 700;
            padding: 0.88rem 2rem;
            border-radius: 999px;
            text-decoration: none;
            font-size: 1rem;
            transition: filter 0.2s, transform 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        .btn-hero-whatsapp:hover { filter: brightness(1.1); transform: translateY(-2px); }

        .hero-arrow {
            position: absolute;
            bottom: 2rem;
            left: 50%;
            transform: translateX(-50%);
            color: rgba(255,255,255,0.7);
            animation: bounceArrow 2s infinite;
            cursor: pointer;
        }

        /* ===== STATS BAR ===== */
        .stats-bar {
            background: var(--verde-medio);
            padding: 2.8rem 1.5rem;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.5rem;
            max-width: 960px;
            margin: 0 auto;
            text-align: center;
        }

        .stat-item .stat-number {
            font-family: 'Playfair Display', serif;
            font-size: 2.2rem;
            font-weight: 900;
            color: #fff;
            display: block;
        }
        .stat-item .stat-emoji { font-size: 2rem; display: block; margin-bottom: 0.3rem; }
        .stat-item .stat-label {
            font-size: 0.88rem;
            color: var(--verde-menta);
            font-weight: 600;
            letter-spacing: 0.03em;
        }

        @media (max-width: 640px) {
            .stats-grid { grid-template-columns: repeat(2, 1fr); gap: 2rem; }
        }

        /* ===== PRODUCTOS ===== */
        .products-section {
            background: #fff;
            padding: 5rem 1.5rem;
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(1.8rem, 4vw, 2.8rem);
            font-weight: 700;
            color: var(--verde-oscuro);
            text-align: center;
            margin-bottom: 0.5rem;
        }

        .section-line {
            width: 60px;
            height: 4px;
            background: var(--verde-claro);
            border-radius: 2px;
            margin: 0.5rem auto 1rem;
        }

        .section-subtitle {
            text-align: center;
            color: #666;
            font-size: 1.05rem;
            margin-bottom: 3rem;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
            max-width: 1100px;
            margin: 0 auto;
        }

        @media (max-width: 900px) { .products-grid { grid-template-columns: repeat(2, 1fr); } }
        @media (max-width: 560px) { .products-grid { grid-template-columns: 1fr; max-width: 400px; } }

        .product-card {
            background: #fff;
            border-radius: 14px;
            box-shadow: 0 3px 15px rgba(0,0,0,0.08);
            padding: 2rem 1.3rem 1.5rem;
            text-align: center;
            position: relative;
            overflow: hidden;
            transition: transform 0.25s, box-shadow 0.25s;
            border: 1px solid #f0ebe2;
        }

        .product-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 32px rgba(26,71,49,0.15);
        }

        .product-emoji {
            font-size: 4rem;
            display: block;
            margin-bottom: 0.8rem;
        }

        .product-name {
            font-family: 'Playfair Display', serif;
            font-size: 1.15rem;
            font-weight: 700;
            color: var(--verde-oscuro);
            margin-bottom: 0.4rem;
        }

        .product-price {
            color: var(--tierra);
            font-weight: 700;
            font-size: 1rem;
            margin-bottom: 1.2rem;
        }

        .btn-add-cart {
            background: var(--verde-claro);
            color: #fff;
            border: none;
            padding: 0.6rem 1.4rem;
            border-radius: 999px;
            font-size: 0.9rem;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: filter 0.2s, transform 0.2s;
        }
        .btn-add-cart:hover { filter: brightness(1.1); transform: scale(1.04); }

        .ribbon-destacado {
            position: absolute;
            top: 16px;
            right: -30px;
            background: var(--sol);
            color: #1a2e0a;
            font-size: 0.62rem;
            font-weight: 900;
            padding: 0.25rem 2.8rem;
            transform: rotate(35deg);
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .btn-ver-todos {
            display: block;
            text-align: center;
            margin: 2.8rem auto 0;
            background: var(--verde-oscuro);
            color: #fff;
            font-weight: 700;
            padding: 0.9rem 2.5rem;
            border-radius: 999px;
            text-decoration: none;
            max-width: fit-content;
            font-size: 1rem;
            transition: filter 0.2s, transform 0.2s;
        }
        .btn-ver-todos:hover { filter: brightness(1.15); transform: translateY(-2px); }

        /* ===== NUESTRA GRANJA ===== */
        .granja-section {
            background: var(--crema);
            padding: 5.5rem 1.5rem;
        }

        .granja-inner {
            max-width: 1100px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }

        @media (max-width: 768px) {
            .granja-inner { grid-template-columns: 1fr; gap: 2.5rem; }
        }

        .granja-tag {
            display: inline-block;
            background: var(--verde-menta);
            color: var(--verde-oscuro);
            font-size: 0.8rem;
            font-weight: 700;
            padding: 0.3rem 0.9rem;
            border-radius: 999px;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            margin-bottom: 1rem;
        }

        .granja-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(1.6rem, 3vw, 2.4rem);
            font-weight: 700;
            color: var(--verde-oscuro);
            margin-bottom: 1.2rem;
            line-height: 1.2;
        }

        .granja-desc {
            color: #555;
            line-height: 1.8;
            margin-bottom: 1.5rem;
        }

        .granja-list {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            gap: 0.7rem;
        }

        .granja-list li {
            color: #444;
            font-size: 0.95rem;
            display: flex;
            align-items: flex-start;
            gap: 0.5rem;
            line-height: 1.5;
        }

        /* ===== CÓMO PEDIR ===== */
        .como-pedir-section {
            background: var(--crema);
            padding: 6rem 1.5rem 5rem;
            position: relative;
        }

        .pasos-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            max-width: 960px;
            margin: 0 auto;
        }

        @media (max-width: 640px) { .pasos-grid { grid-template-columns: 1fr; max-width: 400px; } }

        .paso-card {
            text-align: center;
            padding: 2.2rem 1.5rem;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 3px 18px rgba(0,0,0,0.06);
            transition: transform 0.25s, box-shadow 0.25s;
        }
        .paso-card:hover { transform: translateY(-4px); box-shadow: 0 10px 28px rgba(26,71,49,0.12); }

        .paso-numero {
            width: 52px;
            height: 52px;
            background: var(--verde-oscuro);
            color: #fff;
            font-family: 'Playfair Display', serif;
            font-size: 1.4rem;
            font-weight: 900;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 0.9rem;
        }

        .paso-emoji { font-size: 2.5rem; margin-bottom: 0.8rem; display: block; }

        .paso-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--verde-oscuro);
            margin-bottom: 0.6rem;
        }

        .paso-desc { color: #666; font-size: 0.9rem; line-height: 1.65; }

        /* ===== POR QUÉ ELEGIRNOS ===== */
        .why-section {
            background: var(--verde-oscuro);
            padding: 5.5rem 1.5rem;
        }

        .why-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(1.8rem, 4vw, 2.8rem);
            font-weight: 700;
            color: #fff;
            text-align: center;
            margin-bottom: 0.5rem;
        }

        .why-line {
            width: 60px;
            height: 4px;
            background: var(--verde-claro);
            border-radius: 2px;
            margin: 0.5rem auto 3rem;
        }

        .why-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
            max-width: 1000px;
            margin: 0 auto;
        }

        @media (max-width: 640px) { .why-grid { grid-template-columns: 1fr; } }

        .why-card {
            background: rgba(255,255,255,0.07);
            border: 1px solid rgba(255,255,255,0.12);
            border-radius: 16px;
            padding: 2.2rem 1.5rem;
            text-align: center;
            transition: background 0.25s, transform 0.25s;
        }
        .why-card:hover { background: rgba(255,255,255,0.12); transform: translateY(-4px); }

        .why-emoji { font-size: 2.8rem; display: block; margin-bottom: 1rem; }

        .why-card-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.15rem;
            font-weight: 700;
            color: #fff;
            margin-bottom: 0.6rem;
        }

        .why-card-desc { color: rgba(255,255,255,0.72); font-size: 0.9rem; line-height: 1.7; }

        /* ===== CONTACTO / FOOTER ===== */
        .contact-section {
            background: var(--verde-medio);
            padding: 5.5rem 1.5rem;
        }

        .contact-inner {
            max-width: 1100px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3.5rem;
            align-items: start;
        }

        @media (max-width: 768px) { .contact-inner { grid-template-columns: 1fr; } }

        .contact-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            font-weight: 700;
            color: #fff;
            margin-bottom: 1.8rem;
        }

        .contact-item {
            display: flex;
            align-items: flex-start;
            gap: 0.9rem;
            margin-bottom: 1.3rem;
        }
        .contact-item .c-icon { font-size: 1.5rem; flex-shrink: 0; margin-top: 0.1rem; }
        .contact-item .c-label { color: var(--verde-menta); font-size: 0.78rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; }
        .contact-item .c-value { color: #fff; font-size: 0.95rem; margin-top: 0.2rem; }
        .contact-item a { color: var(--verde-menta); text-decoration: none; }
        .contact-item a:hover { color: #fff; }

        .map-placeholder {
            background: rgba(255,255,255,0.06);
            border-radius: 14px;
            overflow: hidden;
            border: 1px solid rgba(255,255,255,0.15);
        }

        .footer-bottom {
            background: #0d2218;
            padding: 1.3rem 1.5rem;
            text-align: center;
        }
        .footer-bottom p { color: rgba(255,255,255,0.48); font-size: 0.85rem; margin: 0; }

        .footer-admin-link {
            color: rgba(255,255,255,0.32);
            text-decoration: none;
            font-size: 0.78rem;
            margin-left: 1rem;
        }
        .footer-admin-link:hover { color: rgba(255,255,255,0.6); }

        /* ===== BOTÓN FLOTANTE WHATSAPP ===== */
        .whatsapp-float {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            width: 62px;
            height: 62px;
            background: var(--whatsapp);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 20px rgba(37,211,102,0.4);
            z-index: 9999;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
            text-decoration: none;
        }
        .whatsapp-float:hover {
            transform: scale(1.12);
            box-shadow: 0 6px 30px rgba(37,211,102,0.58);
        }
        .whatsapp-float::before {
            content: '';
            position: absolute;
            width: 62px;
            height: 62px;
            border-radius: 50%;
            background: var(--whatsapp);
            animation: pulseRing 2.2s ease-out infinite;
            z-index: -1;
        }

        .whatsapp-tooltip {
            position: absolute;
            right: 72px;
            background: rgba(0,0,0,0.75);
            color: #fff;
            font-size: 0.78rem;
            padding: 0.4rem 0.85rem;
            border-radius: 6px;
            white-space: nowrap;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.2s;
        }
        .whatsapp-float:hover .whatsapp-tooltip { opacity: 1; }

        /* ===== WAVE ===== */
        .wave-divider {
            display: block;
            width: 100%;
            overflow: hidden;
            line-height: 0;
        }
    </style>
</head>
<body>

<!-- ===== NAVBAR ===== -->
<nav class="navbar">
    <a href="/" class="navbar-logo">
        🌿 GRANJA PLANETA RICA
    </a>

    <div class="navbar-links-wrapper" style="display:flex;align-items:center;gap:2.5rem;">
        <ul class="navbar-links">
            <li><a href="/">Inicio</a></li>
            <li><a href="/tienda">Tienda</a></li>
            <li><a href="#nuestra-granja">Nuestra Granja</a></li>
            <li><a href="#contacto">Contacto</a></li>
        </ul>
        <a href="/tienda" class="btn-pedir">🛒 Pedir Ahora</a>
    </div>

    <button class="hamburger" id="hamburger" aria-label="Abrir menú" type="button">
        <span></span>
        <span></span>
        <span></span>
    </button>
</nav>

<!-- Menú Mobile -->
<div class="mobile-menu" id="mobileMenu">
    <a href="/">Inicio</a>
    <a href="/tienda">Tienda</a>
    <a href="#nuestra-granja">Nuestra Granja</a>
    <a href="#contacto">Contacto</a>
    <a href="/tienda" class="btn-pedir-mobile">🛒 Pedir Ahora</a>
</div>


<!-- ===== HERO ===== -->
<section class="hero" id="inicio">
    <!-- SVG decorativo de fondo -->
    <svg class="hero-svg-bg" viewBox="0 0 1440 900" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" aria-hidden="true">
        <!-- Nubes -->
        <ellipse cx="200" cy="105" rx="82" ry="29" fill="rgba(255,255,255,0.11)"/>
        <ellipse cx="242" cy="94" rx="62" ry="22" fill="rgba(255,255,255,0.11)"/>
        <ellipse cx="158" cy="110" rx="52" ry="19" fill="rgba(255,255,255,0.09)"/>

        <ellipse cx="1100" cy="82" rx="90" ry="30" fill="rgba(255,255,255,0.09)"/>
        <ellipse cx="1152" cy="72" rx="66" ry="23" fill="rgba(255,255,255,0.08)"/>
        <ellipse cx="1060" cy="90" rx="56" ry="19" fill="rgba(255,255,255,0.07)"/>

        <!-- Sol con rayos -->
        <circle cx="1280" cy="145" r="58" fill="rgba(244,162,97,0.5)"/>
        <circle cx="1280" cy="145" r="42" fill="rgba(244,162,97,0.68)"/>
        <g stroke="rgba(244,162,97,0.42)" stroke-width="3" stroke-linecap="round">
            <line x1="1280" y1="72" x2="1280" y2="50"/>
            <line x1="1330" y1="95" x2="1345" y2="80"/>
            <line x1="1353" y1="145" x2="1375" y2="145"/>
            <line x1="1330" y1="195" x2="1345" y2="210"/>
            <line x1="1280" y1="218" x2="1280" y2="240"/>
            <line x1="1230" y1="195" x2="1215" y2="210"/>
            <line x1="1207" y1="145" x2="1185" y2="145"/>
            <line x1="1230" y1="95" x2="1215" y2="80"/>
        </g>

        <!-- Pájaros -->
        <path d="M400 185 Q410 175 420 185 Q430 175 440 185" fill="none" stroke="rgba(255,255,255,0.48)" stroke-width="2.5" stroke-linecap="round"/>
        <path d="M462 162 Q470 154 478 162 Q486 154 494 162" fill="none" stroke="rgba(255,255,255,0.38)" stroke-width="2" stroke-linecap="round"/>
        <path d="M522 195 Q529 188 536 195 Q543 188 550 195" fill="none" stroke="rgba(255,255,255,0.34)" stroke-width="2" stroke-linecap="round"/>
        <path d="M872 155 Q880 147 888 155 Q896 147 904 155" fill="none" stroke="rgba(255,255,255,0.38)" stroke-width="2" stroke-linecap="round"/>
        <path d="M820 170 Q826 164 832 170 Q838 164 844 170" fill="none" stroke="rgba(255,255,255,0.28)" stroke-width="1.8" stroke-linecap="round"/>

        <!-- Colinas - fondo lejano -->
        <path d="M0 650 Q180 540 360 590 Q540 640 720 560 Q900 480 1080 540 Q1260 600 1440 530 L1440 900 L0 900 Z" fill="rgba(20,55,38,0.4)"/>
        <!-- Colinas - medio -->
        <path d="M0 720 Q200 650 400 690 Q600 730 800 670 Q1000 610 1200 660 Q1350 700 1440 650 L1440 900 L0 900 Z" fill="rgba(20,55,38,0.52)"/>
        <!-- Suelo primer plano -->
        <path d="M0 800 Q300 765 600 790 Q900 820 1200 782 Q1350 764 1440 788 L1440 900 L0 900 Z" fill="rgba(16,50,30,0.68)"/>

        <!-- Árbol plátano izquierda -->
        <g transform="translate(100, 680)">
            <rect x="2" y="42" width="16" height="78" rx="4" fill="rgba(100,60,20,0.75)"/>
            <ellipse cx="10" cy="32" rx="54" ry="17" fill="rgba(35,90,60,0.72)" transform="rotate(-32, 10, 32)"/>
            <ellipse cx="18" cy="22" rx="50" ry="15" fill="rgba(70,160,110,0.62)" transform="rotate(18, 18, 22)"/>
            <ellipse cx="-8" cy="18" rx="48" ry="14" fill="rgba(35,90,60,0.62)" transform="rotate(-50, -8, 18)"/>
            <ellipse cx="26" cy="36" rx="44" ry="13" fill="rgba(70,160,110,0.52)" transform="rotate(42, 26, 36)"/>
            <ellipse cx="0" cy="46" rx="40" ry="12" fill="rgba(35,90,60,0.58)" transform="rotate(-22, 0, 46)"/>
        </g>

        <!-- Árbol plátano derecha -->
        <g transform="translate(1300, 662)">
            <rect x="2" y="38" width="14" height="70" rx="4" fill="rgba(100,60,20,0.72)"/>
            <ellipse cx="9" cy="28" rx="48" ry="15" fill="rgba(35,90,60,0.68)" transform="rotate(-28, 9, 28)"/>
            <ellipse cx="16" cy="18" rx="44" ry="14" fill="rgba(70,160,110,0.58)" transform="rotate(22, 16, 18)"/>
            <ellipse cx="-6" cy="14" rx="42" ry="13" fill="rgba(35,90,60,0.58)" transform="rotate(-44, -6, 14)"/>
            <ellipse cx="22" cy="32" rx="38" ry="12" fill="rgba(70,160,110,0.48)" transform="rotate(48, 22, 32)"/>
        </g>

        <!-- Arbustos decorativos -->
        <ellipse cx="350" cy="803" rx="42" ry="22" fill="rgba(35,90,60,0.58)"/>
        <ellipse cx="700" cy="788" rx="36" ry="19" fill="rgba(70,160,110,0.48)"/>
        <ellipse cx="1050" cy="798" rx="44" ry="21" fill="rgba(35,90,60,0.55)"/>

        <!-- Galpón gallinero -->
        <g transform="translate(600, 738)">
            <rect x="0" y="18" width="68" height="44" fill="rgba(120,72,30,0.68)" rx="2"/>
            <polygon points="0,18 34,-6 68,18" fill="rgba(90,50,15,0.75)"/>
            <rect x="24" y="32" width="20" height="30" rx="1" fill="rgba(16,42,24,0.8)"/>
            <rect x="4" y="26" width="14" height="10" fill="none" stroke="rgba(100,60,20,0.5)" stroke-width="1.5"/>
            <rect x="50" y="26" width="14" height="10" fill="none" stroke="rgba(100,60,20,0.5)" stroke-width="1.5"/>
        </g>
    </svg>

    <!-- Contenido del Hero -->
    <div class="hero-content">
        <div class="hero-badge">🌱 100% Natural · Planeta Rica, Córdoba</div>
        <h1>Del campo<br>a tu mesa</h1>
        <p class="hero-subtitle">Gallinas, peces, plátano y hortalizas frescas</p>
        <p class="hero-desc">
            Productos frescos cosechados cada día en nuestra finca de 1 hectárea.
            Sin intermediarios, directo desde la granja hasta tu hogar.
        </p>
        <div class="hero-buttons">
            <a href="/tienda" class="btn-hero-primary">
                🛍️ Ver Productos
            </a>
            <a href="https://wa.me/57NUMERO" target="_blank" rel="noopener" class="btn-hero-whatsapp">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                </svg>
                WhatsApp
            </a>
        </div>
    </div>

    <!-- Flecha scroll -->
    <div class="hero-arrow" role="button" tabindex="0" aria-label="Bajar" onclick="document.getElementById('stats').scrollIntoView({behavior:'smooth'})">
        <svg width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <polyline points="6 9 12 15 18 9"/>
        </svg>
    </div>
</section>


<!-- ===== STATS BAR ===== -->
<section class="stats-bar fade-in-section" id="stats">
    <div class="stats-grid">
        <div class="stat-item">
            <span class="stat-emoji">🐔</span>
            <span class="stat-number">+500</span>
            <span class="stat-label">Gallinas</span>
        </div>
        <div class="stat-item">
            <span class="stat-emoji">🐟</span>
            <span class="stat-number">3</span>
            <span class="stat-label">Pozas de peces</span>
        </div>
        <div class="stat-item">
            <span class="stat-emoji">🌿</span>
            <span class="stat-number">1 Ha</span>
            <span class="stat-label">Terreno productivo</span>
        </div>
        <div class="stat-item">
            <span class="stat-emoji">✅</span>
            <span class="stat-number">100%</span>
            <span class="stat-label">Entrega fresca</span>
        </div>
    </div>
</section>


<!-- ===== PRODUCTOS DESTACADOS ===== -->
<section class="products-section fade-in-section" id="productos">
    <h2 class="section-title">Nuestros Productos</h2>
    <div class="section-line"></div>
    <p class="section-subtitle">Frescos, naturales, directo de la finca</p>

    <div class="products-grid">
        @if(isset($featured) && $featured->isNotEmpty())
            @foreach($featured as $producto)
            <div class="product-card">
                @if(!empty($producto->is_featured))
                    <div class="ribbon-destacado">Destacado</div>
                @endif
                <span class="product-emoji">{{ $producto->emoji ?? '🌾' }}</span>
                <div class="product-name">{{ $producto->name ?? ($producto->nombre ?? 'Producto') }}</div>
                <div class="product-price">
                    @php $precio = $producto->price ?? ($producto->precio ?? null); @endphp
                    @if($precio)
                        ${{ number_format($precio, 0, ',', '.') }} COP
                        @if(!empty($producto->unit) || !empty($producto->unidad))
                            / {{ $producto->unit ?? $producto->unidad }}
                        @endif
                    @endif
                </div>
                <a href="/tienda" class="btn-add-cart">Agregar al carrito</a>
            </div>
            @endforeach
        @else
            {{-- Productos estáticos de muestra --}}
            <div class="product-card">
                <div class="ribbon-destacado">Destacado</div>
                <span class="product-emoji">🥚</span>
                <div class="product-name">Huevos Frescos</div>
                <div class="product-price">$22.000 COP / cubeta</div>
                <a href="/tienda" class="btn-add-cart">Agregar al carrito</a>
            </div>

            <div class="product-card">
                <div class="ribbon-destacado">Destacado</div>
                <span class="product-emoji">🐔</span>
                <div class="product-name">Pollo Entero</div>
                <div class="product-price">$25.000 COP / unidad</div>
                <a href="/tienda" class="btn-add-cart">Agregar al carrito</a>
            </div>

            <div class="product-card">
                <span class="product-emoji">🐟</span>
                <div class="product-name">Tilapia Fresca</div>
                <div class="product-price">$8.000 COP / kg</div>
                <a href="/tienda" class="btn-add-cart">Agregar al carrito</a>
            </div>

            <div class="product-card">
                <span class="product-emoji">🍌</span>
                <div class="product-name">Plátano Hartón</div>
                <div class="product-price">$12.000 COP / racimo</div>
                <a href="/tienda" class="btn-add-cart">Agregar al carrito</a>
            </div>

            <div class="product-card">
                <span class="product-emoji">🥬</span>
                <div class="product-name">Hortalizas Surtidas</div>
                <div class="product-price">$7.500 COP / bolsa</div>
                <a href="/tienda" class="btn-add-cart">Agregar al carrito</a>
            </div>

            <div class="product-card">
                <span class="product-emoji">🥔</span>
                <div class="product-name">Yuca Fresca</div>
                <div class="product-price">$1.200 COP / kg</div>
                <a href="/tienda" class="btn-add-cart">Agregar al carrito</a>
            </div>
        @endif
    </div>

    <a href="/tienda" class="btn-ver-todos">Ver todos los productos →</a>
</section>


<!-- ===== NUESTRA GRANJA ===== -->
<section class="granja-section fade-in-section" id="nuestra-granja">
    <div class="granja-inner">
        <!-- Ilustración SVG de la finca -->
        <div class="animate-float-card">
            <svg viewBox="0 0 500 380" xmlns="http://www.w3.org/2000/svg" style="width:100%;max-width:480px;border-radius:16px;box-shadow:0 8px 36px rgba(26,71,49,0.18);" role="img" aria-label="Ilustración de la finca">
                <!-- Fondo cielo -->
                <rect width="500" height="220" fill="#cce8d8" rx="16"/>
                <!-- Campo -->
                <rect x="0" y="218" width="500" height="162" fill="#2d6a4f" rx="0"/>
                <path d="M0 218 Q125 200 250 218 Q375 236 500 218 L500 380 L0 380 Z" fill="#2d6a4f"/>
                <!-- Hierba textura -->
                <path d="M0 225 Q125 210 250 225 Q375 240 500 225" fill="none" stroke="#52b788" stroke-width="3" opacity="0.45"/>

                <!-- Sol -->
                <circle cx="418" cy="62" r="36" fill="#f4a261" opacity="0.88"/>
                <circle cx="418" cy="62" r="27" fill="#f4a261"/>
                <g stroke="#f4a261" stroke-width="2.5" stroke-linecap="round" opacity="0.65">
                    <line x1="418" y1="16" x2="418" y2="5"/>
                    <line x1="452" y1="28" x2="460" y2="20"/>
                    <line x1="464" y1="62" x2="475" y2="62"/>
                    <line x1="452" y1="96" x2="460" y2="104"/>
                    <line x1="384" y1="28" x2="376" y2="20"/>
                    <line x1="372" y1="62" x2="361" y2="62"/>
                </g>

                <!-- Nubes -->
                <ellipse cx="80" cy="58" rx="46" ry="18" fill="rgba(255,255,255,0.82)"/>
                <ellipse cx="106" cy="48" rx="36" ry="15" fill="rgba(255,255,255,0.82)"/>
                <ellipse cx="56" cy="62" rx="30" ry="13" fill="rgba(255,255,255,0.72)"/>

                <ellipse cx="248" cy="42" rx="34" ry="13" fill="rgba(255,255,255,0.68)"/>
                <ellipse cx="270" cy="34" rx="27" ry="11" fill="rgba(255,255,255,0.68)"/>

                <!-- Camino de tierra -->
                <path d="M205 380 L228 220 L272 220 L295 380 Z" fill="rgba(139,94,60,0.48)"/>
                <line x1="250" y1="220" x2="250" y2="380" stroke="rgba(180,130,80,0.25)" stroke-width="2" stroke-dasharray="8,10"/>

                <!-- Casa principal -->
                <g transform="translate(28, 215)">
                    <rect x="0" y="42" width="106" height="78" fill="#fdf6ec" rx="3"/>
                    <polygon points="-10,42 53,5 116,42" fill="#8b5e3c"/>
                    <rect x="72" y="12" width="12" height="25" fill="#6b4423"/>
                    <!-- Puerta -->
                    <rect x="42" y="78" width="22" height="42" rx="2" fill="#52b788"/>
                    <circle cx="61" cy="101" r="2.5" fill="#1a4731"/>
                    <!-- Ventanas -->
                    <rect x="7" y="58" width="22" height="18" rx="2" fill="#95d5b2"/>
                    <line x1="18" y1="58" x2="18" y2="76" stroke="#2d6a4f" stroke-width="1.5"/>
                    <line x1="7" y1="67" x2="29" y2="67" stroke="#2d6a4f" stroke-width="1.5"/>
                    <rect x="76" y="58" width="22" height="18" rx="2" fill="#95d5b2"/>
                    <line x1="87" y1="58" x2="87" y2="76" stroke="#2d6a4f" stroke-width="1.5"/>
                    <line x1="76" y1="67" x2="98" y2="67" stroke="#2d6a4f" stroke-width="1.5"/>
                </g>

                <!-- Galpón gallinero -->
                <g transform="translate(155, 248)">
                    <rect x="0" y="24" width="82" height="52" fill="#c9956a" rx="2"/>
                    <polygon points="-5,24 41,-2 87,24" fill="#8b5e3c"/>
                    <rect x="31" y="44" width="20" height="32" rx="1" fill="#5a3010"/>
                    <rect x="4" y="32" width="22" height="14" fill="none" stroke="#6b4020" stroke-width="1.5"/>
                    <rect x="56" y="32" width="22" height="14" fill="none" stroke="#6b4020" stroke-width="1.5"/>
                    <text x="4" y="22" font-size="8" fill="#fff" font-family="Lato, sans-serif" font-weight="700" opacity="0.7">GALLINERO</text>
                </g>

                <!-- Pozas de peces -->
                <g transform="translate(318, 232)">
                    <!-- Poza 1 -->
                    <ellipse cx="40" cy="28" rx="50" ry="22" fill="#1a7a9a" opacity="0.78)"/>
                    <ellipse cx="40" cy="28" rx="38" ry="14" fill="#2fa8cc" opacity="0.6"/>
                    <text x="28" y="33" font-size="14">🐟</text>
                    <text x="5" y="12" font-size="7.5" fill="#fff" font-family="Lato, sans-serif" font-weight="700">POZA 1</text>
                    <!-- Poza 2 -->
                    <ellipse cx="42" cy="92" rx="46" ry="20" fill="#1a7a9a" opacity="0.74"/>
                    <ellipse cx="42" cy="92" rx="34" ry="13" fill="#2fa8cc" opacity="0.55"/>
                    <text x="30" y="97" font-size="14">🐟</text>
                    <text x="7" y="76" font-size="7.5" fill="#fff" font-family="Lato, sans-serif" font-weight="700">POZA 2</text>
                    <!-- Poza 3 -->
                    <ellipse cx="40" cy="154" rx="44" ry="19" fill="#1a7a9a" opacity="0.70"/>
                    <ellipse cx="40" cy="154" rx="32" ry="12" fill="#2fa8cc" opacity="0.50"/>
                    <text x="28" y="159" font-size="14">🐟</text>
                    <text x="7" y="138" font-size="7.5" fill="#fff" font-family="Lato, sans-serif" font-weight="700">POZA 3</text>
                </g>

                <!-- Árboles de plátano -->
                <g transform="translate(150, 186)">
                    <rect x="5" y="28" width="10" height="34" rx="3" fill="#8b5e3c"/>
                    <ellipse cx="10" cy="20" rx="32" ry="10" fill="#2d6a4f" transform="rotate(-35, 10, 20)"/>
                    <ellipse cx="10" cy="16" rx="28" ry="9" fill="#52b788" transform="rotate(22, 10, 16)"/>
                    <ellipse cx="10" cy="23" rx="26" ry="8" fill="#2d6a4f" transform="rotate(-52, 10, 23)"/>
                </g>
                <g transform="translate(450, 188)">
                    <rect x="4" y="26" width="9" height="30" rx="3" fill="#8b5e3c"/>
                    <ellipse cx="8" cy="18" rx="28" ry="9" fill="#2d6a4f" transform="rotate(-30, 8, 18)"/>
                    <ellipse cx="8" cy="14" rx="24" ry="8" fill="#52b788" transform="rotate(20, 8, 14)"/>
                    <ellipse cx="8" cy="21" rx="22" ry="7" fill="#2d6a4f" transform="rotate(-48, 8, 21)"/>
                </g>
                <g transform="translate(240, 200)">
                    <rect x="4" y="22" width="8" height="25" rx="2" fill="#8b5e3c"/>
                    <ellipse cx="8" cy="15" rx="24" ry="8" fill="#2d6a4f" transform="rotate(-26, 8, 15)"/>
                    <ellipse cx="8" cy="12" rx="20" ry="7" fill="#52b788" transform="rotate(24, 8, 12)"/>
                </g>

                <!-- Gallinas -->
                <text x="50" y="340" font-size="18">🐔</text>
                <text x="90" y="356" font-size="15">🐓</text>
                <text x="118" y="338" font-size="13">🥚</text>

                <!-- Etiqueta inferior -->
                <rect x="0" y="360" width="500" height="20" fill="rgba(0,0,0,0.18)" rx="0"/>
                <text x="250" y="374" text-anchor="middle" font-size="10" fill="rgba(255,255,255,0.55)" font-family="'Lato', sans-serif" font-weight="700" letter-spacing="1.5">NUESTRA FINCA · PLANETA RICA, CÓRDOBA</text>
            </svg>
        </div>

        <!-- Texto informativo -->
        <div>
            <div class="granja-tag">🌾 Quiénes somos</div>
            <h2 class="granja-title">Una finca productiva en el corazón de Córdoba</h2>
            <p class="granja-desc">
                Somos una granja familiar ubicada en Planeta Rica, Córdoba, con un terreno productivo de
                10.000 m² (1 hectárea). Nos dedicamos a la cría de gallinas ponedoras, pollos de engorde,
                piscicultura y cultivo de plátano y hortalizas frescas. Todo bajo un sistema sostenible
                con energía solar y abastecimiento de agua de pozo propio.
            </p>
            <ul class="granja-list">
                <li>✅ <strong>Gallinas ponedoras</strong> &nbsp;· 500 unidades en producción constante</li>
                <li>✅ <strong>Pollos de engorde</strong> &nbsp;· lotes de 500 bajo ciclos programados</li>
                <li>✅ <strong>Piscicultura</strong> &nbsp;· Tilapia y Cachama en 3 pozas</li>
                <li>✅ <strong>Plátano Hartón</strong> &nbsp;· 277 plantas en producción</li>
                <li>✅ <strong>Hortalizas frescas</strong> &nbsp;· rotación continua de cultivos</li>
                <li>✅ <strong>Energía solar</strong> &nbsp;y agua de pozo propio</li>
            </ul>
        </div>
    </div>
</section>


<!-- ===== CÓMO HACER TU PEDIDO ===== -->
<section class="como-pedir-section fade-in-section" id="como-pedir">
    <!-- Ola superior decorativa -->
    <div class="wave-divider" aria-hidden="true" style="margin-top:-5.5rem; margin-bottom:1rem;">
        <svg viewBox="0 0 1440 72" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" style="display:block;width:100%;height:72px;">
            <path d="M0,0 C240,72 480,72 720,36 C960,0 1200,0 1440,48 L1440,0 Z" fill="#fdf6ec"/>
        </svg>
    </div>

    <h2 class="section-title">¿Cómo hacer tu pedido?</h2>
    <div class="section-line"></div>
    <p class="section-subtitle">Simple, rápido y sin complicaciones</p>

    <div class="pasos-grid">
        <div class="paso-card">
            <div class="paso-numero">1</div>
            <span class="paso-emoji">🛍️</span>
            <div class="paso-title">Explora la tienda</div>
            <p class="paso-desc">Visita nuestra tienda y elige los productos frescos que quieres de la granja.</p>
        </div>

        <div class="paso-card">
            <div class="paso-numero">2</div>
            <span class="paso-emoji">🛒</span>
            <div class="paso-title">Agrega al carrito</div>
            <p class="paso-desc">Selecciona las cantidades que necesitas y agrégalas a tu carrito de compras.</p>
        </div>

        <div class="paso-card">
            <div class="paso-numero">3</div>
            <span class="paso-emoji">✅</span>
            <div class="paso-title">Confirma tu pedido</div>
            <p class="paso-desc">Ingresa tus datos de entrega y recibirás confirmación por WhatsApp de inmediato.</p>
        </div>
    </div>

    <div style="text-align:center; margin-top: 2.8rem;">
        <a href="/tienda" class="btn-ver-todos" style="background: var(--verde-medio);">Ir a la tienda →</a>
    </div>
</section>


<!-- ===== POR QUÉ ELEGIRNOS ===== -->
<section class="why-section fade-in-section" id="por-que-elegirnos">
    <h2 class="why-title">¿Por qué elegirnos?</h2>
    <div class="why-line"></div>

    <div class="why-grid">
        <div class="why-card">
            <span class="why-emoji">🌱</span>
            <div class="why-card-title">100% Natural</div>
            <p class="why-card-desc">Sin hormonas de crecimiento. Alimentación natural para todos nuestros animales y cultivos.</p>
        </div>
        <div class="why-card">
            <span class="why-emoji">🚚</span>
            <div class="why-card-title">Fresco del día</div>
            <p class="why-card-desc">Cosechamos y procesamos el mismo día de tu pedido. Nada de cámara de frío ni intermediarios.</p>
        </div>
        <div class="why-card">
            <span class="why-emoji">📍</span>
            <div class="why-card-title">Producción local</div>
            <p class="why-card-desc">Granja en Planeta Rica, Córdoba. Apoyamos la economía local y reducimos la cadena de intermediarios.</p>
        </div>
    </div>
</section>


<!-- ===== CONTACTO / FOOTER ===== -->
<section class="contact-section fade-in-section" id="contacto">
    <div class="contact-inner">
        <!-- Info de contacto -->
        <div>
            <h3 class="contact-title">Contáctanos</h3>

            <div class="contact-item">
                <span class="c-icon">📍</span>
                <div>
                    <div class="c-label">Ubicación</div>
                    <div class="c-value">Planeta Rica, Córdoba, Colombia</div>
                </div>
            </div>

            <div class="contact-item">
                <span class="c-icon">📱</span>
                <div>
                    <div class="c-label">WhatsApp</div>
                    <div class="c-value">
                        <a href="https://wa.me/57NUMERO">+57 [número de contacto]</a>
                    </div>
                </div>
            </div>

            <div class="contact-item">
                <span class="c-icon">🕐</span>
                <div>
                    <div class="c-label">Horario de atención</div>
                    <div class="c-value">Lunes a Sábado · 6:00 am – 6:00 pm</div>
                </div>
            </div>

            <div class="contact-item">
                <span class="c-icon">✉️</span>
                <div>
                    <div class="c-label">Correo electrónico</div>
                    <div class="c-value">
                        <a href="mailto:granja@planetarica.co">granja@planetarica.co</a>
                    </div>
                </div>
            </div>

            <div style="margin-top: 2rem;">
                <a href="https://wa.me/57NUMERO" target="_blank" rel="noopener"
                   style="display:inline-flex;align-items:center;gap:0.5rem;background:#25d366;color:#fff;font-weight:700;padding:0.8rem 1.8rem;border-radius:999px;text-decoration:none;font-size:0.95rem;transition:filter 0.2s;">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                    </svg>
                    Escríbenos por WhatsApp
                </a>
            </div>
        </div>

        <!-- Mini mapa SVG Colombia -->
        <div class="map-placeholder">
            <svg viewBox="0 0 320 290" xmlns="http://www.w3.org/2000/svg" style="width:100%;border-radius:14px;" role="img" aria-label="Mapa de Colombia con ubicación de Planeta Rica">
                <rect width="320" height="290" fill="#1a4731" rx="14"/>

                <!-- Silueta simplificada de Colombia -->
                <path d="M112,32 L130,30 L156,37 L178,32 L198,42 L208,62 L218,78 L212,98 L226,118 L232,138 L222,158 L216,178 L202,198 L186,212 L170,227 L155,237 L140,242 L125,237 L110,227 L96,212 L86,196 L76,180 L72,160 L76,140 L81,120 L76,100 L82,80 L92,62 L102,46 Z"
                      fill="rgba(82,183,136,0.22)" stroke="rgba(149,213,178,0.45)" stroke-width="1.5"/>

                <!-- Punto Planeta Rica -->
                <circle cx="150" cy="122" r="11" fill="rgba(244,162,97,0.35)"/>
                <circle cx="150" cy="122" r="7" fill="#f4a261"/>
                <circle cx="150" cy="122" r="3.5" fill="#fff"/>
                <!-- Pulso animado -->
                <circle cx="150" cy="122" r="11" fill="none" stroke="#f4a261" stroke-width="2.5" opacity="0.55">
                    <animate attributeName="r" values="11;24;11" dur="2.2s" repeatCount="indefinite"/>
                    <animate attributeName="opacity" values="0.55;0;0.55" dur="2.2s" repeatCount="indefinite"/>
                </circle>

                <!-- Etiqueta ubicación -->
                <text x="163" y="118" font-size="9.5" fill="#fff" font-family="Lato, sans-serif" font-weight="700">Planeta Rica</text>
                <text x="163" y="131" font-size="8.5" fill="rgba(255,255,255,0.65)" font-family="Lato, sans-serif">Córdoba</text>

                <!-- Texto Colombia -->
                <text x="160" y="268" text-anchor="middle" font-size="11" fill="rgba(255,255,255,0.45)" font-family="Lato, sans-serif" font-weight="700" letter-spacing="1.5">COLOMBIA</text>

                <!-- Brújula -->
                <g transform="translate(284, 30)">
                    <circle cx="0" cy="0" r="16" fill="rgba(255,255,255,0.07)" stroke="rgba(255,255,255,0.18)" stroke-width="1"/>
                    <text x="0" y="-5" text-anchor="middle" font-size="7" fill="rgba(255,255,255,0.55)" font-family="Lato, sans-serif" font-weight="700">N</text>
                    <polygon points="0,-12 3,2 0,-1 -3,2" fill="#f4a261" opacity="0.75"/>
                    <polygon points="0,12 3,2 0,-1 -3,2" fill="rgba(255,255,255,0.28)"/>
                </g>

                <!-- Marco decorativo -->
                <rect x="1" y="1" width="318" height="288" rx="14" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="1.5"/>
            </svg>
        </div>
    </div>
</section>

<!-- Footer inferior -->
<footer class="footer-bottom">
    <p>
        © 2026 Granja Planeta Rica &nbsp;·&nbsp; Todos los derechos reservados &nbsp;·&nbsp; Hecho con 💚 en Colombia
        <a href="/admin" class="footer-admin-link">Panel de administración →</a>
    </p>
</footer>


<!-- ===== BOTÓN FLOTANTE WHATSAPP ===== -->
<a href="https://wa.me/57NUMERO" target="_blank" rel="noopener" class="whatsapp-float" aria-label="Contactar por WhatsApp">
    <span class="whatsapp-tooltip">Escríbenos por WhatsApp</span>
    <svg width="32" height="32" viewBox="0 0 24 24" fill="white" aria-hidden="true">
        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
    </svg>
</a>


<!-- ===== JAVASCRIPT ===== -->
<script>
    // 1. Toggle navbar mobile
    var hamburger = document.getElementById('hamburger');
    var mobileMenu = document.getElementById('mobileMenu');

    hamburger.addEventListener('click', function() {
        mobileMenu.classList.toggle('open');
    });

    mobileMenu.querySelectorAll('a').forEach(function(link) {
        link.addEventListener('click', function() {
            mobileMenu.classList.remove('open');
        });
    });

    // 2. Smooth scroll para links ancla
    document.querySelectorAll('a[href^="#"]').forEach(function(anchor) {
        anchor.addEventListener('click', function(e) {
            var href = this.getAttribute('href');
            if (href.length <= 1) return;
            var target = document.querySelector(href);
            if (target) {
                e.preventDefault();
                var offset = 70;
                var top = target.getBoundingClientRect().top + window.pageYOffset - offset;
                window.scrollTo({ top: top, behavior: 'smooth' });
            }
        });
    });

    // 3. IntersectionObserver para fadeIn de secciones
    var fadeObserver = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                fadeObserver.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px 0px -40px 0px'
    });

    document.querySelectorAll('.fade-in-section').forEach(function(el) {
        fadeObserver.observe(el);
    });

    // 4. Sombra navbar al hacer scroll
    window.addEventListener('scroll', function() {
        var navbar = document.querySelector('.navbar');
        if (window.scrollY > 20) {
            navbar.style.boxShadow = '0 4px 32px rgba(0,0,0,0.38)';
        } else {
            navbar.style.boxShadow = '0 2px 20px rgba(0,0,0,0.3)';
        }
    }, { passive: true });
</script>

</body>
</html>
