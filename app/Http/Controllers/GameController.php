<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Model\Gametype;
use App\Model\GameUser;
use App\Model\UserAmount;
use Session;
use Validator;
use Input;

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
            if ($userId) {
                $url = 'game/'.$gameId;
                if (!empty($comparePrice)) {
                    $total = 0;
                    $mountCurrent = (float)($this->getCurrentPrice($userId)->mount_current);
                    foreach ($comparePrice as $number => $price) {
                        $total += $price;
                    }
                    if ($total <= $mountCurrent) : // total play <= current money
                        foreach ($comparePrice as $number => $price) {
                            $item = new GameUser();
                            $item->id_game = $gameId;
                            $item->id_user = $userId;
                            $item->value = $number;
                            $item->price_set = $price;
                            $item->date_play = date('Y-m-d H:i:s');
                            $item->save();
                        }

                        // - total money current
                        $itemAmount = new UserAmount();
                        $itemAmount->id_user = $userId;
                        $itemAmount->mount_before = $mountCurrent;
                        $itemAmount->mount_current = $mountCurrent-$total;
                        $itemAmount->save();

                        Session::flash('message', 'Your data was sent!');
                        return redirect($url);
                    else:
                        Session::flash('message', 'Your not enough money!');
                        return redirect($url);
                    endif;

                } else {
                    Session::flash('message', 'Your data not sent, please select value and play again!');
                    return redirect($url);
                }
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

    public function getResult(Request $request) 
    {
        $dateArr = explode("/", $request->input('date'));
        $day = $dateArr[1]; $month = $dateArr[0]; $year = $dateArr[2];

        // get right number in date
        $sqlNumberRight = \DB::table('game_clone')
            ->whereDay('date_clone', '=', $day)
            ->whereMonth('date_clone', '=', $month) 
            ->whereYear('date_clone', '=', $year)
            ->get();

        // get all record in date and find number (and others information) right
        //game_user
        
        var_dump($date, $dateArr, $sqlNumberRight);die;
    }
}
