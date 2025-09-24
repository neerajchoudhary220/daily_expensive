@extends('web.layouts.main')
@section('title', 'Expenses')
@section('contents')

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
                        <i class="bi bi-list-ul me-2"></i> Expense Details ({{ $dateRange }})
                    </h5>
                </div>

                <div class="card-body p-3">
                    @include('web.expenses.expense-table-filter')

                    <hr>

                    @livewire('expenses.total-expense')
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
            <script src="{{ asset('assets/js/expense/expense-filter.js') }}"></script>
            <script>
                $(document).ready(function() {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}",
                        }

                    })
                    $("#add-new-expenses-btn").on("click", function() {
                        Livewire.dispatch('show-add-expense-model-event')
                    })

                })
            </script>
        @endpush
    @endsection
