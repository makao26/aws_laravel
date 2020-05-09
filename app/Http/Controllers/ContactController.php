<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Contact;
use Storage;

class ContactController extends Controller
{
  private function contactValidate(Request $request){
    $validate_rule = [
      'name' => 'required',
      'mail' => 'required|email',
      'contact_category_id'=> 'required|between:1,3',
      'contact_text' => 'required'
    ];
    $this->validate($request,$validate_rule);
  }

  private function saveContact(Request $request , Contact $contact){
    $contact->name = $request->name;
    $contact->mail = $request->mail;
    $contact->contact_category_id =  $request->contact_category_id;
    $contact->contact_text = $request->contact_text;
    $contact->save();
  }

  public function index(Request $request){
    return view('contact.index');
  }
  public function postContact(Request $request){
    $this->contactValidate($request);
    $contact = new Contact;
    //Log::debug($request->name);
    $this->saveContact($request,$contact);
    //return redirect('/contact');
    return view('contact.index');
  }
}
