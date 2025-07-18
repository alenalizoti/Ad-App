@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">Kategorije</h1>

        <div class="d-flex justify-content-center m-3">
            <a href="{{ route('categories.create') }}" class="btn btn-primary">
                + Dodaj novu kategoriju
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
                        <th>Ime</th>
                        <th>Nadredjena kategorija</th>
                        <th>Kreirana</th>
                        <th colspan="2">Opcije</th>
                    </tr>

                </thead>
                <tbody>
                    @forelse($categories as $c)
                        <tr>
                            <td>{{ $c->name }}</td>
                            <td>{{ $c->parent?->name ?? '-' }}</td>
                            <td>{{ $c->created_at->format('d.m.Y') }}</td>
                            <td>
                                <a href="{{ route('categories.edit', $c) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('categories.destroy', $c->id) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Da li ste sigurni da zelite da obriste kategoriju?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Trenutno nema kategorija.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $categories->links() }}
        </div>
    </div>
@endsection