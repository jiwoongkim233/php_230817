// timer 함수
// 1. setTimeout(콜백함수, 시간(ms)) : 일정시간이 흐른 후에 콜백함수를 실행
// setTimeout(() => console.log('시간'), 3000);

// 콘솔에 1초 뒤에 A, 2초뒤에 B, 3초뒤에 C
// setTimeout(() => console.log('A'),1000);
// setTimeout(() => console.log('B'),2000);
// setTimeout(() => console.log('C'),3000);

// 방법2
// function my_print(chr,ms){
// 	setTimeout(() => console.log(chr),ms);
// }
// my_print('A',1000);
// my_print('B',2000);
// my_print('C',3000);

// 2. clearTimeout(해당 setTimeOut객체) : 타이머 삭제;
let mySet = setTimeout(() => console.log('C'),5000);
clearTimeout(mySet);

// 3. setInterval( 콜백함수, 시간(ms) ) : 일정 시간마다 반복
let my_inter = setInterval(() => console.log('dddddd'),1000); 

// 4. clearInterval(해당 setInterval) : 인터벌 삭제
clearInterval(my_inter);

// 5. 화면을 로드하고 5초 뒤에 '등장'

// const APPEAR = document.getElementById("head");

// function stout(){
// 	APPEAR.innerHTML="두둥등장";
// 	APPEAR.classList.add;
// 	APPEAR.style.color="red";
// 	APPEAR.style.fontSize="400px";
// }

// setTimeout(stout,5000);

// h1태그를 만드는 함수로 만들어서 하는 방법

// function stout(){
// const APPEAR = document.createElement('h1');
// APPEAR.innerHTML = '두둥등장!';
// document.body.appendChild(APPEAR);
// }

// setTimeout(stout,5000);

// function mySum(a,b){
// 	return a+b;
// }

// mySum(2,5);
// // 1. 
// function PhP(){
// 	console.log(':php')
// }
// setTimeout(PhP,3000);

// //2. 
// function functionTwo(){
// 	console.log(':504')
// }
// setTimeout(functionTwo,5000);

// // 3.
// function fullStack(){
// 	console.log(':풀스택')
// }

let CURRENT=new Date();
let MONTH = CURRENT.getMonth() + 1;
let now = CURRENT.getFullYear() + "-" + MONTH + "-" + CURRENT.getDate() + " " + CURRENT.getHours() + ":" + CURRENT.getMinutes() + ":" + CURRENT.getSeconds();
console.log(now);

function redirect(){
	location.href="https://www.naver.com"
}

