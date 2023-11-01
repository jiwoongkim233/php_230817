const BTN_API= document.querySelector('#btnApi');
BTN_API.addEventListener('click', my_fetch);
const BTN_DEL = document.querySelector('#btnRemove');
BTN_DEL.addEventListener('click',my_remove);

function my_fetch(){
	const INPUT_URL = document.querySelector('#inputUrl');
	fetch(INPUT_URL.value.trim())
	.then(response => {
		if(response.status >= 200 && response.status < 300  ){
			return response.json();
		} else {
			throw new error ('error');
		}
	})
	.then(data => makeImg(data))
	// .then(data => console.log(data))
	.catch(error => console.log(error));
}

function my_remove(){
	const SECTION_CONTENTS = document.querySelector('.sectionContent');
	SECTION_CONTENTS.innerHTML='';
}

function makeImg(data) {
	data.forEach(item => {
		// Article 관련 요소 생성
		const ARTICLE= document.createElement('article');
		const ARTICLE_ID = document.createElement('div');
		const ARTICLE_img = document.createElement('img');
		// Article 관련 요소의 속성 및 컨텐츠 세팅
		ARTICLE_ID.className = 'articleId';
		ARTICLE_ID.innerHTML = item.id;
		ARTICLE_img.className = 'articleImg';
		ARTICLE_img.setAttribute('src', item.download_url);
		// Article 관련 요소 구조 세팅
		ARTICLE.appendChild(ARTICLE_ID);
		ARTICLE.appendChild(ARTICLE_img);

		const SECTION_CONTENTS = document.querySelector('.sectionContent');
		SECTION_CONTENTS.appendChild(ARTICLE);
	});	
}