@extends('default.layout')

@section('content')

<form id="search" class="row g-3">
    <label for="inputPassword2" class="">Nome do album</label>
    <div class="col-sm-4 col-md-4">
      <input type="text" class="form-control" id="album" placeholder="">
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