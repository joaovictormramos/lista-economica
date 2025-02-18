@extends('template')
@section('title', 'Minhas listas')

@section('content')
<br>
<div class="container">
    <div class="flex justify-between items-center mb-8 mb">
        <h1 class="text-2xl font-bold text-gray-800">Minhas Listas</h1>
        <a href="{{ route('user.formCreatelist') }}" class="btn btn-success mb-2">
            Criar lista
        </a>
    </div>

    <div class="space-y-4">
        <table class="table border text-center">
            <thead>
                <tr>
                    <th>Lista</th>
                    <th>Data de agendamento</th>
                    <th>Total</th>
                    <th>Estabelecimento</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lists as $list)
                <tr>
                    <td><a href="{{ route ('list.details', ['id' => $list->id]) }}">{{ $list->title }}</a></td>
                    <td>{{ date( 'd/m/Y' , strtotime($list->scheduled_date))}}</td>
                    <td>R$ {{ number_format($list->total, 2, ',') }}</td>
                    <td>{{ $list->store_name }}</td>
                    <td>
                        <a href="" class="btn btn-dark">
                            <i class="bi bi-pencil-square"></i>
                        </a>

			<a href="#" onclick="event.preventDefault(); if (confirm('Tem certeza que deseja excluir?')) { document.getElementById('delete-form-{{ $list->id }}').submit(); }" class="btn btn-danger">
                              <i class="bi bi-trash3"></i>
			</a>
                        <form id="delete-form-{{ $list->id }}" action="{{ route('list.delete', $list->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
