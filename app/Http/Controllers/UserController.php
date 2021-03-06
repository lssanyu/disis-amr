<?php
namespace App\Http\Controllers;
//use Redirect;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator,Redirect,Response;
use Session, DB;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Input;
use Events\SuccessfulLogin;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{   

   // protected $username = 'username';

      /**
 * Get the login username to be used by the controller.
 *
 * @return string
 */
    public function username()
    {
        return 'username';
    }

 
    public function __construct(){
     
        $this->middleware('auth')->except(['index', 'registration', 'postLogin', 'postRegistration']);
    }

    

    //============dump and die============
    function dd($data){
    echo '<pre>';
    die(var_dump($data));
    echo '</pre>';
    }
    //==============================


    public function index()
    {   
        //dd(Auth::check());
      //  auth()->user()->givePermissioTo();
      
        //dd(auth()->user());
        
        // dd(Auth::check());
        return view('log');
    }

    public function registration()
    {
        return view('reg');
    }


    //===================handles the login process=================================
    public function postLogin(Request $request)
    {
        request()->validate(['user_name' => 'required', 'password' => 'required',]);  
        $credentials = $request->only('user_name', 'password');      

        if (Auth::attempt($credentials)){
            if(auth()->user()->user_name =='guest')
            {            
             if(auth()->user()->hasRole('guest')){
                return redirect()->intended(route('sample_with_growth'));
             }else{
                 auth()->user()->assignRole('guest');
              return redirect()->intended(route('sample_with_growth'));
             }
            }

            // event(new SuccessfulLogin());
            return redirect()->intended(route('home')); 
        }

        //Authentication Failed.
        Session::flash('error','Invalid Login credentials');
        return Redirect::back()->withInput($request->except('password')); //
    }
    //===================handles the login process=================================


    //===========================Register new user=================================
    public function postRegistration(Request $request)
    {  
        request()->validate([
        'user_name' => 'required|unique:users,user_name',
        'first_name' => 'required',
        'last_name' =>'required',
        'email' => 'required|email|unique:users,email',
        'password'=> ['required', 'string', 'min:8','confirmed']]);

        $data = $request->all();
        \Log::info($data);
         //dd($data);

        $userData = User::all();
        // dd($userData);
        self::createUser($data);
        return Redirect::to("/")->withSuccess('User successfuly created');
    }

     //===========================Register new user=================================

    //===========================Create user=================================
    public function createUser(array $data)
    {
        return User::create([
        'user_name' => $data['user_name'],
        'first_name' => $data['first_name'],
        'last_name' => $data['last_name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }
    //===========================Create user=================================


   /*==========================Assign Role===================================*/
    // public function assignRole()
    // {   
    //     // $user = User::distinct('username')->where('username', 'guest')->get();
        

    //     // dd($user);

    //     //Log::Info($user);
         
    //     return view('log');
    // }

   //===========================Logout=================================
    public function logout() {
        //dd(request()->session);
        if(request()->session){
        Session::flush();
        Auth::logout();
        Session::flash('error','Logged out due to inactivity');
        return Redirect("/");
        }


        Session::flush();
        Auth::logout();
        return Redirect("/")->withSuccess('Successfully Logged Out');
    }

    //===========================Logout=================================
}
