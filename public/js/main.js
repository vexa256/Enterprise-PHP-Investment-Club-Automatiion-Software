$(function() {


    function SwitchClass(el, remove, add) {

        var element = $('.'+el);

        if (element.length > 0){
            element.addClass(add);
            element.removeClass(remove);
        }


    }

    SwitchClass('form-select', 'form-select-solid', 'jesus');
});
