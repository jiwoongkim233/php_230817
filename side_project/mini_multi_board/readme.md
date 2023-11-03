<!-- xcopy D:\workspace_jiwoong\php_230817\side_project\mini_multi_board C:\Apache24\htdocs\mini_multi_board /E /Y -->
1. MVC 패턴
Model, View, Controller 소프트웨어 디자인패턴 중 하나
Model : DATA, 정보들의 가공을 책임지는 컴포넌트
View : 사용자 인터페이스 요소, 데이터를 기반으로 유저가 볼 수 있는 화면
Controller : 모델과 뷰를 연결해주는 다리 역할

2. Database
1) user Table
 - pk,아이디,비밀번호,이름,가입일자 탈퇴일자,수정일자 
2) board Table
 - pk, 유저pk, 게시판타입, 제목, 내용, 이미지파일, 작성일자, 수정일자, 삭제일자
3) boardname(게시판 기본 정보) Table
 - pk, 게시판타입, 게시판이름,