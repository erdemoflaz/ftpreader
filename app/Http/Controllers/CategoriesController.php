<?php

namespace App\Http\Controllers;

use App\Jobs\UpdatedCategoryChecker;


class CategoriesController extends Controller
{
    public function index()
    {
        UpdatedCategoryChecker::dispatch();

        return response()->json(['message' => 'Process queued.'], 200);
    }
}
