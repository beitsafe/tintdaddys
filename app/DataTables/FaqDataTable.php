<?php

namespace App\DataTables;

use App\Models\Faq;
use Yajra\DataTables\Services\DataTable;

class FaqDataTable extends DataTable
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
            ->addColumn('action', function ($faqs) {

                $action = '<a href="' . url('admin/faqs/' . $faqs->id . '/edit') . '" class="btn btn-sm btn-warning btn-edit" type="button"><i class="la la-edit"></i> Edit</a>';
                $action .= ' <button class="btn btn-sm btn-danger btn-delete" type="button" data-id="' . $faqs->id . '" data-model="faqs" data-loading-text="<i class=\'fa fa-spin fa-spinner\'></i> Please Wait..."><i class="la la-trash"></i> Delete</a>';
                return $action;
            })
            ->rawColumns(['action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Faq $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Faq $model)
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
            'question',
            'answer',
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Faqdatatable_' . time();
    }
}
