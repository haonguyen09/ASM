<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Add Product</title>
  </head>
  <body>
        <div class="container" style="margin-top: 50px">
            <div class="row">
                <div class="col-md-12">
                    <h2>Add new product</h2>
                    <form action="{{url('save')}}" method="POST">
                        @csrf
                        <div class="md-3">
                            <label for="id" class="form-control">ID</label>
                            <input type="text" name="id" class="form-control"
                            placeholder="Enter product id">
                        </div>
                        <div class="md-3">
                            <label for="name" class="form-control">Name</label>
                            <input type="text" name="name" class="form-control"
                            placeholder="Enter product name">
                        </div>
                        <div class="md-3">
                            <label for="price" class="form-control">Price</label>
                            <input type="text" name="price" class="form-control"
                            placeholder="Enter product price">
                        </div>
                        <div class="md-3">
                            <label for="details" class="form-control">Details</label>
                            <textarea name="details" rows="5"
                            placeholder="Enter product details"></textarea>
                        </div>
                        <div class="md-3">
                            <label for="image1" class="form-control">Image1</label>
                            <input type="text" name="image1" class="form-control"
                            placeholder="Enter product image">
                        </div>
                        <div class="md-3">
                            <label for="producer" class="form-control">Producer</label>
                            <input type="number" name="producer" class="form-control"
                            placeholder="Enter product producer">
                        </div>
                    </form>
                </div>
            </div>
        </div>
  </body>