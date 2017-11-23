<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    /*
     * |--------------------------------------------------------------------------
     * | Login Controller
     * |--------------------------------------------------------------------------
     * |
     * | This controller handles authenticating users for the application and
     * | redirecting them to your home screen. The controller uses a trait
     * | to conveniently provide its functionality to your applications.
     * |
     */
    
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
    }

    public function getLogin()
    {
        return view('admin.pages.login');
    }

    public function postLogin(LoginRequest $request)
    {
        try {
            $remember = (bool) $request->get('remember', false);

            if (Sentinel::authenticate([
                'email' => $request->email,
                'password' => $request->password
            ])) {
                return Redirect::route('main');
            } else {
                $errors = 'Tên đăng nhập hoặc mật khẩu không đúng.';
            }
        } catch (NotActivatedException $e) {
            $errors = 'Tài khoản của bạn chưa được kích hoạt!';
        } catch (ThrottlingException $e) {
            $delay = $e->getDelay();
            $errors = "Tài khoản của bạn bị block trong vòng {$delay} giây.";
        }
        
        return Redirect::back()->withInput()->withErrors($errors);
    }
}
