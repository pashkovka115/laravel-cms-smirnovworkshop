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
