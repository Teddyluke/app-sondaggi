@extends('layouts.app')

@section('content')
  @auth
    @if ($questionnaire -> user_id == Auth::user() -> id)
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-md-12">
                <div class="d-flex p-2 justify-content-center">
                  <h1> {{$questionnaire -> title}} </h1>
                </div>
                <div class="d-flex col-md-12 p-2 justify-content-around flex-wrap">

                @foreach ($questionnaire -> questions as $question)
                  <canvas id="{{$question -> id}}" max-width="300" max-height="300" class="col-md-6">
                  </canvas>

                  <script>
                  var ctx = document.getElementById('{{$question -> id}}').getContext('2d');
                  var myChart = new Chart(ctx, {
                      type: 'bar',
                      data: {
                          labels: [ @foreach ($question -> answers as $answers )
                            '{{$answers -> answer}}',
                          @endforeach ],
                          datasets: [{
                              label: '{{$question -> question}}',
                              backgroundColor: [
                                  'rgba(255, 99, 132, 0.2)',
                                  'rgba(54, 162, 235, 0.2)',
                                  'rgba(255, 206, 86, 0.2)',
                                  'rgba(75, 192, 192, 0.2)',
                                  'rgba(153, 102, 255, 0.2)',
                                  'rgba(255, 159, 64, 0.2)'
                              ],
                              borderColor: [
                                  'rgba(255, 99, 132, 1)',
                                  'rgba(54, 162, 235, 1)',
                                  'rgba(255, 206, 86, 1)',
                                  'rgba(75, 192, 192, 1)',
                                  'rgba(153, 102, 255, 1)',
                                  'rgba(255, 159, 64, 1)'
                              ],
                              borderWidth: 1,
                              data: [ @foreach ($question -> answers as $answers)
                                '{{$answers -> responses -> count()}}',
                              @endforeach ]
                          }]
                      },
                  });
                  </script>

                @endforeach
              </div>

    @else
              <div class="container">
                  <div class="row justify-content-center">
                      <div class="col-md-8">
                          <div class="card">
                              <div class="card-header">{{ __('Dashboard') }}</div>

                              <div class="card-body">

                                  {{ __('Unauthorized!') }}
                                  <br><br>

                                  <a href="{{ route('welcome') }}">Back to Main page</a>

                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              </div>
          </div>
      </div>
    @endif
  @endauth
@endsection
