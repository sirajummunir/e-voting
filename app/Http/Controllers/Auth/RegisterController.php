<?php

namespace App\Http\Controllers\Auth;

use \Cache;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/login';

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
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function registerUser($data)
    {
        event(new Registered($user = $this->create($data)));

        $this->guard()->login($user);

        return redirect($this->redirectPath());
    }


    /**
     * Cache user reg data for code verification
     * @param  Request $request [description]
     * @return response           Redirect to code verification
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        // return $request->all();
        $data = $request->all();
        $data['code'] = rand(100000, 999999);
        \Log::info('Verification code for '.$data['email']. ' is '. $data['code']);
        
        $data['image'] = md5($data['email']).".jpg";
        if ($request->file('profile') != null) {
            $request->file('profile')->move(public_path('images'), $data['image']);
        }else{
            return back()->with('Invalid Photo.');
        }
        unset($data['profile']);

        Cache::put(md5($data['email']), $data, 5);
        return redirect(route('regCode'))->with('success', 'Please enter the email verification code below to activate account.');
    }

    public function regCode()
    {
        return view('auth.regCode');
    }

    public function verifyCode(Request $request)
    {
        // return $request->all();
        if (!$request->has('email') || !$request->has('code')) {
            return back()->with('danger', 'Fill up your email and the code you received.');
        }
        $data = Cache::get(md5($request->email), false);
        if(!$data){
            return back()->with('danger', 'Either the email doesn\'t exist or the code has expired.');
        }
        if($data['code'] != $request->code){
            return back()->with('danger', 'The code is Invalid.');
        }
        unset($data['code']);
        return $this->registerUser($data);
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        /*return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);*/

        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'nid'  => 'required|string|unique:users|size:17',
            'birthday' => 'required',
            'father_name' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'profile'  => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            //|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/
            'present_division' => 'required',
            'present_district' => 'required',
            'present_upazilla' => 'required',
            'present_village' => 'required',
            'present_po' => 'required',
            'present_pc' => 'required',
            'permanent_division' => '',
            'permanent_district' => '',
            'permanent_upazilla' => '',
            'permanent_village' => '',
            'permanent_po' => '',
            'permanent_pc' => '',
            'religion'    => 'required',
            'marital'     => 'required',
            'gender'      => 'required|string|size:1',
            'blood'       => 'required|string|max:3',
            'occupation'  => 'required|string|max:255',
            'mobile'      => 'required|string|min:11|max:13'
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
        /*return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);*/

        if(!isset($data['permanent_division'])){
            $data['permanent_division'] = $data['present_division'];
            $data['permanent_district'] = $data['present_district'];
            $data['permanent_upazilla'] = $data['present_upazilla'];
            $data['permanent_village']  = $data['present_village'];
            $data['permanent_po']       = $data['present_po'];
            $data['permanent_pc']       = $data['present_pc'];
        }
        unset($data['password_confirmation']);
        $data['password'] = bcrypt($data['password']);
        $data['birthday'] = Carbon::parse($data['birthday']);
        // if (!isset($data['birthday'])) {
        //     dd("test");
        // }
        return User::create($data);
    }
}
