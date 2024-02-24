@extends('layouts.main')

@section('content')
    <section class="first-section p-3 m-3">
        <h1>Riwayat Log</h1>
        <hr>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">oleh</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($logs as $log)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $log->log_username }}</td>
                        <td>{{ $log->log_keterangan }}</td>
                        <td>{{ $log->log_created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection
