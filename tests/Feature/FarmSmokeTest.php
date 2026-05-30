<?php

namespace Tests\Feature;

use App\Enums\UserRole;
use App\Filament\Exports\FarmTransactionExporter;
use App\Models\FarmInventoryItem;
use App\Models\FarmTransaction;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Gate;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class FarmSmokeTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function seed_creates_users_roles_inventory_and_transactions(): void
    {
        $this->seed(DatabaseSeeder::class);

        $this->assertSame(3, User::query()->count());

        $admin = User::query()->where('email', 'admin@granja.local')->firstOrFail();
        $operador = User::query()->where('email', 'operador@granja.local')->firstOrFail();
        $vista = User::query()->where('email', 'vista@granja.local')->firstOrFail();

        $this->assertSame(UserRole::Admin, $admin->role);
        $this->assertSame(UserRole::Operator, $operador->role);
        $this->assertSame(UserRole::Viewer, $vista->role);

        $this->assertTrue(Gate::forUser($admin)->allows('viewAny', User::class));
        $this->assertFalse(Gate::forUser($vista)->allows('viewAny', User::class));

        $this->assertTrue(Gate::forUser($operador)->allows('create', FarmTransaction::class));
        $this->assertFalse(Gate::forUser($vista)->allows('create', FarmTransaction::class));

        $this->assertGreaterThan(0, FarmTransaction::query()->count());

        $item = FarmInventoryItem::query()->where('name', 'Concentrado pollos · demo')->firstOrFail();
        $this->assertEqualsWithDelta(310.0, $item->currentStock(), 0.0001);
    }

    #[Test]
    public function farm_transaction_exporter_defines_columns_and_eager_loads(): void
    {
        $this->seed(DatabaseSeeder::class);

        $columns = FarmTransactionExporter::getColumns();
        $this->assertGreaterThan(5, count($columns));

        $query = FarmTransactionExporter::modifyQuery(FarmTransaction::query());
        $tx = $query->first();
        $this->assertNotNull($tx);
        $this->assertTrue($tx->relationLoaded('category'));
        $this->assertTrue($tx->relationLoaded('user'));
    }

    #[Test]
    public function admin_login_page_loads(): void
    {
        $response = $this->get('/admin/login');

        $response->assertStatus(200);
        $response->assertSee('lang="es"', false);
    }

    #[Test]
    public function farm_map_page_loads_embedded_plano_for_authenticated_user(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/admin/plano-finca');

        $response->assertOk();
        $response->assertSee('id="farmPlanoSvg"', false);
        $response->assertDontSee('<iframe', false);
    }
}
