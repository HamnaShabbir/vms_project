<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Http\Request;

class DashboardController extends Controller
{


    public function index()
    {
        $user = auth()->user();
        if ($user->role === 'Super Admin') {
            return redirect()->route('dashboard.superAdmin');
        } elseif ($user->role === 'admin') {
            return redirect()->route('dashboard.companyAdmin');
        } elseif ($user->role === 'receptionist') {
            return redirect()->route('dashboard.receptionist');
        } elseif ($user->role === 'host') {
            return redirect()->route('dashboard.host');
        }
    }
    public function superAdmin()
    {
        $usersCount = User::where('role', 'host')->whereHas('host')->count();
        $companiesCount = Company::count();
        $todayVisitorCount = Visitor::whereDate('created_at', now())->where('status', '!=', 'Pending')->whereNull('time_of_departure')->count();
        $pendingVisitorRequests = Visitor::whereDate('created_at', now())->where('status', 'Pending')->count();
        $companies = Company::latest()
            ->withCount([
                'users' => function ($query) {
                    $query->has('host'); // Only count users who have a host relation
                }
            ])
            ->take(5)
            ->get();

        $users = User::latest()->take(10)->get();
        $totalReceptionist = User::where('role', 'receptionist')->count();

        return view('dashboard.super_admin', compact('totalReceptionist', 'usersCount', 'companiesCount', 'todayVisitorCount', 'pendingVisitorRequests', 'companies', 'users'));
    }
    public function receptionist()
    {
        $visitors = Visitor::whereDate('created_at', now())->get();
        $totalVisitors = Visitor::whereDate('created_at', now())->count();
        $totalVisitorsToday = Visitor::whereDate('created_at', now())->count();
        $totalVisitorsPending = Visitor::whereDate('created_at', now())->where('status', 'Pending')->count();
        $totalVisitorsRejected = Visitor::whereDate('created_at', now())->where('status', 'Rejected')->count();
        $totalInhouseVisitors = Visitor::whereDate('created_at', now())->where('status', '!=', 'Pending')->whereNull('time_of_departure')->count();
        $statuses = ['Pending', 'Approved', 'Rejected', 'Exited'];

        return view('dashboard.receptionist', compact('visitors', 'totalVisitors', 'totalVisitorsToday', 'totalVisitorsPending', 'totalInhouseVisitors', 'totalVisitorsRejected', 'statuses'));
    }

    public function companyAdmin()
    {
        $visitors = Visitor::whereDate('created_at', now())->where('status', 'Pending')->where('company_id', auth()->user()->company_id)->get();
        $totalHosts = User::where('role', 'host')->where('company_id', auth()->user()->company_id)->count();
        $totalVisitors = Visitor::where('company_id', auth()->user()->company_id)->count();
        $totalVisitorsToday = Visitor::whereDate('created_at', now())->where('company_id', auth()->user()->company_id)->count();
        $totalVisitorsPending = Visitor::whereDate('created_at', now())->where('status', 'Pending')->where('company_id', auth()->user()->company_id)->count();
        $totalInhouseVisitors = Visitor::whereDate('created_at', now())->where('status', '!=', 'Pending')->whereNull('time_of_departure')->where('company_id', auth()->user()->company_id)->count();
        $latestHosts = User::where('role', 'host')->where('company_id', auth()->user()->company_id)->latest()->take(5)->get();
        $statuses = ['Pending', 'Approved', 'Rejected', 'Exited'];

        return view('dashboard.company_admin', compact('visitors', 'totalHosts', 'totalVisitors', 'totalVisitorsToday', 'totalVisitorsPending', 'totalInhouseVisitors', 'latestHosts', 'statuses'));
    }

    public function host()
    {
        $statuses = ['Pending', 'Approved', 'Rejected', 'Exited'];
        $visitors = Visitor::whereDate('created_at', now())->where('company_id', auth()->user()->company_id)->get();
        $totalVisitors = Visitor::where('company_id', auth()->user()->company_id)->count();
        $totalVisitorsToday = Visitor::whereDate('created_at', now())->where('company_id', auth()->user()->company_id)->count();
        $totalVisitorsPending = Visitor::whereDate('created_at', now())->where('status', 'Pending')->where('company_id', auth()->user()->company_id)->count();
        $totalVisitorsRejected = Visitor::whereDate('created_at', now())->where('status', 'Rejected')->where('company_id', auth()->user()->company_id)->count();
        $totalInhouseVisitors = Visitor::whereDate('created_at', now())->where('status', '!=', 'Pending')->whereNull('time_of_departure')->where('company_id', auth()->user()->company_id)->count();
        return view('dashboard.host', compact('visitors', 'totalVisitors', 'totalVisitorsToday', 'totalVisitorsPending', 'totalInhouseVisitors', 'totalVisitorsRejected', 'statuses'));
    }
    public function getUserRoleCounts()
    {
        $roleCounts = User::selectRaw("role, COUNT(*) as count")
            ->groupBy('role')
            ->pluck('count', 'role');

        return response()->json($roleCounts, 200, [], JSON_NUMERIC_CHECK);
    }
}
