<?php

namespace App\Filament\Resources\NewsCategories;

use App\Filament\Resources\NewsCategories\Pages\CreateNewsCategory;
use App\Filament\Resources\NewsCategories\Pages\EditNewsCategory;
use App\Filament\Resources\NewsCategories\Pages\ListNewsCategories;
use App\Filament\Resources\NewsCategories\Schemas\NewsCategoryForm;
use App\Filament\Resources\NewsCategories\Tables\NewsCategoriesTable;
use App\Models\NewsCategory;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class NewsCategoryResource extends Resource
{
    protected static ?string $model = NewsCategory::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedNewspaper;

    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $modelLabel = 'News Category';

    protected static ?string $pluralModelLabel = 'News Categories';

    public static function getNavigationLabel(): string
    {
        return 'News Categories';
    }

    public static function getNavigationGroup(): string|UnitEnum|null
    {
        return 'News';
    }

    public static function form(Schema $schema): Schema
    {
        return NewsCategoryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return NewsCategoriesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListNewsCategories::route('/'),
            'create' => CreateNewsCategory::route('/create'),
            'edit' => EditNewsCategory::route('/{record}/edit'),
        ];
    }
}