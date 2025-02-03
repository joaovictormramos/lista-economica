@extends('template')
@section('title', "Nova lista")

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <form action="{{ route('user.createlist') }}" method="post">
                @csrf
                <label for="title">Nome da lista</label>
                <input class="form-control input-lg" type="text" name="title" placeholder="Insira um nome">

                <label for="scheduled_date">Agendamento</label>
                <input class="form-control input-lg" type="date" id="datemin" name="scheduled_date" min="{{ date('Y-m-d') }}">
                
                <input type="hidden" name="userId" value="{{$user->id}}">
        </div>
    </div>
    <div class="row my-4">
        <div class="col">
            <button class="btn btn-primary">Criar</button>
            </form>
            <a class="btn btn-danger" href="{{ route('user.lists', ['id' => $user->id]) }}">Cancelar</a>
        </div>
    </div>
</div>
@endsection