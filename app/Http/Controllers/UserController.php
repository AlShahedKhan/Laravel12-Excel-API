<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json($users)->with('success', 'Users retrieved successfully');
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
