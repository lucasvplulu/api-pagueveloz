@extends('layouts.site.base')
@section('content')
    <div class="container">
        <h1 class="title-h1">API de boletos da PagueVeloz, selecione a opção desejada.</h1>
        <div class="card panel-boleto ">
            <div class="card-tabs">
                <ul class="tabs tabs-fixed-width">
                    <li class="tab"><a href="#emissao">Emissão de boleto</a></li>
                    <li class="tab"><a href="#consulta">Consulta de boleto</a></li>
                    <li class="tab"><a href="#cancelamento">Cancelamento de boleto</a></li>
                </ul>
            </div>
            <div class="card-content grey lighten-4">
                @if(Session::has('criar-success'))
                    <div class="row" id="alert_box">
                        <div class="col s12 m12">
                            <div class="card green darken-1">
                                <div class="row">
                                    <div class="col s12 m10">
                                        <div class="card-content white-text">
                                            {{ Session::get('criar-success') }}
                                        </div>
                                    </div>
                                    <div class="col s12 m2">
                                        <i class="fa fa-times icon_style" id="alert_close" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif(Session::has('criar-danger'))
                    <div class="row" id="alert_box">
                        <div class="col s12 m12">
                            <div class="card red darken-1">
                                <div class="row">
                                    <div class="col s12 m10">
                                        <div class="card-content white-text">
                                            {{ Session::get('criar-danger') }}
                                        </div>
                                    </div>
                                    <div class="col s12 m2">
                                        <i class="fa fa-times icon_style" id="alert_close" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <div id="emissao">
                    <div class="row">
                        <form class="col s12" action="{{ route('create_bol.criar') }}" method="post">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="input-field col l6 s12">
                                    <input id="sacado" name="sacado" type="text" class="validate" required>
                                    <label for="sacado">Sacado</label>
                                </div>
                                <div class="input-field col l6 s12">
                                    <input id="cnpj_cpf" name="cnpj_cpf" type="text" class="validate" required>
                                    <label for="cnpj_cpf">CPF/CNPJ</label>
                                </div>
                                <div class="input-field col l3 s12">
                                    <input id="valor" name="valor" type="text" class="validate money" required>
                                    <label for="valor">Valor</label>
                                </div>
                                <div class="input-field col l3 s12">
                                    <input id="seu_numero" name="seu_numero" type="text" class="validate" >
                                    <label for="seu_numero">Seu Número</label>
                                </div>
                                <div class="input-field col l3 s12">
                                    <input id="vencimento" name="vencimento" type="text" class="validate date" required>
                                    <label for="vencimento">Vencimento</label>
                                </div>
                                <div class="input-field col l3 s12">
                                    <select name="parcela" id="parcela" class="browser-default">
                                        <option value="">Número de parcelas</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col s12" align="center">
                                <button class="btn waves-effect waves-light btn-emitir" type="submit" name="action">EMITIR BOLETO
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div id="consulta">
                    <div class="row">
                        <div class="input-field col l6 col offset-l3  s12  ipt-busca">
                            <input id="busca" name="busca" type="text" class="validate" required>
                            <label for="sacado">Seu número do Boleto</label>
                        </div>
                        <div class="col s12" align="center">
                            <button class="btn waves-effect waves-light" data-fancybox id="btn-iframe" data-type="iframe" data-src="" href="javascript:;" name="action">CONSULTAR BOLETO
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </div>
                </div>
                <div id="cancelamento">
                    <div class="row">
                        @if(Session::has('success'))
                            <div class="row" id="alert_box">
                                <div class="col s12 m12">
                                    <div class="card green darken-1">
                                        <div class="row">
                                            <div class="col s12 m10">
                                                <div class="card-content white-text">
                                                    {{ Session::get('success') }}
                                                </div>
                                            </div>
                                            <div class="col s12 m2">
                                                <i class="fa fa-times icon_style" id="alert_close" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif(Session::has('danger'))
                            <div class="row" id="alert_box">
                                <div class="col s12 m12">
                                    <div class="card red darken-1">
                                        <div class="row">
                                            <div class="col s12 m10">
                                                <div class="card-content white-text">
                                                    {{ Session::get('danger') }}
                                                </div>
                                            </div>
                                            <div class="col s12 m2">
                                                <i class="fa fa-times icon_style" id="alert_close" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <form class="col s12" action="{{ route('delete_bol.delete') }}" method="post">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="input-field col l6 col offset-l3  s12 ipt-busca">
                                    <input id="busca_delete" name="busca_delete" type="text" class="validate" required>
                                    <label for="sacado">Seu número do Boleto</label>
                                </div>
                                <div class="col s12" align="center">
                                    <button class="btn waves-effect waves-light" type="submit" name="action">CANCELAR BOLETO
                                        <i class="material-icons right">send</i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('.date').mask('00/00/0000');
            $('.money').mask('000.000.000.000.000,00', {reverse: true});
            $('select').material_select();
            setTimeout(function () {
                $('#alert_box').fadeOut('5000')
            }, 4000)

            $('[data-fancybox]').fancybox({
                toolbar  : false,
                smallBtn : false,
                iframe : {
                    preload : true
                }
            });

            $('#busca').keyup(function () {
                $busca = $(this).val();
                $url = __url+'/consultar_bol/'+$busca;

                $('#btn-iframe').data('src', $url);
            });
        })

    </script>
@endsection
