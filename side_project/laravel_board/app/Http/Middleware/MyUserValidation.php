<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class MyUserValidation
{
    // 파일 생성 명령어
    // php artisan make:middleware 미들웨어명
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
       
    public function handle(Request $request, Closure $next)
    {
        Log::debug("*************유저 유효성 체크 시작*************");
        // 항목 리스트
        $arrBaseKey = [
            'email'
            ,'name'
            ,'password'
            ,'passwordchk'
        ];

        //유효성 체크 리스트
        $arrBaseVaildation = [
            'email' => 'required|email|max:50'
            ,'name' => 'required|regex:^[a-zA-Z가-핳]+$/|min:2|max:50'
            ,'password' => 'required|'
            ,'passwordchk' => 'same:password'
            ,'tel' => 'regex:/^010[0-9]{4}[0-9]{4}$'
        ];

        // request 파라미터
        $arrRequestParam = [];
        foreach($arrBaseKey as $val){
            if($request->has($val)){
                $arrRequestParam[$val] = $request->$val;
            } else {
                unset($arrBaseVaildation[$val]);
            }
        }

        Log::debug("리퀘스트 파라미터 획득", $arrRequestParam);
        Log::debug("유효성 체크 리스트 획득", $arrRequestParam);
    
        // 유효성 검사
        $validator = Validator::make($arrRequestParam, $arrBaseVaildation);
        // 유효성 검사 실패시 처리
        if($validator->fails()){
            return redirect('/'.$request->path())
            ->withErrors($validator->errors());
        }
        //처리
        Log::debug("************유저 유효성 체크 종료************");
        return $next($request);
    }
}