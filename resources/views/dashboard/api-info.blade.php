@extends('layouts.dashboard')

@section('header')
    <i class="fas fa-key"></i> API REST
@endsection

@section('content')
    <p>Utilize a chave abaixo (Bearer Token) para realizar ações via API REST:</p>
    <input type="text" class="form-control" readonly value="{{ auth()->user()->api_token }}">
    <hr>
    Para acessar a API, <span class="fw-bold">certifique-se de sempre</span>:
    <ul>
        <li>incluir a chave de acesso no cabeçalho Authorization, como <span class="fw-bold">Bearer &lt;token&gt;</span>;</li>
        <li>incluir cabeçalho <span class="fw-bold">"Accept"</span> como <span class="fw-bold">"application/json"</span>.</li>
    </ul>
    <hr>
    Endpoints disponíveis:
    <div class="p-1 m-1" style="border-left: 5px solid rgba(0, 0, 0, 0.25)">
        <p>
            <span class="badge bg-success">POST</span> /api/mass-import
        </p>
        Envie um ou mais arquivo(s) .CSV no campo (array) <span class="badge bg-primary">files</span> (maximo 30MB).
        <p class="mb-0 mt-3">Possiveis respostas:</p>
        <p class="mb-1">
            <span class="badge bg-success">HTTP 200</span> Arquivo recebido e enviado para fila de processamento.
        </p>
        <p class="mb-1">
            <span class="badge bg-danger">HTTP 401</span> Não autorizado (Verifique o token de acesso)
        </p>
    </div>
@endsection

@section('footer')
    <p class="text-muted mb-0">Os dados são atualizados junto com a pagina.</p>
@endsection
