@extends('admin.layouts.template')
@section('page_title')
    Dashboard - Single Ecommerce
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> All Item Order </h4>
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
                            <th>Item Order ID</th>
                            <th>Order Name</th>
                            <th>Quantity</th>
                            <th>Request</th>
                            <th>Price</th>
                            <th>Total Price</th>
                            <th>Order Time</th>
                            <th>Order ID</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($itemorders as $it)
                            <tr>
                                <td>{{ $it->id }}</td>
                                <td>{{ $it->order_name }}</td>
                                <td>{{ $it->quanlity }}</td>
                                <td>{{ $it->request }}</td>
                                <td>{{ $it->price }}</td>
                                <td>{{ $it->total_price }}</td>
                                <td>{{ $it->order_time }}</td>
                                <td>{{ $it->order_id }}</td>
                                <td>
                                    <a href="" class="btn btn-primary">Edit</a>
                                    <a href="" class="btn btn-warning">Delete</a>
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
