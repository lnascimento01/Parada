@extends('home')

@section("title", "Os's")
@section('content')
<style>

</style>
<div class="col-lg-12" id="tabs">
    <ul>
        <li><a href="#tab-cadastro">cadastro</a></li>
        <li><a href="#tab-lista">Lista</a></li>
    </ul>
    <div class="card col-lg-12" id="tab-cadastro">
        <div class="card">
            <div class="header">
                <legend class="title">Cadastro</legend>
            </div>
            <form class="form-horizontal">
                <div class="panel-body">
                    <div id="form-cadastro" class="col-lg-12">
                        <div class="form-group col-sm-12">
                            <label for="" class="col-sm-1 control-label">Nome:</label>
                            <div class="col-lg-5">
                                <input type="text" id="txtPeca" class="form-control col-lg-3 border-input">
                            </div>
                            <label for="" class="col-sm-1 control-label">R$ </label>
                            <div class="col-lg-2">
                                <input type="text" class="form-control border-input valor" data-thousands="." data-decimal="," id="txtValor" placeholder="00,0">
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <div class="col-lg-3"  style="float: right;">
                                <a href="#" class="col-lg-6 btn btn-success" id="btn-salvar-peca" CRUD="1"><i class="fa fa-save primary"  style="text-align: center;"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix">{{ csrf_field() }}</div>
            </form>
        </div>
    </div>
    <div class="container" id="tab-lista">
        <div class="wrap-table100">
            <div class="table100 ver1 m-b-110">
                <legend class="title">Peças</legend>
                <table data-vertable="ver1" class="" id="table-pecas">
                    <thead>
                        <tr class="row100 head">
                            <th class="column100 column1 text-center" style="width: 2%!important;" data-column="column2">#</th>
                            <th class="column100 column2" style="width: 50%!important;" data-column="column2">Nome</th>
                            <th class="column100 column3 text-center" style="width: 10%!important;" data-column="column3">Valor</th>
                            <th class="column100 column5 text-center" style="width: 2%!important;" data-column="column5"><span class="fa fa-search"></span></th>
                            <th class="column100 column6 text-center" style="width: 2%!important;" data-column="column6"><span class="fa fa-pencil-square-o"></span></th>
                            <th class="column100 column7 text-center" style="width: 2%!important;" data-column="column7"><span class="fa fa-times-circle"></span></th>

                        </tr>
                    </thead>
                    <tbody>
@foreach ($pecas as $peca)
                        <tr class="row100">
                            <td class="column100 column1 text-center" style="width: 2%!important;" data-column="column1">{{ $peca->id }}</td>
                            <td class="column100 column2" style="width: 50%!important;" data-column="column2">{{ $peca->nome }}</td>
                            <td class="column100 column4 text-left" style="width: 20%!important;" data-column="column4">R$ {{number_format($peca->valor, 2, ',', '.')}}</td>
                            <td class="column100 column5 text-center" style="width: 2%!important;" data-column="column5"><span class="btn btn-primary view" id="{{ $peca->id }}"><i class="fa fa-search"></i></span></td>
                            <td class="column100 column6 text-center" style="width: 2%!important;" data-column="column6"><span class="btn btn-success edit" id="{{ $peca->id }}"><i class="fa fa-pencil-square-o"></i></span></td>
                            <td class="column100 column7 text-center" style="width: 2%!important;" data-column="column7"><span class="btn btn-danger btn-del-os" idOs="{{ $peca->id }}" CRUD="0"><i class="glyphicon glyphicon-trash"></i></span></td>
                        </tr>
@endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
<script type="text/javascript" src="{{ URL::asset('js/jquery-1.10.2.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery-ui/jquery-ui.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/dataTables.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.maskMoney.js') }}"></script>
<script>
$(document).ready(function () {
    $('#table-pecas').DataTable({
        paging: true,
        "order": [[1, "asc"]],
        "searching": false,
        "bFilter": false,
        "bSearchable": false,
        "bInfo": false,
        "lengthChange": false,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json"
        }
    });
    $('#table-pecas').removeClass('dataTable');
    $(function () {
        $("#tabs").tabs();
    });
    $('.valor').maskMoney();

    $('body').on('click', '.view', function () {
        BootstrapDialog.show({
            title: 'Peça',
            closeByBackdrop: false,
            closeByKeyboard: false,
            buttons: [{
                    label: 'Fechar',
                    action: function (dialogItself) {
                        dialogItself.close();
                    }
                }],
            message: $('<div class="text-center"><i class="fa fa-cog fa-spin fa-3x fa-fw"></i></div>').load('modal/view_peca?id=' + $(this).attr('id'))
        });
    });

    $('body').on('click', '.edit', function () {
        BootstrapDialog.show({
            title: 'Peça',
            closeByBackdrop: false,
            closeByKeyboard: false,
            message: $('<div class="text-center"><i class="fa fa-cog fa-spin fa-3x fa-fw"></i></div>').load('modal/edit_peca?id=' + $(this).attr('id'))
        });
    });
});
</script>
@stop