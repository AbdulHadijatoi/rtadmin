@include('admin.layouts.components.style')

<div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
                <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                    <div class="brand-logo">
                        <img src="{{ asset('logo.png') }}" alt="logo">
                    </div>
                    @displayErrors
                    <h4>Hello! let's get started</h4>
                    <h6 class="font-weight-light">Sign in to continue.</h6>
                    <form class="pt-3" action="{{ route('admin.login') }}" method="POST" id="login-form">
                        @csrf
                        <div class="form-group">
                            <input type="email"
                                class="form-control form-control-lg @error('email') is-invalid @enderror"
                                id="exampleInputEmail1" placeholder="Username" name="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password"
                                class="form-control form-control-lg @error('password') is-invalid @enderror"
                                id="exampleInputPassword1" placeholder="Password" name="password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <button type="submit"
                                class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Submit</button>
                            {{-- <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                href="../../index.html">SIGN IN</a> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@include('admin.layouts.components.scripts')
<script src="{{ asset('admin/plugins/validation/validate.min.js') }}"></script>
<script>
    var loginform = $("#login-form");
    $(document).ready(function() {
        loginform.validate({
            ignore: "",
            rules: {
                email: {
                    required: true
                },
                password: {
                    required: true,
                },
            },
            messages: {
                email: {
                    required: "Please enter the email",
                },
                password: {
                    required: "Please enter a password",

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
        },
        "Password must be a combination of letters, digits, symbols, and both lowercase and uppercase letters. It should be at least 8 characters long."
    );
</script>
