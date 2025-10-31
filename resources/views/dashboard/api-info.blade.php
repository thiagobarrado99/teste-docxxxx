@extends('layouts.dashboard')

@section('header')
    <i class="fas fa-key"></i> API REST
@endsection

@section('content')
    <p>Utilize a chave abaixo (Bearer Token) para realizar ações via API REST:</p>
    <input type="text" class="form-control" readonly value="{{ auth()->user()->api_token }}">
    <hr>
    Endpoints disponíveis:
    <p>
        <span class="badge bg-success">POST</span> /api/
    </p>
@endsection

@section('footer')
    <p class="text-muted mb-0">Os dados são atualizados junto com a pagina.</p>
@endsection
