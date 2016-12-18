<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Model\Gameclone;
use App\Model\Gametype;
use Session;
use Validator;
use Input;

class GamecloneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = Gameclone::all();
        return view('gameclone.list', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
       $data = Gametype::all();
       return view('gameclone.create', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function getHTMLByID($id, $html) {
        $dom = new \DOMDocument;
        libxml_use_internal_errors(true);
        $dom->loadHTML($html);
        $node = $dom->getElementById($id);
        if ($node) {
            return $node->nodeValue;
        }
        return FALSE;
    }

    public function store(Request $request)
    {
        $item = new Gameclone();
        $itemType = Gametype::findOrFail($request->get('clonedata'));
        $curl_handle = curl_init();

        curl_setopt($curl_handle, CURLOPT_URL, $itemType->link_get);
        curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_handle, CURLOPT_USERAGENT, 'CKGame');
        $return = curl_exec($curl_handle);
        if ($return) {
            $number = explode(".", $this->getHTMLByID('last_last', $return));
            $dataValue = $number[1];
        } else {
            $dataValue = 0;
        }

        $item->id_game = $itemType->id;
        $item->value = $dataValue;
        $item->date_clone = date( 'Y-m-d H:i:s');
        $item->save();
        $message = "Game clone saved";
        Session::flash('message', $message);
        return redirect('gameclone');
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
        $item->name = $request->get('name');
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
}
