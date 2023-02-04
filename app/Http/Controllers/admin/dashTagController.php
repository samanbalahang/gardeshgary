<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Thevendor;
use App\Models\admin\Tag;

class dashTagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function ajax(Request $request)
    {
        $tag_names =$request->tag_names;
        $id = $request->id;
        $thevendor = Thevendor::find($id);
        foreach ($tag_names as $tag_name) {
            $theTag = new Tag;
            $theTag->tag_name = $tag_name;
            $theTag->tag_uri = $string = preg_replace('/\s+/', "-", $tag_name);
            $theTag->number_of_used = "1";
            if($theTag->save()){
                $theTag->vendors()->attach($thevendor);
                echo "done";
            }
        } 
        // $request->tag_names;
        // $request["tag_uri"] = "1";
        // $request['number_of_used']=1;
        // $tags = Tag::create($request->all());
        // return $tags->id;
        return true;
    }
}