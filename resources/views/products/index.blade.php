<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/sweetalert.css') }}"> --}}
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <style>
        table td,
        table th {
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
        <a class="btn btn-success btn-sm" href="{{ route('products.create') }}"><i class="fas fa-plus"></i> Add New
            Product</a>
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
                $index = ($products->currentPage() - 1) * $products->perPage() + 1;
            @endphp

            @forelse ($products as $product)
                <tr id="row_{{ $product->id }}">
                    {{-- <td>{{ $product->id }}</td>  --}}
                    {{-- <td>{{ $loop->iteration }}</td> --}}
                    <td>{{ $index++ }}</td>
                    <td><img width="60" src="{{ asset($product->image) }}" alt=""></td>
                    <td>{{ $product->name }}</td>
                    <td>$<span>{{ number_format($product->price, 2) }}</span></td>
                    {{-- <td>{{ $product->created_at->format('F d, Y') }}</td> --}}
                    <td>{{ $product->created_at ? $product->created_at->diffForHumans() : '' }}</td>
                    <td>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-success btn-sm"><i
                                class="fas fa-eye"></i></a>
                        <a
                            onclick="editProduct(event)"
                            data-bs-toggle="modal"
                            data-bs-target="#EditProduct"
                            data-name="{{ $product->name }}"
                            data-price="{{ $product->price }}"
                            data-image="{{ asset($product->image) }}"
                            data-content="{{ $product->content }}"
                            href="{{ route('products.update', $product->id) }}"
                            class="btn btn-primary btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>

                        <form class="d-inline" action="{{ route('products.destroy', $product->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="button" onclick="deleteItem(event)" class="btn btn-danger btn-sm"><i
                                    class="fas fa-trash"></i></button>
                            {{ $product->id }}
                        </form>

                        @if ($loop->first && session('msg') && session('icon') == 'success')
                            <form class="d-inline" action="{{ route('products.destroy', $product->id) }}"
                                method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-info btn-undo btn-sm"><i class="fas fa-undo"></i></button>

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

  <!-- Modal -->
  <div class="modal fade" id="EditProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Product</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form onsubmit="UpdateProduct(event)" action="" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
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
                    <img width="80" id="oldimg" src="" alt="">
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
                <button class="btn btn-info">Update</button>
            </form>
        </div>
      </div>
    </div>
  </div>



    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script> --}}
    {{-- <script src="{{ asset('assets/js/sweetalert.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/axios.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function deleteItem(e) {
            let url = e.target.closest('form').action
            let row = e.target.closest('tr')
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

                    axios.post(url, {
                            _method: 'delete'
                        })
                        .then(res => {
                            row.remove()
                        })
                }
            })
        }
    </script>

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



        @if (session('msg'))
            Toast.fire({
                icon: '{{ session('icon') }}',
                title: '{{ session('msg') }}'
            })
            // Swal.fire(
            //     'Good job!',
            //     '{{ session('msg') }}',
            //     'success'
            // )
        @endif

        // setInterval(() => {

        // }, interval);

        setTimeout(() => {
            document.querySelector('.btn-undo').remove()
        }, 3000);
    </script>



    <script>
        function editProduct(e) {

            // get old data from tr
            let name = e.target.closest('a').dataset.name
            let price = e.target.closest('a').dataset.price
            let image = e.target.closest('a').dataset.image
            let content = e.target.closest('a').dataset.content

            let url = e.target.closest('a').href

            // console.log(name, price, image, content);
            // show old data in edit form
            document.querySelector('[name=name]').value = name
            document.querySelector('#oldimg').src = image
            document.querySelector('[name=price]').value = price
            document.querySelector('[name=content]').value = content

            document.querySelector('.modal form').action = url
        }

        function UpdateProduct(e) {
            e.preventDefault();

            let url = e.target.action;

            let data = new FormData(e.target);

            axios.post(url, data)
            .then(res => {
                // console.log(res.data.id);
                // $('#EditProduct').hide();

                document.querySelector('#row_'+res.data.id+' td:nth-child(2) img').src = res.data.image;
                document.querySelector('#row_'+res.data.id+' td:nth-child(3)').innerHTML = res.data.name;
                document.querySelector('#row_'+res.data.id+' td:nth-child(4) span').innerHTML = Number.parseFloat(res.data.price).toFixed(2);

                const truck_modal = document.querySelector('#EditProduct');
                const modal = bootstrap.Modal.getInstance(truck_modal);
                modal.hide();
            })
        }
    </script>
</body>

</html>
