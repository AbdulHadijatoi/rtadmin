@php
    $user=Auth::user();
@endphp
@extends('admin.layouts.main')
@section('content')
<div class="content-wrapper">
    <div class="row">
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Profile Setting</h4>
        <form class="forms-sample" action="{{route('admin.updateProfile',$user->id)}}"  method="post" id="profile-form">
            @csrf
            @displayErrors
          <div class="form-group">
            <label for="exampleInputName1">Name</label>
            <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="exampleInputName1" placeholder="Name" name="first_name" value="{{$user->first_name ?? ''}}" required>
            @error('first_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputEmail3">Email address</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail3" placeholder="Email" name="email" value="{{$user->email ?? ''}}" required>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
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
<script src="{{asset('admin/plugins/validation/validate.min.js') }}"></script>
<script>
    var Profileform = $("#profile-form");
    $(document).ready(function() {
        loginform.validate({
        ignore: "",
        rules: {
            name: {
            required: true
          },
          email: {
            required: true
          },
        },
        messages: {
            name: {
          required: "Please enter the name",
          },
          email: {
          required: "Please enter the email",
          },
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
          form.preventDefault()
          return false
          // Handle form submission
        }
      });
    });
    $.validator.addMethod("strongPassword", function(value, element) {
        return /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}$/.test(value);
    }, "Password must be a combination of letters, digits, symbols, and both lowercase and uppercase letters. It should be at least 8 characters long.");
</script>
