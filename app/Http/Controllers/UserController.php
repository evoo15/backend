<?php

namespace App\Http\Controllers;

use App\Http\Repository\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userRepository;

    function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function add(Request $request)
    {
        $user = $this->userRepository->add($request);
        return response()->json($user);
    }

    public function getAll()
    {
        return response()->json($this->userRepository->getAll());
    }

    public function delete($userId)
    {
        if (!$user = $this->userRepository->getById($userId)) {
            return response()->json(['error' => 'user not found'], 404);
        }
        $this->userRepository->delete($user);
    }
}