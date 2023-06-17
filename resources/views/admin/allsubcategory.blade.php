@extends('admin.layouts.template')
@section('page_title')
    Dashboard - Single Ecommerce
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> All Sub Category </h4>
        <div class="card">
            <h5 class="card-header">Available Sub Category Information</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Sub Category Name</th>
                            <th>Quantity</th>
                            <th>Category ID</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($subcategory as $sb)
                            <tr>
                                <td>{{ $sb->id }}</td>
                                <td>{{ $sb->subcategory_name }}</td>
                                <td>{{ $sb->quantity }}</td>
                                <td>{{ $sb->category_id }}</td>
                                <td>
                                    <a href="{{ route('edit2subcategory', $sb->id) }}"
                                        class="btn btn-primary">Edit</a>
                                    <a href="{{ route('deletesubcategory', $sb->id) }}"
                                        class="btn btn-warning">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
