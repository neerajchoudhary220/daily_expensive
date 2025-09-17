<?php

namespace App\DataTables;

use App\Models\Expense;
use App\Models\Expenses;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Carbon;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ExpensesDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param  QueryBuilder<Expense>  $query  Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('name', function ($expenses) {
                return $expenses->item->name;
            })
            ->addColumn('category', function ($expenses) {
                return $expenses->itemCategory->name;
            })
            ->addColumn('unit', function ($expenses) {
                return $expenses->unit->name;
            })
            ->editColumn('date', function ($expenses) {
                return Carbon::parse($expenses->date)->format('d-M-Y');
            })
            ->addColumn('action', function ($expenses) {
                $expenses_id = $expenses->id;

                return "<div class='d-flex justify-content-center expense-edit' data-id='$expenses_id'><button class='btn btn-warning text-white btn-sm'><i class='bi bi-pencil-fill'></i></button></div>";
            })
            ->editColumn('created_at', fn ($expenses) => Carbon::parse($expenses->created_at)->format('d-M-Y'))
            // ->editColumn('updated_at', fn ($expenses) => Carbon::parse($expenses->updated_at)->format('d-M-Y'))
            ->setRowId('id')
            ->rawColumns(['action', 'name', 'category', 'unit', 'date']);
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<Expense>
     */
    public function query(Expenses $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('expenses-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                // Button::make('reset'),
                // Button::make('reload'),
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')
                ->title('#')
                ->searchable(false)
                ->orderable(false),
            Column::make('id')->hidden(),
            Column::make('name'),
            Column::make('category'),
            Column::make('unit'),
            Column::make('price'),
            Column::make('date'),
            Column::make('created_at'),
            // Column::make('updated_at'),
            Column::make('action')->addClass('text-center')->exportable(false)->printable(false)->orderable(false),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Expenses_'.date('YmdHis');
    }
}
