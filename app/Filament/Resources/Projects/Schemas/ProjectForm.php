<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                /*
                |--------------------------------------------------------------------------
                | INFORMASI PROJECT
                |--------------------------------------------------------------------------
                */

                Section::make('Informasi Project')
                    ->schema([

                        /*
                        |--------------------------------------------------------------------------
                        | NAMA KAPAL
                        |--------------------------------------------------------------------------
                        */

                        TextInput::make('title')
                            ->label('Nama Kapal')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(
                                function (
                                    Get $get,
                                    Set $set,
                                    ?string $old,
                                    ?string $state
                                ): void {
                                    if (
                                        ($get('slug') ?? '') !==
                                        Str::slug($old ?? '')
                                    ) {
                                        return;
                                    }

                                    $set(
                                        'slug',
                                        Str::slug($state ?? '')
                                    );
                                }
                            ),

                        /*
                        |--------------------------------------------------------------------------
                        | SLUG
                        |--------------------------------------------------------------------------
                        */

                        TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),

                        /*
                        |--------------------------------------------------------------------------
                        | LINGKUP KERJA
                        |--------------------------------------------------------------------------
                        |
                        | Menggunakan Project Category.
                        |
                        */

                        Select::make('project_category_id')
                            ->label('Lingkup Kerja')
                            ->relationship(
                                'category',
                                'name'
                            )
                            ->searchable()
                            ->preload()
                            ->required(),

                        /*
                        |--------------------------------------------------------------------------
                        | NAMA PERUSAHAAN
                        |--------------------------------------------------------------------------
                        */

                        TextInput::make('client')
                            ->label('Nama Perusahaan')
                            ->required()
                            ->maxLength(255),

                        /*
                        |--------------------------------------------------------------------------
                        | LOKASI
                        |--------------------------------------------------------------------------
                        */

                        TextInput::make('location')
                            ->label('Lokasi')
                            ->maxLength(255),

                        /*
                        |--------------------------------------------------------------------------
                        | TANGGAL PEKERJAAN
                        |--------------------------------------------------------------------------
                        */

                        DatePicker::make('project_date')
                            ->label('Tanggal Pekerjaan'),

                    ])
                    ->columns(2),

                /*
                |--------------------------------------------------------------------------
                | MEDIA
                |--------------------------------------------------------------------------
                */

                Section::make('Media Project')
                    ->schema([

                        /*
                        |--------------------------------------------------------------------------
                        | LOGO PERUSAHAAN
                        |--------------------------------------------------------------------------
                        */

                        SpatieMediaLibraryFileUpload::make('client_logo')
                            ->label('Logo Perusahaan')
                            ->collection('client_logo')
                            ->image()
                            ->imageEditor()
                            ->maxSize(5120),

                        /*
                        |--------------------------------------------------------------------------
                        | THUMBNAIL PROJECT
                        |--------------------------------------------------------------------------
                        */

                        SpatieMediaLibraryFileUpload::make('thumbnail')
                            ->label('Thumbnail Project')
                            ->collection('thumbnail')
                            ->image()
                            ->imageEditor()
                            ->maxSize(10240),

                        /*
                        |--------------------------------------------------------------------------
                        | FOTO PEKERJAAN
                        |--------------------------------------------------------------------------
                        |
                        | Dapat mengupload banyak foto sekaligus.
                        |
                        */

                        SpatieMediaLibraryFileUpload::make('gallery')
                            ->label('Foto Pekerjaan')
                            ->collection('gallery')
                            ->multiple()
                            ->reorderable()
                            ->image()
                            ->imageEditor()
                            ->maxSize(10240)
                            ->columnSpanFull(),

                        /*
                        |--------------------------------------------------------------------------
                        | SURAT PENGALAMAN
                        |--------------------------------------------------------------------------
                        */

                        SpatieMediaLibraryFileUpload::make(
                            'experience_letter'
                        )
                            ->label('Surat Pengalaman')
                            ->collection('experience_letter')
                            ->image()
                            ->imageEditor()
                            ->maxSize(10240),

                    ])
                    ->columns(2),

                /*
                |--------------------------------------------------------------------------
                | SEO
                |--------------------------------------------------------------------------
                */

                Section::make('SEO')
                    ->schema([

                        TextInput::make('meta_title')
                            ->label('Meta Title')
                            ->maxLength(255),

                        Textarea::make('meta_description')
                            ->label('Meta Description')
                            ->rows(3),

                    ])
                    ->columns(2),

                /*
                |--------------------------------------------------------------------------
                | PUBLISHING
                |--------------------------------------------------------------------------
                */

                Section::make('Publishing')
                    ->schema([

                        Select::make('status')
                            ->label('Status')
                            ->options([
                                'draft' => 'Draft',
                                'published' => 'Published',
                            ])
                            ->default('draft')
                            ->required(),

                        Select::make('featured')
                            ->label('Featured')
                            ->options([
                                0 => 'No',
                                1 => 'Yes',
                            ])
                            ->default(0)
                            ->required()
                            ->dehydrateStateUsing(
                                fn ($state) => $state ?? 0
                            ),

                        TextInput::make('sort_order')
                            ->label('Urutan')
                            ->numeric()
                            ->default(0),

                        DatePicker::make('published_at')
                            ->label('Tanggal Publish'),

                    ])
                    ->columns(4),

            ]);
    }
}