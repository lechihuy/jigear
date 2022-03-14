<?php

namespace App\Http\Controllers\Admin;

use App\Models\Promotion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePromotionRequest;

class PromotionController extends Controller
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
     * @param  Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 15);
        $hasFilter = $request->hasAny(['q', 'type', 'actived', 'is_remaining_uses', 'effect', 'per_page']);
        $hasSort = $request->hasAny(['sort-id', 'sort-name', 'sort-remaining_uses']);

        if (!$hasSort) {
            return redirect($request->fullUrlWithQuery(['sort-id' => 'desc']));
        }

        $promotions = Promotion::query();

        // Filter
        $request->whenHas('q', function ($q) use ($promotions) {
            $promotions->where('name', 'like', "%$q%")->orWhereFullText('name', $q)
                ->where('code', 'like', "%$q%");
        });

        $request->whenHas('type', function($type) use ($promotions) {
            $promotions->where('type', $type);
        });

        $request->whenHas('actived', function($actived) use ($promotions) {
            $promotions->where('actived', $actived);
        });

        $request->whenHas('is_remaining_uses', function($isRemainingUses) use ($promotions) {
            $promotions->where('remaining_uses', $isRemainingUses ? '>' : '=', 0);
        });

        $request->whenHas('effect', function($effect) use ($promotions) {
            switch ($effect) {
                case 'no-effect':
                    $promotions->where('started_at', '>', now());
                    break;
                
                case 'is-in-effect':
                    $promotions->where('started_at', '<=', now())->where(function($query) {
                        $query->where('ended_at', '>=', now())->orWhereNull('ended_at');
                    });
                    break;

                case 'expire':
                    $promotions->where('ended_at', '<', now());
                    break;
            }
        });

        // Sorting
        $request->whenHas('sort-id', function($sorting) use ($promotions) {
            $promotions->orderBy('id', $sorting);
        });

        $request->whenHas('sort-name', function($sorting) use ($promotions) {
            $promotions->orderBy('name', $sorting);
        });

        $request->whenHas('sort-remaining_uses', function($sorting) use ($promotions) {
            $promotions->orderBy('remaining_uses', $sorting);
        });

        $promotions = $promotions->paginate($perPage)->withQueryString();

        return view('admin.promotion.index', [
            'promotions' => $promotions,
            'hasPromotions' => Promotion::exists(),
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
        return view('admin.promotion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePromotionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePromotionRequest $request)
    {
        $promotion = Promotion::create($request->validated());

        $request->toast('success', __('Tạo khuyến mãi thành công!'));

        return response()->json(['promotion' => $promotion]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $promotion = Promotion::findOrFail($id);

        return view('admin.promotion.detail', ['promotion' => $promotion]);
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
