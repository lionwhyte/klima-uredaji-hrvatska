@extends('layout')
@section('content')

<ul class="breadcrumb flex justify-center sm:text-2xl text-gray-500 font-semibold text-center space-x-4 my-4">
    <li class="">
        <a href="/kosarica" class="text-indigo-700">Pregled košarice</a>
    </li>
    <li class="self-center">
        <i class="fa-solid fa-angle-right"></i>
    </li>
    <li class="">
        <a href="/checkout" class="transition duration-150 hover:text-indigo-700">Podaci za račun i dostavu</a>
    </li>
    <li class="self-center">
        <i class="fa-solid fa-angle-right"></i>
    </li>
    <li class="">
        <span class="cursor-default">Potvrda narudžbe</span>
    </li>
</ul>

<livewire:cart />

@endsection