@extends('layout')


@php
    $breadcrumbs = [
            ['title' => 'NASLOVNICA', 'url' => '/'],
            ['title' => 'KONTAKT', 'url' => '']
        ];
@endphp

@section('content')

@include('components.kontakt')
    
@endsection