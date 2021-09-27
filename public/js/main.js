$(function() {


    function SwitchClass(el, remove, add) {

        var element = $('.'+el);

        if (element.length > 0){
            element.addClass(add);
            element.removeClass(remove);
        }


    }

    //SwitchClass('x_ReportsTo', 'col-md-4', 'col-md-12');
});
