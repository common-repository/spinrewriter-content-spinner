jQuery(function ($) {

        $('body').append('<div class="spinrewriter-dialog hidden"><textarea style="width:100%; height:100%;"></textarea></div>');

        var $info = $(".spinrewriter-dialog");
        $info.dialog({
                'dialogClass': 'wp-dialog',
                'width': 800,
                'height':600,
                'modal': true,
                'autoOpen': false,
                'closeOnEscape': true,
                'buttons': [
                        {
                                'text': 'Close',
                                'class': 'button-primary',
                                'click': function () {

                                        $(this).dialog('close');


                                }
}]
        });

        function get_tinymce_content() {
                if($("#wp-content-wrap").hasClass("tmce-active")) {
                        return tinyMCE.activeEditor.getContent({
                                format: 'raw'
                        });
                } else {
                        return $('#content').val();
                }
        }

        var arr = [];

        function run() {
                $('.spinrewriter select,.spinrewriter textarea').each(function (i, t) {
                        _select = $(t);
                        arr.push({
                                name: _select.attr('name'),
                                value: _select.val()
                        });


                });
                arr.push({
                        name: "text",
                        value: get_tinymce_content()
                })

                var cb = function (results) {
                        $info.dialog('open');
                        if(results.status == 'ERROR') {
                                $('.spinrewriter-dialog textarea').val(results.response);

                        }
                                $('.spinrewriter-dialog textarea').val(results.response);

                        
                  $(".submit-spinrewriter").text('spin');


                }
                var obj = {
                        data: arr,
                        action: 'call'
                };

                $.ajax({
                        url: ajaxurl,
                        type: 'post',
                        data: obj,
                        dataType: 'json',
                        success: cb
                });




        }

        $(".submit-spinrewriter").click(function (event) {
        	  event.preventDefault();

          $(this).text('Please Wait');
                run();
        });


});