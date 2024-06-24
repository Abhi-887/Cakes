<?php

namespace App\DataTables;

use App\Models\Workwithus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class WorkwithusDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'subscriber.action')
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Workwithus $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('Workwithus-table')
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
            Column::make('job_reference'),
            Column::make('name'),
            Column::make('email'),
            Column::make('telephone'),
            Column::make('driving_license'),
            Column::make('why_ideal'),
            Column::make('relevant_experience'),
            Column::make('current_position_duration'),
            Column::make('portfolio'),
            Column::make('cv'),

        ];
    }


    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Workwithus_' . date('YmdHis');
    }
}
