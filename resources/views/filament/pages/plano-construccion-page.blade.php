<x-filament-panels::page>

@push('styles')
<style>
/* ── Contenedor principal ─────────────────────────────────────────── */
.pc-wrap {
    --pc-bg:      #0f1419;
    --pc-panel:   #1a2332;
    --pc-border:  #2a3545;
    --pc-text:    #e8eef5;
    --pc-muted:   #8b9bb4;
    font-family: "Segoe UI", system-ui, sans-serif;
    color: var(--pc-text);
    line-height: 1.45;
}
.pc-wrap *, .pc-wrap *::before, .pc-wrap *::after { box-sizing: border-box; }

/* ── Cabecera ─────────────────────────────────────────────────────── */
.pc-header {
    padding: 1rem 1.25rem;
    background: var(--pc-panel);
    border-bottom: 1px solid var(--pc-border);
    border-radius: 0.75rem 0.75rem 0 0;
}
.pc-header h2 { margin: 0 0 .3rem; font-size: 1.1rem; font-weight: 650; }
.pc-header p  { margin: 0; font-size: .82rem; color: var(--pc-muted); max-width: 60rem; }

/* ── Layout mapa + leyenda ────────────────────────────────────────── */
.pc-layout {
    display: grid;
    grid-template-columns: 1fr 260px;
    gap: 0;
    background: var(--pc-bg);
}
@media (max-width: 860px) {
    .pc-layout { grid-template-columns: 1fr; }
}

/* ── SVG wrapper ──────────────────────────────────────────────────── */
.pc-map-wrap {
    padding: 1.25rem;
    display: flex;
    align-items: flex-start;
    justify-content: center;
    overflow-x: auto;
}
#pcSvg {
    max-width: 100%;
    height: auto;
    filter: drop-shadow(0 6px 20px rgba(0,0,0,.4));
}

/* ── Leyenda lateral ──────────────────────────────────────────────── */
.pc-legend-aside {
    background: var(--pc-panel);
    border-left: 1px solid var(--pc-border);
    padding: 1rem 1rem 1.5rem;
    font-size: .8rem;
}
@media (max-width: 860px) {
    .pc-legend-aside { border-left: none; border-top: 1px solid var(--pc-border); }
}
.pc-legend-aside h3 { margin: 0 0 .75rem; font-size: .9rem; }
.pc-legend-list { list-style: none; margin: 0; padding: 0; }
.pc-legend-list li {
    display: flex;
    align-items: flex-start;
    gap: .5rem;
    margin-bottom: .45rem;
}
.pc-legend-list .sw {
    width: 13px; height: 13px;
    border-radius: 3px;
    flex-shrink: 0;
    margin-top: 2px;
    border: 1px solid rgba(255,255,255,.18);
}
.pc-legend-aside .note {
    margin-top: 1rem;
    padding: .6rem .75rem;
    background: rgba(0,0,0,.25);
    border-radius: 6px;
    font-size: .75rem;
    color: var(--pc-muted);
    line-height: 1.55;
}
.pc-legend-aside .note strong { color: #a8d4b8; }

/* ── Cards de datos ───────────────────────────────────────────────── */
.pc-cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
    gap: 1rem;
    padding: 1rem 1.25rem 1.5rem;
    background: var(--pc-bg);
    border-top: 1px solid var(--pc-border);
    border-radius: 0 0 .75rem .75rem;
}
.pc-card {
    background: var(--pc-panel);
    border: 1px solid var(--pc-border);
    border-radius: .6rem;
    padding: .85rem 1rem 1rem;
}
.pc-card h4 {
    margin: 0 0 .6rem;
    font-size: .85rem;
    font-weight: 650;
    color: #a8d4b8;
    border-bottom: 1px solid var(--pc-border);
    padding-bottom: .4rem;
}
.pc-card table {
    width: 100%;
    border-collapse: collapse;
    font-size: .77rem;
    color: var(--pc-text);
}
.pc-card table th {
    text-align: left;
    color: var(--pc-muted);
    font-weight: 600;
    padding: .25rem .3rem;
    border-bottom: 1px solid var(--pc-border);
}
.pc-card table td { padding: .22rem .3rem; }
.pc-card table tr:last-child td { font-weight: 700; color: #c8e6d4; border-top: 1px solid var(--pc-border); }
.pc-card ul {
    margin: 0; padding: 0;
    list-style: none;
    font-size: .78rem;
    color: var(--pc-text);
}
.pc-card ul li {
    padding: .22rem 0;
    border-bottom: 1px solid rgba(255,255,255,.06);
    display: flex;
    gap: .45rem;
}
.pc-card ul li::before { content: "·"; color: #3d9e6b; flex-shrink: 0; }

/* ── Hover sobre zonas SVG ────────────────────────────────────────── */
.pc-zone { transition: filter .15s ease; }
.pc-zone:hover { filter: brightness(1.18); cursor: pointer; }
</style>
@endpush

<div class="pc-wrap overflow-hidden rounded-xl border border-gray-200 shadow-md dark:border-white/10">

    {{-- Cabecera --}}
    <header class="pc-header">
        <h2>Plano de Construcción Detallado — Granja Productiva (Planeta Rica, Córdoba)</h2>
        <p>
            Terreno trapecial: <strong>50 m</strong> de frente (sur / acceso) &bull;
            <strong>65 m</strong> de fondo (norte) &bull;
            <strong>175 m</strong> de largo total.
            Escala aproximada 1 m = 2 px. Las dimensiones son orientativas; validar con topografía.
        </p>
    </header>

    <div class="pc-layout">

        {{-- ── SVG Principal ── --}}
        <div class="pc-map-wrap">
            <!--
                ViewBox: 0 0 300 420
                Terreno: eje Y = norte(0) → sur(350). X centro ≈ 100.
                Frente sur (y=350): ancho 100 px (50 m × 2).  x: 50–150
                Fondo norte (y=0):  ancho 130 px (65 m × 2).  x: 35–165
                Lados laterales con leve curva bezier.
                Escala: 1 m = 2 px.  Elementos calculados a esa escala.
            -->
            <svg id="pcSvg"
                 viewBox="0 0 300 420"
                 role="img"
                 aria-label="Plano de construcción detallado de la granja"
                 xmlns="http://www.w3.org/2000/svg">

                <defs>
                    <!-- Gradiente cielo (fondo página) -->
                    <linearGradient id="pcBgGrad" x1="0" y1="0" x2="0" y2="1">
                        <stop offset="0%" stop-color="#0f1c12"/>
                        <stop offset="100%" stop-color="#141f28"/>
                    </linearGradient>
                    <!-- Gradiente casa -->
                    <linearGradient id="pcHouseGrad" x1="0" y1="0" x2="0" y2="1">
                        <stop offset="0%" stop-color="#c4a882"/>
                        <stop offset="100%" stop-color="#8b7355"/>
                    </linearGradient>
                    <!-- Clip del terreno para no salirse del trapecio -->
                    <clipPath id="pcTerrainClip">
                        <path d="M35,0 L165,0 Q167,88 150,350 L50,350 Q33,88 35,0 Z"/>
                    </clipPath>
                    <!-- Pattern puntos plátano -->
                    <pattern id="pcPatPlatano" x="0" y="0" width="6" height="6" patternUnits="userSpaceOnUse">
                        <circle cx="3" cy="3" r="1.2" fill="#2e7d32" opacity=".7"/>
                    </pattern>
                    <!-- Pattern camas hortalizas -->
                    <pattern id="pcPatHuerta" x="0" y="0" width="4.8" height="4" patternUnits="userSpaceOnUse">
                        <rect x="0" y="0" width="2.4" height="4" fill="#2e7d32" opacity=".45"/>
                    </pattern>
                </defs>

                <!-- Fondo general -->
                <rect x="0" y="0" width="300" height="420" fill="url(#pcBgGrad)"/>

                <!-- ══════════════════════════════════════════════════
                     ZONAS DE USO DEL SUELO (norte→sur)
                     Contorno trapecio: izq Q-bezier, der Q-bezier
                     Ancho norte (y=0): x=35..165  (130 px = 65 m)
                     Ancho sur  (y=350): x=50..150 (100 px = 50 m)
                     Curva lateral: control ≈ x=30 / x=170 en y=175
                ════════════════════════════════════════════════════ -->

                <!-- 1. ZONA NORTE / COMPOST Y MIXTO  y=0..70 (0..35 m) -->
                <path class="pc-zone"
                      d="M35,0 L165,0 L162.3,70 L37.7,70 Z"
                      fill="#5a7c4e" opacity=".9"
                      stroke="rgba(255,255,255,.1)" stroke-width=".4"/>
                <text x="100" y="28" text-anchor="middle" font-size="5" fill="rgba(255,255,255,.9)" font-weight="600">Compost y cultivo mixto</text>
                <text x="100" y="36" text-anchor="middle" font-size="3.8" fill="rgba(255,255,255,.65)">~1 800 m²</text>

                <!-- 2. ZONA YUCA + ÑAME  y=70..150 (35..75 m) -->
                <path class="pc-zone"
                      d="M37.7,70 L162.3,70 L158.5,150 L41.5,150 Z"
                      fill="#8bc34a" opacity=".85"
                      stroke="rgba(255,255,255,.1)" stroke-width=".4"/>
                <!-- Divisoria vertical al centro -->
                <line x1="100" y1="72" x2="100" y2="148" stroke="rgba(255,255,255,.35)" stroke-width=".7" stroke-dasharray="3,2"/>
                <text x="72" y="104" text-anchor="middle" font-size="4.2" fill="rgba(0,0,0,.75)" font-weight="600">Yuca</text>
                <text x="72" y="110" text-anchor="middle" font-size="3.4" fill="rgba(0,0,0,.65)">750 m²</text>
                <text x="130" y="104" text-anchor="middle" font-size="4.2" fill="rgba(0,0,0,.75)" font-weight="600">Ñame</text>
                <text x="130" y="110" text-anchor="middle" font-size="3.4" fill="rgba(0,0,0,.65)">750 m²</text>

                <!-- 3. ZONA PLÁTANO  y=150..250 (75..125 m) -->
                <path class="pc-zone"
                      d="M41.5,150 L158.5,150 L153.5,250 L46.5,250 Z"
                      fill="#388e3c" opacity=".85"
                      stroke="rgba(255,255,255,.1)" stroke-width=".4"/>
                <!-- Patrón de plantas -->
                <rect x="46.5" y="150" width="107" height="100" fill="url(#pcPatPlatano)" clip-path="url(#pcTerrainClip)" opacity=".6"/>
                <text x="100" y="192" text-anchor="middle" font-size="5" fill="rgba(255,255,255,.95)" font-weight="700">Plátano Hartón</text>
                <text x="100" y="200" text-anchor="middle" font-size="3.8" fill="rgba(255,255,255,.75)">2 500 m² · 277 plantas · 3×3 m</text>

                <!-- 4. ZONA PISCICULTURA  y=250..370 (125..185 m — se corta en la curva) -->
                <path class="pc-zone"
                      d="M46.5,250 L153.5,250 L147,370 L53,370 Z"
                      fill="#1565c0" opacity=".75"
                      stroke="rgba(255,255,255,.1)" stroke-width=".4"/>
                <text x="100" y="262" text-anchor="middle" font-size="4.5" fill="rgba(255,255,255,.9)" font-weight="700">Zona Piscicultura</text>

                <!-- Pozas (dentro del clip) -->
                <!-- Poza 1 Tilapia: 20m×10m = 40px×20px, centrada izquierda -->
                <rect x="55" y="267" width="40" height="20"
                      fill="#1565c0" stroke="#90caf9" stroke-width=".8" rx="1" opacity=".95"/>
                <text x="75" y="274" text-anchor="middle" font-size="3.4" fill="#e3f2fd" font-weight="600">Tilapia</text>
                <text x="75" y="279" text-anchor="middle" font-size="3" fill="#bbdefb">3 000 peces</text>
                <text x="75" y="284" text-anchor="middle" font-size="2.8" fill="#90caf9">20×10 m</text>

                <!-- Poza 2 Cachama -->
                <rect x="100" y="267" width="40" height="20"
                      fill="#1976d2" stroke="#90caf9" stroke-width=".8" rx="1" opacity=".95"/>
                <text x="120" y="274" text-anchor="middle" font-size="3.4" fill="#e3f2fd" font-weight="600">Cachama</text>
                <text x="120" y="279" text-anchor="middle" font-size="3" fill="#bbdefb">1 500 peces</text>
                <text x="120" y="284" text-anchor="middle" font-size="2.8" fill="#90caf9">20×10 m</text>

                <!-- Poza 3 Alevinos (más pequeña) -->
                <rect x="60" y="293" width="30" height="16"
                      fill="#42a5f5" stroke="#bbdefb" stroke-width=".7" rx="1" opacity=".95"/>
                <text x="75" y="300" text-anchor="middle" font-size="3.4" fill="#0d1b2e" font-weight="600">Alevinos</text>
                <text x="75" y="306" text-anchor="middle" font-size="2.8" fill="#0d1b2e">15×8 m</text>

                <!-- Nota geomembrana -->
                <text x="100" y="320" text-anchor="middle" font-size="3" fill="rgba(255,255,255,.55)" font-style="italic">Geomembrana HDPE 300µ</text>

                <!-- Flecha flujo de agua poza1→poza2 -->
                <line x1="95.5" y1="277" x2="99.5" y2="277" stroke="#90caf9" stroke-width=".9" marker-end="url(#pcArrowBlue)"/>

                <!-- 5. ZONA AVES  y=370..490 (185..245 m) -->
                <path class="pc-zone"
                      d="M53,370 L147,370 L140,490 L60,490 Z"
                      fill="#e65100" opacity=".7"
                      stroke="rgba(255,255,255,.1)" stroke-width=".4"/>
                <text x="100" y="382" text-anchor="middle" font-size="4.5" fill="rgba(255,255,255,.9)" font-weight="700">Zona Aves</text>

                <!-- Línea bioseguridad -->
                <line x1="62" y1="426" x2="138" y2="426"
                      stroke="#ef9a9a" stroke-width=".7" stroke-dasharray="3,1.5"/>
                <text x="100" y="422" text-anchor="middle" font-size="2.8" fill="#ef9a9a">Zona de bioseguridad</text>

                <!-- Galpón gallinas: 14m×8m = 28px×16px, lado izquierdo -->
                <rect x="63" y="390" width="28" height="16"
                      fill="#f57f17" stroke="#bf360c" stroke-width=".8" rx=".8"/>
                <text x="77" y="397" text-anchor="middle" font-size="3.2" fill="rgba(255,255,255,.95)" font-weight="600">Galpón Gallinas</text>
                <text x="77" y="402" text-anchor="middle" font-size="2.8" fill="rgba(255,255,255,.8)">14×8 m = 112 m²</text>

                <!-- Galpón pollos: 18m×8m = 36px×16px, separado 25m = 50px al norte (y menor) -->
                <rect x="63" y="436" width="36" height="16"
                      fill="#e65100" stroke="#bf360c" stroke-width=".8" rx=".8"/>
                <text x="81" y="443" text-anchor="middle" font-size="3.2" fill="rgba(255,255,255,.95)" font-weight="600">Galpón Pollos</text>
                <text x="81" y="448" text-anchor="middle" font-size="2.8" fill="rgba(255,255,255,.8)">18×8 m = 144 m²</text>

                <!-- Flecha + medida separación galpones -->
                <line x1="55" y1="406" x2="55" y2="436" stroke="#ffcc02" stroke-width=".7"/>
                <line x1="52" y1="406" x2="58" y2="406" stroke="#ffcc02" stroke-width=".7"/>
                <line x1="52" y1="436" x2="58" y2="436" stroke="#ffcc02" stroke-width=".7"/>
                <text x="50" y="422" text-anchor="middle" font-size="2.9" fill="#ffcc02" transform="rotate(-90,50,422)">25 m mín.</text>

                <!-- Orientación E→O en zona aves -->
                <text x="108" y="399" font-size="3" fill="rgba(255,255,255,.55)">E</text>
                <line x1="111" y1="399" x2="123" y2="399" stroke="rgba(255,255,255,.4)" stroke-width=".7" marker-end="url(#pcArrowGray)"/>
                <text x="125" y="399" font-size="3" fill="rgba(255,255,255,.55)">O</text>

                <!-- 6. ZONA HUERTA  y=490..610 (245..305 m) -->
                <path class="pc-zone"
                      d="M60,490 L140,490 L133,610 L67,610 Z"
                      fill="#2e7d32" opacity=".85"
                      stroke="rgba(255,255,255,.1)" stroke-width=".4"/>
                <!-- Patrón camas -->
                <rect x="67" y="490" width="66" height="120" fill="url(#pcPatHuerta)" opacity=".5"/>
                <text x="100" y="527" text-anchor="middle" font-size="4.5" fill="rgba(255,255,255,.95)" font-weight="700">Huerta</text>
                <text x="100" y="534" text-anchor="middle" font-size="3.4" fill="rgba(255,255,255,.8)">10 camas 1.2×20 m</text>
                <text x="100" y="540" text-anchor="middle" font-size="3" fill="rgba(255,255,255,.65)">1 500 m²</text>

                <!-- 7. ZONA CASA  y=610..700 (305..350 m en la escala de la vista) -->
                <path class="pc-zone"
                      d="M67,610 L133,610 L150,700 L50,700 Z"
                      fill="#5d4037" opacity=".8"
                      stroke="rgba(255,255,255,.1)" stroke-width=".4"/>
                <text x="100" y="622" text-anchor="middle" font-size="4.5" fill="rgba(255,255,255,.9)" font-weight="700">Zona Casa y Servicios</text>

                <!-- Casa principal: 24px×16px -->
                <rect x="68" y="630" width="24" height="16"
                      fill="url(#pcHouseGrad)" stroke="#5c4a32" stroke-width=".7" rx=".5"/>
                <!-- Techo casa -->
                <polygon points="67,630 80,624.5 93,630" fill="#6e4540" stroke="#452a26" stroke-width=".5"/>
                <text x="80" y="637" text-anchor="middle" font-size="3.1" fill="rgba(255,255,255,.9)" font-weight="600">Casa</text>
                <text x="80" y="642" text-anchor="middle" font-size="2.7" fill="rgba(255,255,255,.7)">habitación</text>

                <!-- Tanque de agua -->
                <circle cx="105" cy="638" r="5" fill="#0288d1" stroke="#01579b" stroke-width=".7" opacity=".9"/>
                <text x="105" y="640" text-anchor="middle" font-size="2.8" fill="white" font-weight="600">10kL</text>
                <text x="105" y="648" text-anchor="middle" font-size="2.6" fill="rgba(255,255,255,.7)">Tanque</text>

                <!-- Pozo -->
                <circle cx="118" cy="638" r="4" fill="#01579b" stroke="#80d8ff" stroke-width=".6" opacity=".9"/>
                <!-- Líneas radiales pozo -->
                <line x1="118" y1="634" x2="118" y2="633" stroke="#80d8ff" stroke-width=".6"/>
                <line x1="122" y1="638" x2="123" y2="638" stroke="#80d8ff" stroke-width=".6"/>
                <line x1="118" y1="642" x2="118" y2="643" stroke="#80d8ff" stroke-width=".6"/>
                <line x1="114" y1="638" x2="113" y2="638" stroke="#80d8ff" stroke-width=".6"/>
                <text x="118" y="648" text-anchor="middle" font-size="2.6" fill="rgba(255,255,255,.7)">Pozo</text>

                <!-- Paneles solares (4 rectángulos) -->
                <rect x="130" y="631" width="6" height="4" fill="#1565c0" stroke="#90caf9" stroke-width=".4"/>
                <rect x="137" y="631" width="6" height="4" fill="#1565c0" stroke="#90caf9" stroke-width=".4"/>
                <rect x="130" y="636" width="6" height="4" fill="#1565c0" stroke="#90caf9" stroke-width=".4"/>
                <rect x="137" y="636" width="6" height="4" fill="#1565c0" stroke="#90caf9" stroke-width=".4"/>
                <text x="136" y="645" text-anchor="middle" font-size="2.7" fill="rgba(255,255,255,.7)">Solar 4×450W</text>

                <!-- Bodega/depósito -->
                <rect x="68" y="653" width="14" height="10"
                      fill="#9e9e9e" stroke="#757575" stroke-width=".5" rx=".4"/>
                <text x="75" y="659" text-anchor="middle" font-size="2.6" fill="rgba(0,0,0,.7)">Bodega</text>

                <!-- ══════════════════════════════════════════════════
                     CONTORNO GENERAL DEL TERRENO
                     (encima de las zonas para borde nítido)
                ════════════════════════════════════════════════════ -->
                <!-- Contorno exterior del terreno (trapecio con lados curvados) -->
                <path d="M35,0 L165,0 Q167,88 150,350 L50,350 Q33,88 35,0 Z"
                      fill="none"
                      stroke="#7a8aa0" stroke-width=".9"
                      stroke-linejoin="round"/>

                <!-- Frente / acceso (sur) - debajo del terreno -->
                <rect x="42" y="352" width="116" height="10" fill="#3d4555" stroke="#5a6578" stroke-width=".4" rx=".5"/>
                <text x="100" y="359" text-anchor="middle" font-size="3.4" fill="#aab4c5">Calle de acceso — frente 50 m</text>

                <!-- Fondo norte - arriba -->
                <text x="100" y="-4" text-anchor="middle" font-size="3.4" fill="#7a8aa0">Fondo 65 m (norte)</text>

                <!-- ══════════════════════════════════════════════════
                     CAMINO INTERNO CENTRAL
                ════════════════════════════════════════════════════ -->
                <line x1="100" y1="2" x2="100" y2="700"
                      stroke="#c8a96e" stroke-width="1.4" stroke-dasharray="5,3" opacity=".5"/>

                <!-- ══════════════════════════════════════════════════
                     COTAS / MEDIDAS EXTERIORES
                ════════════════════════════════════════════════════ -->
                <!-- Cota longitud total = 175 m (lado derecho) -->
                <line x1="170" y1="0" x2="170" y2="350" stroke="#556070" stroke-width=".5"/>
                <line x1="167" y1="0" x2="173" y2="0" stroke="#556070" stroke-width=".5"/>
                <line x1="167" y1="350" x2="173" y2="350" stroke="#556070" stroke-width=".5"/>
                <text x="176" y="178" text-anchor="start" font-size="4" fill="#7a8aa0" transform="rotate(90,176,178)">175 m total</text>

                <!-- Cota frente 50 m -->
                <line x1="50" y1="355" x2="150" y2="355" stroke="#556070" stroke-width=".5"/>
                <line x1="50" y1="352" x2="50" y2="358" stroke="#556070" stroke-width=".5"/>
                <line x1="150" y1="352" x2="150" y2="358" stroke="#556070" stroke-width=".5"/>

                <!-- Cota fondo 65 m -->
                <line x1="35" y1="-7" x2="165" y2="-7" stroke="#556070" stroke-width=".5"/>
                <line x1="35" y1="-9" x2="35" y2="-5" stroke="#556070" stroke-width=".5"/>
                <line x1="165" y1="-9" x2="165" y2="-5" stroke="#556070" stroke-width=".5"/>

                <!-- ══════════════════════════════════════════════════
                     ROSA DE LOS VIENTOS (esquina superior derecha)
                ════════════════════════════════════════════════════ -->
                <g transform="translate(248,18)">
                    <!-- Fondo círculo -->
                    <circle cx="0" cy="0" r="12" fill="rgba(0,0,0,.35)" stroke="#4a5568" stroke-width=".6"/>
                    <!-- Flecha Norte (apuntando arriba) -->
                    <polygon points="0,-10 -3,-2 3,-2" fill="#e8eef5"/>
                    <!-- Flecha Sur -->
                    <polygon points="0,10 -3,2 3,2" fill="#4a5568"/>
                    <!-- Flecha Este -->
                    <polygon points="10,0 2,-3 2,3" fill="#4a5568"/>
                    <!-- Flecha Oeste -->
                    <polygon points="-10,0 -2,-3 -2,3" fill="#4a5568"/>
                    <!-- Letras -->
                    <text x="0" y="-13" text-anchor="middle" font-size="4.5" fill="#e8eef5" font-weight="700">N</text>
                    <text x="0" y="17" text-anchor="middle" font-size="3.5" fill="#7a8aa0">S</text>
                    <text x="16" y="1" text-anchor="start" font-size="3.5" fill="#7a8aa0">E</text>
                    <text x="-16" y="1" text-anchor="end" font-size="3.5" fill="#7a8aa0">O</text>
                </g>

                <!-- ══════════════════════════════════════════════════
                     ESCALA GRÁFICA
                ════════════════════════════════════════════════════ -->
                <g transform="translate(200,368)">
                    <!-- Barra de escala: 50 m = 100 px, pero la mostramos en 50 px = 25 m para caber -->
                    <rect x="0" y="0" width="50" height="3" fill="none" stroke="#7a8aa0" stroke-width=".5"/>
                    <rect x="0" y="0" width="25" height="3" fill="#7a8aa0" opacity=".6"/>
                    <line x1="0" y1="-1" x2="0" y2="5" stroke="#7a8aa0" stroke-width=".5"/>
                    <line x1="25" y1="-1" x2="25" y2="5" stroke="#7a8aa0" stroke-width=".5"/>
                    <line x1="50" y1="-1" x2="50" y2="5" stroke="#7a8aa0" stroke-width=".5"/>
                    <text x="0" y="10" text-anchor="middle" font-size="3" fill="#7a8aa0">0</text>
                    <text x="25" y="10" text-anchor="middle" font-size="3" fill="#7a8aa0">25 m</text>
                    <text x="50" y="10" text-anchor="middle" font-size="3" fill="#7a8aa0">50 m</text>
                    <text x="25" y="-4" text-anchor="middle" font-size="2.8" fill="#556070">Escala aprox. 1:500</text>
                </g>

                <!-- ══════════════════════════════════════════════════
                     MARCADORES (definidos en defs o inline)
                ════════════════════════════════════════════════════ -->
                <!-- Marcadores de flecha reutilizables -->
                <defs>
                    <marker id="pcArrowBlue" markerWidth="5" markerHeight="4"
                            refX="5" refY="2" orient="auto">
                        <polygon points="0 0, 5 2, 0 4" fill="#90caf9"/>
                    </marker>
                    <marker id="pcArrowGray" markerWidth="4" markerHeight="3"
                            refX="4" refY="1.5" orient="auto">
                        <polygon points="0 0, 4 1.5, 0 3" fill="rgba(255,255,255,.4)"/>
                    </marker>
                </defs>

                <!-- ══════════════════════════════════════════════════
                     TÍTULO / SELLO
                ════════════════════════════════════════════════════ -->
                <rect x="175" y="60" width="105" height="55" fill="rgba(0,0,0,.3)" stroke="#2a3545" stroke-width=".5" rx="2"/>
                <text x="228" y="71" text-anchor="middle" font-size="4.2" fill="#a8d4b8" font-weight="700">PLANO DE CONSTRUCCIÓN</text>
                <text x="228" y="79" text-anchor="middle" font-size="3.2" fill="#7a8aa0">Granja Productiva · Planeta Rica</text>
                <text x="228" y="86" text-anchor="middle" font-size="3" fill="#7a8aa0">Córdoba, Colombia · 1 ha</text>
                <line x1="180" y1="89" x2="275" y2="89" stroke="#2a3545" stroke-width=".4"/>
                <text x="228" y="95" text-anchor="middle" font-size="2.8" fill="#556070">Orientativo · verificar con topografía</text>
                <text x="228" y="101" text-anchor="middle" font-size="2.8" fill="#556070">Esc. 1:500 aprox. · 2026</text>
                <text x="228" y="108" text-anchor="middle" font-size="2.8" fill="#556070">1 m = 2 px SVG</text>

                <!-- ══════════════════════════════════════════════════
                     NOTAS ETIQUETAS EXTERNAS (indicadores)
                ════════════════════════════════════════════════════ -->
                <!-- Nota piscicultura fuera del terreno -->
                <text x="176" y="280" font-size="3" fill="#90caf9">◀ Piscicultura</text>
                <text x="176" y="285" font-size="2.7" fill="#5585b0">3 pozas / geomembrana</text>
                <text x="176" y="290" font-size="2.7" fill="#5585b0">HDPE 300µ</text>

                <!-- Nota aves -->
                <text x="176" y="415" font-size="3" fill="#ff8a65">◀ Zona Aves</text>
                <text x="176" y="420" font-size="2.7" fill="#a0522d">Bioseguridad 25 m</text>

                <!-- Poste eléctrico / energía cerca de la casa -->
                <!-- Símbolo poste -->
                <line x1="145" y1="650" x2="145" y2="665" stroke="#b0bec5" stroke-width=".8"/>
                <line x1="143" y1="653" x2="147" y2="653" stroke="#b0bec5" stroke-width=".7"/>
                <line x1="142.5" y1="656" x2="147.5" y2="656" stroke="#b0bec5" stroke-width=".7"/>
                <circle cx="145" cy="650" r="1.2" fill="#ffd54f" stroke="#f9a825" stroke-width=".4"/>
                <text x="145" y="670" text-anchor="middle" font-size="2.5" fill="rgba(255,255,255,.5)">Poste</text>

            </svg>
        </div>

        {{-- ── Leyenda lateral ── --}}
        <aside class="pc-legend-aside">
            <h3>Leyenda</h3>
            <ul class="pc-legend-list">
                <li>
                    <span class="sw" style="background:#5d4037"></span>
                    <span><strong>Casa + servicios</strong><br><small style="color:#8b9bb4">~1 200 m² · 12%</small></span>
                </li>
                <li>
                    <span class="sw" style="background:#2e7d32"></span>
                    <span><strong>Hortalizas</strong><br><small style="color:#8b9bb4">10 camas · ~1 500 m² · 15%</small></span>
                </li>
                <li>
                    <span class="sw" style="background:#e65100"></span>
                    <span><strong>Aves (2 galpones)</strong><br><small style="color:#8b9bb4">~800 m² · 8%</small></span>
                </li>
                <li>
                    <span class="sw" style="background:#1565c0"></span>
                    <span><strong>Piscicultura</strong><br><small style="color:#8b9bb4">3 pozas · ~700 m² · 7%</small></span>
                </li>
                <li>
                    <span class="sw" style="background:#388e3c"></span>
                    <span><strong>Plátano Hartón</strong><br><small style="color:#8b9bb4">277 plantas · ~2 500 m² · 25%</small></span>
                </li>
                <li>
                    <span class="sw" style="background:#8bc34a"></span>
                    <span><strong>Yuca + Ñame</strong><br><small style="color:#8b9bb4">~1 500 m² · 15%</small></span>
                </li>
                <li>
                    <span class="sw" style="background:#5a7c4e"></span>
                    <span><strong>Compost + mixto</strong><br><small style="color:#8b9bb4">~1 800 m² · 18%</small></span>
                </li>
            </ul>

            <div class="note">
                <strong>Camino interno</strong><br>
                Línea punteada arena = acceso central 2–3 m de recebo/gravilla desde portón hasta fondo.
            </div>
            <div class="note" style="margin-top:.6rem">
                <strong>Orientación galpones</strong><br>
                Eje E-O para ventilación cruzada natural. Distancia mínima entre galpones: <strong>25 m</strong> (bioseguridad avícola).
            </div>
            <div class="note" style="margin-top:.6rem">
                <strong>Nota de diseño</strong><br>
                Plano orientativo. Validar con topografía, pendientes y normativa municipal antes de construir.
            </div>
        </aside>

    </div>{{-- fin pc-layout --}}

    {{-- ── Panel de datos / Cards ── --}}
    <div class="pc-cards">

        {{-- Card 1: Resumen de áreas --}}
        <div class="pc-card">
            <h4>Resumen de áreas</h4>
            <table>
                <thead>
                    <tr>
                        <th>Zona</th>
                        <th>Área real</th>
                        <th>% terreno</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Casa + servicios</td>
                        <td>1 200 m²</td>
                        <td>12 %</td>
                    </tr>
                    <tr>
                        <td>Hortalizas</td>
                        <td>1 500 m²</td>
                        <td>15 %</td>
                    </tr>
                    <tr>
                        <td>Aves (2 galpones)</td>
                        <td>800 m²</td>
                        <td>8 %</td>
                    </tr>
                    <tr>
                        <td>Piscicultura</td>
                        <td>700 m²</td>
                        <td>7 %</td>
                    </tr>
                    <tr>
                        <td>Plátano</td>
                        <td>2 500 m²</td>
                        <td>25 %</td>
                    </tr>
                    <tr>
                        <td>Yuca + Ñame</td>
                        <td>1 500 m²</td>
                        <td>15 %</td>
                    </tr>
                    <tr>
                        <td>Compost + mixto</td>
                        <td>1 800 m²</td>
                        <td>18 %</td>
                    </tr>
                    <tr>
                        <td><strong>Total</strong></td>
                        <td><strong>10 000 m²</strong></td>
                        <td><strong>100 %</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- Card 2: Medidas clave de construcción --}}
        <div class="pc-card">
            <h4>Medidas clave de construcción</h4>
            <ul>
                <li>Galpón gallinas: 14 m × 8 m = <strong>112 m²</strong> (orient. E-O)</li>
                <li>Galpón pollos: 18 m × 8 m = <strong>144 m²</strong> (orient. E-O)</li>
                <li>Distancia entre galpones: <strong>25 m</strong> (bioseguridad avícola)</li>
                <li>Pozas piscícolas: 2 pozas de <strong>20×10 m</strong> + 1 de <strong>15×8 m</strong></li>
                <li>Camas hortalizas: <strong>10 camas</strong> de 1.2 m × 20 m</li>
                <li>Plátano: <strong>277 plantas</strong> a 3 m × 3 m</li>
                <li>Camino interno: <strong>2–3 m</strong> de ancho (recebo/gravilla)</li>
                <li>Portón acceso: <strong>4 m</strong> de ancho + portillo peatonal</li>
            </ul>
        </div>

        {{-- Card 3: Infraestructura básica --}}
        <div class="pc-card">
            <h4>Infraestructura básica</h4>
            <ul>
                <li>Pozo profundo: 30–50 m, bomba sumergible 3/4 HP</li>
                <li>Tanque elevado: <strong>10 000 L</strong> (4 m de altura)</li>
                <li>Paneles solares: 4 paneles 450 W + inversor 2 kW + baterías</li>
                <li>Geomembrana pozas: HDPE 300 µ impermeable</li>
                <li>Cerramiento perimetral: malla puyante + postes cada 3 m</li>
                <li>Portón acceso: 4 m ancho (camión) + portillo peatonal</li>
                <li>Drenajes: cuneta perimetral en suelo arcilloso</li>
                <li>Compostaje: 2–3 pilas en zona norte + lombricultivo</li>
            </ul>
        </div>

    </div>{{-- fin pc-cards --}}

</div>{{-- fin pc-wrap --}}

</x-filament-panels::page>
