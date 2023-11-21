<template>
  <img alt="Vue logo" src="./assets/logo.png">
  <!-- 헤더 -->
  <!-- <div class="nav">
     <a href="#">Home</a>
    <a href="#">Product</a>
    <a href="#">Etc</a> -->

    <!-- 반복문 -->
  <!-- </div>  -->
    <!-- <a v-for="(item, i) in navList" :key="i">{{ item }}</a> -->
    <Header :navList="navList"/>

  <!-- 할인 배너 -->
  
  <!-- 컴포넌트로 이관 -->
<!-- <div class="discount">
  <p>지금 사면 30% 할인</p>
</div> -->
<Discount></Discount>
  <!-- 모달  -->
<transition name="modalAni">
  <Modal v-if="modalFlg"
  :data = "modalProduct"
  @closeModal="modalClose"/>
</transition>


  <!-- 상품 리스트 -->
  <div>
    <Product v-for="(item, i) in products" :key="i"
    :data = "item"
    :productKey="i"
    @report="plusOne"
    @openModal="modalOpen"
    />
  </div>
</template>

<script>
import data from './assets/js/data.js';
import Discount from './components/Discount.vue';
import Header from './components/Header.vue';
import Modal from './components/Modal.vue';
import Product from './components/Product.vue';

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
    },
    modalClose(){
      this.modalFlg=false;
    },
    
    
  },
  // components : 컴포넌트를 등록하는 영역
  components : {
    Discount, Header, Modal, Product
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
