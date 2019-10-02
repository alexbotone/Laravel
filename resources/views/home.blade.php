@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
 <div class="col-md-10 col-md-offset-1">
 <div class="panel panel-default">
 <div class = "panel-heading">Dashboard</div>
 <div class = "panel-body">
 <div></div>
 <div> <a href="{{ URL::to('nerds') }}"> View All Nerds</a> </div>
 <div> <a href="{{URL::to('tasks') }}"> View All Tasks</a> </div>
 </div>
 </div>
 </div>
 </div>
</div>
@endsection
