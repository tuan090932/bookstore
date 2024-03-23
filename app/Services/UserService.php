<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function createUser($userData)
    {
        // Kiểm tra tính hợp lệ của tên người dùng
        if (empty($userData['name']) || strlen($userData['name']) < 3) {
            throw new \Exception('Tên người dùng không hợp lệ.');
        }

        // Kiểm tra tính hợp lệ của địa chỉ email
        if (empty($userData['email']) || !filter_var($userData['email'], FILTER_VALIDATE_EMAIL)) {
            throw new \Exception('Địa chỉ email không hợp lệ.');
        }

        // Kiểm tra tính hợp lệ của mật khẩu
        if (empty($userData['password']) || strlen($userData['password']) < 6) {
            throw new \Exception('Mật khẩu phải có ít nhất 6 ký tự.');
        }

        // Kiểm tra xem tên người dùng đã tồn tại trong cơ sở dữ liệu hay chưa
        if (User::where('name', $userData['name'])->exists()) {
            throw new \Exception('Tên người dùng đã tồn tại.');
        }

        // Tạo người dùng mới bằng cách sử dụng model
        $user = new User();
        $user->name = $userData['name'];
        $user->email = $userData['email'];
        $user->password = $userData['password'];
        // Đặt các thuộc tính người dùng khác

        return $user;
    }

    // Các phương thức dịch vụ liên quan đến người dùng khác
    // ...
}
