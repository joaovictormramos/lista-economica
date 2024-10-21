@extends('template')
@section('title', 'Minhas listas')

@section('content')
<div class="container">
    @foreach($lists as $list)
    <p>{{$list->title}} <strong>Agendamento</strong> {{$list->scheduled_date->format('d/m/Y')}}</p>
    @endforeach
    <a class="btn btn-primary" href="{{ route('user.formCreatelist') }}">Criar lista</a>
</div>
@endsection