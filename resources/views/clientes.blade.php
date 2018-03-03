@extends('home')

@section('title', 'Clientes')
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
                                <input type="text" name="inputEmail" id="txtCliente" class="form-control col-lg-3 border-input">
                            </div>
                            <label for="" class="col-sm-1 control-label">CPF/CNPJ:</label>
                            <div class="col-lg-2">
                                <input type="text" class="form-control border-input" id="txtCpfCnpj" placeholder="CPF/CNPJ">
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="" class="col-sm-1 control-label">Email:</label>
                            <div class="col-lg-5">
                                <input type="text" name="inputEmail" id="txtEmail" class="form-control col-lg-3 border-input">
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="" class="col-sm-1 control-label">Cep:</label>
                            <div class="col-lg-2">
                                <input type="text" name="inputCep" id="txtCep" class="form-control col-lg-3 border-input">
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="" class="col-sm-1 control-label">Endereço:</label>
                            <div class="col-lg-5">
                                <input type="text" name="txtEndereco" id="txtEndereco" class="form-control border-input" placeholder="Endereço">
                            </div>
                            <label for="" class="col-sm-1 control-label">Número:</label>
                            <div class="col-lg-1">
                                <input type="text" name="txtNumero" id="txtNumero" class="form-control border-input" placeholder="">
                            </div>
                            <label for="" class="col-sm-1 control-label">Complemento:</label>
                            <div class="col-lg-2">
                                <input type="text" name="txtComplemento" id="txtComplemento" class="form-control border-input" placeholder="">
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="" class="col-sm-1 control-label">Bairro:</label>
                            <div class="col-lg-2">
                                <input type="text" name="txtBairro" id="txtBairro" class="form-control border-input" placeholder="Bairro">
                            </div>
                            <label for="" class="col-sm-1 control-label">Cidade:</label>
                            <div class="col-lg-2">
                                <input type="text" name="txtCidade" id="txtCidade" class="form-control border-input" placeholder="Cidade">
                            </div>
                            <label for="" class="col-sm-1 control-label">UF:</label>
                            <div class="col-lg-1">
                                <input type="text" name="txtUf" id="txtUf" class="form-control border-input" placeholder="UF">
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <div class="col-lg-3"  style="float: right;">
                                <a href="#" class="col-lg-6 btn btn-success" id="btn-salvar-cliente" CRUD="1"><i class="fa fa-save primary"  style="text-align: center;"></i></a>
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
                <legend class="title">Clientes</legend>
                <table data-vertable="ver1" class="" id="table-clientes">
                    <thead>
                        <tr class="row100 head">
                            <th class="column100 column1 text-center" style="width: 2%!important;" data-column="column2">#</th>
                            <th class="column100 column2" style="width: 40%!important;" data-column="column2">Nome</th>
                            <th class="column100 column3 text-center" style="width: 10%!important;" data-column="column3">Email</th>
                            <th class="column100 column4 text-center" style="width: 10%!important;" data-column="column4">Bairro</th>
                            <th class="column100 column5 text-center" style="width: 2%!important;" data-column="column5"><span class="fa fa-search"></span></th>
                            <th class="column100 column6 text-center" style="width: 2%!important;" data-column="column6"><span class="fa fa-pencil-square-o"></span></th>
                            <th class="column100 column7 text-center" style="width: 2%!important;" data-column="column7"><span class="fa fa-times-circle"></span></th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $cliente)
                        <tr class="row100">
                            <td class="column100 column1 text-center" style="width: 2%!important;" data-column="column1">{{ $cliente->id }}</td>
                            <td class="column100 column2" style="width: 40%!important;" data-column="column2">{{ $cliente->nome }}</td>
                            <td class="column100 column3"  style="width: 20%!important;" data-column="column3">{{ $cliente->email }}</td>
                            <td class="column100 column4 text-center" style="width: 20%!important;" data-column="column4">{{ $cliente->Bairro }}</td>
                            <td class="column100 column5 text-center" style="width: 2%!important;" data-column="column5"><span class="btn btn-primary view" id="{{ $cliente->id }}"><i class="fa fa-search"></i></span></td>
                            <td class="column100 column6 text-center" style="width: 2%!important;" data-column="column6"><span class="btn btn-primary view" id="{{ $cliente->id }}"><i class="fa fa-pencil-square-o"></i></span></td>
                            <td class="column100 column7 text-center" style="width: 2%!important;" data-column="column7"><span class="btn btn-danger btn-del-os" idOs="{{ $cliente->id }}" CRUD="0"><i class="glyphicon glyphicon-trash"></i></span></td>
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
<script>
$(document).ready(function () {
    $('#table-clientes').DataTable({
        paging: true,
        "order": [[1, "asc"]],
        "searching": false,
        "bFilter": false,
        "bSearchable": false,
        "bInfo": false,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json"
        }
    });
    $('#table-clientes').removeClass('dataTable');
    $(function () {
        $("#tabs").tabs();
    });

    $('body').on('click', '.view', function () {
        BootstrapDialog.show({
            title: 'Cliente',
            closeByBackdrop: false,
            closeByKeyboard: false,
            buttons: [{
                    label: 'Fechar',
                    action: function (dialogItself) {
                        dialogItself.close();
                    }
                }],
            message: $('<div class="text-center"><i class="fa fa-cog fa-spin fa-3x fa-fw"></i></div>').load('modal/view_cliente?id=' + $(this).attr('id'))
        });
    });

    $('body').on('click', '.edit', function () {
        BootstrapDialog.show({
            title: 'Cliente',
            closeByBackdrop: false,
            closeByKeyboard: false,
            message: $('<div class="text-center"><i class="fa fa-cog fa-spin fa-3x fa-fw"></i></div>').load('modal/edit_cliente?id=' + $(this).attr('id'))
        });
    });
});
</script>
@stop