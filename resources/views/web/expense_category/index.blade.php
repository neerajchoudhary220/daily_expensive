@extends('web.layouts.main')
@section('title', 'Expenses Category')
@section('contents')
    <div class="row mb-3">
        <div class="d-flex justify-content-left">
            <div class="me-auto">
                <h4>Categories</h4>
            </div>
            <button class="btn btn-info btn-sm text-white" id="add-new-category-btn"><i class="bi bi-plus me-2"></i>Add New
                Category</button>
        </div>
    </div>
    <hr>
    <div class="row">
        {{ $dataTable->table() }}
    </div>

    @livewire('category.add-new-category')

    @push('custom-js')
        @include('web.layouts.includes.datatable-js')
        {{ $dataTable->scripts() }}
        <script>
            $(document).ready(function() {
                //Click To Add New Category
                $("#add-new-category-btn").on("click", function() {
                    Livewire.dispatch('add-new-category-event');
                });

                //Click To Edit Button
                $(document).on("click", '.category-edit', function() {
                    const categoryId = $(this).data('id');
                    Livewire.dispatch('edit-category-event', {
                        'expenses_category': categoryId
                    });
                })
            });
        </script>
    @endpush
@endsection
