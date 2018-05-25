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
            <div id="viewpeca">
                <div class="col-lg-12">
                    <legend style="padding: 10px; text-align: center;">{{ $peca->nome }}</legend>
                    <div class="form-group">
                        <label for="rateio" class="col-lg-2 control-label" onblur="">Nome: </label>
                        <div class="col-lg-4 text-left" id="" style="float: left; display:table;">
                            <input type="text" value="{{$peca->nome}}" id="txtNome">
                        </div>
                        <label for="rateio" class="col-lg-1 control-label" onblur="">R$ </label>
                        <div class="col-lg-5 text-left" id="" style="float: left; display:table;">
                            <input type="text" class="valor"  data-thousands="." data-decimal="," value="{{number_format($peca->valor, 2, ',', '.')}}" id="txtValor">
                        </div>
                    </div>
                    <div class="form-group col-lg-10">
                        <div class="col-lg-3"  style="float: right;">
                            <a href="#" class="col-lg-6 btn btn-success" id="btn-editar-peca" idpeca="{{$peca->id}}" CRUD="2"><i class="fa fa-save primary"  style="text-align: center;"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
$(document).ready(function() {
$('.valor').maskMoney();
});
</script>