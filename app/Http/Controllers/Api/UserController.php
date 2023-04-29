<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function data()
    {
        $users = User::select(['id', 'name', 'email', 'created_at'])
            ->oldest()
            ->get();
        return datatables()
            ->of($users)
            ->editColumn('created_at', function ($user) {
                return $user->created_at->format('Y-m-d H:i:s');
            })
            ->addColumn('action', function ($user) {
                return "
                    <a href='" . route('users.edit', $user->id) . "' class='btn btn-primary'>
                        <i class='fa fa-edit'></i>
                    </a>
                    <a href='#' class='btn btn-danger'
                        onclick='confirmDelete(`users`, `" . $user->id . "`)'>
                        <i class='fa fa-trash'></i>
                    </a>";
            })
            ->rawColumns(['level', 'action'])
            ->toJson();
    }
}
