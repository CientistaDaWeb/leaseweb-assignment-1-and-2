<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $page = request()->input('page', 20);
        return Brand::query()->paginate($page);
    }

    public function show(Brand $brand)
    {
        return response()->json($brand);
    }

    public function store(StoreBrandRequest $request)
    {
        $brand = Brand::create($request->all());

        return response()->json($brand, 201);
    }

    public function update(StoreBrandRequest $request, Brand $brand)
    {
        $brand->update($request->all());

        return response()->json($brand);
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();

        return response()->json(null, 204);
    }
}
