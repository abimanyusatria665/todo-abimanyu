@extends('layout.layout')

@section('content')
<div class="container"> 
    <div class="d-flex mt-5 pt-5">
        <div class="col-6">
            <img src="/img/5180199.svg" alt="">
        </div>
        <div class="col-6">
            <form id="create-form" class="text-white" action="{{ route('todo.store') }}" method="post">
                @csrf
                @method('POST')
                <h3>Create Todo</h3>
                
                <fieldset>
                    <label for="">Title</label>
                    <input placeholder="title of todo" type="text" name="title" class="form-control">
                </fieldset>
                <fieldset>
                    <label for="">Target Date</label>
                    <input placeholder="Target Date" type="date" name="date" class="form-control">
                </fieldset>
                <fieldset>
                    <label for="">Description</label>
                    <textarea placeholder="Type your descriptions here..." tabindex="5" name="description" class="form-control"></textarea>
                </fieldset>
                <fieldset>
                    <button name="submit" type="submit" id="contactus-submit">Submit</button>
                </fieldset>
                <fieldset>
                    <a href="/todo/" class="btn-cancel btn-lg btn">Cancel</a>
                </fieldset>
            
            </form>
        </div>
    </div> 
</div>
@endsection