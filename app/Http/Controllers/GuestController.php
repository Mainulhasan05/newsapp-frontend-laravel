<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guest;
use App\Models\Posts;
use App\Models\District;
use App\Models\Subdistrict;
use App\Models\Categories;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;


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
        
        // if($request->hasFile('guest_image')){
        //     $image = $request->file('guest_image');
        //     $name = time().'.'.$image->getClientOriginalExtension();
        //     $destinationPath = public_path('/guest_images');
        //     $image->move($destinationPath, $name);
        //     $guest->image=$name;
        // }
        if ($request->hasFile('guest_image')) {
            // Upload guest image using API
            $response = Http::attach(
                'image',
                $request->file('guest_image'),
                $request->file('guest_image')->getClientOriginalName() // Specify file name
            )->post('https://www.admin.rifatewu2.xyz/upload-image');

            // Check if the request was successful and get the image path
            if ($response->successful()) {
                $guest->image = $response->json('file_path');
            } else {
                // Handle error if API request fails
                return redirect()->back()->with('error', 'Failed to upload guest image.');
            }
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

    //     if ($request->hasFile('image')) {
    //     $response = Http::attach(
    //         'image', 
    //         file_get_contents($request->file('image')->getRealPath()), 
    //         $request->file('image')->getClientOriginalName()
    //     )->post('https://www.admin.rifatewu2.xyz/upload-image');

    //     if ($response->successful()) {
    //         $filePath = $response->json('file_path');
    //         return response()->json(['file_path' => $filePath], 200);
    //     } else {
    //         return response()->json(['error' => 'Failed to upload image.'], $response->status());
    //     }
    // }
    
    if ($request->hasFile('image')) {
        // Upload post image using API
        $response = Http::attach(
            'image', 
            file_get_contents($request->file('image')->getRealPath()), 
            $request->file('image')->getClientOriginalName()
        )->post('https://www.admin.rifatewu2.xyz/upload-image');

        // Check if the request was successful and get the image path
        if ($response->successful()) {
            $post->image = $response->json('file_path');
        } else {
            // Handle error if API request fails
            return redirect()->back()->with('error', 'Failed to upload post image.');
        }
    }


        $post->save();

        
        $post->guest_id = $guest->id;
        $post->save();

        return redirect()->back()->with('success', 'পোস্ট এবং অতিথি সফলভাবে তৈরি হয়েছে।');
    }
}
