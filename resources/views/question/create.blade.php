@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crea nuova domanda</div>

                <div class="card-body">
                  <form  action="/questionnaires/{{ $questionnaire -> id}}/questions" method="post">

                    @csrf
                    @method('POST')

                    <div class="form-group">
                       <label for="question">Domanda</label>
                       <input name="question[question]" type="text" class="form-control" id="question" aria-describedby="questionHelp" placeholder="inserisci una domanda" value="{{ old('question.question')}}" >
                       <small id="questionHelp" class="form-text text-muted">Inserisci una domanda.</small>

                       @error ('question.question')
                         <smallc class="text-danger">{{ $message }}</small>
                       @enderror
                    </div>

                    <div class="form-group">
                      <fieldset>
                        <legend>Scelte</legend>
                        <small id="choicesHelp" class="form-text text-muted">Inserisci le possibili scelte</small>

                        <div>

                          <div class="form-group">
                             <label for="answer1">Scelta 1</label>
                             <input name="answers[][answer]" type="text" class="form-control" id="answer1" aria-describedby="choicesHelp" placeholder="inserisci Scelta 1" value="{{old('answers.0.answer')}}">
                             <small id="answer1Help" class="form-text text-muted">Inserisci una Scelta.</small>

                             @error ('answers.0.answer')
                               <small class="text-danger">{{ $message }}</small>
                             @enderror
                          </div>

                        </div>

                        <div>

                          <div class="form-group">
                             <label for="answer2">Scelta 2</label>
                             <input name="answers[][answer]" type="text" class="form-control" id="answer2" aria-describedby="choicesHelp" placeholder="inserisci Scelta 2" value="{{old('answers.1.answer')}}">
                             <small id="answer2Help" class="form-text text-muted">Inserisci una Scelta.</small>

                             @error ('answers.1.answer')
                               <small class="text-danger">{{ $message }}</small>
                             @enderror
                          </div>

                        </div>

                        <div>

                          <div class="form-group">
                             <label for="answer3">Scelta 3</label>
                             <input name="answers[][answer]" type="text" class="form-control" id="answer3" aria-describedby="choicesHelp" placeholder="inserisci Scelta 3" value="{{old('answers.2.answer')}}">
                             <small id="answer3Help" class="form-text text-muted">Inserisci una Scelta.</small>

                             @error ('answers.2.answer')
                               <small class="text-danger">{{ $message }}</small>
                             @enderror
                          </div>

                        </div>


                      </fieldset>
                    </div>

                    <button type="submit" class="btn btn-primary">Aggiungi Domande</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
