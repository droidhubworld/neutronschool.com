<!DOCTYPE html>

@langrtl
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
@else
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@endlangrtl

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', app_name())</title>
        <meta name="description" content="@yield('meta_description', 'Laravel Starter')">
        <meta name="author" content="@yield('meta_author', 'FasTrax Infotech')">
        @yield('meta')

        {{-- See https://laravel.com/docs/5.5/blade#stacks for usage --}}
        @stack('before-styles')

        <!-- Check if the language is set to RTL, so apply the RTL layouts -->
        <!-- Otherwise apply the normal LTR layouts -->

        <!-- {{ style(mix('css/frontend.css')) }} -->
        {{ style(mix('css/frontend1.css')) }}
        

        @stack('after-styles')
    </head>
    <body>
        @include('includes.partials.read-only')
        <!-- pre loader area start -->
        <div id="loading">
            <div id="loading-center">
            <div id="loading-center-absolute">
                <div class="loading-content-2 text-center">
                    <img class="loading-logo-icon-2" src="{{ asset('img/frontend/img/logo/logo-icon.png') }}" alt="">
                    <img class="loading-logo-text-2" src="{{ asset('img/frontend/img/logo/logo-text-2.png') }}" alt="">
                </div>
            </div>
            </div>
        </div>
        <!-- pre loader area end -->

        <!-- back to top start -->
        <div class="progress-wrap">
            <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
            </svg>
        </div>
        <!-- back to top end -->

        @include('includes.partials.logged-in-as')
        @include('frontend.includes.nav')

        @yield('content')

 <!-- footer area start -->
 <footer>
    <div class="footer__area grey-bg-2">
       <div class="footer__top pt-190 pb-40">
          <div class="container">
             <div class="row">
                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6">
                   <div class="footer__widget mb-50">
                      <div class="footer__widget-head mb-22">
                         <div class="footer__logo">
                            <a href="index.html">
                               <img src="{{ asset('img/frontend/img/logo/logo.png') }}" alt="">
                            </a>
                         </div>
                      </div>
                      <div class="footer__widget-body footer__widget-body-2">
                         <p>Great lesson ideas and lesson plans for ESL teachers! Educators can customize lesson plans to best.</p>

                         <div class="footer__social">
                            <ul>
                               <li><a href="#"><i class="social_facebook"></i></a></li>
                               <li><a href="#" class="tw"><i class="social_twitter"></i></a></li>
                               <li><a href="#" class="pin"><i class="social_pinterest"></i></a></li>
                            </ul>
                         </div>
                      </div>
                   </div>
                </div>
                <div class="col-xxl-2 offset-xxl-1 col-xl-2 offset-xl-1 col-lg-3 offset-lg-0 col-md-2 offset-md-1 col-sm-5 offset-sm-1">
                   <div class="footer__widget mb-50">
                      <div class="footer__widget-head mb-22">
                         <h3 class="footer__widget-title footer__widget-title-2">Company</h3>
                      </div>
                      <div class="footer__widget-body">
                         <div class="footer__link footer__link-2">
                            <ul>
                               <li><a href="#">About</a></li>
                               <li><a href="#">Courses</a></li>
                               <li><a href="#">Events</a></li>
                               <li><a href="#">Instructor</a></li>
                               <li><a href="#">Career</a></li>
                               <li><a href="#">Become a Teacher</a></li>
                               <li><a href="#">Contact</a></li>
                            </ul>
                         </div>
                      </div>
                   </div>
                </div>
                <div class="col-xxl-2 col-xl-2 col-lg-2 offset-lg-0 col-md-3 offset-md-1 col-sm-6">
                   <div class="footer__widget mb-50">
                      <div class="footer__widget-head mb-22">
                         <h3 class="footer__widget-title footer__widget-title-2">Platform</h3>
                      </div>
                      <div class="footer__widget-body">
                         <div class="footer__link footer__link-2">
                            <ul>
                               <li><a href="#">Browse Library</a></li>
                               <li><a href="#">Library</a></li>
                               <li><a href="#">Partners</a></li>
                               <li><a href="#">News & Blogs</a></li>
                               <li><a href="#">FAQs</a></li>
                               <li><a href="#">Tutorials</a></li>
                               <li><a href="{{route('frontend.auth.trainerregister')}}">Trainer Register</a></li>
                            </ul>
                         </div>
                      </div>
                   </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-5 col-sm-6">
                   <div class="footer__widget footer__pl-70 mb-50">
                      <div class="footer__widget-head mb-22">
                         <h3 class="footer__widget-title footer__widget-title-2">Subscribe</h3>
                      </div>
                      <div class="footer__widget-body">
                         <div class="footer__subscribe footer__subscribe-2">
                            <form action="#">
                               <div class="footer__subscribe-input mb-15">
                                  <input type="email" placeholder="Your email address">
                                  <button type="submit">
                                     <i class="far fa-arrow-right"></i>
                                     <i class="far fa-arrow-right"></i>
                                  </button>
                               </div>
                            </form>
                            <p>Get the latest news and updates right at your inbox.</p>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
       <div class="footer__bottom footer__bottom-2">
          <div class="container">
             <div class="row">
                <div class="col-xxl-12">
                   <div class="footer__copyright footer__copyright-2 text-center">
                      <p>© 2022 Educal, All Rights Reserved. Design By <a href="index.html">Theme Pure</a></p>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </footer>
 <!-- footer area end -->

        <!-- Scripts -->
        @stack('before-scripts')
        {!! script(mix('js/manifest.js')) !!}
        {!! script(mix('js/vendor.js')) !!}
        {!! script(mix('js/frontend.js')) !!}
        {!! script(mix('js/frontend1.js')) !!}

       



        @stack('after-scripts')

        @include('includes.partials.ga')
    </body>
</html>
