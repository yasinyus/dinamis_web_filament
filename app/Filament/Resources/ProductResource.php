<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                //card
                Forms\Components\Card::make()
                    ->schema([
                    
                        //image
                        Forms\Components\FileUpload::make('product_image')
                            ->label('Product Image')
                            ->required(),

                        //grid
                        Forms\Components\Grid::make(4)
                        ->schema([

                            //title
                            Forms\Components\TextInput::make('product_name')
                            ->label('Product Name')
                            ->placeholder('Product Name')
                            ->required(), 

                            //category
                            Forms\Components\Select::make('category')
                                ->label('Category')
                                ->relationship('category', 'name')
                                ->required(),

                            //price
                            Forms\Components\TextInput::make('price')
                            ->label('Product Price')
                            ->placeholder('Product Price')
                            ->required(),

                            //description
                            Forms\Components\TextInput::make('description')
                            ->label('Description')
                            ->placeholder('Description')
                            ->required(),
                        ]),

                    
                        
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('product_image')->circular(),
                Tables\Columns\TextColumn::make('product_name'),
                Tables\Columns\TextColumn::make('category.name'),
                Tables\Columns\TextColumn::make('price'),
                Tables\Columns\TextColumn::make('description'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
