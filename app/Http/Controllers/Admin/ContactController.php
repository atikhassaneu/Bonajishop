<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index(){
        $contacts = Contact::orderBy('id', 'desc')->paginate(10);
        return view('admin.contact.index', compact('contacts'));
    }

    public function show($id){
        $contact = Contact::find($id);
        if($contact->status == 0){
            $contact->status = 1;
            $contact->save();
        }
        return view('admin.contact.show', compact('contact'));
    }

    public function destroy($id){
        Contact::find($id)->delete();
        return redirect()->route('admin.contact.index');
    }

}
