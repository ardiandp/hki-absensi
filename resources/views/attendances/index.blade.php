@extends('adminlte::page')

@section('title', 'Daftar Absensi')

@section('content_header')
    <h1>Daftar Absensi</h1>
@stop

@section('content')
<div class="container">
    <form action="{{ route('attendances.checkin') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="date">Tanggal</label>
            <input type="date" name="date" value="{{ date('Y-m-d') }}" id="date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Absen Masuk</button>
    </form>
    <form action="{{ route('attendances.checkout') }}"  method="POST" class="mt-3">
        @csrf
        <div class="form-group">
            <label for="date">Tanggal</label>
            <input type="date" name="date" id="date" value="{{ date('Y-m-d') }}" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-secondary">Absen Keluar</button>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Jam Masuk</th>
                <th>Jam Keluar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($attendances as $attendance)
            <tr>
                <td>{{ $attendance->date }}</td>
                <td>{{ $attendance->check_in }}</td>
                <td>{{ $attendance->check_out ?? '-' }}</td>
                <td>
                    @if(is_null($attendance->check_out))
                    <form action="{{ route('attendances.checkout', $attendance->id) }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-secondary">Check-Out</button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
