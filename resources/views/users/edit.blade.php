@extends('layouts.users.dashboard')

@section('layoutContent')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header">{{ __('Modifica dati ristorante') }}</div>

        <div class="card-body">
          <form action="{{route("admin.users.update", $user["id"])}}" method="POST">
            @csrf
            @method("PUT")

            <div class="mb-3">
              <label for="business_name" class="form-label">Business Name</label>
              <input name="business_name" type="text" class="form-control" id="business_name" placeholder="Insert title" value="{{old('business_name') ? old('business_name') : $user['business_name']}}">
              @error('business_name')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="address" class="form-label">Address</label>
              <input name="address" type="text" class="form-control" id="address" value="{{old('address') ? old('address') : $user['address']}}">
              @error('business_name')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="street_number" class="form-label">Street Number</label>
              <input name="street_number" type="text" class="form-control" id="street_number" value="{{old('street_number') ? old('street_number') : $user['street_number']}}">
              @error('business_name')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="vat_number" class="form-label">Partita IVA</label>
              <input name="vat_number" type="text" class="form-control" id="vat_number" value="{{old('vat_number') ? old('vat_number') : $user['vat_number']}}">
              @error('business_name')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="description" class="form-label">Description</label>
              <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" cols="30" rows="10">{{old('description') ? old('description') : $user['description']}}</textarea>
              @error('business_name')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            {{-- <div class="mb-3">
              <label for="url_cover" class="form-label">{{ __('URL Cover') }}</label>

              <div>
                  <input type="file" name="url_cover" class="form-control-file @error('url_cover') is-invalid @enderror" >

                  @error('url_cover')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>  --}}

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>

@endsection