@extends('admin.layouts.template')
@section('page_title')
    Dashboard - Single Ecommerce
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> All Cart </h4>
        <div class="card">
            <h5 class="card-header">Available Category Information</h5>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="table-responsive text-nowrap">

                <table class="table">
                    <thead>
                        <tr>
                            <th>Cart ID</th>
                            <th>Product Name</th>
                            <th>Category Name</th>
                            <th>Product Image</th>
                            <th>Quantity</th>
                            <th>Product Price</th>
                            <th>Change</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($carts as $cart)
                            <tr>
                                <td>{{ $cart->id }}</td>
                                <td>{{ $cart->product_name }}</td>
                                <td>{{ $cart->category_name }}</td>
                                <td class="truncate">{{ substr($cart->product_img, 0, 10) }}<span class="ellipsis">...</span>
                                    <a href="#" class="read-more">Read more</a>
                                <td>{{ $cart->quantity }}</td>
                                <td>{{ $cart->product_price }}</td>
                                <td>
                                    <a href="{{ route('edit2cart', $cart->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('deletecart', $cart->id) }}" class="btn btn-warning">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- <div style="margin-top: 20px">
                {{ $categories->links()}}
            </div> --}}
            {{-- {{ $categories->links()}} --}}
            {{-- {{ $categories->withQueryString()->links() }} --}}
        </div>
    </div>
@endsection
