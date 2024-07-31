@extends('admin.layouts.main')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-10 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add SubCategory</h4>
                        @if(Session::get('error'))
                            <div class="alert alert-danger">
                                {{Session::get('error')}}
                            </div>
                        @endif
                        <form class="forms-sample" action="{{ route('subcategories.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlSelect2">Select Category</label>
                                <select class="form-control" id="exampleFormControlSelect2" name="category_id" required>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- <div class="col-md-12">
                                <label for="name" class="form-label">Name</label>
                                <select name="name[]" id="name" class="form-control" multiple required>
                                    <option value="Aerial Tours Helicopter">Aerial Tours Helicopter</option>
                                    <option value="Aerial Tours Seaplane">Aerial Tours Seaplane</option>
                                    <option value="Musamdam Oman Tours">Musamdam Oman Tours</option>
                                    <option value="Dinner Cruises">Dinner Cruises</option>
                                    <option value="Shared Cruises">Shared Cruises</option>
                                    <option value="House boat charter">House boat charter</option>
                                    <option value="Charter cruises">Charter cruises</option>
                                    <option value="Adventure collection">Adventure collection</option>
                                    <option value="Heritage collection">Heritage collection</option>
                                    <option value="Luxary collection">Luxary collection</option>
                                    <option value="Air Adventure">Air Adventure</option>
                                    <option value="Land Adventure">Land Adventure</option>
                                    <option value="Deep sea fishier">Deep sea fishier</option>
                                    <option value="Water sports">Water sports</option>
                                    <option value="Burj khalifa">Burj khalifa</option>
                                    <option value="Attractions">Attractions</option>
                                    <option value="Entertainment">Entertainment</option>
                                    <option value="Dining Experience">Dining Experience</option>
                                    <option value="Theme and water parks">Theme and water parks</option>
                                    <option value="Chautteured Car">Chautteured Car</option>
                                    <option value="Private Transfers">Private Transfers</option>
                                   
                                </select>
                            </div> -->
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
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection