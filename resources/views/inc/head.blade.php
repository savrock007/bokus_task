@section('head')

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">Сайт Статей</a>
    
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item">
          <a class="{{ (request() -> segment(1) == '') ? 'nav-link active' : 'nav-link'}}" aria-current="page" href="/">Главная</a>
        </li>
        <li class="nav-item">
          <a class="{{ (request() -> segment(1) == 'articles') ? 'nav-link active' : 'nav-link'}} " href="/articles">Статьи</a>
        </li>
        
      </ul>
      <form class="d-flex">
      </form>
    </div>
  </div>
</nav>
