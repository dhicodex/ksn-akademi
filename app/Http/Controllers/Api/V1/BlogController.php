<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Traits\ApiResponse;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class BlogController extends Controller
{
    use ApiResponse;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $blogs = Blog::query()
            ->when($request->filled('search'), function ($query) use ($request) {
                $query->where('title', 'like', '%' . $request->search . '%');
            })
            ->when($request->filled('status'), function ($query) use ($request) {
                $query->where('status', $request->status);
            })
            ->when($request->filled('category_id'), function ($query) use ($request) {
                $query->where('category_id', $request->category_id);
            })
            ->latest()
            ->paginate(10);

        return $this->successResponse($blogs, 'Blogs retrieved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'content' => 'required|string',
                'category_id' => 'required|exists:categories,id',
                'status' => ['required', Rule::in(['draft', 'published'])],
            ]);

            $blog = Blog::create($validated);

            return $this->successResponse($blog, 'Blog created successfully.', Response::HTTP_CREATED);
        } catch (ValidationException $e) {
            return $this->errorResponse('Validation failed.', Response::HTTP_UNPROCESSABLE_ENTITY, $e->errors());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return $this->successResponse($blog, 'Blog retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        try {
            $validated = $request->validate([
                'title' => 'sometimes|string|max:255',
                'content' => 'sometimes|string',
                'category_id' => 'sometimes|exists:categories,id',
                'status' => ['sometimes', Rule::in(['draft', 'published'])],
            ]);

            $blog->update($validated);

            return $this->successResponse($blog, 'Blog updated successfully.');
        } catch (ValidationException $e) {
            return $this->errorResponse('Validation failed.', Response::HTTP_UNPROCESSABLE_ENTITY, $e->errors());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return $this->successResponse(null, 'Blog deleted successfully.', Response::HTTP_OK);
    }
}
