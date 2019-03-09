function createChart_2(
    alimentacao_sabia,
    saude_disposicao,
    repouso,         
    formacao,
    autofeedback,
    experiencia,
    habilidades_interpessoais,
    autoconsciencia,
    empatia,
    integridade,
    legado,
    carreira
){

    const CHART2 = document.getElementById('lineChart2');
        
            var myChart = new Chart(CHART2, {
                type: 'radar',
                data: {
                    
                    labels: [
                    "ALIMENTAÇÃO..(A)",
                    "EXERCÍCIOS.. (B)",
                    "REPOUSO.. (C)",
                    "FORMAÇÃO.. (D)",
                    "AUTOFEEDBACK.. (E)",
                    "APRENDER.. (F)",
                    "HABILIDADES.. (G)",
                    "AUTOCONSCIÊNCIA.. (H)",
                    "AUTOMOTIVAÇÃO.. (I)",
                    "INTEGRIDADE.. (J)",
                    "SENTIDO DA VIDA.. (K)",
                    "ALINHAMENTO.. (L)"
                    ],
                    
                    datasets: [{
                        
                        label: '',
                        boxWidth: 100,
                        fill: false,
                        pointRadius: 3,
                        pointStyle: 'circle',
                        pointBorderColor: [
                            '#FF8000',
                            '#FF8000',
                            '#FF8000',
                            '#FF8000',
                            '#FF8000',
                            '#FF8000',
                            '#FF8000',
                            '#FF8000',
                            '#FF8000',
                            '#FF8000',
                            '#FF8000',
                            '#FF8000',
                        ],
                        pointBackgroundColor: [
                            '#FF8000',
                            '#FF8000',
                            '#FF8000',
                            '#FF8000',
                            '#FF8000',
                            '#FF8000',
                            '#FF8000',
                            '#FF8000',
                            '#FF8000',
                            '#FF8000',
                            '#FF8000',
                            '#FF8000',
                        ],

                        data: [
                            alimentacao_sabia,
                            saude_disposicao,
                            repouso,         
                            formacao,
                            autofeedback,
                            experiencia,
                            habilidades_interpessoais,
                            autoconsciencia,
                            empatia,
                            integridade,
                            legado,
                            carreira
                        ],

                        backgroundColor: [
                            '#FF8000'
                        ],
                        borderColor: [
                            '#FF8000'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    
                    layout: {
                        padding: {
                            left: 100,
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
                        mode: 'point'
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