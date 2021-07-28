<?php

namespace App\Http\Controllers;


use App\Models\Question;
use App\Models\Lawyer;
use Illuminate\Http\Request;
use App\Http\Requests\QuestionRequest;
use App\Http\Resources\QuestionResource;
use App\Mail\QuestionMail;
use Mail;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->showAll(QuestionResource::collection(Question::get()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\QuestionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionRequest $request)
    {
        try {

            $question = Question::create($request->validated());

            $users = Lawyer::all();

            foreach($users as $user):

                Mail::to($user->email)->send(new QuestionMail($question));

            endforeach;

            return  $this->successFullResponse();
            
        } catch (Exception $e){

            return $e;

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }

    /**
     * @return \Illuminate\Http\Response;
     */
    public function count()
    {
        try {
            return Question::count();
        } catch (Exception $e){
            return $e;
        }
    }

    public function last(){

        try { 
            
            $question = QuestionResource::collection(Question::orderBy('id', 'desc')->limit(10)->get());

            return $question;

        } catch (exception $e){
            return $e;
        }
    }
}
