<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Board;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 로그인 체크
        if(!Auth::check()){
            return redirect()->route('user.login.get');
        }      
        
        // 게시글 획득
        $result = Board::get();

        return view('list')->with('data', $result);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // 작성처리
        $arrInputData = $request->only('b_title','b_content');
        $result = Board::create($arrInputData);
        // $result =
        //     DB::table('boards')
        //     ->insert([
        //     'b_title' => $_POST['b_title']
        //     ,'b_content' => $_POST['b_content']
        //     ,'created_at' => now()
        //     ,'updated_at' => now()
        //     ]);
        return redirect()->route('board.index');
    }
     

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //del 231116 미들웨어로 이관
        // 로그인 체크
        // if(!Auth::check()){
        //   return redirect()->route('user.login.get');
        // }     
        
        // 게시글 획득
        $result = Board::find($id);

        // 조회수 올리기
        $result->b_hits++; //조회수 1증가
        $result->timestamp = false;    
        // // 업데이트 처리
        // $result->save();

        return view('detail')->with('data', $result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Log::debug("----------삭제처리 시작----------");
    try{
        DB::beginTransaction();
        Log::debug("트랜잭션시작");
        Board::destroy($id);
        Log::debug("삭제처리");
        DB::commit("커밋완료");     
        return redirect()->route('board.index');
    } catch(Exception $e){
        DB::rollBack("예외 발생 : 롤백 완료");
        return redirect()->route('error')->withErrors($e->getMessage);
    }
    Log::debug("---------삭제처리 종료------------");
    return redirect()->route('bourd.index');
    }
}
