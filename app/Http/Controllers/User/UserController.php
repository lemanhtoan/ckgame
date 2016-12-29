<?php 
namespace App\Http\Controllers\User;

use App\User;
use App\Http\Controllers\Controller;

use App\Model\Posts;
use Session;

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

    public function users()
    {
        $data = \DB::table('users')
            ->orderBy('id', 'desc')
            ->paginate(config('common.items_per_page'));
        $data->setPath(url('/users'));
        return view('user.list', ['data' => $data]);
    }

    public function block($id)
    {
        $item = User::findOrFail($id);
        $item->status = 0;
        $item->save();
        Session::flash('message', 'Block user success!');
        return redirect('users');
    }

    public function gameHistory()
    {
        $id = \Auth::user()->id;
        $data = \DB::table('users as u')->leftJoin('game_user as gu', 'u.id', '=', 'gu.id_user')
            ->leftJoin('game_type as gt', 'gt.id', '=', 'gu.id_game')
            ->where('u.id', $id)
            ->orderBy('gt.id', 'DESC')
            ->get([
                'u.name as uName', 'u.email as uEmail',
                'gu.value as gUValue', 'gu.price_set as gUPrice', 'gu.date_play as gUDatePlay', 'gu.id_game as gUGameId',
                'gt.name AS gTName', 'gt.description as gTDescription'
            ]);

        return view('user/history', ['data' => $data, 'name'=>\Auth::user()->name]);
    }

    public function user_posts($id)
    {
        $posts = Posts::where('author_id',$id)->where('active','1')->orderBy('created_at','desc')->paginate(5);
        $title = User::find($id)->name;
        return view('home')->withPosts($posts)->withTitle($title);
    }

    public function user_posts_all(Request $request)
    {
        $user = $request->user();
        $posts = Posts::where('author_id',$user->id)->orderBy('created_at','desc')->paginate(5);
        $title = $user->name;
        return view('home')->withPosts($posts)->withTitle($title);
    }

    public function userHistory($id)
    {
        $data = \DB::table('users_amount')->where('id_user', $id)->get();
        return view('user/actionhistory', ['data' => $data, 'name'=>\Auth::user()->name]);
    }

    public function payToUser($id)
    {
        $dataUser = \DB::table('users_amount')->where('id_user', $id)->orderBy('id', 'DESC')->first();
        return view('user/actionpay', ['data' => $id, 'user' => $dataUser]);
    }

    public function minusToUser($id)
    {
        $dataUser = \DB::table('users_amount')->where('id_user', $id)->orderBy('id', 'DESC')->first();
        return view('user/actionminus', ['data' => $id, 'user' => $dataUser]);
    }
}