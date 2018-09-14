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
        $this->authorize('view-school');
        try {

        } catch (UnauthorizedException $e) {

        }
    }

    public function create(Request $request)
    {
        $this->authorize('create-school');

        try {

        } catch (UnauthorizedException $e) {

        }
    }
}
