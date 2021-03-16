<?php

namespace App\DataTables;

use App\Models\Size;
use Yajra\DataTables\Services\DataTable;

class SizeDataTable extends DataTable
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
            ->addColumn('action', function ($sizes) {

                $action = '<a href="' . url('admin/sizes/' . $sizes->id . '/edit') . '" class="btn btn-sm btn-warning btn-edit" type="button"><i class="la la-edit"></i> Edit</a>';
                $action .= ' <button class="btn btn-sm btn-danger btn-delete" type="button" data-id="' . $sizes->id . '" data-model="sizes" data-loading-text="<i class=\'fa fa-spin fa-spinner\'></i> Please Wait..."><i class="la la-trash"></i> Delete</a>';
                return $action;
            })
            ->rawColumns(['action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Size $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Size $model)
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
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '150px'])
            ->parameters($this->getBuilderParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'name',
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Sizedatatable_' . time();
    }
}
