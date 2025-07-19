@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="card shadow-sm">
            <div class="row g-0">
                <!-- Slika oglasa -->
                <div class="col-md-5">
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
                </div>

                <!-- Detalji oglasa -->
                <div class="col-md-7">
                    <div class="card-body">
                        <h2 class="card-title">{{ $ad->title }}</h2>
                        <p class="text-muted mb-1">
                            Objavljeno: {{ $ad->created_at->format('d.m.Y') }} |
                            Kategorija: <strong>{{ $ad->category->name }}</strong>
                        </p>

                        <hr>

                        <h4 class="text-primary"><p class="text-muted mb-1">
                                    Cena: <strong class="text-success">
                                        {{ $ad->price !== null ? number_format($ad->price, 0, ',', '.') . ' RSD' : 'Dogovor' }}
                                    </strong>
                                </p></h4>

                        <p class="card-text mt-4">{{ $ad->description }}</p>

                        <hr>

                        <div>
                            <h6>Kontakt:</h6>
                            <p>
                                Ime: {{ $ad->user->name }} <br>
                                Email: <a href="mailto:{{ $ad->user->email }}">{{ $ad->user->email }}</a>
                            </p>
                        </div>

                        <a href="{{ route('ads.public') }}" class="btn btn-outline-secondary mt-3">← Nazad na oglase</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection