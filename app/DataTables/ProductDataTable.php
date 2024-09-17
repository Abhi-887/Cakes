<?php

namespace App\DataTables;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProductDataTable extends DataTable
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
                $edit = "<a href='" . route('admin.product.edit', $query->id) . "' class='btn btn-outline-primary btn-sm'><i class='fas fa-edit'></i> Edit</a>";
                $delete = "<a href='" . route('admin.product.destroy', $query->id) . "' class='btn btn-outline-danger btn-sm mx-1 delete-item'><i class='fas fa-trash'></i> Delete</a>";

                $more = '<div class="btn-group dropstart">
                <button type="button" class="btn btn-outline-dark btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-cog"></i> More</button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="' . route('admin.product-gallery.show-index', $query->id) . '"><i class="fas fa-image"></i> Product Gallery</a></li>
                  <li><a class="dropdown-item" href="' . route('admin.products-variant.index', ['product' => $query->id]) . '"><i class="fas fa-tags"></i> Variants</a></li>
                </ul>
              </div>';

                return $edit . $delete . $more;
            })
            ->addColumn('price', function ($query) {
                return currencyPosition($query->price);
            })
            ->addColumn('offer_price', function ($query) {
                return currencyPosition($query->offer_price);
            })
            ->addColumn('status', function ($query) {
                if ($query->status === 1) {
                    return '<span class="badge bg-success">Active</span>';
                } else {
                    return '<span class="badge bg-danger">Inactive</span>';
                }
            })
            ->addColumn('show_at_home', function ($query) {
                if ($query->show_at_home === 1) {
                    return '<span class="badge bg-info">Yes</span>';
                } else {
                    return '<span class="badge bg-secondary">No</span>';
                }
            })
            ->addColumn('image', function ($query) {
                return '<img class="img-thumbnail" width="60px" src="' . asset($query->thumb_image) . '">';
            })
            ->addColumn('category', function ($query) {
                return $query->category->name;
            })
            ->rawColumns(['offer_price', 'price', 'status', 'show_at_home', 'action', 'image'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Product $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('product-table')
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
            Column::make('id')->title('ID'),
            Column::make('image')->title('Image'),
            Column::make('name')->title('Product Name'),
            Column::make('category')->title('Category'),
            Column::make('price')->title('Price'),
            Column::make('offer_price')->title('Offer Price'),
            Column::make('quantity')->title('Available Qty'),
            Column::make('show_at_home')->title('Show at Home'),
            Column::make('status')->title('List Product'),
            Column::computed('action')
                ->title('Actions')
                ->exportable(false)
                ->printable(false)
                ->width(220)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Product_' . date('YmdHis');
    }
}
