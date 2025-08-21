<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectAuthenticatedUsersController extends Controller
{
    public function home()
    {

        if (auth()->user()->role === 'Super Admin') {
            return redirect()->route('dashboard.superAdmin');
        } elseif (auth()->user()->role === 'admin') {
            return redirect()->route('dashboard.companyAdmin');
        } elseif (auth()->user()->role === 'receptionist') {
            return redirect()->route('dashboard.receptionist');
        } elseif (auth()->user()->role === 'host') {
            return redirect()->route('dashboard.host');
        }
    }
}
