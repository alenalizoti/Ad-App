@extends('layouts.app')

@section('content')
<div class="conatiner">
    <h1 class="text-center">Kreirajte kategoriju</h1>

    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf

         <div class="mb-3">
            <label for="name" class="form-label">Ime kategorije</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror"
                   id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="parent_id" class="form-label">Nadredjena kategorija</label>
            <select class="form-control @error('parent_id') is-invalid @enderror" name="parent_id" id="parent_id">
                <option value="">-- Izaberi kategoriju --</option>
                @foreach ($categories as $c)
                <option value="{{ $c->id }}" {{ old('parent_id') == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
                @endforeach
            </select>
            @error('parent_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex gap-3">
            <button type="submit" class="btn btn-success">Kreiraj</button>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-danger">Nazad</a>
        </div>
    </form>
</div>


@endsection