<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//call model
use App\Model\Contacts;

//call Session + Input + Validator
use Session;

use Input;

use Validator;

//call DB;
use DB;

//call mail
use Mail;

//validate form submit
use Illuminate\Foundation\Http\FormRequest;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        //process save item contact
        $contact = new Contacts();
        $contact->contact_name = $request->input('contact_name');
        $contact->contact_email = $request->input('contact_email');
        $contact->contact_message = $request->input('contact_message');
        $contact->contact_status = 1;

        //validation form
        $rules = array(
            'contact_name'  => 'required',//required
            'contact_email' => 'required|email',// required + email
            'contact_message' => 'required' // required
        );
        
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            $messages = $validator->messages();
            return redirect('/contact')->withErrors($validator);
        } else {
            //save 
            $contact->save();
            Session::flash('message', 'Thank for your contact!');
            return redirect('contact');
        }        
  
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
        //show contact id
        $contact = Contacts::whereId($id)->firstOrFail();
        return view('pages/contact_item', ['contact' => $contact]);
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
      //
    }

    /**
     * List all contact in table to manager
     *
     * @return Response
     */
    public function mContacts()
    {
        $function = new \ReflectionClass('DB');
        $contacts = DB::table('contacts')
            ->orderBy('id', 'desc')
            ->paginate(config('contacts.contacts_per_page'));
        $contacts->setPath(url('/contacts'));
        return view('backend/mcontacts', ['contacts' => $contacts]);      
    }

    /**
     * Sent mail to contact id
     *
     * @return Response
     */
    public function mailTo($id)
    {
        $contact = Contacts::findOrFail($id);  

        //send-mail     
        Mail::send('pages.email', ['contact' => $contact], function ($message) use ($contact) {
            $message->to($contact->contact_email, $contact->contact_name)->subject('Email contact by Larevel tranning');
        });

        //update status
        if (Mail::send('pages.email', ['contact' => $contact], function ($message) use ($contact) {
            $message->to($contact->contact_email, $contact->contact_name)->subject('Email contact by Larevel tranning');
        }) == 1) {
            $contact->contact_status = 0;
            $contact->save();
        }
        Session::flash('message', "Sent email to contact $contact->contact_email done!");
        return redirect('mcontact');
    }

    /**
     * Delete contact id
     *
     * @return Response
     */
    public function delete($id)
    {
        Contacts::find($id)->delete();
        Session::flash('message',"Delete contact with id = $id done!");
        return redirect('mcontact');
    }
}
