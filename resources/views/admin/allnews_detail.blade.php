@extends('admin.layouts.template')
@section('page_title')
    Dashboard - Single Ecommerce
@endsection
@section('content')
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
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> All New Detail </h4>
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
                            <th>New Detail ID</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Image</th>
                            <th>News ID</th>
                            <th>Date News</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($news_detail as $new_d)
                            <tr>
                                <td>{{ $new_d->id }}</td>
                                <td>{{ $new_d->title }}</td>
                                <td class="truncate">{{ substr($new_d->content, 0, 10) }}<span class="ellipsis">...</span>
                                    <a href="#" class="read-more">Read more</a>
                                </td>
                                <td class="truncate">{{ substr($new_d->image, 0, 10) }}<span class="ellipsis">...</span>
                                    <a href="#" class="read-more">Read more</a>
                                </td>
                                <td>{{ $new_d->news_id }}</td>
                                <td>{{ $new_d->date_news }}</td>
                                <td>
                                    <a href="{{ route('edit2newsdetail', $new_d->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('deletenewsdetail', $new_d->id) }}" class="btn btn-warning">Delete</a>
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
