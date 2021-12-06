@extends('layouts.users.dashboard')

@section('pageContent')

<div class="container">
    <h1>Insert new plate</h1>
    
    <form action="{{route("admin.plates.store")}}" method="POST" enctype="multipart/form-data">
        @csrf
    
        <div class="form-group">
            <label for="plate_name">Plate name</label>
            <input type="text" class="form-control" name="plate_name" id="plate_name" placeholder="Insert plate_name" value="{{ old('plate_name') }}">
    
            @error('plate_name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" class="form-control" name="price" id="price" placeholder="Insert price" value="{{ old('price') }}">
    
            @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="cooking_time">Cooking time</label>
            <input type="text" class="form-control" name="cooking_time" id="cooking_time" placeholder="Insert cooking time" value="{{ old('cooking_time') }}">
    
            @error('cooking_time')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label class="container">Visibile
                <input  type="radio" checked="checked" name="visible" id="visible" value="1">
                <span class="checkmark"></span>
              </label>
              <label class="container">Non Visibile
                <input  type="radio" name="visible" id="non-visible" value="0">
                <span class="checkmark"></span>
              </label>
{{-- 
            <label for="visible">Visible</label>
            <input type="number" class="form-control" min="0" max="1" name="visible" id="visible" placeholder="0 = No / 1 = Si " value="{{ old('visible') }}"> --}}
    
            @error('visible')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" id="description" cols="30" rows="10" placeholder="Insert description">{{ old('description') }}</textarea>
    
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="url_photo" class="form-label">{{ __('URL Cover') }}</label>
    
            <div>
                <input type="file" name="url_photo" class="form-control-file @error('url_photo') is-invalid @enderror" >
    
                @error('url_photo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div> 
    
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>

@endsection