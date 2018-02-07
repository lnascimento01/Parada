<style>
    .modal-dialog {
        width: 70%;
    }

    span {
        display:table-cell;
        vertical-align:middle;
    }
</style>
<form class="form-horizontal">
    <div id="pedidoEspera" class="loading">
        <div class="panel-body">
            <div id="viewCliente">
                <div class="col-lg-12">
                    <legend style="padding: 10px; text-align: center;" id="txtCliente">{{ $cliente->nome }}</legend>
                    <div class="form-group">
                        <label for="rateio" class="col-lg-2 control-label" onblur="">CPF: </label>
                        <div class="col-lg-4 text-left" id="" style="float: left; display:table;">
                            <span for="rateio" onblur="">{{$cliente->cpf_cnpj}}</span>
                        </div>
                        <label for="rateio" class="col-lg-1 control-label" onblur="">EMAIL: </label>
                        <div class="col-lg-5 text-left" id="" style="float: left; display:table;">
                            <span or="rateio" onblur="">{{$cliente->email}}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rateio" class="col-lg-2 control-label" onblur="">CEP: </label>
                        <div class="col-lg-2 text-left" id="" style="float: left; display:table;">
                            <span for="rateio" onblur="">{{$cliente->cep}}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rateio" class="col-lg-2 control-label" onblur="">ENDEREÇO: </label>
                        <div class="col-lg-4 text-left" id="" style="float: left; display:table;">
                            <span for="rateio" onblur="">{{$cliente->endereco}}</span>
                        </div>
                        <label for="rateio" class="col-lg-1 control-label" onblur="">Nº: </label>
                        <div class="col-lg-2 text-left" id="" style="float: left; display:table;">
                            <span for="rateio" onblur="">{{$cliente->numero}}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rateio" class="col-lg-2 control-label" onblur="">COMPLEMENTO: </label>
                        <div class="col-lg-4 text-left" id="" style="float: left; display:table;">
                            <span for="rateio" onblur="">{{$cliente->complemento}}</span>
                        </div>
                        <label for="rateio" class="col-lg-1 control-label" onblur="">BAIRRO: </label>
                        <div class="col-lg-5 text-left" id="" style="float: left; display:table;">
                            <span for="rateio" onblur="">{{$cliente->bairro}}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rateio" class="col-lg-2 control-label" onblur="">CIDADE: </label>
                        <div class="col-lg-4 text-left" id="" style="float: left; display:table;">
                            <span for="rateio" onblur="">{{$cliente->cidade}}</span>
                        </div>
                        <label for="rateio" class="col-lg-1 control-label" onblur="">UF: </label>
                        <div class="col-lg-1 text-left" id="" style="float: left; display:table;">
                            <span for="rateio" onblur="">{{$cliente->uf}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>