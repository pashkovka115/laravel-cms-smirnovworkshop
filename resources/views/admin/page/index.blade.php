@extends('admin.layouts.default')

@section('title')
    Страницы
@endsection
@section('page_header')
    Страницы
@endsection

@section('style_top') @endsection
@section('script_top') @endsection

@section('content')
    <!-- content -->
    <div class="line">
        <!-- Modal -->
        @include('admin.parts.modal_settings_columns', ['route' => 'admin.page.columns.update'])
        <!-- End Modal -->
        <a href="{{ route('admin.page.create') }}" class="btn btn-outline-success mb-2"><i
                class="bi bi-plus-circle"></i></a>
    </div>
    <div class="py-2">
        <!-- row -->
        <div class="row">
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
                            @foreach($items as $item)
                                <tr>
                                    @foreach($columns as $column)
                                        @if($column['is_show_anons'])
                                            <td>
                                                @if($column['origin_name'] == 'actions_column')
                                                    <a class="btn btn-warning mb-2" target="_blank"><i
                                                            class="bi bi-eye"></i></a>
                                                    <a href="{{ route('admin.page.edit', ['id' => $item->id]) }}"
                                                       class="btn btn-info mb-2"><i class="bi bi-pencil-square"></i></a>
                                                    <a href="{{ route('admin.page.destroy', ['id' => $item->id]) }}"
                                                       class="btn btn-danger mb-2"
                                                       onclick="return window.confirm('Удалить товар и все вложенные элементы?')"><i
                                                            class="bi bi-trash"></i></a>
                                                @else
                                                    {{ $item->{$column['origin_name']} }}
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
@endsection

@section('script_buttom')
@endsection
