<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admission;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $admission = Admission::where('user_id', Auth::id())->first();

        // Depuración: Verificar si se está obteniendo la admisión


        return view('dashboard', compact('admission'));
    }
}
