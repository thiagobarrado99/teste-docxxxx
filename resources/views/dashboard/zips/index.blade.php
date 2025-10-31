@extends('layouts.dashboard')

@section('header')
<i class="fas fa-tag"></i> CEPs
<a href="/dashboard/zips/create" class="btn btn-sm btn-success">
    <i class="fas fa-plus"></i> Criar CEP
</a>
<button data-bs-toggle="modal" data-bs-target="#import_modal" class="btn btn-sm btn-primary">
    <i class="fas fa-file-upload"></i> Importar CSV
</button>
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
        'paging' => false,
        'info' => false,
        'searching' => false,
        'columns' => [
            'id' => [
                'header' => 'ID',
            ],
            'from_postcode' => [
                'header' => 'Faixa de CEP',
                'model_function' => function ($model) {
                    return "Entre: <span class='fw-bold'>".cep_format($model->from_postcode)."</span> e <span class='fw-bold'>".cep_format($model->to_postcode)."</span>";
                },
            ],
            'from_weight' => [
                'header' => 'Faixa de Peso',
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
    <p class="text-muted">
        Showing <strong>{{ $zips->firstItem() }}</strong>–
        <strong>{{ $zips->lastItem() }}</strong>
        of <strong>{{ $zips->total() }}</strong> results
    </p>
    <p>{{ $zips->links() }}</p>
    <form id="delete_form" action="/dashboard/zips/delete" method="post">
        @csrf
        @method('DELETE')
    </form>

    <div class="modal fade" id="import_modal" tabindex="-1" role="dialog" aria-labelledby="import_modal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Importar CSV</h5>
                </div>
                <form enctype="multipart/form-data" action="/dashboard/zips/upload" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <label class="w-100 mb-2">
                                Arquivo(s) CSV (máximo 30MB cada)
                                <input class="text-control" accept=".csv,text/csv" type="file" name="files[]" required multiple>
                            </label>       
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" data-bs-dismiss="modal" type="button" role="button" class="btn btn-danger">Voltar</a>
                        <input class="btn btn-success" type="submit" value="Enviar">
                    </div>    
                </form>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <p class="text-muted mb-0">Os dados são atualizados junto com a pagina.</p>
@endsection
