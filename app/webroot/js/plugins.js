// Avoid `console` errors in browsers that lack a console.
(function() {
    var noop = function noop() {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = window.console || {};

    while (length--) {
        // Only stub undefined methods.
        console[methods[length]] = console[methods[length]] || noop;
    }
}());

//Place any jQuery/helper plugins in here.
(function() {

    $.validator.addClassRules({
        validateIngredientName: {
            required: true
        },
        validateMethodStep: {
            required: true
        },
        // validateRecipeName: {
            // Not necessary yet but may implement later
        // },
    });
    // Form validation, client side
    $('#RecipeAddForm').validate({
        rules: {
            "data[Recipe][name]": {
                required: true
            },
        },
        messages: {
            "data[Recipe][name]": "A recipe name is required",
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass(errorClass).removeClass(validClass);
            $(element.parentNode).addClass(errorClass).removeClass(validClass);
        },
        unhighlight: function(element, errorClass, validClass) {
            var isValid = false,
                $this = $(this);
            
            $.each(element.parentNode.childNodes, function(index, value) {
                
                // if ($this.element(value)) {
                //     isValid = true;
                // }
            })
            if (isValid) {
                // $(element.parentNode).removeClass(errorClass).addClass(validClass);
            }

            $(element).removeClass(errorClass).addClass(validClass);
            $(element.parentNode).removeClass(errorClass).addClass(validClass);
            
        },
        validClass: "success",
        errorClass: "error help-block",
        errorElement: "p",
        errorPlacement: function(error, element) {
            error.prependTo( element.parent().parent().parent() ); 
        },
        // invalidHandler: function(e, validator) {
        //     var errors = validator.numberOfInvalids();
        //     if (errors) {
        //         var message = errors == 1
        //             ? 'You missed 1 field. It has been highlighted below'
        //             : 'You missed ' + errors + ' fields.  They have been highlighted below';
        //         $("div.error span").html(message);
        //         $("div.error").show();
        //     } else {
        //         $("div.error").hide();
        //     }
        // },
        showLabel: function(element, message) {
            
        },
    });
    
}());
