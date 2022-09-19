$(document).ready(function() {
    var btnSend = $('.btn-send');

    btnSend.on('click', function() {

        $('#is-loading').fadeIn();
        
        var name = $('#name').val();
        var email = $('#email').val();
        var subject = $('#subject').val();
        var message = $('#message').val();

        var data = {
            name: name,
            email: email,
            subject: subject,
            message: message
        };

        if (name === '') {
            $('#name').addClass('is-invalid');
            return;
        } else {
            $('#name').removeClass('is-invalid');
        }

        if (email === '') {
            $('#email').addClass('is-invalid');
            return;
        } else {
            $('#email').removeClass('is-invalid');
        }

        if (subject === '') {
            $('#subject').addClass('is-invalid');
            return;
        } else {
            $('#subject').removeClass('is-invalid');
        }

        if (message === '') {
            $('#message').addClass('is-invalid');
            return;
        } else {
            $('#message').removeClass('is-invalid');
        }

        $.ajax({
            url: 'send.php',
            method: 'POST',
            data: data,
            success: function(response) {
                if (response.data === 'success') {
                    $('#mail-success').fadeIn();
                    $('#is-loading').fadeOut();
                    setTimeout(() => {
                        $('#mail-success').fadeOut();
                    }, 3000);
                } else {
                    $('#mail-error').fadeIn();
                    $('#is-loading').fadeOut();
                    setTimeout(() => {
                        $('#mail-error').fadeOut();
                    }, 3000);
                }
            }
        });        

    });
});