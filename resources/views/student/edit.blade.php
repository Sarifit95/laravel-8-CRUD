<!DOCTYPE html>
<html>
<head>
    <title>Laravel 8|7 Datatables Tutorial</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
   </head>
<body>

<div class="container mt-5" style="box-shadow: 5px 5px blanchedalmond; border: 2px solid blanchedalmond; border-radius: 20px ">
    <h2 class="mb-4">Edit Student</h2>

    <form class="form-horizontal"  action="{{ route('students.update', $student->id) }} " method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')
        <div class="form-group row">

            <label class="control-label col-sm-2" for="name">Name</label>
            <div class="col-sm-4">
                <input  type="text" id="name" name="name"
                        class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                        value="{{ $student->name ??  old('name') }}">
                @if($errors->has('name'))
                    <em class="invalid-feedback" role="alert">
                        {{ $errors->first('name') }}
                    </em>
                @endif
            </div>


            <label class="control-label col-sm-2" for="email" >  Email</label>
            <div class="col-sm-4">
                <input type="email"  id="email" name="email"
                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                       value="{{$student->email ?? old('email')}}">

                @if($errors->has('email'))
                    <em class="invalid-feedback" role="alert">
                        {{ $errors->first('email') }}
                    </em>
                @endif
            </div>




        </div>

        <div class="form-group row">

            <label class="control-label col-sm-2" for="username">Username</label>
            <div class="col-sm-4">
                <input  type="text" id="username" name="username"
                        class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                        value="{{$student->username ?? old('username') }}">
                @if($errors->has('username'))
                    <em class="invalid-feedback" role="alert">
                        {{ $errors->first('username') }}
                    </em>
                @endif
            </div>


            <label class="control-label col-sm-2" for="phone" >  Phone</label>
            <div class="col-sm-4">
                <input type="text" step="any" id="phone" name="phone"
                       class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                       value="{{ $student->phone ?? old('phone')}}">

                @if($errors->has('phone'))
                    <em class="invalid-feedback" role="alert">
                        {{ $errors->first('phone') }}
                    </em>
                @endif
            </div>




        </div>


        <div class="form-group row">

            <label class="control-label col-sm-2" for="bdate">Date of Birth</label>
            <div class="col-sm-4">
                <input  type="date" id="bdate" name="bdate"
                        class="form-control{{ $errors->has('bdate') ? ' is-invalid' : '' }}"
                        value="{{$student->dob ?? old('bdate') }}">
                @if($errors->has('bdate'))
                    <em class="invalid-feedback" role="alert">
                        {{ $errors->first('bdate') }}
                    </em>
                @endif
            </div>







        </div>






        <div class="form-group row">
            <div class="offset-sm-2">
                <a href="{{route('students.index')}}" class="btn btn-info">Reset</a>


                <input class="btn  btn-success" type="submit" name="save" value="Update" >



            </div>

        </div>



    </form>

</div>


</div>

</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">

</script>
</html>
