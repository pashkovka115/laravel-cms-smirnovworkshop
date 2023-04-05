<div id="sortable" class="row">
	@foreach($columns as $column)
		@if($column['is_show_single']  and in_array($column['origin_name'], $existing_fields))
			<div class="col-lg-12 col-md-12 col-12 mb-1">
				<div class="card">
					<div class="card-body my-card-body">
						<h5 class="card-title">{{ $column['show_name'] }}</h5>
						<div class="">
							@includeIf('admin.parts.form.type.' . $column['type'])
						</div>
					</div>
				</div>
			</div>
		@endif
	@endforeach
</div>

@section('script_buttom')
	<script src="{{ asset('assets/admin/js/sortable-content-block.js') }}"></script>
@endsection
