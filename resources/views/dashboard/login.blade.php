@extends('layouts.form');
   @section('content')


            <div class="col-6 bg-1 rounded-4 pt-4">
              <div class="col-8 offset-2 mt-5 pt-5 mb-5 pb-5">
              <form action="/login" method="post">
                @csrf
                <h1 class="title-1 text-shadow">Login</h1>
                <h3 class="mt-3">Username / Email</h3>
                <input
                  type="text"
                  name="username"
                  id=""
                  class="form-control _shadow"
                />
                <h3 class="mt-3">Password</h3>
                <input type="password" name="password" id="" class="form-control _shadow" />
                <button class="btn btn-success mt-4 _shadow _btn px-5" type="submit">
                  Login
                </button>
              </div>
            </div>
            <div class="col-6 bg-5 rounded-4 mt-5 mb-5">
              <img src="../img/Group 41.png" alt="" class="col-8 offset-2" />
            </div>
            </form>
   @endsection


