<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Imports\UserImport;
use App\Exports\UsersExport;
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

    public function import(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'file' => 'required|max:2048',
        ]);

        Excel::import(new UserImport, $request->file('file'));

        return response()->json([
            'message' => 'Users imported successfully',
        ]);
    }
}
