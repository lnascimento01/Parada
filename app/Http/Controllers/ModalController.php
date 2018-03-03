<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\ListaOs;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;
use function view;

class ModalController extends Controller {

    public function viewCliente(Request $request, Cliente $cliente) {

        $clientes = Cliente::where('id', '=', $request['id'])->first();

        return view('modalClientesView', ['cliente' => $clientes, 'ativo' => 3]);
    }

    public function editCliente(Request $request, Cliente $cliente) {

        $clientes = Cliente::where('id', '=', $request['id'])->first();

        return view('modalClientesEdit', ['cliente' => $clientes, 'ativo' => 3]);
    }

    public function viewOs(Request $request, ListaOs $listaOs) {

        $listagemOs['ordem'] = DB::table('lista_os')->join('veiculos_modelos', 'lista_os.id_veiculo', '=', 'veiculos_modelos.id')
                        ->join('clientes', 'lista_os.id_cliente', '=', 'clientes.id')
                        ->select('lista_os.id', 'clientes.nome', 'lista_os.placa', 'lista_os.tp', 'lista_os.km', 'veiculos_modelos.modelo', 'lista_os.data_cadastro', 'lista_os.status')
                        ->where('lista_os.id', '=', $request['id'])->orderBy('id', 'desc')->first();

        $listagemOs['servicos'] = DB::table('lista_os_servicos')->join('servicos', 'lista_os_servicos.id_servico', '=', 'servicos.id')
                        ->select('servicos.nome', 'lista_os_servicos.valor')
                        ->where('lista_os_servicos.id_lista_os', '=', $listagemOs['ordem']->id)->orderBy('servicos.nome', 'asc')->get();

        $listagemOs['pecas'] = DB::table('lista_os_pecas')->join('pecas', 'lista_os_pecas.id_peca', '=', 'pecas.id')
                        ->select('lista_os_pecas.qtd', 'pecas.id', 'pecas.nome', 'lista_os_pecas.valor')
                        ->where('lista_os_pecas.id_lista_os', '=', $listagemOs['ordem']->id)->orderBy('pecas.nome', 'asc')->get();

        return view('modalOsView', ['os' => $listagemOs, 'ativo' => 3]);
    }

    public function editOs(Request $request, Cliente $cliente) {

        $clientes = Cliente::where('id', '=', $request['id'])->first();

        return view('modalOsEdit', ['cliente' => $clientes, 'ativo' => 3]);
    }

}
