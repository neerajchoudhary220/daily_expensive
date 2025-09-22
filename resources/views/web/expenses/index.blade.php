@extends('web.layouts.main')
@section('title', 'Items Category')
@section('contents')
    @push('custom-css')
        <!-- DataTables Responsive -->
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">
    @endpush

    <div class="row mb-3">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Expenses</h4>
            <button class="btn btn-info btn-sm text-white" id="add-new-expenses-btn">
                <i class="bi bi-plus me-2"></i>Add New Expenses
            </button>
        </div>
    </div>
    <hr>


    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-success text-white text-center rounded-top-4">
                    <h5 class="mb-0">
                        <i class="bi bi-list-ul me-2"></i> Expense Details
                    </h5>
                </div>

                <div class="card-body p-3">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0" id="expense-dt-tbl">
                            <thead class="table-primary">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Amount</th>
                                    <th>Payment</th>
                                    <th>Date</th>
                                    <th>Notes</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>

                    <div class="alert alert-info mt-3 rounded-3 d-flex justify-content-around">
                        <h6 class="mb-0">
                            <i class="bi bi-bar-chart-line me-2"></i>
                            <strong>Total Expenses:</strong> ₹ {{ $total_expense }}
                        </h6>
                        <h6 class="mb-0">
                            <i class="bi bi-calendar-check me-2"></i>
                            <strong>Today:</strong> ₹ {{ $today_expense }}
                        </h6>
                    </div>
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
