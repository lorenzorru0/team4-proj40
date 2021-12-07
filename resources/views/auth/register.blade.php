@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrazione') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="business_name" class="col-md-3 col-form-label text-md-right">{{ __('Nome attività*') }}</label>

                            <div class="col-md-8">
                                <input id="business_name" type="text" class="form-control @error('business_name') is-invalid @enderror" name="business_name" value="{{ old('business_name') }}" required autocomplete="business_name" autofocus>

                                @error('business_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('Indirizzo e-mail*') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-3 col-form-label text-md-right">{{ __('Indirizzo*') }}</label>

                            <div class="col-md-8">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="street_number" class="col-md-3 col-form-label text-md-right">{{ __('Numero civico*') }}</label>

                            <div class="col-md-8">
                                <input id="street_number" type="text" class="form-control @error('street_number') is-invalid @enderror" name="street_number" value="{{ old('street_number') }}" required autocomplete="street_number" autofocus>

                                @error('street_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="vat_number" class="col-md-3 col-form-label text-md-right">{{ __('Partita iva*') }}</label>

                            <div class="col-md-8">
                                <input minlength="11" maxlength="11" id="vat_number" type="text" class="form-control @error('vat_number') is-invalid @enderror" name="vat_number" value="{{ old('vat_number') }}" required autocomplete="vat_number" autofocus>

                                @error('vat_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-3 col-form-label text-md-right">{{ __('Descrizione') }}</label>

                            <div class="col-md-8">
                                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" cols="30" rows="10">{{old('description')}}</textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="url_cover" class="col-md-3 col-form-label text-md-right">{{ __('Immagine di copertina') }}</label>

                            <div class="col-md-8">
                                <input type="file" name="url_cover" class="form-control-file @error('url_cover') is-invalid @enderror" >

                                @error('url_cover')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <h5 class="col-md-3 col-form-label text-md-right">Tipologie</h5>
                            <div class="col-md-8">
                                <div class="row"> 
                                    @if ($errors->any())
                                        <div class="col-6">
                                            @foreach ($types as  $type)
                                                @if ($type['id'] % 2 == 1)
                                                    <div class="custom-control custom-checkbox">
                                                        <input {{in_array($type['id'], old('types')) ? 'checked' : ''}} name="types[]" value="{{$type['id']}}" type="checkbox" class="custom-control-input" id="type-{{$type['id']}}">
                                                        <label class="custom-control-label" for="type-{{$type['id']}}">{{$type['name']}}</label>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="col-6">
                                            @foreach ($types as  $type)
                                                @if ($type['id'] % 2 == 0)
                                                    <div class="custom-control custom-checkbox">
                                                        <input {{in_array($type['id'], old('types')) ? 'checked' : ''}} name="types[]" value="{{$type['id']}}" type="checkbox" class="custom-control-input" id="type-{{$type['id']}}">
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
                                                        <input name="types[]" value="{{$type['id']}}" type="checkbox" class="custom-control-input" id="type-{{$type['id']}}">
                                                        <label class="custom-control-label" for="type-{{$type['id']}}">{{$type['name']}}</label>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="col-6">
                                            @foreach ($types as  $type)
                                                @if ($type['id'] % 2 == 0)
                                                    <div class="custom-control custom-checkbox">
                                                        <input name="types[]" value="{{$type['id']}}" type="checkbox" class="custom-control-input" id="type-{{$type['id']}}">
                                                        <label class="custom-control-label" for="type-{{$type['id']}}">{{$type['name']}}</label>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-3 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-3 col-form-label text-md-right">{{ __('Conferma Password') }}</label>

                            <div class="col-md-8">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
