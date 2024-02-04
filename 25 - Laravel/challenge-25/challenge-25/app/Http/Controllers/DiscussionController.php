<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use App\Models\Comment;
use App\Models\Discussion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DiscussionController extends Controller
{
    public function addDiscussion(){
        $categories = DB::table('categories')->get();
        return view('add', compact('categories'));
    }


    public function saveDiscussion(Request $data){

        $validated = $data->validate([
            'title' => 'required',
            'photo' => 'required',
            'description' => 'required',
            'category' => 'required',
        ]);

        $discussion = new Discussion();
        $discussion->title = $data->title;
        $discussion->photo = $data->photo;
        $discussion->description = $data->description;
        $discussion->category_id = $data->category;
        $discussion->created_by = Auth::id();
        $discussion->created_at = Carbon::now();
        $discussion->updated_at = null;
        $discussion->save();

        return redirect()->route('home')->with('status', 'Disscussion successfully created! It needs to be approved before you dig into it though! :)');

    }

    public function approveDiscussion($id){
        $discussion = Discussion::find($id);
        $discussion->status = true;
        $discussion->save();

        return redirect()->back();
    }

    public function editDiscussion($id){
        $discussion = Discussion::find($id);
        $categories = Category::all();

        return view('editDiscussion', compact('discussion', 'categories'));
    }


    public function saveEditDiscussion(Request $data, $id){
        $validated = $data->validate([
            'title' => 'required',
            'photo' => 'required',
            'description' => 'required',
            'category' => 'required',
        ]);

        $discussion = Discussion::find($id);
        $discussion->title = $data->title;
        $discussion->photo = $data->photo;
        $discussion->description = $data->description;
        $discussion->category_id = $data->category;
        $discussion->updated_at = Carbon::now();
        $discussion->save();

        return redirect()->route('home')->with('status', 'Successfully edited discussion');
    }

    public function deleteDiscussion($id){
        $discussion = Discussion::find($id);
        $discussion->delete();

        return redirect()->back();
    }

    public function addComment($id){
        return view('addComment', compact('id'));
    }

    public function saveComment(Request $data, $id){

       $validate = $data->validate([
            'comment' => 'required'
       ]);

       $comment = new Comment();
       $comment->comment = $data->comment;
       $comment->user_id = Auth::id();
       $comment->discussion_id = $id;
       $comment->created_at = Carbon::now();
       $comment->updated_at = null;
       $comment->save();

       return redirect('/discussion/'.$id);
    }

    public function editComment($id) {
        $comment = Comment::find($id);
        return view('editComment', compact('comment'));
    }

    public function saveEditComment(Request $data, $id, $discussion_id) {
        $comment = Comment::find($id);
        $comment->comment = $data->comment;
        $comment->updated_at = Carbon::now();
        $comment->save();

        return redirect('/discussion/'.$id);
    }

    public function deleteComment($id){
        $comment = Comment::find($id);
        $comment->delete();

        return redirect()->back();
    }

    public function pendingDiscussion(){
        $discussions = Discussion::where('status', 0)->get();

        return view('pendingDiscussion', compact('discussions'));
    }
}
