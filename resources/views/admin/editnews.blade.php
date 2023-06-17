@extends('admin.layouts.template')
@section('page_title')
    Dashboard - Single Ecommerce
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> Add New Breaking News </h4>
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Add New Breaking News</h5>
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
                    <form action="{{ route('storenews') }}" method="POST">
                        @csrf
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
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">SubCategory ID</label>
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
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Brands ID</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="brands_id" name="brands_id"
                                    aria-label="Default select example">
                                    <option selected> Select Brands ID</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}"> {{ $brand->BrandName }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Add Service</button>
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
