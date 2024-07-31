@extends('admin.layouts.main')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Change Password</h4>
                    <p class="card-description">Profile Setting</p>
                    <form class="forms-sample" action="{{ route('admin.updatePassword') }}" method="post" id="password-form">
                        @csrf
                        <div class="form-group">
                            <label for="current_password">Current Password</label>
                            <input type="password" class="form-control @error('current_password') is-invalid @enderror" id="current_password" placeholder="Current Password" name="current_password">
                            @error('current_password')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="new_password">New Password</label>
                            <input type="password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" placeholder="New Password" name="new_password">
                            @error('new_password')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@include('admin.layouts.components.scripts')

<script src="{{ asset('admin/plugins/validation/validate.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#password-form').validate({
            rules: {
                current_password: {
                    required: true
                },
                new_password: {
                    required: true,
                    minlength: 8
                }
            },
            messages: {
                current_password: {
                    required: "Please enter your current password."
                },
                new_password: {
                    required: "Please enter a new password.",
                    minlength: "Your password must be at least 8 characters long."
                }
            },
            highlight: function(element) {
                $(element).addClass("is-invalid");
            },
            unhighlight: function(element) {
                $(element).removeClass("is-invalid");
            },
            errorPlacement: function(error, element) {
                error.addClass("invalid-feedback");
                error.insertAfter(element);
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });
</script>
