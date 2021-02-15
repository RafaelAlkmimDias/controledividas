@extends('layout.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/devedor/index.css') }}">
@endsection

@section('content')
    <div>
        <div class="dados-devedor">
            <div>
                <div class="div-input-form">
                    <label for="nome">Nome: </label>
                    <input id="nome" name="nome" type="text" maxlength="255" class="input-form" value="{{ $devedor->nome }}" disabled>
                </div><!--
            --><div class="div-input-form">
                    <label for="documento">Cpf/Cnpj: </label>
                    <input id="documento" name="documento" type="text" class="input-form" value="{{ $devedor->documento }}" disabled>
                </div>
            </div>
            <div>
                <div class="div-input-form">
                    <label for="data-de-nascimento">Data de Nascimento: </label>
                    <input id="data-de-nascimento" name="data-de-nascimento" type="text" class="input-form" value="{{ date('d/m/Y', strtotime($devedor['data-de-nascimento']))  }}" disabled>
                </div><!--
            --><div class="div-input-form">
                    <label for="endereco">Endereço: </label>
                    <input id="endereco" name="endereco" type="text" maxlength="255" class="input-form" value="{{ $devedor->endereco }}" disabled>
                </div>
            </div>
        </div>
    </div>

    <div style="margin-top:25px;">
        <div class="div-form">
            <form action="{{ route('divida.post') }}" method="post">
                @csrf
                <input id="devedor" name="devedor" type="hidden" value="{{ $devedor->id }}" required>
                
                <div class="div-input-form-divida">
                    <label for="descricao-do-titulo">Descrição do Título: </label>
                    <input id="descricao-do-titulo" name="descricao-do-titulo" type="text" class="input-form" value="{{ @old('descricao-do-titulo') }}" required>
                </div><!--
            --><div class="div-input-form-divida">
                        <label for="valor">Valor: </label>
                        <input id="valor" name="valor" type="number" min="0" step=".01" class="input-form" value="{{ @old('valor') }}" required>
                </div><!--
            --><div class="div-input-form-divida">
                    <label for="vencimento">Vencimento: </label>
                    <input id="vencimento" name="vencimento" type="date" maxlength="255" class="input-form" value="{{ @old('vencimento') }}" required>
                </div>
                <div class="div-submit-divida">
                    <button type="submit" class = "btn btn-submit" >Adicionar divida</button>
                </div>
            </form>
        </div>
    </div>


    <div class="div-tabela-dividas">
        @if(isset($grupo_dividas) && $grupo_dividas->count() > 0 )
            <table class="app-table">
                <thead>
                    <tr>
                        <th>Descrição do titulo</th>
                        <th>Valor</th>
                        <th>Vencimento</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                @foreach($grupo_dividas as $divida)
                <tbody>
                    <tr>
                        <td>{{ $divida['descricao-do-titulo'] }}</td>
                        <td>R$ {{ number_format($divida->valor, 2, ',', '') }}</td>
                        <td>{{ date("d/m/Y", strtotime($divida->vencimento)) }}</td>
                        <td>
                            <a class="btn btn-danger" href="{{ route('divida.excluir',$divida->id) }}">
                                Excluir
                            </a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        @else
            Não há dividas cadastrados em aberto
        @endif
    </div>
@endsection