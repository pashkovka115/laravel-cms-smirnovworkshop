@extends('admin.layouts.default')

@section('title')
	Новая категория
@endsection
@section('page_header')
	Новая категория
@endsection

@section('style_top') @endsection
@section('script_top') @endsection

@section('content')
	<!-- content -->
	<div class="line">
		<!-- Modal -->
		{{--        @include('admin.parts.modal_settings_columns')--}}
		<!-- End Modal -->
	</div>

	<div class="py-2">
		<form action="{{ route('admin.product.category.store') }}" method="post" enctype="multipart/form-data">
			@csrf
			<div class="row">
				@foreach($columns as $column)
					@if($column['is_show_single'] and
							$column['type'] != 'actions_column' and
							$column['type'] != 'date'
							)
						<div class="col-xl-6 col-lg-12 col-md-12 col-12 mb-1">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">{{ $column['show_name'] }}</h4>
									<div class="">
										@if($column['type'] == 'string')
											<input type="text" name="{{ $column['origin_name'] }}" class="form-control">
										@elseif($column['type'] == 'name_lavel')
											<select name="{{ $column['origin_name'] }}" class="form-select"
															aria-label="Default select example">
												<option value="h1">h1</option>
												<option value="h2">h2</option>
												<option value="h3">h3</option>
												<option value="h4">h4</option>
												<option value="h5">h5</option>
												<option value="h6">h6</option>
											</select>
										@elseif($column['type'] == 'text')
											<textarea name="{{ $column['origin_name'] }}" class="form-control" rows="1"></textarea>
										@elseif($column['type'] == 'img')
											<input type="file" name="{{ $column['origin_name'] }}" class="form-control">
										@endif
									</div>
								</div>
							</div>
						</div>
					@endif
				@endforeach
				<div class="">
					<div class="btn-group save-group" role="group" aria-label="Basic mixed styles example">
						<button type="submit" class="btn btn-danger" name="save_and_back">Сохранить и вернуться в список</button>
						<button type="submit" class="btn btn-warning" name="save_and_new">Сохранить и добавить новый</button>
						<button type="submit" class="btn btn-success" name="save_and_edit">Сохранить и продолжить редактирование
						</button>
					</div>
				</div>
			</div>
		</form>
	</div>
@endsection

@section('script_buttom')
@endsection
