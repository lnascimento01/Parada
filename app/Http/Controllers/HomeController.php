<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\ListaOs;
use App\Models\Menu;
use Illuminate\Support\Facades\DB;
use function view;

class HomeController extends Controller {

    public function index(Menu $menus, ListaOs $listaOs, Cliente $cliente) {

        $nOs = count($listaOs->all());
        $nOscancelada = ListaOs::where('status', '=', 0)->count();
        $nOsAndamento = ListaOs::where('status', '=', 1)->count();
        $nOsFinalizada = ListaOs::where('status', '=', 2)->count();
        $nClientes = count($cliente->all());
        $listagemOs = DB::table('lista_os')->join('veiculos_modelos', 'lista_os.id_veiculo', '=', 'veiculos_modelos.id')
                            ->join('clientes', 'lista_os.id_cliente', '=', 'clientes.id')
                            ->select('lista_os.id', 'clientes.nome', 'lista_os.placa', 'veiculos_modelos.modelo', 'lista_os.status')->orderBy('lista_os.id', 'desc')->get();
                
        $listaMenus = DB::table('menus')
                            ->select('id', 'nome', 'url', 'icone')
                            ->where('status', '=', 1)->orderBy('id', 'asc')->get();
                
        return view('index', ['listaMenus' => $listaMenus, 'nOs' => $nOs, 'nOscancelada' => $nOscancelada,  'nOsAndamento' => $nOsAndamento,  'nOsFinalizada' => $nOsFinalizada,  'nClientes' => $nClientes, 'ativo' => 1, 'listaOs' => $listagemOs]);
    }

}
