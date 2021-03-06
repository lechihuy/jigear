<?php

namespace App\Http\Controllers\Admin;

use App\Models\Catalog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCatalogRequest;
use App\Http\Requests\Admin\UpdateCatalogRequest;

class CatalogController extends Controller
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
        $hasFilter = $request->hasAny(['q', 'published', 'parent_id', 'per_page']);
        $hasSort = $request->hasAny(['sort-id', 'sort-title']);

        if (!$hasSort) {
            return redirect($request->fullUrlWithQuery(['sort-id' => 'desc']));
        }

        $catalogs = Catalog::query();

        // Filter
        $request->whenHas('q', function ($q) use ($catalogs) {
            $catalogs->where('title', 'like', "%$q%")->orWhereFullText('title', $q);
        });

        $request->whenHas('published', function($published) use ($catalogs) {
            $catalogs->where('published', $published);
        });

        $request->whenHas('parent_id', function($parentId) use ($catalogs) {
            $catalogs->where('parent_id', $parentId);
        });

        // Sorting
        $request->whenHas('sort-id', function($sorting) use ($catalogs) {
            $catalogs->orderBy('id', $sorting);
        });

        $request->whenHas('sort-title', function($sorting) use ($catalogs) {
            $catalogs->orderBy('title', $sorting);
        });

        $catalogs = $catalogs->paginate($perPage)->withQueryString();

        return view('admin.catalog.index', [
            'catalogs' => $catalogs,
            'catalogOptions' => Catalog::all()->mapWithKeys(fn($catalog) => [$catalog->title => $catalog->id]),
            'hasCatalogs' => Catalog::exists(),
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
        return view('admin.catalog.create', [
            'catalogOptions' => Catalog::all()->mapWithKeys(fn($catalog) => [
                $catalog->title => $catalog->id
            ])
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Admin\StoreCatalogRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCatalogRequest $request)
    {
        $catalog = Catalog::create($request->validated());

        $request->toast('success', __('T???o danh m???c th??nh c??ng!'));

        return response()->json(['catalog' => $catalog]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $catalog = Catalog::findOrFail($id);

        return view('admin.catalog.detail', ['catalog' => $catalog]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $catalog = Catalog::findOrFail($id);

        return view('admin.catalog.edit', [
            'catalog' => $catalog,
            'catalogOptions' => Catalog::where('id', '!=', $id)->get()->mapWithKeys(fn($catalog) => [
                $catalog->title => $catalog->id
            ])
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCatalogRequest $request, $id)
    {
        $catalog = Catalog::findOrFail($id);
        $catalog->update($request->validated());

        if ($request->slug != $catalog->slug->slug) {
            $catalog->slug->update([
                'slug' => Str::slug($request->slug ?? $catalog->title)
            ]);
        }

        if ($request->hasFile('thumbnail')) {
            if ($catalog->thumbnail) {
                $catalog->thumbnail->delete();
            }
            
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails');
            $catalog->images()->create([
                'path' => $thumbnailPath,
                'type' => 'thumbnail',
            ]);
        }

        $request->toast('success', __('C???p nh???t danh m???c th??nh c??ng!'));

        return response()->json(['catalog' => $catalog]);
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
        $catalog = Catalog::findOrFail($id);
        $catalog->delete();

        $request->toast('success', __('X??a danh m???c th??nh c??ng!'));

        return response()->noContent();
    }
}
