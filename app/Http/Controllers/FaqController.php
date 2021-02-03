<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\DataTables\FaqDataTable;


class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FaqDataTable $dataTable, Request $request)
    {
        return $dataTable->render('admin.faqs.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Faq $faq)
    {
        $data['model'] = $faq;
        return view('admin.faqs.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Faq $faq)
    {
        $this->_validate($request);
        $this->_save($request, $faq);

        return redirect()->route('admin.faqs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        $data['model'] = $faq;

        return view('admin.faqs.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faq $faq)
    {
        $this->_validate($request);
        $this->_save($request, $faq);

        return redirect()->route('admin.faqs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Faq $faq)
    {
        if($faq) {
            $faq->delete();
        }
        if($request->ajax()){
            return response()->json(true);
        }
        return redirect()->route('admin.faqs.index');
    }

    protected function _validate($request, $id = null)
    {
        $this->validate($request, [
            'question' => "required",
            'answer' => "required"
        ]);
    }

    protected function _save($request, $model)
    {
        $model->fill($request->except(['_token']));
        $model->save();
    }
}
