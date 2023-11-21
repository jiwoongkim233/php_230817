<template lang="">
<div>  
	<div>
		<h4 @click="$emit('openModal', data)">{{ data.name }}</h4>
		<p>{{ data.price }}원</p>
		<button @click="$emit('report', productKey )">허위 매물 신고</button>
		<span>신고횟수 : {{data.reportCnt}}</span>
	</div>
</div>
	
</template>
<script>
export default {
	name:'Product',
	props:{
		data:Object,
		productKey: Number,
	}
}
</script>
<style lang="">
	
</style>