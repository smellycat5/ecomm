<?php

namespace App\Http\Controllers\Actions\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Services\UserService;

class RegisterAction extends Controller
{
    protected UserService $userService;

    /**
     *
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(UserStoreRequest $request)
    {
        $data = $request->validated();
        $user = User::create($data);
        return $this->success([$user], "User Successfully Registered");
    }
}
