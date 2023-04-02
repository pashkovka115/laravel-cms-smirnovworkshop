<div class="row my-row">
  <div class="bg-white">

    <div class="table-responsive">
      <table class="table table-bordered my-table">
        <thead>
        <tr>
          <th>Имя</th>
          <th>Тип</th>
          <th>Ключ<span class="red">*</span></th>
          <th>Значение</th>
          <th>Удалить</th>
        </tr>
        </thead>
        <tbody>

    @foreach($item->properties as $prop)
      <tr>
        <td>
          <input type="text" name="properties[name][{{ $loop->iteration }}]" class="form-control"
                   value="{{ $prop->name }}">
        </td>
        <td>
          <input type="text" name="properties[type][{{ $loop->iteration }}]" class="form-control"
          value="{{ $prop->type }}">
        </td>
        <td>
          <input type="text" name="properties[key][{{ $loop->iteration }}]" class="form-control"
                 value="{{ $prop->key }}" required>
        </td>
        <td>
          <textarea name="properties[value][{{ $loop->iteration }}]" class="form-control"
                    title="Произвольно"
                    rows="1">{{ $prop->value }}</textarea>
        </td>
        <td>
          <input name="properties[delete_property][{{ $loop->iteration }}]"
                 class="form-check-input delete-property" type="checkbox" value="{{ $loop->iteration }}">
        </td>
      </tr>
    @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
                    {{--<div class="col-md-3">
                    <label class="form-label" title="Произвольно" for="prop{{ $prop->id }}">Имя</label>
                    <input type="text" name="properties[name][{{ $loop->iteration }}]" class="form-control"
                               value="{{ $prop->name }}" id="prop{{ $prop->id }}">
                    </div>
                    <br>
                    <label class="form-label" title="Произвольно">Тип
                        <input type="text" name="properties[type][{{ $loop->iteration }}]" class="form-control"
                               value="{{ $prop->type }}">
                    </label>
                    <br>
                    <label class="form-label" title="Произвольно">Ключ<span class="red">*</span>
                        <input type="text" name="properties[key][{{ $loop->iteration }}]" class="form-control"
                               value="{{ $prop->key }}" required>
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
                    </div>--}}
                {{--</div>
            </div>
        </div>--}}
{{--    @endforeach--}}
{{--</div>--}}
