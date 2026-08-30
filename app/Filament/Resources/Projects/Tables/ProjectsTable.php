<?php

namespace App\Filament\Resources\Projects\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ProjectsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                /*
                |--------------------------------------------------------------------------
                | CLIENT LOGO
                |--------------------------------------------------------------------------
                */

                SpatieMediaLibraryImageColumn::make('client_logo')
                    ->collection('client_logo')
                    ->label('Logo')
                    ->circular(false)
                    ->square(),

                /*
                |--------------------------------------------------------------------------
                | THUMBNAIL
                |--------------------------------------------------------------------------
                */

                SpatieMediaLibraryImageColumn::make('thumbnail')
                    ->collection('thumbnail')
                    ->label('Thumbnail')
                    ->square(),

                /*
                |--------------------------------------------------------------------------
                | PROJECT / VESSEL
                |--------------------------------------------------------------------------
                */

                TextColumn::make('title')
                    ->label('Kapal')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                /*
                |--------------------------------------------------------------------------
                | CATEGORY
                |--------------------------------------------------------------------------
                */

                TextColumn::make('category.name')
                    ->label('Category')
                    ->badge()
                    ->sortable(),

                /*
                |--------------------------------------------------------------------------
                | COMPANY
                |--------------------------------------------------------------------------
                */

                TextColumn::make('client')
                    ->label('Perusahaan')
                    ->searchable()
                    ->toggleable(),

                /*
                |--------------------------------------------------------------------------
                | LOCATION
                |--------------------------------------------------------------------------
                */

                TextColumn::make('location')
                    ->searchable()
                    ->toggleable(),

                /*
                |--------------------------------------------------------------------------
                | PROJECT DATE
                |--------------------------------------------------------------------------
                */

                TextColumn::make('project_date')
                    ->label('Project Date')
                    ->date('d M Y')
                    ->sortable(),

                /*
                |--------------------------------------------------------------------------
                | FEATURED
                |--------------------------------------------------------------------------
                */

                IconColumn::make('featured')
                    ->boolean()
                    ->sortable(),

                /*
                |--------------------------------------------------------------------------
                | STATUS
                |--------------------------------------------------------------------------
                */

                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state) => match ($state) {
                        'published' => 'success',
                        'draft' => 'gray',
                        default => 'gray',
                    }),

                /*
                |--------------------------------------------------------------------------
                | CREATED
                |--------------------------------------------------------------------------
                */

                TextColumn::make('created_at')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(
                        isToggledHiddenByDefault: true
                    ),

            ])

            ->filters([

                SelectFilter::make('project_category_id')
                    ->relationship(
                        'category',
                        'name'
                    )
                    ->label('Category'),

                SelectFilter::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'published' => 'Published',
                    ]),

            ])

            ->defaultSort('sort_order')

            ->recordActions([
                EditAction::make(),
            ])

            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}