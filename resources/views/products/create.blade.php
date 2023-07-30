<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add new Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}

</head>
<body>

    <div class="container my-5">

        <h2>Add New Products</h2>
        <a class="btn btn-success btn-sm" href="{{ route('products.index') }}"><i class="fas fa-arrow-left"></i> All Product</a>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Name:</label>
                <input type="text" placeholder="Name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                @error('name')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}">
                @error('image')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="number" placeholder="Price" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}">
                @error('price')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Content</label>
                <textarea placeholder="Content" name="content" class="form-control @error('content') is-invalid @enderror" rows="5">{{ old('content') }}</textarea>
                @error('content')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            {{-- <button onclick="return confirm('Are you sure')" class="btn btn-success px-5"><i class="fas fa-save"></i> Save</button> --}}
            <button type="button" class="btn btn-success px-5"><i class="fas fa-save"></i> Save</button>
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>

        let btn = document.querySelector('button')
        let form = document.querySelector('form')

        btn.onclick = () => {
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to undo this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, added it!'
            }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
            })
        }

    </script>
</body>
</html>
