// 1. 현재 시간을 화면에 표시

// const H1 = document.getElementById('h1');

// function my_time(){
// 	let now = new Date();
// 	let time = now.getHours() + ":" + now.getMinutes() + ":" + now.getSeconds();
// 	h1.innerHTML = '현재 시각' + time;
// }
// my_time();
// setInterval(my_time, 1000);


// 2. 실시간으로 시간을 화면에 표시


// 3. 멈춰 버튼을 누르면, 시간 정지

// 4. 재시작 버튼을 누르면, 버튼을 누른 시점의 시간부터 다시 실시간으로 화면에 표시.

const PRINTTIME = document.getElementById('clock')
setInterval(getNow(), 1000);
let interval;
startTime();

function getNow() {
const NOW = new Date();
const NOWUSA = new Date();
let hour = NOW.getHours();
let minute = NOW.getMinutes();
let second = NOW.getSeconds();
let AMPM = hour > 12 ? '오후' : '오전';
let print_time = 
	AMPM + ' '
	+ add_str_zero(hour) + ':'
	+ add_str_zero(minute) + ':'
	+ add_str_zero(second);

NOWUSA.setTime(NOW - (1000*60*60*13) ); // 현재시간 - 13시 
let now_usa = NOWUSA.toLocaleTimeString();
PRINTTIME.innerHTML = print_time + '<br>' + now_usa;
}

getNow();
// 숫자가 10 미만이면 '0'을 붙여주는 함수
function add_str_zero(num){
	return String(num < 10 ? '0' + num : num);
}


const BTNSTOP = document.querySelector('#btn_stop');
BTNSTOP.addEventListener('click', stopTime);

function stopTime(){
	clearInterval(interval);
}

const BTNRESTART = document.querySelector('#btn_restart');
BTNRESTART.addEventListener('click',startTime);

function startTime(){
	getNow();
	interval = setInterval( getNow,1000 );
}