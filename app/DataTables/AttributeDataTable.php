<?php

namespace App\DataTables;

use App\Models\Product;
use App\Models\Attribute;
use App\Models\AttributeOption ;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AttributeDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function($query){
				$attribute = "<a href='".route('admin.attribute.create', $query->id)."' class='btn btn-primary mr-2'><i class='fas fa-edit'></i></a>";
                $edit = "<a href='".route('admin.attribute.edit', $query->id)."' class='btn btn-primary'><i class='fas fa-edit'></i></a>";
               /*  $delete = "<a href='".route('admin.attribute.destroy', $query->id)."' class='btn btn-danger delete-item mx-2'><i class='fas fa-trash'></i></a>"; */
                return $attribute.$edit;
            })
            ->addColumn('title', function($query){
                return ($query->title);
            })
            ->addColumn('input_type', function($query){
                return ($query->input_type);
            })
            ->addColumn('is_required', function($query){
                if($query->status === 1){
                    return '<span class="badge badge-primary">Yes</span>';
                }else {
                    return '<span class="badge badge-danger">No</span>';
                }
            })

            ->addColumn('short_order', function($query){
                 return ($query->short_order);
            })
            ->addColumn('option_description', function($query){
                return ($query->option_description);
            })
            ->rawColumns(['title', 'input_type', 'is_required', 'short_order', 'action', 'short_order', 'option_description'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Attribute $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('product_attrs-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
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
            Column::make('title'),
            Column::make('input_type'),
            Column::make('is_required'),
            Column::make('short_order'),
            Column::make('option_description'),
            Column::make('product_id'),
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
        return 'Attribute_' . date('YmdHis');
    }
}
