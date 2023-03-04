<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#addPropertyModalCenter">
    Добавить свойство
</button>
<!-- Modal -->
<div class="modal fade" id="addPropertyModalCenter" tabindex="-1" role="dialog" aria-labelledby="addPropertyModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPropertyModalCenterTitle">Новое свойство</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <form action="{{ route($route) }}" method="post">
                @csrf
                <input type="hidden" name="{{ $field }}" value="{{ $id }}">
            <div class="modal-body">
                <div class="card-body category-product-property">
                    <label class="form-label" title="Произвольно">Имя
                        <input type="text" name="name" class="form-control" value="">
                    </label>
                    <br>
                    <label class="form-label" title="Произвольно">Тип
                        <input type="text" name="type" class="form-control" value="">
                    </label>
                    <br>
                    <label class="form-label" title="Произвольно">Ключ<span class="red">*</span>
                        <input type="text" name="key" class="form-control" value="">
                    </label><br>
                    <label class="form-label">Значение
                        <textarea name="value" class="form-control" title="Произвольно" rows="1"></textarea>
                    </label>
                    <br>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
            </form>
        </div>
    </div>
</div>