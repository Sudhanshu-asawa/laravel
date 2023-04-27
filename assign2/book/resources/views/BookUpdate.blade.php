@extends('homeLayout')
@section('title','Book Update')
@section('content')

    <div class="container mt-5 mb-5 bg-light p-3 w-50 ">
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

        <form class="p-2 mx-auto" method="post" action="{{route('updatePut', $book->id)}}" style="width: 500px">
            <h2 class="mb-5 text-center">Update Book Details</h2>
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleInputTitle" class="form-label">Title</label>
                <input value="{{ old('title', $book->Title) }}" type="text" name="title" class="form-control"
                       id="exampleInputTitle">
                @if ($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif

            </div>
            <div class="mb-3">
                <label for="exampleInputAuthor" class="form-label">Author</label>
                <input value="{{ old('author', $book->Author) }}" type="text" name="author" class="form-control"
                       id="exampleInputAuthor">
                @if ($errors->has('author'))
                    <span class="text-danger">{{ $errors->first('author') }}</span>
                @endif

            </div>
            <div class="mb-3">
                <label for="exampleInputDate" class="form-label">Publication Date</label>
                <input value="{{ old('publication_date', $book->Publication_Date) }}" type="date" name="date"
                       class="form-control" id="exampleInputDate">
                @if ($errors->has('date'))
                    <span class="text-danger">{{ $errors->first('date') }}</span>
                @endif

            </div>
            <div class="mb-3">
                <label for="exampleInputDes" class="form-label">Description</label>
                <input value="{{ old('description', $book->Description) }}" type="text" name="description"
                       class="form-control" id="exampleInputDes">
                @if ($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif

            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
