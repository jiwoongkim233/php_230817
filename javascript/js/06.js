// --------------
// 기본 데이터 타입
// --------------

// 숫자(number)
let num = 1;

// 문자열(string)
let str = "sss";

// 불리언 (boolean)
let boo =true;

// null
let none = null;

// undefined
let undef;

// symbol : 고유한 ID를 가진 데이터 타입
// 무조건 ID로 체크
let symbol_1 = Symbol("symbol");
let symbol_2 = Symbol("symbol");

// 객체 타입
// Array 
let arr = [1, 2, 3];
// Date
// Math
// Object
let obj = {
	food1: "탕수육"
	,food2: "짜장면"
	,food3: "라조기"
	,eat: function(){
		console.log("먹자");
	}
	,list: {
		list1: "리스트1"
		,list2: "리스트2"
	}
}

// 그 외에 기본 데이터 타입을 제외한 모든 것

// 자기자신의 회원정보를 객체로 만들기

let obt = {
	name: "김지웅"
	,bday:"19961203"
	,contact:"01040426267"
	,gender:"M"
}
