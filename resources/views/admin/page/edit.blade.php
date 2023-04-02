@extends('admin.layouts.default')

@section('title')
    Редактируем "{{ $item->name }}"
@endsection
@section('page_header')
    Редактируем "{{ $item->name }}"
@endsection

@section('style_top') @endsection
@section('script_top') @endsection

@section('content')
    <!-- content -->
    <div class="line">

        @include('admin.parts.modal_settings_columns', ["route" => "admin.page.columns.update"])
        @include('admin.parts.modal_add_property', ['field' => 'page_id', 'id' => $item->id, 'route' => 'admin.page.property.store'])
    </div>
    <div class="py-2">
        <form action="{{ route('admin.page.update', ['id' => $item->id]) }}" method="post"
              enctype="multipart/form-data">
            @csrf
            <ul class="nav nav-line-bottom nav-example" id="pills-tabTwo" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-accordions-design-tab" data-bs-toggle="pill"
                       href="#pills-accordions-design" role="tab" aria-controls="pills-accordions-design"
                       aria-selected="true">Общее</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-accordions-html-tab" data-bs-toggle="pill"
                       href="#pills-accordions-html" role="tab" aria-controls="pills-accordions-html"
                       aria-selected="false">Свойства</a>
                </li>
            </ul>
            <div class="tab-content py-4" id="pills-tabTwoContent">
                <div class="tab-pane tab-example-design fade show active" id="pills-accordions-design"
                     role="tabpanel" aria-labelledby="pills-accordions-design-tab">
                    @include('admin.parts.form_edit')
                </div>
                <div class="tab-pane tab-example-html fade" id="pills-accordions-html" role="tabpanel"
                     aria-labelledby="pills-accordions-html-tab">
                    @include('admin.parts.template_properties')
                </div>
            </div>
            <div class="">
                <div class="btn-group save-group" role="group" aria-label="Basic mixed styles example">
                    <button type="submit" class="btn btn-danger" name="save_and_back">Сохранить и вернуться в список
                    </button>
                    <button type="submit" class="btn btn-warning" name="save_and_new">Сохранить и добавить новый
                    </button>
                    <button type="submit" class="btn btn-success" name="save_and_edit">Сохранить и продолжить
                        редактирование
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('script_buttom')

@endsection