@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.frontend.auth.login_box_title'))

@section('content')
<!-- cart mini area start -->
<div class="cartmini__area">
    <div class="cartmini__wrapper">
       <div class="cartmini__title">
          <h4>Shopping cart</h4>
       </div>
       <div class="cartmini__close">
          <button type="button" class="cartmini__close-btn"><i class="fal fa-times"></i></button>
       </div>
       <div class="cartmini__widget">
          <div class="cartmini__inner">
             <ul>
                <li>
                   <div class="cartmini__thumb">
                      <a href="#">
                         <img src="{{ asset('img/frontend/img/course/sm/cart-1.jpg') }}" alt="">
                      </a>
                   </div>
                   <div class="cartmini__content">
                      <h5><a href="#">Strategy law and organization Foundation </a></h5>
                      <div class="product-quantity mt-10 mb-10">
                         <span class="cart-minus">-</span>
                         <input class="cart-input" type="text" value="1"/>
                         <span class="cart-plus">+</span>
                      </div>
                      <div class="product__sm-price-wrapper">
                         <span class="product__sm-price">$46.00</span>
                      </div>
                   </div>
                   <a href="#" class="cartmini__del"><i class="fal fa-times"></i></a>
                </li>
                <li>
                   <div class="cartmini__thumb">
                      <a href="#">
                         <img src="{{ asset('img/frontend/img/course/sm/cart-2.jpg') }}" alt="">
                      </a>
                   </div>
                   <div class="cartmini__content">
                      <h5><a href="#">Fundamentals of music theory Learn new</a></h5>
                      <div class="product-quantity mt-10 mb-10">
                         <span class="cart-minus">-</span>
                         <input class="cart-input" type="text" value="1"/>
                         <span class="cart-plus">+</span>
                      </div>
                      <div class="product__sm-price-wrapper">
                         <span class="product__sm-price">$32.00</span>
                      </div>
                   </div>
                   <a href="#" class="cartmini__del"><i class="fal fa-times"></i></a>
                </li>
                <li>
                   <div class="cartmini__thumb">
                      <a href="#">
                         <img src="{{ asset('img/frontend/img/course/sm/cart-3.jpg') }}" alt="">
                      </a>
                   </div>
                   <div class="cartmini__content">
                      <h5><a href="#">Strategy law and organization Foundation </a></h5>
                      <div class="product-quantity mt-10 mb-10">
                         <span class="cart-minus">-</span>
                         <input class="cart-input" type="text" value="1"/>
                         <span class="cart-plus">+</span>
                      </div>
                      <div class="product__sm-price-wrapper">
                         <span class="product__sm-price">$62.00</span>
                      </div>
                   </div>
                   <a href="#" class="cartmini__del"><i class="fal fa-times"></i></a>
                </li>
             </ul>
          </div>
          <div class="cartmini__checkout">
             <div class="cartmini__checkout-title mb-30">
                <h4>Subtotal:</h4>
                <span>$113.00</span>
             </div>
             <div class="cartmini__checkout-btn">
                <a href="cart.html" class="e-btn e-btn-border mb-10 w-100"> <span></span> view cart</a>
                <a href="checkout.html" class="e-btn w-100"> <span></span> checkout</a>
             </div>
          </div>
       </div>
    </div>
 </div>
 <div class="body-overlay"></div>
 <!-- cart mini area end -->


 <!-- sidebar area start -->
 <div class="sidebar__area">
    <div class="sidebar__wrapper">
       <div class="sidebar__close">
          <button class="sidebar__close-btn" id="sidebar__close-btn">
          <span><i class="fal fa-times"></i></span>
          <span>close</span>
          </button>
       </div>
       <div class="sidebar__content">
          <div class="logo mb-40">
             <a href="index.html">
             <img src="{{ asset('img/frontend/img/logo/logo.png') }}" alt="logo">
             </a>
          </div>
          <div class="mobile-menu fix"></div>

          <div class="sidebar__search p-relative mt-40 ">
             <form action="#">
                <input type="text" placeholder="Search...">
                <button type="submit"><i class="fad fa-search"></i></button>
             </form>
          </div>
          <div class="sidebar__cart mt-30">
             <a href="#">
                <div class="header__cart-icon">
                   <svg viewBox="0 0 24 24">
                      <circle class="st0" cx="9" cy="21" r="1"/>
                      <circle class="st0" cx="20" cy="21" r="1"/>
                      <path class="st0" d="M1,1h4l2.7,13.4c0.2,1,1,1.6,2,1.6h9.7c1,0,1.8-0.7,2-1.6L23,6H6"/>
                   </svg>
                </div>
                <span class="cart-item">2</span>
             </a>
          </div>
       </div>
    </div>
 </div>
 <!-- sidebar area end -->
 <div class="body-overlay"></div>
 <!-- sidebar area end -->

 <main>

    <!-- sign up area start -->
    <section class="signup__area po-rel-z1 pt-100 pb-145">
       <div class="sign__shape">
          <img class="man-1" src="{{ asset('img/frontend/img/icon/sign/man-1.png') }}" alt="">
          <img class="man-2" src="{{ asset('img/frontend/img/icon/sign/man-2.png') }}" alt="">
          <img class="circle" src="{{ asset('img/frontend/img/icon/sign/circle.png') }}" alt="">
          <img class="zigzag" src="{{ asset('img/frontend/img/icon/sign/zigzag.png') }}" alt="">
          <img class="dot" src="{{ asset('img/frontend/img/icon/sign/dot.png') }}" alt="">
          <img class="bg" src="{{ asset('img/frontend/img/icon/sign/sign-up.png') }}" alt="">
       </div>
       <div class="container">
          <div class="row">
             <div class="col-xxl-8 offset-xxl-2 col-xl-8 offset-xl-2">
                <div class="section__title-wrapper text-center mb-55">
                   <h2 class="section__title">Sign in to <br>  recharge direct.</h2>
                   <p>it you don't have an account you can <a href="#">Register here!</a></p>
                </div>
             </div>
          </div>
          <div class="row">
             <div class="col-xxl-6 offset-xxl-3 col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                <div class="sign__wrapper white-bg">
                   <div class="sign__header mb-35">
                      <div class="sign__in text-center">

                         @include('frontend.auth.includes.socialite')

                         <p> <span>........</span> Or, <a href="sign-in.html">sign in</a> with your email<span> ........</span> </p>
                      </div>
                   </div>
                   @include('includes.partials.messages')
                   <div class="sign__form">
                    {{ html()->form('POST', route('frontend.auth.login.post'))->open() }}
                         <div class="sign__input-wrapper mb-25">
                            <h5>{{ html()->label(__('validation.attributes.frontend.email'))->for('email') }}</h5>
                            <div class="sign__input">
                                {{ html()->email('email')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.frontend.email'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                               <i class="fal fa-envelope"></i>
                            </div>
                         </div>
                         <div class="sign__input-wrapper mb-10">
                            <h5>{{ html()->label(__('validation.attributes.frontend.password'))->for('password') }}</h5>
                            <div class="sign__input">
                                {{ html()->password('password')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.password'))
                                        ->required() }}
                               <i class="fal fa-lock"></i>
                            </div>
                         </div>
                         <div class="sign__action d-sm-flex justify-content-between mb-30">
                            <div class="sign__agree d-flex align-items-center">
                                {{ html()->checkbox('remember', true, 1)->class('m-check-input') }}
                                {{ html()->label(__('labels.frontend.auth.remember_me'))->class('m-check-label')->for('remember') }}
                            </div>
                            <div class="sign__forgot">
                               <a href="{{ route('frontend.auth.password.reset') }}">@lang('labels.frontend.passwords.forgot_password')</a>
                            </div>
                         </div>

                         {{ form_submit(__('labels.frontend.auth.login_button'),'e-btn  w-100') }}
                         @if(config('access.captcha.login'))
                            <div class="row">
                                <div class="col">
                                    @captcha
                                    {{ html()->hidden('captcha_status', 'true') }}
                                </div><!--col-->
                            </div><!--row-->
                        @endif

                        @if(config('access.registration'))
                            <div class="sign__new text-center mt-20">
                                <p>New to Markit? <a href="{{route('frontend.auth.register')}}">@lang('navs.frontend.register')</a></p>
                            </div>
                        @endif

                         {{ html()->form()->close() }}
                   </div>
                </div>
             </div>
          </div>
       </div>
    </section>
    <!-- sign up area end -->
@endsection

@push('after-scripts')
    @if(config('access.captcha.login'))
        @captchaScripts
    @endif
@endpush
