<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum NavigationGroup implements HasLabel
{
    case BaseActions;
    case ProductsAndCategories;
    case Finance;
    case Statistics;
    case Settings;

    public function getLabel(): string
    {
        return match ($this) {
            self::BaseActions           => 'Asosiy amallar',
            self::ProductsAndCategories => 'Tovar va kategoriyalar',
            self::Finance               => 'Moliya',
            self::Settings              => 'Sozlamalar',
            self::Statistics            => 'Hisobot va tahlil',
        };
    }
}
