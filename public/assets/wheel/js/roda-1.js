function createChart_1(
    saude_disposicao,
    desen_intelectual,
    equil_emocional,
    criat_diversao,
    realizacao_proposito,
    crescimento_aprendizado,
    contribuicao_social,
    recursos_financeiros,
    relac_familiar,
    relac_amoroso,
    vida_social,
    espiritualidade_legado
){
    const CHART = document.getElementById('lineChart');
        
            var myChart = new Chart(CHART, {
                type: 'radar',
                data: {
                    
                    labels: [                        
                                "SAÚDE E DISPOSIÇÃO", 
                                "DESENVOLVIMENTO INTELECTUAL", 
                                "EQUILÍBRIO EMOCIONAL", 
                                "CRIATIVIDADE, HOBBIES & DIVERSÃO", 
                                "REALIZAÇÃO & PROPÓSITO",
                                "CRESCIMENTO E APRENDIZADO",
                                "CONTRIBUIÇÃO SOCIAL",
                                "RECURSOS FINANCEIROS",
                                "RELACIONAMENTO FAMILIAR",
                                "RELACIONAMENTO AMOROSO",
                                "VIDA SOCIAL",
                                "ESPIRITUALIDADE/LEGADO"
                            ],
                    
                    datasets: [{
                        
                        label: '',
                        boxWidth: 100,
                        fill: false,
                        pointRadius: 3,
                        pointStyle: 'circle',
                        pointBorderColor: [
                            '#013ADF',
                            '#013ADF',
                            '#013ADF',
                            '#013ADF',
                            '#013ADF',
                            '#013ADF',
                            '#013ADF',
                            '#013ADF',
                            '#013ADF',
                            '#013ADF',
                            '#013ADF',
                            '#013ADF',
                        ],
                        pointBackgroundColor: [
                            '#013ADF',
                            '#013ADF',
                            '#013ADF',
                            '#013ADF',
                            '#013ADF',
                            '#013ADF',
                            '#013ADF',
                            '#013ADF',
                            '#013ADF',
                            '#013ADF',
                            '#013ADF',
                            '#013ADF',
                        ],

                        data: [
                            saude_disposicao, 
                            desen_intelectual,
                            equil_emocional, 
                            criat_diversao,
                            realizacao_proposito, 
                            crescimento_aprendizado, 
                            contribuicao_social, 
                            recursos_financeiros, 
                            relac_familiar, 
                            relac_amoroso, 
                            vida_social, 
                            espiritualidade_legado
                        ],

                        backgroundColor: [
                            '#013ADF' 
                        ],
                        borderColor: [
                            '#013ADF'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    
                    layout: {
                        padding: {
                            left: 0,
                            right: 0,
                            top: 0,
                            bottom: 300
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
