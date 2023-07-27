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

        <h2>All Products</h2>
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

            @foreach ($products as $product)
            <tr>
                {{-- <td>{{ $product->id }}</td>  --}}
                {{-- <td>{{ $loop->iteration }}</td> --}}
                <td>{{ $index++ }}</td>
                <td><img width="60" src="{{ $product->image }}" alt=""></td>
                <td>{{ $product->name }}</td>
                <td>${{ number_format($product->price, 2) }}</td>
                {{-- <td>{{ $product->created_at->format('F d, Y') }}</td> --}}
                <td>{{ $product->created_at ? $product->created_at->diffForHumans() : '' }}</td>
                <td>
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                    <a href="" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                    <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </table>

        {{ $products->links() }}
    </div>

</body>
</html>
