@extends('home')

@section("title", "Os's")
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12" id="tabs">{{ csrf_field() }}
                <ul>
                    <li><a href="#tab-cadastro">Cadastro</a></li>
                    <li><a href="#tab-lista">Lista de Os's</a></li>
                </ul>
                <div class="card col-lg-12" id="tab-cadastro">
                    <div class="header">
                        <legend class="title">Cadastro</legend>
                    </div>
                    <form class="form-horizontal">
                        <div class="panel-body">
                            <div id="form-cadastro">
                                <div class="form-group col-lg-12" style="">
                                    <label for="" class="col-sm-1 control-label">Cliente:</label>
                                    <div class="col-lg-4">
                                        <input type="text" class="form-control border-input" id="txtCliente" idCliente="" placeholder="Cliente">
                                    </div>
                                    <label for="" class="col-sm-2 control-label">Veículo:</label>
                                    <div class="col-lg-4">
                                        <input type="text" name="inputFornecedorAuto" id="txtVeiculo" idVeiculo="" class="form-control col-lg-3 border-input">
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="" class="col-sm-1 control-label">Placa:</label>
                                    <div class="col-lg-2">
                                        <input type="text" class="form-control border-input" id="txtPlaca" placeholder="Placa">
                                    </div>
                                    <label for="" class="col-sm-1 control-label">TP:</label>
                                    <div class="col-lg-2">
                                        <input type="text" name="tp" id="txtTp" class="form-control border-input" placeholder="TP">
                                    </div>
                                    <label for="" class="col-sm-1 control-label">Km:</label>
                                    <div class="col-lg-2">
                                        <input type="text" name="km" id="txtKm" class="form-control border-input" placeholder="Km">
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="" class="col-sm-1 control-label">Obs:</label>
                                    <div class="col-lg-9">
                                        <textarea rows="5" class="form-control border-input" id="txtComplemento" placeholder="Complemento" value="">
                                        </textarea>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="" class="col-sm-1 control-label">Peças:</label>
                                    <div class="col-lg-5">
                                        <input type="text" class="form-control border-input" id="peca" placeholder="Peça">
                                    </div>
                                    <label for="" class="col-sm-1 control-label">R$</label>
                                    <div class="col-lg-2">
                                        <input type="text" class="form-control border-input valor" data-thousands="." data-decimal="," id="valorPeca" value="">
                                    </div>
                                    <div class="col-lg-1">
                                        <input type="text" class="form-control border-input" id="qtd" value="0">
                                    </div>
                                    <div class="col-lg-2">
                                        <a href="#" class="col-lg-4 btn btn-success" id="btn-pecas"><span class="glyphicon glyphicon-plus primary"  style="text-align: center;"></span></a>
                                    </div>
                                </div>
                                <div class="lista-pecas">
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="" class="col-sm-1 control-label">Serviços:</label>
                                    <div class="col-lg-5">
                                        <input type="text" class="form-control border-input" id="servico" placeholder="Serviço">
                                    </div>
                                    <label for="" class="col-sm-1 control-label">R$</label>
                                    <div class="col-lg-2">
                                        <input type="text" class="form-control border-input valor" data-thousands="." data-decimal="," id="valorServico" value="">
                                    </div>
                                    <div class="col-lg-2">
                                        <a href="#" class="col-lg-4 btn btn-success" id="btn-servicos"><i class="glyphicon glyphicon-plus primary"  style="text-align: center;"></i></a>
                                    </div>
                                </div>
                                <div class="lista-servicos">
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <div class="col-lg-3"  style="float: right;">
                                    <a href="#" class="col-lg-6 btn btn-success" id="btn-salvar-os"><i class="fa fa-save primary"  style="text-align: center;"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
                <div class="" id="tab-lista">
                    <table class="container">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 2%!important;"><h1>#</h1></th>
                                <th class="" style="width: 40%!important;"><h1>Cliente</h1></th>
                                <th class="text-center" style="width: 10%!important;"><h1>Veículo</h1></th>
                                <th class="text-center" style="width: 10%!important;"><h1>Placa</h1></th>
                                <th class="text-center" style="width: 10%!important;"><h1>Status</h1></th>
                                <th class="text-center" style="width: 2%!important;"><span class="fa fa-envelope"></span></th>
                                <th class="text-center" style="width: 2%!important;"><span class="fa fa-search"></span></th>
                                <th class="text-center" style="width: 2%!important;"><span class="fa fa-pencil-square-o"></span></th>
                                <th class="text-center" style="width: 2%!important;"><span class="fa fa-times-circle"></span></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listaOs as $os)
                            <tr>
                                <td class="text-center" style="width: 2%!important;" >{{ $os->id }}</td>
                                <td class="" style="width: 40%!important;">{{ $os->nome }}</td>
                                <td class="" style="width: 10%!important;">{{ $os->modelo }}</td>
                                <td class="text-center" style="width: 10%!important;">{{ $os->placa }}</td>
                                <td class="text-center" style="width: 10%!important;">
                                    @if ($os->status == 0)
                                    Cancelada
                                    @elseif ($os->status == 1)
                                    Progresso
                                    @elseif ($os->status == 2)
                                    Aprovação
                                    @elseif ($os->status == 3)
                                    Finalizada
                                    @endif
                                </td>
                                <td class="text-center" style="width: 2%!important;"><span class="btn btn-default mail"  id="{{ $os->id }}" href="#"><i class="fa fa-send"></i></span></td>
                                <td class="text-center" style="width: 2%!important;"><span class="btn btn-primary view" id="{{ $os->id }}"><i class="fa fa-search"></i></span></td>
                                <td class="text-center" style="width: 2%!important;"><span class="btn btn-success edit" id="{{ $os->id }}"><i class="fa fa-pencil-square-o"></i></span></td>
                                <td class="text-center" style="width: 2%!important;"><span class="btn btn-danger btn-del-os" idOs="{{ $os->id }}" CRUD="0"><i class="glyphicon glyphicon-trash"></i></span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{ URL::asset('js/jquery-1.10.2.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery-ui/jquery-ui.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/dataTables.js') }}"></script>
<script>
$(document).ready(function () {
    $("#tabs").tabs({
        activate: function (event, ui) {
            var active = $('#tabs').tabs('option', 'active');
        }
    });
    $('.valor').maskMoney();
    $('#table-os').DataTable({
        paging: true,
        "order": [[0, "asc"]],
        "searching": false,
        "bFilter": false,
        "bSearchable": false,
        "bInfo": false,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json"
        }
    });
    $('#table-os').removeClass('dataTable');

    $("#txtCliente").autocomplete({
        maxResults: 10,
        source: <?= $clientes ?>,
        select: function (event, ui) {
            $(this).attr('idCliente', ui.item.id);
            $(this).prop('readonly', true);
        }
    });

    $("#peca").autocomplete({
        maxResults: 10,
        source: <?= $pecas ?>,
        select: function (event, ui) {
            $(this).attr('id-peca', ui.item.id);
            $('#valorPeca').val(number_format(ui.item.valor, 2));
        }
    });

    $("#servico").autocomplete({
        maxResults: 10,
        source:<?= $servicos ?>,
        select: function (event, ui) {
            $(this).attr('id-servico', ui.item.id);
            $('#valorServico').val(number_format(ui.item.valor, 2));
        }
    });

    $("#txtVeiculo").autocomplete({
        maxResults: 10,
        source:<?= $carros ?>,
        select: function (event, ui) {
            $(this).attr('idVeiculo', ui.item.id);
            $(this).prop('readonly', true);
        }
    });
    $('body').on('click', '.view', function () {
        BootstrapDialog.show({
            title: 'Ordem de Serviço',
            closeByBackdrop: false,
            closeByKeyboard: false,
            buttons: [{
                    label: 'Fechar',
                    action: function (dialogItself) {
                        dialogItself.close();
                    }
                }],
            message: $('<div class="text-center"><i class="fa fa-cog fa-spin fa-3x fa-fw"></i></div>').load('modal/view_os?id=' + $(this).attr('id'))
        });
    });

    $('body').on('click', '.edit', function () {
        BootstrapDialog.show({
            title: 'Ordem de Serviço',
            closeByBackdrop: false,
            closeByKeyboard: false,
            message: $('<div class="text-center"><i class="fa fa-cog fa-spin fa-3x fa-fw"></i></div>').load('modal/edit_os?id=' + $(this).attr('id'))
        });
    });
    $('.mail').on('click', function () {
        var _token = $("input[name='_token']").val();
        var css = "background-color: #0C1713; color: #FFFFFF; font-size: 28px; font: bold 34px 'Century Schoolbook', Georgia, Times, serif;";
        var data = {_token: _token, id: $(this).attr('id')};
        $.ajax({
            url: '/os/pdf',
            type: 'POST',
            data: data,
            success: function (result) {
                if (result == 'true') {
                    BootstrapDialog.alert('Email Enviado Com Sucesso!', 'Sucesso!', "Null", 'Success');
                    $('.form-horizontal')[0].reset;
                    $('.lista-pecas').html('');
                    $('.lista-servicos').html('');
                    $('#txtCliente').prop('readonly', false);
                    $('#txtVeiculo').prop('readonly', false);
                }
            }});
    });

    function number_format(string, decimals = 2, decimal = ',', thousands = '.', pre = 'R$ ', pos = ' $') {
        var numbers = string.toString().match(/\d+/g).join([]);
        numbers = numbers.padStart(decimals + 1, "0");
        var splitNumbers = numbers.split("").reverse();
        var mask = '';
        splitNumbers.forEach(function (d, i) {
            if (i == decimals) {
                mask = decimal + mask;
            }
            if (i > (decimals + 1) && ((i - 2) % (decimals + 1)) == 0) {
                mask = thousands + mask;
            }
            mask = d + mask;
        });
        return mask;
    }
});
</script>
@stop