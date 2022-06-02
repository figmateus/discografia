@extends('default.layout')

@section('content')
<form id="search" class="row g-3">
    <label for="inputPassword2" class="">Digite uma palavra chave</label>
    <div class="col-sm-9 col-md-9">
      <input type="text" class="form-control" id="album" placeholder="">
    </div>
    <div class="col-auto">
        <button type="submit" class="btn btn-primary mb-3">Procurar</button>
    </div>
</form>
<table id="tabela">
    <thead>
        <tr class="d-flex justify-content-between">
            <th>Album: </th>
            <td> cavaleiro</td>
        </tr>
        <tr>
            <th>Nº:</th>
            <th>Faixa:</th>
            <th id="duration">duração</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>1</td>
            <td id="duration">1:00</td>
        </tr>
        <tr>
            <td>1</td>
            <td>1</td>
        </tr>
    </tbody>
</table>
<div class="row">
    <div id="tabela" class="col-auto">
        <a href="/discografia/criar" class="btn btn-primary mb-3">Cadastrar Album</a>
    </div>
    <div id="tabela" class="col-auto">
        <a href="/faixa/criar" class="btn btn-primary mb-3">Cadastrar Musica</a>
    </div>
</div>
@endsection
{{-- <div  class="col form-group ">
    <div  id="search" class="">
        
        <input class="form-control" type="text" name="album" id="">
        <div class="">
            <button id="" class="btn btn-primary" type="submit">Procurar</button>
        </div>
    </div>
    
</div> --}}