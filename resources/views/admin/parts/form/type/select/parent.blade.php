<select name="{{ $column['origin_name'] }}" class="form-select form-select-sm">
    <option value="">Без родителя</option>
    @foreach($items as $obj)
        <option value="{{ $obj->id }}" @selected($obj->id == $item->parent_id)>{{ $obj->name }}</option>
    @endforeach
</select>
