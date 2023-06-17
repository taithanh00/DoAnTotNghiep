@extends('admin.layouts.template')
@section('page_title')
    Dashboard - Single Ecommerce
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> All Member </h4>
        <div class="card">
            <h5 class="card-header">Available Member Information</h5>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="table-responsive text-nowrap">

                <table class="table">
                    <thead>
                        <tr>
                            <th>Member ID</th>
                            <th>Member Username</th>
                            <th>Member Password</th>
                            <th>Member Email</th>
                            <th>Member Sex</th>
                            <th>Member Address</th>
                            <th>Member Phone</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($members as $member)
                            <tr>
                                <td>{{ $member->id }}</td>
                                <td>{{ $member->username }}</td>
                                <td>{{ $member->password }}</td>
                                <td>{{ $member->email }}</td>
                                <td>{{ $member->sex }}</td>
                                <td>{{ $member->address }}</td>
                                <td>{{ $member->phone_number }}</td>
                                <td>
                                    <a href="{{ route('edit2member', $member->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('deletemember', $member->id) }}" class="btn btn-warning">Delete</a>
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
