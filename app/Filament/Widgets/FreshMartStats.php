<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class FreshMartStats extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Produk', Product::count())
                ->description('Produk tersedia di FreshMart')
                ->descriptionIcon('heroicon-m-shopping-bag')
                ->color('primary'),

            Stat::make('Total Pesanan', Order::count())
                ->description('Pesanan yang tercatat')
                ->descriptionIcon('heroicon-m-shopping-cart')
                ->color('success'),

            Stat::make('Total Pengguna', User::count())
                ->description('Pengguna terdaftar')
                ->descriptionIcon('heroicon-m-users')
                ->color('info'),

            Stat::make('Total Kategori', Category::count())
                ->description('Kategori produk')
                ->descriptionIcon('heroicon-m-tag')
                ->color('warning'),
        ];
    }
}