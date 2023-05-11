<div class="form-check" style="margin-top: 10px">
    <input type="hidden" name="{{ $column['origin_name'] }}" value="0">
    <input name="{{ $column['origin_name'] }}" class="form-check-input"
           type="checkbox"
           value="1"
           id="{{ $column['origin_name'] }}"
           @checked($item->is_download)
    >
    <label class="form-check-label" for="{{ $column['origin_name'] }}">
        Цифровой(скачиваемый) товар
    </label>
</div>
