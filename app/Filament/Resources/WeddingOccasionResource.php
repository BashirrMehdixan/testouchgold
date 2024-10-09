<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WeddingOccasionResource\Pages;
use App\Filament\Resources\WeddingOccasionResource\RelationManagers;
use App\Models\WeddingOccasion;
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
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class WeddingOccasionResource extends Resource
{
    use Translatable;

    protected static ?string $model = WeddingOccasion::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
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
                            ->readOnly()
                            ->unique(ignoreRecord: true)
                            ->required(),
                        RichEditor::make('description')
                            ->columnSpan('full')
                            ->required(),
                    ])
                    ->columnSpan(2),
                Section::make()->schema([
                    FileUpload::make('thumbnail')
                        ->columnSpan('full')
                        ->label('Collection image')
                        ->disk('public')
                        ->directory('uploads/wedding_occasion')
                        ->required(),
                    Toggle::make('status')
                ])
                    ->columnSpan(1)
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('thumbnail'),
                TextColumn::make('name')
                    ->label('Title')
                    ->searchable(),
                ToggleColumn::make('status')
            ])
            ->filters([
                TernaryFilter::make('status'),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
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
            'index' => Pages\ListWeddingOccasions::route('/'),
            'create' => Pages\CreateWeddingOccasion::route('/create'),
            'edit' => Pages\EditWeddingOccasion::route('/{record}/edit'),
        ];
    }
}
