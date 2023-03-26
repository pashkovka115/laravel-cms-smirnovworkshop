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
		@include('admin.parts.modal_add_property', ['field' => 'product_id', 'id' => $item->id, 'route' => 'admin.product.property.store'])
	</div>
	<div class="py-2">
		<form action="{{ route('admin.product.update', ['id' => $item->id]) }}" method="post"
					enctype="multipart/form-data">
			@csrf
			<ul class="nav nav-line-bottom nav-example" id="pills-tabTwo" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="pills-accordions-design-tab" data-bs-toggle="pill"
						 href="#pills-accordions-design" role="tab" aria-controls="pills-accordions-design"
						 aria-selected="true">Общее</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="pills-accordions-html-tab" data-bs-toggle="pill"
						 href="#pills-accordions-html" role="tab" aria-controls="pills-accordions-html"
						 aria-selected="false">Свойства</a>
				</li>
			</ul>
			<div class="tab-content py-4" id="pills-tabTwoContent">
				<div class="tab-pane tab-example-design fade show active" id="pills-accordions-design"
						 role="tabpanel" aria-labelledby="pills-accordions-design-tab">
					<div id="sortable" class="row">
                        <input type="hidden" name="_model" value="{{ \App\Models\Product::class }}">
						@foreach($columns as $column)
							@if($column['is_show_single'] and
									$column['type'] != 'actions_column'
									)
								<div class="col-lg-12 col-md-12 col-12 mb-1">
									<div class="card">
										<div class="card-body">
											<h4 class="card-title">{{ $column['show_name'] }}</h4>
											<div class="">
												@if($column['type'] == 'string')
													<input type="text" name="{{ $column['origin_name'] }}"
																 value="{{ $item->{$column['origin_name']} }}" class="form-control">

												@elseif($column['type'] == 'name_lavel')
													<select name="{{ $column['origin_name'] }}" class="form-select"
																	aria-label="Default select example">
														@for($i = 1; $i <= 6; $i++)
															<option value="h{{ $i }}" @if($item->{$column['origin_name']} == "h$i") selected @endif>
																h{{ $i }}</option>
														@endfor
													</select>

												@elseif($column['type'] == 'text')
													<textarea name="{{ $column['origin_name'] }}" class="form-control"
																		rows="3">{{ $item->{$column['origin_name']} }}</textarea>

												@elseif($column['type'] == 'date')
													{{ $item->{$column['origin_name']} }}

												@elseif($column['type'] == 'img')
													<input type="file" name="{{ $column['origin_name'] }}" class="form-control">
													@if($item->{$column['origin_name']})
														<img src="/storage/{{ $item->{$column['origin_name']} }}" alt=""
																 style="width: auto; margin-top: 10px" height="150px">
														<div class="form-check" style="margin-top: 10px">
															<input name="delete_{{ $column['origin_name'] }}" class="form-check-input" type="checkbox"
																		 value="" id="flexCheckChecked{{ $loop->iteration }}">
															<label class="form-check-label" for="flexCheckChecked{{ $loop->iteration }}">
																Удалить изображение
															</label>
														</div>
													@endif
												@endif
											</div>
										</div>
									</div>
								</div>
							@endif
						@endforeach
					</div>
				</div>
				<div class="tab-pane tab-example-html fade" id="pills-accordions-html" role="tabpanel"
						 aria-labelledby="pills-accordions-html-tab">
					<div class="row">
						@foreach($item->properties as $prop)
							<div class="col-xl-3 col-lg-3 col-md-6 col-12 mb-1">
								<div class="card">
									<div class="card-body category-product-property">
										<label class="form-label" title="Произвольно">Имя
											<input type="text" name="properties[name][{{ $loop->iteration }}]" class="form-control"
														 value="{{ $prop->name }}">
										</label>
										<br>
										<label class="form-label" title="Произвольно">Тип
											<input type="text" name="properties[type][{{ $loop->iteration }}]" class="form-control"
														 value="{{ $prop->type }}">
										</label>
										<br>
										<label class="form-label" title="Произвольно">Ключ<span class="red">*</span>
											<input type="text" name="properties[key][{{ $loop->iteration }}]" class="form-control"
														 value="{{ $prop->key }}">
										</label><br>

										<label class="form-label">Значение
											<textarea name="properties[value][{{ $loop->iteration }}]" class="form-control"
																title="Произвольно"
																rows="1">{{ $prop->value }}</textarea>
										</label>
										<br>
										<div class="form-check">
											<input name="properties[delete_property][{{ $loop->iteration }}]"
														 class="form-check-input delete-property" type="checkbox" value="{{ $loop->iteration }}"
														 id="flexCheckChecked{{ $loop->iteration }}">
											<label class="form-check-label" for="flexCheckChecked{{ $loop->iteration }}">Удалить</label>
										</div>
									</div>
								</div>
							</div>
						@endforeach
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
<script src="{{ asset('assets/admin/js/sortable-content-block.js') }}"></script>
@endsection
