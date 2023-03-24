@extends('admin.layouts.default')

@section('title')
	Редактируем пункты меню
@endsection
@section('page_header')
	Редактируем пункты меню "{{ $menu->name }}"
@endsection

@section('style_top')
	<style>
      .menu-item-bar {
          background: #eee;
          padding: 5px 10px;
          border: 1px solid #d7d7d7;
          margin-bottom: 5px;
          width: 100%;
          cursor: move;
          display: block;
      }

      .dragged {
          position: absolute;
          z-index: 1;
      }

      body.dragging, body.dragging * {
          cursor: move !important;
      }
	</style>
@endsection

@section('content')
	<div class="line"></div>
	<div class="py-2">

		<div class="row">
			<div class="col-12 mb-1">
				<div class="card">
					<div class="card-body category-product-property">
{{--	data-id="0" data-parent_id="0" - нужно для коректной работы сортировки НЕ УДАЛЯТЬ!!!					--}}
						<ol id="menuitems" class="menu ui-sortable" data-id="0" data-parent_id="0">
							@include('admin.menu_item.-recursiya')
						</ol>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-12 mb-1">
				<div class="card">
					<div class="card-body category-product-property">
						<pre id="serialize_output2"></pre>
					</div>
				</div>
			</div>
		</div>


	</div>

@endsection


@section('script_buttom')
	<script src="{{ url('assets/admin/js/jquery-sortable.js')}}"></script>
	<script>
      function sleep(ms) {
          return new Promise(resolve => setTimeout(resolve, ms));
      }

      $(function () {

          /*$('#menuitems').sortable({
							group: 'serialization',
							onDrop: function ($item, container, _super) {
									var data = group.sortable("serialize").get();
									var jsonString = JSON.stringify(data, null, ' ');
									$('#serialize_output').text(jsonString);
									_super($item, container);
							}
					});*/

          // $('body').addClass('dragging');

          // $("ol.example").sortable();

					let global_selector = '#menuitems';

          var group = $(global_selector).sortable({
              group: 'serialization',
              delay: 500,
              onDrop: function ($item, container, _super) {

                  let parent_container;

                  setTimeout(function (){
                      parent_container = $item.parent().parent();
                      if (parent_container.prop('tagName') !== 'LI'){
                          parent_container = $item.parent();
											}
                      // $item.data('parent_id', parent_container.data('id'));
                      $item.attr('data-parent_id', parent_container.attr('data-id'));
                      // console.log($item.attr('data-parent_id'), $item.data())
									}, 300);
                  sleep(500);



                  var data = group.sortable("serialize").get();
                  // var data = $("#menuitems").sortable("serialize").get();

									// My
                  // console.log(global_container.children())

                  let global_container = document.querySelector(global_selector);

                  function toJSON(node) {
                      if (node.tagName === 'ul' || node.tagName === 'ol' || node.tagName === 'li') {
                          let propFix = {for: 'htmlFor', class: 'className'};
                          let specialGetters = {
                              style: (node) => node.style.cssText,
                          };
                          let attrDefaultValues = {style: ''};
                          let obj = {
                              nodeType: node.nodeType,
                          };
                          if (node.tagName) {
                              obj.tagName = node.tagName.toLowerCase();
                          } else if (node.nodeName) {
                              obj.nodeName = node.nodeName;
                          }
                          if (node.nodeValue) {
                              obj.nodeValue = node.nodeValue;
                          }
                          let attrs = node.attributes;
                          if (attrs) {
                              let defaultValues = new Map();
                              for (let i = 0; i < attrs.length; i++) {
                                  let name = attrs[i].nodeName;
                                  defaultValues.set(name, attrDefaultValues[name]);
                              }
                              // Add some special cases that might not be included by enumerating
                              // attributes above. Note: this list is probably not exhaustive.
                              /*switch (obj.tagName) {
																	case 'input': {
																			if (node.type === 'checkbox' || node.type === 'radio') {
																					defaultValues.set('checked', false);
																			} else if (node.type !== 'file') {
																					// Don't store the value for a file input.
																					defaultValues.set('value', '');
																			}
																			break;
																	}
																	case 'option': {
																			defaultValues.set('selected', false);
																			break;
																	}
																	case 'textarea': {
																			defaultValues.set('value', '');
																			break;
																	}
															}*/
                              let arr = [];
                              for (let [name, defaultValue] of defaultValues) {
                                  let propName = propFix[name] || name;
                                  let specialGetter = specialGetters[propName];
                                  let value = specialGetter ? specialGetter(node) : node[propName];
                                  if (value !== defaultValue) {
                                      arr.push([name, value]);
                                  }
                              }
                              if (arr.length) {
                                  obj.attributes = arr;
                              }
                          }
                          let childNodes = node.childNodes;
                          // Don't process children for a textarea since we used `value` above.
                          if (obj.tagName !== 'textarea' && childNodes && childNodes.length) {
                              let arr = (obj.childNodes = []);
                              for (let i = 0; i < childNodes.length; i++) {
                                  arr[i] = toJSON(childNodes[i]);
                              }
                          }
                      return obj;
                  }
                  }

                  console.log(toJSON(global_container));
									// End My



                  var jsonString = JSON.stringify(data, null, ' ');

                  $('#serialize_output2').text(jsonString);
                  _super($item, container);
              }
          });
      });
	</script>
@endsection
