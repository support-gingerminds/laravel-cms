@extends('gingerminds-core::layouts.crud.list')

@php
    $filters = request()->get('filters', []);
    $indexRoute = 'gingerminds-cms.menus.index';
@endphp

@section('title')
    @lang('gingerminds-cms::translation.menus.manage')
@endsection

@section('breadcrumb')
    <x-gingerminds-core::navigation.breadcrumb
        :title="__('gingerminds-core::translation.title_list', ['model' => __('gingerminds-cms::translation.menus.name_p')])"
        :items="[
            ['label' => __('gingerminds-cms::translation.menus.name_p'), 'url' => route('gingerminds-cms.menus.index')],
            ['label' => __('gingerminds-cms::translation.menus.manage'), 'active' => true],
        ]"
    />
@endsection

@section('actions')
    <a href="{{ route('gingerminds-cms.menus.create') }}" class="btn btn-sm btn-success">
        <i class="bi bi-plus-lg me-1"></i> @lang('gingerminds-core::translation.title_m_create', ['model' => __('gingerminds-cms::translation.menus.name_s')])
    </a>
@endsection

@php
    $columns = [
        ['name' => '#', 'sortable' => false],
        ['name' => __('gingerminds-core::translation.form.code'), 'sortable' => true, 'property' => 'code'],
        ['name' => __('gingerminds-core::translation.actions'), 'sortable' => false],
    ];
    $sortBy = request()->query('sortBy');
    $sortOrder = request()->query('sort');
@endphp

@section('table_list')
    @include('gingerminds-cms::pages.menus.partials.list')
@endsection

@push('modals')
    <x-gingerminds-core::modal.modal-delete :model="__('translation.menus.name_s')" routing="gingerminds-cms.menus"/>
@endpush
