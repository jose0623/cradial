@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6">Buscador de Programas de Radio</h1>
        <div class="bg-white p-6 rounded-lg shadow">
            @livewire('selects-anidados')
        </div>
    </div>
@endsection