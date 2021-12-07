@extends('layouts.users.dashboard')

@section('pageContent')

<div class="container">
    <h1>Modifica Articolo</h1>
    
    <form action="{{route("admin.plates.update", $plate->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    
        <div class="form-group">
            <label for="plate_name">Nome Articolo</label>
            <input type="text" class="form-control" name="plate_name" id="plate_name" placeholder="Insert plate_name" value="{{ old('plate_name') ? old('plate_name') : $plate['plate_name'] }}">
    
            @error('plate_name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="price">Prezzo</label>
            <input type="text" class="form-control" name="price" id="price" placeholder="Insert price" value="{{ old('price') ? old('price') : $plate['price'] }}">
    
            @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="cooking_time">Tempo di preparazione</label>
            <input type="text" class="form-control" name="cooking_time" id="cooking_time" placeholder="Modifica il tempo di preparazione" value="{{ old('cooking_time') ? old('cooking_time') : $plate['cooking_time'] }}">
    
            @error('cooking_time')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Descrizione</label>
            <textarea name="description" class="form-control" id="description" cols="30" rows="10" placeholder="Descrizione e Ingredienti">{{ old('description') ? old('description') : $plate['description'] }}</textarea>
    
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="url_photo" class="form-label">{{ __('Cambia Immagine') }}</label>
    
            <div>
                <input type="file" name="url_photo" class="form-control-file @error('url_photo') is-invalid @enderror" >
    
                @error('url_photo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div> 
    
        <button type="submit" class="btn btn-primary">Aggiorna</button>
    </form>
</div>

@endsection