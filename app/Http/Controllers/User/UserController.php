<?php 
namespace App\Http\Controllers\User;

use App\User;
use App\Http\Controllers\Controller;

use App\Model\Posts;

class UserController extends Controller
{
    
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function showProfile($id)
    {
        return view('auth.profile', ['user' => User::findOrFail($id)]);
    }

    public function user_posts($id)
    {
        //
        $posts = Posts::where('author_id',$id)->where('active','1')->orderBy('created_at','desc')->paginate(5);
        $title = User::find($id)->name;
        return view('home')->withPosts($posts)->withTitle($title);
    }

    public function user_posts_all(Request $request)
    {
        //
        $user = $request->user();
        $posts = Posts::where('author_id',$user->id)->orderBy('created_at','desc')->paginate(5);
        $title = $user->name;
        return view('home')->withPosts($posts)->withTitle($title);
    }
}