<?php

namespace App\Http\Controllers;

use App\Policies\UserPolicy;
use Illuminate\Http\Request;
use Illuminate\Validation\UnauthorizedException;

class AdminController extends Controller
{

    public function index()
    {
        return view('layouts.admin.admin-main');
    }


    public function show()
    {
        try {
            $this->authorize('view-school');
        } catch (UnauthorizedException $e) {

        }
    }
}
