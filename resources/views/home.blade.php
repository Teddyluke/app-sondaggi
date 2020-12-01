@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="/questionnaires/create" class="btn btn-primary">Crea un nuovo questionario</a>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">I miei sondaggi</div>

                <div class="card-body">
                    <ul class="list-group">
                      @foreach ($questionnaires as $questionnaire)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                          <div>
                            <a href="{{ $questionnaire -> path() }}">{{ $questionnaire -> title }}</a>
                            <div class="mt-2">
                              <small class="font-weight-bold">Condividi Url</small>
                              <p>
                                <a href="{{ $questionnaire->publicPath()}}">{{ $questionnaire->publicPath()}}</a>
                              </p>
                            </div>
                          </div>
                          <div>
                            <a href="/questionnaires/destroy/{{$questionnaire -> id}}" class="btn btn-danger btn-sm">Elimina questionario</a>
                          </div>
                        </li>
                      @endforeach
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
