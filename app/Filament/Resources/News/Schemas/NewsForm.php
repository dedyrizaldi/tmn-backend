<?php

namespace App\Filament\Resources\News\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class NewsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('General Information')
                    ->schema([

                        TextInput::make('title')
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

                        Select::make('news_category_id')
                            ->label('Category')
                            ->relationship('category', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),

                        TextInput::make('author')
                            ->maxLength(255)
                            ->default(auth()->user()?->name),

                    ])
                    ->columns(2),

                Section::make('Content')
                    ->schema([

                        Textarea::make('excerpt')
                            ->rows(3)
                            ->columnSpanFull(),

                        RichEditor::make('content')
                            ->columnSpanFull(),

                    ]),

                Section::make('Media')
                    ->schema([

                        SpatieMediaLibraryFileUpload::make('thumbnail')
                            ->collection('thumbnail')
                            ->image()
                            ->required(),

                        SpatieMediaLibraryFileUpload::make('gallery')
                            ->collection('gallery')
                            ->multiple()
                            ->image(),

                    ])
                    ->columns(2),

                Section::make('SEO')
                    ->schema([

                        TextInput::make('meta_title')
                            ->maxLength(255),

                        Textarea::make('meta_description')
                            ->rows(3),

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

                        Select::make('featured')
                            ->options([
                                0 => 'No',
                                1 => 'Yes',
                            ])
                            ->default(0),

                        TextInput::make('sort_order')
                            ->numeric()
                            ->default(0),

                        // DateTimePicker::make('published_at'),

                    ])
                    ->columns(4),

            ]);
    }
}