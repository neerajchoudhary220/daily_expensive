<?php

namespace App\DataTables;

use App\Models\Item;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Carbon;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ItemDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param  QueryBuilder<Item>  $query  Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('action', function ($item) {
                $item_id = $item->id;

                return "<div class='d-flex justify-content-center item-edit' data-id='$item_id'><button class='btn btn-warning text-white btn-sm'><i class='bi bi-pencil-fill'></i></button></div>";
            })
            ->addColumn('category', function ($item) {
                return $item->itemsCategory->name;
            })
            ->addColumn('created_by', function ($item) {
                return $item->user->name;
            })
            ->editColumn('created_at', fn ($category) => Carbon::parse($category->created_at)->format('Y-M-d'))
            // ->editColumn('updated_at', fn ($category) => Carbon::parse($category->updated_at)->format('Y-M-d'))

            ->setRowId('id')
            ->rawColumns(['action', 'category', 'created_by']);
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<Item>
     */
    public function query(Item $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('item-table')
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
            Column::make('name'),
            Column::make('category'),
            Column::make('created_by'),

            Column::make('created_at'),
            Column::make('updated_at'),
            Column::make('action')->addClass('text-center')->exportable(false)->printable(false)->orderable(false),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Item_'.date('YmdHis');
    }
}
