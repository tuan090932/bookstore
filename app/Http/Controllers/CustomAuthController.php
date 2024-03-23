<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{
    /**
     * Hiển thị trang đăng nhập.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Xử lý yêu cầu đăng nhập tùy chỉnh.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function customLogin(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        // Lấy thông tin đăng nhập từ request
        $credentials = $request->only('email', 'password');

        // Xác thực thông tin đăng nhập
        if (Auth::attempt($credentials)) {
            return redirect()->intended('home/02')->withSuccess('Signed in');
        }

        // Nếu thông tin đăng nhập không hợp lệ, chuyển hướng trở lại trang đăng nhập với thông báo lỗi
        return redirect("login")->withSuccess('Login details are not valid');
    }

    /**
     * Hiển thị trang đăng ký.
     *
     * @return \Illuminate\View\View
     */
    public function registration()
    {
        return view('auth.register');
    }

    /**
     * Xử lý yêu cầu đăng ký tùy chỉnh.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function customRegistration(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        // Lấy tất cả dữ liệu từ request
        $data = $request->all();

        // Tạo người dùng mới
        $check = $this->create($data);

        // Chuyển hướng đến trang dashboard với thông báo thành công
        return redirect("dashboard")->withSuccess('You have signed-in');
    }

    /**
     * Tạo người dùng mới.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    /**
     * Hiển thị trang dashboard.
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function dashboard()
    {
        // Kiểm tra xem người dùng đã đăng nhập hay chưa
        if (Auth::check()) {
            return view('auth.dashboard');
        }

        // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập với thông báo lỗi
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    /**
     * Xử lý yêu cầu đăng xuất.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function signOut()
    {
        // Xóa tất cả dữ liệu phiên
        Session::flush();

        // Đăng xuất người dùng
        Auth::logout();

        // Chuyển hướng đến trang đăng nhập
        return Redirect('login');
    }
}
