@extends('admin.layouts.default')

@section('title')
	Редактируем товар
@endsection
@section('page_header')
	Редактируем товар
@endsection

@section('style_top') @endsection
@section('script_top') @endsection

@section('content')
	<!-- content -->
	<div class="line">
		@include('admin.parts.modal_settings_columns', ["route" => "admin.product.columns.update"])
		@include('admin.parts.modal_add_additional_fields', ['field' => 'product_id', 'id' => $item->id, 'route' => 'admin.product.additional_fields.store'])
	</div>

	<div class="py-2">
		<form action="{{ route('admin.product.update', ['id' => $item->id]) }}" method="post"
					enctype="multipart/form-data">
			@csrf
			@include('admin.parts.template_form_with_tabs')
		</form>
	</div>
@endsection

@section('script_buttom')
@endsection
