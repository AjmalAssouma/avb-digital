<?php

namespace App\Http\Controllers;
use App\Models\User;
use Closure;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller implements \Illuminate\Routing\Controllers\HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware(middleware: 'auth'),
            // new Middleware(middleware: 'inactivity.logout'),
        ];
    }
    public function index()
    {
        $user = Auth::user();
        // Passer uniquement les colonnes 'firstname' et 'lastname' à la vue
        return view('home.index', [
            'firstname' => $user->firstname,
            'lastname' => $user->lastname,
        ]);
    }

    public function showSgiCreationForm()
    {
        return view('home.sgi.creationSgi');
    }

    public function showPlacementCreationForm()
    {
        return view('home.placement.creationPlacement');
    }
}


   

