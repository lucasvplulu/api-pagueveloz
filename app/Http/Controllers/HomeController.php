<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PagueVeloz\PagueVeloz;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function  create(Request $request)
    {
        $inputs = $request->all();

        $data_preg = str_replace('/' , '-' , $inputs['vencimento']);
        $data = date('Y-m-d', strtotime($data_preg));
        $valor = str_replace(',', '.', $inputs['valor']);

        PagueVeloz::Url('https://sandbox.pagueveloz.com.br/api');
        $boleto = PagueVeloz::Boleto();
        $boleto->auth->setEmail('lucas.vinicius3@icloud.com')
            ->setToken('162ea9c3-57e2-4a70-a3a1-1a854a4b53dc')
            ->setSenha('LucasL23');

        $boleto->dto
            ->setValor($valor)
            ->setVencimento($data)
            ->setSacado($inputs['sacado'])
            ->setSeuNumero($inputs['seu_numero'])
            ->setCPFCNPJSacado($inputs['cnpj_cpf'])
            ->setParcela($inputs['parcela']);

        try{
            $boleto->Post();
            Session::flash('criar-success', 'Boleto criado com sucesso!');
        }
        catch (\Exception $e){
            Session::flash('criar-danger', 'Não foi possível criar o boleto!');
        }

        return redirect('/#emissao');

    }
    public function  consultar($id)
    {

        PagueVeloz::Url('https://sandbox.pagueveloz.com.br/api');
        $boleto = PagueVeloz::Boleto();
        $boleto->auth->setEmail('integracao+lucas.vinicius3@icloud.com')
            ->setToken('3797d952-3a59-4c50-bb02-dba7701fbf0d')
            ->setSenha('LucasL23');

        $boleto->GetById($id);
        $resposta_consulta = json_decode($boleto->request);


        return view('consulta-boleto', compact('resposta_consulta'));

    }

    public function delete(Request $request)
    {
        $inputs = $request->all();
        PagueVeloz::Url('https://sandbox.pagueveloz.com.br/api');
        $boleto = PagueVeloz::Boleto();
        $boleto->auth->setEmail('lucas.vinicius3@icloud.com')
            ->setToken('162ea9c3-57e2-4a70-a3a1-1a854a4b53dc')
            ->setSenha('LucasL23');

        $boleto->GetById($inputs['busca_delete']);
        $verifica = json_decode($boleto->request);

        if($verifica){
            $id = $verifica[0]->Id;
            $boleto->Delete($id);

            Session::flash('success', 'Boleto apagado com sucesso!');
        }
        else {
            Session::flash('danger', 'Boleto não encontrado!');
        }
        return redirect('/#cancelamento');

    }
}
