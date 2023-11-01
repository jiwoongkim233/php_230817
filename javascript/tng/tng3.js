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
	// .then(data => console.log(data))
	.catch(error => console.log(error));
}

function delImg(){
	const DIV_PIC = document.querySelector('.main');
	DIV_PIC.innerHTML='';
}

function makeImg(data) {
    data.forEach(item => { // foreach(배열 객체 루프) 돌때 마다 item에 저장
        const NEW_IMG = document.createElement('img');
        const DIV_IMG = document.querySelector('.main');
        const NEW_DIV = document.createElement('div');
        const NEW_P = document.createElement('p');
        NEW_IMG.setAttribute('src', item.download_url);
        NEW_DIV.setAttribute('class', 'div1');
        NEW_IMG.style.width = '90%';
        
        NEW_P.innerHTML=item.id;
        NEW_DIV.appendChild(NEW_P);
        NEW_DIV.appendChild(NEW_IMG);
        DIV_IMG.appendChild(NEW_DIV);		
    });
}