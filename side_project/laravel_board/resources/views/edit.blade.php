@extends('layout.layout')
@section('title', 'Edit')
@section('main')

<h1>수정페이지</h1>
<form action="{{route('board.update',['board' => $data->b_id])}}" method="POST">
@csrf
@method('PUT')
<label for="b_title">제목</label>
<input type="textarea" value={{$data->b_title}} name='b_title'>
<br><br>
<label for="b_content">내용</label>
<input type="textarea" value={{$data->b_content}} name='b_content'>
<br><br>
<button type="submit" class="btn btn-primary">수정</button>
<a href="{{route('board.show', ['board' => $data->b_id])}}" class="btn btn-danger">취소</a>
</form>

@endsection