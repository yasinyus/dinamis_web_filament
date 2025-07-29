<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Filament\Resources\SettingResource\RelationManagers;
use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-adjustments-horizontal';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //card
                Forms\Components\Card::make()
                    ->schema([
                    
                        //Logo image
                        Forms\Components\FileUpload::make('logo_image')
                            ->label('Logo Image')
                            ->required(),

                        //grid

                        //Banner image
                        Forms\Components\FileUpload::make('banner_image')
                            ->label('Banner Image')
                            ->required(),

                        //grid
                        Forms\Components\Grid::make(4)
                        ->schema([

                            //app name
                            Forms\Components\TextInput::make('app_name')
                            ->label('App Name')
                            ->placeholder('App Name')
                            ->required(), 

                    

                            //title
                            Forms\Components\TextInput::make('title')
                            ->label('Title')
                            ->placeholder('Title')
                            ->required(),

                            //banner content
                            Forms\Components\TextInput::make('banner_content')
                            ->label('Banner Content')
                            ->placeholder('Banner Content')
                            ->required(),

                            //footer content
                            Forms\Components\TextInput::make('footer_content')
                            ->label('Footer Content')
                            ->placeholder('Footer Content')
                            ->required(),

                            //footer
                            Forms\Components\TextInput::make('footer')
                            ->label('Footer')
                            ->placeholder('Footer')
                            ->required(),

                            //description
                            Forms\Components\TextInput::make('description')
                            ->label('Desc')
                            ->placeholder('Desc')
                            ->required(),
                        ]),

                    
                        
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('logo_image')->circular(),
                Tables\Columns\ImageColumn::make('banner_image'),
                Tables\Columns\TextColumn::make('app_name'),
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('banner_content'),
                Tables\Columns\TextColumn::make('footer_content'),
                Tables\Columns\TextColumn::make('footer'),
                Tables\Columns\TextColumn::make('description'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListSettings::route('/'),
            'create' => Pages\CreateSetting::route('/create'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}
