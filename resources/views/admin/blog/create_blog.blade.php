@extends('admin.master')
@section('admin')



<div class="page-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-auto">

            </div>
            <div class="col">
                <h1 class="fw-bold">Post a new Blog</h1>

            </div>

        </div>
    </div>
</div>
<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <form method="post" class="card" action="{{ route('admin.blog.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <h4 class="card-title">Form elements</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-8">
                                <div class="row">
                                    <div class="col-md-6 col-xl-12">
                                        <div class="mb-3">
                                            <div class="col-auto mb-3">
                                                <img src="{{ isset($image) ? URL::asset('../backend/assets/uploads/' . $image) : URL::asset('../backend/assets/static/logo.svg') }}"
                                                    width="200" class="img-thumbnail" />
                                            </div>


                                            <div class="col-auto mb-3">
                                                <label class="form-label required">Thumbnail</label>

                                                <input type="file" class="form-control" name="image" required />
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="col-auto mb-3">
                                                <img src="{{ isset($banner) ? URL::asset('../backend/assets/uploads/' . $banner) : URL::asset('../backend/assets/static/logo.svg') }}"
                                                    width="300" class="img-thumbnail banner-img" />
                                            </div>
                                        
                                            <div class="col-auto mb-3">
                                                <label class="form-label required">Banner Image</label>
                                                <input type="file" class="form-control" name="banner" required />
                                            </div>
                                        </div>
                                        


                                        <div class="mb-3">
                                            <label class="form-label required">Blog Title</label>
                                            <input type="text" class="form-control" name="title"
                                                placeholder="Required..." />
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label required">Content</label>
                                                <textarea class="form-control" name="content" id="editor" name="example-textarea-input"
                                                    rows="100" placeholder="Content.." ></textarea>

                                        </div>


                                        <div class="mb-3">
                                            <div class="form-label required">
                                                Category
                                            </div>
                                            <select name="category"  class="form-select" id="select-states" required>
                                                <option value="" disabled selected> Select Category</option>
                                                @foreach(\App\Models\Category::get() as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                            

                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-label required">
                                                Tags
                                            </div>
                                            <select name="tag[]"  class="form-select" id="select-statesx" multiple required>
                                                <option value="" disabled selected> Input or Select Tags</option>
                                                @foreach(\App\Models\Tag::get() as $tag)
                                                <option value="{{ $tag->name }}">{{ $tag->name }}</option>
                                            @endforeach
                                            

                                            </select>
                                        </div>

                                    </div>

                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <div class="d-flex">
                            <a href="#" class="btn btn-link">Cancel</a>
                            <button type="submit" class="btn btn-primary ms-auto">
                                Post
                            </button>
                        </div>
                    </div>
                </form>
            </div>





        </div>
    </div>
</div>
{{-- show selected photo --}}
<script>
    const fileInput = document.querySelector('input[type="file"]');
    const imgPreview = document.querySelector('.col-auto img');

    // Get the existing image source, if any.
    const existingImageSrc = imgPreview.getAttribute('src');

    // Listen for the change event on the file input field.
    fileInput.addEventListener('change', function() {
        // If the user has selected an image, preview it.
        if (fileInput.files.length > 0) {
            const fileReader = new FileReader();
            fileReader.onload = function() {
                imgPreview.src = fileReader.result;
            };
            fileReader.readAsDataURL(fileInput.files[0]);
        } else {
            // If the user has not selected an image, show the existing image or the default image.
            imgPreview.src = existingImageSrc || '{{ URL::asset('../backend/assets/static/logo.svg') }}';
        }
    });
</script>
{{-- for banner --}}

<script>
    const bannerFileInput = document.querySelector('input[name="banner"]');
    const bannerImgPreview = document.querySelector('.col-auto .banner-img');

    // Get the existing banner image source, if any.
    const existingBannerSrc = bannerImgPreview.getAttribute('src');

    // Listen for the change event on the banner file input field.
    bannerFileInput.addEventListener('change', function() {
        // If the user has selected a banner image, preview it.
        if (bannerFileInput.files.length > 0) {
            const fileReader = new FileReader();
            fileReader.onload = function() {
                bannerImgPreview.src = fileReader.result;
            };
            fileReader.readAsDataURL(bannerFileInput.files[0]);
        } else {
            // If the user has not selected a banner image, show the existing banner image or the default image.
            bannerImgPreview.src = existingBannerSrc || '{{ URL::asset('../backend/assets/static/default-banner.jpg') }}';
        }
    });
</script>




{{-- ckeditor 5 --}}
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ),
        {
            ckfinder:{
                uploadUrl:"{{ route('admin.blog.ckeditor').'?.token='.csrf_token() }}",
                filebrowserImageUploadUrl: "{{ route('admin.blog.ckeditor', ['_token' => csrf_token()]) }"
            }
        } )
        .catch( error => {
            console.error( error );
        } );
</script>



@endsection