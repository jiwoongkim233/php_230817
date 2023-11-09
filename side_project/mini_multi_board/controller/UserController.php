<?php

namespace controller;

use model\UserModel;
use lib\Validation;

class UserController extends ParentsController{
	// 로그인 페이지 이동
	protected function loginGet() {
		return "view/login.php";
	}

	// 로그인 처리
	protected function loginPost(){
		// ID, PW 설정(DB에서 사용할 데이터 가공)
		$arrInput = [];
		$arrInput["u_id"]=$_POST["u_id"];
		$arrInput["u_pw"]=$this->encryptionPassword($_POST["u_pw"]);

		$modelUser = new UserModel();
		$resultUserInfo = $modelUser->getUserInfo($arrInput, true);

		// 유저 유무 체크
		if(count($resultUserInfo) === 0 ){
			$this->arrErrorMsg[] = "아이디와 비밀번호를 다시 확인해 주세요.";
		// 로그인 페이지 리턴
			return "view/login.php";
		}
		// 세션에 u_id 저장
		$_SESSION["u_pk"] = $resultUserInfo[0]["id"];

		return "Location: /board/list?b_type=0";
	}

	// 로그아웃 처리
	protected function logoutGet() {
		session_unset();
		session_destroy();

	//로그인 페이지 리턴
	return "Location: /user/login";
	}

	// 회원가입 페이지 이동
	protected function registGet() {
		return "view/regist"._EXTENSION_PHP;
	}

	// 회원가입 처리
	protected function registPost(){
		$inputData=[
			"u_id" => $_POST["u_id"]
			,"u_pw" => $_POST["u_pw"]
			,"u_pw_chk" => $_POST["u_pw_chk"]
			,"u_name" => $_POST["u_name"]
		];
		$arrAddUserInfo = [
			"u_id" => $_POST["u_id"]
			,"u_pw" => $this->encryptionPassword($_POST["u_pw"])
			,"u_name" => $_POST["u_name"]
		];
		
		$patternId = "/^[a-zA-z0-9]{8,20}$/";
		$patternPw = "/^[a-zA-z0-9!@]{8,20}$/";
		$patternName = "/^[a-zA-Z가-힣]{2,50}$/u";
	
		// TODO : Validation 처리
		// TODO : 아이디 중복 체크 필요

		// 유효성 체크 실패
		if(!Validation::userChk($_POST)){
			$this->arrErrorMsg = Validation::getArrErrorMsg();
			return "view/regist.php";			
		}	
		// 인서트 처리
		$userModel = new UserModel();
		$userModel->beginTransaction();
		$result = $userModel->addUserInfo($arrAddUserInfo);

		if($result !== true){
			$userModel->rollBack();
		} else {
			$userModel->commit();
		}
		$userModel->destroy();

		return "Location: /user/login";
		
	}
	protected function userIdChk() {
        $u_id = $_GET["u_id"];
        // var_dump($inputData); // localhost/user/idchk?u_id=admin
        $useridchk = new UserModel();
        $result = $useridchk->userChkInfo($u_id);
        // $result = $useridchk->getUserInfo($u_id); // 이것도 가능.
        //$userModel->destroy();
        // if(count($result) > 0) {
        //     $errorFlg = "1";
        //     $errorMsg = "중복된 아이디 입니다.";
        // }
        $arrTmp = [
            "errflg" => "0"
            ,"msg" => ""
            ,"data" => $result[0]
        ];
        $response = json_encode($arrTmp);
        // response 처리
        header('Content-type: application/json'); // 데이터 타입이 json인것을 알려주는것.
        echo $response;
        exit();
    }
	// 비밀번호 암호화
	private function encryptionPassword($pw){
		return base64_encode($pw);
	}

}


// 부모클래스인 ParentsController를 상속받아 echo "ParentsController임".$action; 실행