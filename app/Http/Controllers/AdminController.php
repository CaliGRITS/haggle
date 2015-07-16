<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Profile;
use App\Requirement;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        Session::put('is_logged_in', TRUE);
        $users = User::with('profile')->where('user_type', 2)->get();
        $data['all_details'] = $users;
        return view('show-all', $data);
    }
    
    public function show($id)
    {
        $user = User::with('profile')
                ->with('requirement')
                ->where('id', $id)
                ->where('user_type', 2)
                ->get();
        if (count($user) <= 0)
        {
            return 'id not available';
        }
        $data['client_details'] = $user;
        return view('show-user', $data);
    }
}
