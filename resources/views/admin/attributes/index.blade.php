@extends('admin.layouts.default')

@section('title')
	Admin - Атрибуты
@endsection
@section('page_header')
	Атрибуты
@endsection

@section('style_top') @endsection
@section('script_top') @endsection

@section('content')
	<!-- content -->
	<div class="line">
		<!-- Modal -->
		{{--@include('admin.parts.modal_settings_columns', ['route' => 'admin.category_product.columns.update'])--}}
		<!-- End Modal -->
		{{--<a href="{{ route('admin.category_product.create') }}" class="btn btn-outline-success mb-2"><i
					class="bi bi-plus-circle"></i></a>--}}
	</div>
{{--	@include('admin.parts.index_template', ['link_view' => true, 'route_name' => 'category_product'])--}}

    <p>{{ $product->name }}</p>
    <?php //dd($product); ?>
    <ol>
    @foreach($product->properties as $prop)
        <li>
            <b>{{ $prop->title }}</b>
            ---
            <b>{{ $prop->pivot->value }}</b>
        </li>
    @endforeach
    </ol>

    <ol>
        @foreach($options as $option => $values)
            <li>{{ $option }}
            <ol>
                @foreach($values as $value)
                    <li>{{ $value->title }}</li>
                @endforeach
            </ol>
            </li>
        @endforeach
    </ol>

    {{--<ul>
        @foreach($product->attributeGroups as $group)
            <li>{{ $group->name }}</li>
        @if($group->attributes->count())
                <li>
                    <ul>
                        @foreach($group->attributes as $attr)
                            <li>{{ $attr->name }}</li>
                            @if($attr->values->count())
                                <li>
                                    <ul>
                                        @foreach($attr->values as $value)
                                            <li>{{ $value->name }}</li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </li>
        @endif
        @endforeach
    </ul>--}}

@endsection

@section('script_buttom')
@endsection
