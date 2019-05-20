<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
use Session;
use App\Message;
use App\Semestre;
use App\User;
use App\Media;
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
   function  envoye(){
   	$emails = Message::where('id_emt','=',Auth::user()->id)->get();
   	$sem1 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 1')->get();
    $sem2 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 2')->get();
  
    
     return view('mailbox.emails',compact('sem1','sem2','emails'));
   }
    function  brouillons(){
    $emails = Message::where('id_emt','=',Auth::user()->id)->where('id_rcpt','=',NULL)->get();
    $sem1 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 1')->get();
    $sem2 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 2')->get();
  
    
     return view('mailbox.emails',compact('sem1','sem2','emails'));
    }
     function  corbeille(){
   $emails = Message::where('id_emt','=',Auth::user()->id)->where('delete','=',1)->get();
    $sem1 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 1')->get();
    $sem2 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 2')->get();
  
    
    return view('mailbox.emails',compact('sem1','sem2','emails'));
     }
        function  enregistrer(Request $request){
   $emails = Message::where('id_emt','=',Auth::user()->id)->where('delete','=',1)->get();
    $sem1 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 1')->get();
    $sem2 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 2')->get();
  
    
    return view('mailbox.emails',compact('sem1','sem2','emails'));
     }

     function composer(){
    $users = User::all();
    $sem1 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 1')->get();
    $sem2 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 2')->get();
  
    
    return view('mailbox.composer',compact('sem1','sem2','users'));
    }
    function send(Request $request){
    	 $messages = [
    'required'    => 'le champs :attribute est obligatoire.',
    'min'    => 'le champs :attribute doit contenir au moins 4 lettres ',
    /*'mimes'    => 'le champs :attribute doit être compatible avec le format jpeg,bmp,png,docx,xlsx,pdf,pptx,zip,rar . ',*/
];
   $validator = Validator::make($request->all(), [
            'email' => 'required',
            'msg' => 'required|min:5',
           // 'files' => 'mimes:jpeg,bmp,png,docx,xlsx,pdf,pptx,zip,rar'
            ],$messages);
 
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
    	$user = User::find($request->email);
    $message=Message::create(['msg'=>$request->msg,'sujet'=>$request->sujet,'id_emt'=>Auth::user()->id,'id_rcpt'=>$request->email,]);

            if($request->hasFile('files')){
        $nbr=0;    	
  foreach ($request->file('files') as $file) {
  	//dd($file->getClientOriginalExtension());
  	$ex = $file->getClientOriginalExtension();
  	$name = $file->getClientOriginalName();
  
           $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/attachements'),$file_name);
$media = Media::create(['att'=>$file_name,'ex'=>$ex,'file_name'=>$name,'id_msg'=> $message->id,]);
         $nbr++;  
        }
           
        }
      
    $details = [
            'id_msg' => $message->id ,
            'msg' => $message->msg,
            'sujet' => $message->sujet,
            'id_emt' => Auth::user()->id,
            'nbr_att' => $nbr
        ];
  
        Notification::send($user, new MsgNotification($details));
   
    return redirect('/boite_de_reception');
    }
    function detail($id,$id_notif){
Auth::user()->unreadNotifications->where('id', $id_notif)->markAsRead();
    $message = Message::find($id);
    $nbr = Media::where('id_msg','=',$id)->count();
    $medias = Media::where('id_msg','=',$id)->get();
    
    $sem1 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 1')->get();
    $sem2 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 2')->get();
  
    
    return view('mailbox.detail',compact('sem1','sem2','message','medias','nbr'));
    }
 

}
