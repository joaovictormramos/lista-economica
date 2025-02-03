@extends('template')
@section('title', 'Bem-vindo')

@section('content')
<div class="container">
    <br>
    <div class="min-h-screen bg-gray-50">
        <div class="container mx-auto px-4 py-8">
            <div class="text-center mb-12">
                <h1>Economize em suas compras</h1>
                <p>Crie suas listas e encontre o melhor preço nos mais variados estabelecimentos.</p>
                <a href="{{ route('user.formCreatelist') }}" class="btn btn-success">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#ffffff"><path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z"/></svg>
                    Criar Nova Lista
		</a>
            </div>
        </div>
    </div>
</div>
@endsection
