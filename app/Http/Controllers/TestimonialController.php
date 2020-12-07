<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use Illuminate\Support\Carbon;

class TestimonialController extends Controller
{
   public function AdminTestimonial(){
       $testimonials = Testimonial::latest()->paginate(5);
       return view('admin.testimonial.index',compact('testimonials'));
   }

   public function AddTestimonial(){
    return view('admin.testimonial.create'); 
   }

   public function StoreTestimonial(request $request){
       
    $validatedData = $request->validate([
        'user_name' => 'required|max:255',
        'user_title' => 'required|max:255',
        'user_comment' => 'required',
        'user_profile' => 'required|mimes:jpg,jpeg,png',
    ]);
    // dd($request);
    $user_profile = $request->file('user_profile');

    $name_gen = hexdec(uniqid());

    $img_ext = strtolower($user_profile->getClientOriginalExtension());
    $img_name = $name_gen.'.'.$img_ext;
    $up_location = 'image/testimonial/';
    
    $last_img = $up_location.$img_name;

    if (!file_exists($up_location)) {
        mkdir($up_location, 0777, true);
    }

    $user_profile->move($up_location,$img_name);
    Testimonial::insert([
        'user_name' => $request->user_name,
        'user_title' => $request->user_title,
        'user_comment' => $request->user_comment,
        'user_profile' => $last_img,
        'created_at' => Carbon::now()
    ]);

    return Redirect()->route('admin.testimonial')->with('success','Testimonial insert successfull');
   }


   public function EditTestimonial($id){
       
       $testimonials = Testimonial::find($id);
       return view('admin.testimonial.edit',compact('testimonials'));
   }

   public function UpdateTestimonial(request $request, $id){
    $validatedData = $request->validate([
        'user_name' => 'required|max:255',
        'user_title' => 'required|max:255',
        'user_comment' => 'required',
    ]);

    $old_image = $request->old_image;

    $user_profile = $request->file('user_profile');

    if($user_profile){
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($user_profile->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;
        $up_location = 'image/testimonial/';
        $last_img = $up_location.$img_name;
        $user_profile->move($up_location,$img_name);

        unlink($old_image);

        Testimonial::find($id)->update([
            'user_name' => $request->user_name,
            'user_title' => $request->user_title,
            'user_comment' => $request->user_comment,
            'user_profile' => $last_img,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->route('admin.testimonial')->with('success','Testimonial updated successfull');
    }else{
        Testimonial::find($id)->update([
            'user_name' => $request->user_name,
            'user_title' => $request->user_title,
            'user_comment' => $request->user_comment,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->route('admin.testimonial')->with('success','Testimonial updated successfull');

    }
   }

   public function DeleteTestimonial($id){
    $image = Testimonial::find($id);
    $old_image = $image->user_profile;
    if(file_exists($old_image)){
        unlink($old_image);
    }


    Testimonial::find($id)->delete();
    return Redirect()->route('admin.testimonial')->with('success','Testimonial deleted successfull');

}
}
