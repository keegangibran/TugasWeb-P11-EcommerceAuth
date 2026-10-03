<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use Filament\Widgets\ChartWidget;

class ProductsByCategory extends ChartWidget
{
    protected ?string $heading = 'Produk Berdasarkan Kategori';

    protected function getData(): array
    {
        $categories = Category::withCount('products')->get();

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Produk',
                    'data' => $categories->pluck('products_count')->toArray(),
                    'backgroundColor' => [
                        '#778873',
                        '#84977F',
                        '#91A68A',
                        '#A1BC98',
                        '#ADBEA1',
                        '#BAC9AA',
                        '#C6D2B4',
                        '#D2DCB6',
                    ],
                    'borderColor' => '#778873',
                ],
            ],
            'labels' => $categories->pluck('name')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}