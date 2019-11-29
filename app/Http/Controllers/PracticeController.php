<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pract;
use Validator;

class PracticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pract::all();
        return view('pract', compact('data'));
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
    public function store(Request $request)
    {

        $rules = array(
            'name'    =>  'required',
            'message'     =>  'required',
            'image'         =>  'required|image|max:2048'
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $image = $request->file('image');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('Pract'), $new_name);

        $data = new Pract;
        $data->name = $request->name;
        $data->message = $request->message;
        $data->image = $new_name;
        $data->save();
        
        return response()->json(['success' => 'Data Added successfully.']);
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
        if(request()->ajax())
        {
            $data = Pract::findOrFail($id);
            return response()->json(['data' => $data]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $image_name = $request->hidden_image;
        $image = $request->file('image');

        $rules = array(
            'name'    =>  'required',
            'message'     =>  'required',
            'image'         =>  'required|image|max:2048'
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $data = Pract::find($request->hidden_id);

        $image_name = rand() . '.' . $image->getClientOriginalExtension();
        unlink('Pract/'.$data->image);
        $image->move(public_path('Pract'), $image_name);


        $data->name = $request->name;
        $data->message = $request->message;
        $data->image = $image_name;
        $data->update();

        return response()->json(['success' => 'Data is successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletes(Request $request)
    {
        $data = Pract::find($request -> id);

        if(file_exists('Pract/'.$data->image)){
            unlink('Pract/'.$data->image);
        }
        $data -> delete();
        return "Delete";
    }
}
