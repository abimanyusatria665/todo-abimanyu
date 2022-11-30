@extends('layout.layout')

@section('content')
<div class="container-fluid">
    <div class="container">
        <div class="d-flex flex-wrap mt-5 pt-5">
            <div class="wrapper text-white">
                @if(Session::has('notAllowed'))
                    <div class="alert alert-danger col-12x">
                        {{ Session::get('notAllowed') }}
                    </div>
                @endif
                @if(Session::has('successDelete'))
                    <div class="alert alert-danger col-12x">
                        {{ Session::get('successDelete') }}
                    </div>
                @endif
                @if(Session::has('berhasil'))
                    <div class="alert alert-success col-12x">
                        {{ Session::get('berhasil') }}
                    </div>
                @endif
                @if(Session::has('successAdd'))
                    <div class="alert alert-success col-12x">
                        {{ Session::get('successAdd') }}
                    </div>
                @endif
                <div class="d-flex align-items-start justify-content-between">
                    <div class="d-flex flex-column">
                        <div class="h5">My Todo's</div>
                        <p class="text-white text-justify">
                            Here's a list of activities you have to do
                        </p>
                        <br>
                        <span>
                            <a href="{{route('todo.create')}}" class="text-create">Create</a> | <a href="{{route('todo.complated')}}" class="text-complated">Complated</a>
                        </span>
                    </div>
                    <div class="info btn ml-md-4 ml-0">
                        <span class="fas fa-info text-white" title="Info"></span>
                    </div>
                </div>
                <div class="work border-bottom pt-3">
                    <div class="d-flex align-items-center py-2 mt-1 justify-content-between">
                        <div>
                            <span class="text-white fas fa-comment btn"></span>
                            {{ !is_null($Galleries) ? count($Galleries) : '-' }} Complated Todos
                        </div>
                        <button class="btn bg-white text-muted fas fa-angle-down" type="button" data-toggle="collapse"
                            data-target="#comments" aria-expanded="false" aria-controls="comments"></button>
                    </div>
                </div>
                    <div id="comments" class="mt-1 ongoing">
                        @foreach ($Galleries as $todo)
                            <div class="comment d-flex align-items-start justify-content-between">
                                <div class="mr-2">
                                    <form action="/todo/complated/{{ $todo->id }}" method="post">
                                    @csrf
                                    @method('patch')
                                    <button type="submit" class="fas fa-check" style="background: #B9E0FF;  padding: 8px !important"></button>
                                    </form>
                                </div>
                                <div class="d-flex flex-column w-75">
                                    <b class="text-justify">
                                    {{ $todo->title }}
                                    </b>
                                    <p class="text-white">{{ $todo->status ? 'Complated' : 'Ongoing' }} <span class="date">{{ $todo->date }}</span></p>
                                </div>
                                <div class="ml-auto">
                                    <a href="{{ route('todo.edit', $todo->id) }}">
                                        <form action="{{ route('todo.delete', $todo->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="fas fa-trash btn" ></button>
                                        </form>
                                        <span class="fas fa-arrow-right btn"></span>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
            </div>
            <div class="col-6 mt-5">
                <img src="/img/3047845.svg" alt="">
            </div>
        </div>
    </div>
</div>
@endsection