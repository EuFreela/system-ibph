alert('aqui')
function getChartCareer_1(
    deprimido,
    pensar_negativo,
    frio_insensivel,
    irritado,
    incompreendido,
    ninguem_conversar,
    executando_menos,
    pouca_pressao,
    falha_fora_emprego,
    profissao_errada,
    frustrado,
    burocracia,
    menos_habilidade,
    sem_tempo,
    sem_tempo_planejar
){

	alert('2')
	
    var sum = [
        deprimido,
        pensar_negativo,
        frio_insensivel,
        irritado,
        incompreendido,
        ninguem_conversar,
        executando_menos,
        pouca_pressao,
        falha_fora_emprego,
        profissao_errada,
        frustrado,
        burocracia,
        menos_habilidade,
        sem_tempo,
        sem_tempo_planejar
     ];

    var element = sumPoints(sum)
   
    google.charts.load("current", {packages:['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
          var data = google.visualization.arrayToDataTable([
            ["Element", "Pontuação", { role: "style" } ],
            ["DE JEITO NENHUM", 100, "#00b0f0"],
            ["RARAMENTE", 10, "#6699ff"],
            ["ALGUMAS VEZES", 10, "#fec4ba"],
            ["COM MÉDIA FREQUÊNCIA", 10, "#fd664d"],
            ["COM MUITA FREQUÊNCIA", 10, "#ff0000"]
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

}

function sumPoints( sum )    
{
    
    var i;
    var _sum = [];

    _sum[1] = 0;
    _sum[2] = 0;
    _sum[3] = 0;
    _sum[4] = 0;
    _sum[5] = 0;

    for (i = 0; i < 15; i++) { 
        
        switch ( sum[i] ) {
            
            case 1:            
                _sum[1] = _sum[1] + sum[i]
                break;          
            case 2:
                _sum[2] = _sum[2] + sum[i]
                break;
            case 3:
                _sum[3] = _sum[3] + sum[i]
                break;
            case 4:
                _sum[4] = _sum[4] + sum[i]
                break;
            case 5:
                _sum[5] = _sum[5] + sum[i]
                break;

          }

    }

    return _sum;

}
