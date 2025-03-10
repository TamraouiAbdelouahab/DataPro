<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Services\ProductService;
use App\Services\CategoryService;
use App\Services\TagService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(protected ProductService $service, protected CategoryService $categoryService, protected TagService $tagService)
    {
    }

    public function index(Request $request)
    {
        $data = $this->service->all()->pagination(5);
        if (str_contains($request->path(), 'admin')) {
            return view('products.index', compact('data'));
        }
        return response()->json($data, 200);
    }

    public function show($id)
    {
        return $this->service->find($id);
    }

    public function create(Request $request)
    {
        $categories = $this->categoryService->all();
        $tags = $this->tagService->all();
        return view('products.create', compact('tags', 'categories'));
    }

    public function store(StoreProductRequest $request)
    {
        if ($this->service->create($request))
            return redirect(route('products.index'));
        else return redirect(route('products.create'))->withErrors('Error Creating Product','create');
    }

    public function update(StoreProductRequest $request, $id) // TODO Update Request
    {
        $this->service->update($id, $request);
        return redirect(route('products.index'));
    }

    public function destroy($id)
    {
        $this->service->delete($id);
        return redirect(route('products.index'));
    }
}
