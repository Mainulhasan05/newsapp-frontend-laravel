<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guest;
use App\Models\Posts;
use App\Models\District;
use App\Models\Subdistrict;
use App\Models\Categories;

class GuestController extends Controller
{

    public function createForm()
    {
        $categories=Categories::select('id', 'name')->whereNull('parent_id')->get();
        $districts=District::select('id', 'district_bn')->get();
        
        return view('guest',compact('categories', 'districts'));
    }
    public function store(Request $request)
    {
        // Validation can be added here if needed

        // Create a new guest record in the database
        $guest = new Guest();
        $guest->name = $request->input('name');
        $guest->email = $request->input('email');
        $guest->phone = $request->input('phone');
        $guest->nid = $request->input('nid');
        $guest->image = $request->file('image')->store('guest_images');

        $guest->save();

        // Create a new post record in the database associated with the guest
        $post = new Posts();
        $post->title_bn = $request->input('title_bn');
        $post->title_en = $request->input('title_en');
        $post->category_id = $request->input('category_id');
        $post->subcategory_id = $request->input('subcategory_id');
        $post->tags_bn = $request->input('tags_bn');
        $post->tags_en = $request->input('tags_en');
        $post->description_bn = $request->input('description_bn');
        $post->description_en = $request->input('description_en');
        $post->headline = $request->has('headline') ? true : false;
        $post->big_thumbnail = $request->has('big_thumbnail') ? true : false;
        $post->first_section = $request->has('first_sectrion') ? true : false;
        $post->first_section_thumbnail = $request->has('first_section_thumbnail') ? true : false;
        $post->views = $request->input('views');

        // Associate district and subdistrict with the post
        $districtId = $request->input('district_id');
        $subdistrictId = $request->input('subdistrict_id');

        if ($districtId) {
            $post->district()->associate(District::find($districtId));
        }

        if ($subdistrictId) {
            $post->sub_district()->associate(Subdistrict::find($subdistrictId));
        }

        $post->save();

        // Attach guest information to the post
        $post->guest()->associate($guest);
        $post->save();

        // Redirect back or to any other route after creating the guest and post
        return redirect()->back()->with('success', 'পোস্ট এবং অতিথি সফলভাবে তৈরি হয়েছে।');
    }
}
