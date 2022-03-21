<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 15);
        $hasFilter = $request->hasAny(['q', 'role', 'email_verified_at', 'per_page']);
        $hasSort = $request->hasAny(['sort-id', 'sort-email', 'sort-first_name', 'sort-last_name']);

        if (!$hasSort) {
            return redirect($request->fullUrlWithQuery(['sort-id' => 'desc']));
        }

        $users = User::query();

        // Filter
        $request->whenHas('q', function ($q) use ($users) {
            $users->where('email', 'like', "%$q%")
                ->orWhere('first_name', 'like', "%$q%")
                ->orWhere('last_name', 'like', "%$q%");
        });

        $request->whenHas('role', function($role) use ($users) {
            $users->where('role', $role);
        });

        $request->whenHas('is_email_verified', function($isEmailVerified) use ($users) {
            if ($isEmailVerified) {
                $users->whereNotNull('email_verified_at');
            } else {
                $users->whereNull('email_verified_at');
            }
        });

        // Sorting
        $request->whenHas('sort-id', function($sorting) use ($users) {
            $users->orderBy('id', $sorting);
        });

        $request->whenHas('sort-email', function($sorting) use ($users) {
            $users->orderBy('email', $sorting);
        });

        $request->whenHas('sort-first_name', function($sorting) use ($users) {
            $users->orderBy('first_name', $sorting);
        });

        $request->whenHas('sort-last_name', function($sorting) use ($users) {
            $users->orderBy('last_name', $sorting);
        });

        $users = $users->paginate($perPage)->withQueryString();

        return view('admin.user.index', [
            'users' => $users,
            'hasUsers' => User::exists(),
            'hasFilter' => $hasFilter
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('admin.user.detail', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
