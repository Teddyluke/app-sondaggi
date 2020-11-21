@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <h1>{{$questionnaire->title}}</h1>

          <form action="/surveys/{{ $questionnaire->id }}-{{Str::slug($questionnaire->title) }}" method="post">
            @csrf

            @foreach ($questionnaire->questions as $key => $question)
              <div class="card mt-4">

                <div class="card-header">
                  {{$key + 1}} {{ $question->question }}
                </div>

                <div class="card-body">

                  @error ('responses.' . $key . '.answer_id')
                      <small class="text-danger">{{ $message }}</small>
                  @enderror

                  <ul class="list-group">
                    @foreach ($question->answers as $answer)
                      <label for="answer{{ $answer->id}}">
                        <li class="list-group-item">
                          <input type="radio" name="responses[{{ $key }}][answer_id]" id="answer{{ $answer -> id }}"
                            {{ (old('responses.' . $key . '.answer_id') == $answer->id) ? 'checkeed' : ''}}
                           class="mr-2" value="{{ $answer -> id }}">
                          {{$answer -> answer}}

                          <input type="hidden" name="responses[{{$key}}][question_id]" value="{{ $question -> id }}">
                        </li>
                      </label>
                    @endforeach
                  </ul>
                </div>
              </div>
            @endforeach


            <div class="card mt-4">
              <div class="card-header">Your information</div>

              <div class="card-body">
                  <div class="form-group">
                     <label for="name">Nickname</label>
                     <input name="survey[name]" type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="inserisci nickname">
                     <small id="nameHelp" class="form-text text-muted">Inserisci il tuo Nickname</small>

                     @error ('name')
                       <small class="text-danger">{{ $message }}</small>
                     @enderror
                  </div>

                  <div class="form-group">
                     <label for="email">email</label>
                     <input name="survey[email]" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="inserisci email">
                     <small id="emailHelp" class="form-text text-muted">inserisci la tua mail</small>

                     @error ('email')
                       <small class="text-danger">{{ $message }}</small>
                     @enderror

                  </div>

                  <div class="">
                    <button class="btn btn-primary" type="submit" name="button"> Completa</button>
                  </div>

              </div>
            </div>
          </form>
        </div>
    </div>
</div>
@endsection
