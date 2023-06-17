@extends('admin.layouts.template')
@section('page_title')
    Dashboard - Single Ecommerce
@endsection
<header>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
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
</header>
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> All Products </h4>
        <div class="card">
            <h5 class="card-header">Available All Products Information</h5>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Products_name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Color</th>
                            <th>Quantity Products</th>
                            <th>Products Rating</th>
                            <th>Products Img</th>
                            <th>Category ID</th>
                            <th>Coupon ID</th>
                            <th>Brand ID</th>
                            <th>SubCategory ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $pd)
                            <tr>
                                <td>{{ $pd->id }}</td>
                                <td @if ($matchingProductNames->contains($pd->product_name)) style="color: green;" @endif>
                                    {{ $pd->product_name }}</td>
                                <td class="truncate">{{ substr($pd->description, 0, 10) }}<span class="ellipsis">...</span>
                                    <a href="#" class="read-more">Read more</a>
                                </td>
                                <td>{{ $pd->price }}</td>
                                <td>{{ $pd->color }}</td>
                                <td>{{ $pd->quantity_product }}</td>
                                <td>{{ $pd->product_rating }}</td>
                                <td><img src="{{ $pd->product_img }}" alt="{{ $pd->product_name }}" class="w-25"></td>
                                <td>{{ $pd->categories_id }}</td>
                                <td>{{ $pd->coupons_id }}</td>
                                <td>{{ $pd->brands_id }}</td>
                                <td>{{ $pd->subcategories_id }}</td>
                                <td>
                                    <a href="{{ route('edit2product', $pd->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('deleteproduct', $pd->id) }}" class="btn btn-warning">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- <script>
        $(document).ready(function() {
            $(".read-more").on("click", function() {
                var $this = $(this);
                var $content = $this.prev(".truncate");
                var linkText = $this.text().toUpperCase();

                if (linkText === "ĐỌC THÊM") {
                    linkText = "ẨN BỚT";
                    $content.switchClass("truncate", "untruncate", 400);
                } else {
                    linkText = "ĐỌC THÊM";
                    $content.switchClass("untruncate", "truncate", 400);
                }

                $this.text(linkText);
            });
        });
    </script> --}}
@endsection
