<?php

namespace App\DataTables;

use App\Models\SizeShade;
use Yajra\DataTables\Services\DataTable;

class SizeShadeDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->editColumn('size', function ($sizeshade) {
                return "<input class='form-control' type='text' name=rows[{$sizeshade->id}][size] value='{$sizeshade->size}' />";
            })
            ->editColumn('shade', function ($sizeshade) {
                return "<input class='form-control' type='text' name=rows[{$sizeshade->id}][shade] value='{$sizeshade->shade}' />";
            })
            ->editColumn('quantity', function ($sizeshade) {
                return "<input class='form-control' type='text' name=rows[{$sizeshade->id}][quantity] value='{$sizeshade->quantity}' />";
            })
            ->editColumn('price', function ($sizeshade) {
                return "<input class='form-control' type='text' name=rows[{$sizeshade->id}][price] value='{$sizeshade->price}' />";
            })
            ->addColumn('action', function ($sizeshade) {
                return '<button class="btn btn-sm btn-danger btn-delete" type="button" data-id="' . $sizeshade->id . '" data-model="sizeshades" data-loading-text="<i class=\'fa fa-spin fa-spinner\'></i> Please Wait..."><i class="la la-trash"></i> Delete</a>';
            })
            ->rawColumns(['size', 'shade', 'quantity', 'price', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Enquiry $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(SizeShade $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        $parameters = $this->getBuilderParameters();
        array_push($parameters['buttons'], [
            'text' => 'Save',
            'className' => 'dt-button-primary save-form',
            'action' => 'function ( e, dt, node, config ) { node.closest("form").submit(); }'
        ]);
        $parameters['paging'] = false;
//        $parameters['orderCellsTop'] = true;
        $parameters['fixedHeader'] = true;

        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '150px'])
            ->parameters($parameters);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            [
                'data' => 'size',
                'name' => 'size',
                'title' => 'Size',
                'orderable' => false,
            ],
            [
                'data' => 'shade',
                'name' => 'shade',
                'title' => 'shade',
                'orderable' => false,
            ],
            [
                'data' => 'quantity',
                'name' => 'quantity',
                'title' => 'quantity',
                'orderable' => false,
            ],
            [
                'data' => 'price',
                'name' => 'price',
                'title' => 'price',
                'orderable' => false,
            ],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'SizeShadedatatable_' . time();
    }
}
