<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\ContactCategory;
use Illuminate\Support\Facades\Log;
use Mail;
use App\Mail\SendContactMail;

class ContactController extends Controller
{
  private function getSearchContactParam(Request $request)
  {
    $inputparams = [
      'name' => $request->input('name'),
      'contact_category_id' => $request->input('contact_category_id'),
      'created_at_min' => $request->input('created_at_min'),
      'created_at_max' => $request->input('created_at_max'),
      'updated_at_min' => $request->input('updated_at_min'),
      'updated_at_max' => $request->input('updated_at_max')
    ];
    return $inputparams;
  }

  // /*一覧表示*/
  public function index(Request $request)
  {
    $inputparams = $request->session()->get('inputparams');
    Log::debug($inputparams);
    $created_at_chk = false;
    $updated_at_chk = false;
    $contacts = array();

    // $contacts_paginate = array();
    // $contacts_temp = array();
    // $contacts_category_temp = array();
    //when~~function use(ココ)で$inputparams['name']が使えない・・・
    //一度$nameに受け渡す無駄なことを行う・・・
    // $name = $inputparams['name'];
    //
    // $contacts_name_temp = Contact::when($name,function ($query) use ($name){
    //   $query->where('name','like','%'.$name.'%');
    // })->get();
    // if($inputparams['contact_category_id'] != 1){
    //   Log::debug('contact_category_id not 1');
    //   foreach ($contacts_name_temp as $contact_name_temp) {
    //     if($inputparams['contact_category_id'] == $contact_name_temp->contact_category_id){
    //       array_push($contacts_category_temp,$contact_name_temp);
    //     }
    //   }
    // }else{
    //   Log::debug('contact_category_id 1');
    //   foreach ($contacts_name_temp as $contact_name_temp) {
    //     array_push($contacts_category_temp,$contact_name_temp);
    //     Log::debug($contact_name_temp);
    //   }
    // }
    //
    // if(!empty($inputparams['created_at_min']) && !empty($inputparams['created_at_max'])) {
    //   foreach ($contacts_category_temp as $contact_category_temp) {
    //     if($inputparams['created_at_min'] <= $contact_category_temp->created_at and $contact_category_temp->created_at <=$inputparams['created_at_max']){
    //       array_push($contacts_temp,$contact_category_temp);
    //     }
    //   }
    // }else {
    //   foreach ($contacts_category_temp as $contact_category_temp) {
    //     array_push($contacts_temp,$contact_category_temp);
    //   }
    // }
    // if(!empty($inputparams['updated_at_min']) && !empty($inputparams['updated_at_max'])) {
    //   foreach ($contacts_temp as $contact_temp) {
    //     //Log::debug($contact_temp);
    //     if($inputparams['updated_at_min'] <= $contact_temp->updated_at and $contact_temp->updated_at <=$inputparams['updated_at_max']){
    //       array_push($contacts,$contact_temp);
    //     }
    //   }
    // }else {
    //   foreach ($contacts_temp as $contact_temp) {
    //     array_push($contacts,$contact_temp);
    //   }
    // }
    //return $contacts

    $query = Contact::query();
    if(!empty($inputparams['name']))
    {
      $query->where('name','like','%'.$inputparams['name'].'%');
    }
    if(!empty($inputparams['contact_category_id']) && $inputparams['contact_category_id'] != 1)
    {
      $query->where('contact_category_id','=',$inputparams['contact_category_id']);
    }
    if(!empty($inputparams['created_at_min']) && !empty($inputparams['created_at_max']))
    {
      $query->whereBetween('created_at', [$inputparams['created_at_min'], $inputparams['created_at_max']]);
    }
    if(!empty($inputparams['updated_at_min']) && !empty($inputparams['updated_at_max']))
    {
      $query->whereBetween('updated_at', [$inputparams['updated_at_min'], $inputparams['updated_at_max']]);
    }
    $query->orderBy('created_at','desc');
    $contacts = $query->paginate(3);
    Log::debug($contacts);
    return view('admin.contact.index',['contacts'=>$contacts]);
    //return view('admin.contact.index');
  }

  public function searchContact(Request $request)
  {
    //$inputparams = $request->session()->get('inputparams');
    $inputparams = $this->getSearchContactParam();
    //Log::debug($inputparams);
    //セッションでフォームのインプットデータを受け渡している
    $request->Session()->put('inputparams',$inputparams);
    return redirect('admin/contact');
  }

  public function detail(Request $request)
  {
    $contact = Contact::find($request->id);
    // Log::debug($request->id);
    // Log::debug($contact);
    $request->Session()->put('contact',$contact);
    return view('admin.contact.detail',['contact' => $contact]);
  }

  public function postMail(Request $request)
  {
    $contact = $request->session()->get('contact');
    $return_text = $request->return_text;
    $to = [
	    [
        'email' => $contact->mail,
        'name' => $contact->name,
	    ]
    ];
    Mail::to($to)->send(new SendContactMail($contact->title,$contact->name,$return_text));
    return redirect('admin/contact');
  }
}
