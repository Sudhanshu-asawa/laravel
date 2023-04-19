<html>
<head>
    <title>Laravel 8 Form Example Tutorial</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header text-center font-weight-bold">
            Assignment 1
        </div>
        <div class="card-body">
            <form name="form" id="form" method="post" action="{{url('store-form')}}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" id="title" name="title" class="form-control" required="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea name="description" class="form-control" required=""></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

    </div>
        @if(count($task)>0)
            <table  border = "1" class="table" >
                <thead class="thead-dark">
                <tr >
                    <td scope="col" >Id</td>
                    <td scope="col">Title</td>
                    <td scope="col">Description</td>
                </tr>
                </thead>
                @foreach ($task as $user)
                    <tbody>
                    <tr>
                        <td scope="row">{{ $user->id }}</td>
                        <td>{{ $user->title }}</td>
                        <td>{{ $user->description }}</td>
                    </tr>

                    @endforeach
                    </tbody>
            </table>
        @endif
</div>

</body>
</html>
