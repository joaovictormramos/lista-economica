@extends('template')
@section('title', 'Bem-vindo')

@section('content')
<div class="container">
    @foreach($sections as $section)
    <h3>{{$section->section_name}}</h3>
    <section class="layoutgrid">
        @foreach($section->products as $product)
        <div class="panel">
            <img src="/storage/images/{{$product->product_img}}" alt="">
            <p>{{$product->product_name}} <strong>{{$product->brand->brand_name}}</strong> {{$product->product_measurement}} {{$product->product_unity_measurement}}</p>
            <div class="dropdown">
                <button class="btn btn-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">Adicionar à lista</button>
                <!--Dropdown contendo as listas do usuário. As listas estão sendo carregas pelo método boot() do AppServiceProvider-->
                <ul class="dropdown-menu dropdown-menu-dark">
                    <li>
                        <!--DIV DA LISTAS (iterado pelo foreach)-->
                        @foreach($lists as $list)
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="mx-1">
                                <input class="form-check-input" type="checkbox" name="" id="{{$product->id}}">    
                                <label for="{{$product->id}}" onclick="event.stopPropagation();">{{$list->title}}</label>
                            </div>
                            <span class="">
                                <button class="btn btn-link btn-sm" type="button" data-bs-toggle="offcanvas" data-bs-target="#{{$list->id}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#D9D9D9"><path d="M240-80q-50 0-85-35t-35-85v-120h120v-560l60 60 60-60 60 60 60-60 60 60 60-60 60 60 60-60 60 60 60-60v680q0 50-35 85t-85 35H240Zm480-80q17 0 28.5-11.5T760-200v-560H320v440h360v120q0 17 11.5 28.5T720-160ZM360-600v-80h240v80H360Zm0 120v-80h240v80H360Zm320-120q-17 0-28.5-11.5T640-640q0-17 11.5-28.5T680-680q17 0 28.5 11.5T720-640q0 17-11.5 28.5T680-600Zm0 120q-17 0-28.5-11.5T640-520q0-17 11.5-28.5T680-560q17 0 28.5 11.5T720-520q0 17-11.5 28.5T680-480ZM240-160h360v-80H200v40q0 17 11.5 28.5T240-160Zm-40 0v-80 80Z"/></svg>
                                </button>
                            </span>
                        </div>
                        @endforeach
                        <!--DIV DA LISTAS (iterado pelo foreach)-->
                    </li>
                        <!--Botão para confirmar o fim da adição do produto às listas selecionadas-->
                    <div class="d-flex justify-content-center align-items-center">
                        <button class="btn btn-link">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#75FB4C"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm4.59-12.42L10 14.17l-2.59-2.58L6 13l4 4 8-8z"/></svg>
                        </button>
                    <!--FIM DO BOTÃO-->
                    </div>
                    <!--FIM DO BOTÃO-->
                </ul>
            <!--FIM DO DROPDOWN-->
            </div>
            <!--FIM DO DROPDOWN-->
            @can('isSuperadmin')
            <a href="{{ route('admin.editproduct', ['id' => $product->id]) }}" class="btn btn-warning admbtn">Editar</a>
            <a href="{{ route('admin.deleteproduct', ['id' => $product->id]) }}" class="btn btn-danger admbtn">Excluir</a>
            @endcan
        </div>
        @endforeach
    </section>
    @endforeach
</div>
@endsection