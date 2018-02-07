<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
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

        $os = ListaOs::where('id', '=', $request['id'])->first();

        return view('modalClientesView', ['cliente' => $clientes, 'ativo' => 3]);
    }
  
    public function editOs(Request $request, Cliente $cliente) {

        $clientes = Cliente::where('id', '=', $request['id'])->first();

        return view('modalClientesEdit', ['cliente' => $clientes, 'ativo' => 3]);
    }

}
