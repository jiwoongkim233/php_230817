<template>
  <img alt="Vue logo" src="./assets/logo.png">
  <!-- 헤더 -->
  <div class="nav">
    <!-- <a href="#">Home</a>
    <a href="#">Product</a>
    <a href="#">Etc</a> -->

    <!-- 반복문 -->
    <a v-for="(item, i) in navList" :key="i">{{ item }}</a>
  </div>
  <!-- 모달  -->
<transition name="modalAni">
  <div class="bg_black" v-if="modalFlg" name="modalAni">
    <div class="bg_white">
      <img :src="modalProduct.img" alt="img">
      <h4>{{ modalProduct.name }}</h4>
      <p>{{ modalProduct.content }}</p>
      <p>{{ modalProduct.price }} 원</p>
      <p>{{ modalProduct.reportCnt }}</p>
      <button @click="modalFlg=false">취소</button>
    </div>
  </div>
</transition>


  <!-- 상품 리스트 -->
  <div>
      <div v-for="(item, i) in products" :key="i"> 
        <h4 @click="modalOpen(item)">{{ item.name }}</h4>
        <p>{{ item.price }}원</p>
        <button @click="plusOne(i)">허위 매물 신고</button>
        <span>신고횟수 : {{item.reportCnt}}</span>
      </div>
  </div>
</template>

<script>
import data from './assets/js/data.js';

export default {
  name: 'App',
  
  // 데이터 바인딩 : 우리가 사용할 데이터를 저장하는 공간
  data(){
    return{
      navList:['Home','Products','Etc','Contact'],
      // prices : [2200,24000,50000],
      // products:['양말','티셔츠','바지'],
      sty_color_red: 'color:red;',
      products : data,
      modalFlg:false,
      modalProduct:{},
    }
},
//methods : 함수를 정의하는 영역
  methods : {
    plusOne(i) {
      this.products[i].reportCnt++;
    },

    modalOpen(item){
      this.modalFlg=true;
      this.modalProduct=item;
    }
  },
}
</script>

<style>
@import url('./assets/css/common.css');
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
/* css 파일로 이관 */
/* .nav{
  background-color: #2c3e50;
  padding:15px;
  border-radius: 10px;
}
.nav a{
  color: #fff;
  padding: 10px;
  text-decoration: none;
} */
</style>
