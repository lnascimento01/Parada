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
            <div id="viewPeca">
                <div class="col-lg-12">
                    <legend style="padding: 10px; text-align: center;" id="txtpeca">{{ $peca->nome }}</legend>
                    <div class="form-group">
                        <label for="rateio" class="col-lg-2 control-label" onblur="">Nome: </label>
                        <div class="col-lg-6 text-left" id="" style="float: left; display:table;">
                            <span for="rateio" onblur="">{{$peca->nome}}</span>
                        </div>
                        <label for="rateio" class="col-lg-1 control-label" onblur="">R$ </label>
                        <div class="col-lg-2 text-left" id="" style="float: left; display:table;">
                            <span or="rateio" onblur="">{{number_format($peca->valor, 2, ',', '.')}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>