@extends('admin.layouts.template')
@section('page_title')
    Dashboard - Single Ecommerce
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> All News </h4>
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
                            <th>News ID</th>
                            <th>Category ID</th>
                            <th>SubCategory ID</th>
                            <th>Brand ID</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($news as $new)
                            <tr>
                                <td>{{ $new->id }}</td>
                                <td>{{ $new->categories_id }}</td>
                                <td>{{ $new->subcategories_id }}</td>
                                <td>{{ $new->brands_id }}</td>
                                <td>
                                    <a href="{{ route('edit2news', $new->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('deletenews', $new->id) }}" class="btn btn-warning">Delete</a>
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
