@extends('admin.layouts.template')
@section('page_title')
    Dashboard - Single Ecommerce
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> All Coupon </h4>
        <div class="card">
            <h5 class="card-header">Available Coupon Information</h5>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="table-responsive text-nowrap">

                <table class="table">
                    <thead>
                        <tr>
                            <th>Coupon ID</th>
                            <th>Coupon Name</th>
                            <th>Coupon Code</th>
                            <th>Coupon Validate</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($coupons as $cp)
                            <tr>
                                <td>{{ $cp->id }}</td>
                                <td>{{ $cp->coupon_name }}</td>
                                <td>{{ $cp->coupon_code }}</td>
                                <td>{{ $cp->coupon_validate }}</td>
                                <td>
                                    <a href="{{ route('edit2coupon', $cp->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('deletecoupon', $cp->id) }}" class="btn btn-warning">Delete</a>
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
