<?php
// app/DataTables/SliderDataTable.php

namespace App\DataTables;
use App\Models\SliderCategory2;
use App\Models\Slider2;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;



class Slider2DataTable extends DataTable
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
                $edit = "<a href='".route('admin.slider2.edit', $query->id)."' class='btn btn-primary'><i class='fas fa-edit'></i></a>";
                $delete = "<a href='".route('admin.slider2.destroy', $query->id)."' class='btn btn-danger delete-item ml-2'><i class='fas fa-trash'></i></a>";

                return $edit.$delete;
            })
            ->addColumn('image', function($query){
                return '<img width="100px" src="'.asset($query->image).'">';
            })
        
			
			->addColumn('category_id', function($query){
			return $query->sliderCategory2 ? $query->sliderCategory2->category : ''; // Check if the related category exists
		})

			
		
			
            ->addColumn('status', function($query){
                if($query->status === 1){
                    return '<span class="badge badge-primary">Active</span>';
                } else {
                    return '<span class="badge badge-danger">InActive</span>';
                }
            })
			
            ->rawColumns(['image', 'action', 'status'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
 public function query(Slider2 $model): QueryBuilder
    {
        return $model->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('sliders2-table') // Update to slider2-table
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
                Button::make('reload'),
            ]);
    }

    public function getColumns(): array
    {
        return [
            Column::make('id')->width(60),
            Column::make('image')->width(150),
            Column::make('title'),
            Column::make('category_id')->width(150)->title('Category'),
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
        return 'Slider_' . date('YmdHis');
    }
}


