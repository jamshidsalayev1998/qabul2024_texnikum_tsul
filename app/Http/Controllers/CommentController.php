<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Petition;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_all_noread_messages(){
        if (Auth::user()->role == 0) {
            $pets = Petition::where('user_id' , Auth::user()->id)->pluck('id');
            $mess = Comment::whereIn('pet_id' , $pets)->where('from_id' , 1)->where('status' , 0)->get();
            return count($mess);
        }
    }

    public function get_noread_messages($id){
        if (Auth::user()->role == 0) {
            $mess = Comment::where('pet_id' , $id)->where('from_id' , 1)->where('status' , 0)->get();
            if (Comment::where('pet_id' , $id)->where('from_id' , 1)->where('status' , 0)->exists()) {
                return count($mess);
            }
            else{
                return 0;
            }
            return json_encode($mess);
        }
        if (Auth::user()->role == 2) {
            $mess = Comment::where('pet_id' , $id)->where('from_id' , 0)->where('status' , 0)->get();
            if (Comment::where('pet_id' , $id)->where('from_id' , 0)->where('status' , 0)->exists()) {
                return count($mess);
                // return $mess;
            }
            else{
                return 0;
            }
            // return json_encode($mess);
        }
    }

    public function get_messages($id){
        
        if (Auth::user()->role == 0) {
            $mess = Comment::where('pet_id' , $id)->where('from_id' , 1)->where('status' , 0)->get();
            foreach ($mess as $k) {
                $k->status = 1;
                $k->update();
            }
        }
        if (Auth::user()->role == 2) {
            $mess = Comment::where('pet_id' , $id)->where('from_id' , 0)->where('status' , 0)->get();
            foreach ($mess as $k) {
                $k->status = 1;
                $k->update();
            }
        }
        $messages = Comment::where('pet_id' , $id)->orderBy('created_at' , 'ASC')->orderBy('id' , 'DESC')->get();
        return json_encode($messages);
    }
    public function send_messages(){
        $id = $_POST['id'];
        $sms = $_POST['sms'];
        $comment = new Comment();
        $comment->body = $sms;
        $comment->pet_id = $id;
        if (Auth::user()->role == 0) {
            $comment->from_id = 0;
        }
        if (Auth::user()->role == 2) {
            $comment->from_id = 1;
        }
        $comment->save();
        return json_encode($comment);
        // return "asasd";
    }
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
