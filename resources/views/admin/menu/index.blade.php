@extends('admin.layouts.default')
@section('style_top')
    <style>
        body.dragging, body.dragging * {
            cursor: move !important;
        }

        .dragged {
            position: absolute;
            opacity: 0.5;
            z-index: 2000;
        }

        ol.example li.placeholder {
            position: relative;
            /** More li styles **/
        }
        ol.example li.placeholder:before {
            position: absolute;
            /** Define arrowhead **/
        }
    </style>
@endsection

@section('content')
    <ol>
        @foreach ($menus as $menu)
            <li><b>{{ $menu->name }}</b>
                @include('admin.menu.-recursiya', ['items' => $menu->items])
            </li>
            @break
        @endforeach
    </ol>
@endsection


@section('script_buttom')
    <script src="{{ url('assets/admin/js/jquery-sortable-min.js')}}"></script>
    <script>
        $(function  () {
            $('body').addClass('dragging');

            $("ol.sortable").sortable();
        });
    </script>
@endsection
