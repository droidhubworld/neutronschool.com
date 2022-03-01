@extends('backend.layouts.app')

@section('title', __('labels.backend.access.category.management') . ' | ' . __('labels.backend.access.category.edit'))

@section('breadcrumb-links')
@include('backend.category.includes.breadcrumb-links')
@endsection


@section('content')
{{ Form::model($category, ['route' => ['admin.auth.category.update', $category], 'class' => 'form-horizontal', 'category' => 'form', 'method' => 'PATCH', 'id' => 'edit-category']) }}
    <div class="card">
        @include('backend.category.form')
        @include('backend.components.footer-buttons', [ 'cancelRoute' => 'admin.auth.category.index', 'id' => $category->id])
    </div><!--card-->
    {{ Form::close() }}

@endsection

@section('pagescript')

@endsection