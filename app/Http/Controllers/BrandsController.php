<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBrandRequest;
use App\Models\Brand;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class BrandsController extends Controller
{
    public function index()
    {
        $brands = Brand::query()
            ->orderBy('name')
            ->paginate(10);
        return Inertia::render('Brands/Index', [
            'brands' => $brands
        ]);
    }

    public function create()
    {
        return Inertia::render('Brands/Create');
    }

    public function store(StoreBrandRequest $request)
    {
        Brand::query()
            ->create($request->all());

        return Redirect::route('brands')->with('success', 'Brand created.');
    }

    public function edit(Brand $brand)
    {
        return Inertia::render('Brands/Edit', [
            'brand' => [
                'id' => $brand->id,
                'name' => $brand->name,
                'deleted_at' => $brand->deleted_at,
            ],
        ]);
    }

    public function update(StoreBrandRequest $request, Brand $brand)
    {
        $brand->update($request->all());

        return Redirect::back()->with('success', 'Brand updated.');
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();

        return Redirect::route('brands')->with('success', 'Brand deleted.');
    }

    public function restore(Brand $brand)
    {
        $brand->restore();

        return Redirect::route('brands')->with('success', 'Brand restored.');
    }
}
