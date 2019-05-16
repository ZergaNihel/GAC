<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Message;
use App\Semestre;
use App\User;
use Notification;
use App\Notifications\MsgNotification;
class MailBoxController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    function index(){
    $sem1 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 1')->get();
    $sem2 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 2')->get();
  
    
    return view('mailbox.index',compact('sem1','sem2'));
    }
     function composer(){
    $users = User::all();
    $sem1 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 1')->get();
    $sem2 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 2')->get();
  
    
    return view('mailbox.composer',compact('sem1','sem2','users'));
    }
    function send(Request $request){
    	$user = User::find($request->email);
    $message=Message::create(['msg'=>$request->msg,'sujet'=>$request->sujet,'id_emt'=>Auth::user()->id,'id_rcpt'=>$request->email,]);
    $details = [
            'id_msg' => $message->id ,
            'msg' => $message->msg,
            'sujet' => $message->sujet,
            'id_emt' => Auth::user()->id
        ];
  
        Notification::send($user, new MsgNotification($details));
   
    return $message;
    }
    function detail($id){
    $message = Message::find($id);
    $sem1 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 1')->get();
    $sem2 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 2')->get();
  
    
    return view('mailbox.detail',compact('sem1','sem2','message'));
    }
}
