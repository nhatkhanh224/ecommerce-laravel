<div class="header-bottom">
  <!--header-bottom-->
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="mainmenu pull-left">
          <ul class="nav navbar-nav collapse navbar-collapse">
            <li><a href="index.html" class="active">Home</a></li>
            @foreach($category_menus as $categoryParent)
            
            <li class="dropdown"><a href="#">{{$categoryParent->name}}<i class="fa fa-angle-down"></i></a>
            @include('home.components.child_menu',['categoryParent'=>$categoryParent])
            </li>
            @endforeach
            <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
              <ul role="menu" class="sub-menu">
                <li><a href="blog.html">Blog List</a></li>
                <li><a href="blog-single.html">Blog Single</a></li>
              </ul>
            </li>
            
            <li><a href="contact-us.html">Contact</a></li>
          </ul>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="search_box pull-right">
          <input type="text" placeholder="Search" />
        </div>
      </div>
    </div>
  </div>
</div>
<!--/header-bottom-->