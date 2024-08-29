<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Feature;

use App\Http\Resources\FeatureResource;

class HomeController extends Controller
{
    public function index()
    {
        $features = Feature::where("active", true)->get();

        return Inertia("Welcome", [
            "features" => FeatureResource::collection($features),
            'canRegister' => Route::has('register'),
            'canLogin' => Route::has('login'),
        ]);
    }
}
