@extends('web.layouts.main')
@section('title', 'Dashboard')
@section('contents')
    <h4 class="mb-0">Dashboard</h4>
    <hr>
    <div class="container py-2 bg-light">
        @include('web.expenses.expense-table-filter')

        <div class="card shadow-lg border-0 rounded-4 mt-3">
            <!-- Header -->
            <div class="card-header alert alert-secondary d-flex justify-content-between align-items-center" role="button"
                data-bs-toggle="collapse" href="#chart-and-card">
                <h6 class="mb-0">
                    <i class="bi bi-bar-chart-line me-1 text-info"></i> Expenses
                </h6>
                <i class="bi bi-chevron-down text-dark"></i>
            </div>

            <!-- Body -->
            <div class="card-body collapse hide" id="chart-and-card">
                <div class="row mt-3">
                    <div class="col-lg-6 col-sm-12 col-md-12 mb-3">
                        @livewire('dashboard-expense')
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
        </div>



    </div>

    @push('custom-js')
        <script src="{{ asset('assets/js/apexchart.js') }}"></script>
        <script src="{{ asset('assets/js/web_dashboard/dashboard.js') }}"></script>
        <script src="{{ asset('assets/js/expense/expense-filter.js') }}"></script>
    @endpush
@endsection
