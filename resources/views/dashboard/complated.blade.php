@extends('layout.layout')

@section('content')
<div class="container">
    @if(Session::has('Done'))
       <div class="alert alert-success">
        {{ Session::get('Done') }}
       </div>
    @endif
    <div class="d-flex mt-5 pt-5">
        <div class="wrapper col-5 text-white">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex flex-column">
                    <div class="h5">My Complated Todo's</div>
                    <p class=" text-justify">
                        Here's a list of activities you have done
                        <br>
                        <a href="/todo/" class="text-complated">Back</a>
                    </p>
                </div>
                <div class="info btn align-items-center">
                    <span class="fa-solid fa-check py-3 px-3" title="complated"></span>
                </div>
            </div>
            <div class="work border-bottom pt-3">
                <div class="d-flex align-items-center py-2 mt-1">
                    <div>
                        <span class="text-white fas fa-comment btn"></span>
                    </div>
                    <div class="text-white me-3">{{ !is_null($Galleries) ? count($Galleries) : '-' }} Complated Todos</div>
                    <button class="ml-auto btn bg-white text-muted fas fa-angle-down" type="button" data-toggle="collapse"
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
        <div class="col-6 offset-1">
            <img src="/img/7495400.svg" alt="">
        </div>
    </div>
</div>
@endsection