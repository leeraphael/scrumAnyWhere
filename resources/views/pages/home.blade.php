@extends('app')

@section('head')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<style>
.welcomeBox {
  font-size:small;
  text-align: left;
  min-height: 200px;
  min-width: 200px;
  padding: 10px;
}
</style>
@endsection
@section('main')
<div class="col-md-6 column">
  <div class="jumbotron welcomeBox">
  	<h3>
  		歡迎使用ScrumAnyWhere
  	</h3>
  	<p>
  		為什麼需要ScrumAnyWhere呢? 該工具可以協助進行敏捷開發，針對產品開發跟藍圖進行規劃。
  	</p>

    <p>
      <a class="btn btn-primary btn-large" href="{{ action('scrumBoardController@index')}}">Getting started</a>
    </p>
  </div>
</div>
@endsection


