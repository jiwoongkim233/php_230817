// 

function my_setTimeout(callback) {
    const NOW = new Date();
    let loop1 = new Date();
    while(loop1 - NOW <= 1000) {
        loop1 = new Date();
    }
    callback();
}

// 비동기 처리를 동기처리로 하고싶을때 (콜백함수를 이용하여 비동기 처리를 동기처리하도록 만들때 나타나는 소스코드의 난잡한 현상)
setTimeout(() => {
    console.log('A');
    setTimeout(() => {
        console.log('B');
        setTimeout(() => {
        	console.log('C')
        },1000)
    }, 2000)
}, 3000);

