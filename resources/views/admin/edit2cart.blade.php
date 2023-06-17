@extends('admin.layouts.template')
@section('page_title')
    Edit Cart- TaiThanh
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> Update Cart </h4>
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Update Cart</h5>
                    <small class="text-muted float-end">Input Information</small>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- action="edit2category{{ $cd[0]->id }}" --}}
                    <form action="{{ route('updatecart') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $cart_info->id }}" name="cart_id">
                        <input type="hidden" value="{{ $cart_info->product_name }}" name="product_name">
                        <input type="hidden" value="{{ $cart_info->category_name }}" name="category_name">
                        <input type="hidden" value="{{ $cart_info->product_img }}" name="product_img">
                        <input type="hidden" value="{{ $cart_info->quantity }}" name="quantity">
                        <input type="hidden" value="{{ $cart_info->product_price }}" name="product_price">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Product Name</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="bx bx-user"></i></span>
                                    <input type="text" class="form-control" id="product_name" name="product_name"
                                        aria-label="John Doe" aria-describedby="basic-icon-default-fullname2"
                                        value="{{ $cart_info->product_name }}" disabled />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Category Name</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="bx bx-user"></i></span>
                                    <input type="text" class="form-control" id="category_name" name="category_name" placeholder="1"
                                        aria-label="John Doe" aria-describedby="basic-icon-default-fullname2"
                                        value="{{ $cart_info->category_name }}" disabled/>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Product Image</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="bx bx-user"></i></span>
                                    <input type="text" class="form-control" id="product_img" name="product_img" placeholder=""
                                        aria-label="John Doe" aria-describedby="basic-icon-default-fullname2"
                                        value="{{ $cart_info->product_img }}" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Quantity</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="bx bx-user"></i></span>
                                    <input type="text" class="form-control" id="quantity" name="quantity" placeholder=""
                                        aria-label="John Doe" aria-describedby="basic-icon-default-fullname2"
                                        value="{{ $cart_info->quantity }}" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Product Price</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="bx bx-user"></i></span>
                                    <input type="text" class="form-control" id="product_price" name="product_price" placeholder=""
                                        aria-label="John Doe" aria-describedby="basic-icon-default-fullname2"
                                        value="{{ $cart_info->product_price }}" disabled />
                                </div>
                            </div>
                        </div>
                        {{--
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Date Created</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="bx bx-user"></i></span>
                                    <input type="date" class="form-control" id="category_date-created"
                                        name="category_date-created" placeholder="dd/mm/yy" aria-label="John Doe"
                                        aria-describedby="basic-icon-default-fullname2" />
                                </div>
                            </div>
                        </div> --}} <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Update Category</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
