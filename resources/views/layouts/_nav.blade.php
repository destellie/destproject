<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#" style="color:pink">FashionNova</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <!-- inserting menu automatically-->
         
            @foreach ($menuItems as $menuItem)
            <li class="nav-item">
              <a href="{{$menuItem->link}}" class="nav-link">{{$menuItem->name}}</a>
              </li>
            @endforeach
          </ul>
          <ul class="navbar-nav ml-auto navbar-right">
           <li class="nav-item">
             <a class="nav-link" href="{{ route('login') }}">Login</a>
           </li>
                           
           <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">Register</a>
            </li>

        </ul>
                </div>
            </div>
      </div>
    </div>
  </nav>