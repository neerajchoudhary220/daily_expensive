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


    @push('custom-js')
        @include('web.layouts.includes.datatable-js')
        {{ $dataTable->scripts() }}
        <script>
            $(document).ready(function() {
                // //Click To Add New Category
                // $("#add-new-category-btn").on("click", function() {
                //     Livewire.dispatch('add-new-category-event');
                // });

                // //Click To Edit Button
                // $(document).on("click", '.category-edit', function() {
                //     const categoryId = $(this).data('id');
                //     Livewire.dispatch('edit-category-event', {
                //         'items_category': categoryId
                //     });
                // })
            });
        </script>
    @endpush
@endsection
