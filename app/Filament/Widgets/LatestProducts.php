<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class LatestProducts extends TableWidget
{
    protected static ?string $heading = 'Produk Terbaru';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                fn (): Builder => Product::query()
                    ->with('category')
                    ->latest()
                    ->limit(5)
            )
            ->columns([
                TextColumn::make('name')
                    ->label('Produk')
                    ->searchable()
                    ->weight('bold'),

                TextColumn::make('category.name')
                    ->label('Kategori')
                    ->badge(),

                TextColumn::make('price')
                    ->label('Harga')
                    ->money('IDR', locale: 'id')
                    ->sortable(),

                TextColumn::make('stock')
                    ->label('Stok')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('unit')
                    ->label('Satuan'),

                IconColumn::make('is_active')
                    ->label('Status')
                    ->boolean(),
            ])
            ->defaultSort('created_at', 'desc');
    }
}