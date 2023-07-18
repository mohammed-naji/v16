<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>

    <div class="container">
        <h1>New Form</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('forms.form3_data') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label>Name:</label>
                <input type="text" placeholder="Name" name="name" class="form-control" />
            </div>

            <div class="mb-3">
                <label>Image:</label>
                <input type="file" name="image" class="form-control" />
            </div>
            <button class="btn btn-success">Upload</button>
        </form>
    </div>


  </body>
</html>
