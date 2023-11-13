{{-- 상속 --}}
@extends('inc.layout')
{{-- section : 부모 템플릿에 해당하는 yield 부분에 삽입 --}}
@section('title','자식2 타이틀')

@section('main')

@for($i=1;$i<=9;$i++)
<span>{{$i}}단 </span>
	<br> 
	@for($e=1;$e<=9;$e++)
	<span>{{$i}}X{{$e}} = {{$i*$e}}</span>
	<br>
	@endfor
@endfor




@endsection