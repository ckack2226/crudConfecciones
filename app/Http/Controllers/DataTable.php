<?php

namespace App\Http\Controllers;

use App\Models\User;
use Yajra\DataTables\Facades\DataTables;

class DataTableController extends Controller
{
    public function users()
    {
        $users = User::all();

        return DataTables::of($users)
            ->make(true);
    }
}

