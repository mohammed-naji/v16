<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <style>
        table td, table th {
            vertical-align: middle
        }
    </style>
</head>
<body>

    <div class="container my-5">

        {{-- solid
        regular
        brand --}}

        {{-- <i class="fas fa-heart"></i>
        <i class="far fa-heart"></i>
        <i style="color: #3b5998 " class="fab fa-facebook-square"></i>
        <i style="color: #3b5998" class="fab fa-twitter"></i> --}}

        {{-- @dump(session('msg')) --}}
        {{-- @if (session('msg'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('msg') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

        </div>
        @endif --}}


        <h2>All Products</h2>
        <a class="btn btn-success btn-sm" href="{{ route('products.create') }}"><i class="fas fa-plus"></i> Add New Product</a>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>

            @php
                $index = (( $products->currentPage() - 1 ) * $products->perPage() ) + 1;
            @endphp

            @forelse ($products as $product)
            <tr>
                {{-- <td>{{ $product->id }}</td>  --}}
                {{-- <td>{{ $loop->iteration }}</td> --}}
                <td>{{ $index++ }}</td>
                <td><img width="60" src="{{ asset($product->image) }}" alt=""></td>
                <td>{{ $product->name }}</td>
                <td>${{ number_format($product->price, 2) }}</td>
                {{-- <td>{{ $product->created_at->format('F d, Y') }}</td> --}}
                <td>{{ $product->created_at ? $product->created_at->diffForHumans() : '' }}</td>
                <td>
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                    <a href="" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>

                    <form class="d-inline" action="{{ route('products.destroy', $product->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="button" onclick="deleteItem()" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                    </form>

                    @if ($loop->first && session('msg') && session('icon') == 'success')
                    <form class="d-inline" action="{{ route('products.destroy', $product->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-info btn-sm"><i class="fas fa-undo"></i></button>
                    </form>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">No data found</td>
            </tr>
            @endforelse

            {{-- @if ($products->count() > 0)
                @foreach ($products as $product)
                <tr>
                    <td>{{ $index++ }}</td>
                    <td><img width="60" src="{{ $product->image }}" alt=""></td>
                    <td>{{ $product->name }}</td>
                    <td>${{ number_format($product->price, 2) }}</td>
                    <td>{{ $product->created_at ? $product->created_at->diffForHumans() : '' }}</td>
                    <td>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                        <a href="" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                        <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
            @else
            <tr>
                <td colspan="6" class="text-center">No data found</td>
            </tr>
            @endif --}}

        </table>

        {{ $products->links() }}
    </div>

    <script>
        function deleteItem() {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to undo this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, deleted it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // form.submit();

                    // ajax using vanillajs
                    // ajax using fetch api
                    // ajax using jquery
                    // ajax using axios

                    axios.post(url)
                    .then(res => {
                        row.remove()
                    })
                }
            })
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>

const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})



        @if (session("msg"))
        Toast.fire({
        icon: '{{ session("icon") }}',
        title: '{{ session("msg") }}'
        })
        // Swal.fire(
        //     'Good job!',
        //     '{{ session("msg") }}',
        //     'success'
        // )
        @endif

        // setInterval(() => {

        // }, interval);

        setTimeout(() => {
            document.querySelector('.btn-info').remove()
        }, 3000);
    </script>
</body>
</html>
