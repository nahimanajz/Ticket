<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use Illuminate\Support\Facades\Validator;

class ApiCountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
          Country::all()
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
        $rules = [
            "name" => "string|required|min:3",
            "code" => "string|required|max:2",
            "continent" => "required"
        ];
        $validate = Validator::make($request->all(), $rules);
        if($validate->fails()){
            return response()->json($validate->errors(), 400);
        }
        $country = Country::create($request->all());
        return response()->json($country, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $country = Country::find($id);
        if(is_null($country)){
            return response()->json([
                "Message" => "country not found"
            ]);
        } else {
            return response()->json($country, 200);
        }
        
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
        $country = Country::find($id);
        if(is_null($country)){
            return response()->json([
                "Message" => "country not found"
            ]);
        } else {
            $country->update($request->all());
            return response()->json($country, 200);
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
        $country = Country::find($id);
        if(is_null($country)){
            return response()->json([
                "Message" => "country not found"
            ]);
        } else {
            $country->delete();
            return response()->json(["message" => "Country is deleted"], 204);
        }
    }
}
