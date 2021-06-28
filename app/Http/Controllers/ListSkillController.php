<?php

namespace App\Http\Controllers;

use App\Models\ListSkill;
use Illuminate\Http\Request;
use App\Http\Resources\ListSkillResource;

class ListSkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->showAll(ListSkillResource::collection(ListSkill::get()));
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
     * @param  \App\Models\ListSkill  $listSkill
     * @return \Illuminate\Http\Response
     */
    public function show(ListSkill $listSkill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ListSkill  $listSkill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ListSkill $listSkill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ListSkill  $listSkill
     * @return \Illuminate\Http\Response
     */
    public function destroy(ListSkill $listSkill)
    {
        //
    }
}
