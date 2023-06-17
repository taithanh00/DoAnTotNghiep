@extends('admin.layouts.template')
@section('page_title')
    Dashboard - Single Ecommerce
@endsection
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
    #fog-red {
        border-radius: 50%;
    }
</style>
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-8 mb-4 order-0" style="width: 100%;">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Congratulations Tai Thanh! 🎉</h5>
                                {{-- <p class="mb-4">
                                    You have done <span class="fw-bold">72%</span> more sales today. Check your new badge in
                                    your profile.
                                </p> --}}

                                {{-- <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a> --}}
                            </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                {{-- ../assets/img/illustrations/man-with-laptop-light.png --}}
                                <img src="data:image/png;base64,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"
                                    height="140" alt="View Badge User"
                                    data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                    data-app-light-img="illustrations/man-with-laptop-light.png" id="fog-red" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Revenue -->
            <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4" style="width: 100%;">
                <canvas id="myChart"></canvas>
            </div>
            <!--/ Total Revenue -->
        </div>
        <div class="row">
            <!-- Order Statistics -->
            <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
                <canvas id="myPieChart"></canvas>
            </div>
            <div class="col-md-6 col-lg-4 order-1 mb-4">
                <canvas id="myBubbleChart"></canvas>
            </div>
            <div class="col-md-6 col-lg-4 order-2 mb-4">
                <canvas id="myRadarChart"></canvas>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var productNames = @json($productNames);
            var productCounts = @json($productCounts);

            // Tạo mảng labels chứa tên sản phẩm
            var labels = productNames;

            // Tạo mảng data chứa số lượng sản phẩm tương ứng
            var data = productCounts;

            // Tạo biểu đồ cột bằng Chart.js
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Số lượng',
                        data: data,
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    plugins: {
                        legend: {
                            display: true // Ẩn chú thích
                        }
                    },
                    scales: {
                        x: {
                            display: false // Ẩn nhãn trục x
                        },
                        y: {
                            beginAtZero: true,
                            stepSize: 1
                        }
                    }
                }
            });
        });
    </script>
    <script>
        var productNames = @json($productNames);
        var productCounts = @json($productCounts);

        // Tạo mảng labels chứa tên sản phẩm
        var labels = productNames;

        // Tạo mảng data chứa số lượng sản phẩm tương ứng
        var data = productCounts;

        // Tạo biểu đồ hình đường bằng Chart.js
        var ctx = document.getElementById('myPieChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Số lượng',
                    data: data,
                    backgroundColor: 'rgba(255, 99, 132, 0.5)', // Màu nền
                    borderColor: 'rgba(255, 99, 132, 1)', // Màu đường viền
                    borderWidth: 1,
                    fill: false // Không tô màu vùng dưới đường
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        display: false, // Hiển thị nhãn trục x
                    },
                    y: {
                        beginAtZero: true,
                        stepSize: 1
                    }
                },
                plugins: {
                    legend: {
                        display: true // Ẩn chú thích
                    }
                }
            }
        });
    </script>
    <script>
        var productNames = @json($productNames);
        var productCounts = @json($productCounts);

        // Tạo mảng labels chứa tên sản phẩm
        var labels = productNames;

        // Tạo mảng data chứa số lượng sản phẩm tương ứng
        var data = productCounts;

        // Kích thước cố định cho các bong bóng
        var fixedSize = 10;

        // Tạo mảng chứa tọa độ x, y và kích thước cố định của các điểm dữ liệu
        var bubbleData = [];
        for (var i = 0; i < labels.length; i++) {
            bubbleData.push({
                x: Math.random(), // Tọa độ x (có thể thay bằng giá trị từ dữ liệu thực tế)
                y: Math.random(), // Tọa độ y (có thể thay bằng giá trị từ dữ liệu thực tế)
                r: fixedSize // Kích thước cố định của bong bóng
            });
        }

        // Tạo biểu đồ Bubble Chart bằng Chart.js
        var ctx = document.getElementById('myBubbleChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bubble',
            data: {
                datasets: [{
                    label: 'Số lượng',
                    data: bubbleData,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)', // Màu nền
                    borderColor: 'rgba(54, 162, 235, 1)', // Màu đường viền
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        type: 'linear',
                        position: 'bottom'
                    },
                    y: {
                        type: 'linear',
                        position: 'left'
                    }
                }
            }
        });
    </script>
    <script>
        var productNames = @json($productNames);
        var productCounts = @json($productCounts);

        // Tạo mảng labels chứa tên sản phẩm
        var labels = productNames;

        // Tạo mảng data chứa số lượng sản phẩm tương ứng
        var data = productCounts;

        // Tạo mảng màu sắc
        var colors = ['rgba(54, 162, 235, 0.5)', 'rgba(255, 99, 132, 0.5)', 'rgba(255, 206, 86, 0.5)',
            'rgba(75, 192, 192, 0.5)', 'rgba(153, 102, 255, 0.5)'
        ];

        // Tạo biểu đồ Radar Chart bằng Chart.js
        var ctx = document.getElementById('myRadarChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'radar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Số lượng',
                    data: data,
                    backgroundColor: colors,
                    borderColor: colors,
                    borderWidth: 1,
                    fill: true // Tô màu vùng bên trong đường
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    r: {
                        suggestedMin: 0
                    }
                }
            }
        });
    </script>
@endsection
