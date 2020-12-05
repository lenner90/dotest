<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Carbon;
use Image;
use Auth;

class HomeController extends Controller
{
    //

    public function HomeSlider(){
        $sliders = Slider::latest()->paginate(5);
        return view('admin.slider.index',compact('sliders'));
    }

    public function AddSlider(){
        return view('admin.slider.create');
    }


    public function StoreSlider(Request $request){

        $slider_image =  $request->file('image');

        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($slider_image->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;
        $up_location = 'image/slider/';
        $last_img = $up_location.$img_name;
        $slider_image->move($up_location,$img_name);

       
        // $name_gen = hexdec(uniqid()).'.'.$slider_image->getClientOriginalExtension();
        // Image::make($slider_image)->resize(1920,1088)->save('image/slider/'.$name_gen);
        // $last_img = 'image/slider/'.$name_gen;
 
        Slider::insert([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $last_img,
            'created_at' => Carbon::now()
        ]);
         
        return Redirect()->route('home.slider')->with('success','Slider Inserted Successfully');

    }

    function UpdateSlider(request $request, $id){
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255',
        ],
        [
            'title.required' => 'Please input slider title',
            'description.required' => 'Please slider description',
        ]);

        $old_image = $request->old_image;

        $slider_image = $request->file('slider_image');

        if($slider_image){
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($slider_image->getClientOriginalExtension());
            $img_name = $name_gen.'.'.$img_ext;
            $up_location = 'image/slider/';
            $last_img = $up_location.$img_name;
            $slider_image->move($up_location,$img_name);
    
            if(file_exists($old_image)){
                unlink($old_image);
            }
            // unlink($old_image);
    
            Slider::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $last_img,
                'created_at' => Carbon::now()
            ]);
    
            return Redirect()->route('home.slider')->with('success','Slider updated successfull');
        }else{
            Slider::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'created_at' => Carbon::now()
            ]);
    
            return Redirect()->route('home.slider')->with('success','Slider updated successfull');

    }   }


    public function EditSlider($id){
        $sliders = Slider::find($id);
        return view('admin.slider.edit',compact('sliders'));
    }

    public function Delete($id){
        $image = Slider::find($id);
        $old_image = $image->image;
        if(file_exists($old_image)){
            unlink($old_image);
        }
 

        Slider::find($id)->delete();
        return Redirect()->route('home.slider')->with('success','Sliders deleted successfull');

    }
}
