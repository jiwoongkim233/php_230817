<template>
	<div class="discount">
	<p>지금 사면 {{ discountNum }}% 할인</p>
	</div>
</template>
<script>
export default {
	name:'Discount',
	data(){
		return{
			discountNum:20,
			intervalInfo:null,
		}
	},
	// mounted(): 라이프사이클훅 : mounted 단계에서 실행되는 영역
	mounted(){
		this.intervalInfo = setInterval(()=>{
			this.discountNum--;
		},1000);
	},
	updated(){
		if(this.discountNum === 10){
			clearInterval(this.intervalInfo);
		}
	}, 
}
</script>
<style>
	
</style>