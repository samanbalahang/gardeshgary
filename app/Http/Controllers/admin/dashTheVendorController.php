<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\TheVendor;
use App\Models\admin\VendorCategory;
use App\Models\admin\Media;
use App\Http\Controllers\admin\dashMediaController;

class dashTheVendorController extends Controller
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
        $firstMedias = Media::limit(10)->get();
        if(isset($firstMedias)){
            // return view("panel.theVendor.create" ,compact("firstMedias"));
            return view("mainMgn.theVendor.create" ,compact("firstMedias"));
        }else{
            // return view("panel.theVendor.create");
            return view("mainMgn.theVendor.create");
        }
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->vendor_name);
        // print_r($request->input('vendor_name'));
        $report = TheVendor::create($request->all());
        return $report->id;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
       
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
        $id = $request->id;
        $file = $request->file('indeximg');
        $mediaId = null;
        if($file != ""){
            $savefile = new dashMediaController;
            $mediaId = $savefile->saveFile($file);
        }
        $request['media_id'] = $mediaId;
        $vendor =  TheVendor::find($id)->update($request->all());
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
        $cat_names =$request->cat_names;
        $id = $request->id;
        foreach ($cat_names as $cat_name) {
            $theCat = new VendorCategory;
            $theCat->cat_name = $cat_name;
            $theCat->cat_parent_id = "0";
            if($theCat->save()){
                echo "done";
            }
        } 
    }
}
