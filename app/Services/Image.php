<?php

namespace App\Services;

use Closure;
use Illuminate\Support\Arr;


class Image {

    public function handle($request, Closure $next)
    {
        if (Arr::exists($request, 'image')) {
            $image = time().'.'.$request['image']->extension();  
            $request['image']->move(public_path('imgs'), $image);
            return $request['image'] = $image;
        }
        
        return $next($request);
    }
}