<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWishRequest;
use App\Http\Requests\UpdateWishRequest;
use App\Models\Project;
use App\Models\Wish;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class WishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWishRequest $request, Project $project): JsonResponse|RedirectResponse
    {
        if (! $project->is_active) {
            abort(404);
        }

        $validated = $request->validated();

        $wish = $project->wishes()->create([
            'name' => $validated['name'] ?? null,
            'message' => $validated['message'],
        ]);

        if ($request->expectsJson()) {
            return response()->json([
                'wish' => [
                    'id' => $wish->id,
                    'name' => $wish->name,
                    'message' => $wish->message,
                    'createdAt' => $wish->created_at?->toIso8601String(),
                ],
            ], 201);
        }

        return redirect('/'.$project->code.'#wishes')->with('status', 'Wish sent successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Wish $wish)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wish $wish)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWishRequest $request, Wish $wish)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wish $wish)
    {
        //
    }
}
