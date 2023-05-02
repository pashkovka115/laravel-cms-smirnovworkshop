<textarea id="{{ $column['origin_name'] }}" name="{{ $column['origin_name'] }}"
          class="form-control form-control-sm"
          rows="3"
          id="{{ $column['origin_name'] }}"
>@isset($item){{ $item->{$column['origin_name']} }}@endisset</textarea>
