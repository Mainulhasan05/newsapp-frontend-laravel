@extends('layouts.master')

@section('title')
    পোস্ট লেখুন
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>পোস্ট লেখুন</h1>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="title">টাইটেল (বাংলা)</label>
                            <input type="text" name="title_bn" id="title" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="title">টাইটেল (ইংরেজি)</label>
                            <input type="text" name="title_en" id="title" class="form-control" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="title">বিভাগ</label>
                            <select class="form-control" name="category_id" id="categorySelect">
                                <option value="">বিভাগ নির্বাচন করুন</option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="title">উপবিভাগ</label>
                            <select class="form-control" name="subcategory_id" id="subcategory_id">
                                <option value="">উপবিভাগ নির্বাচন করুন</option>

                            </select>
                        </div>
                    </div>


                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="title">জেলা</label>
                            <select class="form-control" name="district_id" id="districtSelect">
                                <option value="">জেলা নির্বাচন করুন</option>
                                @foreach ($districts as $item)
                                    <option value="{{ $item->id }}">{{ $item->district_bn }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="title">উপজেলা</label>
                            <select class="form-control" name="subdistrict_id" id="subdistrict_id">
                                <option value="">উপজেলা নির্বাচন করুন</option>

                            </select>
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="image">ছবি</label>
                        <input type="file" name="image" id="image" class="form-control -file">
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="title">ট্যাগ (বাংলা) (কমা দিয়ে পৃথক)</label>
                            <input type="text" name="tags_bn" id="title" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="title">ট্যাগ (ইংরেজি) (কমা দিয়ে পৃথক)</label>
                            <input type="text" name="tags_en" id="title" class="form-control" required>
                        </div>
                    </div>

                    {{-- TinyMCE code --}}
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">বর্ণনা (বাংলা)</h5>
                            <!-- TinyMCE Editor -->
                            <textarea name="description_bn" class="tinymce-editor">
                          </textarea><!-- End TinyMCE Editor -->
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">বর্ণনা (ইংরেজি) (ঐচ্ছিক)</h5>
                            <!-- TinyMCE Editor -->
                            <textarea name="description_en" class="tinymce-editor">
                          </textarea><!-- End TinyMCE Editor -->
                        </div>
                    </div>

                    {{-- create two checkbox is_header and is_featured --}}
                    <hr>
                    <h3 class="text-center">অতিরিক্ত অপশন</h3>
                    <div class="form-group">
                        <input type="checkbox" name="headline" id="is_header" class="">
                        <label for="is_header">শিরোনাম হলো</label>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="big_thumbnail" id="is_big_thumbnail" class="">
                        <label for="is_big_thumbnail">বড় থাম্বনেল হলো</label>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="first_sectrion" id="is_featured" class="">
                        <label for="is_featured">প্রথম বিভাগে</label>
                    </div>


                    <div class="form-group">
                        <input type="checkbox" name="first_section_thumbnail" id="is_published" class="">
                        <label for="is_published">প্রথম বিভাগ থাম্বনেল</label>
                    </div>
                    <div class="form-group">
                        <label for="views">ভিউস</label>
                        <input type="number" name="views" id="views" class="form-control" value="0">
                    </div>

                    

                    <button type="submit" class="btn btn-primary">তৈরি করুন</button>
                </form>
            </div>
        </div>
    </div>
@endsection
