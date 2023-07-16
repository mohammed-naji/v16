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
        <h1>Basic Information</h1>
        <form method="POST" action="{{ route('forms.form2_data') }}">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="name" placeholder="Name" class="form-control" />
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="Email" class="form-control" />
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label>Phone</label>
                        <input type="text" name="phone" placeholder="Phone" class="form-control" />
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label>Age</label>
                        <input type="text" name="age" placeholder="Age" class="form-control" />
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="mb-3">
                        <label>Message</label>
                        <textarea name="message" placeholder="Message" class="form-control" rows="5"></textarea>
                    </div>
                </div>

                <div class="col-12">
                    <button class="btn btn-success w-25">Send</button>
                </div>
            </div>
        </form>
    </div>
  </body>
</html>
