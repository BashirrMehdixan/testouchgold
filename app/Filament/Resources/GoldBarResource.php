<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GoldBarResource\Pages;
use App\Filament\Resources\GoldBarResource\RelationManagers;
use App\Models\GoldBar;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class GoldBarResource extends Resource
{
    use Translatable;
    protected static ?string $model = GoldBar::class;

    protected static ?string $navigationIcon = 'heroicon-o-circle-stack';

    protected static ?string $navigationLabel = 'Gold Bars and Gold Coins';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('')
                    ->schema([
                        TextInput::make('name')
                            ->live(true)
                            ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?string $state) {
                                if (($get('slug') ?? '') !== Str::slug($old)) {
                                    return;
                                }
                                $set('slug', Str::slug($state));
                            })
                            ->required(),
                        TextInput::make('slug')
                            ->unique(ignoreRecord: true)
                            ->readOnly()
                            ->required(),
                        RichEditor::make('description')
                            ->columnSpan('full'),
                    ])
                    ->columns(2)
                    ->columnSpan(2),
                Section::make()
                    ->schema([
                        FileUpload::make('thumbnail')
                            ->image()
                            ->imageEditor()
                            ->directory('uploads/images/gold-bars')
                            ->required(),
                        Toggle::make('status')
                            ->default(true)
                    ])
                    ->columnSpan(1)

            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Split::make([
                    ImageColumn::make('thumbnail'),
                    TextColumn::make('name')
                        ->sortable()
                        ->searchable(),
                    TextColumn::make('slug')
                        ->sortable()
                        ->searchable(),
                    ToggleColumn::make('status')
                        ->sortable(),
                ])
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
            'index' => Pages\ListGoldBars::route('/'),
            'create' => Pages\CreateGoldBar::route('/create'),
            'edit' => Pages\EditGoldBar::route('/{record}/edit'),
        ];
    }
}
