<?php

namespace App\Http\Controllers\Auth;
use Auth;
use App\User;
use App\form_reg;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
//use Illuminate\Support\Facades\Auth;
///////////////////////////////////////////////////////////////////////////////
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
///////////////////////////////////////////////////////////////////////////////


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

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';
   

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
    {
        return Validator::make($data, [
			'form_id' => 'required|string', //Form_id is Unique
			'reg_code' => 'required|string|unique:users', //Regisration Code is unique
            'user_name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'form_id'=>$data['form_id'],
            'reg_code'=>$data['reg_code'],
            'user_name' => $data['user_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
       
    }

/////////////////////////////////////////////////////////////////////////////////////////////
/**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        $form_id1 = $request->form_id;
        $reg_code1 = $request->reg_code;

        $reg_test = substr(strtoupper(md5(strtoupper(strtoupper($form_id1)).'AOT65498546465464uods55klo657ds64f654sd4fsd6fsd'.date('Y'))),-8);
 
        if($form_id1=='0')
        {
           $request->session()->flash('alert-danger', 'Please register casefully!! Your activity will be recorded!! ');
           return redirect()->route('register');
        }

        else if($reg_test==($reg_code1))
        {
            // $this->create($request->all());
            // $request->session()->flash('alert-success', 'Registration Successfull... Please Log in');
            // return redirect()->route('login');

        //    $this->create($request->all());
        //     $request->session()->flash('alert-success', 'Registration Successfull... Please Log in');
        //     return redirect('/home');
           

            event(new Registered($user = $this->create($request->all())));
            return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
        }
        else
        {
            $request->session()->flash('alert-danger', 'Please Enter Form id and Registration Code Carefully !');
           return redirect()->route('register'); //->with(['success' => 'Congratulations! your account is now activated.']);
        }
    }

}
