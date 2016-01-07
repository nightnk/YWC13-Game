<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class StationController extends Controller
{

    private $codeStationMap = array(
     "qikg64"=>"1",
     "d8lWCf"=>"2",
     "BVFAft"=>"3",
     "8vWI67"=>"4",
     "3kVnsI"=>"5",
     "7jq8YI"=>"6",
     "5e7pce"=>"7",
     "HZrIks"=>"8",
     "XOvlZO"=>"9",
     "Z6fjbZ"=>"10",
     "E5B2ML"=>"11",
     "VyRqSF"=>"12",
     "YJEsnC"=>"13",
     "iv2kn9"=>"14",
     "AvHvhc"=>"15"

   );

  public function question($stationCode,Request $request){
    $stationID=$this->codeStationMap[$stationCode];
    $groupID=$request->session()->get('group');


    $resultStation = DB::select('select * from station where id =:stationId', ['stationId'=>$stationID]);

    if($resultStation[0]->status==1){
        $diffTimeActivity=time()-$resultStation[0]->lastActivity;
        //check time out
        if($diffTimeActivity<20){
          return view('station.notAnswer',['status'=>'station']);
        }

    }

    $resultGroup = DB::select('select status,timestamp from group_log where groupId = :group and stationId=:stationId  ORDER BY id DESC LIMIT 1', ['group'=>$groupID,'stationId'=>$stationID]);

    if($resultGroup) {
      if($resultGroup[0]->status=="-1" || $resultGroup[0]->status=="1" ){
          return view('station.notAnswer',['status'=>'submited']);
      }
      else if($resultGroup[0]->status=="0"){

          $lastTime = new \DateTime($resultGroup[0]->timestamp);
          $nowTime = new \DateTime();
          $timeDiff= $lastTime->diff($nowTime);
          $minutesdiff = $timeDiff->days * 24 * 60;
          $minutesdiff += $timeDiff->h * 60;
          $minutesdiff += $timeDiff->i;
          //echo $minutesdiff;
          //1 min
          if($minutesdiff<1) return view('station.notAnswer',['status'=>'time']);

      }
    }

    DB::update('update station set status = 1 , lastActivity = :lastActivity where id =:stationId', ['stationId'=>$stationID,'lastActivity'=>time()]);

    //Random question
    $resultsQ = DB::select('select id,stationId,text from question where stationId = :stationId' , ['stationId'=>$stationID]);

    $indexQ=mt_rand(0,count($resultsQ)-1);
    //var_dump($resultsQ[$indexQ]);
    $question=$resultsQ[$indexQ];
    $resultsC = DB::select('select choiceId,questionId,text from choice where questionId = :questionId' , ['questionId'=>$question->id]);
    //var_dump($resultsC);

    $data = array(
      'question'=>$question,
      'choices'=>$resultsC
    );
    return view('station.question',$data);
  }

    public function submitQ(Request $request){

       $choice = $request->input('inputChoice');
       $questionID = $request->input('questionID');
       $stationID= $request->input('stationID');

       $groupID=$request->session()->get('group');
       $correctChoice=0;

       if($choice!=null) {
           $correctChoice=0;
           $resultsQ = DB::select('select question.correctChoiceId,choice.point from question join choice on choice.questionId=question.id where question.id = :id and choice.choiceId = :choiceId ' , ['id'=>$questionID,'choiceId'=>$choice]);
           if($resultsQ){

             if($resultsQ[0]->correctChoiceId==$choice){
               $correctChoice=1;
             }else {
               $correctChoice=-1;
             }

           }
            DB::update('update point set point = point + :point where groupId =:groupId', ['point'=>$resultsQ[0]->point,'groupId'=>$groupID]);
      }

       DB::update('update station set status = 0 where id =:stationId', ['stationId'=>$stationID]);
       DB::insert('insert into group_log (groupId, stationId,answer,status) values (?, ?, ?, ?)', [$groupID, $stationID,$choice,$correctChoice]);
       $resultsG = DB::select('select point from point where groupId = :groupId' , ['groupId'=>$groupID]);


       $data = array(
         'correctChoice'=>$correctChoice,
         'stationID'=>$stationID,
         'point'=>$resultsG[0]->point
       );

       return view('station.result',$data);

    }
}
