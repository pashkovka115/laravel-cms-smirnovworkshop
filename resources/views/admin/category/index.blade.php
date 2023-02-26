@extends('admin.layouts.default')

@section('title') Admin - Категории товаров @endsection
@section('page_header') Категории товаров @endsection

@section('style_top') @endsection
@section('script_top') @endsection

@section('content')
    <!-- content -->
    <div class="py-6">
        <!-- row -->
        <div class="row">
            <div>
                <div class="mb-10 card">
                    <div class="tab-pane tab-example-design fade show active" id="pills-striped-rows-design"
                         role="tabpanel" aria-labelledby="pills-striped-rows-design-tab">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead >
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Название</th>
                                    <th scope="col">Алиас</th>
                                    <th scope="col">Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                <tr>
                                    <th scope="row">{{ $category->id }}</th>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>удалить/редактировать</td>
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
