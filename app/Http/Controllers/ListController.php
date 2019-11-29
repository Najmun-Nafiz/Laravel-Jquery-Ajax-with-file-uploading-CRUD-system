<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use\Carbon\Carbon;
use Validator;
class ListController extends Controller
{
    public function index()
    {
    	$info = Item::all();
    	return view('list', compact('info'));
    }

    public function create(request $request)
    {
    	
        
    }


    public function najmun(Request $request)
    {
        $rules = array(
                    'item'    =>  'required',
                    'email'     =>  'required',
                    'image'         =>  'required|image|max:2048'
                );

                $error = Validator::make($request->all(), $rules);

                if($error->fails())
                {
                    return response()->json(['errors' => $error->errors()->all()]);
                }

                $image = $request->file('image');
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $new_name);

                $data = new Item;
                $data->item = $request->item;
                $data->email = $request->email;
                $data->image = $new_name;
                $data->save();
                
                return response()->json(['success' => 'Data Added successfully.']);
        
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
               $data = Item::findOrFail($id);
               return response()->json(['data' => $data]);
           }
       }

    

    public function update(Request $request)
    {

        $image_name = $request->hidden_image;
        $image = $request->file('image');

        if($image != '')
        {
            $rules = array(
                'item'    =>  'required',
                'email'     =>  'required',
                'image'         =>  'image|max:2048'
            );

            
            $data = Item::find($request->hidden_id);
            $error = Validator::make($request->all(), $rules);
            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }

            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            unlink('images/'.$data->image);
            $image->move(public_path('images'), $image_name);
        }
        else{

            $rules = array(
                'item'    =>  'required',
                'email'     =>  'required'
            );

            $error = Validator::make($request->all(), $rules);

            if($error->fails()){

                return response()->json(['errors' => $error->errors()->all()]);
            }
        }

        $data->item = $request->item;
        $data->email = $request->email;
        $data->image = $image_name;
        $data->update();

        return response()->json(['success' => 'Data is successfully updated']);


    
    }


    public function delete(Request $request)
    {
        $data = Item::find($request -> id);

        if(file_exists('images/'.$data->image)){
            unlink('images/'.$data->image);
        }
        $data -> delete();
        return "Delete";
    }

}
