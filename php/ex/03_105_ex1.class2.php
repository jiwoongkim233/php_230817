<?php
// namespace : 클래스를 구분해주기 위해 설정, 보통은 해당파일의 패스로 작성
namespace up;
class Class_1{
    public function __construct(){
        echo "upper class1" ;
}
};

namespace down;
class Class_1{
    public function __construct(){
        echo "lower class1";
    }
}
use \up\class1;



?>