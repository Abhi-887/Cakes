<?php

namespace App\DataTables;

use App\Models\Coupon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class CouponDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($query) {
                $edit = "<a href='" . route('admin.coupon.edit', $query->id) . "' class='btn btn-primary'><i class='fas fa-edit'></i></a>";
                $delete = "<a href='" . route('admin.coupon.destroy', $query->id) . "' class='btn btn-danger delete-item ml-2'><i class='fas fa-trash'></i></a>";

                return $edit . $delete;
            })
            ->addColumn('status', function ($query) {
                return $query->status === 1
                    ? '<span class="badge badge-primary">Active</span>'
                    : '<span class="badge badge-danger">Inactive</span>';
            })
            ->addColumn('category_name', function ($query) {
                return $query->category ? $query->category->name : 'N/A'; // Get the main category name
            })
            ->addColumn('sub_category_name', function ($query) {
                return $query->subCategory ? $query->subCategory->name : 'N/A'; // Get the subcategory name
            })
            ->rawColumns(['action', 'status'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Coupon $model): QueryBuilder
    {
        return $model->newQuery()->with(['category', 'subCategory']); // Eager load both category and subCategory relationships
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('coupon-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(0)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('name'),
            Column::make('code'),
            Column::make('quantity'),
            Column::make('discount_type'),
            Column::make('discount'),
            Column::make('category_name') // Main category name
                ->title('Category'),
            Column::make('sub_category_name') // Subcategory name
                ->title('Subcategory'),
            Column::make('start_date'),
            Column::make('expire_date'),
            Column::make('status'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(150)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Coupon_' . date('YmdHis');
    }
}
