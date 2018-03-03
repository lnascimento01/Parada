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
use function base_path;
use function view;

class OsController extends Controller {

    public function index(Menu $menus, Cliente $cliente, Servico $servico, Peca $peca, VeiculosModelo $carro, ListaOs $listaOs) {

        $company = 'Parada 351';

        $clientes = $cliente->all()->toArray();

        $servicos = $servico->all()->toArray();

        $pecas = $peca->all()->toArray();

        $carros = $carro->all()->toArray();

        $listas = $this->autocomplete($clientes, $servicos, $pecas, $carros);

        $listaMenus = DB::table('menus')
                            ->select('id', 'nome', 'url', 'icone')
                            ->where('status', '=', 1)->orderBy('id', 'asc')->get();
        
        $listagemOs = $this->montaOs(0);

        return view('os', ['listaMenus' => $listaMenus, 'clientes' => json_encode($listas['clientes']), 'servicos' => json_encode($listas['servicos']),
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

    public function geraPdf() {
        $os = $this->montaOs($_POST['id']);
        $pdf = \PDF::loadView('osPdf', array('os' => $os));

        $pdf->setPaper('a4', 'portrait')->save(base_path() . "/public/upload/orcamento-" . $_POST['id'] . ".pdf")->stream('download.pdf');

       return $this->email($_POST['id']);
    }

    public function email($idOs) {
        $data = array(
            'name' => "Orçamento - Nº" . $idOs,
        );

        Mail::send('emailwelcome', $data, function ($message) {

            $message->from('zeus.com@gmail.com', 'Parada 351');

            $message->to('zeus.com@gmail.com')->subject("Orçamento - Nº 16");
//            $message->to('gabrielfroes01@gmail.com')->subject("Orçamento - Nº 16");
            
            $message->attach(base_path() . "/public/upload/orcamento-16.pdf");
        });

        return "true";
    }

}
