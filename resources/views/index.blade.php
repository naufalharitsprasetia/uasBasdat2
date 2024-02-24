@extends('layouts.main')

@section('content')
    <section class="first-section p-3 m-3">
        <h1>Sistem Kasir Toko Bangunan Sinar Jaya</h1>
        <hr>
        @if (session()->has('success'))
            <div class="alert alert-success col-lg-12" role="alert">
                {{ session('success') }}
            </div>
        @endif
    </section>
@endsection
