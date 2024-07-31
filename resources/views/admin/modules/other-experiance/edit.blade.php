
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
        <h4 class="card-title">Profile Setting</h4>
        <form class="forms-sample" action="{{route('otherexperiances.update',$activity->id)}}"  method="post" id="activity-form">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="exampleFormControlSelect2">Select Category</label>
                <select class="form-control @error('category_id') is-invalid @enderror" id="exampleFormControlSelect2" name="category_id">
                    {{-- <option value="" selected>Select Category</option> --}}
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $activity->category_id == $category->id ? 'selected' : '' }}>
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
                <select class="form-control @error('category_id') is-invalid @enderror"
                    id="exampleFormControlSelect2" name="subcategory_id">
                    {{-- <option value="" selected>Select Category</option> --}}
                    @foreach($subCategories as $value)
                    <option value="{{$value->id}}" {{ $activity->category_id == $category->id ? 'selected' : '' }}>{{$value->name}}</option>
                    @endforeach
                </select>
                @error('category')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>


          <div class="form-group">
            <label for="exampleInputName1">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputName1" placeholder="Name" name="name" value="{{$activity->name}}">
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Duration</label>
            <input type="number" class="form-control @error('duration') is-invalid @enderror" id="exampleInputName1" placeholder="Duration" name="duration" value="{{$activity->duration}}">
            @error('duration')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>


          <div class="form-group">
                <label for="exampleInputName1">Booking Count</label>
                <input type="number" class="form-control @error('booking_count') is-invalid @enderror"
                    id="exampleInputName1" placeholder="Booking Count" name="booking_count" value="{{$activity->booking_count}}">
                @error('booking_count')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
           </div>
            <div class="form-group">
                <label for="exampleInputName1">Discount Offer</label>
                <input type="number" class="form-control @error('discount_offer') is-invalid @enderror"
                    id="exampleInputName1" placeholder="discount_offer" name="discount_offer" value="{{$activity->discount_offer}}">
                @error('discount_offer')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
          <div class="form-group">
            <label for="exampleInputName1">Minimum Travellers</label>
            <input type="number" class="form-control @error('minimum_travelers') is-invalid @enderror" id="exampleInputName1" placeholder="Cancellation Duration" name="minimum_travelers" value="{{$activity->minimum_travelers}}">
            @error('minimum_travelers')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="form-group">
            <label for="exampleInputName1">Cancellation Duration</label>
            <input type="number" class="form-control @error('cancellation_duration') is-invalid @enderror" id="exampleInputName1" placeholder="Cancellation Duration" name="cancellation_duration" value="{{$activity->cancellation_duration}}">
            @error('cancellation_duration')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <!-- <div class="form-group">
            <label for="exampleInputName1">Meet Up</label>
            <input type="text" class="form-control @error('meetup') is-invalid @enderror" id="exampleInputName1" placeholder="Meetup" name="meetup"value="{{$activity->meetup}}" >
            @error('meetup')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div> -->

        <div class="form-group">
            <label for="exampleInputEmail3">description</label>
            {{-- <div id="container"> --}}
            <textarea class="form-control @error('description') is-invalid @enderror"  name="description" placeholder="Description" >{{$activity->description}}</textarea>
            @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Features</label><br>
            <div id="features-container">
                @if(isset($activity->features))
                    @foreach($activity->features as $feature)
                        <input type="checkbox" name="features[]" value="{{ $feature }}" checked> {{ $feature }}<br>
                    @endforeach
                @endif
            </div>
            @error('features')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

        </div>
        <div class="form-group">
            <label for="exampleInputName1">Highlights</label>
            <textarea  class="form-control @error('highlights') is-invalid @enderror" id="editor1" placeholder="Use Bullets point for Highlights" name="highlights" >{{$activity->highlights}}</textarea>
            @error('highlights')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        <div class="form-group">
            <label for="exampleInputName1">itinerary</label>
            <textarea  class="form-control @error('itinerary') is-invalid @enderror" id="editor" placeholder="Use Bullets point Itinerary" name="itinerary" >{{$activity->itinerary}}</textarea>
            @error('itinerary')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Whats Included</label>
            <textarea  class="form-control @error('whats_included') is-invalid @enderror" id="editor2" placeholder="Use Bullets point whats included" name="whats_included" >{{$activity->whats_included}}</textarea>
            @error('whats_included')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Whats Not Included</label>
            <textarea  class="form-control @error('whats_not_included') is-invalid @enderror" id="editor3" placeholder="Use Bullets point whats included" name="whats_not_included" >{{$activity->whats_not_included}}</textarea>
            @error('whats_not_included')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group"><hr>
            <h4>Instructions</h4>
            <div id="instructions-container">
                @foreach($activity->instructions as $index => $instruction)
                    <div class="instruction-item mt-3">
                        <input type="hidden" name="instructions[{{$index}}][instruction_id]" value="{{$instruction->id}}">
                        <label for="exampleInputName1">Title</label>
                        <input type="text" name="instructions[{{$index}}][instruction_title]" class="form-control @error('instructions.'.$index.'.instruction_title') is-invalid @enderror" placeholder="Instruction Title" value="{{$instruction->instruction_title}}">
                        @error('instructions.'.$index.'.instruction_title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <label for="exampleInputName1" class="mt-1">Description</label>
                        <textarea name="instructions[{{$index}}][instruction_description]" class="form-control @error('instructions.'.$index.'.instruction_description') is-invalid @enderror" placeholder="Instruction Description">{{$instruction->instruction_description}}</textarea>
                        @error('instructions.'.$index.'.instruction_description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                @endforeach
            </div>

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
          <button type="submit" class="btn btn-primary mr-2">Update</button>
        </form>
      </div>
    </div>
  </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{asset('admin/plugins/validation/validate.min.js') }}"></script>
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
</script>
@if (isset($activity->imagePath) && !empty($activity->imagePath))
<script>
    pond.addFile("{{ $activity->imagePath }}");
</script>
@endif
@endpush
