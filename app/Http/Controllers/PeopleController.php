<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\Request;
use App\Http\Requests\PeopleRequest;
use App\Http\Resources\PeopleResource;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->showAll(PeopleResource::collection(People::get()));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PeopleRequest $request)
    {
        try{

            $people = People::where('email', $request->validated())->count();

            if($people == 0){
                
                People::create($request->validated());
            } 

           return People::where('email', $request->validated())->get();

        } catch (Exception $e){
            
            return $e;

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\People  $people
     * @return \Illuminate\Http\Response
     */
    public function show(People $people)
    {
        try {

            return $this->showOne(new PeopleResource($people));

        } catch (Exception $e){

            return $e;

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\People  $people
     * @return \Illuminate\Http\Response
     */
    public function update(PeopleRequest $request, People $people)
    {
        try {
            

            $people->update($request->validated());

            return $this->successFullResponse();

        } catch (Exception $e){

            return $e;

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\People  $people
     * @return \Illuminate\Http\Response
     */
    public function destroy(People $people)
    {

        try {

            $people->delete();
            return $this->successFullResponse();

        } catch (Exception $e){

            return $e;
            
        }

    }
}
