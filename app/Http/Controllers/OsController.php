<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\ListaOs;
use App\Models\Menu;
use App\Models\Peca;
use App\Models\Servico;
use App\Models\VeiculosModelo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use function view;

class OsController extends Controller {

    public function index(Menu $menus, Cliente $cliente, Servico $servico, Peca $peca, VeiculosModelo $carro, ListaOs $listaOs) {
        Mail::send('emailwelcome', ['key' => 'value'], function($message) {
            $message->to('zeus.com@gmail.com', 'John Smith')->subject('Welcome!');
        });
        $company = 'Parada 351';

        $clientes = $cliente->all()->toArray();

        $servicos = $servico->all()->toArray();

        $pecas = $peca->all()->toArray();

        $carros = $carro->all()->toArray();

        $listas = $this->autocomplete($clientes, $servicos, $pecas, $carros);

        $listagemOs = DB::table('lista_os')->join('veiculos_modelos', 'lista_os.id_veiculo', '=', 'veiculos_modelos.id')
                        ->join('clientes', 'lista_os.id_cliente', '=', 'clientes.id')
                        ->select('lista_os.id', 'clientes.nome', 'lista_os.placa', 'veiculos_modelos.modelo', 'lista_os.status')->orderBy('id', 'desc')->get();

        return view('os', ['listaMenus' => $menus->all(), 'clientes' => json_encode($listas['clientes']), 'servicos' => json_encode($listas['servicos']),
            'pecas' => json_encode($listas['pecas']), 'carros' => json_encode($listas['carros']), 'ativo' => 2, 'listaOs' => $listagemOs]);
    }

    public function autocomplete($clientes, $servicos, $pecas, $carros) {

        $autocomplete = [];

        foreach ($carros as $carro) {
            $autocomplete['carros'][] = array('label' => $carro['modelo'], 'value' => $carro['modelo'], 'id' => $carro['id']);
        }

        foreach ($clientes as $cliente) {
            $autocomplete['clientes'][] = array('label' => $cliente['nome'], 'value' => $cliente['nome'], 'id' => $cliente['id']);
        }

        foreach ($servicos as $servico) {
            $autocomplete['servicos'][] = array('label' => $servico['nome'], 'value' => $servico['nome'], 'id' => $servico['id'], 'valor' => $servico['valor']);
        }

        foreach ($pecas as $peca) {
            $autocomplete['pecas'][] = array('value', $peca['nome'], 'label' => $peca['nome'], 'id' => $peca['id'], 'valor' => $peca['valor']);
        }
        return $autocomplete;
    }

    public function salvar(Request $request) {

        $idOs = DB::table('lista_os')->insertGetId(
                ['id_cliente' => $request['os']['idCliente'],
                    'id_veiculo' => $request['os']['idVeiculo'],
                    'placa' => $request['os']['placa'],
                    'tp' => $request['os']['tp'],
                    'km' => $request['os']['km'],
                    'complemento' => $request['os']['complemento']]
        );

        foreach ($request['listaPecas'] as $peca) {

            DB::table('lista_os_pecas')->insert(
                    ['id_lista_os' => $idOs,
                        'id_peca' => $peca['id'],
                        'qtd' => $peca['qtd'],
                        'valor' => $peca['valor']
            ]);
        }

        foreach ($request['listaServicos'] as $servico) {

            DB::table('lista_os_servicos')->insert(
                    ['id_servico' => $servico['id'],
                        'id_lista_os' => $idOs,
                        'valor' => $servico['valor']
            ]);
        }
        return '1';
    }

}
