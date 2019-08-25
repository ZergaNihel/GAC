<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Etudiant;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use \App\Http\Controllers\Auth\Redirect;
use flash;
use Notification;
use Session;
use App\Notifications\nouvelEtudiant;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */


    use RegistersUsers;

    //protected function redirectTo(){}
       
    

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/absences_Etudiant';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
     protected function validator(array $data)
    { $matricule=$data['matricule'];
        return Validator::make($data, [
            //'name' => ['required', 'string', 'max:255'],
     'matricule' => ['required', 'string', 'max:255','unique:users',Rule::exists('etudiants')->where(function($query) use ($matricule){
                $query->where('matricule',$matricule);
            }),
          ],
            'email' => ['required', 'string', 'email', 'max:255','unique:users' ],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            
        ]);
    }

   /*    public function redirectTo()
    {
            $p = DB::table('etudiants')
                ->where('matricule',$data['matricule'] )
                ->count();
                if($p>0){ 

    //    public function redirectTo()
    // {
    //         $p = DB::table('etudiants')
    //             ->where('matricule',$data['matricule'] )
    //             ->count();
    //             if($p>0){ 

         
        
    //         return '/presence';
    //     } else {
    //         return '/home';
    //     }
   

    }*/

    // }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)

    { 
     
   $ids= DB::table('etudiants')
                ->where('matricule',$data['matricule'] )
                ->select('idEtu')
                ->get();
                foreach ($ids as $key) {
                   $id = $key->idEtu;
                }
            /* $p = DB::table('etudiants')
                ->where('matricule',$data['matricule'] )
                ->count();
                if($p>0){   */
         $user = User::create([
            //'name' => $data['name'],

           'matricule' => $data['matricule'],
            'role' => 0,
            'email' => $data['email'],
            'id_Etu' => $id,
            'password' => Hash::make($data['password']),
        ]);
         $details = [
            'id_user' => $user->id,
            'nom' => $user->etudiant->nom,
            'prenom' => $user->etudiant->prenom,
            'date_naissance' => $user->etudiant->date_naissance,
            'matricule' => $user->etudiant->matricule,
            'type' => $user->etudiant->type,
            'email' => $user->email,
        ];
        $admins = User::where('role',1)->get();
  foreach ($admins as $admin) {
    
     Notification::send($admin, new nouvelEtudiant($details));
   }
        

        return $user;
    //}
  
    }
}
