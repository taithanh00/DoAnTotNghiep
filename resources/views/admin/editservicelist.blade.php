@extends('admin.layouts.template')
@section('page_title')
    Dashboard - Single Ecommerce
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> Add New Service </h4>
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Add New Service</h5>
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
                    <form action="{{ route('storeservice') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Customer First
                                Name</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="bx bx-user"></i></span>
                                    <input type="text" class="form-control" id="customer_first_name"
                                        name="customer_first_name" placeholder="Customer First Name" aria-label="John Doe"
                                        aria-describedby="basic-icon-default-fullname2" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Customer Last
                                Name</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="bx bx-user"></i></span>
                                    <input type="text" class="form-control" id="customer_last_name"
                                        name="customer_last_name" placeholder="Customer Last Name" aria-label="John Doe"
                                        aria-describedby="basic-icon-default-fullname2" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Email</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="bx bx-user"></i></span>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Email" aria-label="John Doe"
                                        aria-describedby="basic-icon-default-fullname2" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Phone Number</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="bx bx-user"></i></span>
                                    <input type="text" class="form-control" id="phone_number" name="phone_number"
                                        placeholder="Phone Number" aria-label="John Doe"
                                        aria-describedby="basic-icon-default-fullname2" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Address</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="bx bx-user"></i></span>
                                    <input type="text" class="form-control" id="stress_address" name="stress_address"
                                        placeholder="Address" aria-label="John Doe"
                                        aria-describedby="basic-icon-default-fullname2" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Day Buyed</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="bx bx-user"></i></span>
                                    <input type="date" class="form-control" id="day_buy_product" name="day_buy_product"
                                        placeholder="Day Buyed" aria-label="John Doe"
                                        aria-describedby="basic-icon-default-fullname2" />
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
                                        aria-describedby="basic-icon-default-fullname2" disabled />
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
                                        aria-describedby="basic-icon-default-fullname2" disabled />
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="day_thanks_hidden" name="day_thanks_hidden" />
                        <input type="hidden" id="time_guarantee_hidden" name="time_guarantee_hidden" />
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Bill ID</label>
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
                                <button type="submit" class="btn btn-primary">Add Service</button>
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
