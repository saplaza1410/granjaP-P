@extends('layouts.public')
@section('title', 'Tienda')

@section('content')

{{-- ============================
     HEADER DE LA TIENDA
     ============================ --}}
<div style="background:linear-gradient(135deg, #1a4731 0%, #2d6a4f 100%); padding:3rem 1.5rem 2.5rem;">
    <div style="max-width:1200px; margin:0 auto;">
        {{-- Breadcrumb --}}
        <nav style="font-size:0.82rem; color:#95d5b2; margin-bottom:1rem;">
            <a href="/" style="color:#95d5b2; text-decoration:none;">Inicio</a>
            <span style="margin:0 0.4rem; color:#52b788;">/</span>
            <span style="color:#fff;">Tienda</span>
        </nav>
        <h1 class="font-display" style="color:#fff; font-size:2.4rem; margin-bottom:0.75rem; line-height:1.2;">
            Nuestra Tienda
        </h1>
        <p style="color:#95d5b2; font-size:1.05rem; max-width:500px; line-height:1.6;">
            Productos frescos de la granja, cosechados con amor en Planeta Rica
        </p>
        @if($products->count() > 0)
        <div style="margin-top:1.25rem;">
            <span style="background:rgba(255,255,255,0.15); color:#fff; padding:0.35rem 1rem; border-radius:99px; font-size:0.85rem; font-weight:600;">
                {{ $products->count() }} {{ $products->count() == 1 ? 'categoría disponible' : 'categorías disponibles' }}
            </span>
        </div>
        @endif
    </div>
</div>

<div style="max-width:1200px; margin:0 auto; padding:2rem 1.5rem;">

    {{-- ============================
         FILTROS DE CATEGORÍA
         ============================ --}}
    @php
        $categoryMeta = [
            'huevos'      => ['emoji' => '🥚', 'label' => 'Huevos',      'bg' => '#fef3c7', 'color' => '#92400e'],
            'aves'        => ['emoji' => '🐔', 'label' => 'Aves',        'bg' => '#ffedd5', 'color' => '#9a3412'],
            'peces'       => ['emoji' => '🐟', 'label' => 'Peces',       'bg' => '#dbeafe', 'color' => '#1e40af'],
            'hortalizas'  => ['emoji' => '🥬', 'label' => 'Hortalizas',  'bg' => '#dcfce7', 'color' => '#166534'],
            'platano'     => ['emoji' => '🍌', 'label' => 'Plátano',     'bg' => '#fef9c3', 'color' => '#713f12'],
            'tuberculos'  => ['emoji' => '🌿', 'label' => 'Tubérculos',  'bg' => '#f3f4f6', 'color' => '#374151'],
            'otros'       => ['emoji' => '📦', 'label' => 'Otros',       'bg' => '#f3e8ff', 'color' => '#6b21a8'],
        ];
    @endphp

    @if($products->count() > 0)
    <div style="overflow-x:auto; margin-bottom:2.5rem;">
        <div style="display:flex; gap:0.6rem; padding-bottom:0.5rem; min-width:max-content;">
            <button onclick="filterCategory('all')" id="filter-all"
                style="padding:0.45rem 1.1rem; border-radius:99px; font-size:0.85rem; font-weight:700; border:2px solid #2d6a4f; background:#2d6a4f; color:#fff; cursor:pointer; transition:all 0.2s; white-space:nowrap;">
                Todos
            </button>
            @foreach($products->keys() as $cat)
            @php
                $slug = strtolower($cat);
                $meta = $categoryMeta[$slug] ?? ['emoji' => '📦', 'label' => ucfirst($cat), 'bg' => '#f3f4f6', 'color' => '#374151'];
            @endphp
            <button onclick="filterCategory('{{ $slug }}')" id="filter-{{ $slug }}"
                style="padding:0.45rem 1.1rem; border-radius:99px; font-size:0.85rem; font-weight:700; border:2px solid {{ $meta['color'] }}; background:{{ $meta['bg'] }}; color:{{ $meta['color'] }}; cursor:pointer; transition:all 0.2s; white-space:nowrap;">
                {{ $meta['emoji'] }} {{ $meta['label'] }}
            </button>
            @endforeach
        </div>
    </div>
    @endif

    {{-- ============================
         PRODUCTOS POR CATEGORÍA
         ============================ --}}
    @forelse($products as $category => $items)
    @php
        $slug = strtolower($category);
        $meta = $categoryMeta[$slug] ?? ['emoji' => '📦', 'label' => ucfirst($category), 'bg' => '#f3f4f6', 'color' => '#374151'];
    @endphp

    <section id="cat-{{ $slug }}" class="category-section fade-in" style="margin-bottom:3rem;">
        {{-- Título de categoría --}}
        <div style="display:flex; align-items:center; gap:0.75rem; margin-bottom:1.5rem; padding-bottom:0.75rem; border-bottom:2px solid #e8f5e9;">
            <span style="font-size:2rem;">{{ $meta['emoji'] }}</span>
            <h2 class="font-display" style="font-size:1.5rem; color:#1a4731;">{{ $meta['label'] }}</h2>
            <span style="background:{{ $meta['bg'] }}; color:{{ $meta['color'] }}; padding:2px 10px; border-radius:99px; font-size:0.78rem; font-weight:700;">
                {{ $items->count() }} {{ $items->count() == 1 ? 'producto' : 'productos' }}
            </span>
        </div>

        {{-- Grid de productos --}}
        <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(260px, 1fr)); gap:1.25rem;">
            @foreach($items as $product)
            <div class="product-card" style="background:#fff; border-radius:12px; padding:1.5rem; box-shadow:0 2px 12px rgba(0,0,0,0.07); border:1px solid #e8f5e9;">

                {{-- Emoji del producto --}}
                <div style="font-size:3.5rem; text-align:center; margin-bottom:1rem; line-height:1;">
                    {{ $product->emoji ?? $meta['emoji'] }}
                </div>

                {{-- Nombre --}}
                <h3 class="font-display" style="font-size:1.1rem; color:#1a4731; margin-bottom:0.5rem; line-height:1.3;">
                    {{ $product->name }}
                </h3>

                {{-- Descripción (2 líneas) --}}
                <p style="font-size:0.85rem; color:#666; margin-bottom:1rem; line-height:1.5; overflow:hidden; display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical;">
                    {{ $product->description }}
                </p>

                {{-- Precio --}}
                <div style="font-size:1.3rem; font-weight:800; color:#2d6a4f; margin-bottom:0.25rem;">
                    ${{ number_format($product->price, 0, ',', '.') }} COP
                </div>
                <div style="font-size:0.8rem; color:#999; margin-bottom:1rem;">
                    por {{ $product->unit }}
                </div>

                {{-- Pedido mínimo --}}
                @if(isset($product->min_order) && $product->min_order > 1)
                <div style="font-size:0.78rem; background:#fff9c4; color:#856404; padding:3px 8px; border-radius:6px; margin-bottom:0.75rem; display:inline-block;">
                    Mínimo {{ $product->min_order }} {{ $product->unit }}{{ $product->min_order > 1 ? 's' : '' }}
                </div>
                @endif

                {{-- Formulario agregar al carrito --}}
                <form action="/tienda/carrito/{{ $product->id }}" method="POST" style="display:flex; gap:0.5rem; align-items:center;">
                    @csrf
                    <input type="number"
                           name="quantity"
                           value="{{ $product->min_order ?? 1 }}"
                           min="{{ $product->min_order ?? 1 }}"
                           max="999"
                           style="width:65px; text-align:center; border:1px solid #ccc; border-radius:6px; padding:6px; font-size:0.9rem; background:#fafafa;">
                    <button type="submit" class="btn-green" style="flex:1; text-align:center; padding:0.5rem; font-size:0.9rem;">
                        🛒 Agregar
                    </button>
                </form>

            </div>
            @endforeach
        </div>
    </section>

    @empty

    {{-- ============================
         ESTADO VACÍO
         ============================ --}}
    <div style="text-align:center; padding:4rem 1rem;">
        <div style="font-size:5rem; margin-bottom:1.5rem;">🌱</div>
        <h2 class="font-display" style="color:#1a4731; font-size:1.6rem; margin-bottom:1rem;">
            ¡Pronto tendremos productos disponibles!
        </h2>
        <p style="color:#666; font-size:1rem; margin-bottom:2rem; max-width:400px; margin-left:auto; margin-right:auto; line-height:1.6;">
            Estamos preparando nuestro catálogo. Mientras tanto, escríbenos por WhatsApp y te atendemos personalmente.
        </p>
        <a href="https://wa.me/57XXXXXXXXXX?text=Hola%2C%20quiero%20saber%20qué%20productos%20tienen%20disponibles"
           class="btn-green"
           style="font-size:1rem; padding:0.75rem 2rem;">
            💬 Escribir por WhatsApp
        </a>
    </div>

    @endforelse

</div>

@endsection

@push('scripts')
<script>
    function filterCategory(cat) {
        const sections = document.querySelectorAll('.category-section');
        const buttons  = document.querySelectorAll('[id^="filter-"]');

        // Resetear estilos de botones
        buttons.forEach(btn => {
            btn.style.background = btn.dataset.bg   || '';
            btn.style.color      = btn.dataset.color || '';
            btn.style.borderColor = btn.dataset.color || '';
        });

        if (cat === 'all') {
            sections.forEach(s => s.style.display = 'block');
            const allBtn = document.getElementById('filter-all');
            if (allBtn) {
                allBtn.style.background   = '#2d6a4f';
                allBtn.style.color        = '#fff';
                allBtn.style.borderColor  = '#2d6a4f';
            }
        } else {
            sections.forEach(s => {
                s.style.display = s.id === 'cat-' + cat ? 'block' : 'none';
            });
            const activeBtn = document.getElementById('filter-' + cat);
            if (activeBtn) {
                activeBtn.style.background  = '#2d6a4f';
                activeBtn.style.color       = '#fff';
                activeBtn.style.borderColor = '#2d6a4f';
            }
        }
        // Scroll suave a la primera sección visible
        const visible = document.querySelector('.category-section[style*="block"]');
        if (visible) visible.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
</script>
@endpush
