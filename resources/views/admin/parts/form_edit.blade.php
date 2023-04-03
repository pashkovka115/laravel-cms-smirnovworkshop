<div id="sortable" class="row">
    @foreach($columns as $column)
        @if($column['is_show_single'] and isset($item->{$column['origin_name']}) and $column['type'] != 'actions_column')
            <div class="col-lg-12 col-md-12 col-12 mb-1">
                <div class="card">
                    <div class="card-body my-card-body">
                        <h5 class="card-title">{{ $column['show_name'] }}</h5>
                        <div class="">
                            @if($column['type'] == 'string')
                                <input type="text" name="{{ $column['origin_name'] }}"
                                       value="{{ $item->{$column['origin_name']} }}" class="form-control form-control-sm">

                            @elseif($column['type'] == 'email')
                                <input type="email" name="{{ $column['origin_name'] }}"
                                       value="{{ $item->{$column['origin_name']} }}" class="form-control form-control-sm">

                            @elseif($column['type'] == 'name_lavel')
                                <select name="{{ $column['origin_name'] }}" class="form-select form-select-sm"
                                        aria-label="Default select example">
                                    @for($i = 1; $i <= 6; $i++)
                                        <option value="h{{ $i }}"
                                                @if($item->{$column['origin_name']} == "h$i") selected @endif>
                                            h{{ $i }}</option>
                                    @endfor
                                </select>

                            @elseif($column['type'] == 'text')
                                <textarea id="{{ $column['origin_name'] }}" name="{{ $column['origin_name'] }}"
                                          class="form-control form-control-sm"
                                          rows="3">{{ $item->{$column['origin_name']} }}</textarea>

                            @elseif($column['type'] == 'date')
                                <p>{{ $item->{$column['origin_name']} }}</p>
                                {{--Для коректного сохранения сортировки--}}
                                <input type="hidden" name="{{ $column['origin_name'] }}">

                            @elseif($column['type'] == 'img')
                                <input type="file" name="{{ $column['origin_name'] }}" class="form-control form-control-sm">
                                {{--Для коректного сохранения сортировки--}}
                                <input type="hidden" name="{{ $column['origin_name'] }}">
                                @if($item->{$column['origin_name']})
                                    <img src="/storage/{{ $item->{$column['origin_name']} }}" alt=""
                                         style="width: auto; margin-top: 10px" height="150px">
                                    <div class="form-check" style="margin-top: 10px">
                                        <input name="delete_{{ $column['origin_name'] }}" class="form-check-input"
                                               type="checkbox"
                                               value="" id="flexCheckChecked{{ $loop->iteration }}">
                                        <label class="form-check-label" for="flexCheckChecked{{ $loop->iteration }}">
                                            Удалить изображение
                                        </label>
                                    </div>
                                @endif

                            @elseif($column['type'] == 'img_gallery')
                                <input type="file" name="{{ $column['origin_name'] }}[]" class="form-control form-control-sm" multiple>
                                {{--Для коректного сохранения сортировки--}}
                                <input type="hidden" name="{{ $column['origin_name'] }}">
                                @isset($gallery)
                                    <div class="row">
                                        @foreach($gallery as $img)
                                            <div class="col-2 mt-2">
                                                <img src="/storage/{{ $img->src }}" alt=""
                                                     style="width: auto; height: 110px">
                                                <div class="form-check" style="margin-top: 10px">
                                                    <input name="delete_gallery[]" class="form-check-input"
                                                           type="checkbox"
                                                           value="{{ $img->src }}"
                                                           id="flexCheckChecked{{ $loop->iteration }}">
                                                    <label class="form-check-label"
                                                           for="flexCheckChecked{{ $loop->iteration }}">
                                                        Удалить изображение
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endisset
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
</div>

@section('script_buttom')
    <script src="{{ asset('assets/admin/js/sortable-content-block.js') }}"></script>
@endsection
