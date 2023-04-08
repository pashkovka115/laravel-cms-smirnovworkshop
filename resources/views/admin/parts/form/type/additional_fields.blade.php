<div class="">
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
        <?php
          if (isset($item)){
            $additional_fields = $item->additionalFields()->get();
          }
        ?>
        @if(isset($additional_fields) and $additional_fields)
          @foreach($additional_fields as $field)
            <tr>
              <td>
                <input type="text" name="properties[name][{{ $loop->iteration }}]" class="form-control"
                       value="{{ $field->name }}">
              </td>
              <td>
                <input type="text" name="properties[type][{{ $loop->iteration }}]" class="form-control"
                       value="{{ $field->type }}">
              </td>
              <td>
                <input type="text" name="properties[key][{{ $loop->iteration }}]" class="form-control"
                       value="{{ $field->key }}" required>
              </td>
              <td>
          <textarea name="properties[value][{{ $loop->iteration }}]" class="form-control"
                    title="Произвольно"
                    rows="1">{{ $field->value }}</textarea>
              </td>
              <td>
                <input name="properties[delete_property][{{ $loop->iteration }}]"
                       class="form-check-input delete-property" type="checkbox" value="{{ $loop->iteration }}">
              </td>
            </tr>
          @endforeach
        @endif
        </tbody>
      </table>
    </div>
  </div>
</div>
