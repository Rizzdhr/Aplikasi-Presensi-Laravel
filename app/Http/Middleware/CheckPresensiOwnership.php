<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Presensi;

class CheckPresensiOwnership
{
    public function handle(Request $request, Closure $next)
    {
        $presensiId = $request->route('id'); // Ambil nilai parameter 'id' dari route

        $presensi = Presensi::where('user_id', Auth::user()->id)->find($presensiId);

        if (!$presensi) {
            // Jika presensi tidak ditemukan atau bukan milik pengguna, kembalikan response 403 (Unauthorized)
            abort(403, 'Anda tidak memiliki izin untuk presensi ini.');
        }

        return $next($request);
    }
}
