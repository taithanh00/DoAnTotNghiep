@extends('admin.layouts.template')
@section('page_title')
    Dashboard - Single Ecommerce
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> All Service </h4>
        <div class="card">
            <h5 class="card-header">Available Service Information</h5>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="table-responsive text-nowrap">

                <table class="table">
                    <thead>
                        <tr>
                            <th>Service ID</th>
                            <th>Customer First Name</th>
                            <th>Customer Last Name</th>
                            <th>Customer Email</th>
                            <th>Customer Phone Number</th>
                            <th>Customer Stress Address</th>
                            <th>Day Buyed Product</th>
                            <th>Day Send Message</th>
                            <th>Time to Guarantee</th>
                            <th>Bill ID</th>
                            <th>Checkout ID</th>
                            <th>Change</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($services as $service)
                            <tr>
                                <td>{{ $service->id }}</td>
                                <td>{{ $service->customer_first_name }}</td>
                                <td>{{ $service->customer_last_name }}</td>
                                <td>{{ $service->customer_email }}</td>
                                <td>{{ $service->customer_phone_number }}</td>
                                <td>{{ $service->customer_stress_address}}</td>
                                <td>{{ $service->day_buy_product }}</td>
                                <td>{{ $service->day_thanks }}</td>
                                <td>{{ $service->time_guarantee }}</td>
                                <td>{{ $service->bill_id }}</td>
                                <td>{{ $service->checkout_id }}</td>
                                <td>
                                    <a href="{{ route('edit2service', $service->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('deleteservice', $service->id) }}"
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
