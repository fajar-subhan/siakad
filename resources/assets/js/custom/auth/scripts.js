const icon = `<span class="svg-icon svg-icon-1 svg-icon-light"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black"/>
<rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="black"/>
<rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="black"/>
</svg></span>`;

/**
 * Begin Show/Hide password field
 */
$("#toggle-password").on('click', function () 
{
    var passwordType = $('#password').attr('type');

    if (passwordType == 'password') 
    {
        $(this).attr('class', 'fa-solid fa-eye text-primary');
        $('#password').attr('type', 'text');
    }
    else 
    {
        $(this).attr('class', 'fa-solid fa-eye-slash text-primary');
        $('#password').attr('type', 'password');
    }
});
/**
 * End Show/Hide password field
 */

/**
 * Start login process 
 */
$("#kt_sign_in_form").on('submit', function (e) {
    var email       = $("#email").val();
    var password    = $("#password").val();
    var error       = 0;

    var emailvalidate = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,5}$/i;
    if (email == "") 
    {
        $('#email_error').html( icon + ' Email wajib di isi');
        $('#email_error').css({
            'background-color' : '#f1416c',
            'color'            : 'white',
            'border-radius'    : '7px',
            'padding'          : '1rem',
            'margin-top'       : '1%'
        });

        $("#email").css({'border' : '2px solid #f1416c'});

        error++;
    }
    else if(!emailvalidate.test(email))
    {
        $('#email_error').html( icon + ' Format email tidak valid');
        $('#email_error').css({
            'background-color' : '#f1416c',
            'color'            : 'white',
            'border-radius'    : '7px',
            'padding'          : '1rem',
            'margin-top'       : '1%'
        });
        $("#email").css({'border' : '2px solid #f1416c'});
        $("#email_error").show();
        error++;
    }
    else 
    {
        $("#email").css({'border' : '2px solid #50cd89'});
        $("#email_error").hide();
    }
    
    if (password == "") 
    {
        $('#password_error').html(  icon + ' Password wajib di isi');
        $('#password_error').css({
            'background-color' : '#f1416c',
            'color'            : 'white',
            'border-radius'    : '7px',
            'padding'          : '1rem',
            'margin-top'       : '1%',
        });

        $("#password").css({'border' : '2px solid #f1416c'});

        error++;
    }
    
    if(error == 0)
    {
        var data = 
        {
            email   : email,
            password: password
        };

        $.ajax({
            url      : '/login',
            method   : 'post',
            data     : data,
            dataType : 'json',
            headers  : 
            {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            },
            success  : function(xhr)
            {
                if(xhr.status)
                {
                    window.location.href = '/dashboard';
                }
                else 
                {
                    Swal.fire({
                        icon    : 'error',
                        title   : 'Opps..',
                        text    : xhr.message
                    })
                } 
            }
        })
    }

    e.preventDefault();
});

$("#email").on('keyup',function(e)
{
    if(e.code != 'Enter')
    {
        var email       = e.target.value.length;

        if(email > 0)
        {
            $(this).css({'border' : '2px solid #50cd89'});
            $("#email_error").hide();
        }
        else 
        {
            $('#email_error').html( icon + ' Email wajib di isi');
            $(this).css({'border' : '2px solid #f1416c'});
            $("#email_error").show();
            $('#email_error').css({
                'background-color' : '#f1416c',
                'color'            : 'white',
                'border-radius'    : '7px',
                'padding'          : '1rem',
                'margin-top'       : '1%'
            });        
        }
    }

});

$("#password").on('keyup',function(e)
{
    if(e.code != 'Enter')
    {
        var password  = e.target.value.length;

        if(password > 0)
        {
            $(this).css({'border' : '2px solid #50cd89'});
            $("#password_error").hide();
        }
        else 
        {
            $('#password_error').html(  icon + ' Password wajib di isi');
            $(this).css({'border' : '2px solid #f1416c'});
            $("#password_error").show();
            $('#password_error').css({
                'background-color' : '#f1416c',
                'color'            : 'white',
                'border-radius'    : '7px',
                'padding'          : '1rem',
                'margin-top'       : '1%'
            });        
        }
    }
});
/**
 * End login process
 */

/**
 * Start logout proccess
 * 
 */
$("#logout").on('click',function()
{
    Swal.fire({
        text: "Apakah Anda yakin akan keluar ?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, keluar',
        cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) 
            {
                $.ajax({ url : '/logout',method : 'get' });
                window.location.reload();
            }
        });
});
/**
 * End logout proccess
 */