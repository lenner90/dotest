<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function AdminContact(){
        $contacts = Contact::all();
        return view('admin.contact.index',compact('contacts'));
    }

    public function AddContact(){
        return view('admin.contact.create');

    }

    public function StoreContact(request $request){
        Contact::insert([
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'created_at' => Carbon::now()
        ]);
    
        return Redirect()->route('admin.contact')->with('success','Contact Added Successfully');

    }

    public function EditContact($id){
        $contacts = Contact::find($id);
        return view('admin.contact.edit',compact('contacts'));
    }

    public function UpdateContact(request $request,$id){
        $contacts = Contact::find($id)->update([
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address
        ]);

        return Redirect()->route('admin.contact')->with('success','Contact Updated Successfully');
    }

    public function Contact(){
        $contacts = DB::table('contacts')->first();
        return view('pages.contact',compact('contacts'));
    }

    public function Services(){
        return view('pages.services');
    }

    public function Portfolio(){
        return view('pages.portfolio');
    }

    public function AboutUs(){
        return view('pages.aboutus');
    }

    public function Team(){
        return view('pages.team');
    }

    public function Testimonia(){
        return view('pages.testimonia');
    }

    
    
}
