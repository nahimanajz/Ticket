<?php

namespace App\Http\Controllers;

use App\Http\Resources\PersonResource;
use App\Http\Resources\PersonResourceCollection;
use App\Person as person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function show(Person $person,$id): PersonResource{
       
      return new PersonResource($person::find($id));      
    }
    public function index(): PersonResourceCollection {
       //return new PersonResourceCollection(Person::all());  // returning all found in person model
       return new PersonResourceCollection(Person::paginate());
    }
    public function store(Request $request)
    {  
        $request->validate([
           'first_name' =>'required',
           'last_name' => 'required|string',
           'email' => 'required',
           'phone' => 'required',
           'city' => 'required'
        ]);
        $person = Person::create($request->all());
       return new PersonResource($person);
    
    }
    public function update(Person $person, Request $request, $id): PersonResource {
       //update
       $person = Person::find($id);
       $person->update($request->all());
       return new PersonResource($person);
    }
}
