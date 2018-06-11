$(document).ready(function() {

    // Get page-content original position
    var contentTop = $('#page-content').offset().top;

    // Show/hide top link on page load
    showHideTopLink(contentTop);

    // Show/hide top link on scroll
    $(window).scroll(function() {
        showHideTopLink(contentTop);
    });

    // Scroll page on click action
    $('#page-top-link').click(function() {
        $('html, body').animate({ scrollTop: 0 }, 'fast');
        return false;
    });

    // Hash button on click action
    $('.file-info-button').click(function(event) {

        // Get the file name and path
        var name = $(this).closest('li').attr('data-name');
        var path = $(this).closest('li').attr('data-link');
        var complete_path = path + '/' + name;
        
        if(confirm("Are you sure you want to delete?")) {
            var ajaxurl = './resources/themes/bootstrap/delete.php?f=function';
            data = {'dir': complete_path, 'dirname' : name};
            $.post(ajaxurl, data, function (data, status) {
                window.location.reload(true);
            });
        }
//        $.ajax({
//            url:  ' ./resources/themes/bootstrap/delete.php',
//            type:    'get',
//            success: function(data) {
//
//                // Parse the JSON data
//                var obj = jQuery.parseJSON(data);
//
//                alert(obj);
//            }
//        });

        // Show the modal
       // $('#file-info-modal').modal('show');

        // Prevent default link action
        event.preventDefault();
    });

});

function showHideTopLink(elTop) {
    if($('#page-navbar').offset().top + $('#page-navbar').height() >= elTop) {
        $('#page-top-nav').show();
    } else {
        $('#page-top-nav').hide();
    }
}
