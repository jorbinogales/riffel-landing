<?php

namespace App\Http\Controllers;

use App\Models\Search;
use Illuminate\Http\Request;
use App\Http\Requests\Search\SearchRequest;
use App\Http\Resources\SearchResource;
use Exception;


class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->showAll(SearchResource::collection(Search::get()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Request\Search\SearchRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SearchRequest $request)
    {
        try {

            Search::create($request->validated());

            return $this->successFullResponse();

        } catch (Exception $e){
            
            return $e;

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Search  $search
     * @return \Illuminate\Http\Response
     */
    public function show(Search $search)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Search  $search
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Search $search)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Search  $search
     * @return \Illuminate\Http\Response
     */
    public function destroy(Search $search)
    {
        //
    }
}
