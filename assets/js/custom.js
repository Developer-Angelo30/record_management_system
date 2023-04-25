$(document).ready( ()=>{

    const registration = function(){
        $(document).on('submit', '#registerForm' , function(e){
            e.preventDefault()

            var formData = new FormData(this);

            $.ajax({
                method: "POST",
                url: "./apps/api/register.php",
                data: formData,
                processData: false,
                contentType: false,
                dataType: "JSON",
                success: function (response) {
                   if(response.status == true){
                        Swal.fire(
                            'Successfuly Registerd!',
                            response.message,
                            'success'
                        )
                   }
                   else{
                        switch(response.error){
                            case 'email':{
                                $('.error-email').text(response.message)
                                break;
                            }
                            case 'fullname':{
                                $('.error-fullname').text(response.message)
                                break;
                            }
                            case 'occupation':{
                                $('.error-occupation').text(response.message)
                                break;
                            }
                            case 'religion':{
                                $('.error-religion').text(response.message)
                                break;
                            }
                            case 'contact-number':{
                                $('.error-contact-number').text(response.message)
                                break;
                            }
                            case 'password':{
                                $('.error-password').text(response.message)
                                break;
                            }
                            case 'confirm-password':{
                                $('.error-confirm-password').text(response.message)
                                break;
                            }
                            default:{
                                Swal.fire(
                                    'Something went wrong!',
                                    response.message,
                                    'error'
                                )
                            }
                        }
                   }
                }
            });


        } )
    }
    registration()

    const login = function(){

        $(document).on('submit', '#loginForm' , function(e){
            e.preventDefault()

            var formData = new FormData(this);
            
            $.ajax({
                method: "POST",
                url: "./apps/api/login.php",
                data: formData,
                processData: false,
                contentType: false,
                dataType: "JSON",
                success: function (response) {
                    if(response.status == true){
                        location.href = response.message
                    }
                    else{
                        switch(response.error){
                            case 'email': {
                                $('.error-email').text(response.message)
                                break;
                            }
                            case 'password': {
                                $('.error-password').text(response.message)
                                break;
                            }
                            default:{
                                Swal.fire(
                                    'Something went wrong!',
                                    response.message,
                                    'error'
                                )
                            }
                        }
                    }
                }
            });


        } )

    }
    login()

    const resetError = ()=>{
        $(document).on('keyup', '.form-control' , function() {
            $('.error-message').html('')
        })
    }
    resetError()
} )