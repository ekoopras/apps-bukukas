<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PengeluaranResource\Pages;
use App\Filament\Resources\PengeluaranResource\RelationManagers;
use App\Models\Pengeluaran;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PengeluaranResource extends Resource
{
    protected static ?string $model = Pengeluaran::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Pengeluaran';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('pengguna_id')
                    ->relationship('pengguna', 'nama')
                    ->required(),
                Forms\Components\TextInput::make('keterangan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('tanggal')
                    ->required(),
                Forms\Components\TextInput::make('nominal')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('pengguna.nama')
                    ->label('nama'),
                Tables\Columns\TextColumn::make('keterangan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal')
                    ->label('Tanggal (D-M-Y)')
                    ->date('d - m - y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('nominal')
                    ->label('Nominal (Rp)')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListPengeluarans::route('/'),
            // 'create' => Pages\CreatePengeluaran::route('/create'),
            // 'edit' => Pages\EditPengeluaran::route('/{record}/edit'),
        ];
    }
}
