<?php
// class : 동종의 객체들이 모여있는 집합을 정의한 것

class ClassRoom

{

// 멤버필드

// 접근제어 지시자 : public, private, protected
    public $computer; // 어디에서나 접근가능
    private $book; // class 내에서만 접근가능
    protected $bag; // class와 나를 상속 받은 자식 class에서만 접근 가능

// 메소드 (method) : class내에 있는 함수
    public function class_room_set_value(){
        $this->computer="컴퓨터";
        $this->book="책";
        $this->bag="가방";
    }
    public function classRoomPrint(){
        $str = $this->computer."\n"
               .$this->book. "\n"
              .$this->bag;
        echo $str;
    }
};
// class instance 생성
$obj_ClassRoom = new ClassRoom;
$obj_ClassRoom -> class_room_set_value();
$obj_ClassRoom -> classRoomPrint();
// // $obj_ClassRoom -> computer = "test";

// // var_dump($obj_ClassRoom -> computer);



// 컴퓨터,북,백의 값을 출력하는 메소드 생성




?>