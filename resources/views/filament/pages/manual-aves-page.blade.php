<x-filament-panels::page>

<style>
    /* ===== BASE CARDS ===== */
    .av-card {
        background: #fff;
        border-radius: 0.75rem;
        padding: 1.35rem 1.5rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 1px 4px 0 rgba(0,0,0,0.07);
    }
    .dark .av-card { background: #1e1e2e; }

    .av-card-green  { border: 2px solid #16a34a; }
    .av-card-orange { border: 2px solid #ea580c; }
    .av-card-blue   { border: 2px solid #2563eb; }
    .av-card-red    { border: 2px solid #dc2626; }
    .av-card-yellow { border: 2px solid #ca8a04; background: #fefce8; }
    .dark .av-card-yellow { background: #1c1a07; border-color: #a16207; }
    .av-card-gray   { border: 2px solid #6b7280; }

    /* ===== SECTION TITLES ===== */
    .av-title-green  { font-size:1.15rem; font-weight:700; color:#166534; margin-bottom:0.85rem; display:flex; align-items:center; gap:0.5rem; }
    .av-title-orange { font-size:1.15rem; font-weight:700; color:#9a3412; margin-bottom:0.85rem; display:flex; align-items:center; gap:0.5rem; }
    .av-title-blue   { font-size:1.15rem; font-weight:700; color:#1e40af; margin-bottom:0.85rem; display:flex; align-items:center; gap:0.5rem; }
    .av-title-red    { font-size:1.15rem; font-weight:700; color:#991b1b; margin-bottom:0.85rem; display:flex; align-items:center; gap:0.5rem; }
    .av-title-yellow { font-size:1.15rem; font-weight:700; color:#854d0e; margin-bottom:0.85rem; display:flex; align-items:center; gap:0.5rem; }
    .av-title-gray   { font-size:1.15rem; font-weight:700; color:#374151; margin-bottom:0.85rem; display:flex; align-items:center; gap:0.5rem; }

    .dark .av-title-green  { color:#86efac; }
    .dark .av-title-orange { color:#fed7aa; }
    .dark .av-title-blue   { color:#93c5fd; }
    .dark .av-title-red    { color:#fca5a5; }
    .dark .av-title-yellow { color:#fde68a; }
    .dark .av-title-gray   { color:#d1d5db; }

    .av-subtitle {
        font-size:0.97rem; font-weight:700; color:#374151;
        margin-top:1rem; margin-bottom:0.5rem;
        border-bottom:1px solid #e5e7eb; padding-bottom:0.25rem;
    }
    .dark .av-subtitle { color:#e5e7eb; border-color:#374151; }

    /* ===== TABLES ===== */
    .av-table {
        width:100%; border-collapse:collapse; font-size:0.84rem; margin-top:0.5rem;
    }
    .av-table th {
        padding:0.45rem 0.7rem; text-align:left;
        font-weight:700; border:1px solid #e5e7eb;
    }
    .av-table td {
        padding:0.45rem 0.7rem; border:1px solid #e5e7eb; vertical-align:top;
    }
    .dark .av-table td { border-color:#374151; color:#e5e7eb; }
    .dark .av-table th { border-color:#374151; }
    .av-table tr:nth-child(even) td { background:#f9fafb; }
    .dark .av-table tr:nth-child(even) td { background:#252535; }

    /* Table header variants */
    .th-green  { background:#dcfce7; color:#166534; }
    .th-orange { background:#ffedd5; color:#9a3412; }
    .th-blue   { background:#dbeafe; color:#1e40af; }
    .th-red    { background:#fee2e2; color:#991b1b; }
    .th-yellow { background:#fef9c3; color:#854d0e; }
    .th-gray   { background:#f3f4f6; color:#374151; }
    .dark .th-green  { background:#14532d; color:#86efac; }
    .dark .th-orange { background:#431407; color:#fed7aa; }
    .dark .th-blue   { background:#1e3a5f; color:#93c5fd; }
    .dark .th-red    { background:#450a0a; color:#fca5a5; }
    .dark .th-yellow { background:#422006; color:#fde68a; }
    .dark .th-gray   { background:#1f2937; color:#d1d5db; }

    .av-table tr.av-total td {
        font-weight:800; background:#f0fdf4;
    }
    .dark .av-table tr.av-total td { background:#14532d; color:#86efac; }
    .av-table tr.av-total-orange td {
        font-weight:800; background:#fff7ed;
    }
    .dark .av-table tr.av-total-orange td { background:#431407; color:#fed7aa; }

    /* ===== BADGES ===== */
    .av-badge {
        display:inline-block; padding:0.1rem 0.55rem; border-radius:9999px;
        font-size:0.73rem; font-weight:700;
    }
    .av-badge-green  { background:#dcfce7; color:#166534; }
    .av-badge-orange { background:#ffedd5; color:#9a3412; }
    .av-badge-blue   { background:#dbeafe; color:#1e40af; }
    .av-badge-red    { background:#fee2e2; color:#991b1b; }
    .av-badge-yellow { background:#fef9c3; color:#854d0e; }
    .dark .av-badge-green  { background:#14532d; color:#86efac; }
    .dark .av-badge-orange { background:#431407; color:#fed7aa; }
    .dark .av-badge-blue   { background:#1e3a5f; color:#93c5fd; }
    .dark .av-badge-red    { background:#450a0a; color:#fca5a5; }
    .dark .av-badge-yellow { background:#422006; color:#fde68a; }

    /* ===== HIGHLIGHT / NOTE / INFO BOX ===== */
    .av-note {
        background:#fefce8; border:1px solid #fde68a; border-radius:0.5rem;
        padding:0.7rem 1rem; font-size:0.82rem; color:#78350f; margin-top:0.75rem;
    }
    .dark .av-note { background:#292109; border-color:#854d0e; color:#fde68a; }

    .av-info {
        background:#eff6ff; border:1px solid #bfdbfe; border-radius:0.5rem;
        padding:0.7rem 1rem; font-size:0.82rem; color:#1e40af; margin-top:0.75rem;
    }
    .dark .av-info { background:#1e2d4a; border-color:#1e40af; color:#93c5fd; }

    .av-danger {
        background:#fff1f2; border:1px solid #fecdd3; border-radius:0.5rem;
        padding:0.7rem 1rem; font-size:0.82rem; color:#9f1239; margin-top:0.75rem;
    }
    .dark .av-danger { background:#1f0a0a; border-color:#9f1239; color:#fca5a5; }

    .av-success {
        background:#f0fdf4; border:1px solid #bbf7d0; border-radius:0.5rem;
        padding:0.7rem 1rem; font-size:0.82rem; color:#166534; margin-top:0.75rem;
    }
    .dark .av-success { background:#0a1f0a; border-color:#166534; color:#86efac; }

    /* ===== LISTS ===== */
    .av-ul {
        list-style:disc; padding-left:1.35rem; font-size:0.875rem;
        line-height:1.75; color:#374151;
    }
    .dark .av-ul { color:#e5e7eb; }
    .av-ul li { margin-bottom:0.2rem; }

    .av-ol {
        list-style:decimal; padding-left:1.35rem; font-size:0.875rem;
        line-height:1.75; color:#374151;
    }
    .dark .av-ol { color:#e5e7eb; }

    /* ===== GRID ===== */
    .av-grid-2 {
        display:grid; grid-template-columns:repeat(2,1fr); gap:1rem;
    }
    .av-grid-3 {
        display:grid; grid-template-columns:repeat(3,1fr); gap:1rem;
    }
    @media(max-width:768px){
        .av-grid-2, .av-grid-3 { grid-template-columns:1fr; }
    }

    /* ===== KPI MINI-CARDS ===== */
    .av-kpi-card {
        border-radius:0.6rem; padding:0.85rem 1rem; text-align:center;
        border:1px solid;
    }
    .av-kpi-card .av-kpi-val {
        font-size:1.4rem; font-weight:800; display:block; margin-bottom:0.1rem;
    }
    .av-kpi-card .av-kpi-lbl {
        font-size:0.73rem; font-weight:600; text-transform:uppercase; letter-spacing:0.04em;
    }
    .kpi-green  { background:#dcfce7; border-color:#16a34a; color:#166534; }
    .kpi-orange { background:#ffedd5; border-color:#ea580c; color:#9a3412; }
    .kpi-blue   { background:#dbeafe; border-color:#2563eb; color:#1e40af; }
    .kpi-red    { background:#fee2e2; border-color:#dc2626; color:#991b1b; }
    .dark .kpi-green  { background:#0a1f0a; border-color:#16a34a; color:#86efac; }
    .dark .kpi-orange { background:#1a0d00; border-color:#ea580c; color:#fed7aa; }
    .dark .kpi-blue   { background:#0a1a2e; border-color:#2563eb; color:#93c5fd; }
    .dark .kpi-red    { background:#1a0505; border-color:#dc2626; color:#fca5a5; }

    /* ===== STRONG HIGHLIGHT ===== */
    .av-hl-green  { color:#166534; font-weight:700; }
    .av-hl-orange { color:#9a3412; font-weight:700; }
    .av-hl-blue   { color:#1e40af; font-weight:700; }
    .av-hl-red    { color:#991b1b; font-weight:700; }
    .dark .av-hl-green  { color:#86efac; }
    .dark .av-hl-orange { color:#fed7aa; }
    .dark .av-hl-blue   { color:#93c5fd; }
    .dark .av-hl-red    { color:#fca5a5; }

    /* ===== RESPONSIVE TABLE WRAPPER ===== */
    .av-table-wrap { overflow-x:auto; }
</style>

<div class="space-y-2 text-gray-900 dark:text-gray-100">

<!-- ===================================================================
     CABECERA
     =================================================================== -->
<div class="av-card" style="border:2px solid #16a34a; background:linear-gradient(135deg,#f0fdf4 0%,#dcfce7 100%);">
    <div class="dark:hidden">
        <h1 style="font-size:1.6rem;font-weight:900;color:#14532d;margin-bottom:0.35rem;">
            🐔 Manual Técnico de Cría de Aves
        </h1>
        <p style="font-size:1rem;color:#166534;font-weight:600;">
            Granja Integral · Planeta Rica, Córdoba, Colombia
        </p>
        <p style="font-size:0.82rem;color:#15803d;margin-top:0.25rem;">
            Sistema dual: <strong>500 gallinas ponedoras</strong> (producción continua) +
            <strong>Pollos de ceba</strong> (lotes de 500 · ciclo 45 días) ·
            Zona climática: Trópico bajo, 28°C promedio, humedad 75-85%
        </p>
    </div>
    <div class="hidden dark:block">
        <h1 style="font-size:1.6rem;font-weight:900;color:#86efac;margin-bottom:0.35rem;">
            🐔 Manual Técnico de Cría de Aves
        </h1>
        <p style="font-size:1rem;color:#4ade80;font-weight:600;">
            Granja Integral · Planeta Rica, Córdoba, Colombia
        </p>
        <p style="font-size:0.82rem;color:#86efac;margin-top:0.25rem;">
            Sistema dual: <strong>500 gallinas ponedoras</strong> (producción continua) +
            <strong>Pollos de ceba</strong> (lotes de 500 · ciclo 45 días) ·
            Zona climática: Trópico bajo, 28°C promedio, humedad 75-85%
        </p>
    </div>
</div>

<!-- ===================================================================
     SECCIÓN 1: RESUMEN DEL SISTEMA
     =================================================================== -->
<div class="av-card av-card-gray">
    <div class="av-title-gray">📊 Sección 1 — Resumen del Sistema de Aves</div>

    <div class="av-table-wrap">
    <table class="av-table">
        <thead>
            <tr>
                <th class="th-gray">Parámetro</th>
                <th class="th-green">🐔 Gallinas Ponedoras</th>
                <th class="th-orange">🐣 Pollos de Ceba</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>Cantidad</strong></td>
                <td>500 gallinas</td>
                <td>Lotes de 500 pollos</td>
            </tr>
            <tr>
                <td><strong>Área del galpón</strong></td>
                <td>14 m × 8 m = <span class="av-hl-green">112 m²</span></td>
                <td>18 m × 8 m = <span class="av-hl-orange">144 m²</span></td>
            </tr>
            <tr>
                <td><strong>m² por animal</strong></td>
                <td>0,22 m²/gallina ✅</td>
                <td>0,29 m²/pollo ✅</td>
            </tr>
            <tr>
                <td><strong>Ciclo productivo</strong></td>
                <td>Continuo (18 meses de postura)</td>
                <td>45 días por lote (~8 lotes/año)</td>
            </tr>
            <tr>
                <td><strong>Inversión estimada (galpón + equipo)</strong></td>
                <td><span class="av-hl-green">$16,7M COP</span></td>
                <td><span class="av-hl-orange">$13,8M COP</span></td>
            </tr>
            <tr>
                <td><strong>Ingreso mensual estimado</strong></td>
                <td><span class="av-hl-green">$9,7M COP</span></td>
                <td><span class="av-hl-orange">$1,3M COP (promedio mensual)</span></td>
            </tr>
            <tr>
                <td><strong>Costo alimento/mes</strong></td>
                <td>~$3,3M COP</td>
                <td>~$3,1M COP/lote (45 días)</td>
            </tr>
            <tr>
                <td><strong>Margen bruto estimado</strong></td>
                <td>~$6,4M COP/mes</td>
                <td>~$1,3M COP/lote neto</td>
            </tr>
            <tr>
                <td><strong>Raza recomendada</strong></td>
                <td>Hy-Line Brown / ISA Brown / Lohmann</td>
                <td>Ross 308 / Cobb 500 / Arbor Acres</td>
            </tr>
            <tr>
                <td><strong>Densidad máxima ICA</strong></td>
                <td>7 gallinas/m² (usamos 4,5/m²)</td>
                <td>10-12 pollos/m² fin ciclo (usamos 3,5/m²)</td>
            </tr>
        </tbody>
    </table>
    </div>

    <div class="av-grid-2" style="margin-top:1rem;">
        <div class="av-success">
            <strong>✅ Gallinas ponedoras</strong> — Densidad conservadora de 4,5 aves/m² (máx. ICA: 7/m²).
            Con 500 aves en 112 m², cada gallina tiene 0,22 m². Ideal para clima cálido: mayor ventilación,
            menor estrés calórico, mejor postura.
        </div>
        <div class="av-info">
            <strong>ℹ️ Pollos de ceba</strong> — Densidad de 3,5 pollos/m² al inicio, llegando a ~3,5/m² al sacrificio.
            Holgura deliberada para el trópico caliente de Planeta Rica; el calor es el principal enemigo
            del engorde rápido.
        </div>
    </div>
</div>

<!-- ===================================================================
     SECCIÓN 2: GALPÓN GALLINAS PONEDORAS
     =================================================================== -->
<div class="av-card av-card-green">
    <div class="av-title-green">🏗️ Sección 2 — Galpón de Gallinas Ponedoras · Especificaciones Completas</div>

    <!-- 2.1 Dimensiones -->
    <div class="av-subtitle">2.1 · Dimensiones y orientación</div>
    <div class="av-grid-2">
        <div>
            <table class="av-table">
                <tbody>
                    <tr><td><strong>Largo</strong></td><td><span class="av-hl-green">14 metros</span> (eje Este → Oeste — OBLIGATORIO)</td></tr>
                    <tr><td><strong>Ancho</strong></td><td>8 metros</td></tr>
                    <tr><td><strong>Área total</strong></td><td>112 m²</td></tr>
                    <tr><td><strong>Altura paredes laterales</strong></td><td>2,2 metros</td></tr>
                    <tr><td><strong>Altura cumbrera</strong></td><td>3,5 metros (techo a dos aguas)</td></tr>
                    <tr><td><strong>Pendiente del techo</strong></td><td>30° mínimo (evacuación de lluvia)</td></tr>
                    <tr><td><strong>Alero lateral</strong></td><td>0,8 metros (protege de lluvia)</td></tr>
                    <tr><td><strong>Piso</strong></td><td>Cemento rugoso antideslizante</td></tr>
                    <tr><td><strong>Cama</strong></td><td>Viruta de madera seca, 8-10 cm espesor</td></tr>
                    <tr><td><strong>Capacidad</strong></td><td>500 gallinas cómodamente</td></tr>
                </tbody>
            </table>
        </div>
        <div>
            <div class="av-note">
                <strong>⚠️ Orientación Este–Oeste OBLIGATORIA</strong><br>
                El sol sale por el Este y se oculta por el Oeste. Con el eje largo en esta dirección,
                los muros de malla (norte y sur) reciben brisa cruzada permanente, mientras que
                las paredes largas quedan en sombra la mayor parte del día. En Planeta Rica
                (28°C promedio), esto puede reducir la temperatura interior 4-6°C frente a
                una orientación Norte–Sur.
            </div>
            <div class="av-info" style="margin-top:0.6rem;">
                <strong>🌡️ Temperatura ideal gallinas:</strong> 18-22°C.<br>
                En Planeta Rica (~28°C): malla sombra 80% + aleros + cortinas obligatorios.
                Cada 1°C sobre 25°C reduce postura ~1,5%.
            </div>
        </div>
    </div>

    <!-- 2.2 Materiales y costos -->
    <div class="av-subtitle">2.2 · Construcción — Materiales y cantidades</div>
    <div class="av-table-wrap">
    <table class="av-table">
        <thead>
            <tr>
                <th class="th-green">Material</th>
                <th class="th-green">Cantidad</th>
                <th class="th-green">Precio unit. (COP)</th>
                <th class="th-green">Total (COP)</th>
                <th class="th-green">Observación</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Bloque de cemento (15×20×40 cm)</td>
                <td>520 und</td>
                <td>$2.500</td>
                <td>$1.300.000</td>
                <td>Muros bajos (0–0,5 m) y columnas</td>
            </tr>
            <tr>
                <td>Cemento (bulto 50 kg)</td>
                <td>18 und</td>
                <td>$38.000</td>
                <td>$684.000</td>
                <td>Pega bloques + piso</td>
            </tr>
            <tr>
                <td>Arena gruesa</td>
                <td>4 m³</td>
                <td>$80.000</td>
                <td>$320.000</td>
                <td>Mezcla y piso</td>
            </tr>
            <tr>
                <td>Zinc galvanizado cal. 26 (lámina 1m×3m)</td>
                <td>54 láminas</td>
                <td>$78.000</td>
                <td>$4.212.000</td>
                <td>Techo a dos aguas + aleros</td>
            </tr>
            <tr>
                <td>Madera rolliza (estructura techo, 4–5 m)</td>
                <td>20 und</td>
                <td>$35.000</td>
                <td>$700.000</td>
                <td>Correas, viguetas, cumbrera</td>
            </tr>
            <tr>
                <td>Malla gallinera cal. 16, ojo 2,5 cm (rollo 100 m)</td>
                <td>2 rollos</td>
                <td>$280.000</td>
                <td>$560.000</td>
                <td>Muros laterales 0,5 m a 2,2 m</td>
            </tr>
            <tr>
                <td>Malla sombra negra 80% (metro lineal, 4 m ancho)</td>
                <td>30 m</td>
                <td>$8.500</td>
                <td>$255.000</td>
                <td>Sobre el zinc, reduce T° 5-8°C</td>
            </tr>
            <tr>
                <td>Cortina de polipropileno (rollo 1m×50m)</td>
                <td>2 rollos</td>
                <td>$120.000</td>
                <td>$240.000</td>
                <td>Laterales: sube de noche/lluvia</td>
            </tr>
            <tr>
                <td>Clavos, alambre galvanizado, tornillos</td>
                <td>Global</td>
                <td>—</td>
                <td>$150.000</td>
                <td>Varios calibres</td>
            </tr>
            <tr>
                <td>Mano de obra construcción (10 días, 2 personas)</td>
                <td>Global</td>
                <td>—</td>
                <td>$1.800.000</td>
                <td>Albañil + ayudante</td>
            </tr>
            <tr class="av-total">
                <td colspan="3"><strong>TOTAL GALPÓN GALLINAS PONEDORAS</strong></td>
                <td><strong>$10.221.000</strong></td>
                <td><strong>Sin equipos internos</strong></td>
            </tr>
        </tbody>
    </table>
    </div>

    <!-- 2.3 Paredes -->
    <div class="av-subtitle">2.3 · Sistema de paredes</div>
    <ul class="av-ul">
        <li><strong>Zócalo (0 a 0,5 m):</strong> bloque de cemento para protección contra salpicadura de lluvia y depredadores pequeños</li>
        <li><strong>Parte alta (0,5 m a 2,2 m):</strong> malla gallinera calibre 16, ojo de malla 2,5 cm, fijada en postes de madera o tubería</li>
        <li><strong>Frente y fondo:</strong> mismo sistema que laterales + puerta doble de 1 m × 2 m con malla (evitar corrientes frontales)</li>
        <li><strong>Antecámara (opcional, recomendada):</strong> 1,5 m de largo frente a la puerta principal, con pediluvio y cambio de calzado</li>
    </ul>

    <!-- 2.4 Techo -->
    <div class="av-subtitle">2.4 · Techo</div>
    <ul class="av-ul">
        <li>Zinc galvanizado calibre 26 en dos aguas, pendiente mínima 30° para evacuación rápida en lluvias torrenciales</li>
        <li>Sobre el zinc: malla sombra 80% negra — reduce radiación solar directa y baja temperatura interior 5-8°C</li>
        <li>Alero de <strong>0,8 m</strong> en laterales: protege muros de malla de la lluvia; reduce salpicadura sobre la cama</li>
        <li>Espacio de ventilación en cumbrera (abertura de 15-20 cm en la cima del techo): libera aire caliente por convección</li>
        <li>No usar cielo raso (falso techo): el volumen de aire libre sobre las aves ayuda a disipar calor</li>
    </ul>

    <!-- 2.5 Ventilación -->
    <div class="av-subtitle">2.5 · Ventilación (crítica en clima cálido)</div>
    <div class="av-grid-2">
        <ul class="av-ul">
            <li>Ventilación cruzada natural: muros de malla de lado a lado (norte–sur), sin obstáculos</li>
            <li>Cortinas polipropileno en laterales: <strong>bajar de día</strong> (protege del viento y la lluvia), <strong>subir de noche</strong> para máxima ventilación nocturna</li>
            <li>En verano o días críticos (&gt;32°C interior): activar ventiladores axiales tipo "tunel" (2 de 60 cm, $350.000 c/u)</li>
            <li>Presión de vapor del agua en el galpón: abrir cortinas desde las 6 am para eliminar humedad acumulada</li>
        </ul>
        <div>
            <table class="av-table">
                <thead><tr><th class="th-green">Situación</th><th class="th-green">Cortinas</th></tr></thead>
                <tbody>
                    <tr><td>Día soleado, sin lluvia</td><td>Enrolladas (abiertas)</td></tr>
                    <tr><td>Lluvia intensa</td><td>Bajadas (cerradas)</td></tr>
                    <tr><td>Noche fresca</td><td>Enrolladas o semi-abiertas</td></tr>
                    <tr><td>Noche &lt;18°C (raro)</td><td>Bajadas para conservar calor</td></tr>
                    <tr><td>T° interior &gt;30°C</td><td>Enrolladas + ventiladores ON</td></tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- 2.6 Equipos internos -->
    <div class="av-subtitle">2.6 · Equipos internos — tabla completa</div>
    <div class="av-table-wrap">
    <table class="av-table">
        <thead>
            <tr>
                <th class="th-green">Equipo</th>
                <th class="th-green">Cantidad</th>
                <th class="th-green">Cálculo base</th>
                <th class="th-green">Precio unit. (COP)</th>
                <th class="th-green">Total (COP)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Nidal (35×35×35 cm)</td>
                <td>100 nidales</td>
                <td>1 por cada 5 gallinas</td>
                <td>$25.000</td>
                <td>$2.500.000</td>
            </tr>
            <tr>
                <td>Comedero tolva colgante 12 kg</td>
                <td>10 und</td>
                <td>1 por cada 50 gallinas</td>
                <td>$95.000</td>
                <td>$950.000</td>
            </tr>
            <tr>
                <td>Bebedero nipple (línea de 10 nipples, tubo PVC ½")</td>
                <td>55 nipples (6 líneas)</td>
                <td>1 nipple c/8-10 gallinas</td>
                <td>$18.000</td>
                <td>$900.000</td>
            </tr>
            <tr>
                <td>Perchero (tubo PVC 3m, 3 niveles)</td>
                <td>25 tubos</td>
                <td>25 cm de percha/gallina, 3 alturas</td>
                <td>$22.000</td>
                <td>$550.000</td>
            </tr>
            <tr>
                <td>Criadora a gas (pollitas 1ª-2ª semana)</td>
                <td>2 und</td>
                <td>Cubre 300 pollitas c/u en fase inicial</td>
                <td>$180.000</td>
                <td>$360.000</td>
            </tr>
            <tr>
                <td>Termómetro ambiental</td>
                <td>2 und</td>
                <td>Centro y extremo del galpón</td>
                <td>$15.000</td>
                <td>$30.000</td>
            </tr>
            <tr>
                <td>Pediluvio (bandeja plástica 60×40 cm)</td>
                <td>1 und</td>
                <td>Bioseguridad — entrada principal</td>
                <td>$85.000</td>
                <td>$85.000</td>
            </tr>
            <tr>
                <td>Báscula digital (hasta 5 kg)</td>
                <td>1 und</td>
                <td>Control de peso semanal</td>
                <td>$120.000</td>
                <td>$120.000</td>
            </tr>
            <tr>
                <td>Canastas recolección huevos (plástico)</td>
                <td>6 und</td>
                <td>2 recolecciones/día</td>
                <td>$18.000</td>
                <td>$108.000</td>
            </tr>
            <tr>
                <td>Iluminación LED (lámparas 15W + temporizador)</td>
                <td>6 lámparas + 1 timer</td>
                <td>16h luz/día para mantener postura</td>
                <td>$25.000 / $85.000</td>
                <td>$235.000</td>
            </tr>
            <tr class="av-total">
                <td colspan="4"><strong>TOTAL EQUIPOS GALPÓN GALLINAS</strong></td>
                <td><strong>~$5.838.000</strong></td>
            </tr>
            <tr class="av-total">
                <td colspan="4"><strong>TOTAL GALPÓN + EQUIPOS GALLINAS</strong></td>
                <td><strong>~$16.059.000</strong></td>
            </tr>
        </tbody>
    </table>
    </div>

    <div class="av-note">
        <strong>💡 Iluminación artificial:</strong> Las gallinas requieren <strong>16 horas de luz</strong> para máxima postura.
        En trópico hay ~12h de luz natural. Se complementan 4h adicionales con LED (al amanecer o al atardecer).
        Un temporizador programable ($85.000) automatiza esto sin intervención diaria.
    </div>
</div>

<!-- ===================================================================
     SECCIÓN 3: GALPÓN POLLOS DE CEBA
     =================================================================== -->
<div class="av-card av-card-orange">
    <div class="av-title-orange">🏗️ Sección 3 — Galpón de Pollos de Ceba · Especificaciones Completas</div>

    <!-- 3.1 Dimensiones -->
    <div class="av-subtitle">3.1 · Dimensiones y características</div>
    <div class="av-grid-2">
        <table class="av-table">
            <tbody>
                <tr><td><strong>Largo</strong></td><td><span class="av-hl-orange">18 metros</span> (eje Este → Oeste)</td></tr>
                <tr><td><strong>Ancho</strong></td><td>8 metros</td></tr>
                <tr><td><strong>Área total</strong></td><td>144 m²</td></tr>
                <tr><td><strong>Altura paredes</strong></td><td>2,2 metros</td></tr>
                <tr><td><strong>Altura cumbrera</strong></td><td>3,5 metros (a dos aguas)</td></tr>
                <tr><td><strong>Pendiente techo</strong></td><td>30°</td></tr>
                <tr><td><strong>Alero lateral</strong></td><td>0,8 metros</td></tr>
                <tr><td><strong>Piso</strong></td><td>Cemento rugoso</td></tr>
                <tr><td><strong>Cama</strong></td><td>Viruta seca 8 cm (se renueva cada lote)</td></tr>
                <tr><td><strong>Zona de crianza</strong></td><td>Primer 30% del galpón cerrado (días 1-21)</td></tr>
            </tbody>
        </table>
        <div>
            <div class="av-note">
                <strong>⚠️ Diferencias vs. galpón gallinas:</strong><br>
                — Sin nidales (pollos de ceba no ponen huevos)<br>
                — Sin percheros (pollos se crían en piso)<br>
                — Con zona de crianza cerrada los primeros 21 días (cortinas internas que reducen el espacio disponible para mantener el calor de las criadoras)<br>
                — Requiere limpieza y descanso total entre lotes (sistema "todo adentro / todo afuera")
            </div>
        </div>
    </div>

    <!-- 3.2 Materiales y costos -->
    <div class="av-subtitle">3.2 · Construcción — Materiales y costos</div>
    <div class="av-table-wrap">
    <table class="av-table">
        <thead>
            <tr>
                <th class="th-orange">Material</th>
                <th class="th-orange">Cantidad</th>
                <th class="th-orange">Precio unit. (COP)</th>
                <th class="th-orange">Total (COP)</th>
                <th class="th-orange">Observación</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Bloque de cemento (15×20×40 cm)</td>
                <td>620 und</td>
                <td>$2.500</td>
                <td>$1.550.000</td>
                <td>Galpón más largo (+4 m)</td>
            </tr>
            <tr>
                <td>Cemento (bulto 50 kg)</td>
                <td>22 und</td>
                <td>$38.000</td>
                <td>$836.000</td>
                <td>Pega + piso</td>
            </tr>
            <tr>
                <td>Arena gruesa</td>
                <td>5 m³</td>
                <td>$80.000</td>
                <td>$400.000</td>
                <td></td>
            </tr>
            <tr>
                <td>Zinc galvanizado cal. 26 (lámina 1m×3m)</td>
                <td>66 láminas</td>
                <td>$78.000</td>
                <td>$5.148.000</td>
                <td>Techo a dos aguas + aleros</td>
            </tr>
            <tr>
                <td>Madera rolliza (estructura techo)</td>
                <td>24 und</td>
                <td>$35.000</td>
                <td>$840.000</td>
                <td></td>
            </tr>
            <tr>
                <td>Malla gallinera cal. 16, ojo 2,5 cm (rollo 100 m)</td>
                <td>2 rollos</td>
                <td>$280.000</td>
                <td>$560.000</td>
                <td></td>
            </tr>
            <tr>
                <td>Malla sombra negra 80% (metro lineal)</td>
                <td>36 m</td>
                <td>$8.500</td>
                <td>$306.000</td>
                <td></td>
            </tr>
            <tr>
                <td>Cortina de polipropileno (rollo)</td>
                <td>2 rollos</td>
                <td>$120.000</td>
                <td>$240.000</td>
                <td></td>
            </tr>
            <tr>
                <td>Cortinas internas de crianza (plástico 2 m)</td>
                <td>4 rollos</td>
                <td>$45.000</td>
                <td>$180.000</td>
                <td>Zona caliente primeras 3 semanas</td>
            </tr>
            <tr>
                <td>Clavos, alambre, tornillos</td>
                <td>Global</td>
                <td>—</td>
                <td>$180.000</td>
                <td></td>
            </tr>
            <tr>
                <td>Mano de obra construcción (12 días)</td>
                <td>Global</td>
                <td>—</td>
                <td>$2.160.000</td>
                <td>Albañil + 2 ayudantes</td>
            </tr>
            <tr class="av-total-orange">
                <td colspan="3"><strong>TOTAL GALPÓN POLLOS DE CEBA</strong></td>
                <td><strong>$12.400.000</strong></td>
                <td><strong>Sin equipos internos</strong></td>
            </tr>
        </tbody>
    </table>
    </div>

    <!-- 3.3 Equipos -->
    <div class="av-subtitle">3.3 · Equipos internos — pollos de ceba</div>
    <div class="av-table-wrap">
    <table class="av-table">
        <thead>
            <tr>
                <th class="th-orange">Equipo</th>
                <th class="th-orange">Cantidad</th>
                <th class="th-orange">Cálculo base</th>
                <th class="th-orange">Precio unit. (COP)</th>
                <th class="th-orange">Total (COP)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Comedero tubular 10 kg (plástico)</td>
                <td>10 und</td>
                <td>1 comedero cada 50 pollos</td>
                <td>$68.000</td>
                <td>$680.000</td>
            </tr>
            <tr>
                <td>Bebedero campana automático (plástico)</td>
                <td>10 und</td>
                <td>1 bebedero cada 50 pollos</td>
                <td>$85.000</td>
                <td>$850.000</td>
            </tr>
            <tr>
                <td>Bebedero de inicio tipo "corona" o platillo</td>
                <td>30 und</td>
                <td>Primeras 72 horas, 1 c/15-20 pollos</td>
                <td>$8.500</td>
                <td>$255.000</td>
            </tr>
            <tr>
                <td>Criadora a gas de 1.500 BTU</td>
                <td>3 und</td>
                <td>1 criadora por cada ~170 pollos (semana 1)</td>
                <td>$220.000</td>
                <td>$660.000</td>
            </tr>
            <tr>
                <td>Cilindro de gas propano 20 kg</td>
                <td>2 und</td>
                <td>Consumo ~3 kg/día primeras 2 semanas</td>
                <td>$130.000</td>
                <td>$260.000</td>
            </tr>
            <tr>
                <td>Termómetro ambiental</td>
                <td>2 und</td>
                <td>Centro y extremo del galpón</td>
                <td>$15.000</td>
                <td>$30.000</td>
            </tr>
            <tr>
                <td>Pediluvio (bandeja plástica)</td>
                <td>1 und</td>
                <td>Bioseguridad — entrada</td>
                <td>$85.000</td>
                <td>$85.000</td>
            </tr>
            <tr>
                <td>Báscula digital (hasta 10 kg)</td>
                <td>1 und</td>
                <td>Pesaje semanal muestra 10% del lote</td>
                <td>$145.000</td>
                <td>$145.000</td>
            </tr>
            <tr class="av-total-orange">
                <td colspan="4"><strong>TOTAL EQUIPOS GALPÓN POLLOS</strong></td>
                <td><strong>~$2.965.000</strong></td>
            </tr>
            <tr class="av-total-orange">
                <td colspan="4"><strong>TOTAL GALPÓN + EQUIPOS POLLOS</strong></td>
                <td><strong>~$15.365.000</strong></td>
            </tr>
        </tbody>
    </table>
    </div>
</div>

<!-- ===================================================================
     SECCIÓN 4: DISTANCIAS Y UBICACIÓN
     =================================================================== -->
<div class="av-card av-card-yellow">
    <div class="av-title-yellow">⚠️ Sección 4 — Distancias, Ubicación y Orientación en la Finca</div>

    <div class="av-danger">
        <strong>🚨 ATENCIÓN — Normativa ICA Colombia (Resolución 3651/2014 y ss.):</strong>
        Las distancias mínimas entre instalaciones avícolas y otras estructuras son
        <strong>obligatorias</strong>. Incumplirlas puede resultar en clausura del galpón,
        multas o prohibición de comercializar aves. Verifique con la UMATA municipal de
        Planeta Rica antes de construir.
    </div>

    <div class="av-subtitle" style="margin-top:1rem;">Distancias mínimas obligatorias (bioseguridad y normativa ICA)</div>
    <div class="av-table-wrap">
    <table class="av-table">
        <thead>
            <tr>
                <th class="th-yellow">Entre...</th>
                <th class="th-yellow">Distancia mínima</th>
                <th class="th-yellow">Justificación técnica</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>🐔 Galpón gallinas ↔ 🐣 Galpón pollos</td>
                <td><strong>25 metros</strong></td>
                <td>Evitar contagio cruzado Newcastle, Gumboro, Bronquitis; ciclos sanitarios diferentes</td>
            </tr>
            <tr>
                <td>Galpones ↔ Casa habitación</td>
                <td><strong>50 metros</strong></td>
                <td>Olores (NH₃, H₂S), gases tóxicos, ruido, polvo con bacterias en suspensión</td>
            </tr>
            <tr>
                <td>Galpones ↔ Pozas de peces / estanques</td>
                <td><strong>30 metros</strong></td>
                <td>Evitar contaminación del agua con heces y patógenos aviares; gallinaza acidifica estanques</td>
            </tr>
            <tr>
                <td>Galpones ↔ Huerta / cultivos hortícolas</td>
                <td><strong>20 metros</strong></td>
                <td>Evitar contaminación de hortalizas con Salmonella, E. coli; polvo con excremento</td>
            </tr>
            <tr>
                <td>Galpones ↔ Pozo de agua potable</td>
                <td><strong>100 metros</strong> (aguas arriba)</td>
                <td>Proteger la fuente de agua subterránea de lixiviados de la gallinaza; criterio más restrictivo</td>
            </tr>
            <tr>
                <td>Galpones ↔ Límite del vecino / vía pública</td>
                <td><strong>50 metros</strong> mínimo</td>
                <td>Normativa municipal + cortesía; olores y ruido afectan colindantes</td>
            </tr>
            <tr>
                <td>Galpones ↔ Bodega de alimentos / concentrado</td>
                <td><strong>10 metros</strong></td>
                <td>Evitar contaminación cruzada; roedores que van del galpón a la bodega</td>
            </tr>
            <tr>
                <td>Área de compostaje gallinaza ↔ Galpones</td>
                <td><strong>30 metros</strong></td>
                <td>Evitar recontaminación; la gallinaza en fermentación genera calor y amoniaco</td>
            </tr>
        </tbody>
    </table>
    </div>

    <div class="av-subtitle">Orientación y posicionamiento en tu finca</div>
    <div class="av-grid-2">
        <div>
            <div class="av-success">
                <strong>✅ Regla de oro: eje largo Este → Oeste</strong><br>
                El sol sale por el Este y se oculta por el Oeste. Con la cumbrera en este eje:
                <ul style="margin-top:0.4rem;padding-left:1.2rem;line-height:1.7;">
                    <li>Los muros largos (norte y sur) quedan perpendiculares al sol: reciben sombra la mayoría del día</li>
                    <li>Los muros de malla cortos (este y oeste) reciben la brisa dominante Caribe (NE-SO en Córdoba)</li>
                    <li>Resultado: máxima ventilación cruzada + mínima radiación directa sobre las aves</li>
                </ul>
            </div>
        </div>
        <div>
            <div class="av-info">
                <strong>ℹ️ Distribución en tu finca (zona aves 800 m², entre y=78m y y=48m del plano):</strong>
                <ul style="margin-top:0.4rem;padding-left:1.2rem;line-height:1.7;">
                    <li>Galpón gallinas (14×8m): desde límite izquierdo, orientado E-O</li>
                    <li>Galpón pollos (18×8m): 25 m al norte del galpón gallinas</li>
                    <li>Pasillo entre galpones: 3 m de ancho, piso de grava o cemento</li>
                    <li>Cerco perimetral del área aves: malla puyante 2,4 m + alambre de púas en la cima</li>
                    <li>Zona de compostaje de gallinaza: extremo norte del área, con ventilación natural</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="av-note" style="margin-top:1rem;">
        <strong>📋 Checklist antes de construir:</strong><br>
        ☐ Verificar distancias en el plano de la finca con cinta métrica<br>
        ☐ Consultar UMATA de Planeta Rica (Resolución ICA 3651/2014)<br>
        ☐ Confirmar orientación con brújula o GPS (el eje largo debe ser exactamente E-O ±10°)<br>
        ☐ Verificar que el terreno tenga desnivel del 2-3% para drenaje natural (los galpones no deben anegarse)<br>
        ☐ Confirmar acceso de vehículo para entrega de concentrado (camión de 2 toneladas mínimo)
    </div>
</div>

<!-- ===================================================================
     SECCIÓN 5: ALIMENTACIÓN GALLINAS PONEDORAS
     =================================================================== -->
<div class="av-card av-card-green">
    <div class="av-title-green">🌽 Sección 5 — Plan de Alimentación · Gallinas Ponedoras</div>

    <div class="av-subtitle">5.1 · Fases y requerimientos nutricionales por etapa</div>
    <div class="av-table-wrap">
    <table class="av-table">
        <thead>
            <tr>
                <th class="th-green">Etapa</th>
                <th class="th-green">Edad</th>
                <th class="th-green">Proteína</th>
                <th class="th-green">Energía kcal/kg</th>
                <th class="th-green">Calcio</th>
                <th class="th-green">Consumo/día/ave</th>
                <th class="th-green">Consumo 500 aves/día</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><span class="av-badge av-badge-blue">Inicio (pollita)</span></td>
                <td>1-8 semanas</td>
                <td>21%</td>
                <td>2.900</td>
                <td>1,0%</td>
                <td>25-40 g</td>
                <td>12,5-20 kg</td>
            </tr>
            <tr>
                <td><span class="av-badge av-badge-blue">Crecimiento</span></td>
                <td>9-12 semanas</td>
                <td>18%</td>
                <td>2.850</td>
                <td>0,9%</td>
                <td>50-65 g</td>
                <td>25-32 kg</td>
            </tr>
            <tr>
                <td><span class="av-badge av-badge-yellow">Desarrollo</span></td>
                <td>13-17 semanas</td>
                <td>15%</td>
                <td>2.800</td>
                <td>0,9%</td>
                <td>70-85 g</td>
                <td>35-42 kg</td>
            </tr>
            <tr>
                <td><span class="av-badge av-badge-yellow">Pre-postura</span></td>
                <td>18-20 semanas</td>
                <td>16%</td>
                <td>2.750</td>
                <td>2,0%</td>
                <td>90-100 g</td>
                <td>45-50 kg</td>
            </tr>
            <tr>
                <td><span class="av-badge av-badge-green">Postura activa</span></td>
                <td>20+ semanas (18 meses)</td>
                <td>16-17%</td>
                <td>2.750</td>
                <td>3,5-4,0%</td>
                <td><strong>110-120 g</strong></td>
                <td><strong>55-60 kg/día</strong></td>
            </tr>
        </tbody>
    </table>
    </div>

    <div class="av-subtitle">5.2 · Costo mensual de alimentación — 500 gallinas en postura</div>
    <div class="av-grid-3">
        <div class="av-kpi-card kpi-green">
            <span class="av-kpi-val">57,5 kg</span>
            <span class="av-kpi-lbl">Alimento por día (500 aves × 115 g)</span>
        </div>
        <div class="av-kpi-card kpi-green">
            <span class="av-kpi-val">1.725 kg</span>
            <span class="av-kpi-lbl">Alimento por mes (57,5 × 30 días)</span>
        </div>
        <div class="av-kpi-card kpi-green">
            <span class="av-kpi-val">$3.277.500</span>
            <span class="av-kpi-lbl">Costo mensual alimento ($1.900/kg)</span>
        </div>
    </div>

    <div class="av-subtitle" style="margin-top:1rem;">5.3 · Agua — consumo de 500 gallinas en postura</div>
    <div class="av-grid-3">
        <div class="av-kpi-card kpi-blue">
            <span class="av-kpi-val">130 L/día</span>
            <span class="av-kpi-lbl">Consumo diario (260 ml/gallina)</span>
        </div>
        <div class="av-kpi-card kpi-blue">
            <span class="av-kpi-val">200 L/día</span>
            <span class="av-kpi-lbl">Pico en días calurosos (&gt;30°C)</span>
        </div>
        <div class="av-kpi-card kpi-blue">
            <span class="av-kpi-val">3.900 L/mes</span>
            <span class="av-kpi-lbl">Consumo mensual estimado</span>
        </div>
    </div>

    <div class="av-subtitle" style="margin-top:1rem;">5.4 · Suplementos recomendados para zona tropical cálida</div>
    <div class="av-table-wrap">
    <table class="av-table">
        <thead>
            <tr>
                <th class="th-green">Suplemento</th>
                <th class="th-green">Dosis / Modo</th>
                <th class="th-green">Frecuencia</th>
                <th class="th-green">Beneficio</th>
                <th class="th-green">Costo aprox.</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Conchilla de ostras o piedra caliza molida</td>
                <td>Ad libitum en tolva separada</td>
                <td>Permanente</td>
                <td>Calcio extra: mayor resistencia de cáscara del huevo</td>
                <td>$45.000/50 kg</td>
            </tr>
            <tr>
                <td>Vitaminas + electrolitos en agua</td>
                <td>1 ml/L agua</td>
                <td>2 veces/semana (más frecuente en calor)</td>
                <td>Reduce estrés calórico, mantiene postura</td>
                <td>$85.000/sachets x12</td>
            </tr>
            <tr>
                <td>Probióticos (Lactobacillus)</td>
                <td>Según etiqueta producto</td>
                <td>1 vez/semana</td>
                <td>Mejora absorción intestinal, reduce diarreas</td>
                <td>$70.000/frasco</td>
            </tr>
            <tr>
                <td>Sal mineral avícola</td>
                <td>0,1% en el alimento (1 kg por cada 1.000 kg de concentrado)</td>
                <td>Permanente en mezcla</td>
                <td>Microminerales, previene picaje de plumas</td>
                <td>$28.000/kg</td>
            </tr>
            <tr>
                <td>Bicarbonato de sodio</td>
                <td>0,1-0,2% en agua</td>
                <td>Días de calor extremo (&gt;32°C)</td>
                <td>Compensa alcalosis respiratoria por jadeo; mejora cáscara</td>
                <td>$3.500/kg</td>
            </tr>
        </tbody>
    </table>
    </div>

    <div class="av-note">
        <strong>💡 Regla de oro del trópico:</strong> En Planeta Rica, cuando la temperatura supera 30°C,
        las gallinas reducen el consumo de concentrado hasta un 20%, pero su demanda de agua se duplica.
        Garantizar agua fresca y limpia las 24 horas es <strong>más importante que la calidad del concentrado</strong>
        durante los días de calor extremo.
    </div>
</div>

<!-- ===================================================================
     SECCIÓN 6: ALIMENTACIÓN POLLOS DE CEBA
     =================================================================== -->
<div class="av-card av-card-orange">
    <div class="av-title-orange">🌽 Sección 6 — Plan de Alimentación · Pollos de Ceba (Lote 500 · 45 días)</div>

    <div class="av-subtitle">6.1 · Programa de alimentación semanal</div>
    <div class="av-table-wrap">
    <table class="av-table">
        <thead>
            <tr>
                <th class="th-orange">Semana</th>
                <th class="th-orange">Días</th>
                <th class="th-orange">Tipo concentrado</th>
                <th class="th-orange">Proteína</th>
                <th class="th-orange">Consumo/ave/día</th>
                <th class="th-orange">Consumo 500/día</th>
                <th class="th-orange">Consumo acumulado</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>Semana 1</strong></td>
                <td>1-7</td>
                <td>Preiniciador / Iniciador</td>
                <td>23%</td>
                <td>15-25 g</td>
                <td>7,5-12 kg</td>
                <td>~50 kg</td>
            </tr>
            <tr>
                <td><strong>Semana 2</strong></td>
                <td>8-14</td>
                <td>Iniciador</td>
                <td>23%</td>
                <td>35-50 g</td>
                <td>17-25 kg</td>
                <td>~150 kg</td>
            </tr>
            <tr>
                <td><strong>Semana 3</strong></td>
                <td>15-21</td>
                <td>Crecimiento</td>
                <td>20%</td>
                <td>60-80 g</td>
                <td>30-40 kg</td>
                <td>~360 kg</td>
            </tr>
            <tr>
                <td><strong>Semana 4</strong></td>
                <td>22-28</td>
                <td>Crecimiento</td>
                <td>20%</td>
                <td>85-105 g</td>
                <td>42-52 kg</td>
                <td>~720 kg</td>
            </tr>
            <tr>
                <td><strong>Semana 5</strong></td>
                <td>29-35</td>
                <td>Engorde</td>
                <td>18%</td>
                <td>110-130 g</td>
                <td>55-65 kg</td>
                <td>~1.175 kg</td>
            </tr>
            <tr>
                <td><strong>Semana 6</strong></td>
                <td>36-42</td>
                <td>Finalización</td>
                <td>17%</td>
                <td>140-160 g</td>
                <td>70-80 kg</td>
                <td>~1.730 kg</td>
            </tr>
            <tr>
                <td><strong>Semana 7 (parcial)</strong></td>
                <td>43-45</td>
                <td>Finalización (sin medicamentos)</td>
                <td>17%</td>
                <td>165-175 g</td>
                <td>82-87 kg</td>
                <td>~2.000 kg</td>
            </tr>
        </tbody>
    </table>
    </div>

    <div class="av-note">
        <strong>⚠️ Retiro de medicamentos:</strong> Los últimos 7 días antes del sacrificio
        (días 38-45), se debe retirar cualquier medicamento o anticoccidial del alimento.
        Usar concentrado "Finalización sin medicamentos". Obligatorio para seguridad alimentaria
        y exigido por procesadoras y supermercados.
    </div>

    <div class="av-subtitle">6.2 · Resumen económico por lote de 500 pollos</div>
    <div class="av-grid-2">
        <table class="av-table">
            <thead><tr><th class="th-orange">Concepto</th><th class="th-orange">Valor (COP)</th></tr></thead>
            <tbody>
                <tr><td>Pollitos de 1 día (500 × $4.200)</td><td>$2.100.000</td></tr>
                <tr><td>Alimento total lote (~8.000 kg × $1.750)</td><td>$14.000.000</td></tr>
                <tr><td>Vacunas y medicamentos</td><td>$350.000</td></tr>
                <tr><td>Cama (viruta)</td><td>$180.000</td></tr>
                <tr><td>Gas para criadoras</td><td>$220.000</td></tr>
                <tr><td>Mano de obra manejo lote (45 días)</td><td>$900.000</td></tr>
                <tr><td>Agua, energía, varios</td><td>$200.000</td></tr>
                <tr class="av-total-orange"><td><strong>TOTAL COSTOS POR LOTE</strong></td><td><strong>$17.950.000</strong></td></tr>
            </tbody>
        </table>
        <table class="av-table">
            <thead><tr><th class="th-orange">Ingreso / Resultado</th><th class="th-orange">Valor (COP)</th></tr></thead>
            <tbody>
                <tr><td>Ventas (490 pollos* × 2,3 kg × $9.000)</td><td>$10.143.000</td></tr>
                <tr><td>+ Precio diferencial canal entera</td><td>+$800.000</td></tr>
                <tr><td>+ Venta gallinaza (lote)</td><td>+$300.000</td></tr>
                <tr><td><em>* Mortalidad estimada 2% = 10 pollos</em></td><td></td></tr>
                <tr class="av-total-orange"><td><strong>TOTAL INGRESOS POR LOTE</strong></td><td><strong>~$11.243.000</strong></td></tr>
                <tr><td><strong>Margen bruto por lote</strong></td><td><strong style="color:#dc2626;">-$6.707.000</strong></td></tr>
                <tr><td colspan="2" style="font-size:0.78rem;color:#6b7280;">⚠️ El margen negativo indica que la ceba de pollo sola no es rentable a pequeña escala con concentrado comercial; se recomienda integrar con producción de maíz propio o crecer el lote a 1.000+ pollos para diluir costos fijos.</td></tr>
            </tbody>
        </table>
    </div>

    <div class="av-subtitle">6.3 · Temperatura de crianza (criadoras)</div>
    <div class="av-table-wrap">
    <table class="av-table">
        <thead>
            <tr>
                <th class="th-orange">Semana</th>
                <th class="th-orange">T° bajo la criadora</th>
                <th class="th-orange">T° ambiente requerida</th>
                <th class="th-orange">Señal visual de confort</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Semana 1 (días 1-7)</td>
                <td>33-35°C</td>
                <td>28-32°C</td>
                <td>Pollos distribuidos uniformemente bajo criadora</td>
            </tr>
            <tr>
                <td>Semana 2 (días 8-14)</td>
                <td>30-32°C</td>
                <td>26-30°C</td>
                <td>Pollos se alejan más de la criadora</td>
            </tr>
            <tr>
                <td>Semana 3 (días 15-21)</td>
                <td>26-28°C</td>
                <td>24-27°C</td>
                <td>Pollos duermen lejos de la criadora</td>
            </tr>
            <tr>
                <td>Semana 4+ (días 22+)</td>
                <td>Sin criadora</td>
                <td>Ventilación natural (22-26°C ideal)</td>
                <td>Pollos activos y dispersos por todo el galpón</td>
            </tr>
        </tbody>
    </table>
    </div>

    <div class="av-info">
        <strong>🌡️ En Planeta Rica (T° ambiente 28°C promedio):</strong> La criadora en semana 1
        puede requerir menos tiempo de encendido que en zonas más frías. Monitoree la temperatura
        bajo la criadora. Si los pollos se agrupan bajo ella: frío — suba la temperatura.
        Si se alejan todos hacia los bordes del galpón: calor — apague la criadora o suba la altura.
    </div>
</div>

<!-- ===================================================================
     SECCIÓN 7: SISTEMA DE AGUA
     =================================================================== -->
<div class="av-card av-card-blue">
    <div class="av-title-blue">💧 Sección 7 — Sistema de Agua y Bebederos</div>

    <div class="av-subtitle">7.1 · Gallinas ponedoras (500 gallinas)</div>
    <div class="av-grid-2">
        <div>
            <div class="av-table-wrap">
            <table class="av-table">
                <thead><tr><th class="th-blue">Parámetro</th><th class="th-blue">Valor</th></tr></thead>
                <tbody>
                    <tr><td>Consumo normal (22°C)</td><td>250-280 ml/gallina/día</td></tr>
                    <tr><td>Consumo en calor (&gt;30°C)</td><td>350-400 ml/gallina/día</td></tr>
                    <tr><td>Total diario normal</td><td><strong>125-140 litros</strong></td></tr>
                    <tr><td>Total diario en calor</td><td><strong>175-200 litros</strong></td></tr>
                    <tr><td>Tanque de reserva recomendado</td><td>500 litros (4 días reserva)</td></tr>
                    <tr><td>pH del agua</td><td>6,5-7,5 (ideal)</td></tr>
                    <tr><td>Temperatura del agua</td><td>&lt;25°C (agua caliente reduce consumo)</td></tr>
                </tbody>
            </table>
            </div>
        </div>
        <div>
            <div class="av-success">
                <strong>✅ Sistema recomendado: Nipple (chupete)</strong><br>
                1 nipple cada 8-10 gallinas = <strong>55-63 nipples</strong><br>
                En tubería PVC ½" suspendida a la altura de la cabeza de la gallina (ajustable)<br>
                <br>
                <strong>Ventajas:</strong><br>
                — Agua siempre limpia (no se ensucia con heces)<br>
                — Sin desperdicio<br>
                — Menor carga de trabajo de limpieza<br>
                — Reduce humedad en cama (menos coccidiosis)<br>
                <br>
                <strong>Costo sistema completo:</strong> ~$1.200.000
            </div>
            <div class="av-note" style="margin-top:0.6rem;">
                <strong>Alternativa: Bebedero canal (2 m)</strong><br>
                1 canal cada 20 gallinas = 25 canales<br>
                Costo: ~$800.000 — pero requiere limpieza diaria y
                genera más humedad en la cama.
            </div>
        </div>
    </div>

    <div class="av-subtitle">7.2 · Pollos de ceba (500 pollos)</div>
    <div class="av-grid-2">
        <div>
            <div class="av-table-wrap">
            <table class="av-table">
                <thead><tr><th class="th-blue">Etapa</th><th class="th-blue">Consumo/pollo/día</th><th class="th-blue">Total 500 pollos</th></tr></thead>
                <tbody>
                    <tr><td>Semana 1 (1-7 días)</td><td>30-50 ml</td><td>15-25 L/día</td></tr>
                    <tr><td>Semana 2 (8-14 días)</td><td>70-100 ml</td><td>35-50 L/día</td></tr>
                    <tr><td>Semana 3 (15-21 días)</td><td>120-160 ml</td><td>60-80 L/día</td></tr>
                    <tr><td>Semana 4 (22-28 días)</td><td>170-210 ml</td><td>85-105 L/día</td></tr>
                    <tr><td>Semana 5-6 (29-42 días)</td><td>230-300 ml</td><td>115-150 L/día</td></tr>
                    <tr><td>Semana 7 (43-45 días)</td><td>280-320 ml</td><td>140-160 L/día</td></tr>
                </tbody>
            </table>
            </div>
        </div>
        <div>
            <div class="av-info">
                <strong>💧 Equipos bebederos pollos:</strong><br><br>
                <strong>Primeras 72 horas:</strong><br>
                30 bebederos de inicio tipo "corona" o platillo (altura baja, al alcance del pollito).
                Colocarlos cerca de la criadora.<br><br>
                <strong>Días 4 en adelante:</strong><br>
                10 bebederos campana automática (1 cada 50 pollos).
                Subir altura gradualmente a medida que crecen.<br><br>
                <strong>Relación agua/alimento:</strong> 2 litros de agua por cada 1 kg de concentrado.
                En calor extremo sube a 3:1.
            </div>
        </div>
    </div>

    <div class="av-danger" style="margin-top:0.75rem;">
        <strong>🚨 Regla crítica:</strong> Nunca deje las aves sin agua más de 2 horas.
        La deshidratación en pollos de 1-7 días puede causar mortalidad masiva en pocas horas
        con temperaturas de 32°C. Revise el suministro de agua dos veces al día mínimo.
        En épocas de corte de agua, el tanque de reserva es OBLIGATORIO.
    </div>
</div>

<!-- ===================================================================
     SECCIÓN 8: VACUNACIÓN
     =================================================================== -->
<div class="av-card av-card-green">
    <div class="av-title-green">💊 Sección 8 — Calendario de Vacunación</div>

    <div class="av-subtitle">8.1 · Gallinas ponedoras — vacunación obligatoria Colombia (ICA)</div>
    <div class="av-table-wrap">
    <table class="av-table">
        <thead>
            <tr>
                <th class="th-green">Edad</th>
                <th class="th-green">Vacuna</th>
                <th class="th-green">Vía de aplicación</th>
                <th class="th-green">Observación importante</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1 día (incubadora)</td>
                <td>Marek (HVT)</td>
                <td>Subcutánea en cuello</td>
                <td>La aplica el proveedor en incubadora; verificar certificado</td>
            </tr>
            <tr>
                <td>7 días</td>
                <td>Newcastle + Bronquitis Infecciosa (B1 + H120)</td>
                <td>Ocular o nasal (1 gota/ojo)</td>
                <td>Temperatura de conservación: 2-8°C; diluir en agua fría</td>
            </tr>
            <tr>
                <td>14 días</td>
                <td>Gumboro (IBD) cepa intermedia</td>
                <td>Agua de bebida</td>
                <td>Retirar agua 2h antes; usar agua sin cloro; respetar dosis</td>
            </tr>
            <tr>
                <td>21 días</td>
                <td>Newcastle + Bronquitis (refuerzo)</td>
                <td>Ocular</td>
                <td>Refuerzo obligatorio; sin él la respuesta inmune es incompleta</td>
            </tr>
            <tr>
                <td>28 días</td>
                <td>Gumboro (IBD, refuerzo)</td>
                <td>Agua de bebida</td>
                <td>2h sin agua antes; diluir en agua fría sin cloro</td>
            </tr>
            <tr>
                <td>35 días</td>
                <td>Newcastle B1 (refuerzo)</td>
                <td>Agua de bebida</td>
                <td></td>
            </tr>
            <tr>
                <td>8 semanas</td>
                <td>Newcastle + Bronquitis Infecciosa</td>
                <td>Agua de bebida</td>
                <td>Preparación para campo; inmunidad de piso lista</td>
            </tr>
            <tr>
                <td>10 semanas</td>
                <td>Viruela Aviar (Fowlpox)</td>
                <td>Punción en membrana del ala</td>
                <td>Verificar reacción positiva a los 7-10 días (costra en ala)</td>
            </tr>
            <tr>
                <td>12 semanas</td>
                <td>Newcastle La Sota</td>
                <td>Agua de bebida</td>
                <td>Cepa La Sota más lentogénica; buena para gallinas en crecimiento</td>
            </tr>
            <tr>
                <td>14 semanas</td>
                <td>Coriza Infecciosa (Hemophilus paragallinarum)</td>
                <td>Intramuscular (pecho)</td>
                <td>Endémica en Córdoba; vacuna con adyuvante oleoso (reacción local normal)</td>
            </tr>
            <tr>
                <td>16 semanas</td>
                <td>Newcastle + Bronquitis + EDS-76 (complejo reproductor)</td>
                <td>Intramuscular</td>
                <td><strong>Crucial pre-postura</strong>; protege aparato reproductor</td>
            </tr>
            <tr>
                <td>Cada 8 semanas</td>
                <td>Newcastle La Sota (mantenimiento)</td>
                <td>Agua de bebida</td>
                <td>Durante toda la etapa de postura (18 meses)</td>
            </tr>
            <tr>
                <td>Cada año</td>
                <td>Viruela Aviar (refuerzo anual)</td>
                <td>Punción en membrana del ala</td>
                <td>Especialmente importante en tropico con mosquitos vectores</td>
            </tr>
        </tbody>
    </table>
    </div>

    <div class="av-subtitle">8.2 · Pollos de ceba — vacunación simplificada (ciclo 45 días)</div>
    <div class="av-grid-2">
        <div class="av-table-wrap">
        <table class="av-table">
            <thead>
                <tr>
                    <th class="th-orange">Edad</th>
                    <th class="th-orange">Vacuna</th>
                    <th class="th-orange">Vía</th>
                    <th class="th-orange">Observación</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1-3 días</td>
                    <td>Newcastle B1</td>
                    <td>Ocular (1 gota)</td>
                    <td>Prioritaria; Newcastle = principal amenaza en lotes jóvenes</td>
                </tr>
                <tr>
                    <td>7-10 días</td>
                    <td>Gumboro IBD intermedia</td>
                    <td>Agua de bebida</td>
                    <td>Ventana inmunosupresora: sin Gumboro los pollos no responden bien a otras vacunas</td>
                </tr>
                <tr>
                    <td>14 días</td>
                    <td>Newcastle B1 (refuerzo)</td>
                    <td>Agua de bebida</td>
                    <td></td>
                </tr>
                <tr>
                    <td>21 días</td>
                    <td>Gumboro refuerzo</td>
                    <td>Agua de bebida</td>
                    <td>Si el lote anterior tuvo Gumboro clínico, usar cepa más fuerte (intermedia plus)</td>
                </tr>
            </tbody>
        </table>
        </div>
        <div>
            <div class="av-info">
                <strong>ℹ️ Normas generales de vacunación:</strong>
                <ul class="av-ul" style="margin-top:0.4rem;">
                    <li>Conservar vacunas en nevera a 2-8°C hasta el momento de uso</li>
                    <li>No exponer a luz solar directa ni a temperaturas &gt;25°C</li>
                    <li>Vacunar de madrugada (5-7 am) o al atardecer cuando las aves están tranquilas</li>
                    <li>Para vacunas en agua: usar agua fría, sin cloro (dejar 2h sin cloro o usar agua de lluvia)</li>
                    <li>Agregar leche descremada al 0,1% al agua de vacuna como protector</li>
                    <li>Usar todo el frasco en máximo 2 horas una vez abierto</li>
                    <li>Registrar fecha, lote y número de frasco de cada vacuna aplicada</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="av-note">
        <strong>📋 Costo estimado vacunación 500 gallinas (18 meses completos):</strong>
        Gallinas ponedoras: ~$280.000 en vacunas + $80.000 en jeringas, diluyentes y mano de obra = <strong>~$360.000</strong>.<br>
        Pollos ceba por lote: ~$95.000 en vacunas = <strong>~$95.000/lote</strong>.
    </div>
</div>

<!-- ===================================================================
     SECCIÓN 9: BIOSEGURIDAD
     =================================================================== -->
<div class="av-card av-card-red">
    <div class="av-title-red">🚨 Sección 9 — Bioseguridad y Sanidad</div>

    <div class="av-subtitle">9.1 · Medidas obligatorias permanentes</div>
    <div class="av-grid-2">
        <ul class="av-ul">
            <li>Pediluvio con cal viva o formalina al 2% en <strong>TODAS</strong> las entradas; reponer semanalmente</li>
            <li>Ducha de ingreso o cambio completo de ropa antes de entrar al área avícola (especialmente visitantes)</li>
            <li>Visitar siempre de menor a mayor densidad: pollitas → gallinas jóvenes → gallinas adultas</li>
            <li><strong>NO mezclar</strong> aves de diferentes edades en el mismo galpón (sistema "todo adentro / todo afuera")</li>
            <li>Cuarentena de <strong>14 días</strong> para aves nuevas en galpón separado antes de ingresar al sistema</li>
            <li>Vehículos que entren al área avícola: desinfectar ruedas con formalina o cal</li>
            <li>Control de roedores: cebos cada 15 m en perímetro exterior del área avícola</li>
            <li>Control de pájaros silvestres: malla en aberturas altas, evitar acumulación de granos fuera del galpón</li>
        </ul>
        <ul class="av-ul">
            <li>Mortalidad: embolsar en bolsa roja, enterrar a 1 m de profundidad con cal viva o incinerar. <strong>NUNCA dejar cadáveres expuestos.</strong></li>
            <li>Visitantes externos (veterinario, técnico, comprador): registrar nombre, fecha, galpones visitados</li>
            <li>El galponero no debe tener aves en casa mientras trabaja en la granja (riesgo de traer Newcastle de patio)</li>
            <li>Herramientas (palas, rastrillos): exclusivas de cada galpón; no compartir entre galpón gallinas y pollos</li>
            <li>Agua de bebida: verificar cloro residual 0,5-1 ppm o usar desinfectante de agua avícola</li>
            <li>Cama: retirar zona húmeda alrededor de bebederos cada 3-4 días (foco de coccidiosis)</li>
        </ul>
    </div>

    <div class="av-subtitle">9.2 · Protocolo de limpieza y desinfección entre lotes (pollos de ceba)</div>
    <div class="av-table-wrap">
    <table class="av-table">
        <thead>
            <tr>
                <th class="th-red">Paso</th>
                <th class="th-red">Actividad</th>
                <th class="th-red">Detalle</th>
                <th class="th-red">Tiempo requerido</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>1</strong></td>
                <td>Vaciar el galpón</td>
                <td>Sacar todos los pollos. NO quedan aves rezagadas</td>
                <td>Día 1</td>
            </tr>
            <tr>
                <td><strong>2</strong></td>
                <td>Retirar cama y equipo</td>
                <td>Sacar toda la gallinaza hacia zona de compostaje. Desmontarequipos comederos/bebederos</td>
                <td>Día 1-2</td>
            </tr>
            <tr>
                <td><strong>3</strong></td>
                <td>Barrido y rastrillado</td>
                <td>Retirar polvo, plumas y materia orgánica de piso y paredes</td>
                <td>Día 2</td>
            </tr>
            <tr>
                <td><strong>4</strong></td>
                <td>Lavado a presión</td>
                <td>Piso, paredes, mallas y equipos con agua a presión + detergente neutro. Dejar actuar 30 min y enjuagar</td>
                <td>Día 3</td>
            </tr>
            <tr>
                <td><strong>5</strong></td>
                <td>Desinfección química</td>
                <td>Formalina 5% o yodo 1:200 o amonio cuaternario según etiqueta. Aplicar con bomba de espalda</td>
                <td>Día 4-5</td>
            </tr>
            <tr>
                <td><strong>6</strong></td>
                <td>Encalado</td>
                <td>Cal apagada: 1 kg/m² en piso y paredes hasta 1 m de altura. Deja pH alto que elimina patógenos</td>
                <td>Día 5-6</td>
            </tr>
            <tr>
                <td><strong>7</strong></td>
                <td>Descanso sanitario</td>
                <td><strong>Mínimo 14 días</strong> con el galpón vacío y ventilado. Ideal 21 días</td>
                <td>Días 7-20</td>
            </tr>
            <tr>
                <td><strong>8</strong></td>
                <td>Nueva cama</td>
                <td>Viruta de madera seca (no aserrín que retiene humedad). 8 cm de espesor</td>
                <td>Día 20-21</td>
            </tr>
            <tr>
                <td><strong>9</strong></td>
                <td>Reinstalar equipos</td>
                <td>Colocar bebederos, comederos, criadoras y cortinas. Verificar funcionamiento</td>
                <td>Día 21</td>
            </tr>
            <tr>
                <td><strong>10</strong></td>
                <td>Ingreso del nuevo lote</td>
                <td>Recibir pollitos con galpón caliente (35°C bajo criadora), agua tibia y alimento preiniciador</td>
                <td>Día 22</td>
            </tr>
        </tbody>
    </table>
    </div>

    <div class="av-subtitle">9.3 · Señales de alerta y enfermedades más comunes en Córdoba</div>
    <div class="av-table-wrap">
    <table class="av-table">
        <thead>
            <tr>
                <th class="th-red">Síntoma observado</th>
                <th class="th-red">Posible causa</th>
                <th class="th-red">Acción inmediata</th>
                <th class="th-red">Urgencia</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Aves agrupadas, plumas erizadas, temblores</td>
                <td>Frío (T° &lt;18°C) o enfermedad sistémica</td>
                <td>Revisar temperatura, encender criadora, aislar las más afectadas</td>
                <td><span class="av-badge av-badge-yellow">Media</span></td>
            </tr>
            <tr>
                <td>Caída de postura &gt;5% en 3 días consecutivos</td>
                <td>Newcastle, estrés calórico, cambio de alimento, Bronquitis</td>
                <td>Revisar temperatura, agua, alimento. Consultar veterinario si persiste</td>
                <td><span class="av-badge av-badge-orange">Alta</span></td>
            </tr>
            <tr>
                <td>Heces verdes o amarillentas</td>
                <td>Coccidiosis, Newcastle entérico, intoxicación</td>
                <td>Iniciar anticoccidial si corresponde. Veterinario en 24h</td>
                <td><span class="av-badge av-badge-orange">Alta</span></td>
            </tr>
            <tr>
                <td>Ronquidos, estertores, tos, secreción nasal</td>
                <td>Bronquitis Infecciosa, Micoplasmosis, Coriza</td>
                <td>Antibióticos según diagnóstico. Aislar aves afectadas. Veterinario</td>
                <td><span class="av-badge av-badge-orange">Alta</span></td>
            </tr>
            <tr>
                <td>Cuello torcido (torticolis), giros en círculo</td>
                <td>Newcastle forma nerviosa — NOTIFICACIÓN OBLIGATORIA ICA</td>
                <td><strong>Aislamiento inmediato. Llamar veterinario y reportar al ICA</strong></td>
                <td><span class="av-badge av-badge-red">URGENTE</span></td>
            </tr>
            <tr>
                <td>Picaje de plumas, canibalismo en cola</td>
                <td>Hacinamiento, falta de minerales, luz excesiva, aburrimiento</td>
                <td>Revisar densidad, agregar sal mineral, colocar comedero con piedra de sal</td>
                <td><span class="av-badge av-badge-yellow">Media</span></td>
            </tr>
            <tr>
                <td>Mortalidad súbita sin síntomas previos (&gt;1%/día)</td>
                <td>Gumboro agudo, intoxicación con micotoxinas, estrés calórico extremo</td>
                <td>Necropsia inmediata por veterinario. Revisar alimento, agua y temperatura</td>
                <td><span class="av-badge av-badge-red">URGENTE</span></td>
            </tr>
            <tr>
                <td>Cáscara de huevo delgada, deformada, sin cáscara</td>
                <td>Déficit de calcio, Bronquitis Infecciosa, EDS-76</td>
                <td>Agregar conchilla de ostras ad libitum. Revisar vacunación</td>
                <td><span class="av-badge av-badge-yellow">Media</span></td>
            </tr>
            <tr>
                <td>Diarrea blanca en pollitos (1-3 días)</td>
                <td>Salmonella pullorum (Tifosis o Pulorosis)</td>
                <td>Antibiótico (enrofloxacina). Notificar proveedor de pollitos. Veterinario</td>
                <td><span class="av-badge av-badge-red">URGENTE</span></td>
            </tr>
        </tbody>
    </table>
    </div>
</div>

<!-- ===================================================================
     SECCIÓN 10: CONTROL DE PRODUCCIÓN
     =================================================================== -->
<div class="av-card av-card-gray">
    <div class="av-title-gray">📋 Sección 10 — Control de Producción y Registros</div>

    <div class="av-subtitle">10.1 · Hoja de control diario recomendada</div>
    <div class="av-grid-2">
        <div>
            <div class="av-info">
                <strong>📝 Para galpón de gallinas ponedoras — datos diarios:</strong>
                <ul class="av-ul" style="margin-top:0.4rem;">
                    <li>Fecha y hora de recolección (2 veces: 9 am y 3 pm)</li>
                    <li>N° de huevos recolectados por recolección y total del día</li>
                    <li>N° de huevos rotos, sucios, deformes (registrar por separado)</li>
                    <li>N° de aves muertas (mortalidad diaria)</li>
                    <li>Kg de alimento consumido (pesar comederos vacíos)</li>
                    <li>Temperatura ambiental a las 7 am y 2 pm</li>
                    <li>Observaciones de comportamiento (peleas, aves postradas, etc.)</li>
                    <li>Aplicación de medicamentos o vitaminas en agua</li>
                </ul>
            </div>
        </div>
        <div>
            <div class="av-info">
                <strong>📝 Para galpón de pollos de ceba — datos diarios:</strong>
                <ul class="av-ul" style="margin-top:0.4rem;">
                    <li>Fecha y número del lote</li>
                    <li>N° de aves muertas (mortalidad diaria y acumulada)</li>
                    <li>Kg de alimento suministrado y sobrante</li>
                    <li>Temperatura bajo criadora y ambiente (mañana y tarde)</li>
                    <li>Aspecto de las heces (normal, acuosas, verdes, con sangre)</li>
                    <li>Comportamiento general (activos, agrupados, somnolientos)</li>
                    <li>Peso semanal (muestra del 5-10% del lote cada 7 días)</li>
                    <li>Consumo de agua estimado</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="av-subtitle">10.2 · Indicadores de productividad esperados y rangos de alerta</div>
    <div class="av-table-wrap">
    <table class="av-table">
        <thead>
            <tr>
                <th class="th-gray">Indicador</th>
                <th class="th-gray">Especie</th>
                <th class="th-green">Meta óptima</th>
                <th class="th-yellow">Rango de alerta</th>
                <th class="th-red">Acción requerida</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Porcentaje de postura</td>
                <td>Gallinas</td>
                <td><strong>90-95%</strong> (450-475 huevos/día)</td>
                <td>85-89%</td>
                <td>&lt;85%: consultar veterinario urgente</td>
            </tr>
            <tr>
                <td>Mortalidad mensual</td>
                <td>Gallinas</td>
                <td>&lt;0,5% (máx. 2-3 aves/mes)</td>
                <td>0,5%-1%</td>
                <td>&gt;1%: investigar causa inmediatamente</td>
            </tr>
            <tr>
                <td>Peso del huevo</td>
                <td>Gallinas</td>
                <td>55-65 g (categoría A)</td>
                <td>50-54 g</td>
                <td>&lt;50 g: revisar calcio y proteína</td>
            </tr>
            <tr>
                <td>Edad primer huevo</td>
                <td>Gallinas</td>
                <td>18-20 semanas</td>
                <td>21-22 semanas</td>
                <td>&gt;22 sem: revisar luz y alimentación</td>
            </tr>
            <tr>
                <td>Conversión alimenticia</td>
                <td>Pollos ceba</td>
                <td>&lt;2,05 kg alim/kg carne</td>
                <td>2,05-2,2</td>
                <td>&gt;2,3: revisar calidad alimento y salud</td>
            </tr>
            <tr>
                <td>Peso a los 45 días</td>
                <td>Pollos ceba</td>
                <td>2,3-2,6 kg (Ross 308)</td>
                <td>2,0-2,2 kg</td>
                <td>&lt;2,0 kg: revisar temperatura y alimentación</td>
            </tr>
            <tr>
                <td>Mortalidad lote ceba</td>
                <td>Pollos ceba</td>
                <td>&lt;3% (máx. 15 pollos/lote)</td>
                <td>3-5%</td>
                <td>&gt;5%: diagnóstico veterinario urgente</td>
            </tr>
            <tr>
                <td>Uniformidad del lote (peso)</td>
                <td>Pollos ceba</td>
                <td>&gt;90% dentro de ±10% del peso promedio</td>
                <td>80-90%</td>
                <td>&lt;80%: revisar distribución de comederos</td>
            </tr>
        </tbody>
    </table>
    </div>

    <div class="av-subtitle">10.3 · Cálculo de ingresos — gallinas ponedoras (500 aves)</div>
    <div class="av-table-wrap">
    <table class="av-table">
        <thead>
            <tr>
                <th class="th-gray">Concepto</th>
                <th class="th-gray">Cálculo</th>
                <th class="th-green">Ingreso mensual (COP)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Venta de huevos (al por mayor)</td>
                <td>460 huevos/día × 30 días = 13.800 und × $550</td>
                <td>$7.590.000</td>
            </tr>
            <tr>
                <td>Venta huevos al detal (precio diferencial)</td>
                <td>30% ventas detal: 4.140 und × $700</td>
                <td>Incluido en total ajustado</td>
            </tr>
            <tr>
                <td>Venta de gallinaza (abono)</td>
                <td>~2 ton/mes × $80.000/ton</td>
                <td>$160.000</td>
            </tr>
            <tr>
                <td>Venta de gallinas de descarte (año 18 mes)</td>
                <td>500 gallinas × $18.000 = $9.000.000 / 18 meses</td>
                <td>$500.000/mes</td>
            </tr>
            <tr class="av-total">
                <td colspan="2"><strong>TOTAL INGRESOS MENSUALES ESTIMADOS</strong></td>
                <td><strong>~$8.250.000/mes</strong></td>
            </tr>
            <tr>
                <td colspan="2"><strong>(-) Costos operativos mensuales</strong></td>
                <td><strong>-$4.800.000</strong> (alimento + mano de obra + medicamentos)</td>
            </tr>
            <tr class="av-total">
                <td colspan="2"><strong>MARGEN BRUTO MENSUAL ESTIMADO</strong></td>
                <td><strong>~$3.450.000/mes</strong></td>
            </tr>
        </tbody>
    </table>
    </div>
</div>

<!-- ===================================================================
     SECCIÓN 11: PROVEEDORES
     =================================================================== -->
<div class="av-card av-card-gray">
    <div class="av-title-gray">🏪 Sección 11 — Insumos y Proveedores Recomendados · Región Córdoba</div>

    <div class="av-grid-2">
        <div>
            <div class="av-subtitle">Aves de cría</div>
            <table class="av-table">
                <thead><tr><th class="th-gray">Proveedor</th><th class="th-gray">Producto</th><th class="th-gray">Contacto/Ubicación</th></tr></thead>
                <tbody>
                    <tr>
                        <td>AgroAvícola Montería</td>
                        <td>Pollitas ponedoras (Hy-Line, ISA Brown)</td>
                        <td>Montería — llamar y pedir lista de precios</td>
                    </tr>
                    <tr>
                        <td>Incubadora del Sinú</td>
                        <td>Pollitas ponedoras con vacuna Marek incluida</td>
                        <td>Montería / vía a Cereté</td>
                    </tr>
                    <tr>
                        <td>Incubar S.A.</td>
                        <td>Pollitos ceba Ross 308 / Cobb 500</td>
                        <td>Representante en Montería</td>
                    </tr>
                    <tr>
                        <td>AviCol Montería</td>
                        <td>Pollitos ceba 1 día</td>
                        <td>Montería — entrega en finca (&gt;500 und)</td>
                    </tr>
                    <tr>
                        <td>AgroAndes / Integración Avícola</td>
                        <td>Pollitos ceba con contrato de recompra</td>
                        <td>Verificar disponibilidad en Córdoba</td>
                    </tr>
                </tbody>
            </table>

            <div class="av-subtitle" style="margin-top:1rem;">Concentrado y alimentación</div>
            <table class="av-table">
                <thead><tr><th class="th-gray">Marca</th><th class="th-gray">Producto</th><th class="th-gray">Distribuidor local</th></tr></thead>
                <tbody>
                    <tr>
                        <td>Contegral</td>
                        <td>Línea postura + ceba completa</td>
                        <td>Buscar distribuidor en Planeta Rica</td>
                    </tr>
                    <tr>
                        <td>Italcol</td>
                        <td>Línea avícola completa (iniciador, crecimiento, engorde)</td>
                        <td>Representante en Montería</td>
                    </tr>
                    <tr>
                        <td>Purina (Nestlé Purina)</td>
                        <td>Concentrado postura y ceba</td>
                        <td>Almacenes agrícolas zona</td>
                    </tr>
                    <tr>
                        <td>Solla</td>
                        <td>Línea avícola + aditivos</td>
                        <td>Distribuidor Montería / Cereté</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div>
            <div class="av-subtitle">Vacunas y medicamentos</div>
            <table class="av-table">
                <thead><tr><th class="th-gray">Proveedor</th><th class="th-gray">Servicio</th></tr></thead>
                <tbody>
                    <tr>
                        <td>Casa Veterinaria Planeta Rica</td>
                        <td>Vacunas, antibióticos, vitaminas, asesoría técnica local</td>
                    </tr>
                    <tr>
                        <td>Veterinaria del Campo Montería</td>
                        <td>Amplia línea avícola, diagnóstico, medicamentos inyectables</td>
                    </tr>
                    <tr>
                        <td>Laboratorio Vecol (Colombia)</td>
                        <td>Vacunas Newcastle, Gumboro, Viruela — distribuidores regionales</td>
                    </tr>
                    <tr>
                        <td>MSD AH / Zoetis</td>
                        <td>Vacunas de alta calidad (Newcastle Lasota, Bronquitis) — via veterinario</td>
                    </tr>
                </tbody>
            </table>

            <div class="av-subtitle" style="margin-top:1rem;">Materiales de construcción y equipos</div>
            <table class="av-table">
                <thead><tr><th class="th-gray">Proveedor</th><th class="th-gray">Producto</th></tr></thead>
                <tbody>
                    <tr>
                        <td>Ferretería del Llano (Montería)</td>
                        <td>Malla gallinera, zinc, clavos, madera rolliza</td>
                    </tr>
                    <tr>
                        <td>Almacenes Agrícolas Montería</td>
                        <td>Malla sombra, cortinas, comederos, bebederos</td>
                    </tr>
                    <tr>
                        <td>Homecenter Montería</td>
                        <td>Zinc, bloques, cemento, pinturas, herramientas</td>
                    </tr>
                    <tr>
                        <td>Distribuidores locales Planeta Rica</td>
                        <td>Bloques, arena, cemento — consultar precios locales (ahorra flete)</td>
                    </tr>
                </tbody>
            </table>

            <div class="av-success" style="margin-top:1rem;">
                <strong>✅ Consejo práctico:</strong><br>
                Para el concentrado, pida cotización a 3 marcas y compare precio por kilogramo
                de proteína útil (no solo precio total). Una diferencia de $50/kg en concentrado
                de ceba representa $400.000 de diferencia por lote de 500 pollos.
                Considere almacenar hasta 2 toneladas si tiene bodega seca: los precios fluctúan.
            </div>
        </div>
    </div>
</div>

<!-- ===================================================================
     PIE DE PÁGINA
     =================================================================== -->
<div class="av-card" style="border:1px solid #e5e7eb;background:#f9fafb;text-align:center;">
    <div style="font-size:0.8rem;color:#6b7280;">
        <p style="margin:0 0 0.25rem;">
            Manual Técnico de Cría de Aves · Granja Integral · Planeta Rica, Córdoba, Colombia
        </p>
        <p style="margin:0 0 0.25rem;">
            Fuentes: ICA Colombia (Resolución 3651/2014), Manual Cría Hy-Line International,
            Guía de Manejo Ross 308 (Aviagen), DANE — Precios agropecuarios Córdoba
        </p>
        <p style="margin:0;font-style:italic;">
            Precios COP indicativos — verificar con proveedores locales antes de tomar decisiones de inversión.
            Consultar siempre un médico veterinario zootecnista habilitado ante el ICA.
        </p>
    </div>
</div>

</div><!-- /space-y-2 -->

</x-filament-panels::page>
