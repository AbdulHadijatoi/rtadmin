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
                    <h4 class="card-title">Update Package</h4>
                    <form class="forms-sample" action="{{route('packages.update', $package->id)}}" method="post"
                        id="activity-form">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="exampleFormControlSelect2">Select Activity</label>
                            <select class="form-control @error('activity_id') is-invalid @enderror"
                                id="exampleFormControlSelect2" name="activity_id">
                                <option value="" selected>Select Activity</option>
                                @foreach($activity as $activity)
                                <option value="{{ $activity->id }}"
                                    {{ old('activity_id', $package->activity_id) == $activity->id ? 'selected' : '' }}>
                                    {{ $activity->name }}
                                </option>
                                @endforeach
                            </select>
                            @error('activity_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="categorySelect">Select Category</label>
                            <select class="form-control @error('category') is-invalid @enderror"
                                id="categorySelect" name="category">
                                <option value="" selected>Select Category</option>
                                @foreach(App\Enums\CategoryEnums::$USER_TYPES as $category)
                                <option value="{{ $category }}"
                                    {{ old('category', $package->category) == $category ? 'selected' : '' }}>
                                    {{ ucfirst($category) }}
                                </option>
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
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                id="exampleInputName1" placeholder="Name" name="title" value="{{$package->title}}">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group" id="priceGroup">
                            <label for="priceInput">Price</label>
                            <input type="number" class="form-control @error('price') is-invalid @enderror"
                                id="priceInput" placeholder="Price" name="price" value="{{$package->price}}">
                            @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group" id="adultPriceGroup" style="display:none;">
                            <label for="adultPriceInput">Adult Price</label>
                            <input type="number" class="form-control @error('adult_price') is-invalid @enderror"
                                id="adultPriceInput" placeholder="Adult Price" name="adult_price" value="{{$package->adult_price}}">
                            @error('adult_price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group" id="childPriceGroup" style="display:none;">
                            <label for="childPriceInput">Child Price</label>
                            <input type="number" class="form-control @error('child_price') is-invalid @enderror"
                                id="childPriceInput" placeholder="Child Price" name="child_price" value="{{$package->child_price}}">
                            @error('child_price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="highlightInput">Description</label>
                            <input type="text" class="form-control @error('highlight') is-invalid @enderror"
                                id="highlightInput" placeholder="Highlight" name="highlight" value="{{$package->highlight}}">
                            @error('highlight')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary mr-2">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const categorySelect = document.getElementById('categorySelect');
        const priceGroup = document.getElementById('priceGroup');
        const adultPriceGroup = document.getElementById('adultPriceGroup');
        const childPriceGroup = document.getElementById('childPriceGroup');
        const priceInput = document.getElementById('priceInput');
        const adultPriceInput = document.getElementById('adultPriceInput');
        const childPriceInput = document.getElementById('childPriceInput');

        function togglePriceInputs() {
            const selectedCategory = categorySelect.value;

            if (selectedCategory === 'private') {
                priceGroup.style.display = 'block';
                adultPriceGroup.style.display = 'none';
                childPriceGroup.style.display = 'none';
                adultPriceInput.value = '';
                childPriceInput.value = '';
            } else if (selectedCategory === 'sharing') {
                priceGroup.style.display = 'none';
                adultPriceGroup.style.display = 'block';
                childPriceGroup.style.display = 'block';
                priceInput.value = '';
            } else {
                priceGroup.style.display = 'none';
                adultPriceGroup.style.display = 'none';
                childPriceGroup.style.display = 'none';
                priceInput.value = '';
                adultPriceInput.value = '';
                childPriceInput.value = '';
            }
        }

        categorySelect.addEventListener('change', togglePriceInputs);

        // Initial call to set the state correctly on page load
        togglePriceInputs();
    });
    </script>

@endsection
