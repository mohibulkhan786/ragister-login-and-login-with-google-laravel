<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Dashboard</h2>

  <div class="row">
    <div class="col-md-6">  
  <div class="card" style="width:400px">
    <img class="card-img-top" src="https://www.w3schools.com/bootstrap5/img_avatar1.png" alt="Card image" style="width:100%">
    <div class="card-body">
      <h4 class="card-title">Welcome Mr. {{Auth::user()->name}}</h4>
      <p class="card-text">Email: {{Auth::user()->email}}</p>
      <a href="#" class="btn btn-primary">See Profile</a>
      
      <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
    </div>
  </div>
  </div>

   <div class="col-md-6">  
  <div class="card" style="width:400px">
    <img class="card-img-bottom" src="https://www.w3schools.com/bootstrap4/img_avatar6.png" alt="Card image" style="width:100%">
    <div class="card-body">
      <h4 class="card-title">Welcome Mr. {{Auth::user()->name}}</h4>
      <p class="card-text">Email: {{Auth::user()->email}}</p>
      <a href="#" class="btn btn-primary">See Profile</a>
      
      <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
    </div>
  </div>
  </div>



  </div>



   
</div>

</body>
</html>
