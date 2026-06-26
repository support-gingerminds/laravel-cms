@extends('gingerminds-core::layouts.crud.list-tree')

@php
    $filters = request()->get('filters', []);
    $indexRoute = 'gingerminds-cms.menu_items.index';
@endphp

@section('title')
    @lang('gingerminds-cms::translation.menu_items.manage')
@endsection

@section('breadcrumb')
    <x-gingerminds-core::navigation.breadcrumb
        :title="__('gingerminds-core::translation.title_list', ['model' => __('gingerminds-cms::translation.menu_items.name_p')])"
        :items="[
            ['label' => __('gingerminds-cms::translation.menus.manage'), 'url' => route('gingerminds-cms.menus.index')],
            ['label' => $menu->code],
            ['label' => __('gingerminds-cms::translation.menu_items.name_p'), 'url' => route('gingerminds-cms.menu_items.index', ['menu' => $menu->id])],
            ['label' => __('gingerminds-cms::translation.menu_items.manage'), 'active' => true],
        ]"
    />
@endsection

@section('actions')
    <a href="{{ route('gingerminds-cms.menu_items.create', ['menu' => $menu->id]) }}"
       class="btn btn-sm btn-success">
        <i class="bi bi-plus-lg me-1"></i>
        @lang('gingerminds-core::translation.title_m_create', ['model' => __('gingerminds-cms::translation.menu_items.name_s')])
    </a>
@endsection

@section('tree')
    @if($rootItems->isEmpty())
        <div class="text-center text-muted py-5">
            <i class="bi bi-diagram-3 fs-1 d-block mb-2 opacity-25"></i>
            @lang('gingerminds-cms::translation.menu_items.message.no_result')
        </div>
    @else
        @include('gingerminds-cms::pages.menu_items.partials.tree', [
            'treeItems' => $rootItems,
            'depth' => 0,
            'menu' => $menu,
        ])
    @endif
@endsection

@push('scripts')
    <script>
        window.treeReorderUrl = "{{ route('gingerminds-cms.menu_items.reorder', ['menu' => $menu->id]) }}";
    </script>
@endpush

@push('modals')
    <x-gingerminds-core::modal.modal-delete
        :model="__('gingerminds-cms::translation.menu_items.name_s')"
        routing="gingerminds-cms.menu_items"/>
@endpush
