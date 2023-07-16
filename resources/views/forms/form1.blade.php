<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
{{-- Cross
Site
Request
Forgee

csrf --}}
    <div class="container">
        <h1>New Form</h1>
        <form action="{{ route('forms.form1_data') }}" method="POST">
            {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}" /> --}}
            @csrf

            <div class="mb-3">
                <label>Name:</label>
                <input type="text" placeholder="Name" name="name" class="form-control" />
            </div>
            <div class="mb-3">
                <label>Sepcialization</label>
                <input type="text" placeholder="Sepcialization" name="sepcialization" class="form-control" />
            </div>
            <button class="btn btn-success">Send</button>
        </form>
    </div>


  </body>
</html>
