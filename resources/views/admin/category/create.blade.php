@extends('admin.layouts.default')

@section('title')
    Admin - Категории товаров
@endsection
@section('page_header')
    Категории товаров
@endsection

@section('style_top') @endsection
@section('script_top') @endsection

@section('content')
    <!-- content -->
    <div class="line">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                data-bs-target="#exampleModalCenter">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 class="feather feather-settings">
                <circle cx="12" cy="12" r="3"></circle>
                <path
                    d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
            </svg>
        </button>
    </div>
    <!-- Modal -->
    @include('admin.parts.modal_settings_columns')
    <!-- End Modal -->

    <div class="py-2">
        <form action="{{ route('admin.product.category.store') }}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="row">
            @foreach($columns as $column)
                @if($column['is_show_single'] and
                    $column['type'] != 'actions_column' and
                    $column['type'] != 'date'
                    )
            <div class="col-xl-6 col-lg-12 col-md-12 col-12 mb-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ $column['show_name'] }}</h4>
                        <div class="mb-3">
                        @if($column['type'] == 'string')
                            <input type="text" name="{{ $column['origin_name'] }}" class="form-control">
                        @elseif($column['type'] == 'name_lavel')
                            <select name="{{ $column['origin_name'] }}" class="form-select" aria-label="Default select example">
                                <option value="h1">h1</option>
                                <option value="h2">h2</option>
                                <option value="h3">h3</option>
                                <option value="h4">h4</option>
                                <option value="h5">h5</option>
                                <option value="h6">h6</option>
                            </select>
                        @elseif($column['type'] == 'text')
                            <textarea name="{{ $column['origin_name'] }}" class="form-control" rows="1"></textarea>
                        @elseif($column['type'] == 'img')
                                <input type="file" name="{{ $column['origin_name'] }}" class="form-control">
                        {{--@elseif($column['type'] == 'date')
                            <input type="text" name="{{ $column['origin_name'] }}" value="{{ \Carbon\Carbon::now() }}" class="form-control">--}}
                        @endif
                    </div>
                    </div>
                </div>
            </div>
                @endif
            @endforeach
                <div class="">
                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <button type="submit" class="btn btn-danger" name="save_and_back">Сохранить и вернуться в список</button>
                        <button type="submit" class="btn btn-warning" name="save_and_new">Сохранить и добавить новый</button>
                        <button type="submit" class="btn btn-success" name="save_and_edit">Сохранить и продолжить редактирование</button>
                    </div>
                </div>
            </div>
    </form>
    </div>
@endsection

@section('script_buttom')
@endsection
