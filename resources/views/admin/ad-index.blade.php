@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">Oglasi</h1>
        <div class="d-flex justify-content-center m-3">
            <a href="{{ route('admin.ads.create') }}" class="btn btn-primary">
                + Dodaj novi oglas
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
                        <th>Naslov</th>
                        <th>Cena</th>
                        <th>Status</th>
                        <th>Lokacija</th>
                        <th>Vlasnik</th>
                        <th>Kategorija</th>
                        <th colspan="2">Opcije</th>
                    </tr>

                </thead>
                <tbody>
                    @forelse($ads as $a)
                        <tr>
                            <td>{{ $a->title }}</td>
                            <td>{{ $a->price ? $a->price . ' RSD' : 'Dogovor' }}</td>
                            <td>{{ $a->condition}}</td>
                            <td>{{ $a->location }}</td>
                            <td>{{ $a->user->name }}</td>
                            <td>{{ $a->category->name }}</td>
                            <td>
                                <a href="{{ route('admin.ads.edit', $a->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('admin.ads.destroy', $a->id) }}" method="POST" class="d-inline"
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
            {{ $ads->links() }}
        </div>
    </div>

@endsection