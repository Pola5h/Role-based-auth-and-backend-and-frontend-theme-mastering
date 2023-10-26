@extends('admin.master')
@section('title', 'Change Password')
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
                    <form method="post" action="{{ route('password.update') }}" enctype="multipart/form-data"
                        onsubmit="return validateForm()">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <h3 class="card-title mt-4">Change password</h3>
                            <div class="row g-3">
                                <div class="col-md">
                                    <div class="form-label">Old Password</div>
                                    <input id="current_password" type="password" name="current_password"
                                        class="form-control" required>
                                </div>
                                <div class="col-md">
                                    <div class="form-label">Password</div>
                                    <input type="password" id="password" name="password" class="form-control" required>
                                </div>
                                <div class="col-md">
                                    <div class="form-label"> Confirm Password</div>
                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                        class="form-control" required>
                                </div>
                                {{-- Trigger for validateForm script --}}
                                <span id="password-mismatch-error" class="text-danger"></span>
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
    // check new pass === confirm pass

    function validateForm() {
        var newPassword = document.getElementsByName("password")[0].value;
        var confirmPassword = document.getElementsByName("password_confirmation")[0].value;
        var errorSpan = document.getElementById("password-mismatch-error");

        if (newPassword !== confirmPassword) {
            // Display the error message
            errorSpan.innerHTML = "New Password and Confirm Password must match.";
            errorSpan.style.color = "red";
            return false; // Prevent form submission
        } else {
            // Clear the error message if passwords match
            errorSpan.innerHTML = "";
            return true; // Allow form submission
        }
    }
</script>

@endsection