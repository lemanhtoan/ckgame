<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//call model
//include model 
use App\Model\Bear;
use App\Model\Fish;
//use App\Model\Picnic;
use App\Model\Tree;


class BearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        $bears = Bear::all();
        //$dangerousBears = Bear::where('danger_level', '>', 4)->get();

        //other

        // get all the bears
        $bears = Bear::all();

        // find a specific bear by id
        $bear = Bear::find(1);

        // find a bear by a specific attribute
        $bearLawly = Bear::where('name', '=', 'Lawly')->first();

        // find a bear with danger level greater than 5
        $dangerousBears = Bear::where('danger_level', '>', 5)->get();

        //relation
        // 1 - 1
        // find a bear named Adobot
        $adobot = Bear::where('name', '=', 'Adobot')->first();

        //view data
        // $fish = $adobot->fish;
        // get the weight of the fish Adobot is going to eat
        //echo "<pre>"; var_dump($fish); die;
        //$fish->weight; // value = 4 in table

        // alternatively you could go straight to the weight attribute
        // $adobot->fish->weight;


        // 1 - many
        //$lawly = Bear::where('name', '=', 'Lawly')->first();

        // many - many
        //$lawly = Bear::all()->with('trees', 'picnics');
        //var_dump($lawly); die;
        return view('bear/bears', ['bears' => $adobot]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        // create a bear
        Bear::create(array(
            'name'         => 'Super Cool',
            'type'         => 'Black',
            'danger_level' => 1
        ));

        // alternatively you can create an object, assign values, then save
        $bear               = new Bear;

        $bear->name         = 'Super Cool';
        $bear->type         = 'Black';
        $bear->danger_level = 1;



        //other

         // find the bear or create it into the database
        Bear::firstOrCreate(array('name' => 'Lawly'));

        // find the bear or instantiate a new instance into the object we want
        $bear = Bear::firstOrNew(array('name' => 'Cerms'));


        // save the bear to the database
        $bear->save();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
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
        //

        // find the bear
        $lawly = Bear::where('name', '=', 'Lawly')->first();

        // change the attribute
        $lawly->danger_level = 10;

        // save to our database
        $lawly->save();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //delete

        // find and delete a record
        $bear = Bear::find(1);
        $bear->delete();

        // delete a record 
        Bear::destroy(1);

        // delete multiple records 
        Bear::destroy(1, 2, 3);

        // find and delete all bears with a danger level over 5
        Bear::where('danger_level', '>', 5)->delete();

    }
}
