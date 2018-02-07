$(document).ready(function () {
    $('#txtPlaca').on('keyup', function () {
        $('.description').html($('#txtPlaca').val());
    });

    $("#txtCep").mask("99999-999", {placeholder: " "});

    $('#btn-pecas').on('click', function () {

        var inputCode = '<div class="form-group col-lg-12 peca">\n\
                    <label for="" class="col-sm-2 control-label"></label>\n\
                    <div class="col-lg-7">\n\
                    <input type="text" class="form-control border-input" id="itemPeca" readonly placeholder="Peça" id-peca="idPeca" value="itemInput">\n\
                    </div>\n\
                    <div class="col-lg-1">\n\
                    <input type="text" class="form-control border-input" id="itemQtd" readonly value="qtdVal">\n\
                    </div>\n\
                    <div class="col-lg-2">\n\
                    <span class="rm-item btn btn-danger"><i class="glyphicon glyphicon-remove danger"  style="text-align: center;"></i></span>\n\
                    </div></div>';

        var item = $('#peca').val();
        var qtd = $('#qtd').val();
        var idPeca = $('#peca').attr('id-peca');

        $('.lista-pecas').append(inputCode.replace('itemInput', item).replace('qtdVal', qtd).replace('idPeca', idPeca));
        $('.rm-item').on('click', function () {
            $(this).parents('div.peca').remove();
        });

        $('#peca').val('');
        $('#qtd').val('0');
    });

    $('#btn-servicos').on('click', function () {

        var inputCode = '<div class="form-group col-lg-12 servico">\n\
                    <label for="" class="col-sm-2 control-label"></label>\n\
                    <div class="col-lg-7">\n\
                    <input type="text" class="form-control border-input" id="itemServico" readonly placeholder="Serviço" id-servico="idServico" value="itemInput">\n\
                    </div>\n\
                    <div class="col-lg-2">\n\
                    <span class="rm-item btn btn-danger"><i class="glyphicon glyphicon-remove danger"  style="text-align: center;"></i></span>\n\
                    </div></div>';

        var item = $('#servico').val();
        var idServico = $('#servico').attr('id-servico');

        $('.lista-servicos').append(inputCode.replace('itemInput', item).replace('idServico', idServico));
        $('.rm-item').on('click', function () {
            $(this).parents('div.servico').remove();
        });

        $('#servico').val('');
    });

    $('#btn-salvar-os').on('click', function () {
        var servicos = {};
        var pecas = {};

        $('.servico').each(function (i) {
            servicos[i] = {id: $(this).find('#itemServico').attr('id-servico'), nome: $(this).find('#itemServico').val()};
        });

        $('.peca').each(function (i) {
            pecas[i] = {id: $(this).find('#itemPeca').attr('id-peca'), nome: $(this).find('#itemPeca').val(), qtd: $('#itemQtd').val()};
        });

        var data = {os: {idCliente: $('#txtCliente').val(), idVeiculo: $('#txtVeiculo').val(), placa: $('#txtPlaca').val(), tp: $('#txtTp').val(), km: $('#txtKm').val(), complemento: $('#txtComplemento').val()},
            listaServicos: servicos,
            listaPecas: pecas};

        $.post('/os', data, function (response) {
            $('.form-horizontal')[0].reset();
            $('.lista-servicos').html('');
            $('.lista-pecas').html('');
            if (response == true) {
                BootstrapDialog.alert('Os Salva Com Sucesso!', 'Sucesso!', "Null", 'Success');
            }
        });
    });

    $('#btn-salvar-cliente').on('click', function () {

        var data = {nome: $('#txtCliente').val(), cpf_cnpj: $('#txtCpfCnpj').val(), email: $('#txtEmail').val(), cep: $('#txtCep').val(), endereco: $('#txtEndereco').val(), numero: $('#txtNumero').val(),
            complemento: $('#txtComplemento').val(), bairro: $('#txtBairro').val(), cidade: $('#txtCidade').val(), uf: $('#txtUf').val()};

        $.post('/cliente', data, function (response) {
            $('.form-horizontal')[0].reset();
            if (response == true) {
                BootstrapDialog.alert('Registro Salvo Com Sucesso!', 'Sucesso!', "Null", 'Success');
            }
        });
    });

    $("#btn-modal").on('click', function () {
        BootstrapDialog.show({
            title: 'Forma de Pagamento',
            message: $('<div></div>').load('os/modal')
        });
    });

    $("#txtCpfCnpj").on('keydown', function (e) {
        var digit = e.key.replace(/\D/g, '');

        var value = $(this).val().replace(/\D/g, '');

        var size = value.concat(digit).length;

        $(this).mask((size <= 11) ? '000.000.000-00' : '00.000.000/0000-00');
    });

    //Quando o campo cep perde o foco.
    $('#txtCep').on('focusout', function () {
//        $('#loading_cep').show();
        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');
        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;
            //Valida o formato do CEP.
            if (validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                $("#txtEndereco").val("...");
                //Consulta o webservice viacep.com.br/
                $.getJSON("//viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {

                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $("#txtBairro").val(dados.bairro);
                        $("#txtEndereco").val(dados.logradouro);
                        $("#txtCidade").val(dados.localidade);
                        $("#txtUf").val(dados.uf);
                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        limpa_formulario_cep();
                        BootstrapDialog.alert('CEP não encontrado.!', 'Alerta', "Null", 'danger');
                    }
                });
            } //end if.
            else {
                //cep é inválido.
                limpa_formulario_cep();
                BootstrapDialog.alert('Formato de CEP inválido!', 'Alerta', "Null", 'danger');
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulario_cep();
        }
//        $('#loading_cep').hide();
    });
    function limpa_formulario_cep() {
        $("#txtBairro").val('');
        $("#txtEndereco").val('');
        $("#txtCidade").val('');
        $("#txtUf").val('');
    }

    $('.star').on('click', function () {
        $(this).toggleClass('star-checked');
    });

    $('.ckbox label').on('click', function () {
        $(this).parents('tr').toggleClass('selected');
    });

    $('.btn-filter').on('click', function () {
        var $target = $(this).data('target');
        if ($target != 'all') {
            $('.table tr').css('display', 'none');
            $('.table tr[data-status="' + $target + '"]').fadeIn('slow');
        } else {
            $('.table tr').css('display', 'none').fadeIn('slow');
        }
    });

});
