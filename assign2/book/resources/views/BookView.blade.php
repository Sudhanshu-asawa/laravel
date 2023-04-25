@extends('homeLayout')

@section('title','Book Data')
@section('content')

    <div class="container mt-4">
        <h3 class="pb-4">Books Details</h3>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Tittle</th>
                <th scope="col">Author</th>
                <th scope="col">Publication Date</th>
                <th scope="col">Description</th>
                <th scope="col">Operation</th>
            </tr>
            </thead>
            <tbody>
            @foreach($book as $books)
                <tr>
                    <td>{{$books->Title}}</td>
                    <td>{{$books->Author}}</td>
                    <td>{{$books->Publication_Date}}</td>
                    <td>{{$books->Description}}</td>
                    <td>
                        <button class="btn btn-outline-secondary btn-light"><a class="text-decoration-none text-secondary" href="{{route('update',$books)}}"> Edit</a></button>
                        <form method="POST" action="{{ route('BookDelete', $books) }}" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Data would be deleted permanently')" class="btn btn-light btn-outline-secondary">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach


            </tbody>
        </table>

        <div>
            {{$book->links()}}
        </div>
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
    </div>

@endsection

