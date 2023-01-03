<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

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

    public function example2()
    {
        Artisan::call('twitter:giveaway', [
            '--exclude' => ['someuser', '@otheruser', 'iamuser']
        ]);

        return view('example2');
    }

    public function example3()
    {
        $user = User::first();
        $socialLinks = collect([
            'Twitter' => $user->link_twitter,
            'Facebook' => $user->link_facebook,
            'Instagram' => $user->link_instagram,
        ])
            ->filter()
            ->map(fn($link, $network) => '<a href="' . $link . '">' . $network . '</a>')
            ->implode(' | ');

        return view('example3', compact('user'));
    }


}
