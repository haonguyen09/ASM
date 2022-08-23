
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
                <h2>Product List</h2>
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
			        <a href="{{ url('add') }}" class="btn btn-outline-success">Add New</a>
                </div>
                
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $row)
                            <tr>
                                <td>{{ $row->productID }}</td>
                                <td>{{ $row->productName }}</td>
                                <td>{{ $row->productPrice }}</td>
                                <td><img src="images/products/{{ $row->productImage1 }}" width="90px" height="90px">
                                    {{-- <td>{{ $row->productImage1 }}</td> --}}
                                <td>
                                    <a href="{{ url('edit/' . $row->productID) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ url('delete/' . $row->productID) }}" class="btn btn-danger"
                                        onclick=" return confirm('Are you sure?');">Delete</a>
                                </td>
                                
                            </tr>
                        @endforeach

                        @if(isset($products))

               <table class="table table-hover">
                   <thead>
                       <tr>
                            <th>ID</th>
                           <th>Name</th>
                           <th>Price</th>
                           <th>Image</th>
                       </tr>
                   </thead>
                   <tbody>
                       @if(count($products) > 0)
                           @foreach($products as $rows)
                              <tr>
                                    <td>{{ $rows->productID }}</td>
                                  <td>{{ $rows->productName }}</td>
                                  <td>{{ $rows->productPrice }}</td>
                                  <td><img src="images/products/{{ $rows->productImage1 }}" width="120px" height="90px"></td>
                              </tr>
                           @endforeach
                       @else

                          <tr><td>No result found!</td></tr>
                       @endif
                   </tbody>
               </table>

               <table>
                <thead>
                    <tr>
                        <th>Producer</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $row)
                            <tr>
                                <td>{{ $row->productID }}</td>
                                <td>{{ $row->productName }}</td>
                                <td>{{ $row->productPrice }}</td>
                                <td><img src="images/products/{{ $row->productImage1 }}" width="90px" height="90px">
                                    {{-- <td>{{ $row->productImage1 }}</td> --}}
                                <td>
                                    <a href="{{ url('edit/' . $row->productID) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ url('delete/' . $row->productID) }}" class="btn btn-danger"
                                        onclick=" return confirm('Are you sure?');">Delete</a>
                                </td>
                                
                            </tr>
                        @endforeach

                </tbody>
               </table>

             @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>