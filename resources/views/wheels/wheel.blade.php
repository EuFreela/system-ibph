
@extends('layout.app')
@section('content')
    
    <div id="roda-1" class="roda-spaces">
        <div>
            <header style="text-align:center;"></header>
        </div>
        <div class="container">
            <section class="header"><img src="{{ asset('assets/wheel/img/index.png') }}" id="img-logo">
                <header class="header-1" style="margin-top:30px">
                    <h3>RODA DO NÍVEL DE SATISFAÇÃO COM A VIDA</h3>
                    <p>{{$client ? $client->nome : 'Não Cadastrado'}}</p>
                </header>
            </section>
        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div><span class="text-v1 div-text-side-2">relacionamentos</span></div>
                </div>
                <div class="col-md-8">
                    <div class="spaces"><canvas id="lineChart" class="chart1"></canvas></div>
                </div>
                <div class="col">
                    <div><span class="text-v2 div-text-side-2">vida pessoal</span></div>
                </div>
            </div>
        </div>
        <div class="container center header">
            <div>
                <div id="size"><span class="header-1 hide">RODA DO NÍVEL SATISFAÇÃO COM AS 4 INTELIGENCIAS HUMANAS</span></div><span class="text-v3 div-text-side-2">negócios &amp; carreira</span>
                <div id="table-1" class="space-2">
                    <div class="table-responsive table-1">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>PONTUAÇÃO</th>
                                    <th>RELAÇÃO</th>
                                    <th>ABREVIAÇÃO</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="background:#F2F2F2;">
                                    <td>{{isset($wheel_satisfaction_with_life->parcial_vida_pessoal) ? $wheel_satisfaction_with_life->parcial_vida_pessoal : 0}}</td>
                                    <td><b>VIDA PESSOAL (TOTAL PARCIAL)</b></td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>{{isset($wheel_satisfaction_with_life->saude_disposicao) ? $wheel_satisfaction_with_life->saude_disposicao : 0}}</td>
                                    <td>SAÚDE E DISPOSIÇÃO</td>
                                    <td>A</td>
                                </tr>
                                <tr>
                                    <td>{{isset($wheel_satisfaction_with_life->desen_intelectual) ? $wheel_satisfaction_with_life->desen_intelectual : 0}}</td>
                                    <td>DESENVOLVIMENTO INTELECTUAL</td>
                                    <td>B</td>
                                </tr>
                                <tr>
                                    <td>{{isset($wheel_satisfaction_with_life->equil_emocional) ? $wheel_satisfaction_with_life->equil_emocional : 0}}</td>
                                    <td>EQUILÍBRIO EMOCIONAL&nbsp;</td>
                                    <td>C</td>
                                </tr>
                                <tr>
                                    <td>{{isset($wheel_satisfaction_with_life->criat_diversao) ? $wheel_satisfaction_with_life->criat_diversao : 0}}</td>
                                    <td>CRIATIVIDADE, HOBBIES &amp; DIVERSÃO</td>
                                    <td>D</td>
                                </tr>
                                <tr style="background:#F2F2F2;">
                                    <td>{{isset($wheel_satisfaction_with_life->parcial_negocio_carreira) ? $wheel_satisfaction_with_life->parcial_negocio_carreira : 0}}</td>
                                    <td><B>NEGÓCIOS & CARREIRA (TOTAL PARCIAL)</B></td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>{{isset($wheel_satisfaction_with_life->realizacao_proposito) ? $wheel_satisfaction_with_life->realizacao_proposito : 0}}</td>
                                    <td>REALIZAÇÃO &amp; PROPÓSITO&nbsp;</td>
                                    <td>E</td>
                                </tr>
                                <tr>
                                    <td>{{isset($wheel_satisfaction_with_life->crescimento_aprendizado) ? $wheel_satisfaction_with_life->crescimento_aprendizado : 0}}</td>
                                    <td>CRESCIMENTO E APRENDIZADO</td>
                                    <td>F</td>
                                </tr>
                                <tr>
                                    <td>{{isset($wheel_satisfaction_with_life->contribuicao_social) ? $wheel_satisfaction_with_life->contribuicao_social : 0}}</td>
                                    <td>CONTRIBUIÇÃO SOCIAL&nbsp;</td>
                                    <td>G</td>
                                </tr>
                                <tr>
                                    <td>{{isset($wheel_satisfaction_with_life->recursos_financeiros) ? $wheel_satisfaction_with_life->recursos_financeiros : 0}}</td>
                                    <td>RECURSOS FINANCEIROS&nbsp;</td>
                                    <td>H</td>
                                </tr>
                                <tr style="background:#F2F2F2;">
                                    <td>{{isset($wheel_satisfaction_with_life->parcial_relacionamento) ? $wheel_satisfaction_with_life->parcial_relacionamento : 0}}</td>
                                    <td><b>RELACIONAMENTOS (TOTAL PARCIAL)</b></td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>{{isset($wheel_satisfaction_with_life->relac_familiar) ? $wheel_satisfaction_with_life->relac_familiar : 0}}</td>
                                    <td>RELACIONAMENTO FAMILIAR&nbsp;</td>
                                    <td>I</td>
                                </tr>
                                <tr>
                                    <td>{{isset($wheel_satisfaction_with_life->relac_amoroso) ? $wheel_satisfaction_with_life->relac_amoroso : 0}}</td>
                                    <td>RELACIONAMENTO AMOROSO&nbsp;</td>
                                    <td>J</td>
                                </tr>
                                <tr>
                                    <td>{{isset($wheel_satisfaction_with_life->vida_social) ? $wheel_satisfaction_with_life->vida_social : 0}}</td>
                                    <td>VIDA SOCIAL</td>
                                    <td>K</td>
                                </tr>
                                <tr>
                                    <td>{{isset($wheel_satisfaction_with_life->espiritualidade_legado) ? $wheel_satisfaction_with_life->espiritualidade_legado : 0}}</td>
                                    <td>ESPIRITUALIDADE/LEGADO</td>
                                    <td>L</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="container center space-2">
            <div class="spaces-2"><span class="text-v4 div-text-side-2"><strong>MÉDIAS&nbsp;DE TODAS AS ÁREAS DA VIDA = {{isset($wheel_satisfaction_with_life->nota_geral) ? $wheel_satisfaction_with_life->nota_geral : 0}}</strong><br></span></div>
        </div>
    </div>
    <hr class="hr">
    <div id="roda-2" style="margin-top: 50px;">
        <div class="container">
            <section class="header"><img src="{{ asset('assets/wheel/img/index.png') }}" id="img-logo" class="hide">
                <header class="header">
                    <h3>RODA DO NÍVEL DE SATISFAÇÃO COM AS 4 INTELIGÊNCIAS HUMANAS</h3>
                </header>
                <p class="hide">Joana Silva - Empresária</p>
            </section>
        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div><span class="text-v1 div-text-side"></span></div>
                </div>
                <div class="col-md-8">
                    <div style="width:650px"><canvas id="lineChart2" class="chart2"></canvas></div>
                </div>
                <div class="col">
                    <div><span class="text-v2 div-text-side center"></span></div>
                </div>
            </div>
        </div>
        <div class="container center header" style="margin-top:-50px;">
            <div>
                <div id="size" class="hide"><span class="header-1"><br><strong>RODA DE DESENVOLVIMENTO DAS COMPETÊNCIAS PARA ALTA PERFORMANCE</strong><br></span></div>
                <div id="table-2" class="space-2">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>PONTUAÇÃO</th>
                                    <th>RELAÇÃO</th>
                                    <th>ABREVIAÇÃO</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="background:#FBF8EF;">
                                    <td>{{isset($wheel_satisfaction_4_human_intelligences->parcial_inte_fisica) ? $wheel_satisfaction_4_human_intelligences->parcial_inte_fisica : 0}}</td>
                                    <td><B>INTELIGÊNCIA FÍSICA (QF) (TOTAL PARCIAL)</B></td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>{{isset($wheel_satisfaction_4_human_intelligences->alimentacao_sabia) ? $wheel_satisfaction_4_human_intelligences->alimentacao_sabia : 0}}</td>
                                    <td>ALIMENTAÇÃO SÁBIA RICA EM FIBRAS E VITAMINAS</td>
                                    <td>A</td>
                                </tr>
                                <tr>
                                    <td>{{isset($wheel_satisfaction_4_human_intelligences->saude_disposicao) ? $wheel_satisfaction_4_human_intelligences->saude_disposicao : 0}}</td>
                                    <td>EXERCÍCIOS REGULARES, CONTROLE DA OBESIDADE, EQUILÍBRIO ENTRE<br>CORPO E MENTE E MEDITAÇÃO</td>
                                    <td>B</td>
                                </tr>
                                <tr>
                                    <td>{{isset($wheel_satisfaction_4_human_intelligences->repouso) ? $wheel_satisfaction_4_human_intelligences->repouso : 0}}</td>
                                    <td>REPOUSO ADEQUADO, RELAXAMENTO, POSITIVISMO,<br>GERENCIAMENTO DO ESTRESSE</td>
                                    <td>C</td>
                                </tr>
                                <tr style="background:#FBF8EF;">
                                    <td>{{isset($wheel_satisfaction_4_human_intelligences->parcial_inte_mental) ? $wheel_satisfaction_4_human_intelligences->parcial_inte_mental : 0}}</td>
                                    <td><b>INTELIGÊNCIA MENTAL (TOTAL PARCIAL)</b></td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>{{isset($wheel_satisfaction_4_human_intelligences->formacao) ? $wheel_satisfaction_4_human_intelligences->formacao : 0}}</td>
                                    <td>FORMAÇÃO, ESTUDOS DISCIPLINADOS E SISTEMATIZADOS</td>
                                    <td>D</td>
                                </tr>
                                <tr>
                                    <td>{{isset($wheel_satisfaction_4_human_intelligences->autofeedback) ? $wheel_satisfaction_4_human_intelligences->autofeedback : 0}}</td>
                                    <td>AUTOFEEDBACK, AUTOPERCEPÇÃO DOS CONHECIMENTOS ADQUIRIDOS</td>
                                    <td>E</td>
                                </tr>
                                <tr>
                                    <td>{{isset($wheel_satisfaction_4_human_intelligences->experiencia) ? $wheel_satisfaction_4_human_intelligences->experiencia : 0}}</td>
                                    <td>APRENDER A FAZER COM A PRÓPRIA EXPERIÊNCIA,<br>AUTODESAFIO</td>
                                    <td>F</td>
                                </tr>
                                <tr style="background:#FBF8EF;">
                                    <td>{{isset($wheel_satisfaction_4_human_intelligences->parcial_int_emocional) ? $wheel_satisfaction_4_human_intelligences->parcial_int_emocional : 0}}</td>
                                    <td><b>INTELIGÊNCIA EMOCIONAL (TOTAL PARCIAL)</b></td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>{{isset($wheel_satisfaction_4_human_intelligences->habilidades_interpessoais) ? $wheel_satisfaction_4_human_intelligences->habilidades_interpessoais : 0}}</td>
                                    <td>HABILIDADES SOCIAIS / SE COLOCAR NO LUGAR<br>DO OUTRO</td>
                                    <td>G</td>
                                </tr>
                                <tr>
                                    <td>{{isset($wheel_satisfaction_4_human_intelligences->autoconsciencia) ? $wheel_satisfaction_4_human_intelligences->autoconsciencia : 0}}</td>
                                    <td>AUTOCONSCIÊNCIA COMPORTAMENTAL<br>E RESILIÊNCIA</td>
                                    <td>H</td>
                                </tr>
                                <tr>
                                    <td>{{isset($wheel_satisfaction_4_human_intelligences->empatia) ? $wheel_satisfaction_4_human_intelligences->empatia : 0}}</td>
                                    <td>AUTOMOTIVAÇÃO EMPATIA COM AS<br>PESSOAS</td>
                                    <td>I</td>
                                </tr>
                                <tr style="background:#FBF8EF;">
                                    <td>{{isset($wheel_satisfaction_4_human_intelligences->parcial_int_espiritual) ? $wheel_satisfaction_4_human_intelligences->parcial_int_espiritual : 0}}</td>
                                    <td><b>INTELIGÊNCIA ESPIRITUAL (TOTAL PARCIAL)</b></td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>{{isset($wheel_satisfaction_4_human_intelligences->integridade) ? $wheel_satisfaction_4_human_intelligences->integridade : 0}}</td>
                                    <td>INTEGRIDADE (FIDELIDADE AOS VALORES / ESTADO<br>DE CONSCIÊNCIA)</td>
                                    <td>J</td>
                                </tr>
                                <tr>
                                    <td>{{isset($wheel_satisfaction_4_human_intelligences->legado) ? $wheel_satisfaction_4_human_intelligences->legado : 0}}</td>
                                    <td>SENTIDO DA VIDA, LEGADO, ECOLOGIA CONTRIBUIÇÃO. COMO EU CONTRIBUO<br>POSITIVAMENTE, COM PESSOAS E CAUSAS NO<br>MUNDO PELO QUAL EXISTO E PERTENÇO?</td>
                                    <td>K</td>
                                </tr>
                                <tr>
                                    <td>{{isset($wheel_satisfaction_4_human_intelligences->carreira) ? $wheel_satisfaction_4_human_intelligences->carreira : 0}}</td>
                                    <td>ALINHAMENTO CARREIRA X TALENTO X<br>COMPETÊNCIAS E MELHORIA CONTÍNUA</td>
                                    <td>L</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div><span class="text-v3 div-text-side"><strong>MÉDIAS DAS 4 INTELIGÊNCIAS = {{isset($wheel_satisfaction_4_human_intelligences->nota_geral) ? $wheel_satisfaction_4_human_intelligences->nota_geral : 0}}</strong><br></span></div>
        </div>

        <div class="container center space-2">
            <div style="margin-top: 35px;"></div>
        </div>

    </div>

    <hr class="hr">

    <div id="roda-3" style="margin-top: 50px;">
        <div class="container">
            <section class="header-3"><img src="{{ asset('assets/wheel/img/index.png') }}" id="img-logo" class="hide">
                <header>
                    <h3>RODA DO DESENVOLVIMENTO DAS COMPETÊNCIAS PARA ALTA PERFORMANCE</h3>
                </header>
                <p class="hide">Joana Silva - Empresária</p>
            </section>
        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div><span class="text-v1 div-text-side-3"></span></div>
                </div>
                <div class="col-md-8">
                    <div><canvas id="lineChart3"></canvas></div>
                </div>
                <div class="col">
                    <div><span class="text-v2 div-text-side-3 center"></span></div>
                </div>
            </div>
        </div>
        <div class="container center header" style="margin-bottom:100px;">
            <div>
                <div id="size"><span class="header-1 hide"><br><strong>RODA DE DESENVOLVIMENTO DAS COMPETÊNCIAS PARA ALTA PERFORMANCE</strong><br></span></div>
                <div id="table-3">
                    <div class="table-responsive table-3" style="margin-top:-100px; margin-bottom:100px;">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>PONTUAÇÃO</th>
                                    <th>RELAÇÃO</th>
                                    <th>ABREVIAÇÃO</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{isset($wheel_development_copetences_high_performance->comunicacao) ? $wheel_development_copetences_high_performance->comunicacao : 0}}</td>
                                    <td>COMUNICAÇÃO</td>
                                    <td>A</td>
                                </tr>
                                <tr>
                                    <td>{{isset($wheel_development_copetences_high_performance->eficacia_pessoal) ? $wheel_development_copetences_high_performance->eficacia_pessoal : 0}}</td>
                                    <td>EFICÁCIA PESSOAL</td>
                                    <td>B</td>
                                </tr>
                                <tr>
                                    <td>{{isset($wheel_development_copetences_high_performance->orientacao_objetivos) ? $wheel_development_copetences_high_performance->orientacao_objetivos : 0}}</td>
                                    <td>ORIENTAÇÃO PARA OBJETIVOS</td>
                                    <td>C</td>
                                </tr>
                                <tr>
                                    <td>{{isset($wheel_development_copetences_high_performance->gestao_conflito) ? $wheel_development_copetences_high_performance->gestao_conflito : 0}}</td>
                                    <td>GESTÃO DE CONFLITOS</td>
                                    <td>D</td>
                                </tr>
                                <tr>
                                    <td>{{isset($wheel_development_copetences_high_performance->foco_cliente) ? $wheel_development_copetences_high_performance->foco_cliente : 0}}</td>
                                    <td>FOCO NO CLIENTE</td>
                                    <td>E</td>
                                </tr>
                                <tr>
                                    <td>{{isset($wheel_development_copetences_high_performance->gerenciamento) ? $wheel_development_copetences_high_performance->gerenciamento : 0}}</td>
                                    <td>GERENCIAMENTO</td>
                                    <td>F</td>
                                </tr>
                                <tr>
                                    <td>{{isset($wheel_development_copetences_high_performance->resolucao_problema) ? $wheel_development_copetences_high_performance->resolucao_problema : 0}}</td>
                                    <td>RESOLUÇÃO DE PROBLEMAS</td>
                                    <td>G</td>
                                </tr>
                                <tr>
                                    <td>{{isset($wheel_development_copetences_high_performance->trabalho_equipe) ? $wheel_development_copetences_high_performance->trabalho_equipe : 0}}</td>
                                    <td>TRABALHO EM EQUIPE</td>
                                    <td>H</td>
                                </tr>
                                <tr>
                                    <td>{{isset($wheel_development_copetences_high_performance->habilidades_interpessoais) ? $wheel_development_copetences_high_performance->habilidades_interpessoais : 0}}</td>
                                    <td>HABILIDADES INTERPESSOAIS</td>
                                    <td>I</td>
                                </tr>
                                <tr>
                                    <td>{{isset($wheel_development_copetences_high_performance->tomada_decisao) ? $wheel_development_copetences_high_performance->tomada_decisao : 0}}</td>
                                    <td>TOMADA DE DECISÃO</td>
                                    <td>J</td>
                                </tr>
                                <tr>
                                    <td>{{isset($wheel_development_copetences_high_performance->lideranca) ? $wheel_development_copetences_high_performance->lideranca : 0}}</td>
                                    <td>LIDERANÇA</td>
                                    <td>K</td>
                                </tr>
                                <tr>
                                    <td>{{isset($wheel_development_copetences_high_performance->flexibilidade) ? $wheel_development_copetences_high_performance->flexibilidade : 0}}</td>
                                    <td>FLEXIBILIDADE</td>
                                    <td>L</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div><span class="text-v3 div-text-side-3">MÉDIAS DE TODAS AS COMPETÊNCIAS = {{isset($wheel_development_copetences_high_performance->nota_geral) ? $wheel_development_copetences_high_performance->nota_geral : 0}}<br></span></div>
        </div>
        <div class="container center">
            <div style="margin-top: 35px;"></div>
        </div>
    </div>
    <hr class="hr hide">



    <div id="quote-0" class="board-3">
        <section>
            <div>
                <div class="row board-block reverse spaces-row">
                    <div class="col"><img src="{{ asset('assets/wheel/img/skills.svg') }}" width="400" class="img-fluid"></div>
                    <div class="col cols-text">
                        <header style="margin-top:10px;">
                            <h2 style="font-weight: bold;">Conhecimento, Habilidade e Atitude</h2>
                        </header>
                        <hr style="border:1px solid #000; width:50%; float:left;" />
                    </div>
                </div>
            </div>
        </section>
    </div>

    <section id="chart" class="section-chart" >
        <div class="clearfix"></div>
        <div class="col-md-6" style="border: 0px solid red;margin-left: 200px;">
            <div id="piechart" ></div>
        </div>
    </section>

    <div style="margin:auto;">
        <div class="table-responsive" style="padding:20px; text-align:center;color:cornflowerblue">
            <table class="table">
                <thead>
                <tr>
                    <th>DESCRIÇÃO</th>
                    <th>PONTUAÇÃO</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td style=""><strong>CONHECIMENTO</strong></td>
                    <td style="text-align:justify;">{{$cha->conhecimento_ser}}</td>
                </tr>
                <tr>
                    <td style=""><strong>ATITUDE</strong><br /></td>
                    <td style="text-align:justify;">{{$cha->atitudes_fazer}}</td>
                </tr>
                <tr>
                    <td style=""><strong>HABILIDADE</strong><br /></td>
                    <td style="text-align:justify;">{{$cha->habilidades_ter}}</td>
                </tr>
                </tbody>
            </table>
            <div style=" display: flex;align-items: center;">
                <span class="alert alert-info"  style="text-align: center;margin: auto; font-weight: bold">MÉDIA GERAL {{ isset($cha->nota_geral) ? $cha->nota_geral: 0 }}</span></div>
            </div>
        </div>

    <br><br>


    <div id="quote-0" class="board-3">
        <section>
            <div>
                <div class="row board-block reverse spaces-row">
                    <div class="col"><img src="{{ asset('assets/wheel/img/happy-children.svg') }}" width="400" class="img-fluid"></div>
                    <div class="col cols-text">
                        <header style="margin-top:10px;">
                            <h2 style="font-weight: bold;">Felicidades Negativa, Positiva e Neutra</h2>
                        </header>
                        <hr style="border:1px solid #000; width:50%; float:left;" />
                    </div>
                </div>
            </div>
        </section>
    </div>

    <section id="chart" class="section-chart" >
        <div class="clearfix"></div>
        <div class="col-md-6" style="border: 0px solid red;margin-left: 200px;">
            <div id="piechart2" ></div>
        </div>
    </section>

    <div style="margin:auto;">
        <div class="table-responsive" style="padding:20px; text-align:center;color:cornflowerblue">
            <table class="table">
                <thead>
                <tr>
                    <th>DESCRIÇÃO</th>
                    <th>PONTUAÇÃO</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td style=""><strong>FELICIDADES POSITIVA</strong></td>
                    <td style="text-align:justify;">{{$wheel_satisfaction_with_life->felicidade_positivas}}</td>
                </tr>
                <tr>
                    <td style=""><strong>FELICIDADES NEGATIVA</strong><br /></td>
                    <td style="text-align:justify;">{{$wheel_satisfaction_with_life->felicidade_negativas}}</td>
                </tr>
                <tr>
                    <td style=""><strong>FELICIDADES NEUTRA</strong><br /></td>
                    <td style="text-align:justify;">{{$wheel_satisfaction_with_life->felicidade_neutras}}</td>
                </tr>
                </tbody>
            </table>
            <div style=" display: flex;align-items: center;">
                <span class="alert alert-info"  style="text-align: center;margin: auto; font-weight: bold">MÉDIA GERAL {{ isset($sum_felicidades) ? $sum_felicidades: 0 }}</span></div>
        </div>
    </div>


    <br><br>





    @if($client->cargo != 'Estudante' || $client->cargo != 'estudante')
    <div id="quote-0" class="board-3">
        <section>
            <div>
                <div class="row board-block reverse spaces-row">
                    <div class="col"><img src="{{ asset('assets/wheel/img/observation.svg') }}" width="400" class="img-fluid"></div>
                    <div class="col cols-text">
                        <header style="margin-top:10px;">
                            <h2 style="font-weight: bold;">AUTO-OBSERVAÇÃO DO ÍNDICE BURN-OUT<br /></h2>
                        </header>
                        <hr style="border:1px solid #000; width:50%; float:left;" />
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div id="grafico">
        <p class="text-center" style="padding:40px">Esta auto-observação mede a pontuação do profissional que pode está &quot;se queimando&quot; na carreira, ou a &quot;probabilidade&quot; de ser &quot;queimado&quot; pelo meio profissional. Caso esteja desempregado (a) avalie os 6 últimos meses no
            emprego.</p>
    </div><br>

    <section id="chart" class="section-chart" >
        <div class="clearfix"></div>
        <div class="col-md-6" style="margin: auto">
            <div id="columnchart_values" style="border: 0px solid red;"></div>
        </div>
        <div style=" display: flex;align-items: center;">
        <span class="alert alert-info" style="text-align: center;margin: auto; font-weight: bold">TOTAL {{ isset($sum) ? $sum : 0 }} PONTOS</span></div>
    </section>

    <div style="margin:auto;">
        <div class="table-responsive" style="padding:20px; text-align:center;">
            <table class="table">
                <thead>
                <tr>
                    <th>PONTUAÇÃO</th>
                    <th>DESCRIÇÃO</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td style="width:140px; background-color:#3aa2f3; color:#fff;"><strong>ENTRE 15 - 22</strong></td>
                    <td style="text-align:justify;">NENHUM SINAL DE ALERTA DE “SE QUEIMAR NA CARREIRA”, MAS SE VOCÊ ATRIBUIU PONTUAÇÃO ACIMA DE 2 PARA UMA OU MAIS PERGUNTAS NO QUESTIONÁRIO, FIQUE ALERTA, REVEJA OS PONTOS VULNERÁVEIS QUE PRECISAM SER TRABALHADOS NAS 3 RODAS ACIMA.</td>
                </tr>
                <tr>
                    <td style="background-color:#7876ff; color:#fff;"><strong>ENTRE 23 - 36</strong><br /></td>
                    <td style="text-align:justify;">PEQUENO SINAL DE ALERTA DE "SE QUEIMAR" NA CARREIRA, PRINCIPALMENTE SE VOCÊ ATRIBUIU NOTAS ACIMA DE 2 PARA UMA OU MAIS PERGUNTAS DO QUESTIONÁRIO NA AUTO-OBSERVAÇÃO. VAMOS JUNTOS MUDAR ESTE CENÁRIO PARA ALINHAR SUA VIDA & CARREIRA E LHE PROPORCIONAR MAIS FELICIDADE?</td>
                </tr>
                <tr>
                    <td style="background-color:#fdbfb7; color:#fff;"><strong>ENTRE 37 - 53</strong><br /></td>
                    <td style="text-align:justify;">CUIDADO, VOCÊ CORRE RISCO DE “SE QUEIMAR” NA CARREIRA, PRINCIPALMENTE SE ATRIBUIU NOTAS 3 OU ACIMA PARA UMA OU MAIS PERGUNTAS DO QUESTIONÁRIO NA AUTO-OBSERVAÇÃO. VOCÊ PODE APONTAR NAS RODAS ACIMA, QUAIS ÁREAS PRECISAM SER DESENVOLVIDAS E COMEÇAR ENTRAR EM AÇÃO CUSTE O QUE CUSTAR?</td>
                </tr>
                <tr>
                    <td style="background-color:#fc5345; color:#fff;"><strong>ENTRE 54 - 63</strong><br /></td>
                    <td style="text-align:justify;">VOCÊ ESTÁ COM ENORME RISCO DE “SE QUEIMAR” NA CARREIRA, FAÇA ALGO URGENTE SOBRE ISTO, POSSIVELMENTE ESTE RESULTADO POSSA TER UMA RELAÇÃO DIRETA COM OS GRÁFICOS INTERNOS APRESENTADOS NAS RODAS ACIMA. VAMOS RECONECTAR SEU POTENCIAL, DESENVOLVER COMPETÊNCIAS, MUDAR COMPORTAMENTOS, ALAVANCAR SUA PERFORMANCE PARA MUDAR ESTE CENÁRIO?</td>
                </tr>
                <tr>
                    <td style="background-color:#fe0000; color:#fff;"><strong>ENTRE 64 - 79</strong><br /></td>
                    <td style="text-align:justify;">VOCÊ ESTÁ COM ENORME RISCO DE “SE QUEIMAR” NA CARREIRA, FAÇA ALGO URGENTE SOBRE ISTO, ESTE RESULTADO POSSIVELMENTE DEVA TER RELAÇÃO DIRETA COM OS GRÁFICOS INTERNOS APRESENTADOS NAS RODAS ACIMA. VAMOS JUNTOS CRIAR UM PLANO DE AÇÃO COM METAS CLARAS E EVIDENTES?</td>
                </tr>
                </tbody>
            </table>
            <div style=" display: flex;align-items: center;">
                <span class="alert alert-info"  style="text-align: center;margin: auto; font-weight: bold">MÉDIA GERAL {{ isset($self_observation->nota_geral) ? $self_observation->nota_geral: 0 }}</span></div>
        </div>

        <section id="response">
            <div>
                <div class="table-responsive table-1 container center"style="color:blue">
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
                            <td>VOCÊ SE SENTE INCOMPREENDIDO (A) OU NÃO QUERIDO (A), ESTIMADO (A) PELOS SEUS COLEGAS DE TRABALHO?</td>
                            <td>E</td>
                        </tr>
                        <tr>
                            <td>{{ isset($self_observation->ninguem_conversar) ? $self_observation->ninguem_conversar: 0 }}</td>
                            <td>VOCÊ SENTE QUE NÃO HÁ NINGUÉM PARA CONVERSAR NO TRABALHO?</td>
                            <td>F</td>
                        </tr>
                        <tr>
                            <td>{{ isset($self_observation->executando_menos) ? $self_observation->executando_menos: 0 }}</td>
                            <td>VOCÊ ACHA QUE ESTÁ REALIZANDO/EXECUTANDO MENOS DO QUE DEVERIA?</td>
                            <td>G</td>
                        </tr>
                        <tr>
                            <td>{{ isset($self_observation->pouca_pressao) ? $self_observation->pouca_pressao: 0 }}</td>
                            <td>VOCÊ SE SENTE EM UM NÍVEL ABAIXO E DESCONFORTÁVEL DE PRESSÃO NO TRABALHO PARA EXECUTAR TAREFAS E OBTER RESULTADOS EXTRAORDINÁRIOS?</td>
                            <td>H</td>
                        </tr>
                        <tr>
                            <td>{{ isset($self_observation->falha_fora_emprego) ? $self_observation->falha_fora_emprego: 0 }}</td>
                            <td>VOCÊ SENTE QUE NÃO ESTÁ CONSEGUINDO O QUE QUER EM OUTRAS ÁREAS DA VIDA FORA DO SEU EMPREGO?</td>
                            <td>I</td>
                        </tr>
                        <tr>
                            <td>{{ isset($self_observation->profissao_errada) ? $self_observation->profissao_errada: 0 }}</td>
                            <td>VOCÊ SENTE QUE ESTÁ NA EMPRESA, NESTE CARGO/FUNÇÃO QUE NÃO É PARA VOCÊ OU, SENTE QUE ESTÁ NA PROFISSÃO ERRADA?</td>
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
                <p class="paragraph" style="padding: 70px;text-align: justify;"><i>
                        Quaisquer resultados apresentados aqui no índice burn-out, podem muitas vezes ter uma relação direta com os cenários e resultados apresentados nas 3 rodas acima, por isso, é importante que a AUTOAVALIAÇÃO VIDA & CARREIRA X NÍVEL DE FELICIDADE, seja feita por completo, ao contrário, pode se tornar negligente. A autoavaliação é um presente seu para você mesmo (a), é você se autoavaliando e evidenciando seu estado atual em todas as áreas da vida e da carreira. Receber a sessão feedback e follow-up para realinhamento vida x carreira, também é BÔNUS EXTRA oferecido pelo IBPH, além de ser de grande importância, trará um grau de compreensão maior em relação a sua vida atual e insights de como começar as atitudes de mudanças contínuas para ir muito além na vida e na carreira. Entre em contato agora com IBPH - INSTITUTO BRASILEIRO DE PERFORMANCE HUMANA pelo WhatsApp (24) 9 7404-6504 e marque a sua sessão feedback e follow-up.
                    </i>
                </p>
            </div>
        </section>
        @endif


        <div id="questions" class="body-div board-1">
            <section class="spaces-body-div">
                <header>
                    <h3 class="text-center"><strong>EXERCÍCIO OBRIGATÓRIO PARA O NOSSO ENCONTRO</strong><br></h3>
                </header>
                <p class="text-center"><strong>Responda as 7 perguntas abaixo, em nosso encontro, vamos autoanalisar e interagir com as respostas dadas por você, elas reflete em seu momento atual em relação ao seu nível de equilíbrio entre vida, carreira e felicidade. Permita-se.&nbsp;</strong></p>
            </section>

            <section class="spaces-body-div-2">
                <form action="{{route('wheel.questions',$id)}}" method="post">

                    <?php
                    foreach($questions as $question):
                        $exit = 0;
                        echo '<div class="form-group">';
                        echo '<label><strong>'.$question->number.'- </strong>'.$question->question.'</label>';
                        foreach($answers as $answer):
                            if($question->id == $answer->question_id):
                                echo '<textarea class="form-control input-padding" name="answer[]">'.$answer->answer.'</textarea>';
                                $exit=1;
                            endif;
                        endforeach;
                        if($exit==0)
                            echo '<textarea class="form-control input-padding" name="answer[]"></textarea></div>';
                    endforeach;
                    ?>


                    <div class="form-group">
                        <button class="btn btn-info btn-lg text-white" type="submit">Enviar Dados</button>
                    </div>
                    @csrf
                </form>

            </section>
        </div>
        <hr class="hr hide">





        <div id="explain-1" class="board-2">
            <section class="spaces-body-div-2">
                <div>
                    <div class="row spaces-row board-block reverse box-shadown" style="background-color:#70C1B3; color:#fff;">
                        <div class="col"><img src="{{ asset('assets/wheel/img/2821467.png') }}" width="400" class="img-fluid"></div>
                        <div class="col cols-text">
                            <header>
                                <h5 style="font-weight: bold;">O QUE É FELICIDADE PARA CADA UM DE NÓS?<br></h5>
                            </header>
                            <p class="text-justify" style="font-weight: normal;">Seria um tanto quanto ousado definirmos FELICIDADE, já que ela pode significar coisas diferentes para diferentes pessoas. Levando em conta estas diferenças, propomos a seguinte definição, baseada em grandes pensadores, filósofos e gurus: “A FELICIDADE é um estado essencial que atingimos quando fazemos coisas na vida usando nossos TALENTOS na sua potencialidade máxima e atingimos a REALIZAÇÃO, o SUCESSO e a PLENITUDE ao nos permitir satisfazer nossos VALORES mais profundos”.<br></p>
                        </div>
                    </div>
                    <div class="row board-block spaces-row reverse col-reverse box-shadown" style="background-color:#f0e6cb;">
                        <div class="col"><img src="{{ asset('assets/wheel/img/2027294.svg') }}" width="400" class="img-fluid"></div>
                        <div class="col cols-text">
                            <header>
                                <h5 style="font-weight: bold;"><strong>O QUE É TALENTO?</strong><br></h5>
                            </header>
                            <p class="text-justify" style="font-weight: normal;">Talento é uma habilidade, grande capacidade, disposição natural ou qualidade superior. De acordo com a definição anterior sobre o que é felicidade, um dos fatores necessários para nos sentirmos felizes na vida é usarmos nossos
                                talentos em toda a sua potencialidade. Usando nossos talentos naturais fazemos MAIS, MELHOR em MENOR TEMPO com grau muito maior de realização e satisfação.<br></p>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <hr class="hr hide">
        
        <div id="quote-1" class="board-3">
        <section>
            <div>
                <div class="row board-block reverse spaces-row">
                    <div class="col"><img src="{{ asset('assets/wheel/img/1221445.svg') }}" width="400" class="img-fluid"></div>
                    <div class="col cols-text">
                        <header style="margin-top:10px;">
                            <h2 style="font-weight: bold;"><strong>COMO IR ALÉM NA CARREIRA E CONQUISTAR QUALIDADE DE VIDA?</strong><br></h2>
                        </header>
                        <hr style="border:1px solid #000; width:50%; float:left;">
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="features-clean">
        <div class="container">
            <div class="intro">
                <h2 class="text-center"><strong>O QUE TODOS NÓS QUEREMOS NA VIDA?</strong><br></h2>
                <p class="text-center">Pesquisas mostram que as pessoas têm objetivos em comum, a maioria das pessoas busca realização em áreas muito similares, para atingir a tal qualidade de vida. </p>
            </div>
            <div class="row features">
                <div class="col-sm-6 col-lg-4 item"><i class="fa fa-quote-left icon"></i>
                    <h3 class="name"><strong>REALIZAÇÃO PESSOAL</strong></h3>
                    <p class="description">As pessoas que buscam REALIZAÇÃO PESSOAL querem saúde, energia, vitalidade, beleza, inteligência, controle emocional, conexão espiritual, diversão, lazer, criatividade e outras tantas coisas. </p>
                </div>
                <div class="col-sm-6 col-lg-4 item"><i class="fa fa-quote-left icon"></i>
                    <h3 class="name"><strong>REALIZAÇÃO PROFISSIONAL</strong></h3>
                    <p class="description">As pessoas que buscam REALIZAÇÃO PROFISSIONAL ou nos negócios, querem sentir que estão usando seus talentos em toda sua potencialidade, querem ser reconhecidas por isto, querem prosperidade financeira, querem contribuição e crescimento.
                        </p>
                </div>
                <div class="col-sm-6 col-lg-4 item"><i class="fa fa-quote-left icon"></i>
                    <h3 class="name"><strong>REALIZAÇÃO NOS RELACIONAMENTOS</strong></h3>
                    <p class="description">As pessoas que buscam REALIZAÇÃO NOS RELACIONAMENTOS, querem amor, amizade, família, conexão. Querem amar e ser amadas.</p>
                </div>
            </div>
        </div>
    </div>
    <div id="quote-2" class="board-3">
        <section>
            <div>
                <div class="row board-block reverse spaces-row">
                    <div class="col"><img src="{{ asset('assets/wheel/img/1817419.svg') }}" width="400" class="img-fluid"></div>
                    <div class="col cols-text">
                        <header style="margin-top:10px;">
                            <h2 style="font-weight: bold;"><strong>O QUE TALVEZ POSSA ESTAR LHE IMPEDINDO DE IR ALÉM NA VIDA PESSOAL, PROFISSIONAL E RELACIONAMENTOS? </strong><br></h2>
                        </header>
                        <hr style="border:1px solid #000; width:50%; float:left;">
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="highlight-clean">
        <div class="container">
            <div style="padding:0px 100px 0px 100px;">
                <header></header>
                <p class="text-justify text">Pode ser duro o que eu tenho para lhe dizer, mas provavelmente muitos de nós não estamos trilhando o caminho da prosperidade. Como eu sei disto? Primeiro porque observo bem o mundo ao meu redor e gostaria de lhe convidar a observar também. Olhe ao seu redor e veja quantas pessoas com mais de 65 anos possuem uma vida que gostaria de ter? Olhe todos os aspectos físicos, mentais, emocionais, financeiros, disposição, saúde.
                    <br><br>
                    Segundo, porque centenas de estatísticas nos mostram que as pessoas nascem, crescem, envelhecem, passam por dificuldades e morrem. Pessoas do mundo inteiro levantam pela manhã, trabalham, estudam, comem e dormem. Elas fazem isto todos os dias em um círculo vicioso sem se questionarem se, o que estão fazendo as conduzirá a um porto feliz ou a um caminho para irem além. Qual o segredo para ir além?
                    <br><br>
                    Boa pergunta! Começamos a investir em nosso futuro quando começamos a trilhar todos os dias, um pouco por dia, mas de forma contínua, caminhos que pessoas comuns não trilham. Muita gente não toma decisões porque acredita que não está no controle da sua vida e da sua felicidade. Milhares de pessoas vivem insatisfeitas em suas vidas e não conseguem progredir porque diariamente de forma inconsciente, possuem um padrão mental de responsabilizar fatores externos pela vida que experimentam. São pessoas que caem na armadilha de lamentar seus fracassos, culpando pessoas, governos, contextos e empresas por seu baixo desempenho.
                    <br><br>
                    Não decidir já é uma decisão? É inacreditável e número de pessoas que anseiam irem além, mas infelizmente não conseguem forças internas para tomar uma decisão que possa realmente fazer a diferença em todas as áreas de suas vidas. Estas pessoas possuem o medo de arcar com as consequências de suas decisões. Não decidindo elas acham que irão se livrar da responsabilidade dos acontecimentos.
                    O que realmente pode impedir uma pessoa de ir além na vida pessoal, profissional e nos relacionamentos?
                    <br><br>
                    Talvez medo? Talvez insegurança? Talvez a zona de conforto? Talvez a procrastinação? Talvez a auto sabotagem? Talvez a auto condenação?
                    <br><br>
                    A partir de agora, nós vamos ajudar você a responder as perguntas que estão lhe paralisando para você, SER, TER e FAZER diferente, com total segurança que o (a) conduzirá ir além em todas as áreas da sua vida.
                    <br><br>
                    Entre em contato com o Roberto Rangel Madureira – Presidente do Instituto Brasileiro de Performance Humana.

                </p>
                    <i class="fa fa-globe" style="font-size: 22px;"></i>&nbsp;<a href="http://www.ibph.com.br" target="_blank">www.ibph.com.br</a><br>
                    <i
                        class="fa fa-envelope-o" style="font-size: 20px;"></i>&nbsp;<a href="email:Roberto@ibph.com.br">roberto@ibph.com.br</a>
                    <br>
                    <i class="fa fa-whatsapp" style="font-size: 20px;"></i>&nbsp; +55&nbsp;24 97404 6504<br>
                    <!--<i class="fa fa-volume-control-phone" style="font-size: 20px;"></i> +55 24 3401 0024<br>-->
                </p>
            </div>
            <div class="buttons"><a class="btn btn-primary" role="button" href="#send-msg">CONTATO</a></div>
        </div>
    </div>
    <div id="quote-3" class="board-3">
        <section>
            <div>
                <div class="row board-block reverse spaces-row">
                    <div class="col"><img src="{{ asset('assets/wheel/img/2422442.svg') }}" width="400" class="img-fluid"></div>
                    <div class="col cols-text">
                        <header style="margin-top:10px;">
                            <h2 style="font-weight: bold;"><strong>CÓDIGO DE ÉTICA PARA SESSÃO FEEDBACK E FOLLOW-UP DO EQUILÍBRIO ENTRE VIDA &amp; CARREIRA X NÍVEL DE FELICIDADE&nbsp;</strong><br></h2>
                        </header>
                        <hr style="border:1px solid #000; width:50%; float:left;">
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="features-clean">
        <div class="container">
            <div class="intro">
               <!-- <h2 class="text-center">Features</h2>
                <p class="text-center">Nunc luctus in metus eget fringilla. Aliquam sed justo ligula. Vestibulum nibh erat, pellentesque ut laoreet vitae. </p>
                -->
            </div>
            <div class="row features">
                <div class="col-sm-6 col-lg-4 item"><i class="fa fa-comment-o icon"></i>
                    <h3 class="name"><strong>COLETIVO</strong></h3>
                    <p class="text-justify description">1º - Eu irei buscar o bem comum e contribuir para o fortalecimento da sociedade com serviços e produtos de qualidade e que garantam o bem-estar e o sucesso de meus semelhantes. <br><br>2º - Meus trabalhos serão realizados para atender
                        as necessidades de mudanças identificadas pelos meus clientes.<br></p>
                </div>
                <div class="col-sm-6 col-lg-4 item"><i class="fa fa-comment-o icon"></i>
                    <h3 class="name"><strong>HONESTIDADE:</strong><br></h3>
                    <p class="text-justify description">3º- Eu irei utilizar procedimentos que despertem as realizações pessoais, profissionais, que promovam a qualidade da vida humana e a felicidade.
                        <br><br>4º- Eu irei identificar casos onde meu cliente não está obtendo ganhos nos trabalhos de Coaching e irei interromper minhas atividades.
                        <br><br>5º- Quando eu identificar casos onde meu cliente pode obter maiores resultados com outros profissionais ou treinamentos eu irei imediatamente sugerir novas abordagens.&nbsp;
                    </p>
                </div>
                <div class="col-sm-6 col-lg-4 item"><i class="fa fa-comment-o icon"></i>
                    <h3 class="name"><strong>SIGILO</strong></h3>
                    <p class="text-justify description">6º- Eu irei respeitar os segredos das pessoas, dos negócios, das empresas e de qualquer cliente que possa utilizar meus serviços. Entendo que toda informação é sigilosa e que para ser utilizada deve antes ter o consentimento prévio e restrito do cliente.
                        e irrestrito do cliente.<br><br>7º- Eu irei guardar e registrar meus trabalhos buscando sempre preservar e garantir a individualidade de meus clientes.&nbsp;</p>
                </div>
                <div class="col-sm-6 col-lg-4 item"><i class="fa fa-comment-o icon"></i>
                    <h3 class="name"><strong>COMPETÊNCIA</strong></h3>
                    <p class="text-justify description">“A função de um citarista é tocar cítara, e de um bom citarista é tocá-la bem.” (Aristóteles).<br><br>8º- Eu sempre estarei avaliando a qualidade e os resultados de meus produtos e serviços. Entendo que o aperfeiçoamento contínuo é
                        a excelência desta profissão. Sempre que necessário buscarei apoio de outros profissionais para evoluir como pessoa e profissional.&nbsp;</p>
                </div>
                <div class="col-sm-6 col-lg-4 item"><i class="fa fa-comment-o icon"></i>
                    <h3 class="name"><strong>PRUDÊNCIA</strong><br></h3>
                    <p class="description">9º- Eu irei exercer minhas atividades com maior prudência possível. Analisarei as situações de forma profunda e minuciosa a sempre ponderando as decisões a serem tomadas e os resultados finais.&nbsp;<br><br>10º- Eu irei fazer com que
                        meu cliente entenda logo na primeira reunião a natureza do Coaching, sigilo com as informações e outros termos que garantam o sucesso do meu trabalho.</p>
                </div>
                <div class="col-sm-6 col-lg-4 item"><i class="fa fa-comment-o icon"></i>
                    <h3 class="name"><strong>VERDADE E HUMILDADE</strong></h3>
                    <p class="description">11º- Eu sei que não sou perfeito e que não possuo todas as respostas para atender as necessidades de meus clientes. Sempre atuarei com a verdade e humildade. </p>
                </div>
                <div class="col-sm-6 col-lg-4 item"><i class="fa fa-comment-o icon"></i>
                    <h3 class="name"><strong>RESPEITO</strong><br></h3>
                    <p class="text-justify description">12º- Eu irei respeitar outras abordagens que buscam promover a excelência, a felicidade e a qualidade de vida humana.<br>&nbsp;<br>13º- Eu sempre respeito o momento de meu cliente e atuo com a máxima excelência em todas as minhas abordagens.&nbsp;</p>
                </div>
            </div>
        </div>
    </div>
    <div class="highlight-clean">
        <div class="container">
        
            <div class="intro">
                <p class="text-center">Eu Roberto Rangel Madureira, prometo seguir o código de ética citado, valido o mesmo chancelando com a minha assinatura, dando fé aos termos nele lavrados. </p>
                  <p class="text-center">Eu Daniela Magalhães Pena Psicóloga, prometo seguir o código de ética citado, valido o mesmo chancelando com a minha assinatura, dando fé aos termos nele </lavrabr>dos. </p>
            </div>
             <div class="row">
        <div class="col"><img src="{{ asset('assets/wheel/img/ass.png') }}" width="200" class="img-center" style="float:right" /></div>
        <div class="col"><img src="{{ asset('assets/wheel/img/assinatura-daniela-png.png') }}" width="300" class="img-center" style="float:left" /></div>
    </div>
      
        
    <div id="send-msg" class="register-photo">
        <div class="form-container">
            <div class="image-holder" style="background-image: url({{ asset('assets/wheel/img/bbb.jpg') }});"></div>
            <form method="post" action="{{route('wheel.sendemail')}}">
                
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
                            <option value="Dúvidas" selected="">Dúvidas</option>
                            <option value="Elogios">Elogios</option>
                            <option value="Pedido">Pedido</option>
                        </optgroup>
                    </select>
                </div>
                <div class="form-group">
                    <textarea class="form-control" rows="31" cols="31" name="MSG" placeholder="Sua mensagem." required></textarea>
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="Notificacao">Quero receber novidades</label>
                    </div>
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
    <div class="footer-clean">
        <footer>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-4 col-md-3 item">
                        <h3>Serviços</h3>
                        <ul>
                            <li><a href="http://www.ibph.com.br" target="_blank">Web Site</a></li>
                            <li><a href="#">Home</a></li>
                            <li><a href="#send-msg">Contato</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4 col-md-3 item">
                        <h3>Rodas</h3>
                        <ul>
                            <li><a href="#roda-1">Roda 1</a></li>
                            <li><a href="#roda-2">Roda 2</a></li>
                            <li><a href="#roda-3">Roda 3</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4 col-md-3 item">
                        <h3>Psique</h3>
                        <ul>
                            <li><a href="#questions">Questões</a></li>
                            <li><a href="#explain-1">Feliciade</a></li>
                            <li><a href="#quote-1">Carreira</a></li>
                            <li><a href="#quote-2">Impedimentos</a></li>
                            <li><a href="#quote-3">Código de Ética</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 item social"><a href="https://www.facebook.com/ibphumana/" target="_blank"><i class="icon ion-social-facebook"></i></a><a href="https://br.linkedin.com/in/roberto-ibph-22689753" target="_blank"><i class="icon ion-social-linkedin"></i></a><a href="https://www.youtube.com/channel/UCoybhapfG93NLe5YG16QMTg"
                            target="_blank"><i class="icon ion-social-youtube"></i></a><a href="https://www.instagram.com/ibph_2018/" target="_blank"><i class="icon ion-social-instagram"></i></a>
                        <p class="copyright">Instituto Brasileiro da Performance Humana © 2019</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    
    @section('script')    
        <script src="{{ asset('assets/wheel/js/chart.js') }}"></script>
        <script src="{{ asset('assets/wheel/js/roda-1.js') }}"></script>
        <script src="{{ asset('assets/wheel/js/roda-2.js') }}"></script>
        <script src="{{ asset('assets/wheel/js/roda-3.js') }}"></script>
        <script src="{{ asset('assets/wheel/js/Swipe-Slider-6.js') }}"></script>   
        <script>
            var url_chart_1 = "{{route('api.wheel_satisfaction_with_life',$id)}}";
            var url_chart_2 = "{{route('api.wheel_satisfaction_4_human_intelligences',$id)}}";
            var url_chart_3 = "{{route('api.wheel_development_copetences_high_performance',$id)}}";
        
            $.getJSON( url_chart_1, function( data_chart_1 ) {

                createChart_1(
                    data_chart_1['saude_disposicao'],
                    data_chart_1['desen_intelectual'],
                    data_chart_1['equil_emocional'],
                    data_chart_1['criat_diversao'],           
                    data_chart_1['realizacao_proposito'],
                    data_chart_1['crescimento_aprendizado'],
                    data_chart_1['contribuicao_social'],
                    data_chart_1['recursos_financeiros'],
                    data_chart_1['relac_familiar'],
                    data_chart_1['relac_amoroso'],
                    data_chart_1['vida_social'],
                    data_chart_1['espiritualidade_legado']
                )

            }); 
            
            $.getJSON( url_chart_2, function( data_chart_2 ) {
                
                createChart_2(
                    data_chart_2['alimentacao_sabia'],
                    data_chart_2['saude_disposicao'],
                    data_chart_2['repouso'],         
                    data_chart_2['formacao'],
                    data_chart_2['autofeedback'],
                    data_chart_2['experiencia'],
                    data_chart_2['habilidades_interpessoais'],
                    data_chart_2['autoconsciencia'],
                    data_chart_2['empatia'],
                    data_chart_2['integridade'],
                    data_chart_2['legado'],
                    data_chart_2['carreira']
                )

            });    

            $.getJSON( url_chart_3, function( data_chart_3 ) {
                
                createChart_3(
                    data_chart_3['comunicacao'],
                    data_chart_3['eficacia_pessoal'],
                    data_chart_3['orientacao_objetivos'],         
                    data_chart_3['gestao_conflito'],
                    data_chart_3['foco_cliente'],
                    data_chart_3['gerenciamento'],
                    data_chart_3['resolucao_problema'],
                    data_chart_3['trabalho_equipe'],
                    data_chart_3['habilidades_interpessoais'],
                    data_chart_3['tomada_decisao'],
                    data_chart_3['lideranca'],
                    data_chart_3['flexibilidade']
                )

            });    

        </script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
                    title: "ÍNDICE BURN-OUT",
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
        <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {

                var data = google.visualization.arrayToDataTable([
                    ['Gráfico', 'Autoconhecimento'],
                    ['Conhecimento',     {{$cha->conhecimento_ser}}],
                    ['Habilidade',      {{$cha->habilidades_ter}}],
                    ['Atitude',  {{$cha->atitudes_fazer}}]
                ]);

                var options = {
                    title: 'Autoconhecimento com base no "CHA"',
                    is3D: true,
                    width: 900,
                    height: 600,
                    font: 20,
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                chart.draw(data, options);
            }
        </script>
        <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {

                var data = google.visualization.arrayToDataTable([
                    ['Gráfico', 'Autoconhecimento'],
                    ['Felicidades Positiva',     {{$wheel_satisfaction_with_life->felicidade_positivas}}],
                    ['Felicidades Neutra',      {{$wheel_satisfaction_with_life->felicidade_neutras}}],
                    ['Felicidades Negativa',  {{$wheel_satisfaction_with_life->felicidade_negativas}}]
                ]);

                var options = {
                    title: 'NÍVEL DE FELICIDADE',
                    is3D: true,
                    width: 900,
                    height: 600,
                    font: 20,
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

                chart.draw(data, options);
            }
        </script>

@endsection
@endsection
