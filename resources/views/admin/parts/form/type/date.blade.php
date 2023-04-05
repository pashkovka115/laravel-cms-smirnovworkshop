@if(isset($item))
	<p>{{ $item->{$column['origin_name']} }}</p>
@else
	<p><?= date('Y-m-d H:i:s') ?></p>
@endif
	{{-- Для коректного сохранения сортировки нужен параметр в $_POST --}}
	<input type="hidden" name="{{ $column['origin_name'] }}">