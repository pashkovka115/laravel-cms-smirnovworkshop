<div class="">
  <div class="bg-white">

      <div class="table-responsive">
          <table class="table table-bordered my-table">
              <thead>
              <tr>
                  <th>Название</th>
                  <th>Значение</th>
                  <th>Удалить</th>
              </tr>
              </thead>
              <tbody>
            @if(isset($item->properties))
          @forelse($item->properties as $prop)
              <tr>
                  <td>
                      <input type="text" name="properties[{{ $loop->iteration }}][name]" class="form-control"
                             value="{{ $prop->name }}">
                  </td>
                  <td>
                      <input type="text" name="properties[{{ $loop->iteration }}][value]" class="form-control"
                             value="{{ $prop->pivot->value }}">
                  </td>
                  <td>
                      <input name="properties[delete_property][{{ $loop->iteration }}]"
                             class="form-check-input delete-property" type="checkbox" value="{{ $loop->iteration }}">
                  </td>
              </tr>
          @empty
              <tr>
                  <td>Нет свойств</td>
              </tr>
          @endforelse
            @endif

              </tbody>
          </table>
      </div>
  </div>
</div>
