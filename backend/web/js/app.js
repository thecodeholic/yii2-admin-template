$(function(){

    //Initialize tooltips and popovers
    (function () {
        $('[data-toggle="tooltip"]').tooltip();
        $('[data-toggle="popover"]').popover();
    })();

    //DEFAULT COLOR FOR CHARTS
    LobiAdmin.DEFAULT_COLOR = '#216ba0';

    //Enable tooltips and popovers on every page load
    $('body').on('pageLoaded.lobiAdmin', function (ev) {
        $('[data-toggle="tooltip"]').tooltip();
        $('[data-toggle="popover"]').popover();
    });


    //Prevent empty links click and the links which href="" attribute is current url hash value
    $(document).on('click', 'a', function(ev){
        var $a = $(this);
        if ($a.attr('href') === '#' || window.location.hash === $a.attr('href')){
            ev.preventDefault();
        }
    });
    //Prevent showing disabled tabs
    $(document).on('show.bs.tab', '.nav-tabs li.disabled>a, .nav-pills li.disabled>a', function(ev){
        ev.preventDefault();
    });

    //LobiBox default options
    Lobibox.notify.OPTIONS = $.extend({}, Lobibox.notify.OPTIONS, {
        soundPath: 'sound/lobibox/'
    });

    /**
     * When this element is clicked email will be opened by the data-key="" attribute of clicked element
     */
    $(document).on('click', LobiAdminConfig.openEmailViewSelector, function(){
        var $this = $(this);
        //If lobimail is already loaded
        if (window.location.hash === $this.attr('href')){
            var $mail = $('.lobimail').data('lobiMail');
            $mail.viewEmail($this.data('key'));
        }
        //If mailbox view is not loaded it will be loaded as soon as the link is clicked
        //and we attach event listener. Before mailbox is finaly initialized we change default view option
        else{
            $(document).on('beforeInit.lobiMail.1', '.lobimail', function(ev, $mail){
                $mail.setDefaultView('email', $this.data('key'));
                $(document).off('beforeInit.lobiMail.1', '.lobimail');
            });
        }
    });
    /**
     * When you click this element compose email interface will be opened
     */
    $(document).on('click', LobiAdminConfig.composeEmailViewSelector, function(ev){
        var $this = $(this);
        //If lobimail is already loaded
        if (window.location.hash === $this.attr('href')) {
            var $mail = $('.lobimail').data('lobiMail');
            $mail.showCompose();
        }
        //If mailbox view is not loaded it will be loaded as soon as the link is clicked
        //and we attach event listener. Before mailbox is finaly initialized we change default view option
        else {
            $(document).on('beforeInit.lobiMail.1', '.lobimail', function(ev, $mail){
                $mail.setDefaultView('compose');
                $(document).off('beforeInit.lobiMail.1', '.lobimail');
            });
        }
    });

});

/**
 * Give "datasets" option with only required color "strokeColor"
 * and other colors will be automatically generated and the same datasets array will be returned.
 * You can optionally give "label", "data" or any other options in "datasets" objects,
 * the function will only add colors to dataset objects.
 *
 * @param {type} type REQUIRED 'Available options: [line, bar, radar]'
 * @param {type} data REQUIRED '"datasets" option for chart data'
 * @returns {Plain Object} "the same datasets object with filled options"
 */
function fillChartJsColors(type, data){
    if (type === 'line' || type === 'radar'){
        for (var i = 0; i<data.length; i++){
            data[i].fillColor = data[i].fillColor || LobiAdmin.fadeOutColor(data[i].strokeColor, 20);
            data[i].pointColor = data[i].pointColor || data[i].strokeColor;
            data[i].pointStrokeColor = data[i].pointStrokeColor ||  LobiAdmin.lightenColor('#FFFFFF', -20);
            data[i].pointHighlightFill = data[i].pointHighlightFill || LobiAdmin.fadeOutColor(data[i].pointColor, -25);
            data[i].pointHighlightStroke = data[i].pointHighlightStroke || '#FFFFFF';
        }
    }else if (type === 'bar'){
        for (var i = 0; i < data.length; i++) {
            data[i].fillColor = data[i].fillColor || LobiAdmin.fadeOutColor(data[i].strokeColor, 10);
            data[i].highlightFill = data[i].highlightFill || LobiAdmin.fadeOutColor(data[i].fillColor, 15);
            data[i].highlightStroke = data[i].highlightStroke || LobiAdmin.fadeOutColor(data[i].strokeColor, 15);
        }
    }
    return data;
}
