<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::query()->where('role', '=', 'user')->limit(6)->get();
        return view('admin.dashboard.index', compact('users'));
    }
}
