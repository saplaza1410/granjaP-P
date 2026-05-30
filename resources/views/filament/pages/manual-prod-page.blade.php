<x-filament-panels::page>

<style>
/* ===================== BASE CARD ===================== */
.mp-card {
    border-radius: 0.85rem;
    padding: 1.35rem 1.6rem;
    margin-bottom: 1.75rem;
    box-shadow: 0 2px 8px 0 rgba(0,0,0,0.07);
    overflow: hidden;
}

/* ---- AZUL: Piscicultura ---- */
.mp-card-blue {
    background: #eff6ff;
    border: 1.5px solid #bfdbfe;
}
.dark .mp-card-blue {
    background: #0f1e35;
    border-color: #1d4ed8;
}

/* ---- VERDE: Hortalizas ---- */
.mp-card-green {
    background: #f0fdf4;
    border: 1.5px solid #bbf7d0;
}
.dark .mp-card-green {
    background: #0a1f0f;
    border-color: #166534;
}

/* ---- AMARILLO-VERDE: Plátano / Yuca ---- */
.mp-card-yellow {
    background: #fefce8;
    border: 1.5px solid #fde68a;
}
.dark .mp-card-yellow {
    background: #1c1a05;
    border-color: #854d0e;
}

/* ---- CAFÉ: Compost ---- */
.mp-card-brown {
    background: #fdf8f0;
    border: 1.5px solid #d6b896;
}
.dark .mp-card-brown {
    background: #1a1206;
    border-color: #92400e;
}

/* ---- GRIS: Resumen ---- */
.mp-card-gray {
    background: #f8fafc;
    border: 1.5px solid #cbd5e1;
}
.dark .mp-card-gray {
    background: #0f172a;
    border-color: #475569;
}

/* ===================== TITULOS ===================== */
.mp-section-title {
    font-size: 1.2rem;
    font-weight: 800;
    margin-bottom: 0.9rem;
    display: flex;
    align-items: center;
    gap: 0.55rem;
    letter-spacing: -0.01em;
}
.mp-sub-title {
    font-size: 1rem;
    font-weight: 700;
    margin: 1.2rem 0 0.6rem;
    display: flex;
    align-items: center;
    gap: 0.4rem;
}
.mp-blue-title   { color: #1d4ed8; }
.dark .mp-blue-title   { color: #93c5fd; }
.mp-green-title  { color: #166534; }
.dark .mp-green-title  { color: #86efac; }
.mp-yellow-title { color: #854d0e; }
.dark .mp-yellow-title { color: #fcd34d; }
.mp-brown-title  { color: #78350f; }
.dark .mp-brown-title  { color: #d97706; }
.mp-gray-title   { color: #334155; }
.dark .mp-gray-title   { color: #94a3b8; }

/* ===================== TABLAS ===================== */
.mp-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 0.82rem;
    margin-top: 0.6rem;
    overflow: hidden;
    border-radius: 0.5rem;
}
.mp-table th {
    font-weight: 700;
    padding: 0.52rem 0.8rem;
    text-align: left;
    border-bottom: 2px solid transparent;
    white-space: nowrap;
}
.mp-table td {
    padding: 0.45rem 0.8rem;
    vertical-align: top;
    border-bottom: 1px solid transparent;
}
.mp-table tr:last-child td { border-bottom: none; }

/* Variantes de color de tabla */
.mp-table-blue th   { background: #dbeafe; color: #1e40af; border-color: #bfdbfe; }
.dark .mp-table-blue th   { background: #1e3a5f; color: #93c5fd; border-color: #1d4ed8; }
.mp-table-blue td   { border-color: #e0eeff; }
.dark .mp-table-blue td   { border-color: #1e3a5f; color: #bfdbfe; }
.mp-table-blue tr:nth-child(even) td { background: #eff6ff; }
.dark .mp-table-blue tr:nth-child(even) td { background: #0d1e35; }

.mp-table-green th  { background: #dcfce7; color: #166534; border-color: #bbf7d0; }
.dark .mp-table-green th  { background: #14532d; color: #86efac; border-color: #166534; }
.mp-table-green td  { border-color: #d1fae5; }
.dark .mp-table-green td  { border-color: #1a3320; color: #d1fae5; }
.mp-table-green tr:nth-child(even) td { background: #f0fdf4; }
.dark .mp-table-green tr:nth-child(even) td { background: #0a1f12; }

.mp-table-yellow th { background: #fef9c3; color: #854d0e; border-color: #fde68a; }
.dark .mp-table-yellow th { background: #3b2e05; color: #fcd34d; border-color: #854d0e; }
.mp-table-yellow td { border-color: #fef3c7; }
.dark .mp-table-yellow td { border-color: #2e2205; color: #fde68a; }
.mp-table-yellow tr:nth-child(even) td { background: #fffde7; }
.dark .mp-table-yellow tr:nth-child(even) td { background: #15110a; }

.mp-table-brown th  { background: #fef3c7; color: #78350f; border-color: #d6b896; }
.dark .mp-table-brown th  { background: #3b2a10; color: #d97706; border-color: #92400e; }
.mp-table-brown td  { border-color: #fde8c0; }
.dark .mp-table-brown td  { border-color: #2a1d08; color: #fde68a; }
.mp-table-brown tr:nth-child(even) td { background: #fdf8f0; }
.dark .mp-table-brown tr:nth-child(even) td { background: #110e05; }

.mp-table-gray th   { background: #e2e8f0; color: #1e293b; border-color: #cbd5e1; }
.dark .mp-table-gray th   { background: #1e293b; color: #94a3b8; border-color: #334155; }
.mp-table-gray td   { border-color: #e2e8f0; }
.dark .mp-table-gray td   { border-color: #1e293b; color: #cbd5e1; }
.mp-table-gray tr:nth-child(even) td { background: #f1f5f9; }
.dark .mp-table-gray tr:nth-child(even) td { background: #0e1726; }

/* ===================== BADGE / HIGHLIGHT ===================== */
.mp-badge {
    display: inline-block;
    border-radius: 9999px;
    padding: 0.15rem 0.65rem;
    font-size: 0.75rem;
    font-weight: 700;
    margin: 0.1rem 0.2rem;
}
.mp-badge-blue   { background: #dbeafe; color: #1d4ed8; }
.dark .mp-badge-blue   { background: #1e3a5f; color: #93c5fd; }
.mp-badge-green  { background: #dcfce7; color: #166534; }
.dark .mp-badge-green  { background: #14532d; color: #86efac; }
.mp-badge-yellow { background: #fef9c3; color: #854d0e; }
.dark .mp-badge-yellow { background: #3b2e05; color: #fcd34d; }
.mp-badge-red    { background: #fee2e2; color: #991b1b; }
.dark .mp-badge-red    { background: #3b0e0e; color: #fca5a5; }
.mp-badge-brown  { background: #fef3c7; color: #78350f; }
.dark .mp-badge-brown  { background: #3b2a10; color: #fbbf24; }

/* ===================== ALERT BOX ===================== */
.mp-alert {
    border-radius: 0.6rem;
    padding: 0.75rem 1rem;
    margin: 0.75rem 0;
    font-size: 0.84rem;
    display: flex;
    align-items: flex-start;
    gap: 0.5rem;
    border-left: 4px solid transparent;
}
.mp-alert-blue  { background: #eff6ff; border-color: #3b82f6; color: #1d4ed8; }
.dark .mp-alert-blue  { background: #0f1e35; color: #93c5fd; }
.mp-alert-green { background: #f0fdf4; border-color: #22c55e; color: #166534; }
.dark .mp-alert-green { background: #0a1a0f; color: #86efac; }
.mp-alert-yellow{ background: #fffde7; border-color: #f59e0b; color: #92400e; }
.dark .mp-alert-yellow{ background: #1a1506; color: #fcd34d; }
.mp-alert-red   { background: #fff1f2; border-color: #ef4444; color: #991b1b; }
.dark .mp-alert-red   { background: #1f0505; color: #fca5a5; }

/* ===================== GRID ===================== */
.mp-grid-2 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1.25rem;
}
.mp-grid-3 {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 1rem;
}
@media (max-width: 900px) {
    .mp-grid-2, .mp-grid-3 { grid-template-columns: 1fr; }
}

/* ===================== STAT BOX ===================== */
.mp-stat {
    border-radius: 0.65rem;
    padding: 0.9rem 1.1rem;
    text-align: center;
}
.mp-stat-value {
    font-size: 1.4rem;
    font-weight: 800;
    line-height: 1.2;
}
.mp-stat-label {
    font-size: 0.72rem;
    font-weight: 600;
    opacity: 0.8;
    margin-top: 0.2rem;
    text-transform: uppercase;
    letter-spacing: 0.04em;
}
.mp-stat-blue   { background: #dbeafe; color: #1d4ed8; }
.dark .mp-stat-blue   { background: #1e3a5f; color: #93c5fd; }
.mp-stat-green  { background: #dcfce7; color: #166534; }
.dark .mp-stat-green  { background: #14532d; color: #86efac; }
.mp-stat-yellow { background: #fef9c3; color: #854d0e; }
.dark .mp-stat-yellow { background: #3b2e05; color: #fcd34d; }
.mp-stat-brown  { background: #fef3c7; color: #78350f; }
.dark .mp-stat-brown  { background: #3b2a10; color: #d97706; }
.mp-stat-gray   { background: #e2e8f0; color: #1e293b; }
.dark .mp-stat-gray   { background: #1e293b; color: #94a3b8; }

/* ===================== GENERAL TEXT ===================== */
.mp-body-text {
    font-size: 0.875rem;
    line-height: 1.65;
    color: #374151;
}
.dark .mp-body-text { color: #d1d5db; }
.mp-note {
    font-size: 0.78rem;
    font-style: italic;
    color: #6b7280;
    margin-top: 0.4rem;
}
.dark .mp-note { color: #9ca3af; }
.mp-bold { font-weight: 700; }
.mp-divider {
    border: none;
    border-top: 1.5px solid #e2e8f0;
    margin: 1.25rem 0;
}
.dark .mp-divider { border-color: #1e293b; }

/* ===================== HEADER HERO ===================== */
.mp-hero {
    background: linear-gradient(135deg, #1d4ed8 0%, #065f46 50%, #854d0e 100%);
    border-radius: 1rem;
    padding: 2rem 2.5rem;
    margin-bottom: 2rem;
    color: #fff;
}
.mp-hero h1 {
    font-size: 1.6rem;
    font-weight: 900;
    margin-bottom: 0.4rem;
    letter-spacing: -0.02em;
}
.mp-hero p {
    font-size: 0.9rem;
    opacity: 0.88;
}
.mp-toc {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
    margin-top: 1rem;
}
.mp-toc-item {
    background: rgba(255,255,255,0.2);
    border-radius: 9999px;
    padding: 0.25rem 0.85rem;
    font-size: 0.78rem;
    font-weight: 600;
    backdrop-filter: blur(4px);
}

/* Tabla responsive wrapper */
.mp-table-wrap {
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    border-radius: 0.5rem;
}

/* Columna dinero en negrita */
.td-money { font-weight: 700; }
.td-highlight { font-weight: 700; color: #1d4ed8; }
.dark .td-highlight { color: #93c5fd; }
.td-highlight-green { font-weight: 700; color: #166534; }
.dark .td-highlight-green { color: #86efac; }
</style>

<!-- ============================================================
     HERO HEADER
     ============================================================ -->
<div class="mp-hero">
    <h1>🌾 Manual de Producción Agropecuaria</h1>
    <p>Granja · Planeta Rica, Córdoba, Colombia &mdash; Guía técnica detallada para piscicultura, hortalizas, plátano, yuca y compostaje</p>
    <div class="mp-toc">
        <span class="mp-toc-item">🐟 Piscicultura</span>
        <span class="mp-toc-item">🥬 Hortalizas 1,500 m²</span>
        <span class="mp-toc-item">🍌 Plátano 2,500 m²</span>
        <span class="mp-toc-item">🌱 Yuca &amp; Ñame 1,500 m²</span>
        <span class="mp-toc-item">♻️ Compostaje</span>
        <span class="mp-toc-item">💰 Resumen Inversión</span>
    </div>
</div>


<!-- ============================================================
     SECCIÓN 1: PISCICULTURA
     ============================================================ -->
<div class="mp-card mp-card-blue">
    <div class="mp-section-title mp-blue-title">🐟 SECCIÓN 1: PISCICULTURA — Tilapia y Cachama</div>
    <div class="mp-body-text">Sistema de tres pozas para producción intensiva de tilapia nilótica y cachama blanca. Diseñado para las condiciones climáticas de Planeta Rica (temperatura media 28–32°C, alta radiación solar), aprovechando aguas residuales como fertirrigación para la huerta.</div>

    <!-- STATS -->
    <div class="mp-grid-3" style="margin-top:1rem;">
        <div class="mp-stat mp-stat-blue">
            <div class="mp-stat-value">3</div>
            <div class="mp-stat-label">Pozas de producción</div>
        </div>
        <div class="mp-stat mp-stat-blue">
            <div class="mp-stat-value">8,500</div>
            <div class="mp-stat-label">Peces en sistema</div>
        </div>
        <div class="mp-stat mp-stat-blue">
            <div class="mp-stat-value">744 m³</div>
            <div class="mp-stat-label">Volumen total de agua</div>
        </div>
    </div>

    <hr class="mp-divider">

    <!-- 1.1 Diseño de Pozas -->
    <div class="mp-sub-title mp-blue-title">📐 1.1 Diseño de las Pozas</div>
    <div class="mp-table-wrap">
        <table class="mp-table mp-table-blue">
            <thead>
                <tr>
                    <th>Poza</th>
                    <th>Dimensiones</th>
                    <th>Volumen agua</th>
                    <th>Especie</th>
                    <th>Uso</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Poza 1</strong></td>
                    <td>20 m × 10 m × 1.5 m profundidad</td>
                    <td class="td-highlight">300 m³</td>
                    <td>Tilapia Nilótica</td>
                    <td>Engorde</td>
                </tr>
                <tr>
                    <td><strong>Poza 2</strong></td>
                    <td>20 m × 10 m × 1.5 m profundidad</td>
                    <td class="td-highlight">300 m³</td>
                    <td>Tilapia o Cachama</td>
                    <td>Engorde</td>
                </tr>
                <tr>
                    <td><strong>Poza 3</strong></td>
                    <td>15 m × 8 m × 1.2 m profundidad</td>
                    <td class="td-highlight">144 m³</td>
                    <td>Alevinos / Juveniles</td>
                    <td>Cría y levante</td>
                </tr>
                <tr>
                    <td colspan="2"><strong>TOTAL ÁREA EN TIERRA (con taludes)</strong></td>
                    <td class="td-highlight"><strong>~700 m²</strong></td>
                    <td colspan="2">Zona asignada 600 m² + taludes y accesos</td>
                </tr>
            </tbody>
        </table>
    </div>

    <hr class="mp-divider">

    <!-- 1.2 Distancias -->
    <div class="mp-sub-title mp-blue-title">📍 1.2 Tabla de Distancias y Ubicación</div>
    <div class="mp-table-wrap">
        <table class="mp-table mp-table-blue">
            <thead>
                <tr>
                    <th>Entre</th>
                    <th>Distancia mínima</th>
                    <th>Razón técnica</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Poza ↔ Poza</td>
                    <td class="td-highlight">2 metros</td>
                    <td>Acceso cómodo para manejo y cosecha</td>
                </tr>
                <tr>
                    <td>Pozas ↔ Casa habitación</td>
                    <td class="td-highlight">80 metros</td>
                    <td>Olores y proliferación de mosquitos</td>
                </tr>
                <tr>
                    <td>Pozas ↔ Galpones de aves</td>
                    <td class="td-highlight">30 metros</td>
                    <td>Evitar contaminación del agua por heces</td>
                </tr>
                <tr>
                    <td>Pozas ↔ Pozo de agua potable</td>
                    <td class="td-highlight">150 metros (aguas arriba)</td>
                    <td>Evitar contaminación del acuífero</td>
                </tr>
                <tr>
                    <td>Pozas ↔ Huerta</td>
                    <td class="td-highlight">20 metros</td>
                    <td>Usar aguas residuales como fertirrigación</td>
                </tr>
            </tbody>
        </table>
    </div>

    <hr class="mp-divider">

    <!-- 1.3 Construcción -->
    <div class="mp-sub-title mp-blue-title">🏗️ 1.3 Construcción de Pozas</div>

    <div class="mp-grid-2">
        <div>
            <div class="mp-badge mp-badge-blue" style="margin-bottom:0.5rem;">✅ Opción A — Recomendada</div>
            <div class="mp-body-text"><strong>Pozas en tierra con Geomembrana HDPE 300 micras</strong></div>
            <ul class="mp-body-text" style="margin:0.5rem 0 0 1.2rem; padding:0;">
                <li>Excavación con retroexcavadora: ~$600,000/día × 3 días = <strong>$1,800,000</strong></li>
                <li>Geomembrana HDPE 300 micras: 550 m² por poza grande = <strong>$2,750,000</strong> las 2 grandes</li>
                <li>Taludes: inclinación 1:1.5 (1 m vertical por 1.5 m horizontal)</li>
                <li class="mp-bold">Costo total 3 pozas con geomembrana: ~$7,500,000 COP</li>
            </ul>
        </div>
        <div>
            <div class="mp-badge mp-badge-yellow" style="margin-bottom:0.5rem;">⚠️ Opción B — Económica / Mayor Riesgo</div>
            <div class="mp-body-text"><strong>Pozas en tierra con arcilla</strong></div>
            <ul class="mp-body-text" style="margin:0.5rem 0 0 1.2rem; padding:0;">
                <li>Solo viable si el suelo tiene <strong>&gt;40% de arcilla</strong></li>
                <li>Verificar con análisis de suelo previo a la construcción</li>
                <li>Costo: ~<strong>$2,500,000</strong> (excavación + compactación)</li>
                <li>Riesgo real: filtraciones y pérdida de espejo de agua</li>
            </ul>
        </div>
    </div>

    <div class="mp-sub-title mp-blue-title" style="margin-top:1.2rem;">🔧 Equipos por Poza</div>
    <div class="mp-table-wrap">
        <table class="mp-table mp-table-blue">
            <thead>
                <tr>
                    <th>Equipo</th>
                    <th>Cant.</th>
                    <th>Función</th>
                    <th>Precio unitario</th>
                    <th>Total 3 pozas</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Aireador de paleta 1 HP</td>
                    <td>1 por poza</td>
                    <td>Oxigenación nocturna</td>
                    <td>$380,000</td>
                    <td class="td-money">$1,140,000</td>
                </tr>
                <tr>
                    <td>Tubo PVC 4" (desagüe monacal)</td>
                    <td>1 por poza</td>
                    <td>Cosecha y recambio de agua</td>
                    <td>$95,000</td>
                    <td class="td-money">$285,000</td>
                </tr>
                <tr>
                    <td>Red de arrastre 20 m</td>
                    <td>1</td>
                    <td>Cosecha masiva de peces</td>
                    <td>$350,000</td>
                    <td class="td-money">$350,000</td>
                </tr>
                <tr>
                    <td>Red sombra sobre poza</td>
                    <td>Opcional</td>
                    <td>Reducir algas y evaporación solar</td>
                    <td>$200,000</td>
                    <td class="td-money">$600,000</td>
                </tr>
                <tr>
                    <td>Termómetro de agua</td>
                    <td>1</td>
                    <td>Control de temperatura diario</td>
                    <td>$25,000</td>
                    <td class="td-money">$25,000</td>
                </tr>
                <tr>
                    <td>Oxímetro básico (DO meter)</td>
                    <td>1</td>
                    <td>Medición de oxígeno disuelto</td>
                    <td>$180,000</td>
                    <td class="td-money">$180,000</td>
                </tr>
                <tr style="font-weight:700;">
                    <td colspan="4">TOTAL EQUIPOS</td>
                    <td class="td-highlight">~$2,580,000</td>
                </tr>
            </tbody>
        </table>
    </div>

    <hr class="mp-divider">

    <!-- 1.4 Densidad -->
    <div class="mp-sub-title mp-blue-title">🐠 1.4 Densidad y Cantidad de Peces</div>
    <div class="mp-table-wrap">
        <table class="mp-table mp-table-blue">
            <thead>
                <tr>
                    <th>Poza</th>
                    <th>Especie</th>
                    <th>Densidad</th>
                    <th>Cantidad de peces</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Poza 1 (300 m³)</td>
                    <td>Tilapia Nilótica</td>
                    <td>10 peces/m³</td>
                    <td class="td-highlight">3,000 peces</td>
                </tr>
                <tr>
                    <td>Poza 2 (300 m³)</td>
                    <td>Cachama blanca</td>
                    <td>5 peces/m³</td>
                    <td class="td-highlight">1,500 peces</td>
                </tr>
                <tr>
                    <td>Poza 3 — cría (144 m³)</td>
                    <td>Alevinos tilapia</td>
                    <td>30/m³ (juveniles)</td>
                    <td class="td-highlight">4,000+ alevinos</td>
                </tr>
                <tr style="font-weight:700; background:#dbeafe;">
                    <td colspan="3">TOTAL PECES EN SISTEMA</td>
                    <td class="td-highlight">~8,500 peces</td>
                </tr>
            </tbody>
        </table>
    </div>

    <hr class="mp-divider">

    <!-- 1.5 Plan Alimentación Tilapia -->
    <div class="mp-sub-title mp-blue-title">🍽️ 1.5 Plan de Alimentación — Tilapia (ciclo 8–10 meses)</div>
    <div class="mp-note" style="margin-bottom:0.5rem;">PC = Porcentaje del Peso Corporal del pez por día</div>
    <div class="mp-table-wrap">
        <table class="mp-table mp-table-blue">
            <thead>
                <tr>
                    <th>Etapa</th>
                    <th>Peso del pez</th>
                    <th>% PC/día</th>
                    <th>Proteína concentrado</th>
                    <th>Frecuencia</th>
                    <th>Observación</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Alevino</td>
                    <td>&lt; 30 g</td>
                    <td class="td-highlight">8–10%</td>
                    <td>35–40% proteína</td>
                    <td>4–5 veces/día</td>
                    <td>Alimento granulado fino (0.5–1 mm)</td>
                </tr>
                <tr>
                    <td>Juvenil</td>
                    <td>30–100 g</td>
                    <td class="td-highlight">5–6%</td>
                    <td>28–32% proteína</td>
                    <td>3 veces/día</td>
                    <td>Gránulo mediano (2–3 mm)</td>
                </tr>
                <tr>
                    <td>Engorde</td>
                    <td>100–300 g</td>
                    <td class="td-highlight">3–4%</td>
                    <td>25–28% proteína</td>
                    <td>3 veces/día</td>
                    <td>Gránulo grande (3–5 mm)</td>
                </tr>
                <tr>
                    <td>Finalización</td>
                    <td>&gt; 300 g</td>
                    <td class="td-highlight">2–3%</td>
                    <td>22–25% proteína</td>
                    <td>2 veces/día</td>
                    <td>Meta: 350–500 g en cosecha</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="mp-alert mp-alert-blue" style="margin-top:1rem;">
        <span>💰</span>
        <div>
            <strong>Proyección económica tilapia (3,000 peces / ciclo 8 meses):</strong><br>
            Alimento: 3,000 × 500 g peso final × FCR 1.6 = <strong>2,400 kg</strong> concentrado &times; $3,500/kg = <strong>$8,400,000</strong><br>
            Alevinos: 3,500 × $300 c/u = <strong>$1,050,000</strong><br>
            Ingreso cosecha: 2,500 peces (mortalidad 17%) × 450 g × 2 = 2,250 kg × $7,500/kg = <strong>$16,875,000</strong><br>
            <strong>Utilidad neta estimada/cosecha: ~$7,400,000 en 8–10 meses</strong>
        </div>
    </div>

    <hr class="mp-divider">

    <!-- 1.6 Plan Alimentación Cachama -->
    <div class="mp-sub-title mp-blue-title">🐟 1.6 Plan de Alimentación — Cachama (ciclo 10–12 meses)</div>
    <div class="mp-table-wrap">
        <table class="mp-table mp-table-blue">
            <thead>
                <tr>
                    <th>Etapa</th>
                    <th>Peso</th>
                    <th>% PC/día</th>
                    <th>Proteína</th>
                    <th>Frecuencia</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Alevino</td>
                    <td>&lt; 50 g</td>
                    <td class="td-highlight">6%</td>
                    <td>30% proteína</td>
                    <td>3 veces/día</td>
                </tr>
                <tr>
                    <td>Juvenil</td>
                    <td>50–200 g</td>
                    <td class="td-highlight">4%</td>
                    <td>26% proteína</td>
                    <td>2–3 veces/día</td>
                </tr>
                <tr>
                    <td>Engorde</td>
                    <td>200–500 g</td>
                    <td class="td-highlight">3%</td>
                    <td>22–24% proteína</td>
                    <td>2 veces/día</td>
                </tr>
                <tr>
                    <td>Finalización</td>
                    <td>&gt; 500 g</td>
                    <td class="td-highlight">2.5%</td>
                    <td>20–22% proteína</td>
                    <td>2 veces/día</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="mp-alert mp-alert-green" style="margin-top:0.75rem;">
        <span>🌿</span>
        <div><strong>Ventaja Cachama:</strong> Acepta fruta de descarte, residuos vegetales de la huerta y gallinaza fermentada como suplemento. Esto puede reducir los costos de concentrado hasta un <strong>30%</strong>, mejorando significativamente la rentabilidad.</div>
    </div>

    <hr class="mp-divider">

    <!-- 1.7 Calidad del Agua -->
    <div class="mp-sub-title mp-blue-title">💧 1.7 Calidad del Agua y Parámetros de Control</div>
    <div class="mp-table-wrap">
        <table class="mp-table mp-table-blue">
            <thead>
                <tr>
                    <th>Parámetro</th>
                    <th>Rango óptimo</th>
                    <th>Frecuencia de medición</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Temperatura</td>
                    <td class="td-highlight">26–32 °C</td>
                    <td>Cada mañana (6–7 am)</td>
                </tr>
                <tr>
                    <td>Oxígeno disuelto (DO)</td>
                    <td class="td-highlight">&gt; 4 mg/L (óptimo &gt; 6 mg/L)</td>
                    <td>Mañana y noche</td>
                </tr>
                <tr>
                    <td>pH</td>
                    <td class="td-highlight">6.5–8.5</td>
                    <td>Cada 2 días</td>
                </tr>
                <tr>
                    <td>Amoniaco total (NH₃)</td>
                    <td class="td-highlight">&lt; 0.5 mg/L</td>
                    <td>Semanal</td>
                </tr>
                <tr>
                    <td>Transparencia (disco Secchi)</td>
                    <td class="td-highlight">30–50 cm</td>
                    <td>Semanal</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="mp-alert mp-alert-red" style="margin-top:0.75rem;">
        <span>🚨</span>
        <div>
            <strong>Protocolo de emergencia si DO &lt; 3 mg/L:</strong>
            <ol style="margin:0.3rem 0 0 1.2rem; padding:0; font-size:0.84rem;">
                <li>Activar aireadores de paleta de inmediato</li>
                <li>Suspender o reducir al 50% la alimentación del día</li>
                <li>Recambio urgente del 20% del volumen de agua</li>
                <li>Revisar carga orgánica y densidad de siembra</li>
            </ol>
        </div>
    </div>

    <hr class="mp-divider">

    <!-- 1.8 Recambio de Agua -->
    <div class="mp-sub-title mp-blue-title">🔄 1.8 Recambio de Agua y Fertirrigación</div>
    <div class="mp-body-text">
        <ul style="margin: 0 0 0 1.2rem; padding:0;">
            <li>Recambio del <strong>10–15% del volumen</strong> de cada poza cada semana</li>
            <li>El agua desechada es rica en fósforo, nitrógeno y potasio &rarr; se usa directamente para regar la huerta (<strong>fertirrigación gratuita</strong>)</li>
            <li><strong>NO vaciar pozas repentinamente</strong>: genera estrés severo en los peces y aumenta mortalidad</li>
            <li>Llevar registro de fechas, volúmenes y parámetros en bitácora semanal</li>
        </ul>
    </div>
</div>


<!-- ============================================================
     SECCIÓN 2: HORTALIZAS
     ============================================================ -->
<div class="mp-card mp-card-green">
    <div class="mp-section-title mp-green-title">🥬 SECCIÓN 2: HORTALIZAS INTENSIVAS — 1,500 m²</div>
    <div class="mp-body-text">Producción hortícola en camas permanentes con riego por goteo. Rotación constante para maximizar el uso del suelo y mantener producción durante todo el año en el clima tropical húmedo de Planeta Rica.</div>

    <div class="mp-grid-3" style="margin-top:1rem;">
        <div class="mp-stat mp-stat-green">
            <div class="mp-stat-value">10 camas</div>
            <div class="mp-stat-label">Camas productivas 1.2×20 m</div>
        </div>
        <div class="mp-stat mp-stat-green">
            <div class="mp-stat-value">240 m²</div>
            <div class="mp-stat-label">Superficie productiva neta</div>
        </div>
        <div class="mp-stat mp-stat-green">
            <div class="mp-stat-value">Norte–Sur</div>
            <div class="mp-stat-label">Orientación óptima camas</div>
        </div>
    </div>

    <hr class="mp-divider">

    <!-- 2.1 Distribución -->
    <div class="mp-sub-title mp-green-title">📐 2.1 Distribución de Camas</div>
    <div class="mp-body-text">
        <ul style="margin: 0 0 0 1.2rem; padding:0;">
            <li>Ancho de cada cama: <strong>1.2 metros</strong> (alcanzable desde ambos lados sin pisar el cultivo)</li>
            <li>Largo de camas: <strong>20 metros</strong></li>
            <li>Pasillo entre camas: <strong>0.6 metros</strong> (paso cómodo con carretilla)</li>
            <li>Total: <strong>10 camas</strong> de 1.2 × 20 m = 240 m² productivos + pasillos + bordes</li>
            <li>Orientación: <strong>Norte–Sur</strong> para mejor aprovechamiento solar uniforme durante el día</li>
        </ul>
    </div>

    <hr class="mp-divider">

    <!-- 2.2 Cultivos recomendados -->
    <div class="mp-sub-title mp-green-title">🌱 2.2 Cultivos Recomendados para Planeta Rica</div>
    <div class="mp-table-wrap">
        <table class="mp-table mp-table-green">
            <thead>
                <tr>
                    <th>Cultivo</th>
                    <th>Ciclo</th>
                    <th>Densidad/cama</th>
                    <th>Rendim./cama (20 m)</th>
                    <th>Precio plaza</th>
                    <th>Ingreso/cama/ciclo</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>🍅 Tomate chonto</strong></td>
                    <td>90–120 días</td>
                    <td>0.5 m entre plantas = 48 plantas</td>
                    <td>120–150 kg</td>
                    <td>$2,500/kg</td>
                    <td class="td-highlight-green">$337,500</td>
                </tr>
                <tr>
                    <td><strong>🫑 Ají dulce</strong></td>
                    <td>90 días</td>
                    <td>0.4 m = 60 plantas</td>
                    <td>80–100 kg</td>
                    <td>$3,000/kg</td>
                    <td class="td-highlight-green">$270,000</td>
                </tr>
                <tr>
                    <td><strong>🌿 Cilantro</strong></td>
                    <td>30–35 días</td>
                    <td>Siembra densa a voleo</td>
                    <td>8–12 kg</td>
                    <td>$6,000/kg</td>
                    <td class="td-highlight-green">$60,000</td>
                </tr>
                <tr>
                    <td><strong>🫘 Habichuela</strong></td>
                    <td>60 días</td>
                    <td>0.2 m = 120 plantas</td>
                    <td>50–70 kg</td>
                    <td>$2,800/kg</td>
                    <td class="td-highlight-green">$168,000</td>
                </tr>
                <tr>
                    <td><strong>🥒 Pepino cohombro</strong></td>
                    <td>60 días</td>
                    <td>0.5 m = 48 plantas</td>
                    <td>100–150 kg</td>
                    <td>$1,800/kg</td>
                    <td class="td-highlight-green">$225,000</td>
                </tr>
                <tr>
                    <td><strong>🎃 Ahuyama (zapallo)</strong></td>
                    <td>90 días</td>
                    <td>1 m = 24 plantas</td>
                    <td>200–300 kg</td>
                    <td>$800/kg</td>
                    <td class="td-highlight-green">$200,000</td>
                </tr>
            </tbody>
        </table>
    </div>

    <hr class="mp-divider">

    <!-- 2.3 Rotación -->
    <div class="mp-sub-title mp-green-title">🔄 2.3 Plan de Rotación de Cultivos (4 ciclos por año)</div>
    <div class="mp-table-wrap">
        <table class="mp-table mp-table-green">
            <thead>
                <tr>
                    <th>Camas</th>
                    <th>Ciclo 1 (Ene–Mar)</th>
                    <th>Ciclo 2 (Abr–Jun)</th>
                    <th>Ciclo 3 (Jul–Sep)</th>
                    <th>Ciclo 4 (Oct–Dic)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Camas 1–3</strong></td>
                    <td>🍅 Tomate (90 d)</td>
                    <td>🫘 Habichuela</td>
                    <td>🌿 Cilantro ×2</td>
                    <td>🍅 Tomate</td>
                </tr>
                <tr>
                    <td><strong>Camas 4–5</strong></td>
                    <td>🫑 Ají dulce (90 d)</td>
                    <td>🥒 Pepino</td>
                    <td>🫑 Ají dulce</td>
                    <td>🥒 Pepino</td>
                </tr>
                <tr>
                    <td><strong>Camas 6–7</strong></td>
                    <td>🫘 Habichuela</td>
                    <td>🍅 Tomate</td>
                    <td>🌿 Cilantro</td>
                    <td>🫘 Habichuela</td>
                </tr>
                <tr>
                    <td><strong>Camas 8–9</strong></td>
                    <td>🥒 Pepino</td>
                    <td>🫑 Ají dulce</td>
                    <td>🍅 Tomate</td>
                    <td>🎃 Ahuyama</td>
                </tr>
                <tr>
                    <td><strong>Cama 10</strong></td>
                    <td colspan="4" style="text-align:center; font-weight:700; color:#166534;">🌿 SIEMPRE CILANTRO — Rotación cada 35 días → 10 cosechas/año. Ingreso continuo y rápido.</td>
                </tr>
            </tbody>
        </table>
    </div>

    <hr class="mp-divider">

    <!-- 2.4 Sistema de Riego -->
    <div class="mp-sub-title mp-green-title">💧 2.4 Sistema de Riego por Goteo</div>
    <div class="mp-table-wrap">
        <table class="mp-table mp-table-green">
            <thead>
                <tr>
                    <th>Componente</th>
                    <th>Cantidad</th>
                    <th>Precio unitario</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Manguera cintilla goteo (rollo 200 m)</td>
                    <td>4 rollos</td>
                    <td>$85,000</td>
                    <td class="td-money">$340,000</td>
                </tr>
                <tr>
                    <td>Tubería principal PVC 2"</td>
                    <td>30 m</td>
                    <td>$8,500/m</td>
                    <td class="td-money">$255,000</td>
                </tr>
                <tr>
                    <td>Conectores, válvulas, filtro de malla</td>
                    <td>Global</td>
                    <td>—</td>
                    <td class="td-money">$180,000</td>
                </tr>
                <tr>
                    <td>Tanque elevado 500 L (con estructura)</td>
                    <td>1</td>
                    <td>$280,000</td>
                    <td class="td-money">$280,000</td>
                </tr>
                <tr style="font-weight:700;">
                    <td colspan="3">TOTAL SISTEMA DE RIEGO</td>
                    <td class="td-highlight-green">$1,055,000</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="mp-alert mp-alert-green" style="margin-top:0.75rem;">
        <span>💡</span>
        <div><strong>Beneficios del riego por goteo:</strong> Ahorra 40–60% de agua versus aspersión, reduce enfermedades foliares al no mojar el follaje, menor crecimiento de malezas entre hileras y permite fertirriego directo con agua de poza diluida.</div>
    </div>

    <hr class="mp-divider">

    <!-- 2.5 Fertilización -->
    <div class="mp-sub-title mp-green-title">🌿 2.5 Plan de Fertilización Hortalizas</div>
    <div class="mp-table-wrap">
        <table class="mp-table mp-table-green">
            <thead>
                <tr>
                    <th>Momento</th>
                    <th>Fertilizante</th>
                    <th>Dosis por cama (20 m)</th>
                    <th>Frecuencia</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Antes de siembra</td>
                    <td>Gallinaza compostada</td>
                    <td>10 kg/m² → 24 kg/cama</td>
                    <td>1 vez por ciclo (incorporar al suelo)</td>
                </tr>
                <tr>
                    <td>Semana 2–3</td>
                    <td>Urea 46% (nitrógeno)</td>
                    <td>50 g/m² disuelta en agua</td>
                    <td>Cada 15 días</td>
                </tr>
                <tr>
                    <td>Semana 4–6</td>
                    <td>10-30-10 (NPK fosforado)</td>
                    <td>40 g/m²</td>
                    <td>Cada 15 días</td>
                </tr>
                <tr>
                    <td>Semana 6 en adelante</td>
                    <td>KNO₃ (nitrato de potasio)</td>
                    <td>30 g/m²</td>
                    <td>Semanal (llenado de frutos)</td>
                </tr>
                <tr>
                    <td>Todo el ciclo</td>
                    <td>Compost líquido / lixiviado de poza</td>
                    <td>Dilución 1:10 en agua</td>
                    <td>Semanal vía goteo</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="mp-note">Costo total insumos hortalizas: <strong>~$350,000/mes</strong> (semillas, abono, agroquímicos básicos). Se reduce hasta 40% con uso de compost propio y agua de pozas.</div>
</div>


<!-- ============================================================
     SECCIÓN 3: PLÁTANO HARTÓN
     ============================================================ -->
<div class="mp-card mp-card-yellow">
    <div class="mp-section-title mp-yellow-title">🍌 SECCIÓN 3: PLÁTANO HARTÓN — 2,500 m²</div>
    <div class="mp-body-text">Cultivo de plátano Dominico-Hartón adaptado a las condiciones de alta humedad y temperatura de Planeta Rica. Producto con alta demanda local en Montería, Planeta Rica y mercados regionales de Córdoba.</div>

    <div class="mp-grid-3" style="margin-top:1rem;">
        <div class="mp-stat mp-stat-yellow">
            <div class="mp-stat-value">277</div>
            <div class="mp-stat-label">Plantas (3×3 m)</div>
        </div>
        <div class="mp-stat mp-stat-yellow">
            <div class="mp-stat-value">10–12 m</div>
            <div class="mp-stat-label">Meses primer corte</div>
        </div>
        <div class="mp-stat mp-stat-yellow">
            <div class="mp-stat-value">$3,000,000</div>
            <div class="mp-stat-label">Ingreso anual año 2+</div>
        </div>
    </div>

    <hr class="mp-divider">

    <!-- 3.1 Densidad -->
    <div class="mp-sub-title mp-yellow-title">📐 3.1 Densidad de Siembra</div>
    <div class="mp-table-wrap">
        <table class="mp-table mp-table-yellow">
            <thead>
                <tr>
                    <th>Sistema</th>
                    <th>Distancia</th>
                    <th>Plantas en 2,500 m²</th>
                    <th>Producción anual est.</th>
                    <th>Recomendación</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Marco real 3×3 m</strong></td>
                    <td>3 m × 3 m</td>
                    <td class="td-highlight">277 plantas</td>
                    <td>194 racimos/año</td>
                    <td class="td-highlight" style="color:#166534; font-weight:700;">✅ RECOMENDADO</td>
                </tr>
                <tr>
                    <td>Doble surco 2×3 m</td>
                    <td>2 m × 3 m</td>
                    <td>416 plantas</td>
                    <td>291 racimos/año</td>
                    <td>Mayor producción pero más Sigatoka</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="mp-alert mp-alert-yellow" style="margin-top:0.75rem;">
        <span>🍌</span>
        <div><strong>¿Por qué 3×3 m?</strong> El mayor espaciado garantiza mejor ventilación entre plantas, reduciendo drásticamente la incidencia de Sigatoka negra y amarilla, las principales enfermedades foliares del plátano en la zona de Planeta Rica.</div>
    </div>

    <hr class="mp-divider">

    <!-- 3.2 Variedades -->
    <div class="mp-sub-title mp-yellow-title">🌱 3.2 Variedades Recomendadas</div>
    <div class="mp-table-wrap">
        <table class="mp-table mp-table-yellow">
            <thead>
                <tr>
                    <th>Variedad</th>
                    <th>Peso del racimo</th>
                    <th>Ciclo</th>
                    <th>Precio mercado</th>
                    <th>Ventaja principal</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Hartón (Dominico-Hartón)</strong></td>
                    <td>15–25 kg</td>
                    <td>10–12 meses</td>
                    <td>$10,000–$15,000/racimo</td>
                    <td class="td-highlight-green">El más demandado en Córdoba</td>
                </tr>
                <tr>
                    <td>FHIA-20 (mejorado ICA)</td>
                    <td>20–30 kg</td>
                    <td>10 meses</td>
                    <td>$12,000–$18,000/racimo</td>
                    <td>Resistente a Sigatoka negra</td>
                </tr>
                <tr>
                    <td>Dominico criollo</td>
                    <td>10–15 kg</td>
                    <td>9 meses</td>
                    <td>$8,000–$12,000/racimo</td>
                    <td>Ciclo corto, sabor local preferido</td>
                </tr>
            </tbody>
        </table>
    </div>

    <hr class="mp-divider">

    <!-- 3.3 Preparación y Siembra -->
    <div class="mp-sub-title mp-yellow-title">🏗️ 3.3 Preparación del Lote y Siembra</div>
    <div class="mp-table-wrap">
        <table class="mp-table mp-table-yellow">
            <thead>
                <tr>
                    <th>Paso</th>
                    <th>Descripción</th>
                    <th>Costo aprox.</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1. Limpieza del lote</td>
                    <td>Chapia con guadaña + descanso 15 días para pudrición residuos</td>
                    <td>$300,000 (mano de obra)</td>
                </tr>
                <tr>
                    <td>2. Hoyaneo</td>
                    <td>Hoyos 40×40×40 cm con pala o palín, a las distancias marcadas con estacas</td>
                    <td>$250,000</td>
                </tr>
                <tr>
                    <td>3. Abonada de hoyos</td>
                    <td>5 kg gallinaza compostada + 100 g fosforita Huila por hoyo. Mezclar con tierra</td>
                    <td>$180,000</td>
                </tr>
                <tr>
                    <td>4. Colinos certificados</td>
                    <td>277 colinos sanos tipo espada, libres de picudo negro (<em>Cosmopolites sordidus</em>)</td>
                    <td>$500/colino = $138,500</td>
                </tr>
                <tr>
                    <td>5. Siembra</td>
                    <td>Colino parado vertical, raíces orientadas hacia abajo. No enterrar el seudotallo. Apisonar suelo alrededor</td>
                    <td>$200,000 mano de obra</td>
                </tr>
                <tr style="font-weight:700;">
                    <td colspan="2">TOTAL INSTALACIÓN PLÁTANO</td>
                    <td class="td-highlight">~$1,068,500</td>
                </tr>
            </tbody>
        </table>
    </div>

    <hr class="mp-divider">

    <!-- 3.4 Mantenimiento -->
    <div class="mp-sub-title mp-yellow-title">🔧 3.4 Plan de Mantenimiento y Fertilización</div>
    <div class="mp-table-wrap">
        <table class="mp-table mp-table-yellow">
            <thead>
                <tr>
                    <th>Labor</th>
                    <th>Frecuencia</th>
                    <th>Costo mensual prom.</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Deshierbe manual entre plantas</td>
                    <td>Mensual</td>
                    <td>$80,000</td>
                </tr>
                <tr>
                    <td>Deschante (retiro de hojas secas y enfermas)</td>
                    <td>Cada 2 meses</td>
                    <td>$40,000</td>
                </tr>
                <tr>
                    <td>Deshije — dejar 1 hijo bellota + 1 hijo agua</td>
                    <td>Cada 3 meses</td>
                    <td>$60,000</td>
                </tr>
                <tr>
                    <td>Fertilización edáfica: 15-15-15, 200 g/planta</td>
                    <td>Cada 4 meses</td>
                    <td>$85,000</td>
                </tr>
                <tr>
                    <td>Gallinaza compostada 5 kg/planta</td>
                    <td>Cada 6 meses</td>
                    <td>$70,000</td>
                </tr>
                <tr>
                    <td>Apuntalado (con bambú o guadua) cuando sale la bellota</td>
                    <td>Según necesidad</td>
                    <td>$30,000</td>
                </tr>
                <tr>
                    <td>Enfunde con bolsa azul Maguaré (protege racimo)</td>
                    <td>Al salir el racimo</td>
                    <td>$120,000</td>
                </tr>
                <tr style="font-weight:700;">
                    <td colspan="2">TOTAL MANTENIMIENTO MENSUAL (promedio)</td>
                    <td class="td-highlight">~$125,000/mes</td>
                </tr>
            </tbody>
        </table>
    </div>

    <hr class="mp-divider">

    <!-- 3.5 Proyección -->
    <div class="mp-sub-title mp-yellow-title">📈 3.5 Proyección de Producción</div>
    <div class="mp-grid-2">
        <div>
            <table class="mp-table mp-table-yellow">
                <thead>
                    <tr><th>Período</th><th>Producción</th><th>Ingreso est.</th></tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Mes 10–12 (primer corte)</td>
                        <td>50–80 racimos (50% plantas)</td>
                        <td>$600,000–$960,000</td>
                    </tr>
                    <tr>
                        <td>Año 2 en adelante</td>
                        <td>200–250 racimos/año</td>
                        <td class="td-highlight">$2,400,000–$3,000,000/año</td>
                    </tr>
                    <tr>
                        <td>Por mes (año 2+)</td>
                        <td>17–21 racimos/mes</td>
                        <td class="td-highlight">$200,000–$250,000/mes</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div>
            <div class="mp-alert mp-alert-yellow">
                <span>🍌</span>
                <div>
                    <strong>Mercados objetivo:</strong><br>
                    Plaza de mercado de Planeta Rica, tiendas locales, intermediarios de Montería, restaurantes y comedores de la zona. El plátano hartón se vende todo el año en Córdoba sin problema de sobreoferta estacional.
                </div>
            </div>
        </div>
    </div>
</div>


<!-- ============================================================
     SECCIÓN 4: YUCA Y ÑAME
     ============================================================ -->
<div class="mp-card mp-card-yellow">
    <div class="mp-section-title mp-yellow-title">🌱 SECCIÓN 4: YUCA Y ÑAME — 1,500 m²</div>
    <div class="mp-body-text">Cultivos de alta adaptación al suelo arcilloso-arenoso de Planeta Rica. La yuca y el ñame son productos de consumo masivo con mercado garantizado en toda la subregión de la Sabana de Córdoba. Se recomienda sembrar <strong>50% yuca (750 m²) + 50% ñame (750 m²)</strong> para diversificar el riesgo de precios.</div>

    <div class="mp-grid-3" style="margin-top:1rem;">
        <div class="mp-stat mp-stat-yellow">
            <div class="mp-stat-value">750 m²</div>
            <div class="mp-stat-label">Área yuca ICA Negrita</div>
        </div>
        <div class="mp-stat mp-stat-yellow">
            <div class="mp-stat-value">750 m²</div>
            <div class="mp-stat-label">Área ñame Dioscorea</div>
        </div>
        <div class="mp-stat mp-stat-yellow">
            <div class="mp-stat-value">~$3.8M</div>
            <div class="mp-stat-label">Ingreso total por cosecha</div>
        </div>
    </div>

    <hr class="mp-divider">

    <!-- 4.1 Yuca -->
    <div class="mp-sub-title mp-yellow-title">🌿 4.1 Yuca — ICA Negrita o Venezolana</div>
    <div class="mp-table-wrap">
        <table class="mp-table mp-table-yellow">
            <thead>
                <tr>
                    <th>Variedad</th>
                    <th>Distancia siembra</th>
                    <th>Plantas en 750 m²</th>
                    <th>Rendimiento</th>
                    <th>Ciclo</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>ICA Negrita</strong></td>
                    <td>1 m × 1.5 m</td>
                    <td>500 plantas</td>
                    <td>20–30 t/ha → <strong>1.5–2.25 t</strong> en 750 m²</td>
                    <td>12 meses</td>
                </tr>
                <tr>
                    <td>Venezolana</td>
                    <td>1 m × 1 m</td>
                    <td>750 plantas</td>
                    <td>18–25 t/ha → <strong>1.35–1.87 t</strong> en 750 m²</td>
                    <td>10 meses</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="mp-sub-title mp-yellow-title" style="margin-top:1rem;">💰 Costos e Ingresos — Yuca (750 m²)</div>
    <div class="mp-grid-2">
        <div>
            <table class="mp-table mp-table-yellow">
                <thead><tr><th>Rubro</th><th>Costo</th></tr></thead>
                <tbody>
                    <tr><td>Estacas semilla 20 cm (500–750)</td><td>$200/estaca = $120,000</td></tr>
                    <tr><td>Preparación terreno + siembra manual</td><td>$175,000</td></tr>
                    <tr><td>Fertilización (gallinaza 4 kg/m²)</td><td>$300,000</td></tr>
                    <tr><td>Herbicida preemergente (1 aplicación)</td><td>$75,000</td></tr>
                    <tr style="font-weight:700;"><td>TOTAL INVERSIÓN YUCA</td><td class="td-highlight">~$670,000</td></tr>
                </tbody>
            </table>
        </div>
        <div>
            <div class="mp-alert mp-alert-yellow">
                <span>💰</span>
                <div>
                    <strong>Ingreso yuca estimado:</strong><br>
                    1,750 kg × $700/kg en plaza = <strong>$1,225,000 por cosecha</strong> (cada 10–12 meses)<br><br>
                    <strong>Subproductos:</strong> Hojas frescas para alimentar cerdos o tilapia, cáscara para compostaje, almidón artesanal (coladas, arepas de yuca).
                </div>
            </div>
        </div>
    </div>

    <hr class="mp-divider">

    <!-- 4.2 Ñame -->
    <div class="mp-sub-title mp-yellow-title">🥔 4.2 Ñame — Dioscorea alata (Espino o Criollo)</div>
    <div class="mp-table-wrap">
        <table class="mp-table mp-table-yellow">
            <thead>
                <tr>
                    <th>Parámetro</th>
                    <th>Valor</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Distancia de siembra</td>
                    <td>1 m × 1.5 m = ~500 semillas en 750 m²</td>
                </tr>
                <tr>
                    <td>Ciclo productivo</td>
                    <td>8–9 meses</td>
                </tr>
                <tr>
                    <td>Rendimiento esperado</td>
                    <td>15–25 t/ha → <strong>1.12–1.87 t en 750 m²</strong></td>
                </tr>
                <tr>
                    <td>Precio mercado Montería / Planeta Rica</td>
                    <td class="td-highlight">$1,200–$1,800 /kg</td>
                </tr>
                <tr>
                    <td>Ingreso estimado por cosecha (750 m²)</td>
                    <td class="td-highlight-green" style="font-weight:700;">$1,500,000–$2,500,000</td>
                </tr>
                <tr>
                    <td>Requiere</td>
                    <td>Tutorado con estacas o guadua (planta trepadora)</td>
                </tr>
                <tr>
                    <td>Ventaja principal vs yuca</td>
                    <td class="td-highlight-green"><strong>Mejor precio unitario y alta demanda en Córdoba</strong></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="mp-alert mp-alert-green" style="margin-top:0.75rem;">
        <span>💡</span>
        <div><strong>Consejo técnico para ñame:</strong> Usar semilla certificada del ICA o semilla propia de la primera cosecha. Asegurarse de instalar tutores de guadua antes de que la planta alcance 30 cm de altura. El ñame es altamente sensible al anegamiento — garantizar buen drenaje del lote asignado.</div>
    </div>

    <hr class="mp-divider">

    <!-- 4.3 Fertilización Yuca y Ñame -->
    <div class="mp-sub-title mp-yellow-title">🌿 4.3 Fertilización Yuca y Ñame (por 750 m² de cada cultivo)</div>
    <div class="mp-table-wrap">
        <table class="mp-table mp-table-yellow">
            <thead>
                <tr>
                    <th>Momento</th>
                    <th>Producto</th>
                    <th>Dosis</th>
                    <th>Costo aprox.</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Pre-siembra</td>
                    <td>Gallinaza compostada</td>
                    <td>4 kg/m² incorporado</td>
                    <td>$240,000</td>
                </tr>
                <tr>
                    <td>1 mes después de siembra</td>
                    <td>Urea 46% (nitrógeno)</td>
                    <td>60 g/planta disuelto</td>
                    <td>$45,000</td>
                </tr>
                <tr>
                    <td>3 meses</td>
                    <td>15-15-15 (NPK completo)</td>
                    <td>80 g/planta</td>
                    <td>$60,000</td>
                </tr>
                <tr>
                    <td>6 meses</td>
                    <td>KCl (cloruro de potasio)</td>
                    <td>50 g/planta</td>
                    <td>$37,500</td>
                </tr>
                <tr style="font-weight:700;">
                    <td colspan="3">COSTO TOTAL FERTILIZACIÓN / CICLO (por cultivo)</td>
                    <td class="td-highlight">~$382,500</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


<!-- ============================================================
     SECCIÓN 5: COMPOSTAJE
     ============================================================ -->
<div class="mp-card mp-card-brown">
    <div class="mp-section-title mp-brown-title">♻️ SECCIÓN 5: SISTEMA DE COMPOSTAJE — 200 m²</div>
    <div class="mp-body-text">Sistema de compostaje activo en tres módulos de rotación continua. Aprovecha todos los residuos orgánicos de la granja para producir enmienda orgánica de alta calidad, reemplazando fertilizantes externos y cerrando el ciclo de nutrientes.</div>

    <div class="mp-grid-3" style="margin-top:1rem;">
        <div class="mp-stat mp-stat-brown">
            <div class="mp-stat-value">3</div>
            <div class="mp-stat-label">Módulos activos</div>
        </div>
        <div class="mp-stat mp-stat-brown">
            <div class="mp-stat-value">1,200–1,500 kg</div>
            <div class="mp-stat-label">Compost maduro / mes</div>
        </div>
        <div class="mp-stat mp-stat-brown">
            <div class="mp-stat-value">$400,000</div>
            <div class="mp-stat-label">Ahorro mensual en fertilizante</div>
        </div>
    </div>

    <hr class="mp-divider">

    <!-- 5.1 Módulos -->
    <div class="mp-sub-title mp-brown-title">📦 5.1 Diseño de los Módulos</div>
    <div class="mp-table-wrap">
        <table class="mp-table mp-table-brown">
            <thead>
                <tr>
                    <th>Módulo</th>
                    <th>Dimensiones</th>
                    <th>Capacidad</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Módulo 1</strong></td>
                    <td>3 m × 3 m × 1.2 m alto</td>
                    <td>~6 m³</td>
                    <td>Llenado activo (recibe residuos frescos)</td>
                </tr>
                <tr>
                    <td><strong>Módulo 2</strong></td>
                    <td>3 m × 3 m × 1.2 m alto</td>
                    <td>~6 m³</td>
                    <td>En fermentación (volteo semanal)</td>
                </tr>
                <tr>
                    <td><strong>Módulo 3</strong></td>
                    <td>3 m × 3 m × 1.2 m alto</td>
                    <td>~6 m³</td>
                    <td>Compost maduro (listo para usar)</td>
                </tr>
            </tbody>
        </table>
    </div>

    <hr class="mp-divider">

    <!-- 5.2 Fuentes de Materia -->
    <div class="mp-sub-title mp-brown-title">🌾 5.2 Fuentes de Materia Orgánica</div>
    <div class="mp-table-wrap">
        <table class="mp-table mp-table-brown">
            <thead>
                <tr>
                    <th>Fuente</th>
                    <th>Cantidad estimada</th>
                    <th>Frecuencia</th>
                    <th>Aporte al compost</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Gallinaza de gallinas ponedoras</td>
                    <td>0.10 kg/gallina/día × 500 = <strong>50 kg/día</strong></td>
                    <td>Diario</td>
                    <td>Alta en nitrógeno (relación C:N baja)</td>
                </tr>
                <tr>
                    <td>Gallinaza de pollo de engorde</td>
                    <td>0.12 kg/pollo × 500 = <strong>~60 kg/lote</strong></td>
                    <td>Al vaciar galpón</td>
                    <td>Alta en fósforo</td>
                </tr>
                <tr>
                    <td>Restos vegetales de huerta</td>
                    <td>~20 kg/semana</td>
                    <td>Semanal</td>
                    <td>Carbono + diversidad microbiana</td>
                </tr>
                <tr>
                    <td>Vástago y raquis de plátano</td>
                    <td>~50 kg/mes</td>
                    <td>Mensual</td>
                    <td>Potasio + carbono estructural</td>
                </tr>
                <tr>
                    <td>Cáscara de yuca y residuos de cocina</td>
                    <td>~15 kg/semana</td>
                    <td>Semanal</td>
                    <td>Carbono fermentable</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="mp-alert mp-alert-yellow" style="margin-top:0.75rem;">
        <span>⚠️</span>
        <div>
            <strong>Relación C:N ideal para compostaje rápido: 25–30:1</strong><br>
            Mezclar 3 partes de material seco (raquis, cascaras, paja) por 1 parte de material húmedo (gallinaza fresca, restos de cocina). Mantener humedad del 50–60% (la pila debe apretar en el puño y soltar unas pocas gotas). Temperatura interna: 55–65°C en la fase activa.
        </div>
    </div>
</div>


<!-- ============================================================
     SECCIÓN 6: RESUMEN INVERSIÓN TOTAL
     ============================================================ -->
<div class="mp-card mp-card-gray">
    <div class="mp-section-title mp-gray-title">💰 SECCIÓN 6: RESUMEN DE INVERSIÓN TOTAL — Finca Completa</div>
    <div class="mp-body-text">Consolidado de todos los componentes productivos de la granja, incluyendo los sistemas de aves ya documentados en el Manual de Aves. Precios en pesos colombianos (COP) a 2025.</div>

    <div class="mp-table-wrap" style="margin-top:1rem;">
        <table class="mp-table mp-table-gray">
            <thead>
                <tr>
                    <th>Componente</th>
                    <th>Inversión inicial</th>
                    <th>Ingreso mensual est.</th>
                    <th>Costo mensual</th>
                    <th>Utilidad/mes</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>🐔 Galpón gallinas ponedoras + equipos</td>
                    <td>$16,700,000</td>
                    <td>$9,700,000</td>
                    <td>$5,500,000</td>
                    <td class="td-highlight-green" style="font-weight:700;">$4,200,000</td>
                </tr>
                <tr>
                    <td>🐣 Galpón pollos de engorde + equipos</td>
                    <td>$13,800,000</td>
                    <td>$1,300,000</td>
                    <td>$650,000</td>
                    <td class="td-highlight-green" style="font-weight:700;">$650,000</td>
                </tr>
                <tr>
                    <td>🐟 Pozas piscícolas (3 pozas tilapia/cachama)</td>
                    <td>$10,080,000</td>
                    <td>$300,000 prom.</td>
                    <td>$120,000</td>
                    <td class="td-highlight-green" style="font-weight:700;">$180,000</td>
                </tr>
                <tr>
                    <td>🥬 Huerta hortalizas (1,500 m²)</td>
                    <td>$2,500,000</td>
                    <td>$400,000</td>
                    <td>$160,000</td>
                    <td class="td-highlight-green" style="font-weight:700;">$240,000</td>
                </tr>
                <tr>
                    <td>🍌 Plátano Hartón 2,500 m² (año 2+)</td>
                    <td>$1,100,000</td>
                    <td>$220,000</td>
                    <td>$125,000</td>
                    <td class="td-highlight-green" style="font-weight:700;">$95,000</td>
                </tr>
                <tr>
                    <td>🌱 Yuca + Ñame 1,500 m²</td>
                    <td>$1,400,000</td>
                    <td>$130,000 prom.</td>
                    <td>$60,000</td>
                    <td class="td-highlight-green" style="font-weight:700;">$70,000</td>
                </tr>
                <tr>
                    <td>🏠 Casa, pozo de agua, energía solar</td>
                    <td>$14,000,000</td>
                    <td>— (infraestructura)</td>
                    <td>—</td>
                    <td style="color:#6b7280; font-style:italic;">Soporte general</td>
                </tr>
                <tr>
                    <td>♻️ Sistema compostaje</td>
                    <td>$500,000</td>
                    <td>Ahorro $400,000</td>
                    <td>—</td>
                    <td class="td-highlight-green" style="font-weight:700;">$400,000</td>
                </tr>
                <tr style="font-weight:800; font-size:0.95rem;">
                    <td>TOTAL FINCA COMPLETA</td>
                    <td style="color:#1d4ed8;">~$60,080,000</td>
                    <td style="color:#166534;">~$12,050,000</td>
                    <td style="color:#991b1b;">~$6,615,000</td>
                    <td style="color:#166534; font-size:1rem;">~$5,835,000/mes</td>
                </tr>
            </tbody>
        </table>
    </div>

    <hr class="mp-divider">

    <!-- Fases de Implementación -->
    <div class="mp-sub-title mp-gray-title">🗓️ Recomendación: Implementación en 3 Fases</div>
    <div class="mp-alert mp-alert-yellow" style="margin-bottom:0.75rem;">
        <span>⚠️</span>
        <div>La inversión total de ~$60M supera el presupuesto inicial estimado de $20M–$50M. Se recomienda implementación escalonada priorizando los sistemas de mayor rentabilidad y recuperación más rápida.</div>
    </div>

    <div class="mp-grid-3">
        <div class="mp-stat mp-stat-blue" style="text-align:left; padding:1rem 1.1rem;">
            <div style="font-size:0.8rem; font-weight:800; text-transform:uppercase; letter-spacing:0.05em; opacity:0.7; margin-bottom:0.4rem;">FASE 1 — $25M</div>
            <div style="font-size:0.85rem; font-weight:700; margin-bottom:0.3rem;">Meses 1–6</div>
            <ul style="font-size:0.78rem; margin:0 0 0 1rem; padding:0; line-height:1.7;">
                <li>Pozo de agua + energía solar básica</li>
                <li>Galpón gallinas 500 ponedoras</li>
                <li>Galpón pollos de engorde</li>
                <li>Infraestructura básica (casa, cercas)</li>
            </ul>
            <div style="font-size:0.8rem; font-weight:800; margin-top:0.6rem;">Retorno: ~$4,800,000/mes</div>
        </div>
        <div class="mp-stat mp-stat-green" style="text-align:left; padding:1rem 1.1rem;">
            <div style="font-size:0.8rem; font-weight:800; text-transform:uppercase; letter-spacing:0.05em; opacity:0.7; margin-bottom:0.4rem;">FASE 2 — $15M</div>
            <div style="font-size:0.85rem; font-weight:700; margin-bottom:0.3rem;">Meses 6–12</div>
            <ul style="font-size:0.78rem; margin:0 0 0 1rem; padding:0; line-height:1.7;">
                <li>3 pozas piscícolas con geomembrana</li>
                <li>Huerta hortalizas con riego goteo</li>
                <li>Sistema de compostaje</li>
                <li>Siembra plátano y yuca/ñame</li>
            </ul>
            <div style="font-size:0.8rem; font-weight:800; margin-top:0.6rem;">Retorno adicional: ~$820,000/mes</div>
        </div>
        <div class="mp-stat mp-stat-yellow" style="text-align:left; padding:1rem 1.1rem;">
            <div style="font-size:0.8rem; font-weight:800; text-transform:uppercase; letter-spacing:0.05em; opacity:0.7; margin-bottom:0.4rem;">FASE 3 — $20M</div>
            <div style="font-size:0.85rem; font-weight:700; margin-bottom:0.3rem;">Año 2 en adelante</div>
            <ul style="font-size:0.78rem; margin:0 0 0 1rem; padding:0; line-height:1.7;">
                <li>Ampliación galpones (2a bandada)</li>
                <li>Mejoras en infraestructura</li>
                <li>Frigorífico pequeño para pescado</li>
                <li>Canal de comercialización directo</li>
            </ul>
            <div style="font-size:0.8rem; font-weight:800; margin-top:0.6rem;">Retorno total: ~$5,835,000/mes</div>
        </div>
    </div>

    <hr class="mp-divider">

    <!-- Indicadores de rentabilidad -->
    <div class="mp-sub-title mp-gray-title">📊 Indicadores Clave de Rentabilidad</div>
    <div class="mp-grid-2">
        <div class="mp-table-wrap">
            <table class="mp-table mp-table-gray">
                <thead>
                    <tr><th>Indicador</th><th>Valor</th></tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Inversión total finca</td>
                        <td class="td-highlight" style="font-weight:700;">~$60,080,000 COP</td>
                    </tr>
                    <tr>
                        <td>Ingreso mensual bruto (año 2+)</td>
                        <td class="td-highlight-green" style="font-weight:700;">~$12,050,000/mes</td>
                    </tr>
                    <tr>
                        <td>Costo operativo mensual</td>
                        <td style="color:#991b1b; font-weight:700;">~$6,615,000/mes</td>
                    </tr>
                    <tr>
                        <td>Margen neto mensual (año 2+)</td>
                        <td class="td-highlight-green" style="font-weight:700;">~$5,835,000/mes</td>
                    </tr>
                    <tr>
                        <td>Margen de utilidad</td>
                        <td class="td-highlight-green" style="font-weight:700;">~48%</td>
                    </tr>
                    <tr>
                        <td>Payback (retorno inversión)</td>
                        <td class="td-highlight" style="font-weight:700;">~10–11 meses (Fase 1)</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div>
            <div class="mp-alert mp-alert-green">
                <span>✅</span>
                <div>
                    <strong>Sistema sinérgico:</strong> La granja está diseñada como un sistema circular donde cada componente alimenta al siguiente.<br><br>
                    Gallinaza → Compost → Fertiliza hortalizas, plátano y yuca.<br>
                    Agua de pozas → Fertirrigación de huerta.<br>
                    Residuos huerta → Alimenta cachama (reduce 30% concentrado).<br>
                    Excedente plátano → Completa dieta cachama.<br>
                    Todo esto reduce costos operativos hasta un <strong>25–30%</strong> respecto a un sistema convencional.
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer informativo -->
<div style="text-align:center; font-size:0.75rem; color:#9ca3af; padding:1rem 0 0.5rem; border-top:1px solid #e5e7eb; margin-top:0.5rem;">
    Manual de Producción · Granja Planeta Rica, Córdoba, Colombia &mdash; Actualizado 2025 &mdash; Precios de referencia mercados regionales Córdoba
</div>

</x-filament-panels::page>
