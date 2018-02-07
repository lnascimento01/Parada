<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Menu;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;
use function view;

class ClientesController extends Controller {

    public function index(Menu $menus, Cliente $cliente) {

        $company = 'Parada 351';

        $clientes = $cliente->all();

        return view('clientes', ['listaMenus' => $menus->all(), 'clientes' => $clientes, 'ativo' => 3]);
    }

    public function salvar(Request $request) {

        if ($request['CRUD'] == 1) {
            DB::table('clientes')->insert(
                    ['nome' => $request['nome'],
                        'cpf_cnpj' => $request['cpf_cnpj'],
                        'email' => $request['email'],
                        'cep' => $request['cep'],
                        'endereco' => $request['endereco'],
                        'numero' => $request['numero'],
                        'complemento' => $request['complemento'],
                        'bairro' => $request['bairro'],
                        'cidade' => $request['cidade'],
                        'uf' => $request['uf']]);
        } else if ($request['CRUD'] == 2) {
            DB::table('clientes')->where('id', '=', $request['id'])->update(
                    ['cpf_cnpj' => $request['cpf_cnpj'],
                        'email' => $request['email'],
                        'cep' => $request['cep'],
                        'endereco' => $request['endereco'],
                        'numero' => $request['numero'],
                        'complemento' => $request['complemento'],
                        'bairro' => $request['bairro'],
                        'cidade' => $request['cidade'],
                        'uf' => $request['uf']]);
        }

        return 1;
    }

    public function deletar(Request $request) {
        $id = $request->id;


        DB::table('clientes')->where('id', '=', $id)->delete();

        return 1;
    }

}
