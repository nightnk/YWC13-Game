<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class SiteController extends Controller
{

  public function dashboard(Request $request){

	 $groupID=$request->session()->get('group');
	 $resultPoint = DB::table('point')->where('groupId', $groupID)->first();
	 $data =array('resultPoint'=>$resultPoint,'groupID'=>$groupID);
	 return view('site.dashboard',$data);
  }

  public function login(Request $request)
  {
     $requestStation="";
     if ($request->session()->has('requestStation')) {
     $requestStation=$request->session()->get('requestStation');
}
      return view('site.login',['requestStation'=>$requestStation]);
  }


  public function checkLogin(Request $request){
         $key = $request->input('key');
         $user = DB::table('users')->where('keypass', $key)->first();
         //$results = app('db')->select("SELECT * FROM user");
         $result=array('login'=>'error','code'=>0);
         if($user){
            $new_sessid   = \Session::getId(); //get new session_id after user sign in
            if($user->lastSessionId!=null){
                $last_session = \Session::getHandler()->read($user->lastSessionId); // retrive last session
                if ($last_session) {
                    if (\Session::getHandler()->destroy($user->lastSessionId));
                }
            }
            DB::update('update users set lastSessionId = :lastSessionId where id = :id', ['lastSessionId' =>$new_sessid ,'id' => $user->id]);
            $request->session()->put('group', $user->group);
            $request->session()->put('id', $user->id);
            $request->session()->put('login', true);
            $result['login'] = 'success';
            $result['code'] = '1';
			$result['session'] = \Session::getId();
         }
         return response()->json($result);
  }

}
