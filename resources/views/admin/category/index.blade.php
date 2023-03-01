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

        <a class="btn btn-outline-success mb-2"><i class="bi bi-plus-circle"></i></a>
    </div>
    <!-- Modal -->
    @include('admin.parts.modal_settings_columns')
    <!-- End Modal -->

    <div class="py-2">
        <!-- row -->
        <div class="row">
            <div>
                <div class="mb-10 card">
                    <div class="tab-pane tab-example-design fade show active" id="pills-striped-rows-design"
                         role="tabpanel" aria-labelledby="pills-striped-rows-design-tab">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    @foreach($columns as $column)
                                        @if($column['is_show_anons'])
                                            <th>{{ $column['show_name'] }}</th>
                                        @endif
                                    @endforeach
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        @foreach($columns as $column)
                                            @if($column['is_show_anons'])
                                                <td>
                                                    @if($column['origin_name'] == 'actions_column')
                                                        <a class="btn btn-warning mb-2" target="_blank"><i
                                                                class="bi bi-eye"></i></a>
                                                        <a class="btn btn-info mb-2"><i class="bi bi-pencil-square"></i></a>
                                                        <a class="btn btn-danger mb-2"
                                                           onclick="return window.confirm('Удалить?')"><i
                                                                class="bi bi-trash"></i></a>
                                                    @else
                                                        {{ $category->{$column['origin_name']} }}
                                                    @endif

                                                </td>
                                            @endif
                                        @endforeach
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script_buttom')
@endsection
