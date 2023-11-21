<template lang="">
	<div class="nav">
		<a v-for="(item, i) in navList" :key="i">{{ item }}</a>
	</div>
</template>
<script>
export default {
	name: 'Header',
	props:{
		navList: Array,
	}
}

</script>
<style lang="">
	
</style>