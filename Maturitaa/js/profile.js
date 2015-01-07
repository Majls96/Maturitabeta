            $(document).ready(function() {
                $('#password').blur(function() {
                    $('#result').html(checkLength($('#password').val()))
                })


                $("#passrep").blur(function() {
                    var passwordInput = $("#password").val();
                    var passwordAgain = $('#passrep').val();
                    $('#result2').html(passwordsSame(passwordInput, passwordAgain));
                })



              
            });
            function checkLength(password) {
                if (password.length < 5) {
                    return 'Moc kratke heslo'
                }
                else {
                    return ""
                }
            }

            function passwordsSame(pass1, pass2) {
                if (pass1 == pass2) {
                    return "";
                }
                else {
                    return "Hesla se neshodují"
                }


            }


        