// Class definition

var KTAutosize = function () {

    // Private functions
    var demos = function () {
        // basic demo
        var demo1 = $('#kt_autosize_1');
        var demo2 = $('#kt_autosize_2');
        var demo3 = $('.autosize');

        autosize(demo1);
        autosize(demo3);

        autosize(demo2);
    }

    return {
        // public functions
        init: function() {
            demos();
        }
    };
}();

jQuery(document).ready(function() {
    KTAutosize.init();
});
