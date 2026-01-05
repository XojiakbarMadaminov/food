<?php

namespace App\Filament\Admin\Resources\Products\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Product Details')
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->label('Name')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        TextInput::make('price')
                            ->label('Price')
                            ->numeric()
                            ->required(),

                        Select::make('category_id')
                            ->label('Category')
                            ->relationship('category', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),

                        SpatieMediaLibraryFileUpload::make('image')
                            ->label('Image')
                            ->collection('image')
                            ->image()
                            ->columnSpanFull(),
                    ]),

                Section::make('Visibility')
                    ->columns(1)
                    ->schema([
                        Toggle::make('is_active')
                            ->label('Active')
                            ->default(true),
                    ]),
            ]);
    }
}
