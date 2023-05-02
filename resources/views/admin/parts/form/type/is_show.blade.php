<div class="form-check" style="margin-top: 10px">
    <input name="{{ $column['origin_name'] }}" class="form-check-input"
           type="checkbox"
           value="" id="{{ $column['origin_name'] }}"
           @checked($item->is_show)
    >
    <label class="form-check-label" for="{{ $column['origin_name'] }}">
        Показывать в публичной части сайта
    </label>
</div>
