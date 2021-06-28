<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\Rewards;
use App\Models\Lawyer;
use App\Models\Search;
use Illuminate\Http\Request;
use App\Http\Requests\Search\SearchRequest;
use App\Http\Resources\SearchResource;
use App\Http\Resources\LawyerResource;
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

  
            if($request->text == null && $request->rewards == null && $request->list_skill_id == null){

                $lawyers = $this->showOne(LawyerResource::collection(Lawyer::get()));

            } else {
                
                $lawyers = Lawyer::all();

            }
           
            $total_lawyers = $lawyers;

            if($request->text != null){
                
                $k = 0;
                $total_lawyers = [];
                
 
                $lawyers = Lawyer::where('first_name', 'LIKE', '%' . $request->text . '%')->get();
                
                foreach($lawyers as $lawyer):

                    $total_lawyers[$k] = $this->showOne(LawyerResource::collection(Lawyer::where('id', '=', $lawyer->id)->get()));
                    $k++;

                endforeach;

            } 

           
            if($request->rewards != null){

                $k = 0;
                $total_lawyers = [];

                foreach($lawyers as $lawyer):

                    $mount_rewards = 0;
                    $j = 0;
                    $rewards = Rewards::where('lawyer_id', '=', $lawyer->id)->get();
                    
                    foreach($rewards as $reward){
                        $j++;
                        $mount_rewards = $mount_rewards + $reward->unid;
                    }
                    
                    if( round( $mount_rewards / $j ) == $request->rewards){

                        $total_lawyers[$k] = $this->showOne(LawyerResource::collection(Lawyer::where('id', '=', $lawyer->id)->get()));
                        $k++;
                    }

                endforeach;

            } 

            if($request->list_skill_id != null){

                
                $k = 0;
                $total_lawyers = [];

                foreach($lawyers as $lawyer):
                    
                    $skills = Skill::where('list_skill_id', '=', $request->list_skill_id)->get();

                    foreach($skills as $skill):
                        
                        if($skill->lawyer_id == $lawyer->id){

                            $total_lawyers[$k] = $this->showOne(LawyerResource::collection(Lawyer::where('id', '=', $lawyer->id)->get()));
                            $k++;

                        }
                        
                    endforeach;

                endforeach;
                
            }

            

            return $total_lawyers;

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
