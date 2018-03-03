<link rel="stylesheet" href="{{ elixir('css/bootstrap-dialog.css') }}">
<style>
    .modal-dialog {
        width: 70%;
    }

    span {
        display:table-cell;
        vertical-align:middle;
    }
</style>
<div class="col-lg-12">
    <div class="content" style="overflow:auto;">
        <form class="form-horizontal">
            <div class="panel-body border1">
                <legend>Orçamento</legend>
                <div class="form-group col-lg-8">
                    <div class="col-lg-5">
                        <p>29.018.587/0001-48</p>
                        <p>Parada 351</p>
                        <p>Rua Domingos Lopes 374/386</p>
                        <p>Madureira, Rio de Janeiro</p>
                        <p>Rio de Janeiro</p>
                        <p>(21) 3350-9925</p>
                    </div>
                    <div class="col-lg-3" style="float: right;">
                        <img src="" width="250" height="100">
                    </div>
                </div>
                <div class="form-group col-lg-12">
                    <div style="background-color: #1F60A0;">
                        <p style="color: #ffffff; font-size: 25px; text-align: center;">Ordem de Serviço</p>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group col-lg-12">
                        <label class="col-lg-3" style="color: #ffffff; font-size: 15px; background-color: #14406B;">Cliente:</label>
                        <label class="col-lg-5" name="cliente" id="cliente" placeholder="Cliente"  >{{$os['ordem']->nome}}</label>
                        <label class="col-lg-3" style="color: #ffffff; font-size: 15px; background-color: #14406B;">Nº Ordem:</label>
                        <label class="col-lg-1" name="nOrdem" id="nOrdem" placeholder="Nº Ordem">{{$os['ordem']->id}}</label>
                    </div>
                </div>
                <div class="form-group col-lg-12">
                    <label class="col-lg-2" style="color: #ffffff; font-size: 15px; text-align: center; background-color: #1F60A0;">Data: </label>
                    <div class="col-lg-4">
                        <label name="data" id="data" placeholder="Data">{{$os['ordem']->data_cadastro}}</label>
                    </div>
                </div>
                <div class="form-group col-lg-12">
                    <label class="col-lg-2" style="color: #ffffff; font-size: 15px; text-align: center; background-color: #14406B;">Carro:</label>
                    <div class="col-lg-6">
                        <label name="carro" id="carro" placeholder="Carro">{{$os['ordem']->modelo}}</label>
                    </div>
                    <label class="col-lg-2" style="color: #ffffff; font-size: 15px; text-align: center; background-color: #14406B;">Placa:</label>
                    <div class="col-lg-2">
                        <label name="placa" id="placa" placeholder="placa">{{$os['ordem']->placa}}</label>
                    </div>
                </div>
                <div class="form-group col-lg-12">
                    <label class="col-lg-2" style="color: #ffffff; font-size: 15px; text-align: center; background-color: #14406B;">TP:</label>
                    <div class="col-lg-6">
                        <label name="TP" id="TP" placeholder="TP">{{$os['ordem']->tp}}</label>
                    </div>
                    <label class="col-lg-2" style="color: #ffffff; font-size: 15px; text-align: center; background-color: #14406B;">Km:</label>
                    <div class="col-lg-2">
                        <label name="km" id="km" placeholder="Km">{{$os['ordem']->km}}</label>
                    </div>
                </div>
                <div class="form-group col-lg-12">
                    <label class="col-lg-1" style="color: #ffffff; font-size: 15px; text-align: center; background-color: #14406B;">Nº</label>
                    <label class="col-lg-6" style="color: #ffffff; font-size: 15px; text-align: center; background-color: #14406B;">Peça</label>
                    <label class="col-lg-1" style="color: #ffffff; font-size: 15px; text-align: center; background-color: #14406B;">Qtd.</label>
                    <label class="col-lg-2" style="color: #ffffff; font-size: 15px; text-align: left; background-color: #14406B;">Valor Unid.</label>
                    <label class="col-lg-2" style="color: #ffffff; font-size: 15px; text-align: left; background-color: #14406B;">Valor Total</label>
                </div>
                <?php $valorTotalPecas = 0; ?>
                @foreach ($os['pecas'] as $peca)
                <div class="form-group col-lg-12">
                    <label class="col-lg-1" style="text-align: left;">{{$peca->id}}</label>
                    <label class="col-lg-6" style="text-align: left;">{{$peca->nome}}</label>
                    <label class="col-lg-1" style="text-align: left;">{{$peca->qtd}}</label>
                    <label class="col-lg-2" style="text-align: left;">{{$peca->valor}}</label>
                    <label class="col-lg-2" style="text-align: left;">{{$peca->qtd * $peca->valor}}</label>
                </div>
                <?php $valorTotalPecas += $peca->qtd * $peca->valor ?>
                @endforeach
                <div class="form-group col-lg-12">
                    <label class="col-lg-8" style="color: #ffffff; font-size: 15px; text-align: center; background-color: #1F60A0;"></label>
                    <label class="col-lg-2" style="color: #ffffff; font-size: 15px; text-align: center; background-color: #14406B;">Total Peças:</label>
                    <label class="col-lg-2" style="color: #ffffff; font-size: 15px; text-align: center; background-color: #14406B;">R$ {{$valorTotalPecas}}</label>
                </div>
                <div class="form-group col-lg-12">
                    <label class="col-lg-10" style="color: #ffffff; font-size: 15px; text-align: center; background-color: #14406B;">Serviços</label>
                    <label class="col-lg-2" style="color: #ffffff; font-size: 15px; text-align: left; background-color: #14406B;">Valor</label>
                </div>
                <?php $valorTotalServicos = 0; ?>
                @foreach ($os['servicos'] as $servico)
                <div class="form-group col-lg-12">
                    <label class="col-lg-10" style="text-align: left;">{{$servico->nome}}</label>
                    <label class="col-lg-2" style="text-align: left;">R$ {{$servico->valor}}</label>
                </div>
                <?php $valorTotalServicos += $servico->valor ?>
                @endforeach
                <div class="form-group col-lg-12">
                    <label class="col-lg-8" style="color: #ffffff; font-size: 15px; text-align: center; background-color: #1F60A0;"></label>
                    <label class="col-lg-2" style="color: #ffffff; font-size: 15px; text-align: center; background-color: #14406B;">Total Serviços</label>
                    <label class="col-lg-2" style="color: #ffffff; font-size: 15px; text-align: left; background-color: #14406B;">{{$valorTotalServicos}}</label>
                </div>
                <div class="form-group col-lg-12">
                    <label class="col-lg-2" style="color: #ffffff; font-size: 15px; text-align: center; background-color: #404040;">Enviado por:</label>
                    <label class="col-lg-3" style="font-size: 15px; text-align: center;">Gabriel Rodrigues</label>
                    <label class="col-lg-2" style=""></label>
                    <label class="col-lg-3" style="color: #ffffff; font-size: 15px; text-align: center; background-color: #1F60A0;">Subtotal:</label>
                    <label class="col-lg-2" style="color: #ffffff; font-size: 15px; text-align: center; background-color: #1F60A0;">R$ <?= $valorTotalServicos + $valorTotalPecas ?></label>
                </div>
                <div class="form-group col-lg-12">
                    <label class="col-lg-2"></label>
                    <label class="col-lg-3"></label>
                    <label class="col-lg-2"></label>
                    <label class="col-lg-3" style="color: #ffffff; font-size: 15px; text-align: center; background-color: #14406B;">Desconto:</label>
                    <label class="col-lg-2" style="color: #ffffff; font-size: 15px; text-align: center; background-color: #14406B;">R$ 0,00</label>
                </div>
                <div class="form-group col-lg-12">
                    <label class="col-lg-2" style="color: #ffffff; font-size: 15px; text-align: center; background-color: #404040;">Autorizado por:</label>
                    <label class="col-lg-3" style="font-size: 15px; text-align: center;">Gabriel Rodrigues</label>
                    <label class="col-lg-2" style=""></label>
                    <label class="col-lg-3" style="color: #ffffff; font-size: 15px; text-align: center; background-color: #14406B;">Total:</label>
                    <label class="col-lg-2" style="color: #ffffff; font-size: 15px; text-align: center; background-color: #14406B;">R$ <?= $valorTotalServicos + $valorTotalPecas ?></label>
                </div>
            </div>

        </form>
    </div>
</div>
<script type="text/javascript" src="{{ URL::asset('css/bootstrap/js/bootstrap.min.js') }}"></script>