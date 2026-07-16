<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReferenceResource\Pages;
use App\Models\Reference;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Get;
use Illuminate\Support\Str;

class ReferenceResource extends Resource
{
    protected static ?string $model = Reference::class;
    protected static ?string $navigationLabel = 'Referenciák';
    protected static ?string $modelLabel = 'Referencia';
    protected static ?string $pluralModelLabel = 'Referenciák';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Cím')
                    ->required()
                    ->maxLength(255)
                    ->validationMessages([
                        'required' => 'A cím megadása kötelező.',
                        'max' => 'A cím túl hosszú (maximum 255 karakter).',
                    ]),
                Forms\Components\DatePicker::make('project_date')
                    ->label('Dátum')
                    ->default(date('Y-m-d'))
                    ->required()
                    ->validationMessages(['required' => 'A dátum kiválasztása kötelező.']),
                Forms\Components\FileUpload::make('image_path')
                    ->label('Kép')
                    ->image()
                    ->imageEditor()
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('1200:840')
                    ->imageResizeTargetWidth('1200')
                    ->imageResizeTargetHeight('840')
                    ->getUploadedFileNameForStorageUsing(function (Get $get, $file) {
                        $title = $get('title') ? Str::slug($get('title')) : 'referencia';
                        $extension = $file->getClientOriginalExtension();

                        return "{$title}-" . uniqid() . ".{$extension}";
                    })
                    ->required()
                    ->validationMessages(['required' => 'A kép feltöltése kötelező.'])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image_path')
                    ->label('Kép')
                    ->disk('public'),
                Tables\Columns\TextColumn::make('title')
                    ->label('Cím')
                    ->searchable(),
                Tables\Columns\TextColumn::make('project_date')
                    ->label('Dátum')
                    ->date('Y.m.d')
                    ->sortable(),
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
            'index' => Pages\ListReferences::route('/'),
            'create' => Pages\CreateReference::route('/create'),
            'edit' => Pages\EditReference::route('/{record}/edit'),
        ];
    }
}
