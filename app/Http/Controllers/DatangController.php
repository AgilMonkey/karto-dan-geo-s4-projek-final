<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absen;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DatangController extends Controller
{

    public function store()
    {
        $user = Auth::user();

        Absen::create([
            'nama' => $user->name,
            'waktu' => Carbon::now(),
            'status' => 'Datang',
        ]);

        return redirect('/home');
    }
}
