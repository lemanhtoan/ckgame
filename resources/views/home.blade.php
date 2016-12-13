{!! Html::style('css/bootstrap.min.css') !!}
{!! Html::style('css/catalog.css') !!}

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="{!! URL::to('/') !!}">Package Product - Laravel 5.1</a>
    </div>
    <div>
      <ul class="nav navbar-nav">
      	<li  class="active"><a href="{!! URL::to('/') !!}">Home page</a></li>
        <li><a href="{!! URL::to('/new-product') !!}">New product</a></li>
        <li><a href="{!! URL::to('/products') !!}">List products</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
	<h2>HOME PAGE</h2>
</div>