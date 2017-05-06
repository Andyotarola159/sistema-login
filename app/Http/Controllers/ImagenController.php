<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Input;
use Session;
use Auth;
use App\User;
use App\Imagen;

class ImagenController extends Controller
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
        $usuario=User::find($id);
        $rules=array('foto'=> 'mimes:jpg,png,jpeg,gif|max:1000');
        $validator=Validator::make(Input::all(),$rules);
        $file=Input::file('foto');
        $name=$file->getClientOriginalName();
        $imagen=Imagen::find($id);
        $imagen->user()->associate($usuario);

        if($validator->fails()){

            return back()->withErrors($validator);
            
        }
        
        if ($imagen==null) {
            
            Imagen::create([

                'foto'=>$name,
            ]);

           return back();

        }
        else{

            $imagen->fill([

                'foto'=>$name

            ]);

            $file->move('imagenes',$name);

            $imagen->save();

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
