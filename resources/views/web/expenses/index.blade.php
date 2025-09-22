@extends('web.layouts.main')
@section('title', 'Items Category')
@section('contents')
    {{-- @push('custom-css')
        <!-- DataTables Responsive -->
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">
    @endpush --}}

    <div class="row mb-3">
        <div class="col-lg-12 d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Expenses</h4>
            <button class="btn btn-info btn-sm text-white" id="add-new-expenses-btn">
                <i class="bi bi-plus me-2"></i>Add New Expenses
            </button>
        </div>
    </div>
    <hr>


    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-success text-white text-center rounded-top-4">
                    <h5 class="mb-0">
                        <i class="bi bi-list-ul me-2"></i> Expense Details
                    </h5>
                </div>

                <div class="card-body p-3">
                    <div class="card">
                        <div class="card-header alert alert-secondary d-flex justify-content-between">
                            <h6><i class="bi bi-filter me-1"></i>Filter</h6>
                            <h6><i class="bi bi-plus-circle me-1 text-danger" role="button" data-bs-toggle="collapse"
                                    href="#filter-body"></i>
                            </h6>
                        </div>
                        <div class="card-body" id="filter-body">
                            <div class="col-lg-4 col-md-12 col-sm-12 mb-3">
                                <div class="align-items-center gap-2">
                                    <label for="categories" class="mb-0">Categories:</label>
                                    <select id="categories" class="form-select form-select-md">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>


                    <hr>

                    <div class="d-flex justify-content-between">
                        <div class="rounded-3 text-start total-box mb-3 p-2 alert alert-danger">
                            <small class="d-block mb-1">
                                <i class="bi bi-bar-chart-line me-1"></i> Total <span>₹{{ $total_expense }}</span>
                            </small>
                        </div>
                        <div class="rounded-3 text-start total-box mb-3 p-2 alert alert-warning ms-2">
                            <small class="d-block mb-1">
                                <i class="bi bi bi-calendar-check me-1"></i> Today <span>₹{{ $today_expense }}</span>
                            </small>
                        </div>
                    </div>
                    <div class="row">

                        @include('web.expenses.expense-table')

                    </div>
                </div>
            </div>
        </div>
        <div>
            @livewire('expenses.add-edit-expense')
        </div>



        @push('custom-js')
            @include('web.layouts.includes.datatable-js')
            <script>
                const expense_list_url = "{{ route('expense.list') }}";
            </script>
            <script src="{{ asset('assets/js/expense/expense-dt.js') }}"></script>
            <script>
                $(document).ready(function() {
                    $("#add-new-expenses-btn").on("click", function() {
                        Livewire.dispatch('show-add-expense-model-event')
                    })

                })
            </script>
        @endpush
    @endsection
