<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Basic Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>

    <div class="container mt-5">
        <div class="alert alert-success">
            <h4>Welcome : {{ $name }}</h4>
            <p>Email : {{ $email }}</p>
            <p>Phone : {{ $phone }}</p>
            <p>Age : {{ $age }}</p>
            <p>Message : {{ $message }}</p>
        </div>
    </div>


  </body>
</html>
