<div id="sortable" class="row bg-white pt-3">
    @php
        if (!isset($excluded_fields)){
            $excluded_fields = [];
        }
    @endphp
    @foreach($columns as $column)
        @if($column['is_show_single']  and !in_array($column['origin_name'], $excluded_fields) and array_key_exists($column['origin_name'], $item->toArray()))
{{--    todo:  изменить условие, избавиться от "langs"       --}}
            @if($column['origin_name'] != 'langs')
                <div class="form-group row mb-4">
                    <label for="{{ $column['origin_name'] }}"
                           class="col-sm-2 col-form-label">{{ $column['show_name'] }}</label>
                    <div class="col-sm-10">
                        @includeIf('admin.parts.form.type.' . $column['type'])
                    </div>
                </div>
            @else
                <div class="form-group mb-4">
                    <label for="{{ $column['origin_name'] }}"
                           class="col-sm-2 col-form-label">{{ $column['show_name'] }}</label>
                    <div class="col-sm-12">
                        @includeIf('admin.parts.form.type.' . $column['type'])
                    </div>
                </div>
            @endif
        @endif
    @endforeach
</div>
