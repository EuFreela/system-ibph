@extends('layout.app')
@section('content')

    @section('css')
    <link rel="stylesheet" href="{{ asset('css/career.css') }}">  
    @endsection

    <section id="top">
        <div class="div-text">
            <!--<p></p><img src="{{ asset('assets/wheel/img/azul2.png') }}" id="img-logo"><p></p>-->
            <h1 class="heading-top">AUTO-OBSERVAÇÃO DO ÍNDICE BURN-OUT</h1>
            <h3 style="color:#fff">{{$client->nome}}</h3>
        </div>
    </section>
    <section id="note">
        <div>
            <h1 class="heading-note">Esta auto-observação mede a pontuação do profissional que pode está "se queimando" na carreira, ou a "probabilidade" de ser "queimado" pelo meio profissional. Caso esteja desempregado (a) avalie os 6 últimos meses no emprego.</h1>
        </div>
    </section>

    <section id="chart" class="section-chart" >
        <div class="clearfix"></div>
            <div class="col-md-6" style="margin: auto">
                <div id="columnchart_values" style="margin-top:-70px;"></div>
            </div>
        </div>
    </section>

    <div class="container center space-2">
        <div class="spaces-2" ><span class="text-v4 div-text-side-2 color-1" id="color-point"><strong>TOTAL {{ isset($sum) ? $sum : 0 }} PONTOS</strong><br></span></div>
    </div>

    <section id="table" class="section-table">
        <div class="div-table">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th><strong>PONTUAÇÃO</strong></th>
                            <th><strong>BASE DA PONTUAÇÃO É A AVALIAÇÃO DAS ATIVIDADES NO CARGO/FUNÇÃO X CARREIRA</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="color-1">ENTRE 15 - 22</td>
                            <td id="td-1">"NENHUM SINAL DE ALERTA DE “SE QUEIMAR NA CARREIRA”, MAS SE ATRIBUIU UMA OU MAIS PONTUAÇÃO ACIMA DE 2 PARA ALGUMA QUESTÃO NO QUESTIONÁRIO, FIQUE ALERTA.</td>
                        </tr>
                        <tr>
                            <td class="color-2">ENTRE 23 - 36</td>
                            <td id="td-2">PEQUENO SINAL DE ALERTA DE "SE QUEIMAR" A MENOS QUE ALGUNS ITENS (PONTUAÇÃO) ESTEJAM PARTICULARMENTE ALTOS.</td>
                        </tr>
                        <tr>
                            <td class="color-3"><strong>ENTRE 37 - 53</strong></td>
                            <td id="td-3">CUIDADO, VOCÊ CORRE RISCO DE “SE QUEIMAR” NO CARGO/FUNÇÃO E NA CARREIRA PRINCIPALMENTE SE ATRIBUIU ALGUMAS NOTAS ACIMA DE 3 DO QUESTIONÁRIO.</td>
                        </tr>
                        <tr>
                            <td class="color-4"><strong>ENTRE 54 - 63</strong></td>
                            <td id="td-4">VOCÊ CORRE GRANDE RISCO DE “SE QUEIMAR” NO CARGO/FUNÇÃO, E NA CARREIRA FAÇA ALGO URGENTE SOBRE ISTO.</td>
                        </tr>
                        <tr>
                            <td class="color-5"><strong>ENTRE 64 - 79</strong><br></td>
                            <td id="td-5">VOCÊ ESTA COM ENORME RISCO DE “SE QUEIMAR” NO CARGO/FUNÇÃO E NA CARREIRA FACA ALGO URGENTE SOBRE ISTO.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <br><br>

    <div class="container center space-2">
        <div class="spaces-2" ><span class="text-v4 div-text-side-2 " id="color-point"><strong>MÉDIA GERAL {{ isset($self_observation->nota_geral) ? $self_observation->nota_geral: 0 }}</strong><br></span></div>
    </div>
<br>
  
    <section id="response">
        <div>
            <div class="table-responsive table-1">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">PONTUAÇÃO</th>
                            <th class="text-center">RELAÇÃO</th>
                            <th class="text-center">ABREVIAÇÃO</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ isset($self_observation->deprimido) ? $self_observation->deprimido: 0 }}</td>
                            <td>VOCÊ SE SENTE DEPRIMIDO (A) COMO SE SUA ENERGIA FÍSICA E EMOCIONAL ESTIVESSE CONSUMIDA?</td>
                            <td>A</td>
                        </tr>
                        <tr>
                            <td>{{ isset($self_observation->pensar_negativo) ? $self_observation->pensar_negativo: 0 }}</td>
                            <td>VOCÊ ACHA QUE ESTÁ PROPENSO (A) A PENSAR NEGATIVAMENTE SOBRE SEU EMPREGO?</td>
                            <td>B</td>
                        </tr>
                        <tr>
                            <td>{{ isset($self_observation->frio_insensivel) ? $self_observation->frio_insensivel: 0 }}</td>
                            <td>VOCÊ SE CONSIDERA MAIS FRIO (A) E/OU MENOS SENSÍVEL COM OUTRAS PESSOAS DO QUE POSSIVELMENTE ELAS MERECEM?</td>
                            <td>C</td>
                        </tr>
                        <tr>
                            <td>{{ isset($self_observation->irritado) ? $self_observation->irritado: 0 }}</td>
                            <td>VOCÊ FICA IRRITADO (A) FACILMENTE COM OS PEQUENOS PROBLEMAS, COM SEUS COLEGAS DE TRABALHO E A SUA EQUIPE?</td>
                            <td>D</td>
                        </tr>
                        <tr>
                            <td>{{ isset($self_observation->incompreendido) ? $self_observation->incompreendido: 0 }}</td>
                            <td>VOCÊ SE SENTE INCOMPREENDIDO (A) OU NÃO BEM QUISTO (A) PELOS SEUS COLEGAS DE TRABALHO?</td>
                            <td>E</td>
                        </tr>
                        <tr>
                            <td>{{ isset($self_observation->ninguem_conversar) ? $self_observation->ninguem_conversar: 0 }}</td>
                            <td>VOCÊ SENTE QUE NÃO HA NINGUÉM PARA CONVERSAR NO TRABALHO?</td>
                            <td>F</td>
                        </tr>
                        <tr>
                            <td>{{ isset($self_observation->executando_menos) ? $self_observation->executando_menos: 0 }}</td>
                            <td>VOCÊ ACHA QUE ESTÁ REALIZANDO/EXECUTANDO MENOS DO QUE DEVERIA?</td>
                            <td>G</td>
                        </tr>
                        <tr>
                            <td>{{ isset($self_observation->pouca_pressao) ? $self_observation->pouca_pressao: 0 }}</td>
                            <td>VOCÊ SE SENTE EM UM NÍVEL ABAIXO E DESCONFORTÁVEL DE PRESSÃO NO TRABALHO PARA EXECUTAR TAREFAS E OBTER RESULTADOS<br>EXTRAORDINÁRIOS?</td>
                            <td>H</td>
                        </tr>
                        <tr>
                            <td>{{ isset($self_observation->falha_fora_emprego) ? $self_observation->falha_fora_emprego: 0 }}</td>
                            <td>VOCÊ SENTE QUE NÃO ESTA CONSEGUINDO O QUE QUER EM OUTRAS ÁREAS DA VIDA FORA DO SEU EMPREGO?</td>
                            <td>I</td>
                        </tr>
                        <tr>
                            <td>{{ isset($self_observation->profissao_errada) ? $self_observation->profissao_errada: 0 }}</td>
                            <td>VOCÊ SENTE QUE ESTA NA EMPRESA, NESTE CARGO/FUNÇÃO QUE NÃO É PARA VOCÊ OU, SENTE QUE ESTÁ NA PROFISSÃO ERRADA?</td>
                            <td>J</td>
                        </tr>
                        <tr>
                            <td>{{ isset($self_observation->frustrado) ? $self_observation->frustrado: 0 }}</td>
                            <td>VOCÊ ESTÁ FICANDO FRUSTRADO (A) COM PARTES DO SEU TRABALHO DURANTE A ROTINA PROFISSIONAL?</td>
                            <td>K</td>
                        </tr>
                        <tr>
                            <td>{{ isset($self_observation->burocracia) ? $self_observation->burocracia: 0 }}</td>
                            <td>VOCÊ SENTE QUE A BUROCRACIA E A POLÍTICA ORGANIZACIONAL FRUSTRAM SUA HABILIDADE DE REALIZAR UM BOM TRABALHO?</td>
                            <td>L</td>
                        </tr>
                        <tr>
                            <td>{{ isset($self_observation->menos_habilidade) ? $self_observation->menos_habilidade: 0 }}</td>
                            <td>VOCÊ SENTE QUE HÁ MAIS TRABALHO DO QUE VOCÊ TEM HABILIDADE DE REALIZAR NA PRÁTICA?</td>
                            <td>M</td>
                        </tr>
                        <tr>
                            <td>{{ isset($self_observation->sem_tempo) ? $self_observation->sem_tempo: 0 }}</td>
                            <td>VOCÊ SENTE QUE NÃO TEM TEMPO PARA REALIZAR MUITAS COISAS QUE SÃO IMPORTANTES E FAZER UM TRABALHO COM QUALIDADE?</td>
                            <td>N</td>
                        </tr>
                        <tr>
                            <td>{{ isset($self_observation->sem_tempo_planejar) ? $self_observation->sem_tempo_planejar: 0 }}</td>
                            <td>VOCÊ ACHA QUE NÃO TEM TEMPO PARA PLANEJAR TANTO QUANTO VOCÊ GOSTARIA?</td>
                            <td>O</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <section id="contact">
        <div>
            <p class="paragraph">
                Qualquer resultados aqui no índice burn-out, pode muitas vezes ter uma relação direta com os resultados apresentados nas 3 rodas acima, por isso é importante que a AUTOAVALIAÇÃO VIDA & CARREIRA X NÍVEL DE FELICIDADE, seja feita por completo, ao contrário pode se tornar negligente, a autoavaliação é um presente seu.
                Receber a sessão feedback e follow-up para realinhamento vida x carreira é de grande importância, trará um grau de compreensão maior em relação aos resultados apurados e insights de como começar as atitudes de mudanças. Entre em contato agora com IBPH pelo WhatsApp (24) 9 7404-6504 e marque a sua devolutiva.
                
            </p>
        </div>
    </section>



    <div id="send-msg" class="register-photo">
        <div class="form-container">
            <div class="image-holder" style="background-image: url({{ asset('assets/wheel/img/bbb.jpg') }});"></div>

            <form>

                @include('layout.msg')

                <h2 class="text-center">Roberto Rangel Madureira<br></h2>
                <div class="form-group">
                    <input class="form-control" type="text" name="Nome" placeholder="Seu nome" required>
                </div>
                <div class="form-group">
                    <input class="form-control" type="email" name="Email" placeholder="Email" required value="{{$client->email}}">
                </div>
                <div class="form-group">
                    <select class="form-control" name="Assunto" required>
                        <optgroup label="Escolha o assunto">
                            <option value="Dúvidas" selected="">Devolutiva</option>
                            <option value="Elogios">Elogios</option>
                            <option value="Pedido">Pedido</option>
                            <option value="Pedido">Dúvidas</option>
                        </optgroup>
                    </select>
                </div>
                <div class="form-group">
                    <textarea class="form-control" rows="31" cols="31" name="MSG" placeholder="Sua mensagem." required style="height: 100px"></textarea>
                </div>

                <div class="form-group">
                    <input type="hidden" name="endereco" value="{{url()->current()}}">
                    <button class="btn btn-primary btn-block" type="">Enviar</button>
                </div>
                <a href="http://www.ibph.com.br" class="already">www.ibph.com.br<br></a>
                <p class="text-center" style="padding-top: 29px;">
                    <i class="fa fa-whatsapp" style="font-size: 20px;"></i>&nbsp;+55 24 97404 6504<br>&nbsp;<i class="fa fa-volume-control-phone" style="font-size: 20px;"></i>&nbsp;+55 24 97404 6504<br></p>

                @csrf
            </form>
        </div>
    </div>




    @section('script')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        var url_chart_1 = "{{route('api.self_observation',$id)}}";

        $.getJSON( url_chart_1, function( data_chart_1 ) {

            getChartCareer_1(
                data_chart_1['deprimido'],
                data_chart_1['pensar_negativo'],
                data_chart_1['frio_insensivel'],
                data_chart_1['irritado'],
                data_chart_1['incompreendido'],
                data_chart_1['ninguem_conversar'],
                data_chart_1['executando_menos'],
                data_chart_1['pouca_pressao'],
                data_chart_1['falha_fora_emprego'],
                data_chart_1['profissao_errada'],
                data_chart_1['frustrado'],
                data_chart_1['burocracia'],
                data_chart_1['menos_habilidade'],
                data_chart_1['sem_tempo'],
                data_chart_1['sem_tempo_planejar']
            )

            if( data_chart_1['nota_geral'] <= 18 ){
                $("#color-point").addClass("color-1");
                $("#td-1").addClass("color-1");
            }
            else if( data_chart_1['nota_geral'] > 19 && data_chart_1['nota_geral'] < 32 ){
                $("#color-point").addClass("color-2");
                $("#td-2").addClass("color-2");
            }
            else if( data_chart_1['nota_geral'] > 33 && data_chart_1['nota_geral'] < 49 ){
                $("#color-point").addClass("color-3");
                $("#td-3").addClass("color-3");
            }
            else if( data_chart_1['nota_geral'] > 50 && data_chart_1['nota_geral'] < 59 ){
                $("#color-point").addClass("color-3");
                $("#td-4").addClass("color-4");
            }
            else if( data_chart_1['nota_geral'] > 60 && data_chart_1['nota_geral'] < 75 ){
                $("#color-point").addClass("color-3");
                $("#td-5").addClass("color-5");
            }                

        });

    </script>
    <script>
        google.charts.load("current", {packages:['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ["Element", "Pontuação", { role: "style" } ],
                ["DE JEITO NENHUM", {{$elements[0]}}, "#00b0f0"],
                ["RARAMENTE", {{$elements[1]}}, "#6699ff"],
                ["ALGUMAS VEZES", {{$elements[2]}}, "#fec4ba"],
                ["COM MÉDIA FREQUÊNCIA", {{$elements[3]}}, "#fd664d"],
                ["COM MUITA FREQUÊNCIA", {{$elements[4]}}, "#ff0000"]
            ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                { calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation" },
                2]);

            var options = {
                title: "",
                width: 600,
                height: 600,
                fontSize: 12,
                bar: {groupWidth: "95%"},
                legend: { position: "none" },
            };

            var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
            chart.draw(view, options);
        }
    </script>

    @endsection

@endsection