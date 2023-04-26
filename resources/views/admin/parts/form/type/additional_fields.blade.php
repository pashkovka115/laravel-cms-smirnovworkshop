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
                <input type="text" name="additional_fields[name][{{ $loop->iteration }}]" class="form-control"
                       value="{{ $field->name }}">
              </td>
              <td>
                <input type="text" name="additional_fields[type][{{ $loop->iteration }}]" class="form-control"
                       value="{{ $field->type }}">
              </td>
              <td>
                <input type="text" name="additional_fields[key][{{ $loop->iteration }}]" class="form-control"
                       value="{{ $field->key }}" required>
              </td>
              <td>
          <textarea name="additional_fields[value][{{ $loop->iteration }}]" class="form-control"
                    title="Произвольно"
                    rows="1">{{ $field->value }}</textarea>
              </td>
              <td>
                <input name="additional_fields[delete_additional_field][{{ $loop->iteration }}]"
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
