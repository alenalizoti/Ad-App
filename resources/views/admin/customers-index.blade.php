@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">Korisnici</h1>
        <div class="d-flex justify-content-center m-3">
            <a href="{{ route('customers.create') }}" class="btn btn-primary">
                + Dodaj novog korisnika
            </a>
        </div>

         @if(session('success'))
            <div class="alert alert-success text-white">
                {{ session('success') }}
            </div>
        @endif

        <div class="shadow p-3">
            <table class="table table-bordered table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Ime</th>
                        <th>Email</th>
                        <th>Uloga</th>
                        <th>Kreiran</th>
                        <th colspan="2">Akcije</th>
                    </tr>
                    
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>{{ $user->created_at->format('d.m.Y') }}</td>
                            <td>
                                <a href="{{ route('customers.edit', $user->id) }}"
                                    class="btn btn-sm btn-outline-primary">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('customers.destroy', $user->id) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Da li ste sigurni da zelite da obriste ovog korisnika?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Trenutno nema korisnika.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $users->links() }}
        </div>
    </div>
@endsection