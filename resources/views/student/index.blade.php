<!DOCTYPE html>
<html>
<head>
    <title>Laravel 8|7 Datatables Tutorial</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4" style="text-align: center">Laravel 8 CRUD</h2>
    <div class="row">
        <div class="col-sm-2"> <a href="{{route('students.create')}}" class="btn btn-success">Add Student</a>
        </div>
        <div class="col-sm-8"> @if(session()->has('message'))
                <p class="text-center mb-0 font-weight-bold  alert-{{session('type')}}">
                    {{session('message')}}
                </p>
            @endif
        </div>

    </div>
    <table class="table table-bordered yajra-datatable ">
        <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Username</th>
            <th>Phone</th>
            <th>DOB</th>
            <th width="12%">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($students as $student)
            <tr>
                <td>{{$student->id}}</td>
                <td>{{$student->name}}</td>
                <td>{{$student->email}}</td>
                <td>{{$student->username}}</td>
                <td>{{$student->phone}}</td>
                <td>{{$student->dob}}</td>
                <td>
                    <a class="btn btn-sm btn-info" href="{{route('students.edit', $student->id)}}">Edit</a>

                    <form action="{{ route('students.destroy',$student->id ) }}" method="POST" onsubmit="return confirm('{{ 'Are you sure to delete?' }}');" style="display: inline-block;">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button class="btn btn-danger btn-sm text-white" title="Delete" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $(function () {

       $('.yajra-datatable').DataTable({
            processing: true,
            serverSide: false,

        });

    });
</script>
</html>
