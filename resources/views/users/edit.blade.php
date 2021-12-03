@extends('layouts.users.base')

@section('layoutContent')
<h2>Modifica Ristorante</h2>

<form action="{{route("admin.update", $user["id"])}}" method="POST">
	@csrf
  @method("PUT")

  
    <div class="mb-3">
      <label for="business_name" class="form-label">Business Name</label>
      <input type="text" class="form-control" id="business_name" aria-describedby="emailHelp">
    </div>

    <div class="mb-3">
      <label for="address" class="form-label">Address</label>
      <input type="text" class="form-control" id="address" aria-describedby="emailHelp">
    </div>

    <div class="mb-3">
      <label for="street_number" class="form-label">Street Number</label>
      <input type="text" class="form-control" id="street_number" aria-describedby="emailHelp">
    </div>

    <div class="mb-3">
      <label for="vat_number" class="form-label">Partita IVA</label>
      <input type="text" class="form-control" id="vat_number" aria-describedby="emailHelp">
    </div>

    <div class="mb-3">
      <label for="description" class="form-label">Description</label>
      <input type="text" class="form-control" id="description" aria-describedby="emailHelp">
    </div>

    <div class="form-group row">
      <label for="url_cover" class="col-md-3 col-form-label text-md-right">{{ __('URL Cover') }}</label>

      <div class="col-md-8">
          <input type="file" name="url_cover" class="form-control-file @error('url_cover') is-invalid @enderror" >

          @error('url_cover')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
      </div>
  </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
 

@endsection