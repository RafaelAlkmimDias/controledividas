@extends('layout.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/devedor/form.css') }}">
@endsection

@section('content')
    <div class="div-form">
        <form action="{{ route('devedor.post') }}" method="post">
            @csrf
            <div class="div-input-form">
                <label for="nome">Nome: </label>
                <input id="nome" name="nome" type="text" maxlength="255" class="input-form" value="{{ @old('nome') }}" required>
            </div>
            <div class="div-input-form">
                <label for="documento">Cpf/Cnpj: </label>
                <input id="documento" name="documento" type="number" class="input-form" value="{{ @old('documento') }}" required>
            </div>
            <div class="div-input-form">
                <label for="data-de-nascimento">Data de Nascimento: </label>
                <input id="data-de-nascimento" name="data-de-nascimento" type="date" step="1" class="input-form" value="{{ @old('data-de-nascimento') }}" required>
            </div>
            <div class="div-input-form">
                <label for="endereco">Endereço: </label>
                <input id="endereco" name="endereco" type="text" maxlength="255" class="input-form" value="{{ @old('endereco') }}" required>
            </div>
            <div class="div-submit">
                <button type="submit" class = "btn btn-submit" >Salvar</button>
            </div>
        </form>
    </div>
@endsection

@section('js')
@endsection