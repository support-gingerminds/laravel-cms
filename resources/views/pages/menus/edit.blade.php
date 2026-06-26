@extends('gingerminds-core::layouts.crud.form')

@section('title')
    @lang('gingerminds-core::translation.title_m_edit', ['model' => __('gingerminds-cms::translation.menus.name_s')])
@endsection

@section('breadcrumb')
    <x-gingerminds-core::navigation.breadcrumb
        :title="__('gingerminds-core::translation.title_m_edit', ['model' => __('gingerminds-cms::translation.menus.name_s')])"
        :items="[
            ['label' => __('gingerminds-cms::translation.menus.name_p'), 'url' => route('gingerminds-cms.menus.index')],
            ['label' => __('gingerminds-core::translation.title_m_edit', ['model' => __('gingerminds-cms::translation.menus.name_s')]), 'active' => true],
        ]"
    />
@endsection

@php
    $action = route('gingerminds-cms.menus.update', $menu);
    $indexRoute = route('gingerminds-cms.menus.index');
    $method = 'PATCH';
    $id = 'edit-menus-form';
    $title = __('gingerminds-core::translation.title_m_edit', ['model' => __('gingerminds-cms::translation.menus.name_s')]);
@endphp

@section('fields')
    @include('gingerminds-cms::pages.menus.partials.fields')
@endsection
