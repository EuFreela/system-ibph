<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuestionsModel;
use App\Models\AnswersModel;
use DB;
use DateTime;

class HomeController extends Controller
{
    /**
     * GETTERS
     */    
    public function getWheel($email,$hash)
    {           
        if(DB::table('Inscricao')->whereRaw('email=? and codigoAvaliacao=?',[$email,$hash])->orderBy('id','desc')->count()>0):
           
            $id=DB::table('Inscricao')->where('codigoAvaliacao','=',$hash)->orderBy('id','desc')->first()->id;
            
            /**
             * career
             */
            $elements = $this->sumPoint($id);           
            $sum = $elements[0]+$elements[1]+$elements[2]+$elements[3]+$elements[4];
           
            /**
             * wheel
             */
            return view('wheels.wheel')
                ->with([
                    'id'=>$id,
                    'client'=>DB::table('Inscricao')->where('id','=',$id)->orderBy('id','desc')->first(),
                    'questions'=>DB::table('Questions')->get(),
                    'answers'=>DB::table('Answers')->where('inscription_id','=',$id)->get(),
                    'wheel_satisfaction_with_life'=>DB::table('AreaVida')->where('id_avaliado','=',$id)->orderBy('id','desc')->first(),
                    'wheel_satisfaction_4_human_intelligences'=>DB::table('QuatroInteligencias')->where('id_avaliado','=',$id)->orderBy('id','desc')->first(),
                    'wheel_development_copetences_high_performance'=>DB::table('Competencias')->where('id_avaliado','=',$id)->orderBy('id','desc')->first(),
                    'elements' => $elements,
                    'sum' => $sum,
                    'self_observation'=>DB::table('AutoObservacao')->where('id_avaliado','=',$id)->orderBy('id','desc')->first(),
                    'cha'=>DB::table('Cha')->where('id_avaliado','=',$id)->orderBy('id','desc')->first(),
                    'sum_felicidades' => $this->sumHappyness($id)
                ]);

        endif;
        return redirect()->back()->with('error','Erro! Credencial não encontrada'); 
    }

    /*public function getCareer($email,$hash)
    {           
        if(DB::table('Inscricao')->whereRaw('email=? and codigoAvaliacao=?',[$email,$hash])->orderBy('id','desc')->count()>0):

            $id=DB::table('Inscricao')->where('codigoAvaliacao','=',$hash)->orderBy('id','desc')->first()->id;

            $elements = $this->sumPoint($id);
            $sum = $elements[0]+$elements[1]+$elements[2]+$elements[3]+$elements[4];

            return view('career.career')
                ->with([
                    'id'=>$id,
                    'client'=>DB::table('Inscricao')->where('id','=',$id)->orderBy('id','desc')->first(),                    
                    'self_observation'=>DB::table('AutoObservacao')->where('id_avaliado','=',$id)->orderBy('id','desc')->first(),
                    'elements' => $elements,
                    'sum' => $sum
                ]);
        endif;
        redirect()->back()->with('error','Ocorreu algum erro!');
    }*/

    /**
     * POSTTERS
     */
    public function postQuestions(Request $request, $id)
    {
        $request->validate([
            'answer' => 'required'
        ]);

        /*for($i=0;$i<QuestionsModel::count();$i++):
            echo $request->answer[$i]."<br>";            
        endfor;*/

        if(AnswersModel::where('inscription_id','=',$id)->count()<=0):
            for($i=0;$i<QuestionsModel::count();$i++):
                AnswersModel::create([
                    'inscription_id' => $id,
                    'question_id' => QuestionsModel::where('number','=',$i+1)->first()->id,
                    'answer' => $request->answer[$i]
                ]);
            endfor;
        else:
            $i=0;
            for($i=0;$i<QuestionsModel::count();$i++):
                AnswersModel::where('inscription_id','=',$id)->where('question_id','=',$i+1)
                ->update([
                    'answer' => $request->answer[$i]
                ]);
            endfor;

        endif;

        return redirect()->back();        

    }


    /**
     * FUNÇÕES PRIVADAS
     */
    public function sumPoint( $id )
    {
        $el = DB::table('AutoObservacao')->where('id_avaliado','=',$id)->orderBy('id','desc')->first();
        $arr = array(0,0,0,0,0);

        $arr = $this->check( isset($el->deprimido) ? $el->deprimido : 0, $arr );
        $arr = $this->check( isset($el->pensar_negativo) ? $el->pensar_negativo : 0, $arr );
        $arr = $this->check( isset($el->frio_insensivel) ? $el->frio_insensivel : 0, $arr );
        $arr = $this->check( isset($el->irritado) ? $el->frio_insensivel : 0, $arr );
        $arr = $this->check( isset($el->incompreendido) ? $el->incompreendido : 0, $arr );
        $arr = $this->check( isset($el->ninguem_conversar) ? $el->ninguem_conversar : 0, $arr );
        $arr = $this->check( isset($el->executando_menos) ? $el->executando_menos : 0, $arr );
        $arr = $this->check( isset($el->executando_menos) ? $el->executando_menos : 0, $arr );
        $arr = $this->check( isset($el->falha_fora_emprego) ? $el->falha_fora_emprego : 0, $arr );
        $arr = $this->check( isset($el->profissao_errada) ? $el->profissao_errada : 0, $arr );
        $arr = $this->check( isset($el->frustrado) ? $el->frustrado : 0, $arr );
        $arr = $this->check( isset($el->frustrado) ? $el->frustrado : 0, $arr );
        $arr = $this->check( isset($el->menos_habilidade) ? $el->frustrado : 0, $arr );
        $arr = $this->check( isset($el->sem_tempo) ? $el->sem_tempo : 0, $arr );
        $arr = $this->check( isset($el->sem_tempo_planejar) ? $el->sem_tempo_planejar : 0, $arr );


        return $arr;
    }

    public function check( $val, $arr )
    {
        if($val==1) $arr[0] = $arr[0] + 1;
        if($val==2) $arr[1] = $arr[1] + 2;
        if($val==3) $arr[2] = $arr[2] + 3;
        if($val==4) $arr[3] = $arr[3] + 4;
        if($val==5) $arr[4] = $arr[4] + 5;

        return $arr;
    }

    private function sumHappyness($id)
    {
        $felicidades_positivas = isset(DB::table('AreaVida')->where('id_avaliado','=',$id)->orderBy('id','desc')->first()->felicidade_positivas)
        ? DB::table('AreaVida')->where('id_avaliado','=',$id)->orderBy('id','desc')->first()->felicidade_positivas : 0;
        $felicidades_negativas = isset(DB::table('AreaVida')->where('id_avaliado','=',$id)->orderBy('id','desc')->first()->felicidade_negativas)
        ? DB::table('AreaVida')->where('id_avaliado','=',$id)->orderBy('id','desc')->first()->felicidade_negativas : 0;
        $felicidades_neutras = isset(DB::table('AreaVida')->where('id_avaliado','=',$id)->orderBy('id','desc')->first()->felicidade_neutras)
        ? DB::table('AreaVida')->where('id_avaliado','=',$id)->orderBy('id','desc')->first()->felicidade_neutras : 0;


        return (str_replace("%","",$felicidades_positivas)) + (str_replace("%","",$felicidades_negativas)) + (str_replace("%","",$felicidades_neutras));
       
    }



}
