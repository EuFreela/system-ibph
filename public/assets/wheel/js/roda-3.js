function createChart_3(

    comunicacao,
    eficacia_pessoal,
    orientacao_objetivos,         
    gestao_conflito,
    foco_cliente,
    gerenciamento,
    resolucao_problema,
    trabalho_equipe,
    habilidades_interpessoais,
    tomada_decisao,
    lideranca,
    flexibilidade

){
    
    const CHART3 = document.getElementById('lineChart3');
    
        var myChart = new Chart(CHART3, {
            type: 'radar',
            data: {
                
                labels: [
                "COMUNICAÇÃO",
                "EFICÁCIA PESSOAL",
                "ORIENTAÇÃO PARA OBJETIVOS",
                "GESTÃO DE CONFLITOS",
                "FOCO NO CLIENTE",
                "GERENCIAMENTO",
                "RESOLUÇÃO DE PROBLEMAS",
                "TRABALHO EM EQUIPE",
                "HABILIDADES INTERPESSOAIS",
                "TOMADA DE DECISÃO",
                "LIDERANÇA",
                "FLEXIBILIDADE"
                ],
                
                datasets: [{
                    
                    label: '',
                    boxWidth: 100,
                    fill: false,
                    pointRadius: 3,
                    pointStyle: 'circle',
                    pointBorderColor: [
                        '#6A0888',
                        '#6A0888',
                        '#6A0888',
                        '#6A0888',
                        '#6A0888',
                        '#6A0888',
                        '#6A0888',
                        '#6A0888',
                        '#6A0888',
                        '#6A0888',
                        '#6A0888',
                        '#6A0888',
                    ],
                    pointBackgroundColor: [
                        '#6A0888',
                        '#6A0888',
                        '#6A0888',
                        '#6A0888',
                        '#6A0888',
                        '#6A0888',
                        '#6A0888',
                        '#6A0888',
                        '#6A0888',
                        '#6A0888',
                        '#6A0888',
                        '#6A0888',
                    ],

                    data: [                        
                        comunicacao,
                        eficacia_pessoal,
                        orientacao_objetivos,         
                        gestao_conflito,
                        foco_cliente,
                        gerenciamento,
                        resolucao_problema,
                        trabalho_equipe,
                        habilidades_interpessoais,
                        tomada_decisao,
                        lideranca,
                        flexibilidade
                    ],

                    backgroundColor: [
                        '#6A0888',                        
                    ],
                    borderColor: [
                        '#6A0888',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                 
                 layout: {
                    padding: {
                        left: 50,
                        right: 0,
                        top: 0,
                        bottom: 0
                    }
                },
                legend: {
                    display: false,
                    labels: {
                        fontColor: 'red'
                    }
                },
                legendCallback: function(chart) {
                    return '<b>'+chart+'</b>'
                },
                title: {
                    display: false,
                    text: 'Custom Chart Title'
                },
                tooltips: {
                    //mode: 'point'
                    //mode: 'nearest'
                    //mode: 'index',
                    //axis: 'y'
                    //mode: 'dataset'
                    //mode: 'x'
                },
                hover: {
                    // Overrides the global setting
                    //mode: 'index'
                }
                
                
            }
        });
}