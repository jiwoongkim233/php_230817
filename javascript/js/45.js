//
 /* 1. Promise 객체
	- 비동기 프로그래밍의 근간이 되는 기법 중 하나
	- Promise를 사용하면 콜백 함수를 대체하고, 비동기 작업의 흐름을 쉽게 제어가능
	- Promise 객체는 비동기 작업의 최종 완료 또는 실패를 나타내는 독자적인 객체 
	
*/

// 2. Promise 사용법

const PROMISE1 = new Promise( function(resolve, reject) {
	 let flg = true;
	 if(flg){
		return resolve('성공'); //요청 성공 시 resolve()를 호출
	 } else {
		return reject('실패'); //요청 실패 시 reject()를 호출
	 }
}); 

PROMISE1
.then( data => console.log(data))
.catch( err => console.log(err))
.finally(() => console.log('finally 입니다'));

const PRO2 = function(ms) {
	return new Promise((resolve)=>{setTimeout(()=>resolve(ms),ms);
	})
}

PRO2(1000)
.then(data => 
	{console.log('A'); 
	PRO2
	.then()
});

function PRO2(){
	return new Promise( function(resolve,reject){
		let flg = true;
		if(flg){
			return resolve('성공');
		} else{
			return reject('실패');
		}
	});
}

function PRO3(){
	return new Promise( function(resolve){
		setTimeout(()=>{
			console.log(str);
			return resolve();
		}, ms);
	});
}

PRO3('A', 3000)
.then( () => PRO3('B', 2000) )
.then( () => PRO3('C', 1000) );