@extends('admin.layouts.template')
@section('page_title')
    Dashboard - Single Ecommerce
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> All Checkout </h4>
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
                            <th>Checkout ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Address</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Product Image</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($checkouts as $checkout)
                            <tr>
                                <td>{{ $checkout->id }}</td>
                                <td>{{ $checkout->first_name }}</td>
                                <td>{{ $checkout->last_name }}</td>
                                <td>{{ $checkout->stress_address }}</td>
                                <td>{{ $checkout->phone_number }}</td>
                                <td>{{ $checkout->email }}</td>
                                <td>{{ $checkout->message }}</td>
                                {{-- @foreach ($product_list as $product)
                                    <td><img src="{{ $product->product_img }}" alt=""></td>
                                @endforeach --}}
                                <td>
                                    <a href="{{ route('edit2checkout', $checkout->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('deletecheckout', $checkout->id) }}"
                                        class="btn btn-warning">Delete</a>
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
