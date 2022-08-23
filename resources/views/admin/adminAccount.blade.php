<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Product List</title>
</head>

<body>
    <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-md-12">
                <h2>Admin Account</h2>
                @if (Session::has('success'))
                    <div class="alert alert-success" role='alert'>
                        {{ Session::get('success') }}
                    </div>
                @endif
                <div style="margin: 2% 10% 2% 0; float: right;">
			        <div class="input-group">
                        <input type="text" class="form-control" name="query" value="{{ request()->input('query') }}">
                        <span class="text-danger">@error('query'){{ $message }} @enderror</span>
                        <button class="btn btn-outline-success" type="submit" id="button-addon2">Search</button>
                      </div>
                </div>
                <div style="margin: 2% 10% 2% 0; float: left;">
			        <a href="{{ url('addAdmin') }}" class="btn btn-outline-success">Add New</a>
                    <a href="{{ url('dashboard') }}" class="btn btn-outline-success">Back</a>
                </div>
                
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th> Name</th>
                            <th>Password</th>
                            <th>User</th>
                            <th>Phone</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admins as $row)
                            <tr>
                                <td>{{ $row->adminID }}</td>
                                <td>{{ $row->adminName }}</td>
                                <td>{{ $row->adminPass }}</td>
                                <td>{{ $row->adminUser }}</td>
                                <td>{{ $row->adminPhone }}</td>
                                <td>
                                    {{-- <a href="{{ url('editAdmin/' . $row->adminID) }}" class="btn btn-primary">Edit</a> --}}
                                    <a href="{{ url('deleteAdmin/' . $row->adminID) }}" class="btn btn-danger"
                                        onclick=" return confirm('Are you sure?');">Delete</a>
                                </td>
                            </tr>
                        @endforeach

{{-- 
                        @if(isset($customers))

               <table class="table table-hover">
                   <thead>
                       <tr>
                        <th>ID</th>
                        <th> Name</th>
                        <th>Password</th>
                        <th>Email</th>
                        <th>Phone</th>
                       </tr>
                   </thead>
                   <tbody>
                       @if(count($customers) > 0)
                           @foreach($customers as $rows)
                              <tr>
                                <td>{{ $row->customerID }}</td>
                                <td>{{ $row->customerFullname }}</td>
                                <td>{{ $row->customerEmail }}</td>
                                <td>{{ $row->customerPhone }}</td>
                                  
                              </tr>
                           @endforeach
                       @else

                          <tr><td>No result found!</td></tr>
                       @endif
                   </tbody>
               </table>

             @endif --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>