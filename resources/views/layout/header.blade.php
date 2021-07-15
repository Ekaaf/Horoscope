<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
    <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
    </a>

    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0" style="margin: 0 auto;">
        <li><a href="{{URL::to('/')}}" class="nav-link px-2 link-dark <?php if(Request::segment(1) == '' || Request::segment(1) == 'generate-horoscope') echo "active" ?>">Generate Horoscope</a></li>
        <li><a href="{{URL::to('/horoscope')}}" class="nav-link px-2 link-dark <?php if(Request::segment(1) == 'horoscope') echo "active" ?>">Horoscope</a></li>
        <li><a href="{{URL::to('generate-horoscope-message')}}" class="nav-link px-2 link-dark <?php if(Request::segment(1) == 'generate-horoscope-message') echo "active" ?>">Horoscope with Message</a></li>
        <li><a href="{{URL::to('best-month')}}" class="nav-link px-2 link-dark <?php if(Request::segment(1) == 'best-month') echo "active" ?>">Best Month</a></li>
        <li><a href="{{URL::to('best-year')}}" class="nav-link px-2 link-dark <?php if(Request::segment(1) == 'best-year') echo "active" ?>">Best Year</a></li>
    </ul>
</header>