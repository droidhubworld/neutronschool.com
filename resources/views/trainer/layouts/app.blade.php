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
	{{ style(mix('css/backend1.css')) }}
    {{-- {!! script(asset('js/backend/settings.js')) !!} --}}
    <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:2120269,hjsv:6};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script><script async src="https://www.googletagmanager.com/gtag/js?id=G-Q3ZYEKLQ68"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-Q3ZYEKLQ68');
    </script>

    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css">

    @stack('after-styles')

</head>


<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky">
	<div class="wrapper">

        @include('trainer.includes.sidebar')
        <div class="main">
            @include('trainer.includes.header')
            @include('includes.partials.read-only')
            @include('includes.partials.logged-in-as')
            
            {!! Breadcrumbs::render() !!}
            @include('includes.partials.messages')
            <main class="content">
                <div class="container-fluid p-0">
                    @yield('content')
                </div>
            </main>

            @include('trainer.includes.aside')
            @include('trainer.includes.footer')
        </div>

    </div>
    <!-- Scripts -->
    @stack('before-scripts')
    {!! script(mix('js/manifest.js')) !!}
    {!! script(mix('js/vendor.js')) !!}
    {!! script(asset('js/backend/app.js')) !!}

	{!! script(mix('js/backend.js')) !!}
    <script src="{{ asset('/js/tinymce/tinymce.min.js')}}"></script>
    {!! script(asset('js/backend/common.js')) !!}

    @isset($js)
    @foreach($js as $j)
    <!-- {!! script(asset('js/backend/'. $j. '.js')) !!} -->
    {!! script(asset('js/trainer/'. $j. '.js')) !!}
    @endforeach
    @endif

    @stack('after-scripts')

    @yield('pagescript')
</body>

</html>
