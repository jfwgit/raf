<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\UnauthorizedException;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.admin');
    }


    /**
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show()
    {
        try {
            $this->authorize('view-school');
        } catch (UnauthorizedException $e) {

        }
    }
}
