@extends('layout')

@php
    $breadcrumbs = [
            ['title' => 'NASLOVNICA', 'url' => '/'],
            ['title' => '404', 'url' => '']
        ];
@endphp

@section('content')
    <div class="alert alert-danger container p-4 mx-auto mb-96 text-center space-y-4">
        <h2 class="entry-title text-gray-700 text-6xl">404 <i class="fas fa-file"></i></h2>
        <p>Odabrana stranica ne postoji, premještena je ili obrisana. Provjerite da li ste upisali ispravnu adresu. Za povratak na prethodnu stranicu, kliknite gumb Povratak.</p>
        <a href="/" class="inline-block text-2xl p-4 bg-indigo-700 text-white font-semi-bold transition duration-150 hover:bg-indigo-500">POVRATAK NA NASLOVNICU</a>
    </div>
@endsection