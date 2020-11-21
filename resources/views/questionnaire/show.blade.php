@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$questionnaire -> title}}</div>

                <div class="card-body">
                  <a class="btn btn-primary" href="/questionnaires/{{ $questionnaire->id }}/questions/create">Nuova domanda</a>
                  <a class="btn btn-primary" href="/surveys/{{ $questionnaire->id }}-{{ Str::slug($questionnaire->title) }}">Compila il questionario</a>

                </div>
            </div>

            @foreach ($questionnaire -> questions as $question)
              <div class="card mt-4">

                <div class="card-header">
                  {{ $question->question}}
                </div>

                <div class="card-body">
                  <ul class="list-group">
                    @foreach ($question->answers as $answer)
                      <li class="list-group-item">{{$answer->answer}}</li>
                    @endforeach
                  </ul>
                </div>
              </div>
            @endforeach
        </div>
    </div>
</div>
@endsection