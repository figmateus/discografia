@extends('default.layout')

@section('content')

<form id="search" class="row g-3">
    <label for="inputPassword2" class="">Nome da musica</label>
    <div class="col-sm-4 col-md-4">
      <input type="text" class="form-control" id="album" placeholder="">
    </div>
    <div class="col-sm-4 col-md-4">
        <select class="form-select" id="album" placeholder="">
            <option selected>Selecione um album</option>
            <option value="1">Album 1</option>
            <option value="2">Album 2</option>
            <option value="3">Album 3</option>
        </select>
      </div>
    <div class="col-auto">
        <button type="submit" class="btn btn-primary mb-3">Adicionar</button>
    </div>
</form>
<div class="row">
    <div id="tabela" class="col-auto">
        <a href="/discografia" class="btn btn-primary mb-3">Voltar</a>
    </div>
</div>
@endsection