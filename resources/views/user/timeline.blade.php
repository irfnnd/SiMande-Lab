@extends('layout')

@section('content')
<section id="content">
    <div class="container content-wrap pt-5 pb-5">
        <h3>Riwayat Status - Permintaan #{{ $permintaan->id }}</h3>
        <div class="timeline">
            @foreach ($history as $item)
                <div class="timeline-item">
                    <span class="badge bg-primary">{{ $item['status'] }}</span>
                    <p class="text-muted">{{ \Carbon\Carbon::parse($item['updated_at'])->format('d M Y H:i') }}</p>
                </div>
            @endforeach
        </div>
        <h5>Status Saat Ini: <span class="badge bg-success">{{ $permintaan->status }}</span></h5>
    </div>
</section>
@endsection
