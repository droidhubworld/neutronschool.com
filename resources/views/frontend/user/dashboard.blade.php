@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')
<div class="cartmini__area">

</div>

 <main>

    <!-- hero area start -->
    <section class="page__title-area page__title-height page__title-overlay d-flex align-items-center" data-background="assets/img/page-title/page-title.jpg">
      <div class="container">
         <div class="row">
            <div class="col-xxl-12">
               <div class="page__title-wrapper">

                  <div class="col col-sm-8 order-1 order-sm-2  mb-4 mt-110">
                     <div class="card mb-4 bg-light">
                         <img class="card-img-top" src="{{ $logged_in_user->picture }}" alt="Profile Picture">

                         <div class="card-body">
                             <h4 class="card-title">
                                 {{ $logged_in_user->name }}<br/>
                             </h4>


                                 <small>
                                     <i class="fas fa-envelope"></i> {{ $logged_in_user->email }}<br/>
                                     <i class="fas fa-calendar-check"></i> @lang('strings.frontend.general.joined') {{ timezone()->convertToLocal($logged_in_user->created_at, 'F jS, Y') }}
                                 </small>


                             <p class="card-text">

                                 <a href="{{ route('frontend.user.account')}}" class="btn btn-info btn-sm mb-1">
                                     <i class="fas fa-user-circle"></i> @lang('navs.frontend.user.account')
                                 </a>

                                 @can('view backend')
                                     &nbsp;<a href="{{ route('admin.dashboard')}}" class="btn btn-danger btn-sm mb-1">
                                         <i class="fas fa-user-secret"></i> @lang('navs.frontend.user.administration')
                                     </a>
                                 @endcan
                             </p>
                         </div>
                     </div>
                 </div><!--col-md-4-->
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- page title area end -->

    <!-- hero area end -->
 </main>
@endsection
