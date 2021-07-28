@extends('layouts/layout')


@section('head')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <style>
        .ql-editor {
            min-height: 200px;
        }

    </style>
@endsection

@section('content')


    <div class="py-12 ">

        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <h2
                class="bg-gradient-to-r from-green-400 to-blue-500 mb-9 text-3xl text-white w-1/3 mx-auto text-center rounded font-bold rounded">
                Add News<h2>

                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                        <div class="p-6 bg-white border border-gray-200">

                            <form method="POST" action="/article" class="text-sm" id="form" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-4">
                                    <label class="text-lg text-gray-600">Title <span
                                            class="text-red-500">*</span></label><br>
                                    <input type="text" class="border-2 border-gray-300 p-2 w-full" name="title" id="title"
                                        value="" required>
                                </div>

                                <div class="mb-4">
                                    <label class="text-lg text-gray-600">Category <span
                                            class="text-red-500">*</span></label><br>
                                    <select name="category_id"
                                        class="w-full border bg-white rounded px-3 py-2 outline-none">
                                        @foreach ($categories as $category)
                                            <option class="py-1" value="{{ $category->id }}">{{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label class="text-lg text-gray-600">Thumbnail</label><br>
                                    <input type="file" class="border-2 border-gray-300 p-2 w-full" name="thumbnail_file"
                                        id="thumbnail_file">
                                </div>

                                <div class="mb-8">
                                    <label class="text-lg text-gray-600">Content <span
                                            class="text-red-500">*</span></label><br>
                                    <div id="editor">
                                    </div>
                                    <textarea hidden id="hidden-content" name="content" class="border-2 border-gray-500">

                                                                        </textarea>
                                </div>

                                <div class="flex justify-center p-1">
                                    <button type="button" onclick="submitForm()"
                                        class="bg-gradient-to-r from-green-400 to-blue-500 p-3 text-white hover:bg-blue-400 rounded w-56 font-bold"
                                        required>Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
        </div>
    </div>

    <script>
        function submitForm() {
            document.getElementById('hidden-content').innerHTML = document.getElementsByClassName('ql-editor')[0].innerHTML
            document.getElementById('form').submit()
        }
    </script>
    <!-- Include the Quill library -->

    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <!-- Initialize Quill editor -->
    <script>
        var toolbarOptions = [
            ['bold', 'italic', 'underline', 'strike'], // toggled buttons
            ['blockquote', 'code-block'],
            ['image', 'video'],
            [{
                'list': 'ordered'
            }, {
                'list': 'bullet'
            }],
            [{
                'script': 'sub'
            }, {
                'script': 'super'
            }], // superscript/subscript
            [{
                'indent': '-1'
            }, {
                'indent': '+1'
            }], // outdent/indent
            [{
                'header': [1, 2, 3, 4, 5, 6, false]
            }],
            [{
                'color': []
            }, {
                'background': []
            }], // dropdown with defaults from theme
            [{
                'font': []
            }],
            [{
                'align': []
            }],
            ['clean'] // remove formatting button
        ];

        var quill = new Quill('#editor', {
            modules: {
                toolbar: toolbarOptions
            },
            theme: 'snow'
        });
    </script>


@endsection
