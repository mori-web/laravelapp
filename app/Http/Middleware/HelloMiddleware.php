<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HelloMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
      $response = $next($request);
      $content = $response->content();

      $pattern = '/<middleware>(.*)<\/middleware>/i';
      $replace = '<a href="http://$1">$1</a>';
      $content = preg_replace($pattern, $replace, $content);
      $response->setContent($content);
      return $response;

        // $data = [
        //   ['name'=>'taro', 'mail'=>'taro@yamada'],
        //   ['name'=>'hanako', 'mail'=>'hanako@sasaki'],
        //   ['name'=>'shohei', 'mail'=>'syouhei@takaoka'],
        // ];
        // $request->merge(['data'=>$data]);
        // return $next($request); //←このreturnの前に書くと、前処理のミドルウェアとなり、後に書くと後処理のミドルウェアとなる。
    }
}
