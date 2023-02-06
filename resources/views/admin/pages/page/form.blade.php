@extends('layouts.admin.default')
@section('head')
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <div class="app-content  my-3 my-md-5">
        <div class="side-app">
            <div class="page-header">
                <h4 class="page-title">{{ $page_detail ? 'Edit' : 'Add' }} {{ request()->query('type') }} Page</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('page.index') }}">Page</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $page_detail ? 'Edit' : 'Add' }} Page
                    </li>
                </ol>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">{{ $page_detail ? 'Edit' : 'Add' }} Page</div>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" method="POST" enctype="multipart/form-data"
                                action="{{ route('page.store') }}">
                                @csrf

                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mt-2" id="examplenameInputname2">Page Title
                                                <i>(required)</i></label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                                id="examplenameInputname3" placeholder="" name="title"
                                                onkeyup="convertToSlug(this.value)"
                                                value="{{ $page_detail ? $page_detail->title : old('title') }}">
                                            @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mt-2">Slug</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                                placeholder="" name="slug" id="slug"
                                                value="{{ $page_detail ? $page_detail->slug : old('slug') }}">
                                            @error('slug')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mt-2">Thumbnail</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <div class="input-group file-browser">
                                                    <input type="text"
                                                        class=" @error('thumbnail') is-invalid @enderror form-control border-right-0 browse-file"
                                                        placeholder="Upload Thumbnail" readonly>
                                                    <label class="input-group-btn">
                                                        <span class="btn btn-primary">
                                                            Browse <input type="file" style="display: none;"
                                                                name="thumbnail">
                                                        </span>
                                                    </label>
                                                    @error('thumbnail')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mt-2">Image</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <div class="input-group file-browser">
                                                    <input type="text"
                                                        class=" @error('banner') is-invalid @enderror form-control border-right-0 browse-file"
                                                        placeholder="Upload Image" readonly>
                                                    <label class="input-group-btn">
                                                        <span class="btn btn-primary">
                                                            Browse <input type="file" style="display: none;"
                                                                name="banner_image">
                                                        </span>
                                                    </label>
                                                    @error('banner')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mt-2">Meta Title
                                                <i>(optional)</i></label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text"
                                                class="form-control @error('meta_title') is-invalid @enderror"
                                                placeholder="" name="meta_title"
                                                value="{{ $page_detail ? $page_detail->meta_title : old('meta_title') }}">
                                            @error('meta_title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mt-2">Meta Keyword
                                                <i>(optional)</i></label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text"
                                                class="form-control @error('meta_keyword') is-invalid @enderror"
                                                placeholder="" name="meta_keyword"
                                                value="{{ $page_detail ? $page_detail->meta_keyword : old('meta_keyword') }}">
                                            @error('meta_keyword')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mt-2">Meta Description
                                                <i>(optional)</i></label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text"
                                                class="form-control @error('meta_description') is-invalid @enderror"
                                                placeholder="" name="meta_description"
                                                value="{{ $page_detail ? $page_detail->meta_keyword : old('meta_description') }}">
                                            @error('meta_description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mt-2">Description</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="hidden" name="id"
                                                value="{{ $page_detail ? $page_detail->id : '' }}">
                                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ $page_detail ? $page_detail->description : old('description') }}</textarea>
                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-0 row justify-content-end">
                                    <div class="col-md-3">
                                        <button type="submit"
                                            class="btn btn-primary waves-effect waves-light">{{ $page_detail ? 'Edit' : 'Add' }}
                                            Page</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.0/super-build/ckeditor.js"></script>

    <script>
        // This sample still does not showcase all CKEditor 5 features (!)
        // Visit https://ckeditor.com/docs/ckeditor5/latest/features/index.html to browse all the features.
        CKEDITOR.ClassicEditor.create(document.getElementById("description"), {
            // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
            toolbar: {
                items: [
                    'exportPDF', 'exportWord', '|',
                    'findAndReplace', 'selectAll', '|',
                    'heading', '|',
                    'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript',
                    'removeFormat', '|',
                    'bulletedList', 'numberedList', 'todoList', '|',
                    'outdent', 'indent', '|',
                    'undo', 'redo',
                    '-',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                    'alignment', '|',
                    'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed',
                    '|',
                    'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                    'textPartLanguage', '|',
                    'sourceEditing'
                ],
                shouldNotGroupWhenFull: true
            },
            // Changing the language of the interface requires loading the language file using the <script> tag.
            // language: 'es',
            list: {
                properties: {
                    styles: true,
                    startIndex: true,
                    reversed: true
                }
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
            heading: {
                options: [{
                        model: 'paragraph',
                        title: 'Paragraph',
                        class: 'ck-heading_paragraph'
                    },
                    {
                        model: 'heading1',
                        view: 'h1',
                        title: 'Heading 1',
                        class: 'ck-heading_heading1'
                    },
                    {
                        model: 'heading2',
                        view: 'h2',
                        title: 'Heading 2',
                        class: 'ck-heading_heading2'
                    },
                    {
                        model: 'heading3',
                        view: 'h3',
                        title: 'Heading 3',
                        class: 'ck-heading_heading3'
                    },
                    {
                        model: 'heading4',
                        view: 'h4',
                        title: 'Heading 4',
                        class: 'ck-heading_heading4'
                    },
                    {
                        model: 'heading5',
                        view: 'h5',
                        title: 'Heading 5',
                        class: 'ck-heading_heading5'
                    },
                    {
                        model: 'heading6',
                        view: 'h6',
                        title: 'Heading 6',
                        class: 'ck-heading_heading6'
                    }
                ]
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
            placeholder: 'Welcome to CKEditor 5!',
            // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
            fontFamily: {
                options: [
                    'default',
                    'Arial, Helvetica, sans-serif',
                    'Courier New, Courier, monospace',
                    'Georgia, serif',
                    'Lucida Sans Unicode, Lucida Grande, sans-serif',
                    'Tahoma, Geneva, sans-serif',
                    'Times New Roman, Times, serif',
                    'Trebuchet MS, Helvetica, sans-serif',
                    'Verdana, Geneva, sans-serif'
                ],
                supportAllValues: true
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
            fontSize: {
                options: [10, 12, 14, 'default', 18, 20, 22],
                supportAllValues: true
            },
            // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
            // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
            htmlSupport: {
                allow: [{
                    name: /.*/,
                    attributes: true,
                    classes: true,
                    styles: true
                }]
            },
            // Be careful with enabling previews
            // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
            htmlEmbed: {
                showPreviews: true
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
            link: {
                decorators: {
                    addTargetToExternalLinks: true,
                    defaultProtocol: 'https://',
                    toggleDownloadable: {
                        mode: 'manual',
                        label: 'Downloadable',
                        attributes: {
                            download: 'file'
                        }
                    }
                }
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
            mention: {
                feeds: [{
                    marker: '@',
                    feed: [
                        '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes',
                        '@chocolate', '@cookie', '@cotton', '@cream',
                        '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread',
                        '@gummi', '@ice', '@jelly-o',
                        '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding',
                        '@sesame', '@snaps', '@soufflé',
                        '@sugar', '@sweet', '@topping', '@wafer'
                    ],
                    minimumCharacters: 1
                }]
            },
            // The "super-build" contains more premium features that require additional configuration, disable them below.
            // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
            removePlugins: [
                // These two are commercial, but you can try them out without registering to a trial.
                // 'ExportPdf',
                // 'ExportWord',
                'CKBox',
                'CKFinder',
                'EasyImage',
                // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
                // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
                // Storing images as Base64 is usually a very bad idea.
                // Replace it on production website with other solutions:
                // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
                // 'Base64UploadAdapter',
                'RealTimeCollaborativeComments',
                'RealTimeCollaborativeTrackChanges',
                'RealTimeCollaborativeRevisionHistory',
                'PresenceList',
                'Comments',
                'TrackChanges',
                'TrackChangesData',
                'RevisionHistory',
                'Pagination',
                'WProofreader',
                // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
                // from a local file system (file://) - load this site via HTTP server if you enable MathType
                'MathType'
            ]
        });
    </script>

    <script>
        $(document).ready(function() {
            $("#parent_id").select2({});


        });

        function convertToSlug(Text) {
            console.log('in2');
            let slug = Text.toLowerCase()
                .replace(/[^\w ]+/g, '')
                .replace(/ +/g, '-');
            $("#slug").val(slug);
        }
    </script>
@endsection
