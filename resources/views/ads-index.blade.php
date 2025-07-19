@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center mt-2 mb-5">{{$selectedCategory->name ?? 'Svi oglasi'}}</h1>
        <form method="GET" action="{{ route('ads.public') }}" class="mb-5">
            <div class="row g-3">
                <div class="col-md-4">
                    <input type="text" name="title" class="form-control" placeholder="Naziv oglasa"
                        value="{{ request('title') }}">
                </div>
                <div class="col-md-4">
                    <input type="text" name="description" class="form-control" placeholder="Opis oglasa"
                        value="{{ request('description') }}">
                </div>
                <div class="col-md-2">
                    <input type="number" name="price_min" class="form-control" placeholder="Cena od"
                        value="{{ request('price_min') }}">
                </div>
                <div class="col-md-2">
                    <input type="number" name="price_max" class="form-control" placeholder="Cena do"
                        value="{{ request('price_max') }}">
                </div>
                <div class="col-md-4">
                    <input type="text" name="location" class="form-control" placeholder="Lokacija"
                        value="{{ request('location') }}">
                </div>
                <div class="col-md-4">
                    <select name="category_id" class="form-select">
                        <option value="">Sve kategorije</option>
                        @foreach($filterCat as $category)
                            <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <select name="sort_by" class="form-select">
                        <option value="">Sortiraj po</option>
                        <option value="price_asc" {{ request('sort_by') == 'price_asc' ? 'selected' : '' }}>Cena rastuće
                        </option>
                        <option value="price_desc" {{ request('sort_by') == 'price_desc' ? 'selected' : '' }}>Cena opadajuće
                        </option>
                        <option value="date_desc" {{ request('sort_by') == 'date_desc' ? 'selected' : '' }}>Najnovije</option>
                        <option value="date_asc" {{ request('sort_by') == 'date_asc' ? 'selected' : '' }}>Najstarije</option>
                    </select>
                </div>
                <div class="col-md-12 d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Pretrazi</button>
                    <a href="{{ route('ads.public') }}" class="btn btn-secondary">Resetuj filtere</a>
                </div>
            </div>
        </form>
        <div class="row row-cols-1 row-cols-md-3 g-4">
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
                            <a href="{{ route('ads.public.show', $ad->id) }}">
                                <h5 class="card-title">{{ $ad->title }}</h5>
                            </a>
                            <p class="text-muted mb-1">
                                Cena: <strong class="text-success">
                                    {{ $ad->price !== null ? number_format($ad->price, 0, ',', '.') . ' RSD' : 'Dogovor' }}
                                </strong>
                            </p>
                            <p class="card-text">{{ Str::limit($ad->description, 100) }}</p>
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
@endsection