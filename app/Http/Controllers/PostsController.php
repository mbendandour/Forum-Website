<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Retrievers\Posts;
use App\Retrievers\Comments;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Http\Requests\AddCommentRequest;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function createblog()
    {
        return view('posts.createblog');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function viewblog($id)
    {
        //finds post with matching user id and comments
        $post = Posts::with('user','comments.user')->find($id);

        return view('posts.comments',compact('post'));
    }

    public function getblog(Request $request){


        $post = new Posts();
        $post->user_id = Auth::user()->id;
        $post->title = $request['title'];
        $post->body = $request['body'];
        $post->save();

        return redirect()->intended('/home');


    }
    public function deleteblog(Request $request){

        $post = Posts::findOrFail($request['post_id']);

        if(Auth::user()->id== $post->user_id || Auth::user()->admin){

            $post->delete();

        }

        return redirect()->back();

    }

    public function editblog($id){

        $post = Posts::findOrFail($id);

        if(Auth::user()->id== $post->user_id){

            return view('posts.editblog', compact('post'));

        }

        return redirect()->back();

    }

    public function updateEdit(Request $request)
    {
        $post = Posts::findOrFail($request['post_id']);

        if(Auth::user()->id== $post->user_id){

            $post->title = $request['title'];
            $post->body = $request['body'];
            $post->save();

        }

        return redirect()->intended('/home');
    }

   /* public function adminpage(){
        $posts = Posts::with('user','comments.user')->find(1);
     return view('administrator.adminpage',compact('posts'));

    }*/

    public function addcomment(AddCommentRequest $request){

        $post = Posts::where('id', '=', $request['id'])->first();

        $comment = new Comments();
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $post->id;
        $comment->body = $request['body'];
        $comment->save();

        return redirect()->back();
    }



    public function deletecomment(Request $request){

        $comment = Comments::findOrFail($request['comment_id']);

        if(Auth::user()->id== $comment->user_id || Auth::user()->admin){

            $comment->delete();

        }

        return redirect()->back();
        //return $post;
        //return view('posts.comments',compact('post'));
    }


}