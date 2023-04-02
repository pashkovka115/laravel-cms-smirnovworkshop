@extends('admin.layouts.default')

@section('title')
	Admin - Категории товаров
@endsection
@section('page_header')
	Категории товаров
@endsection

@section('style_top') @endsection
@section('script_top') @endsection

@section('content')
	<!-- content -->
	<div class="line">
		<!-- Modal -->
		@include('admin.parts.modal_settings_columns', ['route' => 'admin.product_category.columns.update'])
		<!-- End Modal -->
		<a href="{{ route('admin.product_category.create') }}" class="btn btn-outline-success mb-2"><i
					class="bi bi-plus-circle"></i></a>
	</div>
	@include('admin.parts.index_template', ['link_view' => true, 'route_name' => 'product_category'])
@endsection

@section('script_buttom')
@endsection
