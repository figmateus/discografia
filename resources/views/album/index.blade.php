@extends('default.layout')

@section('content')
<form id="search" method="POST" class="row g-3">
    @csrf
    <label for="album" class="">Digite uma palavra chave</label>
    <div class="col-sm-9 col-md-9">
      <input type="text" name="keyword" class="form-control" id="leyword">
    </div>
    <div class="col-auto">
        <button type="submit" class="btn btn-primary mb-3">Procurar</button>
    </div>
</form>
@if(isset($album))
<table id="tabela">
    <thead>
        @foreach ($album as $item)
        <tr class="">
            <th>Album: {{$item->name}},</th>
            <th>{{Carbon\Carbon::parse($item->release_date)->format('Y')}}</th>
            <th>
                <a class="btn btn-danger" href="/discografia/apagar/{{$item->id}}">Excluir Album</a>
            </th>
        </tr>
        <tr>
            <th>Nº:</th>
            <th>Faixa:</th>
            <th id="duration">duração</th>
        </tr>
        @if (isset($item->tracks))
            @foreach ($item->tracks as $track)
            <tr>
                <td>{{$track->position}}</td>
                <td>{{$track->track_name}}</td>
                <td id="duration">{{$track->duration}}</td>
                <td>
                    <a class="btn btn-danger" href="/faixa/apagar/{{$track->id}}">Excluir</a>
                </td>
            </tr>        
            @endforeach
        @else
        <tr class="">
            <th>Album: {{$item->name}},</th>
            <th>{{Carbon\Carbon::parse($item->release_date)->format('Y')}}</th>
            <th>
                <a class="btn btn-danger" href="/discografia/apagar/{{$item->id}}">Excluir Album</a>
            </th>
        </tr>
        <tr>
            <th>Nº:</th>
            <th>Faixa:</th>
            <th id="duration">duração</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td id="duration"></td>
        </tr>
        @endif
        @endforeach
    </thead>
</table>
@else
<table id="tabela">
    <thead>
        <tr class="d-flex">
            <th>Album:</th>
            <th></th>
        </tr>
        <tr>
            <th>Nº:</th>
            <th>Faixa:</th>
            <th id="duration">duração</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td id="duration"></td>
        </tr>
    </thead>
</table>    
@endif
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
    <div id="tabela" class="col-auto">
        <a href="/discografia/criar" class="btn btn-primary mb-3">Cadastrar Album</a>
    </div>
    <div id="tabela" class="col-auto">
        <a href="/faixa/criar" class="btn btn-primary mb-3">Cadastrar Musica</a>
    </div>
</div>
@endsection