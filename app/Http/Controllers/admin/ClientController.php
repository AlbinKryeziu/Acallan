<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Specialty;
use App\Models\User;
use Facade\FlareClient\Http\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Util\Json;

class ClientController extends Controller
{
    public function index()
    {
        if (Auth::user()->isAdmin()) {
            $client = User::whereHas('role', function ($q) {
                $q->where('name', 'Client');
            })->get();

            return view('admin/client/client', [
                'client' => $client,
            ]);
        }
        return redirect()->back();
    }
    public function deleteClient($clientId)
    {
        $client = User::where('id', $clientId)->delete();
        return redirect()
            ->back()
            ->with('success', 'The client has been successfully deleted');
    }
    public function storeAccess($userId)
    {
        $user = User::where('id', $userId)->first();
        $acces = User::where('id', $userId)
            ->pluck('doctor_access')
            ->toArray();

        $a = Specialty::whereIn('id', $acces[0][0])->get();

        $speciality = Specialty::get();
        return view('admin/client/access', [
            'user' => $user,
            'speciality' => $speciality,
            'acces' => $acces,
            'a' => $a,
        ]);
    }
    public function accessDoctor(Request $request)
    {
        $user = User::where('id', $request->userId)->update([
            'doctor_access' => [$request->speciality],
        ]);
    }
}
