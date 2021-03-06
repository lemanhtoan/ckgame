<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Model\Gametype;
use App\Model\GameUser;
use App\Model\UserAmount;
use Session;
use Validator;
use Input;
use Mail;

class GameController extends Controller
{
    public function homeview() {
        return view('pages.home');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = Gametype::all();
        return view('game.view', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
       return view('gametype.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $item = new Gametype();
        $item->name = $request->get('name');
        $item->link_get = $request->get('link_get');
        $item->min_price = $request->get('min_price');
        $item->max_price = $request->get('max_price');
        $item->time_clone = $request->get('time_clone');
        $item->default_load = $request->get('default_load');
        $rules = array(
            'name'  => 'required',
            'link_get'  => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return redirect('/new-gametype')->withErrors($validator);
        } else {
            $item->save();
            $message = "Game type saved";
            Session::flash('message', $message);
            return redirect('gametype');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $item = Gametype::findOrFail($id);
        return view('gametype.detail', ['item' => $item]);
    }

    public function showPlay($id)
    {
        $item = Gametype::findOrFail($id);
        return view('game.play', ['item' => $item]);   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $item = Gametype::whereId($id)->firstOrFail();
        return view('gametype.edit', ['item' => $item]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $item = Gametype::findOrFail($id);
        $item->name = $request->input('name');
        $item->link_get = $request->input('link_get');
        $item->min_price = $request->input('min_price');
        $item->max_price = $request->input('max_price');
        $item->time_clone = $request->input('time_clone');
        $item->default_load = $request->input('default_load');

        $rules = array(
            'name'             => 'required',
            'link_get'            => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return redirect("/gametype/$id/edit")->withErrors($validator);
        } else {
            $item->save();
            Session::flash('message', 'Item updated!');
            return redirect('gametype');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Gametype::find($id)->delete();
        Session::flash('message',"Delete done");
        return redirect('gametype');
    }

    public function getCurrentPrice($user)
    {
        $data = \DB::table('users_amount')->where('id_user', $user)->orderBy('id', 'DESC')->first();
        if (empty($data)) {
            $data = new UserAmount();
            $data->id_user = $user;
            $data->mount_before = 0;
            $data->mount_current = 0;
        }
        return $data;
    }
    
    public function submitGame(Request $request)
    {
        if(\Auth::check()) {
            $userId = \Auth::user()->id;
            $gameId = $request->input('gameId');
            $priceArr = $request->input('valueInp');
            $numberArr = $request->input('itemCheck');
            $comparePrice = array();
            foreach ($priceArr as $key => $value) {
                if ((strlen($value) > 0) && (in_array($key, $numberArr))) {
                    $comparePrice[$key] = $value;
                }
            }
            $url = 'game/' . $gameId;
            // check before one hour close game => not accept record
            // echo date('Y-m-d H:i:s'), date('H', strtotime(date('Y-m-d H:i:s')));die;
            $gameType  = Gametype::findOrFail($gameId);
            if ( ($gameType) && ($gameType->time_clone - 1) >= date('H', strtotime(date('Y-m-d H:i:s')))  ) {

                if ($userId) {
                    if (!empty($comparePrice)) {
                        $total = 0;
                        $mountCurrent = (float)($this->getCurrentPrice($userId)->mount_current);
                        foreach ($comparePrice as $number => $price) {
                            $total += $price;
                        }

                        $arrData = array();
                        if ($total <= $mountCurrent) : // total play <= current money
                            foreach ($comparePrice as $number => $price) {
                                $item = new GameUser();
                                $item->id_game = $gameId;
                                $item->id_user = $userId;
                                $item->value = $number;
                                $item->price_set = $price;
                                $item->date_play = date('Y-m-d H:i:s');
                                $item->save();
                                array_push($arrData, array(
                                    'number'=>$number,
                                    'price'=> $price
                                ));
                            }

                            // email to user and admin too => admin config later
                            $data = array(
                                'email' => \Auth::user()->email,
                                'name' => \Auth::user()->name,
                                'items' => $arrData,
                                'total' => $total
                            );

                            Mail::send('game.emailplay', ['data' => $data], function ($message) use ($data) {
                                $message->to($data['email'], $data['name'])->subject('Email play game');
                            });

                            // - total money current
                            $itemAmount = new UserAmount();
                            $itemAmount->id_user = $userId;
                            $itemAmount->mount_before = $mountCurrent;
                            $itemAmount->mount_current = $mountCurrent - $total;
                            $itemAmount->save();

                            Session::flash('message', 'Your data was sent!');
                            return redirect($url);
                        else:
                            Session::flash('message', 'Your not enough money!');
                            return redirect($url);
                        endif;
                    }
                } else {
                    Session::flash('message', 'Your data not sent, please select value and play again!');
                    return redirect($url);
                }
            } else {
                Session::flash('message', 'Your play fail, time play need before one hour close game!');
                return redirect($url);
            }
        } else {
            Session::flash('message', 'You need login!');
            return redirect('auth/login');
        }
    }

    public function showResult()
    {
        $data = [];
        return view('game.result', ['data' => $data]);
    }

    public function showResultHis()
    {
        $data = [];
        return view('game.resulthis', ['data' => $data]);
    }

    public function getResult(Request $request) 
    {
        $dateArr = explode("/", $request->input('date'));
        $day = $dateArr[1]; $month = $dateArr[0]; $year = $dateArr[2];

        // get all record in date and find number (and others information) right
        //game_user
        $sqlData = \DB::table('game_type as gt')
            ->leftJoin('game_clone as gc', 'gc.id_game', '=', 'gt.id')
            ->leftJoin('game_user as gu', 'gu.id_game', '=', 'gt.id')
            ->leftJoin('users as u', 'u.id', '=', 'gu.id_user')
            ->whereDay('gc.date_clone', '=', $day)
            ->whereMonth('gc.date_clone', '=', $month) 
            ->whereYear('gc.date_clone', '=', $year)
            ->get(['gt.id as gameId', 'gt.name as gameName', 'gc.value as gameRightValue', 'gc.id_game as gameIdClone', 'gu.id_user as userIdPlay', 'gu.value as userNumberSet', 'gu.price_set as userPriceSet', 'u.name as userName']);
        $dataOut = array();
        if ( sizeof($sqlData) > 0) {
            foreach ($sqlData as $item) { 
                if ( ($item->gameId == $item->gameIdClone) && ($item->gameRightValue == $item->userNumberSet) ) {
                    $dataOut['right'][] = $item;
                } else {
                    $dataOut['wrong'][] = $item;
                }
            }
        } 
        return view('game.result', ['data' => $dataOut]);
        //var_dump($dateArr, $sqlNumberRight, $sqlData, $dataOut);die;
    }

    public function getResultNumber(Request $request)
    {
        $dateArr = explode("/", $request->input('date'));
        $day = $dateArr[1]; $month = $dateArr[0]; $year = $dateArr[2];

        // get all record in date and find number (and others information) right
        //game_user
        $sqlData = \DB::table('game_type as gt')
            ->leftJoin('game_clone as gc', 'gc.id_game', '=', 'gt.id')
            ->whereDay('gc.date_clone', '=', $day)
            ->whereMonth('gc.date_clone', '=', $month)
            ->whereYear('gc.date_clone', '=', $year)
            ->get(['gt.id as gameId', 'gt.name as gameName', 'gc.id_game as gameIdClone', 'gc.value as gameRightValue']);
        $dataOut = array();
        if ( sizeof($sqlData) > 0) {
            foreach ($sqlData as $item) {
                if ( $item->gameId == $item->gameIdClone ) {
                    $dataOut['right'][] = $item;
                }
            }
        }
        return view('game.resulthis', ['data' => $dataOut]);
    }

    public function payToUser(Request $request)
    {
        $userId = $request->input('userId');
        $user = User::findOrFail($userId);
        $dataUser = \DB::table('users_amount')->where('id_user', $userId)->orderBy('id', 'DESC')->first();
        $userBefore = $dataUser->mount_current;
        $userNow = $userBefore + $request->input('value');

        $itemAmount = new UserAmount();
        $itemAmount->id_user = $userId;
        $itemAmount->mount_before = $userBefore;
        $itemAmount->mount_current = $userNow;
        $itemAmount->save();

        // email to user and admin too => admin config later
        $data = array(
            'email' => $user->email,
            'name' => $user->name,
            'valueAdd' => $request->input('value'),
            'valueNow' => $userNow
        );

        Mail::send('game.emailpay', ['data' => $data], function ($message) use ($data) {
            $message->to($data['email'], $data['name'])->subject('Email pay to user');
        });

        Session::flash('message', 'Your data was sent!');
        return view('/user/actionpay', ['data' => $userId]);
    }

    public function minusToUser(Request $request)
    {
        $userId = $request->input('userId');
        $dataUser = \DB::table('users_amount')->where('id_user', $userId)->orderBy('id', 'DESC')->first();
        $userBefore = $dataUser->mount_current;
        $userNow = $userBefore - $request->input('value');

        $itemAmount = new UserAmount();
        $itemAmount->id_user = $userId;
        $itemAmount->mount_before = $userBefore;
        $itemAmount->mount_current = $userNow;
        $itemAmount->save();

//        email to user and admin too
//        Mail::send('auth.active', ['data' => $data], function ($message) use ($data, $input) {
//            $message->to($input['email'], $input['name'])->subject('Please verify your account registration');
//        });

        Session::flash('message', 'Your data was sent!');
        return redirect('users');
    }
}
