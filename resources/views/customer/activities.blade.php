@extends('layouts.app')


@section('content')
    <div class="container">
        <h1 class="text-center">Istorija aktivnosti</h1>
        <div class="shadow p-3">
            <table class="table table-bordered table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Akcija</th>
                        <th>Opis</th>
                        <th>Vreme</th>
                    </tr>

                </thead>
                <tbody>
                    @forelse($activities as $a)
                        <tr>
                            <td>{{ $a->action }}</td>
                            <td>{{ $a->description}}</td>
                            <td>{{ $a->created_at->format('d.m.Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Trenutno nemate aktivnosti.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
@endsection