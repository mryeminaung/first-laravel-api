<?php

namespace App\Http\Controllers\collection;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CollectionController extends Controller
{
    public function index()
    {
        $customers = DB::table('customers')->get()->pluck('state')->reject(fn ($val) => $val == null);
        // dd($customers);
        return response()->json($customers);
    }
}
