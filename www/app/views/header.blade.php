

<nav class="navbar navbar-default" id="nav-header">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        {{ HTML::image('img/we.png','',array('class' => 'navbar-brand')) }}
        <a class="navbar-brand" href="#" id="web-name">We Share</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav" id="font-body">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" id="dd-main">all <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu" id="font-body">
              <li><a onclick="updateTest('all'); updateSlide('all');">#all</a></li>
              @foreach($querys2 as $query2)
                  <li>
                      <a onclick="updateTest('{{$query2->tag}}'); updateSlide('{{$query2->tag}}');">#{{$query2->tag}}</a>
                  </li>
              @endforeach
            </ul>
          </li>
          <li>{{ HTML::link('/contact/c', 'ติดต่อ')}}</li>
        </ul>
        <form class="navbar-form navbar-left" role="search" id="frm-search" onsubmit="return false;">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="#hashtag, ชื่อ, สถานที่" id="input-search">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button" onclick="searchImage();"><span class="glyphicon glyphicon-search"></span></button>
            </span>
          </div><!-- /input-group -->
        </form>
        <ul class="nav navbar-nav navbar-right" id="font-body">
          <li><a href="#">ช่วยเหลือ</a></li>
          <li id="btn-sl"><a onclick="showslide();"><span class="glyphicon glyphicon-play"></span> Slide Show</a></li>
          <li id="btn-img" style="display: none;"><a onclick="showimage();"><span class="glyphicon glyphicon-stop"></span> Slide Show</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>