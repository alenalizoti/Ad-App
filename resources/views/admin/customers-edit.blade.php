@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">Izmeni korisnika</h2>

    <form action="{{ route('admin.customers.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Ime i prezime</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror"
                   id="name" name="name" value="{{ old('name', $user->name) }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control"
                   id="email" name="email" value="{{ old('email', $user->email) }}" readonly>
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Uloga</label>
            <select class="form-control @error('role') is-invalid @enderror" name="role" id="role" required>
                <option value="">-- Izaberi ulogu --</option>
                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="customer" {{ old('role', $user->role) == 'customer' ? 'selected' : '' }}>Customer</option>
            </select>
            @error('role')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex gap-3">
            <button type="submit" class="btn btn-success">Sačuvaj izmene</button>
            <a href="{{ route('admin.customers.index') }}" class="btn btn-danger">Nazad</a>
        </div>
    </form>
</div>
@endsection
