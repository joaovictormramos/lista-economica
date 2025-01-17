@extends('template')
@section('title', 'Minhas listas')

@section('content')
<div class="container">
    <br>
    @foreach($lists as $list)
    <p>{{$list->title}} <strong>-</strong> {{$list->scheduled_date->format('d/m/Y')}}</p>
    @endforeach
    <a class="btn btn-primary" href="{{ route('user.formCreatelist') }}">Criar lista</a>
</div>
@endsection