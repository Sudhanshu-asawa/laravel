@extends('layout')
@section('title','Login')
@section('content')
    <div class="container">
        <div class="mt-5">
            @if(session()->has('error'))
                <div class="alert alert-danger">
                    {{session('error')}}
                </div>
            @endif
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
        </div>
        <form action="{{route('login.post')}}" METHOD="post" class="ms-auto mt-auto me-auto bg-light p-5" style="width: 500px">
            @csrf
            <h3 class="pb-4">Login</h3>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                       aria-describedby="emailHelp">
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection
