<?php
function nesting_for_update($item, $current_item_id, $current_item_parent_id, $parent_name = '')
{
    if ($item->id == $current_item_id) {
        return;
    }
    if ($parent_name != '') {
        $name = $parent_name . ' → ' . $item->name;
    } else {
        $name = $parent_name . $item->name;
    }

    if ($item->id == $current_item_parent_id) {
        $selected = ' selected';
    } else {
        $selected = '';
    }

    echo "<option value=\"$item->id\"$selected>$name</option>";

    if ($parent_name == '') {
        $parent_name .= $item->name;
    } else {
        $parent_name .= ' → ' . $item->name;
    }

    foreach ($item->children as $child) {
        nesting_for_update($child, $current_item_id, $current_item_parent_id, $parent_name);
    }
}

function nesting_for_store($item, $parent_name = '')
{
    if ($parent_name != '') {
        $name = $parent_name . ' → ' . $item->name;
    } else {
        $name = $parent_name . $item->name;
    }

    echo "<option value=\"$item->id\">$name</option>";

    if ($parent_name == '') {
        $parent_name .= $item->name;
    } else {
        $parent_name .= ' → ' . $item->name;
    }

    foreach ($item->children as $child) {
        nesting_for_store($child, $parent_name);
    }
}

// todo: проверить вывод категорий в товарах (select)
?>
<select name="{{ $column['origin_name'] }}" class="form-select form-select-sm"
				aria-label="Default select example">
	@if(isset($parent_element) and $parent_element)
		<option value="">Без родительской</option>
	@endif

	@if(isset($item) and isset($items_with_children))
		@foreach($items_with_children as $item_with_children)
                <?php nesting_for_update($item_with_children, $item->id, $item->parent_id); ?>
		@endforeach
	@elseif(isset($items_with_children))
		@foreach($items_with_children as $item_with_children)
                <?php nesting_for_store($item_with_children); ?>
		@endforeach

	@else
		<option value="???">Нехватает переменных из контроллера в шаблон</option>
	@endif
</select>