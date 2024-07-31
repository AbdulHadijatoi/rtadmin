@extends('admin.layouts.main')
@section('content')
    @push('css')
        @include('admin.layouts.components.filepond.css')
    @endpush
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create Activity And Packages</h4>
                        <form class="forms-sample" action="{{ route('activities.store') }}" method="post" id="activity-form"
                            id="my-form" enctype="multipart/form-data">
                            @csrf
                            <div id="alertContainer">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect2">Select Category</label>
                                <select class="form-control @error('category_id') is-invalid @enderror"
                                    id="exampleFormControlSelect2" name="category_id">
                                    <option value="" selected>Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlSelect2">Select Sub Category</label>
                                <select class="form-control @error('subcategory_id') is-invalid @enderror"
                                    id="exampleFormControlSelect2" name="subcategory_id">
                                    <option value="" selected>Select Sub Category</option>
                                    @foreach ($subCategories as $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach
                                </select>
                                @error('subcategory_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="exampleInputName1" placeholder="Name" name="name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Page Title</label>
                                <input type="text" class="form-control @error('page_title') is-invalid @enderror"
                                    id="exampleInputName1" placeholder="Page Title" name="page_title">
                                @error('page_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Url</label>
                                <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                    id="exampleInputName1" placeholder="Enter Activity Url" name="slug">
                                @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Duration</label>
                                <input type="number" class="form-control @error('duration') is-invalid @enderror"
                                    id="exampleInputName1" placeholder="Duration" name="duration">
                                @error('duration')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Start Time</label>
                                <input type="time" class="form-control @error('start_time') is-invalid @enderror"
                                    id="exampleInputName1" placeholder="Start Time" name="start_time">
                                @error('start_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Minimum Travelers</label>
                                <input type="number" class="form-control @error('minimum_travelers') is-invalid @enderror"
                                    id="exampleInputName1" placeholder="Minimum Travelers" name="minimum_travelers">
                                @error('minimum_travelers')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Booking Count</label>
                                <input type="number" class="form-control @error('booking_count') is-invalid @enderror"
                                    id="exampleInputName1" placeholder="Booking Count" name="booking_count">
                                @error('booking_count')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Discount Offer</label>
                                <input type="number" class="form-control @error('discount_offer') is-invalid @enderror"
                                    id="exampleInputName1" placeholder="Discount Offer" name="discount_offer">
                                @error('discount_offer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Cancellation Duration</label>
                                <input type="number"
                                    class="form-control @error('cancellation_duration') is-invalid @enderror"
                                    id="exampleInputName1" placeholder="Cancellation Duration"
                                    name="cancellation_duration">
                                @error('cancellation_duration')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- <div class="form-group">
                                                                                        <label for="exampleInputName1">Meet Up</label>
                                                                                        <input type="text" class="form-control @error('meetup') is-invalid @enderror"
                                                                                            id="exampleInputName1" placeholder="Meetup" name="meetup">
                                                                                        @error('meetup')
        <span class="invalid-feedback" role="alert">
                                                                                                                                                        <strong>{{ $message }}</strong>
                                                                                                                                                    </span>
    @enderror
                                                                                    </div> -->

                            <div class="form-group">
                                <label for="exampleInputEmail3">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                                    placeholder="Description" rows="6" cols="50" id="editor4"></textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInpu"></label><br>
                                <div id="">
                                    <div class="feature-item">
                                        <input type="checkbox" name="most_popular_activity" value="1"> Do you want
                                        to show
                                        on most
                                        Popular Activities?<br>
                                    </div>
                                </div>
                                @error('most_popular_activity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="exampleInpu"></label><br>
                                <div id="">
                                    <div class="feature-item">
                                        <input type="checkbox" name="otherexpereience_activity" value="1"> Do you
                                        want to
                                        show on other
                                        Experiences?<br>
                                    </div>
                                </div>
                                @error('otherexpereience_activity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInpu"></label><br>
                                <div id="">
                                    <div class="feature-item">
                                        <input type="checkbox" name="home_activity" value="1"> Do you want to show
                                        on Home
                                        Activities?<br>
                                    </div>
                                </div>
                                @error('home_activity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInpu"></label><br>
                                <div id="">
                                    <div class="feature-item">
                                        <input type="checkbox" name="home_experience_activity" value="1"> Do you
                                        want to
                                        show on HomePage
                                        Experiences?<br>
                                    </div>
                                </div>
                                @error('most_popular_activity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInpu"></label><br>
                                <div id="">
                                    <div class="feature-item">
                                        <input type="checkbox" name="available_activity" value="1">Activity
                                        Available?<br>
                                    </div>
                                </div>
                                @error('available_activity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName1">Add Features</label><br>
                                <div id="features-container">
                                    <div class="feature-item">
                                        <input type="checkbox" name="features[]" value="Join in Group"> Join in Group<br>
                                        <input type="checkbox" name="features[]" value="Instant Confirmation"> Instant
                                        Confirmation<br>
                                        <input type="checkbox" name="features[]" value="Hotel Pick Up"> Hotel Pick Up<br>
                                        <input type="checkbox" name="features[]" value="Private Group Available"> Private
                                        Group Available<br>
                                        <input type="checkbox" name="features[]"
                                            value="Present Mobile or Printed Voucher">
                                        Present Mobile or Printed Voucher<br>
                                    </div>
                                </div>
                                @error('features')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <button type="button" class="btn btn-secondary mt-2" id="add-feature">Add
                                    Language</button>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName1">Highlights</label>
                                <textarea class="form-control @error('highlights') is-invalid @enderror" id="editor1"
                                    placeholder="Use Bullets point for Highlights" name="highlights"></textarea>
                                @error('highlights')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Itinerary</label>
                                <textarea class="form-control @error('itinerary') is-invalid @enderror" id="editor"
                                    placeholder="Use Bullets point for Itinerary" name="itinerary"></textarea>
                                @error('itinerary')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">What's Included</label>
                                <textarea class="form-control @error('whats_included') is-invalid @enderror" id="editor2"
                                    placeholder="Use Bullets point for Itinerary" name="whats_included"></textarea>
                                @error('whats_included')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">What's Not Included</label>
                                <textarea class="form-control @error('whats_not_included') is-invalid @enderror" id="editor3"
                                    placeholder="Use Bullets point for Itinerary" name="whats_not_included"></textarea>
                                @error('whats_not_included')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Instructions Section -->
                            <div class="form-group">
                                <label for="instructions">Instructions</label>
                                <div id="instructions-container">
                                    <div class="instruction-item">
                                        <input type="text" name="instructions[0][instruction_title]"
                                            class="form-control @error('instructions.0.title') is-invalid @enderror"
                                            placeholder="Instruction Title">
                                        @error('instructions.0.title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <textarea name="instructions[0][instruction_description]"
                                            class="form-control @error('instructions.0.description') is-invalid @enderror"
                                            placeholder="Instruction Description" rows="6" cols="50"></textarea>
                                        @error('instructions.0.description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <button type="button" class="btn btn-secondary" id="add-instruction">Add
                                    Instruction</button>
                            </div>

                            <!-- Package section -->
                            <h3 class="display-3 mt-2">ADD PACKAGES</h3>
                            <hr>
                            <div id="packages-container">
                                <div class="form-group">
                                    <label for="categorySelect0">Select Package Category</label>
                                    <select class="form-control @error('category_id') is-invalid @enderror"
                                        id="categorySelect0" name="packages[0][category]">
                                        <option value="" selected>Select Category</option>
                                        @foreach (App\Enums\CategoryEnums::$USER_TYPES as $category)
                                            <option value="{{ $category }}">{{ ucfirst($category) }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="packageName0">Package Name</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        id="packageName0" placeholder="Name" name="packages[0][title]">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group" id="priceGroup0">
                                    <label for="priceInput0">Package Price</label>
                                    <input type="number" class="form-control @error('price') is-invalid @enderror"
                                        id="priceInput0" placeholder="Price" name="packages[0][price]">
                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group" id="adultPriceGroup0" style="display:none;">
                                    <label for="adultPriceInput0">Package Adult Price</label>
                                    <input type="number" class="form-control @error('adult_price') is-invalid @enderror"
                                        id="adultPriceInput0" placeholder="Adult Price" name="packages[0][adult_price]">
                                    @error('adult_price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group" id="childPriceGroup0" style="display:none;">
                                    <label for="childPriceInput0">Package Child Price</label>
                                    <input type="number" class="form-control @error('child_price') is-invalid @enderror"
                                        id="childPriceInput0" placeholder="Child Price" name="packages[0][child_price]">
                                    @error('child_price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="packageDescription0">Package Description</label>
                                    <textarea class="form-control @error('highlight') is-invalid @enderror" id="packageDescription0"
                                        placeholder="Description" name="packages[0][highlight]" rows="6" cols="50"></textarea>
                                    @error('highlight')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                            <button type="button" class="btn btn-secondary mt-2 mb-2" id="add-package">Add
                                Package</button>
                            <!-- End Package section -->

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <div class="mx-auto avatar-xl">
                                            <label for="exampleInputName1">Banner Image</label>
                                            <input type="file"
                                                class="filepond filepond-input-circle {{ $errors->has('image') ? ' is-invalid' : '' }}"
                                                name="image" accept="image/png, image/jpeg, image/gif" />
                                            @error('image')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <div class="mx-auto avatar-xl mt-5 mb-5">Gallery Images</label>
                                            <br>
                                            <input type="file"
                                                class="filepond form-control filepond-input-circle {{ $errors->has('images') ? ' is-invalid' : '' }}"
                                                name="images[]" accept="image/png, image/jpeg, image/gif" multiple />
                                            @error('images')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('admin/plugins/validation/validate.min.js') }}"></script>
    @include('admin.layouts.components.filepond.js')
    <script>
        var activityform = $("#activity-form");
        $(document).ready(function() {
            activityform.validate({
                ignore: "",
                rules: {
                    category_id: {
                        required: true
                    },
                    // subcategory_id: {
                    //     required: true
                    // },
                    name: {
                        required: true
                    },
                    duration: {
                        required: true
                    },
                    description: {
                        required: true
                    },
                    highlights: {
                        required: true
                    },

                    itinerary: {
                        required: true
                    },
                    whats_included: {
                        required: true
                    },
                },
                messages: {
                    category_id: {
                        required: "Please select a category."
                    },
                    // subcategory_id: {
                    //     required: "Please select a sub category."
                    // },
                    name: {
                        required: "Please enter a name."
                    },
                    duration: {
                        required: "Please enter a duration."
                    },
                    description: {
                        required: "Please enter a description."
                    },
                    highlights: {
                        required: "Please enter highlights."
                    },
                    itinerary: {
                        required: "Please enter an itinerary."
                    },
                    whats_included: {
                        required: "Please enter what's included."
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
            });
        });

        const inputElement = document.querySelector('input[name="image"]');
        const pond = FilePond.create(
            document.querySelector('.filepond-input-circle'), {
                labelIdle: 'Drag & Drop your picture or <span class="filepond--label-action">Browse</span>',
                styleLoadIndicatorPosition: 'center bottom',
                styleProgressIndicatorPosition: 'right bottom',
                styleButtonRemoveItemPosition: 'left bottom',
                styleButtonProcessItemPosition: 'right bottom',
                allowMultiple: false
            }
        );
        $.validator.addMethod("strongPassword", function(value, element) {
                return /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}$/.test(value);
            },
            "Password must be a combination of letters, digits, symbols, and both lowercase and uppercase letters. It should be at least 8 characters long."
        );

        // Dynamic instructions script
        document.addEventListener('DOMContentLoaded', function() {
            let instructionCount = 1;

            document.getElementById('add-instruction').addEventListener('click', function() {
                const instructionsContainer = document.getElementById('instructions-container');

                const newInstruction = document.createElement('div');
                newInstruction.classList.add('instruction-item');
                newInstruction.innerHTML = `
                    <input type="text" name="instructions[${instructionCount}][instruction_title]" class="form-control @error('instructions.${instructionCount}.title') is-invalid @enderror" placeholder="Instruction Title">
                    @error('instructions.${instructionCount}.title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <textarea name="instructions[${instructionCount}][instruction_description]" class="form-control @error('instructions.${instructionCount}.description') is-invalid @enderror" placeholder="Instruction Description" rows="6" cols="50"></textarea>
                    @error('instructions.${instructionCount}.description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                `;

                instructionsContainer.appendChild(newInstruction);
                instructionCount++;
            });


            let featureCount = 1; // Start with the count of initial features

            document.getElementById('add-feature').addEventListener('click', function() {
                const featuresContainer = document.getElementById('features-container');

                const newFeature = document.createElement('div');
                newFeature.classList.add('feature-item', 'mt-2');
                newFeature.innerHTML = `
                    <input type="text" name="features[]" class="form-control @error('features') is-invalid @enderror" value="Language:" placeholder="Enter custom feature ${featureCount}">
                `;

                featuresContainer.appendChild(newFeature);
                featureCount++;
            });


        });
    </script>

    <script>
        $(document).ready(function() {



            // Add package
            $("#add-package").click(function() {
                var itemCount = $(".package-item").length + 1;
                var newPackageItem = '<h5>Package<h5><hr>' +
                    '<div class="package-item" id="packageItem' + itemCount + '">' +
                    '<div class="form-group">' +
                    '<label for="categorySelect' + itemCount + '">Select Package Category</label>' +
                    '<select class="form-control @error('category_id') is-invalid @enderror" id="categorySelect' +
                    itemCount + '" name="packages[' + itemCount + '][category]">' +
                    '<option value="" selected>Select Category</option>' +
                    '@foreach (App\Enums\CategoryEnums::$USER_TYPES as $category)' +
                    '<option value="{{ $category }}">{{ ucfirst($category) }}</option>' +
                    '@endforeach' +
                    '</select>' +
                    '@error('category_id')' +
                    '<span class="invalid-feedback" role="alert">' +
                    '<strong>{{ $message }}</strong>' +
                    '</span>' +
                    '@enderror' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label for="packageName' + itemCount + '">Package Name</label>' +
                    '<input type="text" class="form-control @error('title') is-invalid @enderror" id="packageName' +
                    itemCount + '" placeholder="Name" name="packages[' + itemCount + '][title]">' +
                    '@error('title')' +
                    '<span class="invalid-feedback" role="alert">' +
                    '<strong>{{ $message }}</strong>' +
                    '</span>' +
                    '@enderror' +
                    '</div>' +
                    '<div class="form-group" id="priceGroup' + itemCount + '">' +
                    '<label for="priceInput' + itemCount + '">Package Price</label>' +
                    '<input type="number" class="form-control @error('price') is-invalid @enderror" id="priceInput' +
                    itemCount + '" placeholder="Price" name="packages[' + itemCount + '][price]">' +
                    '@error('price')' +
                    '<span class="invalid-feedback" role="alert">' +
                    '<strong>{{ $message }}</strong>' +
                    '</span>' +
                    '@enderror' +
                    '</div>' +
                    '<div class="form-group" id="adultPriceGroup' + itemCount + '" style="display:none;">' +
                    '<label for="adultPriceInput' + itemCount + '">Package Adult Price</label>' +
                    '<input type="number" class="form-control @error('adult_price') is-invalid @enderror" id="adultPriceInput' +
                    itemCount + '" placeholder="Adult Price" name="packages[' + itemCount +
                    '][adult_price]">' +
                    '@error('adult_price')' +
                    '<span class="invalid-feedback" role="alert">' +
                    '<strong>{{ $message }}</strong>' +
                    '</span>' +
                    '@enderror' +
                    '</div>' +
                    '<div class="form-group" id="childPriceGroup' + itemCount + '" style="display:none;">' +
                    '<label for="childPriceInput' + itemCount + '">Package Child Price</label>' +
                    '<input type="number" class="form-control @error('child_price') is-invalid @enderror" id="childPriceInput' +
                    itemCount + '" placeholder="Child Price" name="packages[' + itemCount +
                    '][child_price]">' +
                    '@error('child_price')' +
                    '<span class="invalid-feedback" role="alert">' +
                    '<strong>{{ $message }}</strong>' +
                    '</span>' +
                    '@enderror' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label for="packageDescription' + itemCount + '">Package Description</label>' +
                    '<textarea class="form-control @error('highlight') is-invalid @enderror" id="packageDescription' +
                    itemCount + '" placeholder="Description" name="packages[' + itemCount +
                    '][highlight]" rows="6" cols="50"></textarea>' +
                    '@error('highlight')' +
                    '<span class="invalid-feedback" role="alert">' +
                    '<strong>{{ $message }}</strong>' +
                    '</span>' +
                    '@enderror' +
                    '</div>' +
                    '</div>';
                $("#packages-container").append(newPackageItem);
            });


            $(document).on('change', '[id^=categorySelect]', function() {
                var itemCount = $(this).attr('id').replace('categorySelect', '');
                console.log(itemCount);
                var selectedCategory = $(this).val();
                var priceGroup = $("#priceGroup" + itemCount);
                var adultPriceGroup = $("#adultPriceGroup" + itemCount);
                var childPriceGroup = $("#childPriceGroup" + itemCount);

                if (selectedCategory === 'private') {
                    priceGroup.show();
                    adultPriceGroup.hide();
                    childPriceGroup.hide();
                } else if (selectedCategory === 'sharing') {
                    priceGroup.hide();
                    adultPriceGroup.show();
                    childPriceGroup.show();
                } else {
                    priceGroup.hide();
                    adultPriceGroup.hide();
                    childPriceGroup.hide();
                }
            });

        });
    </script>

    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/balloon-block/ckeditor.js"></script>
@endpush
