<?php 
namespace App\Http\Controllers\User;

use App\User;
use App\Http\Controllers\Controller;
use App\Model\Posts;
use Illuminate\Http\Request;
use Session;
use Mail;
use App\Model\UserAmount;
use Input;
use Validator;

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
        $item->confirmed = 0;
        $item->save();
        Session::flash('message', 'Block user success!');
        return redirect('users');
    }

    public function gameHistory()
    {
        $id = \Auth::user()->id;
        $data = \DB::table('users as u')
            ->leftJoin('game_user as gu', 'u.id', '=', 'gu.id_user')
            ->leftJoin('game_type as gt', 'gt.id', '=', 'gu.id_game')
            ->where('u.id', $id)
            ->orderBy('gt.id', 'DESC')
            ->get([
                'u.name as uName', 'u.id as uId',
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
        $data = \DB::table('users_amount')->leftJoin('users as u', 'u.id', '=', 'users_amount.id_user')->where('id_user', $id)->orderBy('users_amount.id', 'DESC')->get(
            ['users_amount.*', 'u.name as uName']
        );
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
        if (empty($dataUser)) {
            $dataUser = new UserAmount();
            $dataUser->id_user = $id;
            $dataUser->mount_before = 0;
            $dataUser->mount_current = 0;
        }
        return view('user/actionminus', ['data' => $id, 'user' => $dataUser]);
    }

    public function getRegister()
    {
        return view('auth.register');
    }

    public function postRegister(Request $request)
    {
        $input = $request->all();
        $input['password'] = bcrypt($request->input('password'));
        $input['confirmation_code'] = str_random(60).$request->input('email');

        // active later
        $input['confirmed'] = 0;

        $rules = array(
            'name'             => 'required',
            'email'            => 'required|email|unique:users',
            'password' => 'required|min:3|confirmed',
            'password_confirmation' => 'required|min:3'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return redirect("/auth/register")->withErrors($validator);
        } else {
            $register = User::create($input);
            $data = [
                'name' => $input['name'],
                'code' => $input['confirmation_code']
            ];

            // insert to user ammount
            $itemAmount = new UserAmount();
            $itemAmount->id_user = $register->id;
            $itemAmount->mount_before = 0;
            $itemAmount->mount_current = 0;
            $itemAmount->save();

            $this->sendEmail($data, $input);
            Session::flash('message', 'Register successfully, please check email and active your account!');
        }

        return redirect('/');
    }

    public function sendEmail($data, $input)
    {
        Mail::send('auth.active', ['data' => $data], function ($message) use ($data, $input) {
            $message->to($input['email'], $input['name'])->subject('Please verify your account registration');
        });
    }

    public function activate($code, User $user)
    {
        if ($user->activateAccount($code)) {
            echo 'Your account activated!';
            Session::flash('message', 'Verified account successfully!');
        } else {
            echo  'Your account activate fail!';
            Session::flash('error', 'Verified account fail!');
        }

        $url = \URL::to('/');
        header( "refresh:5;url=$url" );
    }

    public function userMoney($id)
    {
        $data = \DB::table('users_amount')->leftJoin('users as u', 'u.id', '=', 'users_amount.id_user')->where('id_user', $id)->orderBy('users_amount.id', 'DESC')->get(
            ['users_amount.*', 'u.name as uName']
        );
        return view('user/actionhistorymoney', ['data' => $data, 'name'=>\Auth::user()->name]);
    }

    public function postLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if(\Auth::attempt($credentials)){

            if (\Auth::user()->confirmed == 0) {

                \Auth::logout();
                Session::flash('error', 'Please activate your account!');
                return redirect('auth/login');
            }
            else{
                Session::flash('message', 'You have been log in!');
                $url = 'user/'.\Auth::user()->id;
                return redirect($url);
            }
        }
        else{
            Session::flash('error', 'The username and password do not match!');
            return redirect('auth/login');
        }
    }
}