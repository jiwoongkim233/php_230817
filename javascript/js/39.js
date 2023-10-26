// 1. DOM (Document Object Model)
// - 웹 문서를 제어하기 위해서 웹 문서를 객체화한 것
// - DOM API를 통해서 HTML의 구조나 내용 또는 스타일등 동적으로 조작 가능

// 2. 요소 선택
// 2.1 고유한 ID로 요소를 선택
const TITLE = document.getElementById('title');
const SUBTITLE= document.getElementById('subtitle');

// 2.2 태그명으로 요소를 선택 (해당 요소들을 컬렉션 객체로 가져온다.)
const H2 = document.getElementsByTagName('h2');

// 2.3. 클래스로 요소를 선택
const NONE = document.getElementsByClassName('none-li');

// 2.4 css 선택자를 사용해 요소를 찾는 메소드
const S_ID = document.querySelector('#subtitle2');
// quertSelector() : 복수일경우 가장 첫번째 요소만 선택
const S_NONE = document.querySelector('.none-li');
// querySelectorAll() : 복수의 요소라면 전부 선택
const S_NONE_ALL = document.querySelectorAll('.none-li');

// 3. 요소 조작
// textContent : 순수한 텍스트 데이터를 전달, 이전의 태그들은 모두 제거
TITLE.textContent = '<p>탕수육</p>';

// innerHTML : 태그는 태그로 인식해서 전달, 이전의 태그들은 모두 제거
TITLE.innerHTML = '<p>탕수육</p>';

// setAttribute('','') : 요소에 속성을 추가
// ** 몇몇 속성들은 DOM객체에서 바로 설정 가능
// ex) INTXT.placeholder = '바로 접근 가능';
const INTXT = document.getElementById('intxt');
INTXT.setAttribute('placeholder', 'qwert');

// removeAttribute() : 요소에 속성을 제거 
INTXT.removeAttribute('placeholder');

// 4. 요소 스타일링
TITLE.style.color='red';

// classList: 클래스로 스타일 추가
TITLE.classList.add('class1','class2','class3');
TITLE.classList.remove('class2','class3');

// 새로운 요소 생성

// 요소만들기
const LI = document.createElement('li');
LI.innerHTML = "글글글글";
// 삽입할 부모 요소 접근
const UL = document.querySelector('#ul');
// 부모요소의 가장 마지막 위치에 삽입
UL.appendChild(LI);
// 요소를 특정 위치에 삽입하는 방법.
const SPACE = document.querySelector('li:nth-child(3)');

UL.insertBefore(LI, SPACE);


// 1. 사과게임 위에 장기를 넣어주세요
const CHESS = document.createElement('li');
CHESS.innerHTML="장기";
const APPLE = document.querySelector('li:nth-child(5)');
UL.insertBefore(CHESS, APPLE);

// 2. 어메이징브릭에 베이지 배경색을 넣어주세요
const BRICK = document.querySelector('li:nth-child(11)');
BRICK.style.backgroundColor='beige';

// 3. 리스트에서 짝수는 빨간색글씨, 홀수는 파랑색글씨
const listItems=document.querySelectorAll('ul li');
	listItems.forEach((item,index) => {
		if(index %2===0){
			item.style.color='red';
		}else{
			item.style.color='blue';
		}
	}); 

// 6. 참조
// DOM 속성
// develpoer.mozilla.org/en/docs/Web/API/Element

// Document
// developer.mozila.org/en/docs/Web/API/Document