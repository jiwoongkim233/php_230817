// // 조건문 
// if(조건) {

// } else if (조건){

// } else {

// }

// let age = 30;
// switch(age) {
// 	case 20:
// 	console.log("20대");
// 	break;

// 	case 30:
// 	console.log("30대");
// 	break;
	
// 	default:
// 	console.log("모르겠다");
// 	break;
// }

// ------------------------
// 반복문 (while, do_while, for, foreach, for....in, for...of)

// foreach (배열만 사용가능)
let arr = [1, 2, 3, 4];
// arr.forEach(function ( val, key ){
// 	console.log(`${key} : ${val}`);
// });
// for...in : 모든 객체를 루프 가능,
let obj = {
	key1: 'val1'
	,key2: 'val2'
};
for (let key in obj) {
	console.log(obj[key]);
};
// for...of : 모든 iterable객체를 루프 가능, value에 접근 가능 (String, Array, Map, Set, TypeArray.. )
// for(let key of obj){
// 	console.log(val);
// };

// 정렬

let sort_arr = [3, 5, 2, 7, 10];


;

for(let i =1;i<Array.length;i++)
	for(let j=0; j<i; j++)
		if(Arr[i] < Arr[j]){
			let x = Arr[i];
			Arr[i]=Arr[j];
			Arr[j]=x;
}
console.log(sort_arr);