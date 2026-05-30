<?php

namespace App\Filament\Resources\Orders;

use App\Filament\Resources\Orders\Pages\ListOrders;
use App\Filament\Resources\Orders\Pages\ViewOrder;
use App\Models\Order;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use UnitEnum;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedClipboardDocumentList;

    protected static ?string $navigationLabel = 'Pedidos';

    protected static ?string $modelLabel = 'Pedido';

    protected static ?string $pluralModelLabel = 'Pedidos';

    protected static string|UnitEnum|null $navigationGroup = 'Tienda';

    protected static ?int $navigationSort = 2;

    protected static ?string $recordTitleAttribute = 'order_number';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Estado y notas')
                ->schema([
                    Select::make('status')
                        ->label('Estado')
                        ->required()
                        ->options([
                            'pendiente'  => 'Pendiente',
                            'confirmado' => 'Confirmado',
                            'listo'      => 'Listo para entrega',
                            'entregado'  => 'Entregado',
                            'cancelado'  => 'Cancelado',
                        ]),
                    Textarea::make('admin_notes')
                        ->label('Notas internas (admin)')
                        ->rows(3)
                        ->columnSpanFull(),
                ])
                ->columns(2),
        ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Datos del cliente')
                ->schema([
                    TextEntry::make('order_number')
                        ->label('Número de pedido'),
                    TextEntry::make('created_at')
                        ->label('Fecha')
                        ->dateTime('d/m/Y H:i'),
                    TextEntry::make('customer_name')
                        ->label('Cliente'),
                    TextEntry::make('customer_phone')
                        ->label('Teléfono'),
                    TextEntry::make('customer_email')
                        ->label('Email')
                        ->placeholder('—'),
                    TextEntry::make('customer_address')
                        ->label('Dirección')
                        ->placeholder('—')
                        ->columnSpanFull(),
                ])
                ->columns(2),

            Section::make('Pedido')
                ->schema([
                    TextEntry::make('delivery_method')
                        ->label('Método de entrega')
                        ->formatStateUsing(fn (string $state): string => match ($state) {
                            'domicilio' => 'A domicilio',
                            'recogida'  => 'Recogida en granja',
                            default     => $state,
                        }),
                    TextEntry::make('status')
                        ->label('Estado')
                        ->badge()
                        ->color(fn (string $state): string => match ($state) {
                            'pendiente'  => 'warning',
                            'confirmado' => 'info',
                            'listo'      => 'success',
                            'entregado'  => 'success',
                            'cancelado'  => 'danger',
                            default      => 'gray',
                        })
                        ->formatStateUsing(fn (string $state): string => match ($state) {
                            'pendiente'  => 'Pendiente',
                            'confirmado' => 'Confirmado',
                            'listo'      => 'Listo para entrega',
                            'entregado'  => 'Entregado',
                            'cancelado'  => 'Cancelado',
                            default      => $state,
                        }),
                    TextEntry::make('subtotal')
                        ->label('Subtotal')
                        ->money('COP'),
                    TextEntry::make('delivery_fee')
                        ->label('Costo envío')
                        ->money('COP'),
                    TextEntry::make('total')
                        ->label('Total')
                        ->money('COP')
                        ->weight('bold'),
                    TextEntry::make('customer_notes')
                        ->label('Notas del cliente')
                        ->placeholder('—')
                        ->columnSpanFull(),
                    TextEntry::make('admin_notes')
                        ->label('Notas internas')
                        ->placeholder('—')
                        ->columnSpanFull(),
                ])
                ->columns(2),

            Section::make('Ítems del pedido')
                ->schema([
                    RepeatableEntry::make('items')
                        ->label('')
                        ->schema([
                            TextEntry::make('product_name')
                                ->label('Producto'),
                            TextEntry::make('quantity')
                                ->label('Cantidad'),
                            TextEntry::make('product_unit')
                                ->label('Unidad'),
                            TextEntry::make('unit_price')
                                ->label('Precio unitario')
                                ->money('COP'),
                            TextEntry::make('subtotal')
                                ->label('Subtotal')
                                ->money('COP'),
                        ])
                        ->columns(5)
                        ->columnSpanFull(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order_number')
                    ->label('Pedido')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('customer_name')
                    ->label('Cliente')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('customer_phone')
                    ->label('Teléfono'),
                TextColumn::make('delivery_method')
                    ->label('Entrega')
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'domicilio' => 'Domicilio',
                        'recogida'  => 'Recogida',
                        default     => $state,
                    }),
                TextColumn::make('status')
                    ->label('Estado')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pendiente'  => 'warning',
                        'confirmado' => 'info',
                        'listo'      => 'success',
                        'entregado'  => 'success',
                        'cancelado'  => 'danger',
                        default      => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'pendiente'  => 'Pendiente',
                        'confirmado' => 'Confirmado',
                        'listo'      => 'Listo',
                        'entregado'  => 'Entregado',
                        'cancelado'  => 'Cancelado',
                        default      => $state,
                    }),
                TextColumn::make('total')
                    ->label('Total')
                    ->money('COP')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Fecha')
                    ->date('d/m/Y')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('status')
                    ->label('Estado')
                    ->options([
                        'pendiente'  => 'Pendiente',
                        'confirmado' => 'Confirmado',
                        'listo'      => 'Listo para entrega',
                        'entregado'  => 'Entregado',
                        'cancelado'  => 'Cancelado',
                    ]),
                SelectFilter::make('delivery_method')
                    ->label('Método de entrega')
                    ->options([
                        'domicilio' => 'A domicilio',
                        'recogida'  => 'Recogida en granja',
                    ]),
            ])
            ->recordActions([
                ViewAction::make(),
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
            'index' => ListOrders::route('/'),
            'view'  => ViewOrder::route('/{record}'),
        ];
    }
}
