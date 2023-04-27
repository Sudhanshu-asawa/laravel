@extends('layout')
@section('title','SignUp')
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
        <form action="{{route('signup.post')}}" method="post" class="ms-auto mt-auto me-auto bg-light p-5"
              style="width: 500px">
            <h3 class="pb-4">SignUp</h3>
            @csrf
            <div class="mb-3">
                <label for="exampleInputName1" class="form-label">Full Name</label>
                <input type="name" name="name" class="form-control" id="exampleInputName1">
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="text" name="email" class="form-control" id="exampleInputEmail1"
                       aria-describedby="emailHelp">
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection
