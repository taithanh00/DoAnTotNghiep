@extends('admin.layouts.template')
@section('page_title')
    Edit Category- TaiThanh
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> Update Product </h4>
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Update Product</h5>
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
                    <form action="{{ route('updateproduct') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $product_info->id }}" name="product_id">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Product Name</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="bx bx-user"></i></span>
                                    <input type="text" class="form-control" id="product_name" name="product_name"
                                        aria-label="John Doe" aria-describedby="basic-icon-default-fullname2"
                                        value="{{ $product_info->product_name }}" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Description</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <textarea class="form-control" name="description" id="description" cols="30" rows="10"
                                        placeholder="Text Description For This Products In Here" value="{{ $product_info->description }}"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Price</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="bx bx-user"></i></span>
                                    <input type="number" class="form-control" id="price" name="price"
                                        placeholder="100.000 vnd" aria-label="John Doe"
                                        aria-describedby="basic-icon-default-fullname2"
                                        value="{{ $product_info->price }}" />
                                </div>
                            </div>
                        </div>
                        <div class="row
                                        mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Color</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="bx bx-user"></i></span>
                                    <input type="text" class="form-control" id="color" name="color"
                                        placeholder="Red, Blue, Yellow,..." aria-label="John Doe"
                                        aria-describedby="basic-icon-default-fullname2"
                                        value="{{ $product_info->color }}" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Quantity
                                Products</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="bx bx-user"></i></span>
                                    <input type="number" class="form-control" id="quantity_product" placeholder="24,48,56"
                                        name="quantity_product" aria-label="John Doe"
                                        aria-describedby="basic-icon-default-fullname2"
                                        value="{{ $product_info->quantity_product }}" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Product
                                Rating</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="bx bx-user"></i></span>
                                    <input type="text" class="form-control" id="product_rating" name="product_rating"
                                        placeholder="1,2,3,..." aria-label="John Doe"
                                        aria-describedby="basic-icon-default-fullname2"
                                        value="{{ $product_info->product_rating }}" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Products
                                Image</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="bx bx-user"></i></span>
                                    <input class="form-control" type="file" id="product_img" name="product_img"
                                        value="{{ $product_info->product_img }}" />
                                </div>
                            </div>
                        </div>
                        {{-- <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Category ID</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="category_id" name="category_id"
                                    aria-label="Default select example">
                                    <option selected> Select Category ID</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"> {{ $category->category }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Category ID</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="category_id" name="category_id"
                                    aria-label="Default select example">
                                    <option selected> Select Category ID</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"> {{ $category->category }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Coupon ID</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="coupons_id" name="coupons_id"
                                    aria-label="Default select example">
                                    <option selected> Select Coupon ID</option>
                                    @foreach ($coupons as $cp)
                                        <option value="{{ $cp->id }}"> {{ $cp->coupon_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Brand ID</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="brands_id" name="brands_id"
                                    aria-label="Default select example">
                                    <option selected> Select Brand ID</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}"> {{ $brand->BrandName }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">SubCategory
                                ID</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="sub_category_id" name="sub_category_id"
                                    aria-label="Default select example">
                                    <option selected> Select SubCategory ID</option>
                                    @foreach ($subcategories as $subcategory)
                                        <option value="{{ $subcategory->id }}"> {{ $subcategory->subcategory_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Update Category</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('category_id').addEventListener('change', function() {
            var categorySelect = document.getElementById('category_id');
            var subcategorySelect = document.getElementById('sub_category_id');

            if (categorySelect.value !== 'Select Category ID') {
                subcategorySelect.disabled = true;
            } else {
                subcategorySelect.disabled = false;
            }
        });

        document.getElementById('sub_category_id').addEventListener('change', function() {
            var categorySelect = document.getElementById('category_id');
            var subcategorySelect = document.getElementById('sub_category_id');

            if (subcategorySelect.value !== 'Select SubCategory ID') {
                categorySelect.disabled = true;
            } else {
                categorySelect.disabled = false;
            }
        });
    </script>
@endsection
