<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InputDataResource\Pages;
use App\Models\InputData;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Tables\Table;

class InputDataResource extends Resource
{
    protected static ?string $model = InputData::class;

    protected static ?string $navigationLabel = 'Input Data SPP dan SPM';
    protected static ?string $pluralLabel = 'Input Data';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('bidang')
                    ->options([
                        'Binamarga' => 'Binamarga',
                        'Cipta Karya' => 'Cipta Karya',
                        'Sumber Daya Air' => 'Sumber Daya Air',
                        'Perumahan Kawasan Permukiman' => 'Perumahan Kawasan Permukiman',
                        'Pertanahan Penataan Ruang' => 'Pertanahan Penataan Ruang',
                        'Bina Jasa Konstruksi' => 'Bina Jasa Konstruksi',
                    ])
                    ->required()
                    ->label('Bidang'),
                Forms\Components\TextInput::make('kategori')
                    ->required()
                    ->label('Kategori'),
                Forms\Components\TextInput::make('tahun')
                    ->numeric()
                    ->required()
                    ->rules(['min:1900', 'max:' . date('Y')])
                    ->label('Tahun'),
                Forms\Components\TextInput::make('nama_perusahaan')
                    ->required()
                    ->label('Nama Perusahaan'),
                Forms\Components\TextInput::make('no_rekening')
                    ->required()
                    ->label('No Rekening'),
                Forms\Components\TextInput::make('nilai_kontrak')
                    ->numeric()
                    ->required()
                    ->label('Nilai Kontrak'),
                Forms\Components\TextInput::make('nilai_spp')
                    ->numeric()
                    ->required()
                    ->label('Nilai SPP'),
                Forms\Components\Textarea::make('uraian_kegiatan')
                    ->required()
                    ->label('Uraian Kegiatan'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                ->label('No') // Menampilkan ID
                ->sortable(), // Membuat kolom ID dapat diurutkan
                Tables\Columns\TextColumn::make('bidang')->label('Bidang')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('kategori')->label('Kategori')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('tahun')->label('Tahun')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('nama_perusahaan')->label('Nama Perusahaan')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('no_rekening')->label('No Rekening'),
                Tables\Columns\TextColumn::make('nilai_kontrak')->label('Nilai Kontrak')->money('IDR', true)->sortable(),
                Tables\Columns\TextColumn::make('nilai_spp')->label('Nilai SPP')->money('IDR', true)->sortable(),
                Tables\Columns\TextColumn::make('uraian_kegiatan')->label('Uraian Kegiatan')->limit(50)->searchable(),
            ])
        
            ->filters([
                Tables\Filters\SelectFilter::make('bidang')
                    ->label('Filter Bidang')
                    ->options([
                        'Binamarga' => 'Binamarga',
                        'Cipta Karya' => 'Cipta Karya',
                        'Sumber Daya Air' => 'Sumber Daya Air',
                        'Perumahan Kawasan Permukiman' => 'Perumahan Kawasan Permukiman',
                        'Pertanahan Penataan Ruang' => 'Pertanahan Penataan Ruang',
                        'Bina Jasa Konstruksi' => 'Bina Jasa Konstruksi',
                    ]),
                    // Filter untuk Tahun
            Tables\Filters\SelectFilter::make('tahun')
                ->label('Filter Tahun')
                ->options(fn () => InputData::query()
                    ->select('tahun')
                    ->distinct()
                    ->orderBy('tahun', 'desc')
                    ->pluck('tahun', 'tahun')
                    ->toArray()
                ),
            ])
            
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInputData::route('/'),
            'create' => Pages\CreateInputData::route('/create'),
            'edit' => Pages\EditInputData::route('/{record}/edit'),
        ];
    }
}
