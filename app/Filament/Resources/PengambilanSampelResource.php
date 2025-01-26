<?php
namespace App\Filament\Resources;

use App\Filament\Resources\PengambilanSampelResource\Pages;
use App\Filament\Resources\PengambilanSampelResource\RelationManagers;
use App\Models\SampelPengujian;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class PengambilanSampelResource extends Resource
{
    protected static ?string $model = SampelPengujian::class;

    protected static ?string $navigationIcon = 'heroicon-s-clipboard-document-list';
    protected static ?string $navigationGroup = 'Permohonan Uji';

    protected static ?string $label = 'Pengambilan Sampel';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Utama')
                    ->schema([
                        Forms\Components\TextInput::make('kode_sampel')
                            ->label('Kode Sampel')
                            ->disabled()
                            ->default(fn() => SampelPengujian::generateKode()) // Mengisi otomatis kode
                            ->disabled() // Tidak dapat diubah oleh pengguna
                            ->required()
                            ->prefix('SMPL')
                            ->dehydrated()
                            ->unique(ignoreRecord: true),
                        Forms\Components\TextInput::make('permintaan_id')
                            ->label('Id Permintaan Pengujian')
                            ->disabled() // Relasi langsung ke permintaan pengujian
                            ->dehydrated(),
                        Forms\Components\DatePicker::make('tanggal_pengambilan')->label('Tanggal Pengambilan'),
                        Forms\Components\TimePicker::make('waktu_pengambilan')->label('Waktu Pengambilan'),
                        Forms\Components\TextInput::make('petugas_pengambilan')->label('Petugas Pengambilan'),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Detail Lokasi')
                    ->schema([
                        Forms\Components\TextInput::make('kelurahan')->label('Kelurahan'),
                        Forms\Components\TextInput::make('kecamatan')->label('Kecamatan'),
                        Forms\Components\TextInput::make('kota')->label('Kota'),
                        Forms\Components\TextInput::make('titik_koordinat'),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Parameter Sampel')
                    ->schema([
                        // Forms\Components\Select::make('parameter')
                        //     ->label('Parameter Pengujian')
                        //     ->options(fn() => \App\Models\Parameter::pluck('parameter', 'parameter'))
                        //     ->preload()
                        //     ->searchable(),
                        Forms\Components\Select::make('parameter')
                            ->label('Parameter Pengujian')
                            ->options(fn() => \App\Models\Parameter::pluck('parameter', 'parameter')) // Menggunakan parameter sebagai value
                            ->preload()
                            ->searchable()
                            ->reactive() // Pastikan field ini reaktif
                            ->afterStateUpdated(function ($state, $set) {
                                // Ambil data tarif dari parameter yang dipilih
                                $tarif = \App\Models\Parameter::where('parameter', $state)->first()?->tarif ?? 0;
                                $set('tarif', $tarif); // Set nilai tarif berdasarkan parameter
                            }),


                        Forms\Components\TextInput::make('tarif')
                            ->label('Tarif')
                            ->disabled() // Tidak bisa diubah oleh pengguna
                            ->numeric(), // Pastikan tipe numeric

                        Forms\Components\TextInput::make('jumlah_titik')
                            ->label('Jumlah Titik')
                            ->numeric() // Memastikan input adalah angka
                            ->reactive() // Membuatnya reaktif
                            ->required()
                            ->afterStateUpdated(function ($state, $get, $set) {
                                // Hitung total biaya berdasarkan jumlah titik dan tarif
                                $tarif = $get('tarif') ?? 0;
                                $set('total_biaya', $state * $tarif);
                            }),

                        Forms\Components\TextInput::make('total_biaya')
                            ->label('Total Biaya')
                            ->disabled()
                            ->dehydrated() // Tidak bisa diubah oleh pengguna
                            ->numeric(),

                        Forms\Components\TextInput::make('acuan_metode')->label('Acuan Metode'),
                        Forms\Components\TextInput::make('teknik_pengambilan')->label('Teknik Pengambilan'),
                        Forms\Components\TextInput::make('wadah')->label('Wadah'),
                        Forms\Components\TextInput::make('volume_sampel')->label('Volume Sampel'),
                        Forms\Components\TextInput::make('ph')->label('pH'),
                        Forms\Components\TextInput::make('dhl')->label('DHL'),
                        Forms\Components\TextInput::make('suhu_air')->label('Suhu Air'),
                        Forms\Components\TextInput::make('do')->label('DO'),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Kondisi dan Observasi')
                    ->schema([
                        Forms\Components\TextInput::make('warna')->label('Warna'),
                        Forms\Components\TextInput::make('sanity')->label('Sanity'),
                        Forms\Components\TextInput::make('yds')->label('YDS'),
                        Forms\Components\TextInput::make('cuaca')->label('Cuaca'),
                        Forms\Components\TextInput::make('suhu_udara'),
                        Forms\Components\TextInput::make('kuat_arus'),
                        Forms\Components\TextInput::make('debit_air'),
                        Forms\Components\TextInput::make('lab_minyak'),
                        Forms\Components\TextInput::make('musim')->label('Musim'),
                        Forms\Components\TextInput::make('bau')->label('Bau'),
                        Forms\Components\Textarea::make('rincian_kondisi')->label('Rincian Kondisi'),
                    ])
                    ->columns(2),
                Forms\Components\Section::make('Sampel Tidak Diambil')
                    ->schema([
                        Forms\Components\Textarea::make('alasan_sampel_tidak_diambil'),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(
                SampelPengujian::query()
                    ->with('permintaanPengujian') // Eager loading
                    ->whereHas('permintaanPengujian', function ($query) {
                        $query->where('pengambilan_sampel', 'petugas'); // Membandingkan dengan string literal "petugas"
                    })
            )
            ->columns([
                Tables\Columns\TextColumn::make('kode_sampel')->label('Kode Sampel')->searchable(),
                Tables\Columns\TextColumn::make('permintaanPengujian.id')->label('ID Permintaan'),
                Tables\Columns\TextColumn::make('permintaanPengujian.pelanggan.nama_pelanggan')->label('Nama Pelanggan'),
                Tables\Columns\TextColumn::make('tanggal_pengambilan')->label('Tanggal Pengambilan')->date('d M Y'),
                Tables\Columns\TextColumn::make('petugas_pengambilan')->label('Petugas'),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label('Isi Data Sampel'),
                Tables\Actions\ViewAction::make()->label('Lihat Detail')->icon('heroicon-s-clipboard-document-list'),
                Tables\Actions\DeleteAction::make(),
            ])

            ->defaultSort('id', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPengambilanSampels::route('/'),
            'create' => Pages\CreatePengambilanSampel::route('/create'),
            'edit' => Pages\EditPengambilanSampel::route('/{record}/edit'),
        ];
    }


    protected static function beforeUpdate($record, array $data): void
    {
        $request = request();

        // Ambil data form dari request
        $parameter = $request->input('parameter');
        $jumlahTitik = $request->input('jumlah_titik');
        $totalBiaya = $request->input('total_biaya');

        // Lakukan pembaruan di tabel lain
        \App\Models\PermintaanPengujian::where('id', $record->id)->update([
            'parameter' => $parameter,
            'jumlah_titik' => $jumlahTitik,
            'total_biaya' => $totalBiaya,
        ]);
    }




}

