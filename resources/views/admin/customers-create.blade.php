@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">Dodaj novog korisnika</h2>

    <form action="{{ route('admin.customers.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Ime i prezime</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror"
                   id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror"
                   id="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Lozinka</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" 
                   id="password" name="password" required>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Potvrdi lozinku</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Uloga</label>
            <select class="form-control @error('role') is-invalid @enderror" name="role" id="role" required>
                <option value="">-- Izaberi ulogu --</option>
                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="customer" {{ old('role') == 'customer' ? 'selected' : '' }}>Customer</option>
            </select>
            @error('role')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-success">Kreiraj korisnika</button>
            <a href="{{ route('admin.customers.index') }}" class="btn btn-danger">Nazad</a>
        </div>
    </form>
</div>
@endsection
