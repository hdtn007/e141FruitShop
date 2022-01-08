<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function login_user()
    {
        return view('account.customer-account.login');
    }

    public function signup_user()
    {
        return view('account.customer-account.signup');
    }
}
