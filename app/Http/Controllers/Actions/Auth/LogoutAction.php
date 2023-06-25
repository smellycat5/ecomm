<?php

namespace App\Http\Controllers\Actions\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutAction extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = Auth::user();
        $user->currentAccessToken()->delete();
         return $this->success([],'Successfully Logged Out');
    }
}
