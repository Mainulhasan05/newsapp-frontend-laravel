<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guest;
use App\Models\Posts;
use App\Models\District;
use App\Models\Subdistrict;
use App\Models\Categories;
use Illuminate\Support\Str;

class GuestController extends Controller
{

    public function createForm()
    {
        $categories = Categories::select('id', 'name')->whereNull('parent_id')->get();
        $districts = District::select('id', 'district_bn')->get();
        
        return view('guest', compact('categories', 'districts'));
    }

    public function store(Request $request)
    {
        
        $guest = new Guest();
        $guest->name = $request->input('name');
        $guest->email = $request->input('email');
        $guest->phone = $request->input('phone');
        $guest->nid = $request->input('nid');
        
        if($request->hasFile('guest_image')){
            $image = $request->file('guest_image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/guest_images');
            $image->move($destinationPath, $name);
            $guest->image=$name;
        }
        $guest->save();

        $post = new Posts();
        $post->title_bn = $request->input('title_bn');
        $post->slug=  Str::slug($request->input('title_bn'));
        $post->title_en = $request->input('title_en');
        $post->category_id = $request->input('category_id');
        $post->sub_category_id = $request->input('sub_category_id');
        $post->tags_bn = $request->input('tags_bn');
        $post->tags_en = $request->input('tags_en');
        $post->description_bn = $request->input('description_bn');
        $post->description_en = $request->input('description_en');
        
        $post->is_published = false; 
        $post->is_guest = true; 

        // Associate district and subdistrict with the post
        $districtId = $request->input('district_id');
        $subdistrictId = $request->input('subdistrict_id');

        if ($districtId) {
            $post->district()->associate(District::find($districtId));
        }

        if ($subdistrictId) {
            $post->sub_district()->associate(Subdistrict::find($subdistrictId));
        }

        if($request->hasFile('image')){
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $post->image=$name;
        }

        $post->save();

        // Attach guest information to the post
        $post->guest_id = $guest->id; // Setting guest_id
        $post->save();

        // Redirect back or to any other route after creating the guest and post
        return redirect()->back()->with('success', 'পোস্ট এবং অতিথি সফলভাবে তৈরি হয়েছে।');
    }
}
