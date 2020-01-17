function get_fb(){
    var feedback = $.ajax({
        type: "POST",
        url: "feedback.php",
        async: false
    }).success(function(){
        setTimeout(function(){get_fb();}, 10000);
    }).responseText;

    $('div.feedback-box').html(feedback);
}

setInterval(get_fb, 10000);