<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Edit Admin</title>
  </head>
  <body>
        <div class="container" style="margin-top: 50px">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edit Admin</h2>
                    @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('success')}}
                    </div>
                    @endif
                    <form action="{{url('updateAdmin')}}" method="POST">
                        @csrf
                        
                        <div class="md-3">
                            <label for="id" class="form-label">ID</label>
                            <input type="text" name="id" class="form-control"
                            value="{{$admins->adminID}}">
                        </div>
                        <div class="md-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control"
                            value="{{$admins->adminName}}">
                        </div>
                        <div class="md-3">
                            <label for="pass" class="form-label">Password</label>
                            <input type="text" name="pass" class="form-control"
                            value="{{($admins->adminPass)}}">
                        </div>
                        <div class="md-3">
                            <label for="user" class="form-label">AdminUser</label>
                            <input type="text" name="user" class="form-control"
                            value="{{$admins->adminUser}}">
                        </div>
                        <div class="md-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control"
                            value="{{$admins->adminPhone}}">
                        </div>
                        <div class="md-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" name="image" class="form-control"
                            value="{{$admins->adminImage}}">
                        </div>
                        

                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{url('dashboard')}}" class="btn btn-success">Back</a>
                    </form>
                </div>
            </div>
        </div>
  </body>
</html>