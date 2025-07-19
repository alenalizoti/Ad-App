@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-4 justify-content-center">
            <div class="col-md-5 mb-4">
                <div class="card shadow text-center">
                    <div class="card-body">
                        <h5 class="card-title text-muted">{{ Auth::user()->name }}</h5>
                        <p class=" fw-bold text-success">Email: {{ Auth::user()->email }}</p>
                        <p class=" fw-bold text-success">Registrovan: {{ Auth::user()->created_at->format('d.m.Y.') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-5 mb-4">
                <div class="card shadow text-center">
                    <div class="card-body">
                        <h5 class="card-title text-muted">Ukupno oglasa</h5>
                        <p class="display-4 fw-bold text-success">{{ $totalAds }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="ads">
            <h2 class="text-center mt-4 mb-3">Moji oglasi</h2>
            <div class="d-flex justify-content-center mb-3">
                <a class="btn btn-primary" href="{{ route('customer.ads.create') }}">+ Kreiraj oglas</a>
            </div>
            @if(session('success'))
                <div class="alert alert-success text-white">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row row-cols-1 row-cols-md-2 g-4">
                @forelse ($ads as $ad)
                    <div class="col">
                        <div class="card h-100 shadow-sm">
                            @php
                                $imagePath = 'storage/' . $ad->image_path;
                            @endphp

                            @if($ad->image_path && file_exists(public_path($imagePath)))
                                <img src="{{ asset($imagePath) }}" class="card-img-top" alt="{{ $ad->title }}"
                                    style="height: 200px; object-fit: cover;">
                            @else
                                <img src="{{ asset('images/default.png') }}" class="card-img-top" alt="Default image"
                                    style="height: 200px; object-fit: cover;">
                            @endif


                            <div class="card-body">
                                <h5 class="card-title">{{ $ad->title }}</h5>
                                <p class="text-muted mb-1">
                                    Cena: <strong class="text-success">
                                        {{ $ad->price !== null ? number_format($ad->price, 0, ',', '.') . ' RSD' : 'Dogovor' }}
                                    </strong>
                                </p>
                                <p class="card-text">{{ Str::limit($ad->description, 100) }}</p>
                            </div>

                            <div class="card-footer d-flex justify-content-between">
                                <a href="{{ route('customer.ads.edit', $ad->id) }}"
                                    class="btn btn-sm btn-outline-primary">Izmeni</a>

                                <form action="{{ route('customer.ads.destroy', $ad->id) }}" method="POST"
                                    onsubmit="return confirm('Da li ste sigurni da zelite da obrisete oglas?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Obrisi</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-muted">Nemate nijedan oglas.</p>
                @endforelse
                <div class="mt-4">
                    {{ $ads->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection