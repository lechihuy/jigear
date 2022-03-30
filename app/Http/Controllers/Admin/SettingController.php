<?php

namespace App\Http\Controllers\Admin;

use App\Models\Option;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateSettingRequest;

class SettingController extends Controller
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

    public function showSettingForm()
    {
        return view('admin.setting');
    }

    public function store(UpdateSettingRequest $request)
    {
        foreach ($request->all() as $key => $value) {
            Option::where('key', $key)->update(['value' => $value]);
        }

        $request->toast('success', __('Cập nhật thành công!'));

        return response()->noContent();
    }
}
