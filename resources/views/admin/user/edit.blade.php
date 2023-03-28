@extends('admin.layouts.default')

@section('title')
	Редактируем пользователя {{ $item->email }}
@endsection
@section('page_header')
	Редактируем пользователя {{ $item->email }}
@endsection

@section('style_top') @endsection
@section('script_top') @endsection

@section('content')
	<!-- content -->
	<div class="line">
		<!-- Modal -->
{{--		@include('admin.parts.modal_settings_columns', ['route' => 'admin.product_category.columns.update'])--}}
		<!-- End Modal -->
{{--		@include('admin.parts.modal_add_property', ['field' => 'category_id', 'id' => $item->id, 'route' => 'admin.product_category.property.store'])--}}
	</div>
	<div class="py-2">
		<form action="{{ route('admin.user.update', ['id' => $item->id]) }}" method="post"
					enctype="multipart/form-data">
			@csrf
            <div class="col-xl-6 col-lg-12 col-md-12 col-12 mb-1">
                <div class="card">
                    <div class="card-body">
                        <div class="">
                            <input type="text" name="name" class="form-control" value="{{ $item->name }}"><br>
                            <input type="email" name="email" class="form-control" value="{{ $item->email }}"><br>
                            <input type="file" name="avatar" class="form-control"><br>
                            <p>Изменить пароль</p>
                            <input type="password" name="password_old" class="form-control" placeholder="Старый пароль"><br>
                            <input type="password" name="password" class="form-control" placeholder="Новый пароль"><br>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Повторите новый пароль"><br>
                        </div>
                    </div>
                </div>
            </div>
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

@endsection
