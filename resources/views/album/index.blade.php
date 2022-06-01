@extends('default.layout')

@section('content')
    <form action="">
        <div class="row">
            <div  class="d-flex form-group col-sm-10 col-lg-10">
                <div  id="search" class="">
                    <label class="col form-label" for="search">Digite uma palavra chave</label>
                    <input class="form-control" type="text" name="album" id="">
                </div>
                <button id="" class="btn btn-primary" type="submit">Procurar</button>
            </div>
        </div>
    </form>
@endsection
