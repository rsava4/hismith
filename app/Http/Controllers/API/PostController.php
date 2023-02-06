<?php

namespace App\Http\Controllers\API;

use App\Application\Repositories\RssPostRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    
    public function posts(Request $request)
    {
        $defaultFields = ['title','description','author','image','published_at'];
        $fields = array_intersect($defaultFields, array_map('trim', explode(',', $request->get('fields'))));
        $fields = count($fields) > 0 ? $fields : $defaultFields;
        $sort = Str::lower($request->get('sort'))!=='desc'? 'asc': 'desc';
        try {
            $result =  app(RssPostRepository::class)->getPaginate($fields, $sort, 20)->withQueryString();
            return response()->json([
                'status' => true,
                'result' => $result,
                'message' => ''
            ]);
        }catch(\Exception $e){
            return response()->json([
                'status' => false,
                'result' => [],
                'message' => $e->getMessage()
            ]);
        }
    }
}
