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
                    <h4 class="card-title">Profile Setting</h4>
                    <form class="forms-sample" action="{{ route('mostpopularactivities.store') }}" method="post" id="activity-form" id="my-form">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlSelect2">Select Category</label>
                            <select class="form-control @error('category_id') is-invalid @enderror"
                                id="exampleFormControlSelect2" name="category_id">
                                <option value="" selected>Select Category</option>
                                @foreach($categories as $category)
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
                                @foreach($subCategories as $value)
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
                            <input type="number" class="form-control @error('cancellation_duration') is-invalid @enderror"
                                id="exampleInputName1" placeholder="Cancellation Duration" name="cancellation_duration">
                            @error('cancellation_duration')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group" style="display: none;">
                            <label for="exampleInputName1">Most Popular Activity</label>
                            <input type="hidden" class="form-control @error('most_popular_activity') is-invalid @enderror"
                                id="exampleInputName1" placeholder="" name="most_popular_activity" value="1">
                            @error('most_popular_activity')
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
                                <textarea class="form-control @error('description') is-invalid @enderror"
                                    name="description" placeholder="Description"></textarea>
                                @error('description')
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
                                        <input type="checkbox" name="features[]" value="Instant Confirmation"> Instant Confirmation<br>
                                        <input type="checkbox" name="features[]" value="Hotel Pick Up"> Hotel Pick Up<br>
                                        <input type="checkbox" name="features[]" value="Present Mobile or Printed Voucher"> Present Mobile or Printed Voucher<br>
                                    </div>
                                </div>
                                @error('features')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <button type="button" class="btn btn-secondary mt-2" id="add-feature">Add Language</button>
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
                                        <input type="text" name="instructions[0][instruction_title]" class="form-control @error('instructions.0.title') is-invalid @enderror" placeholder="Instruction Title">
                                        @error('instructions.0.title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <textarea name="instructions[0][instruction_description]" class="form-control @error('instructions.0.description') is-invalid @enderror" placeholder="Instruction Description"></textarea>
                                        @error('instructions.0.description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <button type="button" class="btn btn-secondary" id="add-instruction">Add Instruction</button>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <div class="mx-auto avatar-xl">
                                            <label for="exampleInputName1">Image</label>
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
                                                class="filepond filepond-input-circle {{ $errors->has('images') ? ' is-invalid' : '' }}"
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
                subcategory_id: {
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
                whats_included: {
                    required: true
                },
            },
            messages: {
                category_id: {
                    required: "Please select a category."
                },
                subcategory_id: {
                    required: "Please select a sub category."
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
    }, "Password must be a combination of letters, digits, symbols, and both lowercase and uppercase letters. It should be at least 8 characters long.");

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
                <textarea name="instructions[${instructionCount}][instruction_description]" class="form-control @error('instructions.${instructionCount}.description') is-invalid @enderror" placeholder="Instruction Description"></textarea>
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
<script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/balloon-block/ckeditor.js"></script>
@endpush
