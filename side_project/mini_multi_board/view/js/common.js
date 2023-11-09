// 모달 테스트
// const BTN_DETAIL = document.querySelector('#btnDetail');
// const BTN_MODAL_CLOSE = document.querySelector('#btnModalClose');

// BTN_DETAIL.addEventListener('click', () => {
// 	const MODAL = document.querySelector('#modal');
// 	MODAL.classList.remove('displayNone');
// });

// BTN_MODAL_CLOSE.addEventListener('click', () => {
// 	const MODAL = document.querySelector('#modal');
// 	MODAL.classList.add('displayNone');
// });

// 상세 모달 제어

let test;
function openDetail(id){
	const URL = '/board/detail?id='+id;
	console.log(URL)	
	fetch(URL)
	.then( response => response.json())
	.then( data => {
console.log(data);
		// 요소에 데이터 셋팅
		const TITLE = document.querySelector('#b_title');
		const CONTENT = document.querySelector('#b_content');
		const IMG = document.querySelector('#b_img');
		const CREATED_AT = document.querySelector('#created_at');
		const UPDATED_AT = document.querySelector('#updated_at');
		const DEL_INPUT = document.querySelector('#del_id');
		const BTN_DEL = document.querySelector('#btn_del');

		TITLE.innerHTML = data.data.b_title;
		CONTENT.innerHTML = data.data.b_content;
		CREATED_AT.innerHTML = data.data.created_at;
		UPDATED_AT.innerHTML = data.data.updated_at;
		DEL_INPUT.value = data.data.b_id;
		IMG.setAttribute('src', data.data.b_img);
				
		// 삭제 버튼 표시 처리
		if(data.data.uflg === "1") {
			BTN_DEL.classList.remove('d-none');
		} else {
			BTN_DEL.classList.add('d-none');
		}

		// 모달 오픈
		openModal();
	})
	.catch( error => console.log(error) )
}
// 모달 오픈 함수
function openModal(){
	const MODAL = document.querySelector('#modalDetail');
	MODAL.classList.add('show');
	MODAL.style='display:block; background-color: rgba(0,0,0,0.7);';
}

// 모달 닫기 함수
function closeDetailModal(){
	const MODAL = document.querySelector('#modalDetail');
	MODAL.classList.remove('show');
	MODAL.style='display:none;';
}

function userIdChk() {
    const SPAN = document.querySelector('#id_chk_span');
    SPAN.innerHTML = "";
    const IDCHK = document.querySelector('#u_id').value;
    const URL = '/user/idchk?u_id='+IDCHK; // get으로 보낼경우 이렇게!
    fetch(URL)
    .then( response => response.json() )
    .then( data => {
        if(data.data.cnt === 0) {
            SPAN.innerHTML = "사용가능한 아이디 입니다.";
            SPAN.classList = 'text-success';
        } else {
            SPAN.innerHTML = "이미 존재하는 아이디 입니다.";
            SPAN.classList = 'text-danger';
        }
    })
    .catch( error => console.log(error) );
}

// 삭제처리
function deleteCard(){
	const B_PK = document.querySelector('#del_id').value;
	const URL = '/board/remove?b_id=' + B_PK;

	fetch(URL)
	.then( response => response.json() )
	.then( data => {
		if(data.errflg === "0"){
			//모달 닫기
			closeDetailModal();
			// 카드 삭제
			const MAIN = document.querySelector('main');
			const CARD_NAME = '#card' + data.b_id;
			const DEL_CARD = document.querySelector(CARD_NAME);
			MAIN.removeChild(DEL_CARD);
		}else{
			alert(data.msg);
		}
	})
	.catch( error => console.log(error) )
}
