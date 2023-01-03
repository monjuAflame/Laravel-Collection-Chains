<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class ExampleColntroller extends Controller
{
    public function example1()
    {
        $role = Role::with('permissions')->first();
        
        $permissionsListToShow = $role->permissions
            ->map(fn($permission) => $permission->name)
            ->implode("<br>");

        return view('example1');
    }
}
