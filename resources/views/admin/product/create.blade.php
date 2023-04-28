@extends('admin.layouts.default')

@section('title')
	Новый товар
@endsection
@section('page_header')
	Новый товар
@endsection

@section('style_top') @endsection
@section('script_top') @endsection

@section('content')
	<!-- content -->
	<div class="line"></div>
	<div class="py-2">
		<form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
			@csrf
			@include('admin.parts.form_edit')
				<div class="">
					<div class="btn-group save-group" role="group" aria-label="Basic mixed styles example">
						<button type="submit" class="btn btn-danger" name="save_and_back">Сохранить и вернуться в список</button>
						<button type="submit" class="btn btn-warning" name="save_and_new">Сохранить и добавить новый</button>
						<button type="submit" class="btn btn-success" name="save_and_edit">Сохранить и продолжить редактирование
						</button>
					</div>
				</div>
		</form>
	</div>
@endsection

@section('script_buttom')
    @parent
@endsection
