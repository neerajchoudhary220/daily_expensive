@extends('web.layouts.main')
@section('title', 'Dashboard')
@section('contents')
    <h4 class="mb-0">Dashboard</h4>
    <hr>
    <div class="container py-2 bg-light">

        <div class="row">
            <div class="col-lg-6 col-sm-12 col-md-12 mb-3">
                <div class="card">
                    <div class="card-header alert alert-info">
                        <h6>Expense Category</h6>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <!-- Food -->
                            <div class="col-12 col-sm-6 col-md-4">
                                <div class="card expense-card p-2 h-100 d-flex justify-content-center align-items-center"
                                    style="background: linear-gradient(135deg,#ff9a9e,#ff6a88);">
                                    <div class="card-body text-center">
                                        <i class="bi bi-cup-hot-fill expense-icon"></i>
                                        <div class="expense-category">Food & Groceries</div>
                                        <div class="expense-amount">₹ 5,200</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Transport -->
                            <div class="col-12 col-sm-6 col-md-4">
                                <div class="card expense-card p-2 h-100 d-flex justify-content-center align-items-center"
                                    style="background: linear-gradient(135deg,#56ab2f,#a8e063);">
                                    <div class="card-body text-center">
                                        <i class="bi bi-bus-front-fill expense-icon"></i>
                                        <div class="expense-category">Transport</div>
                                        <div class="expense-amount">₹ 1,800</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Utilities -->
                            <div class="col-12 col-sm-6 col-md-4">
                                <div class="card expense-card p-2 h-100 d-flex justify-content-center align-items-center"
                                    style="background: linear-gradient(135deg,#36d1dc,#5b86e5);">
                                    <div class="card-body text-center">
                                        <i class="bi bi-lightning-charge-fill expense-icon"></i>
                                        <div class="expense-category">Utilities</div>
                                        <div class="expense-amount">₹ 2,500</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Health -->
                            <div class="col-12 col-sm-6 col-md-4">
                                <div class="card expense-card p-2 h-100 d-flex justify-content-center align-items-center"
                                    style="background: linear-gradient(135deg,#ff758c,#ff7eb3);">
                                    <div class="card-body text-center">
                                        <i class="bi bi-heart-pulse-fill expense-icon"></i>
                                        <div class="expense-category">Health</div>
                                        <div class="expense-amount">₹ 900</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Education -->
                            <div class="col-12 col-sm-6 col-md-4">
                                <div class="card expense-card p-2 h-100 d-flex justify-content-center align-items-center"
                                    style="background: linear-gradient(135deg,#f7971e,#ffd200);">
                                    <div class="card-body text-center">
                                        <i class="bi bi-mortarboard-fill expense-icon"></i>
                                        <div class="expense-category">Education</div>
                                        <div class="expense-amount">₹ 12,000</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Entertainment -->
                            <div class="col-12 col-sm-6 col-md-4">
                                <div class="card expense-card p-2 h-100 d-flex justify-content-center align-items-center"
                                    style="background: linear-gradient(135deg,#4b6cb7,#182848);">
                                    <div class="card-body text-center">
                                        <i class="bi bi-film expense-icon"></i>
                                        <div class="expense-category">Entertainment</div>
                                        <div class="expense-amount">₹ 1,200</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Shopping -->
                            <div class="col-12 col-sm-6 col-md-4">
                                <div class="card expense-card p-2 h-100 d-flex justify-content-center align-items-center"
                                    style="background: linear-gradient(135deg,#00c6ff,#0072ff);">
                                    <div class="card-body text-center">
                                        <i class="bi bi-cart-fill expense-icon"></i>
                                        <div class="expense-category">Shopping</div>
                                        <div class="expense-amount">₹ 3,400</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Other -->
                            <div class="col-12 col-sm-6 col-md-4">
                                <div class="card expense-card p-2 h-100 d-flex justify-content-center align-items-center"
                                    style="background: linear-gradient(135deg,#11998e,#38ef7d);">
                                    <div class="card-body text-center">
                                        <i class="bi bi-cash-coin expense-icon"></i>
                                        <div class="expense-category">Other</div>
                                        <div class="expense-amount">₹ 700</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
            <div class="col-lg-6 col-sm-12 col-md-12 mb-3">
                <div class="card">
                    <div class="card-header alert alert-info">
                        <h6>Expenses Chart</h6>
                    </div>
                    <div class="card-body">
                        <div id="barChart">

                        </div>
                    </div>
                </div>

            </div>
        </div>



    </div>

    @push('custom-js')
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var options = {
                    chart: {
                        type: 'bar',
                        height: 400,
                        toolbar: {
                            show: true
                        },
                        zoom: {
                            enabled: false
                        }
                    },
                    series: [{
                        name: 'Expenses',
                        data: [4500, 2000, 1500, 3000, 3400, 2200, 2800, 1000] // Example values
                    }],
                    xaxis: {
                        categories: [
                            'Food & Groceries',
                            'Transportation',
                            'Utilities',
                            'Healthcare',
                            'Education',
                            'Entertainment',
                            'Shopping',
                            'Others'
                        ],
                        labels: {
                            rotate: -15,
                            rotateAlways: true,
                            style: {
                                fontSize: '12px'
                            }
                        }
                    },
                    yaxis: {
                        title: {
                            text: 'Amount (₹)'
                        }
                    },
                    plotOptions: {
                        bar: {
                            borderRadius: 6,
                            horizontal: false,
                            distributed: true // Different color per bar
                        }
                    },
                    dataLabels: {
                        enabled: true,
                        formatter: function(val) {
                            return "₹" + val;
                        },
                        style: {
                            fontSize: '12px'
                        }
                    },
                    colors: [
                        '#0d6efd', // Food & Groceries - blue
                        '#0dcaf0', // Transportation - cyan
                        '#198754', // Utilities - green
                        '#ffc107', // Healthcare - yellow
                        '#6f42c1', // Education - purple
                        '#fd7e14', // Entertainment - orange
                        '#d63384', // Shopping - pink
                        '#6c757d' // Others - gray
                    ],
                    tooltip: {
                        y: {
                            formatter: function(val) {
                                return "₹" + val;
                            }
                        }
                    },
                    responsive: [{
                            breakpoint: 768, // Mobile view
                            options: {
                                chart: {
                                    height: 350
                                },
                                xaxis: {
                                    labels: {
                                        rotate: -45,
                                        style: {
                                            fontSize: '10px'
                                        }
                                    }
                                },
                                dataLabels: {
                                    style: {
                                        fontSize: '10px'
                                    }
                                }
                            }
                        },
                        {
                            breakpoint: 480,
                            options: {
                                chart: {
                                    height: 300
                                },
                                xaxis: {
                                    labels: {
                                        rotate: -60,
                                        style: {
                                            fontSize: '8px'
                                        }
                                    }
                                },
                                dataLabels: {
                                    style: {
                                        fontSize: '8px'
                                    }
                                }
                            }
                        }
                    ]
                };

                var chart = new ApexCharts(document.querySelector("#barChart"), options);
                chart.render();
            });
        </script>
    @endpush
@endsection
