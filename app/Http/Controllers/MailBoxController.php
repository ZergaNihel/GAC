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
use DB;
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
    
        
        if(Auth::user()->role == 1 || Auth::user()->role == 0)
            return view('mailbox.index',compact('sem1','sem2'));
        elseif(Auth::user()->role == 3 || Auth::user()->role == 2 )
            return view('EnseignantR.mailbox.index',compact('sem1','sem2'));
    }

   function  envoye(){
        $b=0;
        $emails = Message::where('id_emt','=',Auth::user()->id)->where('save','=',0)->where('delete','=',0)->orderBy('created_at', 'DESC')->get();
        $sem1 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 1')->get();
        $sem2 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 2')->get();
    
        
        //return view('mailbox.emails',compact('sem1','sem2','emails','b'));
        if(Auth::user()->role == 1 || Auth::user()->role == 0)
            return view('mailbox.emails',compact('sem1','sem2','emails','b'));
        elseif(Auth::user()->role == 3 || Auth::user()->role == 2 )
            return view('EnseignantR.mailbox.emails',compact('sem1','sem2','emails','b'));
   }


    function  brouillons(){
         $b=1;
    $emails = Message::where('id_emt','=',Auth::user()->id)->where('save','=',1)->where('delete','=',0)->orderBy('updated_at', 'DESC')->get();
    $sem1 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 1')->get();
    $sem2 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 2')->get();
  

     //return view('mailbox.emails',compact('sem1','sem2','emails','b'));

     if(Auth::user()->role == 1 || Auth::user()->role == 0)
            return view('mailbox.emails',compact('sem1','sem2','emails','b'));
        elseif(Auth::user()->role == 3 || Auth::user()->role == 2 )
            return view('EnseignantR.mailbox.emails',compact('sem1','sem2','emails','b'));
    }


     function  corbeille(){
         $b=2;
   $emails = Message::where('id_emt','=',Auth::user()->id)->where('delete','=',1)->orderBy('updated_at', 'DESC')->get();
    $sem1 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 1')->get();
    $sem2 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 2')->get();
  
    
    //return view('mailbox.emails',compact('sem1','sem2','emails','b'));

        if(Auth::user()->role == 1 || Auth::user()->role == 0)
            return view('mailbox.emails',compact('sem1','sem2','emails','b'));
        elseif(Auth::user()->role == 3 || Auth::user()->role == 2 )
            return view('EnseignantR.mailbox.emails',compact('sem1','sem2','emails','b'));
     }


    function  enregistrer(Request $request)
    {
        $message=Message::create(['msg'=>$request->msg,'sujet'=>$request->sujet,'id_emt'=>Auth::user()->id,'id_rcpt'=>$request->email,'save'=>1]);

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
    
        return response()->json(["success"=>"heloo"]);
    }

    function  delete($id,$id_notif){
            $message=Message::find($id);
            $message->delete = 1;
            $message->save();
            DB::table('notifications')
            ->where('id', $id_notif)
            ->delete();
            //Auth::user()->notifications
        
            return redirect('/boite_de_reception');
     }

     function composer(){
            $users = User::all();
            $sem1 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 1')->get();
            $sem2 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 2')->get();
        
            
            //return view('mailbox.composer',compact('sem1','sem2','users'));
            if(Auth::user()->role == 1 || Auth::user()->role == 0)
                return view('mailbox.composer',compact('sem1','sem2','users'));
            elseif(Auth::user()->role == 3 || Auth::user()->role == 2 )
                return view('EnseignantR.mailbox.composer',compact('sem1','sem2','users'));
            
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
        $nbr=0;   
            if($request->hasFile('files')){
      	
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
    
        
        //return view('mailbox.detail',compact('sem1','sem2','message','medias','nbr','id_notif'));

        if(Auth::user()->role == 1 || Auth::user()->role == 0)
            return view('mailbox.detail',compact('sem1','sem2','message','medias','nbr','id_notif'));
        elseif(Auth::user()->role == 3 || Auth::user()->role == 2 )
            return view('EnseignantR.mailbox.detail',compact('sem1','sem2','message','medias','nbr','id_notif'));
    }
 

}
