<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RegisterController.php extends Controller
{
  public function register(Request $request): JsonResponse
  {
    $validate = $this->validator($request->all());

    if ($validate->fails()) {
        return new JsonResponse($validate->errors());
    }

    event(new Registered($user = $this->create($request->all())));

    return new JsonResponse($user);
  }
}
