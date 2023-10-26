// 인라인 이벤트
// html파일 9~10라인 확인

// property listener

const BTNGOOGLE = document.getElementById('btn_google');
BTNGOOGLE.onclick=function(){
	location.href='http:\/\/www.google.com';
}

function popOpen(){
	winOpen = open('http:\/\/www.daum.net','','width=500 height=500');
}

// addEventListener(eventType, function) 방식
const BTNDAUM = document.getElementById('btn_daum');
let winOpen;
BTNDAUM.addEventListener('click', popOpen);
BTNDAUM.addEventListener('click',() => {
	winOpen = open('http:\/\/www.daum.net','','width=500 height=500');
});


// 팝업창 닫기
const BTNCLOSE = document.getElementById('btn_close');

function popClose(){
	winOpen.close();
}
BTNCLOSE.addEventListener('click',popClose);

// 이벤트 삭제
// BTNDAUM.removeEventListener('click', popOpen);

// test를 콘솔에 출력하는 함수
// function test() {
// 	console.log("test");
// }

// // 콜백함수를 실행하는 함수
// function cb(fnc){
// 	fnc();
// }

BTNCLOSE.removeEventListener('click',popClose);

const DIV1 = document.querySelector('#div');
DIV1.addEventListener('mouseenter', () => {
	alert('div에들어왔어요.');
	DIV1.style.backgroundColor = '#000000';
});





