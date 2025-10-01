@extends('web.layouts.main')
@section('title', 'Income Transactions')
@section('contents')

    <div class="row mb-3">
        <div class="col-lg-12 d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Income Transaction</h4>
            <button class="btn btn-info btn-sm text-white" id="add-new-transaction-btn">
                <i class="bi bi-plus me-2"></i>Add New Transaction
            </button>
        </div>
    </div>
    <hr>


    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-success text-white text-center rounded-top-4">
                    <h5 class="mb-0">
                        <i class="bi bi-list-ul me-2"></i> Income Transactions
                    </h5>
                </div>

                <div class="card-body p-3">
@include('web.expenses.expense-table-filter')
                    <hr>

                    <div class="row">

                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0 w-100" id="income-trasaction-dt-tbl">
                                <thead class="table-info">
                                    <tr>
                                        <th>#</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                        <th>Category</th>
                                        <th>Notes</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <div>
            @livewire('income-source.add-edit-income-source')
        </div>



        @push('custom-js')
            @include('web.layouts.includes.datatable-js')
            <script>
                const expense_list_url = "{{route('income_transaction.list')}}";
                $(document).ready(function() {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}",
                        }
                    })
                    //Add a new transaction 
                    $("#add-new-transaction-btn").on("click", function() {
                        Livewire.dispatch('add-income-source-event')
                    })

                })
            </script>
            <script src="{{asset('assets/js/income-transactions/income-trasaction-dt.js')}}"></script>
        @endpush
    @endsection
