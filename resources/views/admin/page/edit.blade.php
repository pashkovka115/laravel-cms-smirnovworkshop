@extends('admin.layouts.default')

@section('title')
	Редактируем "{{ $item->name }}"
@endsection
@section('page_header')
	Редактируем "{{ $item->name }}"
@endsection

@section('style_top') @endsection
@section('script_top') @endsection

@section('content')
	<!-- content -->
	<div class="line">

		@include('admin.parts.modal_settings_columns', ["route" => "admin.page.columns.update"])
		@include('admin.parts.modal_add_additional_fields', ['field' => 'page_id', 'id' => $item->id, 'route' => 'admin.page.additional_fields.store'])
	</div>
	@php //dd($item) @endphp
	<div class="py-2">
		<form action="{{ route('admin.page.update', ['id' => $item->id]) }}" method="post"
					enctype="multipart/form-data">
			@csrf
			@include('admin.parts.template_form_with_tabs')
		</form>
	</div>
@endsection

@section('script_buttom')

@endsection
