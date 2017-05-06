<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Input;
use Session;
use Auth;
use \App\Video;


class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('videos.video');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    
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
        $files=Input::file('video');
        $nombre=$files->getClientOriginalName();
        $user=Video::find($id);
        $rules=array('video'=> 'mimes:application/octet-stream|min:10000000');
        $validator=Validator::make(Input::all(),$rules);
     

        /*if($validator->fails()){

            return back()->withErrors($validator);
            
        }*/
        
        if ($user==null) {
            
            Video::create([

                'video'=>$nombre,
                'user_id'=>$id
            ]);

            return back();

        }
        else{

            $user->fill([

                'video'=>$nombre

            ]);

            $files->move('imagenes',$nombre);

            $user->save();

            return back();

        } 
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
}
