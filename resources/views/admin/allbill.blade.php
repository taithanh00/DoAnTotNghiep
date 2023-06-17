@extends('admin.layouts.template')
@section('page_title')
    Dashboard - Single Ecommerce
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> All Bill </h4>
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
                            <th>Bill ID</th>
                            <th>Quantity Product</th>
                            <th>Total Final Product</th>
                            <th>Date  Bill Launch</th>
                            <th>Product Name</th>
                            <th>Change</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($bills as $bill)
                            <tr>
                                <td>{{ $bill->id }}</td>
                                <td>{{ $bill->quantity_product }}</td>
                                <td>{{ $bill->total_final_product }}</td>
                                <td>{{ $bill->date_bill_launch }}</td>
                                <td>{{ $bill->product_name }}</td>
                                <td>
                                    <a href="{{ route('edit2bill', $bill->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('deletebill', $bill->id) }}" class="btn btn-warning">Delete</a>
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
