@extends('default.layout')

@section('content')

<form id="search" method="POST" class="row g-3">
    @csrf
    
    @if($errors->any())
    <div class="alert alert-danger">
    @foreach($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
    </div>
@endif
    <label for="album" class="form-label">Nome do album</label>
    <div class="col-sm-4 col-md-4">
      <input type="text" class="form-control" name="name" id="album">
    </div>
    <label for="release_date" class="form-label">Data de lançamento</label>
    <div class="col-sm-4 col-md-4">
      <input type="date" class="form-control" name="release_date" id="release_date">
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