let sortableSelector = '#sortable';

Element.prototype.sortable = (function () {
    let dragEl, nextEl;

    function _unDraggable(elements) {
        if (elements && elements.length) {
            for (let i = 0; i < elements.length; i++) {
                if (!elements[i].hasAttribute('draggable')) {
                    elements[i].draggable = false;
                    _unDraggable(elements[i].children);
                }
            }
        }
    }

    function _onDragStart(e) {
        e.stopPropagation();
        e.dataTransfer.setData('id', e.target.dataset.id); // ID element
        let tempTarget = null;
        dragEl = e.target;
        nextEl = dragEl.nextSibling;
        e.dataTransfer.dropEffect = 'move';

        this.addEventListener('dragover', _onDragOver, false);
        this.addEventListener('dragend', _onDragEnd, false);

        this.addEventListener('drop', _saveOrder, false);
    }

    function _onDragOver(e) {
        e.preventDefault();
        e.stopPropagation();
        e.dataTransfer.dropEffect = 'move';

        let target;

        if (e.target !== this.tmpTarget) {
            this.tmpTarget = e.target;
            target = e.target.closest('[draggable=true]');
        }

        if (target && target !== dragEl && target.parentElement === this) {
            let rect = target.getBoundingClientRect();
            let next = (e.clientY - rect.top) / (rect.bottom - rect.top) > .5;
            this.insertBefore(dragEl, next && target.nextSibling || target);
        }
    }

    function _saveOrder(e){
        let arr = [];
        let wrapper = document.querySelector(sortableSelector);
        let fields = wrapper.querySelectorAll('[name]');
        for (let i = 0; i < fields.length; i++){
            let obj = {};
            for (let key in fields[i]){
                if (key === 'name'){
                    // todo: добавить название модели для сохранения в нужную таблицу
                    obj[key] = fields[i][key];
                }
            }
            arr.push(obj);
        }

        let jsonString = JSON.stringify(arr, null, ' ');
        // console.log('jsonString', jsonString)

        // route: admin.ajax.save_order_blocks.store
        $.ajax({
            type: 'POST',
            url: url_save_order_blocks,
            data:  {data: jsonString}
        }).done(function(response) {
            console.log('Success:', response)
        }).fail(function(data) {
            console.log('FAIL:', data);
        });
    }

    function _onDragEnd(e){
        e.preventDefault();
        this.removeEventListener('dragover', _onDragOver, false);
        this.removeEventListener('dragend', _onDragEnd, false);

        if (nextEl !== dragEl.nextSibling){
            this.onUpdate && this.onUpdate(dragEl);
        }
        // _saveOrder();
    }

    return function (options){
        options = options || {};

        this.onUpdate = options.stop || null;
        let excludedElements = options.excludedElements && options.excludedElements.split(/,*\s+/) || null;
        [...this.children].forEach(item => {
            let draggable = true;
            if (excludedElements){
                for (let i in excludedElements){
                    if (excludedElements.hasOwnProperty(i) && item.matches(excludedElements[i])){
                        draggable = false;
                        break;
                    }
                }
            }

            item.draggable = draggable;
            item.setAttribute('data-block', true);
            _unDraggable(item.children);
        });

        this.removeEventListener('dragstart', _onDragStart, false);
        this.addEventListener('dragstart', _onDragStart, false);
    };
})();

let wrapper = document.querySelectorAll(sortableSelector);

if (wrapper.length){
    wrapper.forEach(item => {
        item.sortable({
            excludedElements: '.excluded-element',
            stop: function (dragEl){
                // console.log(this)
                // console.log(dragEl)
            }
        });
    });
}
