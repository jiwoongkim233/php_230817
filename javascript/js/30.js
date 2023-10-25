// // Date
let now = new Date();

// getFullYear() : 연도만 가져오는 메소드
let year = now.getFullYear();
console.log(now.getFullYear());

// getMonth() : 월만 가져오는 메소드 (+1을 해야만 현재 월과 같다)
let month = now.getMonth() + 1;
console.log(now.getMonth()+1);

// getDate() : 일을 가져오는 메소드
let date = now.getDate();
let sDate = new Date('2023-09-30 19:20:10');


// getDay() : 요일을 가져오는 메소드 (0(일요일)~6(토요일))
let day = now.getDay();
let kday = '';
switch(day){
	case 1:
		kday='월요일';
		break;

		case 2:
		kday='화요일';
		break;
		
		case 3:
		kday='수요일';
		break;
		
		case 4:
		kday='목요일';
		break;

		case 5:
		kday='금요일';
		break;

		case 6:		
		kday='토요일';
		break;

		default:
		kday='일요일';
		break;
}

// getHours() : 시를 가져오는 메소드
console.log(now.getHours());

// getMinutes() : 분을 가져오는 메소드
console.log(now.getMinutes());

// getSeconds() : 초를 가져오는 메소드
console.log(now.getSeconds());

// getMilliseconds() : 밀리초를 가져오는 메소드 
console.log(now.getMilliseconds());

// getTime() : 1970/01/01 기준으로 얼마나 지났는지 밀리초단위로 출력
// console.log(now.getTime());

// 기준일 : 2023-09-30 19:20:10
// 오늘로부터 몇일 전인지 구하셈

now = new Date();
sDate = new Date('2023-09-30 00:00:00')
now2 = new Date(year, month-1, date, 0, 0, 0, 0);

let diff = Math.abs(Math.floor((now2 - sDate) / 86400000));


