@extends('layouts.master')

@section('title')
    পোস্ট লেখুন
@endsection

@section('content')
<link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/42.0.0/ckeditor5.css" />

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <br><br>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('guest.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <h2>অতিথি তথ্য</h2>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name">নাম</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">ইমেল</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="phone">ফোন</label>
                            <input type="text" name="phone" id="phone" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nid">এনআইডি</label>
                            <input type="text" name="nid" id="nid" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="guest_image">আপনার ছবি</label>
                        <input type="file" name="guest_image" id="guest_image" class="form-control-file">
                    </div>

                    <h2>পোস্ট তথ্য</h2>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="title_bn">টাইটেল (বাংলা)</label>
                            <input type="text" name="title_bn" id="title_bn" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="category_id">বিভাগ</label>
                            <select class="form-control" name="category_id" id="category_id">
                                <option value="">বিভাগ নির্বাচন করুন</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="image">খবরের ছবি</label>
                            <input type="file" name="image" id="image" class="form-control-file">
                        </div>
                    </div>
                    
                    
                    {{-- TinyMCE code --}}
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">বর্ণনা</h5>
                            <!-- TinyMCE Editor -->
                            {{-- <textarea id="editor" name="description_bn" class="tinymce-editor"></textarea><!-- End TinyMCE Editor --> --}}
                            {{-- <div name="description_bn" id="editor"> --}}
                                <textarea name="description_bn" class="w-100"></textarea>
                                
                            </div>
                            {{-- <input type="hidden" name="description_bn" id="description_bn"> --}}
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">তথ্য সংরক্ষণ করুন</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.tiny.cloud/1/2mhhga1agevzbqrjvzvqt8wbk4z0yowxqy6sgoaqssk9xezc/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
    {{-- <script src="js/tinymce/tinymce.min.js"></script> --}}
    <script type="importmap">
    {
        "imports": {
            "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/42.0.0/ckeditor5.js",
            "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/42.0.0/"
        }
    }
</script>
<script type="importmap">
    {
        "imports": {
            "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/42.0.0/ckeditor5.js",
            "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/42.0.0/"
        }
    }
</script>
<script type="module">
    import {
        ClassicEditor,
        Essentials,
        Bold,
        Italic,
        Font,
        Paragraph
    } from 'ckeditor5';

    ClassicEditor
        .create( document.querySelector( '#editor' ), {
            plugins: [ Essentials, Bold, Italic, Font, Paragraph ],
            toolbar: {
                items: [
                    'undo', 'redo', '|', 'bold', 'italic', '|',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
                ]
            }
        } )
        .then( editor => {
            console.log( 'Editor was initialized', editor );
                // Ensure the hidden input field is updated with the CKEditor data before form submission
                document.getElementById('guest-form').addEventListener('submit', function(event) {
                    console.log('Form submission event triggered');
                    document.getElementById('description_bn').value = editor.getData();
                });
            } )
            .catch( error => {
                console.error(error);
            } );
</script>


    <script>
        
        // tinymce.init({
        //     selector: 'textarea#description_bn', 
        //     plugins: 'table lists ',
        //     toolbar: 'undo redo | blocks| bold italic | bullist numlist checklist | code | table'
        // });
    </script>
@endsection
