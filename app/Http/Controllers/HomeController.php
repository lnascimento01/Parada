<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\ListaOs;
use App\Models\Menu;
use function view;

class HomeController extends Controller {

    public function index(Menu $menus, ListaOs $listaOs, Cliente $cliente) {

        $nOs = count($listaOs->all());
        $nOsAtiva = ListaOs::where('status', '=', 1)->count();
        $nClientes = count($cliente->all());
                
        return view('index', ['listaMenus' => $menus->all(), 'nOs' => $nOs, 'nOsAtiva' => $nOsAtiva,  'nClientes' => $nClientes, 'ativo' => 1]);
    }

}
