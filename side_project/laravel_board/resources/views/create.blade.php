@extends('layout.layout')
@section('title', 'create')
@section('main')
<h1>작성페이지</h1>
<form action="{{route('board.store')}}" method="post">
@include('layout.errorlayout')
@csrf
<label for="b_title">제목</label>
<input type="textarea" name = "b_title">
<br><br>
<label for="b_content">내용</label>
<input type="textarea" name="b_content">
<button type="submit" class="btn btn-secondary">작성</button>
<a href="{{route('board.index')}}" class="btn btn-secondary">취소</a>
</form>
@endsection