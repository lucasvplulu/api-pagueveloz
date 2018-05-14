@extends('layouts.site.base')
@section('content')
    <div class="container container-consulta">
            <div class="row">
                <div class="input-field col l3 s12">
                    <input disabled  id="id_bol" name="id_bol" type="text" class="validate" value="{{$resposta_consulta[0]->Id}}" readonly>
                    <label for="id_bol">ID Boleto</label>
                </div>
            <div class="input-field col l3 s12">
                <input disabled  id="seu_numero" name="seu_numero" type="text" class="validate" value="{{$resposta_consulta[0]->Id}}" readonly>
                <label for="seu_numero">Seu Número</label>
            </div>
            <div class="input-field col l3 s12">
                <input disabled  id="sacado" name="sacado" type="text" class="validate" value="{{$resposta_consulta[0]->Sacado}}" readonly>
                <label for="sacado">Sacado</label>
            </div>
            <div class="input-field col l3 s12">
                <input disabled  id="cnpj_cpf" name="cnpj_cpf" type="text" class="validate" value="{{$resposta_consulta[0]->Documento}}" readonly>
                <label for="cnpj_cpf">CPF/CNPJ</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col l3 s12">
                <input disabled  id="valor" name="valor" type="text" class="validate money" value="{{$resposta_consulta[0]->Valor}}" readonly>
                <label for="valor">Valor</label>
            </div>
            <div class="input-field col l3 s12">
                <input disabled  id="valor" name="valor" type="text" class="validate money" value="{{$resposta_consulta[0]->ValorPago}}" readonly>
                <label for="valor">Valor Pago</label>
            </div>
            <div class="input-field col l3 s12">
                <input disabled  id="valor" name="valor" type="text" class="validate money" value="{{$resposta_consulta[0]->ValorLiquido}}" readonly>
                <label for="valor">Valor Liquidado</label>
            </div>
            <div class="input-field col l3 s12">
                <input disabled  id="parcela" name="parcela" type="text" class="validate money" value="{{$resposta_consulta[0]->Parcela}}" readonly>
                <label for="parcela">Numero de Parcelas</label>
            </div>
            <div class="input-field col l3 s12">
                <input disabled  id="emissao" name="emissao" type="text" class="validate date" value="{{date('d/m/Y', strtotime($resposta_consulta[0]->Emissao))}}" readonly>
                <label for="emissao">Data de Emissão</label>
            </div>
            <div class="input-field col l3 s12">
                <input disabled  id="vencimento" name="vencimento" type="text" class="validate date" value="{{date('d/m/Y', strtotime($resposta_consulta[0]->Vencimento))}}" readonly>
                <label for="vencimento">Data de Vencimento</label>
            </div>
            <div class="input-field col l3 s12">
                <a class="waves-effect waves-light btn" href="{{$resposta_consulta[0]->Url}}" target="_blank"><i class="material-icons left">print</i>Imprimir Boleto</a>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

@endsection
