@extends('admin.layouts.template')
@section('page_title')
    Dashboard - Single Ecommerce
@endsection
<style>
    .truncate {
        white-space: nowrap;
        text-overflow: ellipsis;
        width: 300px;
        overflow: hidden;

    }

    .truncate:hover {
        overflow: visible;
    }
</style>
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> All Brand </h4>
        <div class="card">
            <h5 class="card-header">Available Brand Information</h5>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="table-responsive text-nowrap">
                <table class="table table-md">
                    <thead>
                        <tr>
                            <th>Brand ID</th>
                            <th>Brand Name</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($brands as $brand)
                            <tr>
                                <td>{{ $brand->id }}</td>
                                <td>{{ $brand->BrandName }}</td>
                                <td class="truncate">{{ substr($brand->description, 0, 500) }}<span
                                        class="ellipsis">...</span>
                                    <a href="#" class="read-more">Read more</a>
                                </td>
                                <td>
                                    <a href="{{ route('edit2brand', $brand->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('deletebrand', $brand->id) }}"class="btn btn-warning">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
