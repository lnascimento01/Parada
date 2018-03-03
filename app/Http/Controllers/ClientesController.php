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
        $listagemOs = $this->montaOs(0);
                $listaMenus = DB::table('menus')
                            ->select('id', 'nome', 'url', 'icone')
                            ->where('status', '=', 1)->orderBy('id', 'asc')->get();
        
        return view('clientes', ['listaMenus' => $listaMenus, 'clientes' => $clientes, 'ativo' => 3, 'listaOs' => $listagemOs]);
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

    public function montaOs($id) {



        if ($id == 0) {
            $listagemOs = DB::table('lista_os')->join('veiculos_modelos', 'lista_os.id_veiculo', '=', 'veiculos_modelos.id')
                            ->join('clientes', 'lista_os.id_cliente', '=', 'clientes.id')
                            ->select('lista_os.id', 'clientes.nome', 'lista_os.placa', 'veiculos_modelos.modelo', 'lista_os.status')->orderBy('lista_os.id', 'desc')->get();
        } else {
            $listagemOs['ordem'] = DB::table('lista_os')->join('veiculos_modelos', 'lista_os.id_veiculo', '=', 'veiculos_modelos.id')
                            ->join('clientes', 'lista_os.id_cliente', '=', 'clientes.id')
                            ->select('lista_os.id', 'clientes.nome', 'lista_os.placa', 'lista_os.tp', 'lista_os.km', 'veiculos_modelos.modelo', 'lista_os.data_cadastro', 'lista_os.status')
                            ->where('lista_os.id', '=', $id)->orderBy('id', 'desc')->first();

            $listagemOs['servicos'] = DB::table('lista_os_servicos')->join('servicos', 'lista_os_servicos.id_servico', '=', 'servicos.id')
                            ->select('servicos.nome', 'lista_os_servicos.valor')
                            ->where('lista_os_servicos.id_lista_os', '=', $listagemOs['ordem']->id)->orderBy('servicos.nome', 'asc')->get();

            $listagemOs['pecas'] = DB::table('lista_os_pecas')->join('pecas', 'lista_os_pecas.id_peca', '=', 'pecas.id')
                            ->select('lista_os_pecas.qtd', 'pecas.id', 'pecas.nome', 'lista_os_pecas.valor')
                            ->where('lista_os_pecas.id_lista_os', '=', $listagemOs['ordem']->id)->orderBy('pecas.nome', 'asc')->get();
        }

        return $listagemOs;
    }

}
