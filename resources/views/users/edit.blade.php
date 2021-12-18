@extends('layouts.users.dashboard')

@section('layoutContent')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header">{{ __('Modifica dati ristorante') }}</div>

        <div class="card-body">
          <form action="{{route("admin.users.update", $user["id"])}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")

            <div class="mb-3">
              <label for="business_name" class="form-label">Nome attività*</label>
              <input name="business_name" type="text" class="form-control" id="business_name" placeholder="Insert title" value="{{old('business_name') ? old('business_name') : $user['business_name']}}">
              @error('business_name')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="address" class="form-label">Indirizzo*</label>
              <input name="address" type="text" class="form-control" id="address" value="{{old('address') ? old('address') : $user['address']}}">
              @error('address')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="street_number" class="form-label">Numero civico*</label>
              <input name="street_number" type="text" class="form-control" id="street_number" value="{{old('street_number') ? old('street_number') : $user['street_number']}}">
              @error('street_number')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="vat_number" class="form-label">Partita IVA*</label>
              <input minlength="11" maxlength="11" name="vat_number" type="text" class="form-control" id="vat_number" value="{{old('vat_number') ? old('vat_number') : $user['vat_number']}}">
              @error('vat_number')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="description" class="form-label">Descrizione</label>
              <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" cols="30" rows="10">{{old('description') ? old('description') : $user['description']}}</textarea>
              @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="url_cover" class="form-label">Immagine di copertina</label>

              <div>
                  <input type="file" name="url_cover" class="form-control-file @error('url_cover') is-invalid @enderror" >

                  @error('url_cover')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div> 

            <div class="form-group row">
              <p class="col-md-3 col-form-label text-md-left">Tipologie</p>
              <div class="col-md-10 mx-auto">
                  <div class="row"> 
                    @error('types')
                      <div class="alert alert-danger col-10 mx-auto">{{$message}}</div>
                    @enderror
                    @if ($errors->any())
                        <div class="col-6">
                            @foreach ($types as  $type)
                                @if ($type['id'] % 2 == 1)
                                    <div class="custom-control custom-checkbox">
                                        <input {{old('types')}} name="types[]" value="{{$type['id']}}" type="checkbox" class="custom-control-input" id="type-{{$type['id']}}">
                                        <label class="custom-control-label" for="type-{{$type['id']}}">{{$type['name']}}</label>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="col-6">
                            @foreach ($types as  $type)
                                @if ($type['id'] % 2 == 0)
                                    <div class="custom-control custom-checkbox">
                                        <input {{old('types')}} name="types[]" value="{{$type['id']}}" type="checkbox" class="custom-control-input" id="type-{{$type['id']}}">
                                        <label class="custom-control-label" for="type-{{$type['id']}}">{{$type['name']}}</label>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @else
                        <div class="col-6">
                            @foreach ($types as  $type)
                                @if ($type['id'] % 2 == 1)
                                    <div class="custom-control custom-checkbox">
                                        <input {{$user['types']->contains($type['id']) ? 'checked' : ''}} name="types[]" value="{{$type['id']}}" type="checkbox" class="custom-control-input" id="type-{{$type['id']}}">
                                        <label class="custom-control-label" for="type-{{$type['id']}}">{{$type['name']}}</label>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="col-6">
                            @foreach ($types as  $type)
                                @if ($type['id'] % 2 == 0)
                                    <div class="custom-control custom-checkbox">
                                        <input {{$user['types']->contains($type['id']) ? 'checked' : ''}} name="types[]" value="{{$type['id']}}" type="checkbox" class="custom-control-input" id="type-{{$type['id']}}">
                                        <label class="custom-control-label" for="type-{{$type['id']}}">{{$type['name']}}</label>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endif
                  </div>
              </div>
          </div>

            <button type="submit" class="btn btn-primary">Conferma modifiche</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>

@endsection