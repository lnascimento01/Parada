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
                    <legend style="padding: 10px; text-align: center;">{{ $cliente->nome }}</legend>
                    <div class="form-group">
                        <label for="rateio" class="col-lg-2 control-label" onblur="">CPF: </label>
                        <div class="col-lg-4 text-left" id="" style="float: left; display:table;">
                            <input type="text" value="{{$cliente->cpf_cnpj}}" id="txtCpfCnpj">
                        </div>
                        <label for="rateio" class="col-lg-1 control-label" onblur="">EMAIL: </label>
                        <div class="col-lg-5 text-left" id="" style="float: left; display:table;">
                            <input type="text" value="{{$cliente->email}}" id="txtEmail">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rateio" class="col-lg-2 control-label" onblur="">CEP: </label>
                        <div class="col-lg-2 text-left" id="" style="float: left; display:table;">
                            <input type="text" value="{{$cliente->cep}}" id="txtCep">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rateio" class="col-lg-2 control-label" onblur="">ENDEREÇO: </label>
                        <div class="col-lg-4 text-left" id="" style="float: left; display:table;">
                            <input type="text" value="{{$cliente->endereco}}" id="txtEndereco">
                        </div>
                        <label for="rateio" class="col-lg-1 control-label" onblur="">Nº: </label>
                        <div class="col-lg-2 text-left" id="" style="float: left; display:table;">
                            <input type="text" value="{{$cliente->numero}}" id="txtNumero">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rateio" class="col-lg-2 control-label" onblur="">COMPLEMENTO: </label>
                        <div class="col-lg-4 text-left" id="" style="float: left; display:table;">
                            <input type="text" value="{{$cliente->complemento}}" id="txtComplemento">
                        </div>
                        <label for="rateio" class="col-lg-1 control-label" onblur="">BAIRRO: </label>
                        <div class="col-lg-5 text-left" id="" style="float: left; display:table;">
                            <input type="text" value="{{$cliente->bairro}}" id="txtBairro">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rateio" class="col-lg-2 control-label" onblur="">CIDADE: </label>
                        <div class="col-lg-4 text-left" id="" style="float: left; display:table;">
                            <input type="text" value="{{$cliente->cidade}}" id="txtCidade">
                        </div>
                        <label for="rateio" class="col-lg-1 control-label" onblur="">UF: </label>
                        <div class="col-lg-1 text-left" id="" style="float: left; display:table;">
                            <input type="text" value="{{$cliente->uf}}" id="txtUf">
                        </div>
                    </div>
                    <div class="form-group col-lg-10">
                        <div class="col-lg-3"  style="float: right;">
                            <a href="#" class="col-lg-6 btn btn-success" id="btn-editar-cliente" idCliente="{{$cliente->id}}" CRUD="2"><i class="fa fa-save primary"  style="text-align: center;"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>