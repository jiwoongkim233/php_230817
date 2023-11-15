@extends('layout.layout')
@section('title', 'Login')
@section('main')
<main>
	<div>{{$data->b_id}}</div>
	<div>{{$data->b_title}}</div>
	<div>{{$data->b_content}}</div>
	<div>{{$data->b_hits}}</div>
	<div>{{$data->created_at}}</div>
	<div>{{$data->updated_at}}</div>
</main>
@endsection