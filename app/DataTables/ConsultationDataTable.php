<?php

namespace App\DataTables;

use App\Models\Consultation;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ConsultationDataTable extends DataTable
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
    public function query(Consultation $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('subscriber-table')
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
            Column::make('first_name'),
			Column::make('surname'),
			Column::make('email'),
			Column::make('phone'),
			Column::make('event_date'),
			Column::make('number_of_guests'),
			Column::make('other_information'),
			
			Column::make('cake_budget'),
			Column::make('consultation_store'),
			Column::make('consultation_type'),
			Column::make('existing_order'),
			Column::make('cake_type'),
			
			Column::make('booking_status'),
			Column::make('consultation_date'),
			Column::make('consultation_time'),
			
			

        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Consultation_' . date('YmdHis');
    }
}
