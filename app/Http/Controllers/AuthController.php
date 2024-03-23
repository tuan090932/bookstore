<?php


namespace App\Http\Controllers;

use App\Services\UserService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    private $userService;

    ///  public function __construct(UserService $userService)
    // {
    //     $this->userService = $userService;
    // }

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function register(Request $request)
    {
        // Get the user data from the   
        $userData = $request->all();
        // Use the user service to create a new user
        $user = $this->userService->createUser($userData);
        return redirect()->route('dashboard')->with('user', $user); // truyền kiểu này chỉ dùng session để lấy khác với compact
        //gọi route rồi route gọi function
        // Return a response or redirect
        // ...
    }



    public function getregister()
    {
        return view('auth.registration');
    }

    public function getdashboard()
    {
        return view('auth.dashboard');
    }

    public function postLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('home/1');
        }

        return back()->withErrors([
            'email' => 'Thông tin đăng nhập không chính xác.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
