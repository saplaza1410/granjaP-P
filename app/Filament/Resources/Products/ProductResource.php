<?php

namespace App\Filament\Resources\Products;

use App\Filament\Resources\Products\Pages\CreateProduct;
use App\Filament\Resources\Products\Pages\EditProduct;
use App\Filament\Resources\Products\Pages\ListProducts;
use App\Models\Product;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use UnitEnum;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedShoppingBag;

    protected static ?string $navigationLabel = 'Productos tienda';

    protected static ?string $modelLabel = 'Producto';

    protected static ?string $pluralModelLabel = 'Productos';

    protected static string|UnitEnum|null $navigationGroup = 'Tienda';

    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Información del producto')
                ->schema([
                    TextInput::make('name')
                        ->label('Nombre')
                        ->required()
                        ->maxLength(120)
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn (string $state, \Filament\Schemas\Components\Utilities\Set $set) => $set('slug', Str::slug($state))),
                    TextInput::make('slug')
                        ->label('Slug')
                        ->required()
                        ->unique(ignoreRecord: true),
                    Textarea::make('description')
                        ->label('Descripción')
                        ->rows(3)
                        ->columnSpanFull(),
                ])
                ->columns(2),

            Section::make('Precio y categoría')
                ->schema([
                    TextInput::make('price')
                        ->label('Precio (COP)')
                        ->numeric()
                        ->required()
                        ->prefix('$'),
                    TextInput::make('unit')
                        ->label('Unidad')
                        ->required()
                        ->helperText('Ej: unidad, kg, racimo, cubeta, manojo'),
                    TextInput::make('min_order')
                        ->label('Pedido mínimo')
                        ->numeric()
                        ->default(1),
                    Select::make('category')
                        ->label('Categoría')
                        ->required()
                        ->options([
                            'huevos'     => '🥚 Huevos',
                            'aves'       => '🐔 Aves',
                            'peces'      => '🐟 Peces',
                            'hortalizas' => '🥬 Hortalizas',
                            'platano'    => '🍌 Plátano y frutales',
                            'tuberculos' => '🌿 Tubérculos',
                            'otros'      => '📦 Otros',
                        ]),
                    TextInput::make('emoji')
                        ->label('Emoji')
                        ->required()
                        ->default('🌿')
                        ->helperText('Un emoji para representar el producto'),
                    TextInput::make('sort_order')
                        ->label('Orden')
                        ->numeric()
                        ->default(0),
                ])
                ->columns(2),

            Section::make('Visibilidad')
                ->schema([
                    Toggle::make('is_featured')
                        ->label('Destacado en home'),
                    Toggle::make('is_available')
                        ->label('Disponible para pedidos')
                        ->default(true),
                ])
                ->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('emoji')
                    ->label('')
                    ->size('lg'),
                TextColumn::make('name')
                    ->label('Producto')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('category')
                    ->label('Categoría')
                    ->badge(),
                TextColumn::make('price')
                    ->label('Precio')
                    ->money('COP')
                    ->sortable(),
                TextColumn::make('unit')
                    ->label('Unidad'),
                IconColumn::make('is_featured')
                    ->label('Destacado')
                    ->boolean(),
                IconColumn::make('is_available')
                    ->label('Disponible')
                    ->boolean(),
                TextColumn::make('sort_order')
                    ->label('Orden')
                    ->sortable(),
            ])
            ->defaultSort('sort_order')
            ->filters([
                SelectFilter::make('category')
                    ->label('Categoría')
                    ->options([
                        'huevos'     => 'Huevos',
                        'aves'       => 'Aves',
                        'peces'      => 'Peces',
                        'hortalizas' => 'Hortalizas',
                        'platano'    => 'Plátano',
                        'tuberculos' => 'Tubérculos',
                        'otros'      => 'Otros',
                    ]),
                TernaryFilter::make('is_available')
                    ->label('Disponible'),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListProducts::route('/'),
            'create' => CreateProduct::route('/create'),
            'edit'   => EditProduct::route('/{record}/edit'),
        ];
    }
}
