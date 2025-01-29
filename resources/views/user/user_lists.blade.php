@extends('template')
@section('title', 'Minhas listas')

@section('content')
<br>
<div class="container">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-2xl font-bold text-gray-800">Minhas Listas</h1>
        <a href="{{ route('user.formCreatelist') }}" class="btn btn-success">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
                Criar lista
        </a>
    </div>

    <div class="space-y-4">
        @foreach ($lists as $list)
        <a href="{{ route ('list.details', ['id' => $list->id]) }}" class="success" style="color: #008000">
            <div class="flex justify-between items-center">
                <div>
                    <h2 class="text-lg font-semibold text-gray-800">{{ $list->title }}</h2>
                        <p class="text-sm text-gray-500">Agendada para: {{ $list->scheduled_date}}</p>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</div>
@endsection