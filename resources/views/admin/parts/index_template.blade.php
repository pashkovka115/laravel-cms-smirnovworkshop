<div class="py-2">
	<!-- row -->
	<div class="row my-row">
		<div class="bg-white">
			<div class="tab-pane tab-example-design fade show active" id="pills-striped-rows-design"
					 role="tabpanel" aria-labelledby="pills-striped-rows-design-tab">
				<div class="table-responsive">
					<table class="table table-bordered my-table">
						<thead>
						<tr>
							@foreach($columns as $column)
								@if($column['is_show_anons'] and isset($items[0]) and isset($items[0]->{$column['origin_name']}))
									<th>{{ $column['show_name'] }}</th>
								@endif
							@endforeach
{{--                            <td>*</td>--}}
						</tr>
						</thead>
						<tbody>
						@foreach($items as $item)
							<tr>
								@foreach($columns as $column)
									@if($column['is_show_anons'])
										<td>
											@if($column['origin_name'] == 'actions_column')
												@if($link_view)
													<a class="btn btn-warning mt-1" target="_blank"><i
																class="bi bi-eye"></i></a>
												@endif
												<a href="{{ route('admin.'.$route_name.'.edit', ['id' => $item->id]) }}"
													 class="btn btn-info mt-1"><i class="bi bi-pencil-square"></i></a>
												<a href="{{ route('admin.'.$route_name.'.destroy', ['id' => $item->id]) }}"
													 class="btn btn-danger mt-1"
													 onclick="return window.confirm('Удалить товар и все вложенные элементы?')"><i
															class="bi bi-trash"></i></a>
                                            @elseif($column['is_show_anons'] and isset($item->{$column['origin_name']}))
												{{ $item->{$column['origin_name']} }}
											@endif
										</td>
									@endif
								@endforeach
							</tr>
						@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
