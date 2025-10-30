@extends('layouts.dashboard')

@section('header')
    <i class="fas fa-tag"></i> Criar CEP
@endsection

@section('content')
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            $("input[name=from_postcode]").mask("00.000-000");
            $("input[name=to_postcode]").mask("00.000-000");
        });
    </script>
    <form id="create_form" action="/dashboard/zips" method="post">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-2">
                <label class="w-100">
                    CEP de*
                    <input name="from_postcode" required placeholder="Preencha o CEP de" class="form-control" type="text">
                </label>
            </div>
            <div class="col-md-6 mb-2">
                <label class="w-100">
                    CEP até*
                    <input name="to_postcode" required placeholder="Preencha o CEP até" class="form-control" type="text">
                </label>
            </div>

            <div class="col-md-6 mb-2">
                <label class="w-100">
                    Peso de*
                    <input step="0.001" name="from_weight" required placeholder="Preencha o peso de" class="form-control" type="number">
                </label>
            </div>
            <div class="col-md-6 mb-2">
                <label class="w-100">
                    Peso até*
                    <input step="0.001" name="to_weight" required placeholder="Preencha o peso até" class="form-control" type="number">
                </label>
            </div>

            <div class="col-md-6 mb-2">
                <label class="w-100">
                    Custo
                    <input name="cost" required placeholder="Preencha o preço" class="form-control mask-money" type="text">
                </label>
            </div>
            <div class="col-md-6 mb-2">
                <label class="w-100">
                    Filial
                    <input step="1" name="branch_id" required placeholder="Preencha a filial" value="1" class="form-control" type="number">
                </label>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <a href="/dashboard/zips" class="btn btn-danger w-100">Voltar</a>
            </div>
            <div class="col-md-6">
                <input type="submit" class="btn btn-success w-100" value="Criar CEP">
            </div>
        </div>
    </form>
@endsection

@section('footer')
    <p class="text-muted mb-0">Campos marcados com * são obrigatórios.</p>
@endsection
