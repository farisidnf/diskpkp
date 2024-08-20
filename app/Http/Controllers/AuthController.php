<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\LokasiSudin;
use App\Models\Bidang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    /**
     * Instantiate a new LoginRegisterController instance.
     */
    public function __construct()
    {
        // $this->middleware('guest')->except([
        //     'logout', 'dashboard'
        // ]);
    }

    /**
     * Display a registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $kategori  = $request->kategori;
        if($kategori=="sektoral" || $kategori=="sudin" || $kategori=="perusahaan"){
            $kategori = $kategori;
        }else{
            $kategori = "sektoral";
        }
        if($kategori=="sektoral"){
            $urllogin = "/login";
        }else{
            $urllogin = "/nkv-login";
        }
        $lokasisudin = LokasiSudin::orderBy('lokasi','asc')->get();
        $bidangs = Bidang::orderBy('created_at','asc')->where('status',1)->get();
        $data_param = [
            'kategori','lokasisudin','urllogin','bidangs'
        ];
        // Ubah View
        return view('auth.register')->with(compact($data_param));
        // return view('auth.register');
    }

    /**
     * Store a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nama_bidang = null;
        $kategori = $request->kategori;
        if ($kategori=="sektoral") {
            $request->validate([
                'name' => 'required|string|max:250',
                'email' => 'required|email|max:250|unique:users',
                'nrk' => 'required',
                'jabatan' => 'required',
                'bidang' => 'required',
                'password' => 'required|min:6',
                'password_confirmation' => 'required_with:password|same:password',
                'g-recaptcha-response' => 'required'
            ]);

            $get_bidang = Bidang::find($request->bidang);
            $nama_bidang = strtolower($get_bidang->nama);

            $role = "user";
            $url="/login";
        }
        else if ($kategori=="sudin") {
            $request->validate([
                'name' => 'required|string|max:250',
                'email' => 'required|email|max:250|unique:users',
                'lokasi' => 'required',
                'password' => 'required|min:6',
                'password_confirmation' => 'required_with:password|same:password',
                'g-recaptcha-response' => 'required'
            ]);
            $role = "sudin";
            $url="/nkv-login";
        }
        else if ($kategori=="perusahaan") {
            $request->validate([
                'name' => 'required|string|max:250',
                'email' => 'required|email|max:250|unique:users',
                'nib' => 'required',
                'password' => 'required|min:6',
                'password_confirmation' => 'required_with:password|same:password',
                'g-recaptcha-response' => 'required'
            ]);
            $role = "pengusaha";
            $url="/nkv-login";
        }else{
            $message = 'Kategori tidak ditemukan';
            return back()->with('danger', $message);
        }
        
        $createdata = User::create([
            'username' => $request->email,
            'name' => $request->name,
            'email' => $request->email,
            'jabatan' => $request->jabatan,
            'bidang' => $nama_bidang,
            'fk_bidang' => $request->bidang,
            'nrk' => $request->nrk,
            'nib' => $request->nib,
            'fk_lokasi_sudin' => $request->lokasi,
            'role' => $role,
            'password' => Hash::make($request->password)
        ]);
        // $createdata->assignRole($role);

        $message = 'Terimakasih, pendaftaran akunmu sedang diperiksa oleh Tim Verifikator Dinas KPKP';

        return redirect()->to($url)->with('success', $message);
    }

    /**
     * Display a login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * Authenticate the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
            'g-recaptcha-response' => 'required',
            'auth-remember-check' => 'nullable'
        ]);

        $remember = $request->has('auth-remember-check') ? true : false;

        $cek_role_user = User::where('username', $request->username)->whereIn('role', ['admin','user'])->first();
        if ($cek_role_user) {
            if(Auth::attempt(['username' => $request->username, 'password' => $request->password], $remember))
            {
                $user = User::find(Auth::user()->id);
                $user->last_login = date('Y-m-d H:i:s');
                $user->save();
    
                $request->session()->regenerate();
    
                if($user->status == null) {
                    return back()
                    ->withErrors(['msg' =>'Akun anda belum di aktifasi oleh Admin']);
                } else {
                    if($user->role=="admin"){
                        $redirect = '/admin/dashboard';
                    }elseif($user->role=="user"){
                        $redirect = '/user/dashboard';
                    }elseif($user->role=="sudin"){
                        $redirect = '/sudin/dashboard';
                    }elseif($user->role=="pengusaha"){
                        $redirect = '/pengusaha/dashboard';
                    }elseif($user->role=="dinas"){
                        $redirect = '/dinas/dashboard';
                    }
                    return redirect()->to($redirect)
                        ->withSuccess('You have successfully logged in!');
                }
            }
        }

        return back()->withErrors([
            'username' => 'Username / password yg anda inputkan salah',
        ])->onlyInput('email');

    }


    public function nkv_authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
            'g-recaptcha-response' => 'required',
            'auth-remember-check' => 'nullable'
        ]);

        $remember = $request->has('auth-remember-check') ? true : false;


        $cek_role_user = User::where('username', $request->username)->whereIn('role', ['dinas','sudin','pengusaha'])->first();
        if ($cek_role_user) {
            if(Auth::attempt(['username' => $request->username, 'password' => $request->password], $remember))
            {
                $user = User::find(Auth::user()->id);
                $user->last_login = date('Y-m-d H:i:s');
                $user->save();
    
                $request->session()->regenerate();
    
                if($user->status == null) {
                    return back()
                    ->withErrors(['msg' =>'Akun anda belum di aktifasi oleh Admin']);
                } else {
                    if($user->role=="admin"){
                        $redirect = '/admin/dashboard';
                    }elseif($user->role=="user"){
                        $redirect = '/user/dashboard';
                    }elseif($user->role=="sudin"){
                        $redirect = '/sudin/dashboard';
                    }elseif($user->role=="pengusaha"){
                        $redirect = '/pengusaha/dashboard';
                    }elseif($user->role=="dinas"){
                        $redirect = '/dinas/dashboard';
                    }
                    return redirect()->to($redirect)
                        ->withSuccess('You have successfully logged in!');
                }
            }
        }

        return back()->withErrors([
            'username' => 'Email / password yg anda inputkan salah',
        ])->onlyInput('email');

    }


    /**
     * Log out the user from application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $role = Auth::user()->role;
        if($role=='admin' || $role=='user'){
            $url = "/login";
        }else{
            $url = "/nkv-login";
        }
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->to($url)
            ->withSuccess('You have logged out successfully!');;
    }

    public function reloadCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }

}
