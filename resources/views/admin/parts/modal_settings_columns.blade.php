<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Настройки колонок</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <ul class="list-group list-group-horizontal">
                                    <li class="list-group-item color-swatch-header bg-light-primary">Отображаемое имя поля</li>
                                    <li class="list-group-item color-swatch-header bg-light-secondary">Сортировка в списке</li>
                                    <li class="list-group-item color-swatch-header bg-light-info">Сортировка на детальной</li>
                                    <li class="list-group-item color-swatch-header bg-light-danger">Показывать в ленте</li>
                                    <li class="list-group-item color-swatch-header bg-light-dark">Показывать на детальной</li>
                                </ul>
                            </li>
                            <form action="{{ route('admin.product.category.columns.update') }}" method="post">
                                @csrf
                                @foreach($columns as $column)
                                <li class="list-group-item">
                                    <ul class="list-group list-group-horizontal">
                                        <li class="list-group-item color-swatch-header bg-light-primary">
                                            <input type="text" name="{{ $column['id'] }}[show_name]"
                                                   value="{{ $column['show_name'] }}">
                                        </li>
                                        <li class="list-group-item color-swatch-header bg-light-secondary">
                                            <input type="text" name="{{ $column['id'] }}[sort_list]"
                                                   value="{{ $column['sort_list'] }}">
                                        </li>
                                        <li class="list-group-item color-swatch-header bg-light-info">
                                            <input type="text" name="{{ $column['id'] }}[sort_single]"
                                                   value="{{ $column['sort_single'] }}">
                                        </li>
                                        <li class="list-group-item color-swatch-header bg-light-danger">
                                            <input type="checkbox" name="{{ $column['id'] }}[is_show_anons]"
                                                   @if($column['is_show_anons'] == '1') checked @endif>
                                        </li>
                                        <li class="list-group-item color-swatch-header bg-light-dark">
                                            <input type="checkbox" name="{{ $column['id'] }}[is_show_single]"
                                                   @if($column['is_show_single'] == '1') checked @endif
                                                   @if($column['type'] == 'actions_column' or $column['type'] == 'id') disabled @endif>
                                        </li>
                                    </ul>
                                </li>
                                @endforeach
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                        Закрыть
                                    </button>
                                    <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                                </div>
                            </form>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
