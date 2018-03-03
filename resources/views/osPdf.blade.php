<style>
<?php include(public_path('css/bootstrap/css/bootstrap.min.css')); ?>
</style>
<?php setlocale(LC_MONETARY, "pt_BR", "ptb"); ?>
<form>
    <div style="background-color: #CEE7E8; border: 1px ridge; padding: 0px -30px;">
        <div class="col-lg-12" style="width: 100%">
            <div class="form-group col-lg-12">
                <div style="background-color: #14406B;">
                    <p style="color: #ffffff; font-size: 25px; text-align: center; padding-right: 5px;">Parada 351 Regulagens LTDA</p>
                </div>
            </div>
            <div class="col-lg-12">
                <label class="text-left" name="cliente" id="cliente" placeholder="Cliente" style="width: 50%;">29.018.587/0001-48</label>
            </div>
            <div class="col-lg-12">
                <label class="text-left" name="cliente" id="cliente" placeholder="Cliente" style="width: 50%;">Parada 351</label>
            </div>
            <div class="col-lg-12">
                <label class="text-left" name="cliente" id="cliente" placeholder="Cliente" style="width: 50%;">Rua Domingos Lopes 374/386</label>
            </div>
            <div class="col-lg-12">
                <label class="text-left" name="cliente" id="cliente" placeholder="Cliente" style="width: 50%;">Madureira, Rio de Janeiro</label>
            </div>
            <div class="col-lg-12">
                <label class="text-left" name="cliente" id="cliente" placeholder="Cliente" style="width: 50%;">Rio de Janeiro</label>
            </div>
            <div class="col-lg-12">
                <label class="text-left" name="cliente" id="cliente" placeholder="Cliente" style="width: 50%;">(21) 3350-9925</label>
            </div>
        </div>
        <div class="col-lg-12" style="width: 100%">
            <div class="form-group col-lg-12">
                <div style="background-color: #14406B;">
                    <p style="color: #ffffff; font-size: 25px; text-align: center; padding-right: 5px;">Ordem de Serviço - Nº {{$os['ordem']->id}}</p>
                </div>
            </div>
            <div class="form-group col-lg-12">
                <label class="text-center" style="color: #ffffff; font-size: 15px; background-color: #14406B; width: 20%;">Cliente:</label>
                <label class="" name="cliente" id="cliente" placeholder="Cliente" style="width: 80%; padding-left: 5px;">{{$os['ordem']->nome}}</label>
            </div>
            <div class="form-group col-lg-12">
                <label class="text-center" style="color: #ffffff; font-size: 15px; background-color: #14406B; width: 20%;">Data:</label>
                <label class="" name="cliente" id="cliente" placeholder="Cliente" style="width: 50%; padding-left: 5px;">{{$os['ordem']->data_cadastro}}</label>
            </div>
            <div class="form-group col-lg-12">
                <label class="text-center" style="color: #ffffff; font-size: 15px; background-color: #14406B; width: 20%;">Carro:</label>
                <label class="" style="width: 40%; padding-left: 5px;">{{$os['ordem']->id}}</label>
                <label class="text-center" style="color: #ffffff; font-size: 15px; background-color: #14406B; width: 20%;">Placa:</label>
                <label class="" style="width: 20%; padding-left: 5px;">{{$os['ordem']->placa}}</label>
            </div>
            <div class="form-group col-lg-12">
                <label class="text-center" style="color: #ffffff; font-size: 15px; background-color: #14406B; width: 20%;">TP:</label>
                <label class="" style="width: 40%; padding-left: 5px;">{{$os['ordem']->tp}}</label>
                <label class="text-center" style="color: #ffffff; font-size: 15px; background-color: #14406B; width: 20%;">Km:</label>
                <label class="" style="width: 20%; padding-left: 5px;">{{$os['ordem']->km}}</label>
            </div>
            <div class="form-group col-lg-12">
                <label class="text-center" style="color: #ffffff; font-size: 15px; background-color: #14406B; width: 10%;">Nº</label>
                <label class="text-center" style="color: #ffffff; font-size: 15px; background-color: #14406B; width: 48%;">Peça</label>
                <label class="text-center" style="color: #ffffff; font-size: 15px; background-color: #14406B; width: 10%;">Qtd.</label>
                <label class="text-center" style="color: #ffffff; font-size: 15px; background-color: #14406B; width: 15%;">Valor Unid.</label>
                <label class="text-center" style="color: #ffffff; font-size: 15px; background-color: #14406B; width: 15%;">Valor Total</label>
            </div>
            <?php $valorTotalPecas = 0; ?>
            @foreach ($os['pecas'] as $peca)
            <div class="form-group col-lg-12">
                <label class="text-center" style="width: 10%;">{{$peca->id}}</label>
                <label class="text-left" style="width: 48%; padding-left: 5px;">{{$peca->nome}}</label>
                <label class="text-left" style="width: 10%; padding-left: 5px;">{{$peca->qtd}}</label>
                <label class="text-left" style="width: 15%; padding-left: 5px;">R$ {{number_format($peca->valor, 2, ',', '.')}}</label>
                <label class="text-left" style="width: 15%; padding-left: 5px;">R$ {{number_format($peca->qtd * $peca->valor, 2, ',', '.')}}</label>
            </div>
            <?php $valorTotalPecas += $peca->qtd * $peca->valor ?>
            @endforeach
            <div class="form-group col-lg-12">
                <label class="text-right" style="color: #ffffff; font-size: 15px; background-color: #14406B; width: 78%; padding-right: 5px;">Total Peças</label>
                <label class="text-left" style="color: #ffffff; font-size: 15px; background-color: #14406B; width: 20%; padding-left: 5px;">R$ {{number_format($valorTotalPecas, 2, ',', '.')}}</label>
            </div>
            <div class="form-group col-lg-12">
                <label class="text-center" style="color: #ffffff; font-size: 15px; background-color: #14406B; width: 78%; padding-right: 5px;">Discriminação dos Serviços</label>
                <label class="text-center" style="color: #ffffff; font-size: 15px; background-color: #14406B; width: 20%; padding-left: 5px;">Valor</label>
            </div>
            <?php $valorTotalServicos = 0; ?>
            @foreach ($os['servicos'] as $servico)
            <div class="form-group col-lg-12">
                <label class="text-left" style="width: 78%; padding-left: 5px;">{{$servico->nome}}</label>
                <label class="text-left" style="width: 20%; padding-left: 5px;">R$ {{number_format($servico->valor, 2, ',', '.')}}</label>
            </div>
            <?php $valorTotalServicos += $servico->valor ?>
            @endforeach
            <div class="form-group col-lg-12">
                <label class="text-right" style="color: #ffffff; font-size: 15px; background-color: #14406B; width: 78%; padding-right: 5px;">Total Serviços</label>
                <label class="text-left" style="color: #ffffff; font-size: 15px; background-color: #14406B; width: 20%; padding-left: 5px;">R$ {{number_format($valorTotalServicos, 2, ',', '.')}}</label>
            </div>
            <div class="form-group col-lg-12">
                <label class="text-center" style="color: #ffffff; font-size: 15px; background-color: #404040; width: 20%;">Enviado por:</label>
                <label class="text-left" style="width: 38%;">Gabriel Rodrigues</label>
                <label class="text-center" style="color: #ffffff; font-size: 15px; background-color: #14406B; width: 20%;">Subtotal:</label>
                <label class="text-left" style="color: #ffffff; font-size: 15px; background-color: #14406B; width: 20%; padding-left: 3px;">R$ {{number_format($valorTotalServicos + $valorTotalPecas, 2, ',', '.')}}</label>
            </div>
            <div class="form-group col-lg-12">
                <label class="text-center" style="color: #ffffff; font-size: 15px; width: 20%;"></label>
                <label class="text-left" style="width: 38%;"></label>
                <label class="text-center" style="color: #ffffff; font-size: 15px; background-color: #14406B; width: 20%;">Desconto:</label>
                <label class="text-left" style="color: #ffffff; font-size: 15px; background-color: #14406B; width: 20%; padding-left: 3px;">R$ {{number_format(0, 2, ',', '.')}}</label>
            </div>
            <div class="form-group col-lg-12">
                <label class="text-center" style="color: #ffffff; font-size: 15px; background-color: #404040; width: 20%;">Autorizado por:</label>
                <label class="text-left" style="width: 38%;">Gabriel Rodrigues</label>
                <label class="text-center" style="color: #ffffff; font-size: 15px; background-color: #14406B; width: 20%;">Total:</label>
                <label class="text-left" style="color: #ffffff; font-size: 15px; background-color: #14406B; width: 20%; padding-left: 3px;">R$ <?= number_format($valorTotalServicos + $valorTotalPecas, 2, ',', '.') ?></label>
            </div>
        </div>
    </div>
</form>