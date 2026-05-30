<x-filament-panels::page>
    <div class="space-y-4 text-gray-900 dark:text-gray-100">
        <p class="text-sm leading-relaxed opacity-90">
            Plano interactivo integrado en el panel (mismo modelo que el archivo estático
            <code class="rounded bg-black/10 px-1 py-0.5 text-xs dark:bg-white/10">public/plano-granja.html</code>
            por si necesitás abrirlo fuera del admin). Las <strong>zonas</strong> configuradas aquí pueden usarse al
            registrar movimientos contables.
        </p>

        @if ($zones->isNotEmpty())
            <div class="flex flex-wrap gap-2 rounded-lg border border-gray-200 p-3 text-xs dark:border-white/10">
                @foreach ($zones as $z)
                    <span class="rounded-md bg-black/5 px-2 py-1 dark:bg-white/10">{{ $z->name }}</span>
                @endforeach
            </div>
        @endif

        @include('filament.pages.partials.plano-granja-embedded')
    </div>
</x-filament-panels::page>
