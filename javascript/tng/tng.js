// 1. 버튼을 클릭시 아래 내용의 알러트가 나옵니다.
// "안녕하세요."
// "숨어있는 div를 찾아보세요"

const BUTTON = document.querySelector('#btn_hi')
BUTTON.addEventListener('click',() => {
	alert('안녕하세요.\n숨어있는 div를 찾아보세요');
})
// 2. 특정 영역에 마우스 포인터가 진입하면 아래 내용의 알러트 출력. 들킨 상태에서는 알러트 안나옵니다
// "두근두근"

const DIVMAIN = document.querySelector('#div1')
DIVMAIN.addEventListener('mouseenter', () => {
	alert('ㄷㄱㄷㄱ');
})

// 3. 2번의 영역을 클릭하면 "들켰다" 알러트 출력. 배경색 베이지색으로 변경

const DIVSUB = document.querySelector('#div_sub')
DIVSUB.addEventListener('click', () => {
	alert('들켰다');
	DIVSUB.style.backgroundColor = 'beige';
})