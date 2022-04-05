<section id="menu">
    <div class="container">
      <div class="menu-area">
        <!-- Navbar -->
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>          
          </div>
          <div class="navbar-collapse collapse">
            <!-- Left nav -->
            <ul class="nav navbar-nav">
                  @foreach($menus as $item) {
                      <li>
                          <a href="#" class="has-submenu" id="sm-1649079455015797-1" aria-haspopup="true" aria-controls="sm-1649079455015797-2" aria-expanded="false">{{$item->name}} <span class="caret"></span></a>
                      </li>
                  }
                  @endforeach
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>       
    </div>
  </section>