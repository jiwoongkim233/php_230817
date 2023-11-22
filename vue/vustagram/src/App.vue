<template>
  <!-- 헤더 -->
  <div class="header">
  <ul>
    <li @click="previousPage"
      class="header-button header-button-left" 
      v-if="$store.state.flgTapUI !== 0">취소</li>
    <li><img class="logo" alt="Vue logo" src="./assets/logo.png"></li>
    <li class="header-button header-button-right"
      v-if="$store.state.flgTapUI === 1"
      @click="addBoard()"
      >작성</li>
  </ul>
</div>  
<!-- 컨테이너 -->
<ContainerComponent/>


<!-- 더보기 버튼 -->
<button @click="addList()">더보기</button>

<!-- 푸터 -->
<div class="footer">
  <div class="footer-button-store">
    <label class="label-store" for="file">+</label>
    <input @change="updateImg" accept="image/*" type="file" id="file" class="input-file">
  </div>
</div>

</template>

<script>
import ContainerComponent from './components/ContainerComponent.vue';

export default {
  name: 'App',
  created(){
    this.$store.dispatch('actionGetBoardList');
  },
  methods: {
    updateImg(e){
      const file = e.target.files;
      const imgURL = URL.createObjectURL(file[0]);
      // 작성 영역에 이미지를 표시하기위한 데이터 저장
      this.$store.commit('setImgURL',imgURL);
      // 작성 처리시 보낼 파일 데이터 저장
      this.$store.commit('setPostFileData', file[0]);
      // 작성 ui 변경을 위한 플래그 수정
      this.$store.commit('setFlgTapUI', 1);

      // 이벤트 타겟 초기화
      e.target.value = '';
    },
    previousPage(){
      this.$store.commit('setFlgTapUI', 0);
    },
    // 글 작성처리
    addBoard(){
      this.$store.dispatch('actionPostBoardAdd');
    },

    addList(){
      this.$store.dispatch('actionPostBoardMore');
    },
  },
  components: {
    ContainerComponent,
  }
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
</style>
