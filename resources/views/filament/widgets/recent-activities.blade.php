<x-filament-widgets::widget>
    <x-filament::section>
        <div class="space-y-4">
            <h3 class="text-lg font-semibold">Permohonan Uji Terbaru</h3>
            <ul class="divide-y divide-gray-200">
                {{-- Tambahkan debugging --}}

                @forelse ($this->activities as $activity)
                    <li class="py-2">
                        <div class="text-sm font-medium">
                            {{ $activity->pelanggan->nama_pelanggan ?? 'Pelanggan Tidak Diketahui' }}
                        </div>
                        <div class="text-xs text-gray-500">
                            Status: {{ $activity->status }} - {{ $activity->created_at->format('d M Y H:i') }}
                        </div>
                    </li>
                @empty
                    <p class="text-sm text-gray-500">Tidak ada permohonan uji terbaru.</p>
                @endforelse
            </ul>
        </div>

    </x-filament::section>
</x-filament-widgets::widget>
