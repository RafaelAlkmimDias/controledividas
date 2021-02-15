@extends('layout.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/divida/index.css') }}">
@endsection

@section('content')
    <div class="div-botao-adicionar-devedor">
        <a class="btn botao-adicionar-devedor" href="{{ route('devedor.form') }}">
            Adicionar Devedor
        </a>
    </div>
    <div class="div-tabela-devedores">
        @if(isset($grupo_devedores) && $grupo_devedores->count() )
            <table class="app-table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Documento</th>
                        <th>Divida</th>
                        <th>Vencimento</th>
                        <th>Divida Total</th>
                        <th>Dados</th>
                    </tr>
                </thead>
                @foreach($grupo_devedores as $devedor)
                <tbody>
                    <tr>
                        <td>{{ $devedor->nome }}</td>
                        <td>{{ $devedor->documento }}</td>
                        <td>R${{ $devedor->divida ? $devedor->valorAtual() : "-" }}</td>
                        <td>{{ $devedor->nome ? $devedor->vencimentoAtual() : "-" }}</td>
                        <td>R${{ $devedor->nome ? $devedor->valorTotal() : "-" }}</td>
                        <td>
                            <a class="btn btn-info" href="{{ route('devedor.index',$devedor->id) }}">
                                ver dados
                            </a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        @else
            Não há devedores cadastrados
        @endif
    </div>
@endsection

@section('js')
@endsection