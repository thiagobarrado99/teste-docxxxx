<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index()
    {
        return view('dashboard.index');
    }

    //
    public function apiInfo()
    {
        return view('dashboard.api-info');
    }

    public function viewNotifications()
    {
        Notification::where(["user_id" => Auth::user()->id])->update(['viewed' => 1]);
        return response()->json("success");
    }

    public function keepTokenAlive(Request $request)
    {
        $last_timestamp = $request->input("last");
        return response()->json([
            "notifications" => Auth::user()->notifications()->where("created_at", ">=", date_create_from_format('U', $last_timestamp)->setTimezone(new \DateTimeZone("America/Sao_Paulo"))->format('Y-m-d H:i:s'))->get()->reverse(),
            "unread_count" => Auth::user()->notificationUnreadCount(),
            "item_counts" => item_counts()
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        toast('Logout realizado com sucesso!', 'success');
        return redirect('/');
    }
}
