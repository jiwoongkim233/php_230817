<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BoardController extends Controller
{
    public function index(){
        // --------------
        // 쿼리빌더
        // --------------
        $result = DB::select('select * from boards limit 10');
        $result = DB::select('select * from boards limit :no offset :no2', ['no' => 1, 'no2' =>10]);
        $result = DB::select('select * from boards limit ? offset ?',[2,10]);

        // 카테고리가 4, 7, 8 인 게시글의 수를 출력
        $result = DB::select('select count(id) from boards where categories_no = 4 or categories_no = 7 or categories_no = 8');
        // 카테고리별 게시글의 수 출력
        $result = DB::select('select categories_no, count(id) from boards group by categories_no');
        // 카테고리별 게시글의 수 출력 + 카테고리명 출력
        $result = DB::select('SELECT b.categories_no, c.name, COUNT(b.id) from boards AS b inner join categories AS c on b.categories_no = c.no group by b.categories_no, c.name');
        

        // --------------------------insert---------------------------

        $sql = 
        'INSERT INTO boards(title, content, created_at, updated_at, categories_no)'
        .'VALUES(?, ?, ?, ?, ?)';
        $arr=[
            '제목1'
            ,'내용1'
            ,now()
            ,now()
            ,'0'
        ];

        // DB::beginTransaction();
        // DB::insert($sql, $arr);
        // DB::commit();

        // $result = DB::insert($sql, $arr);
        $result = DB::select('SELECT * from boards order by id desc limit 1');

        // --------------------------Update---------------------------
        // DB::beginTransaction();
        // DB::update('UPDATE boards SET title =?, content = ? WHERE id= ?'
        // ,['업데이트1','업', $result[0]->id]);
        
         // --------------------------Delete---------------------------
        //  DB::beginTransaction();
        //  DB::delete('DELETE FROM boards WHERE id = ?',[$result[0]->id]);
        //  DB::commit();
         
        // -------------
        // 쿼리 빌더 체이닝
        // -------------
        // SELECT * from boards where id = 300
        $result = DB::table('boards')->where('id', '=', 300)->get();

        // select * from boards where id = 300 or id = 400
        $result = DB::table('boards')
        ->Where('id', '=', 300)
        ->orWhere('id', '=', 400)
        ->get();

        // select * from categories where no in (1,2,3);
        $result = DB::table('categories')
        ->whereIn('no', [1,2,3])
        ->get();

        // first() : limit 1하고 비슷하게 동작
        $result = DB::table('boards')->orderBy('id','desc')->first();

        // count() : 결과의 레코드 수를 반환
        $result = DB::table('boards')->count();

        // max() : 해당 컬럼의 최대값
        $result = DB::table('categories')->max('no');

        // 게시글 정보 + 카테고리명 까지 출력 100개만
        // $result = 
        //     DB::table('boards')
        //     ->select('boards.title', 'boards.content', 'categories.name')
        //     ->join('categories','categories.no', 'boards.categories_no')
        //     ->limit(100)
        //     ->get();
// 카테고리별 게시글의 수 출력 + 카테고리명 출력

        $result =
            DB::table('boards')
            ->select('boards.categories_no','categories.name',DB::raw('count(categories.no)'))
            ->join('categories','boards.categories_no','categories.no')
            ->groupBy('boards.categories_no','categories.name')
            ->get();
            
        return var_dump($result);        
    }
}
