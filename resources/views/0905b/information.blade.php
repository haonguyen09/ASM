<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Edit Product</title>
  </head>
  <body>
        <div class="container" style="margin-top: 50px">
            <div class="row">
                <div class="col-md-12">
                    <h2>Customer Information</h2>
                    <a href="{{url('change-password')}}" class="btn btn-primary">Change Password</a>
                    @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('success')}}
                    </div>
                    @endif
                    <form action="{{route('save-information')}}" method="POST">
                        @csrf
                        <div class="md-3">
                            <label for="id" class="form-label">ID</label>
                            <input type="text" name="id" class="form-control"
                            value="{{$data->customerID}}">
                        </div>
                        <div class="md-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="text" name="password" class="form-control"
                            value="{{$data->customerPass}}">
                        </div>
                        <div class="md-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" name="name" class="form-control"
                            value="{{$data->customerFullName}}">
                        </div>
                        <div class="md-3">
                            <label for="text" class="form-label">Email</label>
                            <input type="text" name="email" class="form-control"
                            value="{{$data->customerEmail}}">
                        </div>
                        <div class="md-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="text" name="phone" class="form-control"
                            value="{{$data->customerPhone}}">
                        </div>
                        <br>
                        

                        
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{url('/')}}" class="btn btn-success">Back</a>
                    </form>
                </div>
            </div>
        </div>
  </body>