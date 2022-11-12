@extends('default.layout')

@section('content')
    @if(session('message'))
        <div class="col col-sm-4 alert alert-success">
            <p>{{session('message')}}</p>
        </div>
    @endif
        <div class="d-flex justify-content-center pt-2">
            <h1>{{$album->name}}</h1>
        </div>
        <div class="container text-center pb-5">
            <div class="row">
              <div class="col">
                <th class="pr-12">Album: {{$album->name}}</th>
              </div>
              <div class="col">
                <th class="pr-12">Ano de lançamento: {{$album->release_date->format('Y')}}</th>
              </div>
              <div class="col">
                <a class="btn btn-danger rounded-pill" href="/discografia/apagar/{{$album->id}}">Excluir Album</a>
              </div>
            </div>
          </div>
        <table class="table">
            <thead>
                @if(!empty($album->tracks))
                    @foreach ($album->tracks as $track)
                            <tr>
                                <th>#{{$track->position}}</th>
                                <th>Nome da musica: {{$track->name}}</th>
                                <th id="duration">Duração: {{$track->duration}}</td>
                                <th>
                                    <a class="btn btn-danger rounded-pill" href="/faixa/apagar/{{$track->id}}">Excluir</a>
                                </th>
                            </tr>
                    @endforeach
                @else
                    <tr>
                        <th>Sem Musicas Cadastradas</th>
                    </tr>
                @endif
            </thead>
        </table>
    <div class="row">
        <div class="">
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection
