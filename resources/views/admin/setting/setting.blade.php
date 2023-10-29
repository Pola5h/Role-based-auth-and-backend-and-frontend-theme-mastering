@extends('admin.master')
@section('title', 'Edit Profile Information')
@section('admin')

<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        <h2 class="page-title">
          Account Settings
        </h2>
      </div>
    </div>
  </div>
</div>
<!-- Page body -->
<div class="page-body">
  <div class="container-xl">
    <div class="card">
      <div class="row g-0">
        <div class="col-3 d-none d-md-block border-end">
          <div class="card-body">
            <div class="list-group list-group-transparent">
              <a href="{{url('setting')}}"
                class="list-group-item list-group-item-action d-flex align-items-center {{ Request::is('setting') ? 'active' : '' }}">My
                Account</a>
              <a href="{{route('password.index')}}"
                class="list-group-item list-group-item-action d-flex align-items-center {{ Request::is('password') ? 'active' : '' }}">Change
                Password</a>

            </div>

          </div>
        </div>
        <div class="col d-flex flex-column">
          <form method="post" action="{{ route('admin.setting.update', $userData->id) }}" enctype="multipart/form-data"
            onsubmit="return validateForm()">
            @csrf
            @method('PUT')
            <div class="card-body">
              <h2 class="mb-4">My Account</h2>
              <h3 class="card-title">Profile Image</h3>
              <div class="row align-items-center">
                <div class="col-auto"> <img src="{{ asset('images/' . $userData->image) }}" width="100"
                    class="img-thumbnail" />
                  </span>
                </div>
                <div class="col-auto">

                  <input type="file" name="image" />

                </div>

              </div>
              <h3 class="card-title mt-4">Persional Info</h3>
              <div class="row g-3">
                <div class="col-md">
                  <div class="form-label">Name</div>
                  <input type="text" name="name" class="form-control" value="{{ $userData->name }}" required='true'>
                </div>
                <div class="col-md">
                  <div class="form-label">Email: </div>
                  <input type="email" name="email" class="form-control" value="{{ $userData->email }}" required='true'>
                </div>
                <div class="col-md">
                  <div class="form-label">About: </div>
                  <textarea name="about" class="form-control" rows="5"  required='true'>{{ $userData->about }}</textarea>
                </div>
                
              </div>
              <h3 class="card-title mt-4">Scoical media</h3>
              <div class="input-icon mb-3">
           
              </div>
              <div class="row g-3">
                <div class="col-md">
                  <div class="form-label">Facebook</div>
                  <input type="text" name="facebook" placeholder="@ facebook username" class="form-control" value="{{ $userSocialData->facebook ?? '' }}" >
                </div>
                <div class="col-md">
                  <div class="form-label">Twitter: </div>
                  <input type="text" name="twitter"  placeholder=" @ twitter username" class="form-control" value="{{ $userSocialData->twitter ?? ''}}">
                </div>
                <div class="col-md">
                  <div class="form-label">Instagram: </div>
                  <input type="text" name="instagram"  placeholder="@ instagram username" class="form-control" value="{{ $userSocialData->instagram ?? ''}}">
                </div>
                <div class="col-md">
                  <div class="form-label">Youtube: </div>
                  <input type="text" name="youtube"  placeholder=" @ youtube username" class="form-control" value="{{ $userSocialData->youtube?? '' }}">
                </div>
              </div>

            </div>
            <div class="card-footer bg-transparent mt-auto">
              <div class="btn-list justify-content-end">
                <input type="submit" class="btn btn-primary" value="update" />

              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
              const fileInput = document.querySelector('input[type="file"]');
            const imgPreview = document.querySelector('.row img');

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
                // If the user has not selected an image, show the existing image, if any.
                imgPreview.src = existingImageSrc;
              }
            });

</script>

@endsection