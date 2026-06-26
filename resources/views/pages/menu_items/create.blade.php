@extends('gingerminds-core::layouts.crud.form-tabs')

@section('title')
    @lang('gingerminds-core::translation.title_m_create', ['model' => __('gingerminds-cms::translation.menu_items.name_s')])
@endsection

@section('breadcrumb')
    <x-gingerminds-core::navigation.breadcrumb
        :title="__('gingerminds-core::translation.title_m_create', ['model' => __('gingerminds-cms::translation.menu_items.name_s')])"
        :items="[
            ['label' => __('gingerminds-cms::translation.menus.manage'), 'url' => route('gingerminds-cms.menus.index')],
            ['label' => $menu->code],
            ['label' => __('gingerminds-cms::translation.menu_items.name_p'), 'url' => route('gingerminds-cms.menu_items.index', ['menu' => $menu->id])],
            ['label' => __('gingerminds-core::translation.title_m_create', ['model' => __('gingerminds-cms::translation.menu_items.name_s')]), 'active' => true],
        ]"
    />
@endsection

@php
    $action = route('gingerminds-cms.menu_items.store', ['menu' => $menu->id]);
    $indexRoute = route('gingerminds-cms.menu_items.index', ['menu' => $menu->id]);
    $method = 'POST';
    $id = 'create-menu_items-form';
    $title = __('gingerminds-core::translation.title_m_create', ['model' => __('gingerminds-cms::translation.menu_items.name_s')]);
@endphp

@section('tabs')
    @include('gingerminds-cms::pages.menu_items.partials.form_nav')
@endsection

@section('tab-content')
    <div class="tab-pane fade show active" id="general">
        <div class="row">
            @include('gingerminds-cms::pages.menu_items.partials.fields')
        </div>
    </div>
    <div class="tab-pane fade" id="translations">
        @include('gingerminds-cms::pages.menu_items.partials.fields_translations')
    </div>
@endsection
