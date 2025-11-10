<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardUserController extends Controller
{
    public function indexUser() {
        return view('user.dashboardUser');
    }

    public function tableUser() {
        return view('user.complain.indexCom');
    }
}