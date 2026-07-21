<?php

namespace App\Filament\Resources\EquipmentCategories\Schemas;

use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class EquipmentCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Category Information')
                    ->description('Basic information about equipment category.')
                    ->icon(Heroicon::OutlinedTag)
                    ->schema([

                        TextInput::make('name')
                            ->label('Category Name')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function ($operation, $state, callable $set) {
                                if ($operation !== 'create') {
                                    return;
                                }

                                $set('slug', str($state)->slug());
                            }),

                        TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),

                        TextInput::make('icon')
                            ->helperText('Example: heroicon-o-cpu-chip')
                            ->maxLength(255),

                        Textarea::make('description')
                            ->rows(4)
                            ->columnSpanFull(),

                    ])
                    ->columns(2),

                Section::make('Publishing')
                    ->icon(Heroicon::OutlinedGlobeAlt)
                    ->schema([

                        Toggle::make('featured')
                            ->default(false),

                        Toggle::make('status')
                            ->label('Published')
                            ->default(true)
                            ->formatStateUsing(fn ($state) => $state === 'published')
                            ->dehydrateStateUsing(fn ($state) => $state ? 'published' : 'draft'),

                        TextInput::make('sort_order')
                            ->numeric()
                            ->default(0),

                    ])
                    ->columns(3),

            ]);
    }
}