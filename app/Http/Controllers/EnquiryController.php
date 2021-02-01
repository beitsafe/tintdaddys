<?php

namespace App\Http\Controllers;

use App\Mail\EnquirySent;
use Illuminate\Support\Facades\Mail;
use App\Models\Enquiry;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.equiries');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Enquiry $enquiry)
    {
        $this->_save($request, $enquiry);

        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new EnquirySent($enquiry));

        return redirect()->route('contact')->with();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Enquiry  $enquiry
     * @return \Illuminate\Http\Response
     */
    public function show(Enquiry $enquiry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Enquiry  $enquiry
     * @return \Illuminate\Http\Response
     */
    public function edit(Enquiry $enquiry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Enquiry  $enquiry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enquiry $enquiry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Enquiry  $enquiry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enquiry $enquiry)
    {
        //
    }

    protected function _validate($request, $id = null)
    {
        $this->validate($request, [
            'name' => "required",
            'email' => "required|email",
            'message' => "required",
            'g-recaptcha-response' => 'required|captcha',
        ]);
    }

    protected function _save($request, $model)
    {
        $model->fill($request->except(['_token']));
        $model->save();
    }
}
