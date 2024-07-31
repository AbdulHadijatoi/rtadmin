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
                        <form class="forms-sample" action="{{ route('subcategories.update', $subcategory->id) }}"
                            method="post">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="exampleFormControlSelect2">Select Category</label>
                                <select class="form-control" id="exampleFormControlSelect2" name="category_id" required>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{ $subcategory->category_id == $category->id ? 'selected' : '' }}>
                                            {{$category->name}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="subcategory" class="form-label">Subcategory</label>
                                <select name="subcategory_id" id="subcategory" class="form-control" required>
                                    @foreach($subcategories as $subcat)
                                        <option value="{{ $subcat->id }}" {{ old('subcategory_id', $subcategory->id) == $subcat->id ? 'selected' : '' }}>
                                            {{ $subcat->name }}
                                        </option>
                                    @endforeach
                                </select>
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