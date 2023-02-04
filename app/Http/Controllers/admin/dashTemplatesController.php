<?php

namespace App\Http\Controllers;

use App\Models\admin\templates;
use Illuminate\Http\Request;

class dashTemplatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("mainMgn.Templates.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin\templates  $templates
     * @return \Illuminate\Http\Response
     */
    public function show(templates $templates)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin\templates  $templates
     * @return \Illuminate\Http\Response
     */
    public function edit(templates $templates)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin\templates  $templates
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, templates $templates)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin\templates  $templates
     * @return \Illuminate\Http\Response
     */
    public function destroy(templates $templates)
    {
        //
    }
}
