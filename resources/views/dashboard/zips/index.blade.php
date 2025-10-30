@extends('layouts.dashboard')

@section('header')
<i class="fas fa-tag"></i> CEPs
<a href="/dashboard/zips/create" class="btn btn-sm btn-success">
    <i class="fas fa-plus"></i> Criar CEP
</a>
<a href="/dashboard/zips/import" class="btn btn-sm btn-primary">
    <i class="fas fa-file-upload"></i> Importar CSV
</a>
@endsection

@section('content')
    <script>
        function Delete(id) {
            Swal.fire({
                title: 'Você realmente deseja excluir esse cep?',
                showCancelButton: true,
                confirmButtonText: 'Sim',
                cancelButtonText: 'Voltar',
                denyButtonColor: "#0d6efd",
                confirmButtonColor: "#dc3545"
            }).then((result) => {
                if (result.isConfirmed) {
                    $("#delete_form").attr("action", `/dashboard/zips/${id}`);
                    $("#delete_form").submit();
                } else if (result.isDenied) {

                }
            });
        }
    </script>
    @include('dataTable', [
        'table_id' => 'table_zips',
        'models' => $zips,
        'column_defs' => '[{"targets": [0, 1, 3], "responsivePriority": 5}, {"targets": [2], "responsivePriority": 1}]',
        'columns' => [
            'id' => [
                'header' => 'ID',
            ],
            'from_postcode' => [
                'header' => 'CEPs',
                'model_function' => function ($model) {
                    return "Entre: <span class='fw-bold'>".cep_format($model->from_postcode)."</span> e <span class='fw-bold'>".cep_format($model->to_postcode)."</span>";
                },
            ],
            'from_weight' => [
                'header' => 'Peso',
                'model_function' => function ($model) {
                    return "Entre: <span class='fw-bold'>".$model->from_weight."</span> e <span class='fw-bold'>".$model->to_weight."</span>";
                },
            ],
            'cost' => [
                'header' => 'Detalhes',
                'model_function' => function ($model) {
                    return "Custo: ".money_format($model->cost)."<br>Filial: ".$model->branch_id;
                },
            ]
        ],
        'action_column' => function ($model) {
            return '<button onclick="Delete('.$model->id.');" title="Excluir" class="btn m-1 btn-sm btn-danger"><i class="fas fa-trash-can"></i></button>';
        },
    ])
    <form id="delete_form" action="/dashboard/zips/delete" method="post">
        @csrf
        @method('DELETE')
    </form>
@endsection

@section('footer')
    <p class="text-muted mb-0">Os dados são atualizados junto com a pagina.</p>
@endsection
