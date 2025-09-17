@extends('web.layouts.main')
@section('title', 'Items Category')
@section('contents')
    <div class="row mb-3">
        <div class="d-flex justify-content-left">
            <div class="me-auto">
                <h4>Expenses</h4>
            </div>
            <button class="btn btn-info btn-sm text-white" id="add-new-expenses-btn"><i class="bi bi-plus me-2"></i>Add New
                Expenses</button>
        </div>
    </div>
    <hr>
    <div class="row">
        {{ $dataTable->table() }}
    </div>
    <div>
        @livewire('expenses.add-edit-expense')
    </div>

    @push('custom-js')
        @include('web.layouts.includes.datatable-js')
        {{ $dataTable->scripts() }}
        <script>
            $(document).ready(function() {
                $("#add-new-expenses-btn").on("click", function() {
                    Livewire.dispatch('show-add-expense-model-event')
                })
                // Click To Edit Button
                $(document).on("click", '.expense-edit', function() {
                    const expense_id = $(this).data('id');
                    Livewire.dispatch('edit-expense-event', {
                        'expense': expense_id
                    });
                })
            })
        </script>
    @endpush
@endsection
