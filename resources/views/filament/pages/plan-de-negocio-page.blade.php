<x-filament-panels::page>

<style>
    .pn-card {
        background: #fff;
        border: 1px solid #bbf7d0;
        border-radius: 0.75rem;
        padding: 1.25rem 1.5rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 1px 4px 0 rgba(22, 101, 52, 0.07);
    }
    .dark .pn-card {
        background: #1a2e1a;
        border-color: #166534;
    }
    .pn-section-title {
        font-size: 1.15rem;
        font-weight: 700;
        color: #166534;
        margin-bottom: 0.75rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    .dark .pn-section-title {
        color: #86efac;
    }
    .pn-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 0.875rem;
        margin-top: 0.5rem;
    }
    .pn-table th {
        background: #dcfce7;
        color: #166534;
        font-weight: 700;
        padding: 0.5rem 0.75rem;
        text-align: left;
        border: 1px solid #bbf7d0;
    }
    .dark .pn-table th {
        background: #14532d;
        color: #86efac;
        border-color: #166534;
    }
    .pn-table td {
        padding: 0.5rem 0.75rem;
        border: 1px solid #e2e8f0;
        vertical-align: top;
    }
    .dark .pn-table td {
        border-color: #2d4a2d;
        color: #d1fae5;
    }
    .pn-table tr:nth-child(even) td {
        background: #f0fdf4;
    }
    .dark .pn-table tr:nth-child(even) td {
        background: #1a3320;
    }
    .pn-table tr.total-row td {
        background: #dcfce7;
        font-weight: 700;
        color: #166534;
    }
    .dark .pn-table tr.total-row td {
        background: #14532d;
        color: #86efac;
    }
    .badge {
        display: inline-block;
        padding: 0.15rem 0.6rem;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 600;
        line-height: 1.4;
    }
    .badge-green  { background: #dcfce7; color: #166534; }
    .badge-blue   { background: #dbeafe; color: #1e40af; }
    .badge-yellow { background: #fef9c3; color: #854d0e; }
    .badge-orange { background: #ffedd5; color: #9a3412; }
    .badge-red    { background: #fee2e2; color: #991b1b; }
    .dark .badge-green  { background: #14532d; color: #86efac; }
    .dark .badge-blue   { background: #1e3a5f; color: #93c5fd; }
    .dark .badge-yellow { background: #422006; color: #fde68a; }
    .dark .badge-orange { background: #431407; color: #fed7aa; }
    .dark .badge-red    { background: #450a0a; color: #fca5a5; }
    .pn-grid-2 {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
    }
    @media (max-width: 768px) {
        .pn-grid-2 { grid-template-columns: 1fr; }
    }
    .pn-activity-card {
        border: 1px solid #bbf7d0;
        border-radius: 0.6rem;
        padding: 1rem;
        background: #f0fdf4;
    }
    .dark .pn-activity-card {
        background: #1a2e1a;
        border-color: #166534;
    }
    .pn-activity-title {
        font-weight: 700;
        font-size: 1rem;
        color: #15803d;
        margin-bottom: 0.5rem;
    }
    .dark .pn-activity-title { color: #4ade80; }
    .pn-kv {
        display: flex;
        flex-wrap: wrap;
        gap: 0.25rem 1rem;
        font-size: 0.82rem;
        margin-top: 0.35rem;
    }
    .pn-kv span.k { color: #6b7280; font-weight: 600; }
    .dark .pn-kv span.k { color: #9ca3af; }
    .pn-kv span.v { color: #1f2937; }
    .dark .pn-kv span.v { color: #e5e7eb; }
    .pn-highlight {
        color: #166534;
        font-weight: 700;
    }
    .dark .pn-highlight { color: #4ade80; }
    .pn-risk-item {
        display: flex;
        align-items: flex-start;
        gap: 0.6rem;
        padding: 0.6rem 0;
        border-bottom: 1px solid #e2e8f0;
        font-size: 0.875rem;
    }
    .dark .pn-risk-item { border-color: #2d4a2d; }
    .pn-risk-item:last-child { border-bottom: none; }
    .pn-note {
        background: #fefce8;
        border: 1px solid #fde68a;
        border-radius: 0.5rem;
        padding: 0.75rem 1rem;
        font-size: 0.82rem;
        color: #78350f;
        margin-top: 0.75rem;
    }
    .dark .pn-note {
        background: #292109;
        border-color: #854d0e;
        color: #fde68a;
    }
    .pn-info-box {
        background: #eff6ff;
        border: 1px solid #bfdbfe;
        border-radius: 0.5rem;
        padding: 0.75rem 1rem;
        font-size: 0.82rem;
        color: #1e40af;
        margin-top: 0.75rem;
    }
    .dark .pn-info-box {
        background: #1e2d4a;
        border-color: #1e40af;
        color: #93c5fd;
    }
    .pn-ul {
        list-style: disc;
        padding-left: 1.25rem;
        font-size: 0.875rem;
        line-height: 1.7;
    }
    .pn-ul li { margin-bottom: 0.2rem; }
</style>

<div class="space-y-2 text-gray-900 dark:text-gray-100">

    {{-- ======================== SECCIÓN 1: RESUMEN EJECUTIVO ======================== --}}
    <div class="pn-card">
        <div class="pn-section-title">📊 1. Resumen Ejecutivo</div>
        <div class="pn-grid-2" style="gap:1.25rem;">
            <div>
                <p class="text-sm leading-relaxed mb-3">
                    Plan de negocio para el desarrollo de una <strong>finca autosostenible</strong> en
                    Planeta Rica, Córdoba, Colombia, orientada a la producción agropecuaria diversificada
                    con énfasis en avicultura, piscicultura y cultivos tropicales.
                </p>
                <ul class="pn-ul">
                    <li><strong>Ubicación:</strong> Planeta Rica, Córdoba, Colombia</li>
                    <li><strong>Área total:</strong> 10,000 m² (1 hectárea)</li>
                    <li><strong>Capital inicial requerido:</strong> $20M – $50M COP</li>
                    <li><strong>Modelo:</strong> Finca autosostenible con ingresos diversificados</li>
                    <li><strong>Horizonte de planeación:</strong> 12 meses de implementación, rentabilidad sostenida desde el año 2</li>
                </ul>
            </div>
            <div>
                <div class="pn-activity-card">
                    <div class="pn-activity-title">🌡️ Condiciones Agroclimáticas</div>
                    <div class="pn-kv">
                        <span class="k">Clima:</span><span class="v">Tropical cálido</span>
                        <span class="k">Temperatura:</span><span class="v">~28 °C promedio</span>
                        <span class="k">Precipitación:</span><span class="v">1,800 – 2,200 mm/año</span>
                        <span class="k">Humedad relativa:</span><span class="v">75 – 85 %</span>
                        <span class="k">Aptitud:</span><span class="v">Excelente para cultivos tropicales</span>
                        <span class="k">Suelos:</span><span class="v">Arcillo-limosos, fértiles, valle del Sinú</span>
                    </div>
                    <div style="margin-top:0.75rem; display:flex; flex-wrap:wrap; gap:0.4rem;">
                        <span class="badge badge-green">✅ Ideal para plátano</span>
                        <span class="badge badge-orange">🐔 Avicultura rentable</span>
                        <span class="badge badge-blue">🐟 Piscicultura viable</span>
                        <span class="badge badge-yellow">🌿 Horticultura intensiva</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ======================== SECCIÓN 2: DISTRIBUCIÓN DEL TERRENO ======================== --}}
    <div class="pn-card">
        <div class="pn-section-title">🗺️ 2. Distribución del Terreno</div>
        <div style="overflow-x:auto;">
            <table class="pn-table">
                <thead>
                    <tr>
                        <th>Zona</th>
                        <th>Área (m²)</th>
                        <th>%</th>
                        <th>Uso principal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>🏠 Casa + patio frontal</td>
                        <td>1,200</td>
                        <td><span class="badge badge-blue">12%</span></td>
                        <td>Vivienda, herramientas, tanque de agua</td>
                    </tr>
                    <tr>
                        <td>🥬 Huertos hortícola</td>
                        <td>1,500</td>
                        <td><span class="badge badge-green">15%</span></td>
                        <td>Tomate, ají, cilantro, habichuela</td>
                    </tr>
                    <tr>
                        <td>🐔 Área aves</td>
                        <td>800</td>
                        <td><span class="badge badge-orange">8%</span></td>
                        <td>Gallinas ponedoras (500 und) + Pollos de ceba</td>
                    </tr>
                    <tr>
                        <td>🐟 Pozas piscícolas</td>
                        <td>600</td>
                        <td><span class="badge badge-blue">6%</span></td>
                        <td>Tilapia / Cachama (2–3 pozas)</td>
                    </tr>
                    <tr>
                        <td>🍌 Plátano y frutales</td>
                        <td>2,500</td>
                        <td><span class="badge badge-green">25%</span></td>
                        <td>Hartón, Dominico, papaya, guanábana</td>
                    </tr>
                    <tr>
                        <td>🌱 Yuca y ñame</td>
                        <td>1,500</td>
                        <td><span class="badge badge-yellow">15%</span></td>
                        <td>Yuca ICA, ñame espino</td>
                    </tr>
                    <tr>
                        <td>♻️ Fondo mixto / compost</td>
                        <td>1,900</td>
                        <td><span class="badge badge-orange">19%</span></td>
                        <td>Maíz, pasto de corte, compostaje integrado</td>
                    </tr>
                    <tr class="total-row">
                        <td><strong>Total</strong></td>
                        <td><strong>10,000</strong></td>
                        <td><strong>100%</strong></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    {{-- ======================== SECCIÓN 3: ACTIVIDADES PRODUCTIVAS ======================== --}}
    <div class="pn-card">
        <div class="pn-section-title">🌾 3. Actividades Productivas Rentables para Planeta Rica</div>

        {{-- Gallinas ponedoras --}}
        <div class="pn-activity-card" style="margin-bottom:1rem;">
            <div class="pn-activity-title">🐔 Gallinas Ponedoras (500 gallinas)</div>
            <p class="text-sm leading-relaxed mb-2">
                La avicultura posedora es el <strong>pilar de caja</strong> del proyecto. Con 500 gallinas en producción
                se genera un flujo diario estable y predecible, aprovechando la alta demanda de la plaza de mercado
                de Planeta Rica y los municipios cercanos (Montería, Sahagún).
            </p>
            <div class="pn-kv">
                <span class="k">Inversión inicial:</span><span class="v">$8M – $12M COP (galpón 300 m², equipo, 500 pollitas)</span>
                <span class="k">Producción:</span><span class="v">~450 huevos/día = 13,500/mes</span>
                <span class="k">Precio huevo:</span><span class="v">$720 en plaza</span>
                <span class="k">Ingreso bruto:</span><span class="v">~$9.7M COP/mes</span>
                <span class="k">Costos operativos:</span><span class="v">Concentrado ~$4.5M + varios ~$1M = $5.5M/mes</span>
                <span class="k">Ciclo producción:</span><span class="v">Continuo, renovación cada 18 meses</span>
            </div>
            <div style="margin-top:0.6rem; display:flex; gap:0.5rem; flex-wrap:wrap; align-items:center;">
                <span class="badge badge-green">💰 Utilidad neta: ~$4.2M/mes</span>
                <span class="badge badge-orange">ROI: 4–6 meses</span>
            </div>
            <div class="pn-note">
                ✅ <strong>Ventaja competitiva:</strong> La plaza de Planeta Rica tiene demanda constante de huevo fresco.
                El transporte de huevo desde otras zonas encarece el producto, favoreciendo la producción local.
            </div>
        </div>

        {{-- Pollos de engorde --}}
        <div class="pn-activity-card" style="margin-bottom:1rem;">
            <div class="pn-activity-title">🍗 Pollos de Engorde (lotes de 500)</div>
            <p class="text-sm leading-relaxed mb-2">
                Ciclo corto y alta rotación. Complementa las gallinas usando la misma infraestructura en turnos,
                con picos de demanda aprovechables en Semana Santa, Navidad y festividades locales.
            </p>
            <div class="pn-kv">
                <span class="k">Inversión inicial:</span><span class="v">$3M – $5M COP (galpón 200 m², equipo)</span>
                <span class="k">Costo por lote:</span><span class="v">~$2.5M (pollitos + alimento 45 días)</span>
                <span class="k">Venta lote 500:</span><span class="v">~$4.5M (a $9,000/pollo vivo)</span>
                <span class="k">Ciclo:</span><span class="v">45 días por lote — posible manejar 2–3 lotes simultáneos</span>
            </div>
            <div style="margin-top:0.6rem; display:flex; gap:0.5rem; flex-wrap:wrap; align-items:center;">
                <span class="badge badge-green">💰 Utilidad: ~$2M/lote · ~$1.3M/mes promedio</span>
                <span class="badge badge-orange">Ciclo: 45 días</span>
            </div>
            <div class="pn-note">
                ✅ <strong>Ventaja competitiva:</strong> Rotación muy rápida de capital. Alta demanda estacional aprovechable.
                Subproductos (gallinaza) se usan como abono orgánico reduciendo costos en otros cultivos.
            </div>
        </div>

        {{-- Piscicultura --}}
        <div class="pn-activity-card" style="margin-bottom:1rem;">
            <div class="pn-activity-title">🐟 Piscicultura — Tilapia / Cachama</div>
            <p class="text-sm leading-relaxed mb-2">
                Las pozas aprovechan el agua del pozo y las aguas lluvias. La tilapia roja y la cachama negra
                son las especies más rentables en la región Caribe colombiana por su rápido crecimiento
                y excelente aceptación en comedores y restaurantes locales.
            </p>
            <div class="pn-kv">
                <span class="k">Inversión inicial:</span><span class="v">$4M – $7M COP (2–3 pozas excavadas o en lona + aireación)</span>
                <span class="k">Capacidad:</span><span class="v">2 pozas de 300 m² → ~2,000 peces</span>
                <span class="k">Producción cosecha:</span><span class="v">~700 kg a los 8 meses</span>
                <span class="k">Precio:</span><span class="v">$7,000 – $8,000/kg pie de cría</span>
                <span class="k">Ciclo:</span><span class="v">8 meses por cosecha</span>
            </div>
            <div style="margin-top:0.6rem; display:flex; gap:0.5rem; flex-wrap:wrap; align-items:center;">
                <span class="badge badge-green">💰 Utilidad neta: ~$1.4M/cosecha · ~$175K/mes promedio</span>
                <span class="badge badge-blue">Ciclo: 8 meses</span>
            </div>
            <div class="pn-note">
                ✅ <strong>Ventaja competitiva:</strong> Poca oferta local de pescado de cultivo en Planeta Rica.
                Alta demanda en comedores, restaurantes y familias. El agua residual de las pozas sirve de abono
                líquido natural (acuaponía básica) para los cultivos.
            </div>
        </div>

        {{-- Plátano Hartón --}}
        <div class="pn-activity-card" style="margin-bottom:1rem;">
            <div class="pn-activity-title">🍌 Plátano Hartón</div>
            <p class="text-sm leading-relaxed mb-2">
                El plátano hartón es el cultivo más adaptado a las condiciones de Planeta Rica.
                Bajo mantenimiento, producción continua desde el mes 10 y muy arraigado en la
                dieta y comercio regional. Todos los subproductos se aprovechan en la finca.
            </p>
            <div class="pn-kv">
                <span class="k">Inversión inicial:</span><span class="v">$2.5M – $4M COP (colinos, abono, herramientas)</span>
                <span class="k">Capacidad:</span><span class="v">2,500 m² → ~500 plantas → ~350 racimos/año</span>
                <span class="k">Producción mensual:</span><span class="v">~29 racimos/mes (continuo desde mes 10)</span>
                <span class="k">Precio local:</span><span class="v">$8,000 – $12,000/racimo</span>
                <span class="k">Primer corte:</span><span class="v">Meses 10–12 de siembra</span>
            </div>
            <div style="margin-top:0.6rem; display:flex; gap:0.5rem; flex-wrap:wrap; align-items:center;">
                <span class="badge badge-green">💰 Ingreso: $290K – $350K/mes</span>
                <span class="badge badge-yellow">Escala año 2–3</span>
            </div>
            <div class="pn-note">
                ✅ <strong>Ventaja competitiva:</strong> Muy adaptado a la región, bajo mantenimiento.
                Subproductos (hojas, vástago, seudotallo) alimentan a los cerdos y conejos. La gallinaza
                del galpón fertliza directamente las matas sin costo.
            </div>
        </div>

        {{-- Yuca --}}
        <div class="pn-activity-card" style="margin-bottom:1rem;">
            <div class="pn-activity-title">🌿 Yuca (Manihot esculenta)</div>
            <p class="text-sm leading-relaxed mb-2">
                Cultivo básico de la región Caribe. Muy resistente a la sequía, bajo costo de producción
                y doble función: venta para consumo humano y alimentación de animales con la yuca biche
                y los residuos.
            </p>
            <div class="pn-kv">
                <span class="k">Inversión inicial:</span><span class="v">$800K – $1.2M COP</span>
                <span class="k">Área:</span><span class="v">1,500 m² → ~600 kg/cosecha (ciclo 12 meses)</span>
                <span class="k">Valor agregado:</span><span class="v">Yuca seca / fariña → +50% valor comercial</span>
                <span class="k">Ciclo:</span><span class="v">10–14 meses</span>
            </div>
            <div style="margin-top:0.6rem; display:flex; gap:0.5rem; flex-wrap:wrap; align-items:center;">
                <span class="badge badge-green">💰 Ingreso bruto: $300K – $450K/cosecha · ~$100K/mes</span>
                <span class="badge badge-yellow">Utilidad: ~$70K/mes</span>
            </div>
            <div class="pn-note">
                ✅ <strong>Ventaja:</strong> Resistente a sequía, alimenta animales con los desechos. Con procesamiento
                básico (fariña, almidón) el valor se incrementa 50–80%. Las hojas son proteína para conejos y cerdos.
            </div>
        </div>

        {{-- Hortalizas --}}
        <div class="pn-activity-card">
            <div class="pn-activity-title">🥗 Hortalizas Intensivas (tomate, ají, cilantro, habichuela)</div>
            <p class="text-sm leading-relaxed mb-2">
                El huerto intensivo bajo riego por goteo permite hasta 4 rotaciones anuales.
                Producto de alto precio en plaza y demanda estable de restaurantes y hogares en Planeta Rica.
                Excelente para flujo de caja mensual.
            </p>
            <div class="pn-kv">
                <span class="k">Inversión inicial:</span><span class="v">$1.5M – $2.5M COP (riego goteo, semillas, abono)</span>
                <span class="k">Rotación:</span><span class="v">Cada 3 meses — 4 cosechas/año</span>
                <span class="k">Ingreso por cosecha:</span><span class="v">$800K – $1.2M</span>
                <span class="k">Canal de venta:</span><span class="v">Venta directa en plaza, puerta a puerta</span>
            </div>
            <div style="margin-top:0.6rem; display:flex; gap:0.5rem; flex-wrap:wrap; align-items:center;">
                <span class="badge badge-green">💰 Ingreso: ~$300K – $400K/mes promedio</span>
                <span class="badge badge-yellow">Utilidad: ~$200K/mes</span>
            </div>
            <div class="pn-note">
                ✅ <strong>Ventaja:</strong> Alta rotación de capital, precio premium en temporada de escasez.
                Venta directa elimina intermediarios. El compost de la finca reduce costos de fertilización.
            </div>
        </div>
    </div>

    {{-- ======================== SECCIÓN 4: PROYECCIÓN FINANCIERA ======================== --}}
    <div class="pn-card">
        <div class="pn-section-title">💰 4. Proyección Financiera — Año 1</div>
        <div style="overflow-x:auto;">
            <table class="pn-table">
                <thead>
                    <tr>
                        <th>Actividad</th>
                        <th>Inversión inicial</th>
                        <th>Ingreso mensual est.</th>
                        <th>Costo mensual</th>
                        <th>Utilidad mensual</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>🐔 Gallinas 500 uds</td>
                        <td>$10M COP</td>
                        <td>$9.7M</td>
                        <td>$5.5M</td>
                        <td><span class="pn-highlight">$4.2M</span></td>
                    </tr>
                    <tr>
                        <td>🍗 Pollos de ceba</td>
                        <td>$4M COP</td>
                        <td>$4.5M c/45 días</td>
                        <td>$2.5M</td>
                        <td><span class="pn-highlight">$1.3M</span></td>
                    </tr>
                    <tr>
                        <td>🐟 Piscicultura</td>
                        <td>$5.5M COP</td>
                        <td>$260K prom.</td>
                        <td>$85K</td>
                        <td><span class="pn-highlight">$175K</span></td>
                    </tr>
                    <tr>
                        <td>🍌 Plátano</td>
                        <td>$3.5M COP</td>
                        <td>$320K</td>
                        <td>$80K</td>
                        <td><span class="pn-highlight">$240K</span></td>
                    </tr>
                    <tr>
                        <td>🌿 Yuca / tubérculos</td>
                        <td>$1M COP</td>
                        <td>$100K</td>
                        <td>$30K</td>
                        <td><span class="pn-highlight">$70K</span></td>
                    </tr>
                    <tr>
                        <td>🥗 Hortalizas</td>
                        <td>$2M COP</td>
                        <td>$350K</td>
                        <td>$150K</td>
                        <td><span class="pn-highlight">$200K</span></td>
                    </tr>
                    <tr class="total-row">
                        <td><strong>TOTAL</strong></td>
                        <td><strong>~$26M COP</strong></td>
                        <td><strong>~$15.2M</strong></td>
                        <td><strong>~$8.3M</strong></td>
                        <td><strong>~$6.2M/mes</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="pn-note" style="margin-top:0.75rem;">
            📌 <strong>Notas:</strong> Cifras orientativas para el año 1. Plátano y peces escalan significativamente
            en los años 2–3. <strong>Las gallinas ponedoras son el pilar de caja</strong> desde el mes 4.
            La diversificación protege ante caídas de precio en cualquier producto individual.
        </div>
        <div class="pn-info-box">
            📈 <strong>Retorno de inversión estimado:</strong>
            4–6 meses en el sector de aves ponedoras · 12–18 meses recuperación global de la inversión inicial.
        </div>
    </div>

    {{-- ======================== SECCIÓN 5: INFRAESTRUCTURA DE AGUA ======================== --}}
    <div class="pn-card">
        <div class="pn-section-title">💧 5. Infraestructura de Agua — Pozo Profundo</div>
        <div class="pn-grid-2">
            <div>
                <ul class="pn-ul">
                    <li><strong>Tipo:</strong> Pozo profundo (30–50 m) con bomba sumergible</li>
                    <li><strong>Inversión:</strong> $3M – $5M COP (perforación + equipo + instalación)</li>
                    <li><strong>Bomba recomendada:</strong> 1/2 – 1 HP, marca nacional certificada</li>
                    <li><strong>Almacenamiento:</strong> Tanque elevado de 5,000 – 10,000 litros</li>
                    <li><strong>Distribución:</strong> Red de mangueras PVC hasta cada zona productiva</li>
                    <li><strong>Uso estimado/día:</strong> 2,000 – 4,000 litros</li>
                </ul>
                <div class="pn-kv" style="margin-top:0.5rem;">
                    <span class="k">Animales:</span><span class="v">60% del consumo total</span>
                    <span class="k">Riego cultivos:</span><span class="v">30% del consumo</span>
                    <span class="k">Consumo humano:</span><span class="v">10% del consumo</span>
                </div>
            </div>
            <div>
                <div class="pn-activity-card">
                    <div class="pn-activity-title">🔧 Mantenimiento y Aspectos Legales</div>
                    <ul class="pn-ul" style="margin-top:0.4rem;">
                        <li>Limpieza anual del pozo (purga)</li>
                        <li>Filtro de sedimentos: cambio cada 6 meses</li>
                        <li>Revisión bomba y válvulas: anual</li>
                        <li>Costo mantenimiento estimado: <strong>~$200K/año</strong></li>
                    </ul>
                    <div class="pn-note" style="margin-top:0.6rem;">
                        ⚠️ <strong>Nota legal:</strong> Registrar la concesión de agua ante la
                        <strong>CAR-Córdoba (CVS)</strong>. El trámite es gratuito para uso
                        doméstico/familiar/agropecuario de subsistencia. Evita sanciones ambientales.
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ======================== SECCIÓN 6: INFRAESTRUCTURA ENERGÉTICA ======================== --}}
    <div class="pn-card">
        <div class="pn-section-title">☀️ 6. Infraestructura Energética</div>
        <div class="pn-grid-2">
            <div>
                <div class="pn-activity-card" style="margin-bottom:0.75rem;">
                    <div class="pn-activity-title" style="color:#92400e;">☀️ Opción 1: Panel Solar (Recomendado)</div>
                    <div class="pn-kv">
                        <span class="k">Sistema:</span><span class="v">2 kW pico — 6 paneles 380W + inversor + baterías</span>
                        <span class="k">Inversión:</span><span class="v">$8M – $12M COP (instalado)</span>
                        <span class="k">Generación:</span><span class="v">8–10 kWh/día</span>
                        <span class="k">Usos:</span><span class="v">Iluminación, bombas pequeñas, herramientas</span>
                        <span class="k">Ahorro mensual:</span><span class="v">$150K – $250K (elimina factura eléctrica)</span>
                        <span class="k">Amortización:</span><span class="v">5–7 años</span>
                    </div>
                    <div class="pn-info-box" style="margin-top:0.5rem;">
                        💡 Para bombeo de agua: añadir panel dedicado 500W + bomba DC = <strong>$1.5M adicional</strong>.
                        Bombea agua directamente del pozo usando energía solar sin costo operativo.
                    </div>
                </div>
            </div>
            <div>
                <div class="pn-activity-card">
                    <div class="pn-activity-title" style="color:#1e40af;">⚡ Opción 2: Conexión Red Eléctrica (EPM / ENERTOLIMA)</div>
                    <div class="pn-kv">
                        <span class="k">Costo acometida rural:</span><span class="v">$2M – $4M COP</span>
                        <span class="k">Tarifa mensual:</span><span class="v">$200K – $350K/mes</span>
                        <span class="k">Disponibilidad:</span><span class="v">Sujeta a cobertura en el predio</span>
                    </div>
                    <div class="pn-note" style="margin-top:0.6rem;">
                        💡 <strong>Estrategia recomendada:</strong> Combinar las dos opciones —
                        <strong>solar como fuente principal</strong> y la red eléctrica como respaldo.
                        Reduce costos operativos mensuales a casi cero en energía.
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ======================== SECCIÓN 7: CRONOGRAMA DE IMPLEMENTACIÓN ======================== --}}
    <div class="pn-card">
        <div class="pn-section-title">📅 7. Plan de Implementación — Cronograma 12 Meses</div>
        <div style="overflow-x:auto;">
            <table class="pn-table">
                <thead>
                    <tr>
                        <th>Fase</th>
                        <th>Período</th>
                        <th>Actividades clave</th>
                        <th>Inversión est.</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><span class="badge badge-orange">Fase 1</span></td>
                        <td><strong>Meses 1–3</strong></td>
                        <td>
                            Perforación pozo profundo · Cerramiento perimetral ·
                            Construcción casa básica · Galpón gallinas ponedoras (300 m²) ·
                            Instalación tanque elevado y red de distribución
                        </td>
                        <td><strong>$15M COP</strong></td>
                    </tr>
                    <tr>
                        <td><span class="badge badge-yellow">Fase 2</span></td>
                        <td><strong>Meses 3–6</strong></td>
                        <td>
                            Compra e instalación 500 gallinas ponedoras ·
                            Sistema de energía solar (2 kW) ·
                            Implementación huerto hortícola con riego goteo ·
                            Inicio venta de huevos (mes 4–5)
                        </td>
                        <td><strong>$8M COP</strong></td>
                    </tr>
                    <tr>
                        <td><span class="badge badge-blue">Fase 3</span></td>
                        <td><strong>Meses 6–9</strong></td>
                        <td>
                            Excavación y llenado pozas piscícolas (2–3 pozas) ·
                            Siembra alevinos tilapia / cachama ·
                            Inicio primeros lotes pollos de engorde ·
                            Aireadores y sistema de alimentación peces
                        </td>
                        <td><strong>$7M COP</strong></td>
                    </tr>
                    <tr>
                        <td><span class="badge badge-green">Fase 4</span></td>
                        <td><strong>Meses 9–12</strong></td>
                        <td>
                            Siembra plátano hartón (500 colinos) ·
                            Siembra yuca ICA y ñame espino ·
                            Instalación sistema de compostaje ·
                            Optimización y ajuste de todos los sistemas productivos
                        </td>
                        <td><strong>$3M COP</strong></td>
                    </tr>
                    <tr class="total-row">
                        <td colspan="3"><strong>Inversión total primer año</strong></td>
                        <td><strong>~$33M COP</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="pn-info-box">
            📌 <strong>Nota:</strong> Las gallinas (Fase 2) comienzan a generar ingresos desde el mes 4–5,
            financiando parcialmente las fases 3 y 4. Se recomienda arrancar con capital propio en Fase 1 y
            evaluar crédito agropecuario (Finagro / Banco Agrario) para acelerar Fases 3 y 4.
        </div>
    </div>

    {{-- ======================== SECCIÓN 8: RIESGOS Y MITIGACIÓN ======================== --}}
    <div class="pn-card">
        <div class="pn-section-title">⚠️ 8. Gestión de Riesgos y Plan de Mitigación</div>
        <div class="pn-grid-2">
            <div>
                <div class="pn-risk-item">
                    <span style="font-size:1.2rem;">🦠</span>
                    <div>
                        <strong>Enfermedades en aves</strong>
                        <br>
                        <span style="color:#6b7280; font-size:0.8rem;">
                            Vacunación preventiva (Newcastle, Gumboro, Bronquitis) · Plan veterinario mensual ·
                            Bioseguridad estricta en acceso al galpón · Cuarentena de aves nuevas 2 semanas
                        </span>
                    </div>
                </div>
                <div class="pn-risk-item">
                    <span style="font-size:1.2rem;">📉</span>
                    <div>
                        <strong>Caída de precios de mercado</strong>
                        <br>
                        <span style="color:#6b7280; font-size:0.8rem;">
                            Diversificación de productos (no depender de un solo producto) ·
                            Canales de venta directa (eliminar intermediarios) · Valor agregado
                            (huevos lavados, embalados) · Contratos con restaurantes locales
                        </span>
                    </div>
                </div>
                <div class="pn-risk-item">
                    <span style="font-size:1.2rem;">🔴</span>
                    <div>
                        <strong>Mortalidad alta en peces</strong>
                        <br>
                        <span style="color:#6b7280; font-size:0.8rem;">
                            Aireación adecuada · Control de densidad de siembra · Análisis de agua mensual ·
                            No sobrepoblar pozas · Alimentación con concentrado certificado
                        </span>
                    </div>
                </div>
            </div>
            <div>
                <div class="pn-risk-item">
                    <span style="font-size:1.2rem;">🌵</span>
                    <div>
                        <strong>Sequía / escasez de agua</strong>
                        <br>
                        <span style="color:#6b7280; font-size:0.8rem;">
                            Pozo profundo garantiza suministro en verano ·
                            Tanques de almacenamiento 5,000–10,000 L ·
                            Riego por goteo reduce consumo un 40% ·
                            Cultivos seleccionados por resistencia a sequía (yuca, plátano)
                        </span>
                    </div>
                </div>
                <div class="pn-risk-item">
                    <span style="font-size:1.2rem;">🔒</span>
                    <div>
                        <strong>Robo y seguridad</strong>
                        <br>
                        <span style="color:#6b7280; font-size:0.8rem;">
                            Cerramiento perimetral en malla y alambre de púas ·
                            Cámaras de seguridad con energía solar ·
                            Buenas relaciones con comunidad vecina ·
                            Perro guardián en la finca
                        </span>
                    </div>
                </div>
                <div class="pn-risk-item">
                    <span style="font-size:1.2rem;">⚡</span>
                    <div>
                        <strong>Fallo eléctrico</strong>
                        <br>
                        <span style="color:#6b7280; font-size:0.8rem;">
                            Sistema solar + red eléctrica como respaldo ·
                            Bomba de agua manual para emergencias ·
                            UPS para equipos críticos del galpón (ventilación)
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="pn-note" style="margin-top:1rem;">
            💡 <strong>Consejo final:</strong> El mayor riesgo en una finca nueva es la sobre-extensión.
            Es mejor hacer pocas actividades muy bien que muchas actividades mal. Se recomienda
            <strong>iniciar con gallinas como base</strong> y añadir actividades progresivamente
            conforme se estabiliza la operación y el flujo de caja lo permite.
        </div>
    </div>

</div>

</x-filament-panels::page>
