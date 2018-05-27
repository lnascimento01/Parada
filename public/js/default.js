$(document).ready(function (e) {
    $('#txtPlaca').on('keydown', function () {
        var placa = $(this).val();
//        var x = event.which || event.keyCode;
//        var keyCode = (event.keyCode ? event.keyCode : event.which);
//        
//        if (keyCode == 189) {
//            event.preventDefault();
//        }
//        
//        if (placa.length == 3) {
//            $(this).val(placa + '-');
//        }
//        
        $('.description').html(placa);
    });
    $("#txtCep").mask("99999-999", {placeholder: " "});
    $('#btn-pecas').on('click', function () {
        var item = $('#peca').val();
        var qtd = $('#qtd').val();
        var idPeca = $('#peca').attr('id-peca');
        var valor = $('#peca').attr('valor');

        var inputCode = '<div class="form-group col-lg-12 peca">\n\
                    <label for="" class="col-sm-2 control-label"></label>\n\
                    <div class="col-lg-7">\n\
                    <input type="text" class="form-control border-input" id="itemPeca" readonly placeholder="Peça" id-peca="' + idPeca + '" custo="' + valor + '" value="' + item + '">\n\
                    </div>\n\
                    <div class="col-lg-2">\n\
                    <input type="text" class="form-control border-input valor" data-thousands="." data-decimal="," id="valorPeca" value="' + valor + '">\n\
                    </div>\n\
                    <div class="col-lg-1">\n\
                    <input type="text" class="form-control border-input" id="itemQtd" readonly value="' + qtd + '">\n\
                    </div>\n\
                    <div class="col-lg-2">\n\
                    <span class="rm-item btn btn-danger"><i class="glyphicon glyphicon-remove danger"  style="text-align: center;"></i></span>\n\
                    </div></div>';

        $('.lista-pecas').append(inputCode);
        $('.rm-item').on('click', function () {
            $(this).parents('div.peca').remove();
        });
        $('#peca').val('');
        $('#qtd').val('0');
    });
    $('#btn-servicos').on('click', function () {
        var item = $('#servico').val();
        var idServico = $('#servico').attr('id-servico');
        var valor = $('#servico').attr('valor');

        var inputCode = '<div class="form-group col-lg-12 servico">\n\
                    <label for="" class="col-sm-2 control-label"></label>\n\
                    <div class="col-lg-7">\n\
                    <input type="text" class="form-control border-input" id="itemServico" readonly placeholder="Serviço" custo="' + valor + '" id-servico="' + idServico + '" value="' + item + '">\n\
                    </div>\n\
                    <div class="col-lg-2">\n\
                    <input type="text" class="form-control border-input valor" data-thousands="." data-decimal="," id="valorServico" value="' + valor + '">\n\
                    </div>\n\
                    <div class="col-lg-2">\n\
                    <span class="rm-item btn btn-danger"><i class="glyphicon glyphicon-remove danger"  style="text-align: center;"></i></span>\n\
                    </div></div>';
        $('.lista-servicos').append(inputCode);
        $('.rm-item').on('click', function () {
            $(this).parents('div.servico').remove();
        });
        $('#servico').val('');
    });

    $('#btn-salvar-os').on('click', function () {
        var servicos = {};
        var pecas = {};
        var _token = $("input[name='_token']").val();
        $('.servico').each(function (i) {
            servicos[i] = {id: $(this).find('#itemServico').attr('id-servico'), nome: $(this).find('#itemServico').val(), valor: $(this).find('#itemServico').attr('custo')};
        });
        $('.peca').each(function (i) {
            pecas[i] = {id: $(this).find('#itemPeca').attr('id-peca'), nome: $(this).find('#itemPeca').val(), qtd: $('#itemQtd').val(), valor: $(this).find('#itemPeca').attr('custo')};
        });
        var data = {os: {idCliente: $('#txtCliente').attr('idCliente'), idVeiculo: $('#txtVeiculo').attr('idVeiculo'), placa: $('#txtPlaca').val(), tp: $('#txtTp').val(),
                km: $('#txtKm').val(), complemento: $('#txtComplemento').text()},
            listaServicos: servicos,
            listaPecas: pecas, _token: _token};

        $.ajax({
            url: "/os/save",
            type: 'POST',
            data: data,
            success: function (result) {
                if (result == true) {
                    $('.form-horizontal')[0].reset();
                    BootstrapDialog.alert('Os Salva Com Sucesso!', 'Sucesso!', "Null", 'Success');
                }
            }});
    });
    $('#btn-salvar-cliente, #btn-editar-cliente').on('click', function () {
        var _token = $("input[name='_token']").val();
        var campo = $(this);

        var data = {nome: $('#txtCliente').val(), cpf_cnpj: $('#txtCpfCnpj').val(), email: $('#txtEmail').val(), cep: $('#txtCep').val(), endereco: $('#txtEndereco').val(), numero: $('#txtNumero').val(),
            complemento: $('#txtComplemento').val(), bairro: $('#txtBairro').val(), cidade: $('#txtCidade').val(), uf: $('#txtUf').val(), CRUD: campo.attr('CRUD'), id: campo.attr('idCliente'), _token: _token};
        var url = '/clientes/save';

        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function (result) {
                if (result == true) {
                    $('.form-horizontal')[0].reset();
                    if (campo.attr('CRUD') == 1) {
                        BootstrapDialog.alert('Cliente Salvo Com Sucesso!', 'Sucesso!', "Null", 'Success');
                    } else if (campo.attr('CRUD') == 2) {
                        BootstrapDialog.alert('Cliente Atualizado Com Sucesso!', 'Sucesso!', "Null", 'Success');
                    } else {
                        BootstrapDialog.alert('Cliente deletado Com Sucesso!', 'Sucesso!', "Null", 'Success');
                    }
                }
            }});
    });

    $('#btn-salvar-peca, #btn-editar-peca').on('click', function () {
        var _token = $("input[name='_token']").val();
        var campo = $(this);

        var data = {nome: $('#txtPeca').val(), valor: $('#txtValor').val(), CRUD: campo.attr('CRUD'), _token: _token};
        var url = '/pecas/save';

        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function (result) {
                if (result == true) {
                    $('.form-horizontal')[0].reset();
                    if (campo.attr('CRUD') == 1) {
                        BootstrapDialog.alert('Peça cadastrada com Sucesso!', 'Sucesso!', "Null", 'Success');
                    } else if (campo.attr('CRUD') == 2) {
                        BootstrapDialog.alert('Peça Atualizado Com Sucesso!', 'Sucesso!', "Null", 'Success');
                    } else {
                        BootstrapDialog.alert('Peça deletado Com Sucesso!', 'Sucesso!', "Null", 'Success');
                    }
                }
            }});
    });

    $('.btn-del-cliente').on('click', function () {
        var _token = $("input[name='_token']").val();
        var campo = $(this);
        var data = {id: campo.attr('id'), CRUD: campo.attr('CRUD'), _token: _token};
        var url = '/clientes/del';

        BootstrapDialog.confirm('<p>Deseja realmenete deletar o cliente?', function (result) {
            if (result) {
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: data,
                    success: function (result) {
                        if (result == true) {
                            $('#tr-cliente-' + campo.attr('id')).remove();
                            BootstrapDialog.alert('Cliente deletado Com Sucesso!', 'Sucesso!', "Null", 'Success');
                        }
                    }});
            }
        }, 'danger');
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

    //Tabelas responsivas
    $('.filterable .btn-filter').click(function () {
        var $panel = $(this).parents('.filterable'),
                $filters = $panel.find('.filters input'),
                $tbody = $panel.find('.table tbody');
        if ($filters.prop('disabled') == true) {
            $filters.prop('disabled', false);
            $filters.first().focus();
        } else {
            $filters.val('').prop('disabled', true);
            $tbody.find('.no-result').remove();
            $tbody.find('tr').show();
        }
    });

    $('.filterable .filters input').keyup(function (e) {
        /* Ignore tab key */
        var code = e.keyCode || e.which;
        if (code == '9')
            return;
        /* Useful DOM data and selectors */
        var $input = $(this),
                inputContent = $input.val().toLowerCase(),
                $panel = $input.parents('.filterable'),
                column = $panel.find('.filters th').index($input.parents('th')),
                $table = $panel.find('.table'),
                $rows = $table.find('tbody tr');
        /* Dirtiest filter function ever ;) */
        var $filteredRows = $rows.filter(function () {
            var value = $(this).find('td').eq(column).text().toLowerCase();
            return value.indexOf(inputContent) === -1;
        });
        /* Clean previous no-result if exist */
        $table.find('tbody .no-result').remove();
        /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
        $rows.show();
        $filteredRows.hide();
        /* Prepend no-result row if all rows are filtered */
        if ($filteredRows.length === $rows.length) {
            $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="' + $table.find('.filters th').length + '">No result found</td></tr>'));
        }
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
