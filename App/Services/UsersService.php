<?php
namespace App\Services;

use App\Models\User;

class UsersService {
    public function get($id = null) {
        if(AuthService::checkAuth()) {
            if($id) {
                return User::select($id);
            } else {
                return User::selectAll();
            }
        }
    }
    
    public function post() {
        $data = $_POST;
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        return User::insert($data);
    }

    public function put() {
        if(AuthService::checkAuth()) {
            var_dump($_POST);
            $data = $_POST;
            return User::update($data);
        }
    }
    
    public function delete($id = null) {
        if(AuthService::checkAuth()) {
            return User::delete($id);
        }
    }
}