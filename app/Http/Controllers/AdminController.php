<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controllers\Middleware;
use App\Models\User;

class AdminController extends Controller
{
    public static function middleware(): array
    {
        return [
            new Middleware(middleware: 'auth'),
            new Middleware(middleware: 'role:1'),
        ];
    }

    public function allUsers() 
    {
        $allusers = User::with('agency', 'role')->get();  // Récupérer tous les utilisateurs avec leurs agences et rôles

        return view('admin.allUsers', compact('allusers'));
    }

}
