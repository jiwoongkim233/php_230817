
/*
1. HTTP(Hypertext Transfer Protocol)
어떻게 HyperText를 주고 받을지 규약한 프로토콜로
클라이언트가 서버에 데이터를 request(요청)을 하고,
서버가 해당 request에 따라 response(응답)을 클라이언트에 보내주는 방식입니다.
HyperText는 웹사이트에서 이용되는 하이퍼 링크나 리소스, 문서, 이미지 등을 모두 포함합니다. 

2. AJAX ( Asynchronous JavaScript And XML )
	웹페이지에서 비동기 방식으로 서버에게 데이터를 request하고,
	서버의 response를 받아 동적으로 웹페이지를 갱신하는 프로그래밍 방식입니다.
	즉, 웹페이지 전체를 다시 로딩하지 않고도 일부분만을 갱신 할 수 있습니다.
	대표적으로 XMLHttpRequest 방식과 Fetch Api 방식이 있습니다. 

3. JSON ( JavaScript Object Notation )
	JavaScript의 Object에 큰 영감을 받아 만들어진 서버 간의 HTTP 통신을 위한 텍스트 데이터 포맷입니다.
	장점은 다음과 같습니다.
		- 데이터를 주고 받을 때 쓸 수 있는 가장 간단한 파일 포맷
		- 가벼운 텍스트를 기반
		- 가독성이 좋음
		- Key와 Value가 짝을 이루고 있음
		- 데이터를 서버와 주고 받을 때 직렬화(Serialization)[*1참조]하기 위해 사용
		- 프로그래밍 언어나 플랫폼에 상관없이 사용 가능
	JSON.stringify(obj) : Object를 JSON 포맷의 String으로 변환(Serialization)해주는 메소드
	JSON.parse(json) : JSON 포맷의 String을 Object로 변환(Deserialization)해주는 메소드


 // XML

<xml>
	<data>
		<id>56</id>
		<name>홍길동</name>
	</data>
</xml> 

// JSON
{
	data : {
		id:56
		,name:'홍길동'
	}
}



*/

// https://picsum.photos/v2/list?page=1&limit=5

const BTN_API= document.querySelector('#btn-api');
BTN_API.addEventListener('click', my_fetch);
const BTN_DEL = document.querySelector('#btn-del');
BTN_DEL.addEventListener('click',delImg);

function my_fetch(){
	const INPUT_URL = document.querySelector('#input-url');
	fetch(INPUT_URL.value.trim())
	.then(response => {
		if(response.status >= 200 && response.status < 300  ){
			return response.json();
		} else {
			throw new error ('error');
		}
	})
	.then(data => makeImg(data))
	.then(data => console.log(data))
	.catch(error => console.log(error));
}

function delImg(){
	const DIV_PIC = document.querySelector('#div-img');
	DIV_PIC.innerHTML='';

}

function makeImg(data){
	data.forEach(item => {
		const NEW_IMG = document.createElement('img');
		const DIV_IMG = document.querySelector('#div-img');

		NEW_IMG.setAttribute('src', item.download_url);
		NEW_IMG.style.width='200px';
		NEW_IMG.style.height='200px';
		DIV_IMG.appendChild(NEW_IMG);

	})
}

// 방법 2
// for(let i = 0; i < img.length; i++){
// IMG[i].remove();}

// fetch 2번째 아규먼트 세팅 방법
function infinityLoop(){
	let apiURL = "http://112.222.157.156:6001/03_insert.php"
	let init = {
		method: "POST"
		,headers:{
		}
		,body: {
			title: "ddddd"
			,content:"ccccc"
			,em_id: "3"
		}
	};
	fetch(apiURL,init)
	.then(response => console.log(response))
	.catch(error => console.log(error));
}



