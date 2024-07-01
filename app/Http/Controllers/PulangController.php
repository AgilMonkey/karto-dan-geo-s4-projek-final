<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\Absen;

class PulangController extends Controller
{
    public function store()
    {
        $user = Auth::user();

        Absen::create([
            'nama' => $user->name,
            'waktu' => Carbon::now(),
            'status' => 'Pulang',
        ]);

        return redirect('/home');
    }
}
