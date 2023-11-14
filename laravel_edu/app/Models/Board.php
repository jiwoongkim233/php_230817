<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;
    // 모델생성 : php artisan make:model 모델명 -mfs
    // [-mfs] 옵션으로 migration, factory, seeder를 한번에 생성

    // 테이블 정의 (정의하지 않을 경우에는 클래스 명의 복수형을 암묵적으로 인식)
    protected $table = '테이블명';

    // PK 정의 (정의하지 않을 경우에는 'id'컬럼을 pk로 인식)
    protected $primaryKey = 'id';

    // 대량 할당을 이용한 취약성 대책
    // 1. 화이트 리스트 방식 : 수정할 수 있는 칼럼을 설정
    // protected $fillable = ['칼럼1','칼럼2'];
    // 2. 블랙 리스트 방식 : 수정할 수 없는 칼럼을 설정
    // protected $guarded = ['칼럼1','칼럼2'];
    public $timestamps = true;
    // 디폴트값 세팅
    public function __construct(array $attributes=[])
    {
        parent::__construct($attributes);
        
        // 'created_at' 및 'updated_at' 속성을 현재 시간으로 설정
        $this->attributes['created_at']=now();
        $this->attributes['updated_at']=now();
    }

}
