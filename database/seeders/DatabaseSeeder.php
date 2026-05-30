<?php

namespace Database\Seeders;

use App\Enums\FarmLedgerType;
use App\Enums\InventoryMovementKind;
use App\Enums\UserRole;
use App\Models\FarmActivity;
use App\Models\FarmCategory;
use App\Models\FarmInventoryItem;
use App\Models\FarmInventoryMovement;
use App\Models\FarmTransaction;
use App\Models\FarmZone;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->updateOrInsert(
            ['email' => 'admin@granja.local'],
            [
                'name' => 'Administrador',
                'role' => UserRole::Admin,
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'updated_at' => now(),
                'created_at' => now(),
            ]
        );

        $admin = User::where('email', 'admin@granja.local')->first();

        foreach ([
            ['email' => 'operador@granja.local', 'name' => 'Operador demo', 'role' => UserRole::Operator],
            ['email' => 'vista@granja.local', 'name' => 'Consulta demo', 'role' => UserRole::Viewer],
        ] as $demo) {
            User::query()->updateOrInsert(
                ['email' => $demo['email']],
                [
                    'name' => $demo['name'],
                    'role' => $demo['role'],
                    'password' => Hash::make('password'),
                    'email_verified_at' => now(),
                    'remember_token' => Str::random(10),
                    'updated_at' => now(),
                    'created_at' => now(),
                ]
            );
        }

        $acts = [];
        foreach ([
            ['name' => 'General / Administración', 'slug' => 'general', 'sort_order' => 0],
            ['name' => 'Huerto hortícola', 'slug' => 'huerto', 'sort_order' => 10],
            ['name' => 'Gallinas (huevos)', 'slug' => 'gallinas', 'sort_order' => 20],
            ['name' => 'Pollos (ceba)', 'slug' => 'pollos', 'sort_order' => 30],
            ['name' => 'Piscicultura', 'slug' => 'pesca', 'sort_order' => 40],
            ['name' => 'Plátano y frutales', 'slug' => 'platano', 'sort_order' => 50],
            ['name' => 'Yuca, ñame y tubérculos', 'slug' => 'tuberculos', 'sort_order' => 60],
        ] as $row) {
            $acts[$row['slug']] = FarmActivity::query()->updateOrCreate(
                ['slug' => $row['slug']],
                [
                    'name' => $row['name'],
                    'sort_order' => $row['sort_order'],
                    'is_active' => true,
                ]
            );
        }

        foreach ([
            ['name' => 'Venta de huevos', 'type' => FarmLedgerType::Income, 'activity' => 'gallinas'],
            ['name' => 'Venta de pollos vivos/en pie', 'type' => FarmLedgerType::Income, 'activity' => 'pollos'],
            ['name' => 'Venta de pescado', 'type' => FarmLedgerType::Income, 'activity' => 'pesca'],
            ['name' => 'Venta hortalizas', 'type' => FarmLedgerType::Income, 'activity' => 'huerto'],
            ['name' => 'Venta plátano / fruto', 'type' => FarmLedgerType::Income, 'activity' => 'platano'],
            ['name' => 'Venta yuca ñame u otros tubérculos', 'type' => FarmLedgerType::Income, 'activity' => 'tuberculos'],
            ['name' => 'Otros ingresos', 'type' => FarmLedgerType::Income, 'activity' => 'general'],
        ] as $c) {
            FarmCategory::query()->updateOrCreate(
                ['name' => $c['name']],
                [
                    'type' => $c['type'],
                    'farm_activity_id' => $acts[$c['activity']]->id,
                    'is_active' => true,
                ]
            );
        }

        foreach ([
            ['name' => 'Concentrado y alimento', 'type' => FarmLedgerType::Expense, 'activity' => 'general'],
            ['name' => 'Veterinaria y farmacia', 'type' => FarmLedgerType::Expense, 'activity' => 'general'],
            ['name' => 'Insumos agrícolas y siembra', 'type' => FarmLedgerType::Expense, 'activity' => 'huerto'],
            ['name' => 'Combustible y transporte', 'type' => FarmLedgerType::Expense, 'activity' => 'general'],
            ['name' => 'Mano de obra', 'type' => FarmLedgerType::Expense, 'activity' => 'general'],
            ['name' => 'Infraestructura y reparaciones', 'type' => FarmLedgerType::Expense, 'activity' => 'general'],
            ['name' => 'Servicios (agua luz internet)', 'type' => FarmLedgerType::Expense, 'activity' => 'general'],
        ] as $c) {
            FarmCategory::query()->updateOrCreate(
                ['name' => $c['name']],
                [
                    'type' => $c['type'],
                    'farm_activity_id' => $acts[$c['activity']]->id,
                    'is_active' => true,
                ]
            );
        }

        foreach ([
            ['slug' => 'casita', 'name' => 'Casita y patio frontal', 'sort_order' => 5],
            ['slug' => 'huerto', 'name' => 'Huertos intensivos', 'sort_order' => 10],
            ['slug' => 'aves', 'name' => 'Área aves', 'sort_order' => 15],
            ['slug' => 'pozas', 'name' => 'Pozas piscícolas', 'sort_order' => 20],
            ['slug' => 'platano', 'name' => 'Frutales y plátano', 'sort_order' => 25],
            ['slug' => 'tuberculos', 'name' => 'Yuca ñame y raíces', 'sort_order' => 30],
            ['slug' => 'mixto', 'name' => 'Fondo mixto / compostaje', 'sort_order' => 35],
        ] as $row) {
            FarmZone::query()->updateOrCreate(
                ['slug' => $row['slug']],
                [
                    'name' => $row['name'],
                    'sort_order' => $row['sort_order'],
                    'is_active' => true,
                ]
            );
        }

        $catByName = FarmCategory::all()->keyBy('name');

        FarmTransaction::query()->delete();

        // Datos históricos hardcodeados para los últimos 12 meses (reproducibles, sin rand()).
        // Mes 0 = hace 11 meses, Mes 11 = mes actual.

        // Ventas de huevos mensuales (COP) — gallinas son el pilar
        $huevosPorMes = [
            1_520_000, 1_680_000, 1_750_000, 1_920_000, 2_100_000, 2_050_000,
            2_200_000, 2_350_000, 2_180_000, 2_490_000, 2_620_000, 2_850_000,
        ];

        // Venta de pollos vivos — lote cada ~2 meses (valor 0 = sin lote ese mes)
        $pollosPorMes = [
            0, 1_650_000, 0, 1_800_000, 0, 1_950_000,
            0, 2_100_000, 0, 1_750_000, 0, 2_300_000,
        ];

        // Venta de pescado — cosecha cada ~2 meses
        $pescadoPorMes = [
            0, 0, 420_000, 0, 0, 550_000,
            0, 0, 480_000, 0, 0, 680_000,
        ];

        // Venta de hortalizas — mensual
        $hortalizasPorMes = [
            265_000, 310_000, 280_000, 390_000, 450_000, 420_000,
            510_000, 480_000, 395_000, 530_000, 560_000, 590_000,
        ];

        // Venta de plátano — mensual (empieza más bajo, sube con madurez del cultivo)
        $platanoPorMes = [
            260_000, 270_000, 285_000, 295_000, 310_000, 320_000,
            330_000, 345_000, 355_000, 370_000, 385_000, 400_000,
        ];

        // Gasto concentrado y alimento — mensual
        $concentradoPorMes = [
            1_820_000, 1_950_000, 2_100_000, 2_050_000, 2_200_000, 2_150_000,
            2_300_000, 2_250_000, 2_180_000, 2_380_000, 2_420_000, 2_500_000,
        ];

        // Gasto mano de obra — mensual
        $manoObraPorMes = [
            620_000, 650_000, 700_000, 680_000, 720_000, 750_000,
            730_000, 760_000, 780_000, 800_000, 820_000, 850_000,
        ];

        // Gasto veterinaria — mensual
        $veterinariaPorMes = [
            160_000, 180_000, 210_000, 170_000, 290_000, 200_000,
            185_000, 220_000, 165_000, 240_000, 195_000, 260_000,
        ];

        // Gasto insumos agrícolas — mensual
        $insumosPorMes = [
            320_000, 380_000, 410_000, 350_000, 450_000, 420_000,
            390_000, 480_000, 360_000, 510_000, 440_000, 580_000,
        ];

        $zoneHuertoId = FarmZone::where('slug', 'huerto')->value('id');
        $zoneAvesId   = FarmZone::where('slug', 'aves')->value('id');
        $zonePozasId  = FarmZone::where('slug', 'pozas')->value('id');
        $zonePlatanoId = FarmZone::where('slug', 'platano')->value('id');

        for ($i = 0; $i < 12; $i++) {
            $baseDate = now()->subMonths(11 - $i)->startOfMonth();

            // ---- Ingresos ----

            // Venta de huevos
            $this->createTransaction(
                $catByName, $admin, $zoneAvesId,
                'Venta de huevos', $huevosPorMes[$i],
                $baseDate->copy()->addDays(4)
            );

            // Venta de pollos (solo meses con lote)
            if ($pollosPorMes[$i] > 0) {
                $this->createTransaction(
                    $catByName, $admin, $zoneAvesId,
                    'Venta de pollos vivos/en pie', $pollosPorMes[$i],
                    $baseDate->copy()->addDays(20)
                );
            }

            // Venta de pescado (solo meses con cosecha)
            if ($pescadoPorMes[$i] > 0) {
                $this->createTransaction(
                    $catByName, $admin, $zonePozasId,
                    'Venta de pescado', $pescadoPorMes[$i],
                    $baseDate->copy()->addDays(15)
                );
            }

            // Venta hortalizas
            $this->createTransaction(
                $catByName, $admin, $zoneHuertoId,
                'Venta hortalizas', $hortalizasPorMes[$i],
                $baseDate->copy()->addDays(10)
            );

            // Venta plátano
            $this->createTransaction(
                $catByName, $admin, $zonePlatanoId,
                'Venta plátano / fruto', $platanoPorMes[$i],
                $baseDate->copy()->addDays(18)
            );

            // ---- Gastos ----

            // Concentrado y alimento
            $this->createTransaction(
                $catByName, $admin, null,
                'Concentrado y alimento', $concentradoPorMes[$i],
                $baseDate->copy()->addDays(2)
            );

            // Mano de obra
            $this->createTransaction(
                $catByName, $admin, null,
                'Mano de obra', $manoObraPorMes[$i],
                $baseDate->copy()->addDays(28)
            );

            // Veterinaria
            $this->createTransaction(
                $catByName, $admin, null,
                'Veterinaria y farmacia', $veterinariaPorMes[$i],
                $baseDate->copy()->addDays(12)
            );

            // Insumos agrícolas
            $this->createTransaction(
                $catByName, $admin, $zoneHuertoId,
                'Insumos agrícolas y siembra', $insumosPorMes[$i],
                $baseDate->copy()->addDays(6)
            );
        }

        // ===== Inventario de demo =====
        FarmInventoryMovement::query()->delete();
        FarmInventoryItem::query()->delete();

        $item = FarmInventoryItem::query()->create([
            'name' => 'Concentrado pollos · demo',
            'unit' => 'kg',
            'farm_activity_id' => $acts['pollos']->id ?? null,
            'reorder_level' => 100,
            'notes' => 'Ítem ejemplo',
            'is_active' => true,
        ]);

        FarmInventoryMovement::query()->create([
            'farm_inventory_item_id' => $item->id,
            'occurred_on' => now()->startOfMonth()->toDateString(),
            'kind' => InventoryMovementKind::Intake,
            'quantity' => 350,
            'notes' => 'Compra inicial de ejemplo',
            'user_id' => $admin?->id,
        ]);

        FarmInventoryMovement::query()->create([
            'farm_inventory_item_id' => $item->id,
            'occurred_on' => now()->startOfMonth()->addDays(6)->toDateString(),
            'kind' => InventoryMovementKind::Outtake,
            'quantity' => 40,
            'notes' => 'Consumo semanal de ejemplo',
            'user_id' => $admin?->id,
        ]);

        // === Productos de la tienda ===
        \App\Models\Product::query()->truncate();

        $products = [
            ['name' => 'Huevos frescos de gallina (cubeta 30)', 'slug' => 'huevos-cubeta-30', 'description' => 'Cubeta de 30 huevos frescos del día, gallinas criadas en piso con alimentación natural.', 'price' => 22000, 'unit' => 'cubeta', 'min_order' => 1, 'category' => 'huevos', 'emoji' => '🥚', 'is_featured' => true, 'sort_order' => 1],
            ['name' => 'Huevos frescos de gallina (unidad)', 'slug' => 'huevo-unidad', 'description' => 'Huevo fresco del día. Mínimo 6 unidades.', 'price' => 720, 'unit' => 'unidad', 'min_order' => 6, 'category' => 'huevos', 'emoji' => '🥚', 'is_featured' => false, 'sort_order' => 2],
            ['name' => 'Pollo entero (ceba 45 días)', 'slug' => 'pollo-entero', 'description' => 'Pollo de engorde sacrificado en el día, criado sin antibióticos. Peso promedio 2.2-2.5 kg. Se vende en pie o procesado.', 'price' => 25000, 'unit' => 'unidad', 'min_order' => 1, 'category' => 'aves', 'emoji' => '🐔', 'is_featured' => true, 'sort_order' => 3],
            ['name' => 'Pollo en canal (kg)', 'slug' => 'pollo-canal-kg', 'description' => 'Pollo procesado, limpio, vendido por kg. Mínimo 2 kg.', 'price' => 9000, 'unit' => 'kg', 'min_order' => 2, 'category' => 'aves', 'emoji' => '🍗', 'is_featured' => false, 'sort_order' => 4],
            ['name' => 'Tilapia fresca (kg)', 'slug' => 'tilapia-fresca-kg', 'description' => 'Tilapia Nilótica cultivada en pozas con geomembrana. Fresca del día. Tamaño 350-500g. Mínimo 2 kg.', 'price' => 8000, 'unit' => 'kg', 'min_order' => 2, 'category' => 'peces', 'emoji' => '🐟', 'is_featured' => true, 'sort_order' => 5],
            ['name' => 'Cachama fresca (kg)', 'slug' => 'cachama-fresca-kg', 'description' => 'Cachama blanca de cultivo propio. Fresca, ideal para sancocho. Mínimo 2 kg.', 'price' => 7500, 'unit' => 'kg', 'min_order' => 2, 'category' => 'peces', 'emoji' => '🐠', 'is_featured' => false, 'sort_order' => 6],
            ['name' => 'Plátano Hartón (racimo)', 'slug' => 'platano-harton-racimo', 'description' => 'Plátano Hartón maduro, listo para cocinar. Racimo de 8-12 kg aproximadamente.', 'price' => 12000, 'unit' => 'racimo', 'min_order' => 1, 'category' => 'platano', 'emoji' => '🍌', 'is_featured' => true, 'sort_order' => 7],
            ['name' => 'Plátano Hartón (kg)', 'slug' => 'platano-harton-kg', 'description' => 'Plátano hartón vendido por kilo. Mínimo 3 kg.', 'price' => 1500, 'unit' => 'kg', 'min_order' => 3, 'category' => 'platano', 'emoji' => '🍌', 'is_featured' => false, 'sort_order' => 8],
            ['name' => 'Yuca fresca (kg)', 'slug' => 'yuca-fresca-kg', 'description' => 'Yuca ICA Negrita fresca cosechada en la finca. Excelente para sancocho, frita o yuca con hogao. Mínimo 3 kg.', 'price' => 1200, 'unit' => 'kg', 'min_order' => 3, 'category' => 'tuberculos', 'emoji' => '🥔', 'is_featured' => false, 'sort_order' => 9],
            ['name' => 'Tomate chonto (kg)', 'slug' => 'tomate-chonto-kg', 'description' => 'Tomate fresco cosechado en huerta propia. Sin agroquímicos excesivos. Mínimo 2 kg.', 'price' => 2500, 'unit' => 'kg', 'min_order' => 2, 'category' => 'hortalizas', 'emoji' => '🍅', 'is_featured' => false, 'sort_order' => 10],
            ['name' => 'Ají dulce criollo (kg)', 'slug' => 'aji-dulce-kg', 'description' => 'Ají dulce criollo para salsas, guisos y encurtidos. Fresco de la huerta. Mínimo 1 kg.', 'price' => 3000, 'unit' => 'kg', 'min_order' => 1, 'category' => 'hortalizas', 'emoji' => '🫑', 'is_featured' => false, 'sort_order' => 11],
            ['name' => 'Cilantro (manojo)', 'slug' => 'cilantro-manojo', 'description' => 'Cilantro fresco de la huerta. Manojo generoso. Mínimo 3 manojos.', 'price' => 1500, 'unit' => 'manojo', 'min_order' => 3, 'category' => 'hortalizas', 'emoji' => '🌿', 'is_featured' => false, 'sort_order' => 12],
            ['name' => 'Bolsa hortalizas surtidas (3 kg)', 'slug' => 'bolsa-hortalizas-3kg', 'description' => 'Bolsa con surtido de hortalizas de temporada: tomate, ají, cilantro, habichuela o pepino según disponibilidad.', 'price' => 7500, 'unit' => 'bolsa', 'min_order' => 1, 'category' => 'hortalizas', 'emoji' => '🥬', 'is_featured' => true, 'sort_order' => 13],
        ];

        foreach ($products as $p) {
            \App\Models\Product::query()->updateOrCreate(['slug' => $p['slug']], $p);
        }
    }

    /**
     * Helper para crear una FarmTransaction evitando duplicar código.
     *
     * @param  \Illuminate\Support\Collection  $catByName
     * @param  \App\Models\User|null           $user
     * @param  int|null                        $zoneId
     * @param  string                          $catName
     * @param  int                             $amount
     * @param  \Illuminate\Support\Carbon      $date
     */
    private function createTransaction(
        \Illuminate\Support\Collection $catByName,
        ?User $user,
        ?int $zoneId,
        string $catName,
        int $amount,
        \Illuminate\Support\Carbon $date
    ): void {
        $cat = $catByName->get($catName);
        if (! $cat) {
            return;
        }

        FarmTransaction::query()->create([
            'occurred_on'       => $date->toDateString(),
            'type'              => $cat->type,
            'amount'            => $amount,
            'farm_category_id'  => $cat->id,
            'farm_activity_id'  => $cat->farm_activity_id,
            'farm_zone_id'      => $zoneId,
            'tax_document_kind' => null,
            'reference'         => 'Demo',
            'notes'             => 'Dato histórico de ejemplo (12 meses).',
            'user_id'           => $user?->id,
        ]);
    }
}
