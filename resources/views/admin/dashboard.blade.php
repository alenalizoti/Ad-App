@extends('layouts.app')

@section('content')
    <div class="p-6 bg-gray-100 min-h-screen">
        <h1 class="text-3xl font-bold mb-8 text-gray-800">Admin Dashboard</h1>


        <div class="row mt-4">
            <div class="col-md-4 mb-4">
                <div class="card shadow text-center">
                    <div class="card-body">
                        <h5 class="card-title text-muted">Ukupno korisnika</h5>
                        <p class="display-4 fw-bold text-primary">{{ $totalUsers }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow text-center">
                    <div class="card-body">
                        <h5 class="card-title text-muted">Ukupno oglasa</h5>
                        <p class="display-4 fw-bold text-success">{{ $totalAds }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow text-center">
                    <div class="card-body">
                        <h5 class="card-title text-muted">Ukupno kategorija</h5>
                        <p class="display-4 fw-bold text-warning">{{ $totalCategories }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white shadow rounded p-4 mb-4 border">
            <h2 class="h4 mb-3 text-dark">Najnoviji oglasi</h2>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-light text-uppercase">
                        <tr>
                            <th>Naslov</th>
                            <th>Korisnik</th>
                            <th>Kategorija</th>
                            <th>Datum</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentAds as $ad)
                            <tr>
                                <td>{{ $ad->title }}</td>
                                <td>{{ $ad->user->name }}</td>
                                <td>{{ $ad->category->name}}</td>
                                <td>{{ $ad->created_at->format('d.m.Y') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-3">Trenutno nijedan oglas nije aktivan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="bg-white shadow rounded p-4 border mb-4">
            <h2 class="h4 mb-3 text-dark">Novi korisnici</h2>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-light text-uppercase">
                        <tr>
                            <th>Ime</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Datum registracije</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentUsers as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td>{{ $user->created_at->format('d.m.Y') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center py-3">Trenutno nema novih korisnika.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

@endsection