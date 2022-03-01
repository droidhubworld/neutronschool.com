@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.category.management') . ' | ' . trans('labels.backend.access.category.create'))

@section('page-header')

@endsection

@section('content')
{{ Form::open(['route' => 'admin.auth.category.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-category']) }}

    <div class="card">
        @include('backend.category.form')
        @include('backend.components.footer-buttons', [ 'cancelRoute' => 'admin.auth.category.index'])
    </div><!--card-->
    {{ Form::close() }}
@endsection
