@php
$logo = get_field('logo','options');
@endphp
<header class="site-header" itemscope="" itemtype="https://schema.org/WPHeader">
    <div class="wrap">
        <div class="title-area">
            <a href="/" class="custom-logo-link" rel="home"
               aria-current="page">
                <img width="500" src="{!! $logo !!}">
            </a>
        </div>
        <nav class="nav-primary cofoss-responsive-menu" aria-label="Main" itemscope="" itemtype="https://schema.org/SiteNavigationElement" id="cofoss-nav-primary">
            <div class="wrap">
                {!! wp_nav_menu([
                    'theme_location'    => 'primary_navigation',
                        'echo'          => false,
                        'container'     =>  false,
                        'items_wrap'      => '<ul class="menu cofoss-nav-menu menu-primary js-superfish sf-js-enabled sf-arrows" id="menu-header-menu">%3$s</ul>'
                    ])
                !!}
            </div>
        </nav>
        <div id="header-search-wrap" class="header-search-wrap">
            <form class="search-form" method="get" action="https://demo.studiopress.com/monochrome/" role="search"
                  itemprop="potentialAction" itemscope="" itemtype="https://schema.org/SearchAction"><label
                        class="search-form-label screen-reader-text" for="searchform-1">Search this
                    website</label><input class="search-form-input" type="search" name="s" id="searchform-1"
                                          placeholder="Search this website" itemprop="query-input"><input
                        class="search-form-submit" type="submit" value="Search">
                <meta content="https://demo.studiopress.com/monochrome/?s={s}" itemprop="target">
            </form>
            <a href="#" role="button" aria-expanded="false" aria-controls="header-search-wrap"
               class="toggle-header-search close"><span class="screen-reader-text">Hide Search</span><span
                        class="ionicons ion-ios-close"></span></a></div>
    </div>
</header>
<script>
	var cofoss_responsive_menu = {"mainMenu":"Menu","menuIconClass":"ionicons-before ion-ios-menu","subMenu":"Submenu","subMenuIconClass":"ionicons-before ion-ios-arrow-down","menuClasses":{"combine":[],"others":[".nav-primary"]}};
</script>