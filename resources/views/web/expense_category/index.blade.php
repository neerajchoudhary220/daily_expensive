@extends('web.layouts.main')
@section('title', 'Expenses Category')
@section('contents')
    <h2>Category</h2>
    <div class="row">
        {{ $dataTable->table() }}
    </div>
    @push('custom-js')
        @include('web.layouts.includes.datatable-js')
        {{ $dataTable->scripts() }}
    @endpush
@endsection
