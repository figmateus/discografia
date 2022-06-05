@extends('default.layout')
@section('content')

<form id="search" method="POST" class="row g-3">
    @csrf
    @if($errors->any())
    <div class="col col-sm-4 alert alert-danger">
    @foreach($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
    </div>
    @endif
    <label for="position">Posição da faixa</label>
    <div class="col col-sm-2 col-md-2">
      <input type="text" class="form-control" name="position" id="position">
    </div>

    <label for="track_name">Nome da musica</label>
    <div class="col col-sm-3 col-md-3">
      <input type="text" class="form-control" name="track_name" id="track">
    </div>

    <label for="duration">Duração</label>
    <div class="col col-sm-3 col-md-3">
      <input data-mask="00:00" type="text" class="form-control" name="duration" placeholder="00:00">
    </div>
    {{--  --}}
    <div class="form-group">
        <div class="col col-sm-4 col-md-4">
            <select class="form-select" name="album" id="album" placeholder="">
                <option selected value="">Escolha um album para adicionar a faixa</option>
                @foreach($album as $a)
				<option value="{{$a->id}}">{{$a->name.','.Carbon\Carbon::parse($a->release_date)->format('Y')}}</option>
			    @endforeach
            </select>
      </div>
    </div>
    <div class="d-flex p-2">
        <div>
            <button type="submit" class="btn btn-primary m-1">Adicionar</button>
        </div>
        <div>
            <div id="tabela" class="col">
                <a href="/discografia" class="btn btn-primary m-1">Voltar</a>
            </div>
        </div>
    </div>   
</form>

@endsection