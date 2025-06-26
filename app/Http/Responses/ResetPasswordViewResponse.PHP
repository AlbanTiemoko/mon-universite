<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\ResetPasswordViewResponse;
use Illuminate\View\View;

class CustomResetPasswordViewResponse implements ResetPasswordViewResponse
{
    public function toResponse($request): View
    {
        return view('reset-password', ['request' => $request]);
    }
}