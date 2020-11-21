@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crea un nuovo questionario</div>

                <div class="card-body">
                  <form  action="/questionnaires" method="post">

                    @csrf
                    @method('POST')

                    <div class="form-group">
                       <label for="title">Titolo</label>
                       <input name="title" type="text" class="form-control" id="title" aria-describedby="titleHelp" placeholder="inserisci titolo">
                       <small id="titleHelp" class="form-text text-muted">Inserisci un titolo per il tuo questionario.</small>

                       @error ('title')
                         <smallc class="text-danger">{{ $message }}</small>
                       @enderror
                    </div>

                    <div class="form-group">
                       <label for="purpose">Descrizione</label>
                       <input name="purpose" type="text" class="form-control" id="purpose" aria-describedby="purposeHelp" placeholder="inserisci descrizione">
                       <small id="purposeHelp" class="form-text text-muted">Inserisci una descrizione per il tuo questionario.</small>

                       @error ('purpose')
                         <smallc class="text-danger">{{ $message }}</small>
                       @enderror

                    </div>

                    <button type="submit" class="btn btn-primary">Crea questionario</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
