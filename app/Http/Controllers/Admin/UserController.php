<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\StoreUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
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
                ->orWhere('last_name', 'like', "%$q%")
                ->orWhereHas('deliveryAddresses', function($query) use ($q) {
                    $query->whereFulltext('address', $q)->orWhere('address', 'like', "%$q%")
                        ->orWhere('phone_number', 'like', "%$q%");
                });
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
     * @param  App\Http\RequeststoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->validated());

        $request->toast('success', __('Tạo người dùng thành công!'));

        return response()->json(['user' => $user]);
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
        $user = User::findOrFail($id);

        return view('admin.user.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\UpdateUserRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $data = $request->validated();

        // Change password
        if ($data['password']) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        // Email verified
        $data['email_verified_at'] = $data['email_verified_at'] ? now() : null;

        $user->update($data);

        $request->toast('success', __('Cập nhật người dùng thành công!'));

        return response()->json(['user' => $user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        $request->toast('success', __('Xóa người dùng thành công!'));

        return response()->noContent();
    }

    public function statisticTotalUser()
    {
        return response()->json([
            'counter' => User::count(),
        ]);
    }

    public function statisticRoleUser()
    {
        return response()->json([
            'labels' => [
                [
                    'name' => __('khách hàng'),
                    'class' => 'bg-gray-100',
                    'counter' => User::where('role', 'customer')->count(),
                ],
                [
                    'name' => __('quản trị viên'),
                    'class' => 'bg-red-100',
                    'counter' => User::where('role', 'admin')->count(),
                ],
            ]
        ]);
    }

    public function statisticTotalCustomerOrdered()
    {
        return response()->json([
            'counter' => User::where('role', 'customer')->whereHas('orders')->count(),
        ]);
    }
}
