<?php
namespace App\Filament\Resources;

use App\Filament\Resources\PengambilanSampelResource\Pages;
use App\Filament\Resources\PengambilanSampelResource\RelationManagers;
use App\Models\SampelPengujian;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Section;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;

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
                            // ->default(fn() => SampelPengujian::generateKode()) // Mengisi otomatis kode
                            ->disabled() // Tidak dapat diubah oleh pengguna
                            ->required()
                            ->prefix('SMPL')
                            ->dehydrated()
                            ->columnSpan(2)
                            ->unique(ignoreRecord: true),
                        Forms\Components\DatePicker::make('tanggal_pengambilan')->label('Tanggal Pengambilan')->columnSpan(1),
                        Forms\Components\TimePicker::make('waktu_pengambilan')->label('Waktu Pengambilan')->columnSpan(1),
                        Forms\Components\TextInput::make('petugas_pengambilan')
                            ->label('Petugas Pengambilan')
                            ->columnSpan(2),
                    ])
                    ->columns(6),

                Forms\Components\Section::make('Detail Lokasi')
                    ->schema([
                        // Pilihan Provinsi
                        Select::make('provinsi')
                            ->label('Provinsi')
                            ->options(fn() => Province::pluck('name', 'id'))
                            ->searchable()
                            ->reactive()
                            ->afterStateUpdated(fn($state, callable $set) => $set('kota', null))
                            ->dehydrateStateUsing(fn($state) => Province::find($state)?->name) // Simpan Nama, bukan ID
                            ->required(),

                        // Pilihan Kota/Kabupaten
                        Select::make('kota')
                            ->label('Kota/Kabupaten')
                            ->options(fn($get) => Regency::where('province_id', $get('provinsi'))->pluck('name', 'id'))
                            ->searchable()
                            ->reactive()
                            ->afterStateUpdated(fn($state, callable $set) => $set('kecamatan', null))
                            ->dehydrateStateUsing(fn($state) => Regency::find($state)?->name)
                            ->required(),

                        // Pilihan Kecamatan
                        Select::make('kecamatan')
                            ->label('Kecamatan')
                            ->options(fn($get) => District::where('regency_id', $get('kota'))->pluck('name', 'id'))
                            ->searchable()
                            ->reactive()
                            ->afterStateUpdated(fn($state, callable $set) => $set('kelurahan', null))
                            ->dehydrateStateUsing(fn($state) => District::find($state)?->name)
                            ->required(),

                        // Pilihan Kelurahan
                        Select::make('kelurahan')
                            ->label('Kelurahan')
                            ->options(fn($get) => Village::where('district_id', $get('kecamatan'))->pluck('name', 'id'))
                            ->searchable()
                            ->reactive()
                            ->dehydrateStateUsing(fn($state) => Village::find($state)?->name)
                            ->required(),

                        // Titik Koordinat (Opsional)
                        TextInput::make('titik_koordinat')->label('Titik Koordinat'),
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



                        Forms\Components\TextInput::make('acuan_metode')->label('Acuan Metode'),
                        Forms\Components\TextInput::make('teknik_pengambilan')->label('Teknik Pengambilan'),
                        Forms\Components\TextInput::make('wadah')->label('Wadah'),
                        Forms\Components\TextInput::make('volume_sampel')->label('Volume Sampel'),
                        Forms\Components\TextInput::make('ph')->label('pH'),
                        Forms\Components\TextInput::make('dhl')->label('DHL'),
                        Forms\Components\TextInput::make('suhu_air')->label('Suhu Air'),
                        Forms\Components\TextInput::make('do')->label('DO'),
                        Forms\Components\TextInput::make('tarif')
                            ->label('Tarif')
                            ->disabled() // Tidak bisa diubah oleh pengguna
                            ->numeric(), // Pastikan tipe numeric

                        Forms\Components\TextInput::make('jumlah_titik')
                            ->label('Jumlah Titik')
                            ->numeric() // Memastikan input adalah angka
                            ->reactive() // Membuatnya reaktif
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
                    ])
                    ->columns(4),

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
                        Forms\Components\Textarea::make('rincian_kondisi')->label('Rincian Kondisi')->columnSpan(2),
                    ])
                    ->columns(6),
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
                        $query->where('pengambilan_sampel', 'petugas')
                            // ->whereNull('parameter')
                            ->whereNull('tanggal_pengambilan')
                            // ->whereNull('petugas_pengambilan')
                            // ->whereNull('waktu_pengambilan')
                            // ->whereNull('tanggal_pengambilan')
                        ; // Membandingkan dengan string literal "petugas"
                    })
            )
            ->columns([
                Tables\Columns\TextColumn::make('rowIndex')
                    ->label('No')
                    ->rowIndex(),
                Tables\Columns\TextColumn::make('kode_sampel')->label('Kode Sampel')->searchable(),
                Tables\Columns\TextColumn::make('permintaanPengujian.pelanggan.user.name')->label('Nama Pelanggan'),
                Tables\Columns\TextColumn::make('tanggal_pengambilan')->label('Tanggal Pengambilan')->date('d M Y')->placeholder('Belum Diisi'),
                Tables\Columns\TextColumn::make('petugas_pengambilan')->label('Petugas')->placeholder('Belum Diisi'),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label('Isi Data Sampel'),
                Tables\Actions\ViewAction::make()->label('Lihat Detail')->icon('heroicon-s-clipboard-document-list'),
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

