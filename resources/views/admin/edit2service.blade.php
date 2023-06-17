@extends('admin.layouts.template')
@section('page_title')
    Edit Service- TaiThanh
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> Update Service </h4>
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Update Service</h5>
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
                    <form action="{{ route('updateservice') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $service_info->id }}" name="service_id">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">First Name</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="bx bx-user"></i></span>
                                    <input type="text" class="form-control" id="customer_first_name"
                                        name="customer_first_name" aria-label="John Doe"
                                        aria-describedby="basic-icon-default-fullname2"
                                        value="{{ $service_info->customer_first_name }}" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Last Name</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="bx bx-user"></i></span>
                                    <input type="text" class="form-control" id="customer_last_name"
                                        name="customer_last_name" aria-label="John Doe"
                                        aria-describedby="basic-icon-default-fullname2"
                                        value="{{ $service_info->customer_last_name }}" />
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Email</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="bx bx-user"></i></span>
                                    <input type="text" class="form-control" id="customer_email" name="customer_email"
                                        aria-label="John Doe" aria-describedby="basic-icon-default-fullname2"
                                        value="{{ $service_info->customer_email }}" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Phone Number</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="bx bx-user"></i></span>
                                    <input type="text" class="form-control" id="customer_phone_number"
                                        name="customer_phone_number" aria-label="John Doe"
                                        aria-describedby="basic-icon-default-fullname2"
                                        value="{{ $service_info->customer_phone_number }}" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Address</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="bx bx-user"></i></span>
                                    <input type="text" class="form-control" id="customer_stress_address"
                                        name="customer_stress_address" aria-label="John Doe"
                                        aria-describedby="basic-icon-default-fullname2"
                                        value="{{ $service_info->customer_stress_address }}" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Day Buyed</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="bx bx-user"></i></span>
                                    <input type="date" class="form-control" id="day_buy_product"
                                        name="day_buy_product" placeholder="Day Buyed" aria-label="John Doe"
                                        aria-describedby="basic-icon-default-fullname2"
                                        value="{{ $service_info->day_buy_product }}" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Day Send SMS</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="bx bx-user"></i></span>
                                    <input type="date" class="form-control" id="day_thanks" name="day_thanks"
                                        placeholder="Day Send SMS" aria-label="John Doe"
                                        aria-describedby="basic-icon-default-fullname2"
                                        value="{{ $service_info->day_thanks }}" disabled/>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Time
                                Guarantee</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="bx bx-user"></i></span>
                                    <input type="date" class="form-control" id="time_guarantee" name="time_guarantee"
                                        placeholder="Time Guarantee" aria-label="John Doe"
                                        aria-describedby="basic-icon-default-fullname2"
                                        value="{{ $service_info->time_guarantee }}" disabled/>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="day_thanks_hidden" name="day_thanks_hidden"
                            value="{{ $service_info->day_thanks }}" />
                        <input type="hidden" id="time_guarantee_hidden" name="time_guarantee_hidden"
                            value="{{ $service_info->time_guarantee }}" />
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">SubCategory
                                ID</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="bill_id" name="bill_id"
                                    aria-label="Default select example">
                                    <option selected> Select Bill ID</option>
                                    @foreach ($bills as $bill)
                                        <option value="{{ $bill->id }}"> {{ $bill->product_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Checkout ID</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="checkout_id" name="checkout_id"
                                    aria-label="Default select example">
                                    <option selected> Select Checkout ID</option>
                                    @foreach ($checkouts as $checkout)
                                        <option value="{{ $checkout->id }}"> {{ $checkout->first_name }}</option>
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
        document.addEventListener('DOMContentLoaded', function() {
            var dayBuyedInput = document.getElementById('day_buy_product');
            var daySendSmsInput = document.getElementById('day_thanks');
            var timeGuaranteeInput = document.getElementById('time_guarantee');
            var dayThanksHiddenInput = document.getElementById('day_thanks_hidden');
            var timeGuaranteeHiddenInput = document.getElementById('time_guarantee_hidden');

            dayBuyedInput.addEventListener('change', function() {
                var dayBuyedValue = dayBuyedInput.value;
                var dayBuyedDate = new Date(dayBuyedValue);

                var daySendSmsDate = new Date(dayBuyedDate.getTime() + (3 * 24 * 60 * 60 * 1000));
                var timeGuaranteeDate = new Date(dayBuyedDate.getUTCFullYear() + 1, dayBuyedDate
                    .getUTCMonth(), dayBuyedDate.getUTCDate());

                daySendSmsInput.value = formatDate(daySendSmsDate);
                timeGuaranteeInput.value = formatDate(timeGuaranteeDate);

                // Update hidden fields
                dayThanksHiddenInput.value = formatDate(daySendSmsDate);
                timeGuaranteeHiddenInput.value = formatDate(timeGuaranteeDate);
            });

            function formatDate(date) {
                var year = date.getFullYear();
                var month = String(date.getMonth() + 1).padStart(2, '0');
                var day = String(date.getDate()).padStart(2, '0');
                return year + '-' + month + '-' + day;
            }
        });
    </script>
@endsection
