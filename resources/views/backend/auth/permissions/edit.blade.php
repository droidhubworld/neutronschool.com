@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.permissions.management') . ' | ' . trans('labels.backend.access.permissions.edit'))

@section('page-header')
    
@endsection

@section('content')
{{ Form::model($permission, ['route' => ['admin.auth.permission.update', $permission], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'create-permission']) }}

    <div class="card">
        @include('backend.auth.permissions.form')
        @include('backend.components.footer-buttons', [ 'cancelRoute' => 'admin.auth.permission.index', 'id' => $permission->id ])
    </div><!--card-->
    {{ Form::close() }}
@endsection