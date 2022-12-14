<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Search with pagination</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-4.4.1/css/bootstrap.min.css')}}">
</head>
<body>
    <div class="container">
       <div class="row">
          <div class="col-md-6" style="margin-top:40px">
             <h4>Search Everything</h4><hr>
             <form action="{{ route('web.find') }}" method="GET">
        
                <div class="form-group">
                   <label for="">Enter keyword</label>
                   <input type="text" class="form-control" name="query" placeholder="Search here....." value="{{ request()->input('query') }}">
                   <span class="text-danger">@error('query'){{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                 <button type="submit" class="btn btn-primary">Search</button>
                </div>
             </form>
             <br>
             <br>
             <hr>
             <br>
             @if(isset($products))

               <table class="table table-hover">
                   <thead>
                       <tr>
                           <th>Name</th>
                           <th>Independance Year</th>
                           <th>Continent</th>
                       </tr>
                   </thead>
                   <tbody>
                       @if(count($products) > 0)
                           @foreach($products as $rows)
                              <tr>
                                  <td>{{ $rows->Name }}</td>
                                  <td>{{ $rows->IndepYear }}</td>
                                  <td>{{ $rows->Continent }}</td>
                              </tr>
                           @endforeach
                       @else

                          <tr><td>No result found!</td></tr>
                       @endif
                   </tbody>
               </table>

               <div class="pagination-block">
                   <?php //{{ $countries->links('layouts.paginationlinks') }} ?>
                   {{  $countries->appends(request()->input())->links('0905b.paginationlinks') }}
               </div>

             @endif
          </div>
       </div>
    </div>
</body>
</html>