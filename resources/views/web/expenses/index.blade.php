@extends('web.layouts.main')
@section('title', 'Items Category')
@section('contents')
    @push('custom-css')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Bootstrap Icons -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
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
                <!-- Header -->
                <div class="card-header bg-success text-white text-center rounded-top-4">
                    <h5 class="mb-0">
                        <i class="bi bi-list-ul me-2"></i> Expense Details
                    </h5>
                </div>

                <!-- Body -->
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
                                {{-- <!-- Row 1 -->
                                <tr>
                                    <td data-label="#">1</td>
                                    <td data-label="Category">Food & Groceries</td>
                                    <td data-label="Amount">₹ 1,200</td>
                                    <td data-label="Payment">UPI</td>
                                    <td data-label="Date">2025-09-18</td>
                                    <td data-label="Notes">Dinner with friends</td>
                                    <td data-label="Actions">
                                        <div class="d-flex gap-1 justify-content-end">
                                            <button class="btn btn-sm btn-warning">
                                                <i class="bi bi-pencil"></i>
                                            </button>
                                            <button class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Row 2 -->
                                <tr>
                                    <td data-label="#">2</td>
                                    <td data-label="Category">Transportation</td>
                                    <td data-label="Amount">₹ 300</td>
                                    <td data-label="Payment">Cash</td>
                                    <td data-label="Date">2025-09-17</td>
                                    <td data-label="Notes">Auto fare</td>
                                    <td data-label="Actions">
                                        <div class="d-flex gap-1 justify-content-end">
                                            <button class="btn btn-sm btn-warning">
                                                <i class="bi bi-pencil"></i>
                                            </button>
                                            <button class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr> --}}

                            </tbody>
                        </table>
                    </div>

                    <!-- Total Expense -->
                    <div class="alert alert-info mt-3 rounded-3 text-center">
                        <h6 class="mb-0">
                            <i class="bi bi-bar-chart-line me-2"></i>
                            <strong>Total Expenses:</strong> ₹ {{ $total_expense }}
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
