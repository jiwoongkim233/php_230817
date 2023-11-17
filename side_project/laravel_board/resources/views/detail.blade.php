@extends('layout.layout')
@section('title', 'Login')
@section('main')
<main class="d-flex justify-content-center align-items-center h-75">
	<form action="{{route('board.destroy', ['board' => $data->b_id])}}" method="POST">
		@csrf
		@method('DELETE')
		<div class="mb-3">
		<p>글번호</p>		  
		<p>{{$data->b_id}}</p>
		</div>
	
		<div class="mb-3">
		<p>제목</p>		  
		<p>{{$data->b_title}}</p>
		</div>

		<div class="mb-3">
		<p>내용</p>		  
		<p>{{$data->b_content}}</p>
		</div>

		<div class="mb-3">
		<p>조회수</p>		  
		<p>{{$data->b_hits}}</p>
		</div>

		<div class="mb-3">
		<p>생성일</p>		  
		<p>{{$data->created_at}}</p>
		</div>
		
		<div class="mb-3">
		<p>수정일</p>		  
		<p>{{$data->updated_at}}</p>
		</div>
		<button type="submit" class="btn btn-danger">삭제</button>
		<a href="{{route('board.edit',['board' => $data->b_id])}}" class="btn btn-primary">수정</a>
	</main>
</form>
@endsection