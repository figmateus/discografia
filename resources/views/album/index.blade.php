@extends('default.layout')

@section('content')
    <form id="search" method="GET" action="{{route('search')}}" class="row g-3">
        @csrf
        <label for="album" class="">Digite uma palavra chave</label>
        <div class="col-sm-9 col-md-9">
            <input type="text" name="search" class="form-control rounded-pill"" id="search">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3 px-4 p-2 rounded-pill">Procurar</button>
        </div>
    </form>
    @if (count($albums) > 0)
    @foreach ($albums as $item)
            <table id="tabela">
                <thead>
                    <tr class="">
                        <th width=500>Album: {{ $item->name }}, {{ $item->release_date->format('Y') }}</th>
                        <th width=100></th>
                        <th>
                            <a class="btn btn btn-primary rounded-pill"
                                href="{{ route('album.show', ['id' => $item->id]) }}">Ver Album</a>
                            <a class="btn btn-danger rounded-pill" href="/discografia/apagar/{{ $item->id }}">Excluir
                                Album</a>
                        </th>
                    </tr>
                </thead>
                <table>
                    <thead>
                        <tr>
                            <td width=30>Nº</td>
                            <td>Faixa:</td>
                            <td id="duration">Duração</td>
                        </tr>
                    </thead>
                @if (count($item->tracks) > 0)
                        <tbody>
                            @foreach ($item->tracks as $track)
                                <tr>
                                    <td>{{ $track->position }}</td>
                                    <td width=300>{{ $track->name }}</td>
                                    <td id="duration">{{ $track->duration }}</td>
                                    {{-- <td>
                                        <a class="btn btn-danger rounded-pill" href="/faixa/apagar/{{ $track->id }}">Excluir</a>
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                @else
                <tbody>
                        <tr>
                            <td></td>
                            <td width=300>Album Sem Musica Cadastrada</td>
                            <td id="duration"></td>
                        </tr>
                </tbody>
            </table>
                @endif
                @endforeach
        <div class="d-flex justify-content-center">
            <div id="tabela" class="col-auto">
                <a href="/discografia/criar" class="btn btn-primary mb-3 rounded-pill">Cadastrar Album</a>
            </div>
            <div id="tabela" class="col-auto">
                <a href="/faixa/criar" class="btn btn-primary mb-3 rounded-pill">Cadastrar Musica</a>
            </div>
            <div id="tabela" class="col-auto">
                {!! $albums->links() !!}
            </div>
        </div>
    @else
        <h1>Cadastre um Album</h1>
        <div class="d-flex justify-content-center">
            <div id="tabela" class="col-auto">
                <a href="/discografia/criar" class="btn btn-primary mb-3 rounded-pill">Cadastrar Album</a>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="">
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
        </div>
        @if (session('message'))
            <div class="col col-sm-4">
                <p class="alert alert-success">{{ session('message') }}</p>
            </div>
        @endif
    </div>
@endsection
