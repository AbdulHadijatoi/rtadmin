@extends('admin.layouts.main')
@push('css')
    @include('admin.layouts.components.filepond.css')
@endpush
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Activity</h4>
                        <form class="forms-sample" action="{{ route('activities.update', $activity->id) }}" method="post"
                            id="activity-form">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="exampleFormControlSelect2">Select Category</label>
                                <select class="form-control @error('category_id') is-invalid @enderror"
                                    id="exampleFormControlSelect2" name="category_id">
                                    {{-- <option value="" selected>Select Category</option> --}}
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $activity->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
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
                                        <option value="{{ $value->id }}"
                                            {{ isset($activity->subcategory_id) && $activity->subcategory_id == $value->id ? 'selected' : '' }}>
                                            {{ $value->name }}
                                        </option>
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
                                    id="exampleInputName1" placeholder="Name" name="name" value="{{ $activity->name }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName1">Page Title</label>
                                <input type="text" class="form-control @error('page_title') is-invalid @enderror"
                                    id="exampleInputName1" placeholder="Page Title" name="page_title"
                                    value="{{ $activity->page_title }}">
                                @error('page_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName1">Url</label>
                                <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                    id="exampleInputName1" placeholder="Enter Activity Url" name="slug"
                                    value="{{ $activity->slug }}">
                                @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Duration</label>
                                <input type="number" class="form-control @error('duration') is-invalid @enderror"
                                    id="exampleInputName1" placeholder="Duration" name="duration"
                                    value="{{ $activity->duration }}">
                                @error('duration')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName1">Start Time</label>
                                <input type="time" class="form-control @error('start_time') is-invalid @enderror"
                                    id="exampleInputName1" placeholder="Start Time" name="start_time"
                                    value="{{ $activity->start_time }}">
                                @error('start_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName1">Booking Count</label>
                                <input type="number" class="form-control @error('booking_count') is-invalid @enderror"
                                    id="exampleInputName1" placeholder="Booking Count" name="booking_count"
                                    value="{{ $activity->booking_count }}">
                                @error('booking_count')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Discount Offer</label>
                                <input type="number" class="form-control @error('discount_offer') is-invalid @enderror"
                                    id="exampleInputName1" placeholder="discount_offer" name="discount_offer"
                                    value="{{ $activity->discount_offer }}">
                                @error('discount_offer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Minimum Travellers</label>
                                <input type="number" class="form-control @error('minimum_travelers') is-invalid @enderror"
                                    id="exampleInputName1" placeholder="Cancellation Duration" name="minimum_travelers"
                                    value="{{ $activity->minimum_travelers }}">
                                @error('minimum_travelers')
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
                                    name="cancellation_duration" value="{{ $activity->cancellation_duration }}">
                                @error('cancellation_duration')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail3">description</label>
                                {{-- <div id="container"> --}}
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                                    placeholder="Description" rows="6" cols="50" id="editor4">{{ $activity->description }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="mostPopularActivity">Do You Want Most Popular Activity</label><br>
                                <input type="checkbox" name="" id="mostPopularActivity"
                                    value="{{ $activity->most_popular_activity }}"
                                    @if ($activity->most_popular_activity == 1) checked @endif>
                            </div>
                            <input type="hidden" name="most_popular_activity" id="mostPopularActivityInput"
                                value="{{ $activity->most_popular_activity }}">

                            <div class="form-group">
                                <label for="otherExperienceActivity">Do You Want Other Experience</label><br>
                                <input type="checkbox" name="" id="otherExperienceActivity"
                                    value="{{ $activity->otherexpereience_activity }}"
                                    @if ($activity->otherexpereience_activity == 1) checked @endif>
                            </div>
                            <input type="hidden" name="otherexpereience_activity" id="otherExperienceActivityInput"
                                value="{{ $activity->otherexpereience_activity }}">

                            <div class="form-group">
                                <label for="homeActivity">Do You Want Home Activity</label><br>
                                <input type="checkbox" name="" id="homeActivity"
                                    value="{{ $activity->home_activity }}"
                                    @if ($activity->home_activity == 1) checked @endif>
                            </div>
                            <input type="hidden" name="home_activity" id="homeActivityInput"
                                value="{{ $activity->home_activity }}">

                            <div class="form-group">
                                <label for="homeExperienceActivity">Do You Want Home Experience Activity</label><br>
                                <input type="checkbox" name="" id="homeExperienceActivity"
                                    value="{{ $activity->home_experience_activity }}"
                                    @if ($activity->home_experience_activity == 1) checked @endif>
                            </div>
                            <input type="hidden" name="home_experience_activity" id="homeExperienceActivityInput"
                                value="{{ $activity->home_experience_activity }}">

                            <div class="form-group">
                                <label for="availableActivity">Available Activity</label><br>
                                <input type="checkbox" name="" id="availableActivity"
                                    value="{{ $activity->available_activity }}"
                                    @if ($activity->available_activity == 1) checked @endif>
                            </div>
                            <input type="hidden" name="available_activity" id="availableActivityInput"
                                value="{{ $activity->available_activity }}">

                            <div class="form-group">
                                <label for="exampleInputName1">Features</label><br>
                                <div id="features-container">
                                    @if (isset($activity->features))
                                        @foreach ($activity->features as $feature)
                                            <input type="checkbox" name="features[]" value="{{ $feature }}"
                                                checked>
                                            {{ $feature }}<br>
                                        @endforeach
                                    @endif
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

                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Highlights</label>
                                <textarea class="form-control @error('highlights') is-invalid @enderror" id="editor1"
                                    placeholder="Use Bullets point for Highlights" name="highlights">{{ $activity->highlights }}</textarea>
                                @error('highlights')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">itinerary</label>
                                <textarea class="form-control @error('itinerary') is-invalid @enderror" id="editor"
                                    placeholder="Use Bullets point Itinerary" name="itinerary">{{ $activity->itinerary }}</textarea>
                                @error('itinerary')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Whats Included</label>
                                <textarea class="form-control @error('whats_included') is-invalid @enderror" id="editor2"
                                    placeholder="Use Bullets point whats included" name="whats_included">{{ $activity->whats_included }}</textarea>
                                @error('whats_included')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Whats Not Included</label>
                                <textarea class="form-control @error('whats_not_included') is-invalid @enderror" id="editor3"
                                    placeholder="Use Bullets point whats included" name="whats_not_included">{{ $activity->whats_not_included }}</textarea>
                                @error('whats_not_included')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <hr>
                                <h4>Instructions</h4>
                                <div id="instructions-container">
                                    @foreach ($activity->instructions as $index => $instruction)
                                        <div class="instruction-item mt-3">
                                            <input type="hidden"
                                                name="instructions[{{ $index }}][instruction_id]"
                                                value="{{ $instruction->id }}">
                                            <label for="exampleInputName1">Title</label>
                                            <input type="text"
                                                name="instructions[{{ $index }}][instruction_title]"
                                                class="form-control @error('instructions.' . $index . '.instruction_title') is-invalid @enderror"
                                                placeholder="Instruction Title"
                                                value="{{ $instruction->instruction_title }}">
                                            @error('instructions.' . $index . '.instruction_title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <label for="exampleInputName1" class="mt-1">Description</label>
                                            <textarea name="instructions[{{ $index }}][instruction_description]"
                                                class="form-control @error('instructions.' . $index . '.instruction_description') is-invalid @enderror"
                                                placeholder="Instruction Description" rows="6" cols="50">{{ $instruction->instruction_description }}</textarea>
                                            @error('instructions.' . $index . '.instruction_description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    @endforeach
                                </div>
                                <button type="button" id="add-instruction" class="btn btn-primary mt-3">Add
                                    Instruction</button>
                            </div>

                            <!-- Package fields -->
                            <h4 class="display-3 mt-2">Edit Packages</h4>
                            <hr>
                            <div class="form-group" id="packages-container">
                                @foreach ($activity->packages as $index => $package)
                                    <div class="package-item" id="packageItem{{ $index }}">
                                        <h4 class="mt-2">Package</h4>
                                        <input type="hidden" name="packages[{{ $index }}][id]"
                                            value="{{ $package->id }}">
                                        <div class="form-group">
                                            <label for="categorySelect{{ $index }}">Select Package Category</label>
                                            <select class="form-control package-category"
                                                id="categorySelect{{ $index }}"
                                                name="packages[{{ $index }}][category]">
                                                <option value="private"
                                                    {{ $package->category == 'private' ? 'selected' : '' }}>
                                                    Private</option>
                                                <option value="sharing"
                                                    {{ $package->category == 'sharing' ? 'selected' : '' }}>
                                                    Sharing</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="packageName{{ $index }}">Package Name</label>
                                            <input type="text" class="form-control"
                                                id="packageName{{ $index }}" placeholder="Name"
                                                name="packages[{{ $index }}][title]"
                                                value="{{ $package->title }}">
                                        </div>
                                        <div class="form-group" id="priceGroup{{ $index }}">
                                            <label for="priceInput{{ $index }}">Package Price</label>
                                            <input type="number" class="form-control"
                                                id="priceInput{{ $index }}" placeholder="Price"
                                                name="packages[{{ $index }}][price]"
                                                value="{{ $package->price }}">
                                        </div>
                                        <div class="form-group" id="adultPriceGroup{{ $index }}"
                                            style="display: none;">
                                            <label for="adultPriceInput{{ $index }}">Package Adult Price</label>
                                            <input type="number" class="form-control"
                                                id="adultPriceInput{{ $index }}" placeholder="Adult Price"
                                                name="packages[{{ $index }}][adult_price]"
                                                value="{{ $package->adult_price }}">
                                        </div>
                                        <div class="form-group" id="childPriceGroup{{ $index }}"
                                            style="display: none;">
                                            <label for="childPriceInput{{ $index }}">Package Child Price</label>
                                            <input type="number" class="form-control"
                                                id="childPriceInput{{ $index }}" placeholder="Child Price"
                                                name="packages[{{ $index }}][child_price]"
                                                value="{{ $package->child_price }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="packageDescription{{ $index }}">Package Description</label>
                                            <textarea class="form-control" id="packageDescription{{ $index }}" placeholder="Description"
                                                name="packages[{{ $index }}][highlight]" rows="6" cols="50">{{ $package->highlight }}</textarea>
                                        </div>
                                    </div>
                                @endforeach
                                <button id="add-package" class="btn btn-primary mb-3 mt-2">Add Package</button>
                            </div>


                            <div class="row mt-2 mb-2">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <div class="mx-auto avatar-xl">
                                            <label for="exampleInputName1">Previous Image</label><br>
                                            <image src="{{ $activity->image_path }}" alt="Banner Image" width="100">
                                            </image>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2 mb-2">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <div class="mx-auto avatar-xl">
                                            <label for="exampleInputName1">Select New Image</label>
                                            <input type="file" class="form-control" name="image_file" id="image_file"
                                                accept="image/png, image/jpeg, image/gif" />
                                            <input type="hidden" name="image" id="image" />
                                            @error('image')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary mr-2 ">Update</button>
                        </form>
                    </div>
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
                },
                messages: {
                    category_id: {
                        required: "Please select a category."
                    },
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

        {{--  const inputElement = document.querySelector('input[name="image"]');
        FilePond.create(inputElement, {
            labelIdle: 'Drag & Drop your picture or <span class="filepond--label-action">Browse</span>',
            styleLoadIndicatorPosition: 'center bottom',
            styleProgressIndicatorPosition: 'right bottom',
            styleButtonRemoveItemPosition: 'left bottom',
            styleButtonProcessItemPosition: 'right bottom',
            allowMultiple: false,
            server: {
                process: null, // Disable automatic server uploading
                revert: null, // Disable revert functionality
            }
        });  --}}

        $('#image_file').on('change', function() {
            var file = this.files[0];
            var reader = new FileReader();
            reader.onloadend = function() {
                var imageData = reader.result;
                var imageInfo = {
                    name: file.name,
                    data: imageData.split(',')[1] // Remove the "data:image/png;base64," part
                };
                $('#image').val(JSON.stringify(imageInfo));
            };
            if (file) {
                reader.readAsDataURL(file);
            }
        });


        $.validator.addMethod("strongPassword", function(value, element) {
                return /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}$/.test(value);
            },
            "Password must be a combination of letters, digits, symbols, and both lowercase and uppercase letters. It should be at least 8 characters long."
        );
    </script>
    @if (isset($activity->imagePath) && !empty($activity->imagePath))
        <script>
            pond.addFile("{{ $activity->imagePath }}");
        </script>
        <script>
            $(document).ready(function() {
                // Initialize packageIndex to the current number of packages
                let packageIndex = {{ count($activity->packages) }};

                // Function to handle the change event for package categories
                function handleCategoryChange(categorySelect) {
                    var itemCount = $(categorySelect).attr('id').replace('categorySelect', '');
                    var selectedCategory = $(categorySelect).val();
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
                }

                // Bind change event to existing package category selects
                $('[id^=categorySelect]').each(function() {
                    handleCategoryChange(this);
                    $(this).change(function() {
                        handleCategoryChange(this);
                    });
                });

                // Add new package functionality
                $('#add-package').click(function(e) {
                    e.preventDefault();
                    var itemCount = $(".package-item").length + 1;

                    let packageHtml = `
            <h4 class="mt-2">Package</h4><hr>
            <div class="package-item" id="packageItem${packageIndex}">
                <div class="form-group">
                    <label for="categorySelect${packageIndex}">Select Package Category</label>
                    <select class="form-control package-category" id="categorySelect${packageIndex}" name="packages[${packageIndex}][category]">
                        <option value="private">Private</option>
                        <option value="sharing">Sharing</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="packageName${packageIndex}">Package Name</label>
                    <input type="text" class="form-control" id="packageName${packageIndex}" placeholder="Name" name="packages[${packageIndex}][title]">
                </div>
                <div class="form-group" id="priceGroup${packageIndex}">
                    <label for="priceInput${packageIndex}">Package Price</label>
                    <input type="number" class="form-control" id="priceInput${packageIndex}" placeholder="Price" name="packages[${packageIndex}][price]">
                </div>
                <div class="form-group" id="adultPriceGroup${packageIndex}" style="display:none;">
                    <label for="adultPriceInput${packageIndex}">Package Adult Price</label>
                    <input type="number" class="form-control" id="adultPriceInput${packageIndex}" placeholder="Adult Price" name="packages[${packageIndex}][adult_price]">
                </div>
                <div class="form-group" id="childPriceGroup${packageIndex}" style="display:none;">
                    <label for="childPriceInput${packageIndex}">Package Child Price</label>
                    <input type="number" class="form-control" id="childPriceInput${packageIndex}" placeholder="Child Price" name="packages[${packageIndex}][child_price]">
                </div>
               <div class="form-group">
                <label for="packageDescription${packageIndex}">Package Description</label>
                <textarea class="form-control" id="packageDescription${packageIndex}" placeholder="Description" name="packages[${packageIndex}][highlight]" rows="6" cols="50"></textarea>
               </div>

            </div>
        `;

                    $('.form-group:last').after(packageHtml);

                    // Bind the change event for the new package category select
                    $('#categorySelect' + packageIndex).change(function() {
                        handleCategoryChange(this);
                    });

                    packageIndex++;
                });

                // Re-bind change event for existing and new selects on change
                $(document).on('change', '[id^=categorySelect]', function() {
                    handleCategoryChange(this);
                });
            });
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.querySelectorAll('input[type="checkbox"]').forEach(function(checkbox) {
                    checkbox.addEventListener('change', function() {
                        // Send 1 if checked, 0 if unchecked
                        let valueToSend = this.checked ? 1 : 0;
                        // Assign the value to the hidden input field to send it in the form submission
                        document.getElementById(this.id + 'Input').value = valueToSend;
                    });
                });
            });
        </script>
        <script>
            document.getElementById('add-instruction').addEventListener('click', function() {
                var instructionIndex = document.querySelectorAll('.instruction-item').length;

                var instructionItem = `
                    <div class="instruction-item mt-3">
                        <input type="hidden" name="instructions[` + instructionIndex + `][instruction_id]" value="">
                        <label for="exampleInputName1">Title</label>
                        <input type="text" name="instructions[` + instructionIndex + `][instruction_title]"
                            class="form-control" placeholder="Instruction Title">
                        <label for="exampleInputName1" class="mt-1">Description</label>
                        <textarea name="instructions[` + instructionIndex + `][instruction_description]"
                            class="form-control" placeholder="Instruction Description" rows="6" cols="50"></textarea>
                    </div>
                `;

                var instructionContainer = document.createElement('div');
                instructionContainer.innerHTML = instructionItem;
                document.querySelector('.instruction-item').parentNode.appendChild(instructionContainer);
            });
        </script>
    @endif
@endpush
