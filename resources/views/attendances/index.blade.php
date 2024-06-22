@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Absensi</h1>
    <form action="{{ route('attendances.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="date">Tanggal</label>
            <input type="date" name="date" id="date" class="form-control">
        </div>
        <div class="form-group">
            <label for="check_in">Jam Masuk</label>
            <input type="time" name="check_in" id="check_in" class="form-control">
        </div>
        <div class="form-group">
            <label for="check_out">Jam Keluar</label>
            <input type="time" name="check_out" id="check_out" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Jam Masuk</th>
                <th>Jam Keluar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($attendances as $attendance)
            <tr>
                <td>{{ $attendance->date }}</td>
                <td>{{ $attendance->check_in }}</td>
                <td>{{ $attendance->check_out }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
