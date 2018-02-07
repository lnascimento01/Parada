@extends('home')

@section('title', 'Cadastro')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-5" id="div-lateral">
                <div class="card card-user">
                    <div class="image">
                        <img src="{{ URL::asset('img/road.jpg') }}" alt="..."/>
                    </div>
                    <div class="content">
                        <div class="author">
                            <img class="avatar border-white" src="{{ URL::asset('img/car-drawn.jpg') }}" alt="..."/>
                            <h4 class="title">Veiculo<br />
                               <!--<a href="#"><small></small></a>-->
                            </h4>
                        </div>
                        <p class="description text-center">

                        </p>
                    </div>
                    <hr>
                </div>
                <div class="card">
                    <div class="header">
                        <h4 class="title">Últimas Os's</h4>
                    </div>
                    <div class="content">
                        <ul class="list-unstyled lista_os">
                            @foreach (array_slice($listaOs->toArray(), 0, 6) as $os) 
                            <li>
                                <div class="row">
                                    <div class="col-xs-3">
                                        <div class="avatar">
                                            <img src="{{ URL::asset('img/car-drawn.jpg') }}" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        {{ $os->nome }}
                                        <br />
                                        <span class="text-muted"><small>{{ $os->modelo }}</small></span>
                                    </div>

                                    <div class="col-xs-3 text-right">
                                        <btn class="btn btn-sm btn-success btn-icon"><i class="fa fa-envelope"></i></btn>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9" id="tabs">{{ csrf_field() }}
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
                                <div class="form-group col-lg-12">
                                    <label for="" class="col-sm-2 control-label">Cliente:</label>
                                    <div class="col-lg-4">
                                        <input type="text" class="form-control border-input" id="txtCliente" idCliente="" placeholder="Cliente">
                                    </div>
                                    <label for="" class="col-sm-2 control-label">Veículo:</label>
                                    <div class="col-lg-4">
                                        <input type="text" name="inputFornecedorAuto" id="txtVeiculo" idVeiculo="" class="form-control col-lg-3 border-input">
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="" class="col-sm-2 control-label">Placa:</label>
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
                                    <label for="" class="col-sm-2 control-label">Complemento:</label>
                                    <div class="col-lg-10">
                                        <textarea rows="5" class="form-control border-input" id="txtComplemento" placeholder="Complemento" value="">
                                        </textarea>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="" class="col-sm-2 control-label">Serviços:</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control border-input" id="servico" placeholder="Serviço" valor="">
                                    </div>
                                    <div class="col-lg-2">
                                        <a href="#" class="col-lg-4 btn btn-success" id="btn-servicos"><i class="glyphicon glyphicon-plus primary"  style="text-align: center;"></i></a>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="lista-servicos table table-condensed text-sm">
                                    </table>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="" class="col-sm-2 control-label">Lista de peças:</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control border-input" id="peca" placeholder="Peça" valor="">
                                    </div>
                                    <div class="col-lg-1">
                                        <input type="text" class="form-control border-input" id="qtd" value="0">
                                    </div>
                                    <div class="col-lg-2">
                                        <a href="#" class="col-lg-4 btn btn-success" id="btn-pecas"><span class="glyphicon glyphicon-plus primary"  style="text-align: center;"></span></a>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="lista-pecas table table-condensed text-sm">
                                    </table>
                                </div>
                                <div class="form-group col-sm-12">
                                    <div class="col-lg-3"  style="float: right;">
                                        <a href="#" class="col-lg-6 btn btn-success" id="btn-salvar-os"><i class="fa fa-save primary"  style="text-align: center;"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
                <div class="container" id="tab-lista">
                    <div class="row">
                        <section class="content">
                            <h1>Ordens de serviço</h1>
                            <div class="" style="width: 100%!important;">
                                <div class="row">
                                    <div class="panel panel-primary filterable">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Os's</h3>
                                            <div class="pull-right">
                                                <button class="btn btn-default btn-xs btn-filter" style="margin-top: -3px;"><span class="glyphicon glyphicon-filter"></span> Filtrar</button>
                                            </div>
                                        </div>
                                        <table class="table" id="table-os">
                                            <thead>
                                                <tr class="filters">
                                                    <th class="" style="width: 2%!important;"><input type="text" class="form-control" placeholder="#" disabled></th>
                                                    <th class="" style="width: 40%!important;"><input type="text" class="form-control" placeholder="Cliente" disabled></th>
                                                    <th class="" style="width: 10%!important;"><input type="text" class="form-control" placeholder="Veículo" disabled></th>
                                                    <th class="" style="width: 10%!important;"><input type="text" class="form-control" placeholder="Placa" disabled></th>
                                                    <th class="" style="width: 10%!important;"><input type="text" class="form-control" placeholder="Status" disabled></th>
                                                    <th class="" style="width: 2%!important;"><input type="text" class="form-control" placeholder="" disabled><span class="fa fa-send"></span></th>
                                                    <th class="" style="width: 2%!important;"><input type="text" class="form-control" placeholder="" disabled><span class="fa fa-search"></span></th>
                                                    <th class="" style="width: 2%!important;"><input type="text" class="form-control" placeholder="" disabled><span class="fa fa-pencil-square-o"></span></th>
                                                    <th class="" style="width: 2%!important;"><input type="text" class="form-control" placeholder="" disabled><span class="fa fa-times-circle"></span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($listaOs as $os) 
                                                <tr>
                                                    <td>{{ $os->id }}</td>
                                                    <td>{{ $os->nome }}</td>
                                                    <td>{{ $os->modelo }}</td>
                                                    <td>{{ $os->placa }}</td>
                                                    <td>
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
                                                    <td><span class="btn btn-default view" id="{{ $os->id }}"><i class="fa fa-send"></i></span></td>
                                                    <td><span class="btn btn-primary view" id="{{ $os->id }}"><i class="fa fa-search"></i></span></td>
                                                    <td><span class="btn btn-success edit" id="{{ $os->id }}"><i class="fa fa-pencil-square-o success"></i></span></td>
                                                    <td><span class="btn btn-danger btn-del-os" idOs="{{ $os->id }}" CRUD="0"><i class="glyphicon glyphicon-trash"></i></span></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                </section>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{ URL::asset('js/jquery-1.10.2.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery-ui/jquery-ui.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/dataTables.js') }}"></script>
<script>
$(document).ready(function () {

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
    $(function () {
        $("#tabs").tabs({
            activate: function (event, ui) {
                var active = $('#tabs').tabs('option', 'active');
                if ($("#tabs ul>li a").eq(active).attr("id") == 'ui-id-5') {
//                    $('#div-lateral').show();
//                    $('#tab-lista').remove('col-lg-12');
//                    $('#tab-lista').addClass('col-lg-9');
                } else if ($("#tabs ul>li a").eq(active).attr("id") == 'ui-id-6') {
//                    $('#div-lateral').hide();
//                    $('#tab-lista').addClass('col-lg-9');
//                    $('#tab-lista').remove('col-lg-12');
                }
//                $("#tabid").html('the tab id is ' + $("#tabs ul>li a").eq(active).attr("href"));

            }
        });
    });


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
            $(this).attr('valor', ui.item.valor);
        }
    });

    $("#servico").autocomplete({
        maxResults: 10,
        source:<?= $servicos ?>,
        select: function (event, ui) {
            $(this).attr('id-servico', ui.item.id);
            $(this).attr('valor', ui.item.valor);
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
});

</script>
@stop