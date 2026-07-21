<?php

namespace App\Filament\Resources\NewsCategories\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class NewsCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('General Information')
                    ->schema([

                        TextInput::make('name')
                            ->label('Category Name')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?string $state): void {
                                if (($get('slug') ?? '') !== Str::slug($old ?? '')) {
                                    return;
                                }

                                $set('slug', Str::slug($state ?? ''));
                            }),

                        TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),

                        RichEditor::make('description')
                            ->columnSpanFull(),

                    ])
                    ->columns(2),

                Section::make('Publishing')
                    ->schema([

                        Select::make('status')
                            ->options([
                                'draft' => 'Draft',
                                'published' => 'Published',
                            ])
                            ->default('draft')
                            ->required(),

                        TextInput::make('sort_order')
                            ->label('Sort Order')
                            ->numeric()
                            ->default(0),

                        Select::make('featured')
                            ->options([
                                0 => 'No',
                                1 => 'Yes',
                            ])
                            ->default(0),

                    ])
                    ->columns(3),

            ]);
    }
}