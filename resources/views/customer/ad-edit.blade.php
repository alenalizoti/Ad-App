@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">Izmeni oglas</h1>

        <form action="{{ route('customer.ads.update', $ad->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Naziv:</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                    value="{{ old('title', $ad->title) }}" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Opis:</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                    required>{{ old('description', $ad->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Cena:</label>
                <input type="number" class="form-control @error('price') is-invalid @enderror" name="price"
                    value="{{ old('price', $ad->price) }}">
                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="condition" class="form-label">Stanje:</label>
                <select name="condition" class="form-control @error('condition') is-invalid @enderror" required>
                    <option value="novo" {{ old('condition', $ad->condition) == 'novo' ? 'selected' : '' }}>Novo</option>
                    <option value="polovno" {{ old('condition', $ad->condition) == 'polovno' ? 'selected' : '' }}>Polovno
                    </option>
                </select>
                @error('condition')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="contact_phone" class="form-label">Kontakt telefon:</label>
                <input type="number" class="form-control @error('contact_phone') is-invalid @enderror" name="contact_phone"
                    value="{{ old('contact_phone', $ad->contact_phone) }}" required>
                @error('contact_phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="location" class="form-label">Lokacija:</label>
                <input type="text" class="form-control @error('location') is-invalid @enderror" name="location"
                    value="{{ old('location', $ad->location) }}" required>
                @error('location')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Kategorija:</label>
                <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror"
                    required>
                    <option value="">-- Izaberi kategoriju --</option>
                    @php
                        function prikaziHijerarskijski($categories, $selectedId)
                        {
                            foreach ($categories as $category) {
                                $selected = ($selectedId == $category->id) ? 'selected' : '';
                                echo '<option value="' . $category->id . '" ' . $selected . '>' . str_repeat('--', $category->depth) . ' ' . $category->name . '</option>';

                                if (!empty($category->children)) {
                                    prikaziHijerarskijski($category->children, $selectedId);
                                }
                            }
                        }
                    @endphp

                    @php prikaziHijerarskijski($categories, old('category_id', $ad->category_id)); @endphp
                </select>
                @error('category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image_path" class="form-label">Slika oglasa:</label>
                <input type="file" class="form-control @error('image_path') is-invalid @enderror" name="image_path"
                    accept="image/*">
                @error('image_path')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                @if($ad->image_path)
                    <p class="mt-2">Trenutna slika:</p>
                    <img src="{{ asset('storage/' . $ad->image_path) }}" alt="Slika oglasa" style="width: 200px; height: 200px;">
                @endif
            </div>

            <div class="d-flex justify-content-center gap-2">
                <button type="submit" class="btn btn-success">Sačuvaj izmene</button>
                <a href="{{ route('customer.profile') }}" class="btn btn-danger">Nazad</a>
            </div>
        </form>
    </div>

@endsection