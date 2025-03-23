


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
  <h2>Alerts</h2>
  <p>Alerts are created with the .alert class, followed by a contextual color classes:</p>
  <div class="alert alert-success">
    <strong>Success!</strong> This alert box could indicate a successful or positive action.

    <h1>Email Verification Mail</h1>
  
Please verify your email with bellow link: 
<a href="{{ route('user.verify', $token) }}">Verify Email</a>

  </div>
 
  
</div>

</body>
</html>
