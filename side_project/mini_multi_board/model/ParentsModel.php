<?php

namespace model;

use PDO;
use Exception;

class ParentsModel {
	protected $conn;

	// 생성자
	public function __construct(){
		$db_dns = "mysql:host="._DB_HOST.";dbname="._DB_NAME.";charset="._DB_CHARSET;
		try{
			$db_options= [
				// DB의 prepared statement 기능을 사용하도록 설정
				PDO::ATTR_EMULATE_PREPARES 	=> false
				// PDO Exception Throws하도록 설정
				,PDO:: ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
				// 연상배열로 Fetch를 하도록 설정
				,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
			];
			//PDO Class로 DB 연동
			$this->conn = new PDO($db_dns, _DB_USER, _DB_PW, $db_options);
		
		} catch(exception $e){
			echo "DB Connect Error : ".$e->getMessage(); // Exception 메세지 출력
			exit();
		}
	}

	// DB 파기
	public function destroy(){
		$this->conn=null;

	}
	// transaction 시작
	public function beginTransaction(){
		$this->conn->beginTransaction();
	}
	// commit
	public function commit(){
		$this->conn->commit();
	}

	//rollback
	public function rollBack(){
		$this->conn->rollBack();
	}
}