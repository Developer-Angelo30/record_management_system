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
                        $('#registerForm')[0].reset()
                        Swal.fire(
                            'Successfuly Registerd!',
                            response.message,
                            'success'
                        )
                   }
                   else{
                        switch(response.error){
                            case 'username':{
                                $('.error-username').text(response.message)
                                break;
                            }
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
                            case 'username': {
                                $('.error-username').text(response.message)
                                break;
                            }
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

    const updateEmail = () =>{
        $(document).on('submit', '#updateEmailForm', function(event){
            event.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                method: "POST",
                url: "../../apps/api/update_email.php",
                data: formData,
                processData: false,
                contentType: false,
                dataType: "JSON",
                success: function (response) {
                    if(response.status == true){
                        location.href = response.message;
                    }
                    else{
                        Swal.fire(
                            'Something went wrong!',
                            response.message,
                            'error'
                        )
                    }
                }
            });

        })
    }
    updateEmail()

    const updatePassword  = () =>{
        $(document).on('submit', '#updatePasswordForm' , function(event){
            event.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                method: "POST",
                url: "../../apps/api/update_password.php",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                dataType: "JSON",
                success: function (response) {
                    if(response.status == true){
                        location.href = response.message;
                    }
                    else{
                        Swal.fire(
                            'Something went wrong!',
                            response.message,
                            'error'
                        )
                    }
                }
            });
        })
    }
    updatePassword();

    const updatePersonalInfo = () =>{
        $(document).on('submit', '#updatePersonalForm' , function(){
            event.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                method: "POST",
                url: "../../apps/api/update_personal_info.php",
                data: formData,
                processData: false,
                contentType: false,
                dataType: "JSON",
                success: function (response) {
                    if(response.status == true){
                        location.reload();
                    }
                    else{
                        Swal.fire(
                            'Something went wrong!',
                            response.message,
                            'error'
                        )
                    }
                }
            });
        })
    }
    updatePersonalInfo()

    const deleteAccount = () =>{
        $(document).on('submit' , '#deleteAccountForm' , function(e){
            e.preventDefault();

            var formData = new FormData(this);

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
              }).then((result) => {
                if (result.isConfirmed) {
                    
                    $.ajax({
                        method: "POST",
                        url: "../../apps/api/delete_account.php",
                        data: formData,
                        processData: false,
                        contentType: false,
                        dataType: "JSON",
                        success: function (response) {
                            if(response.status == true){
                                location.href = response.message;
                            }
                            else{
                                Swal.fire(
                                    'Something went wrong!',
                                    response.message,
                                    'error'
                                )
                            }
                        }
                    });
                    
                }
            })
        })
    }
    deleteAccount()

    const announcementDisplay = () =>{
        
        $.ajax({
            url: "../../apps/api/announcement.php",
            method: "POST",
            dataType: "JSON",
            success: (response) =>{
                $('#fetch-announcement').html('')
                for(i in response){
                    $('#fetch-announcement').append('\
                    <div class="bg-bg=light shadow mt-3 bg-light p-5 " >\
                        <div class="navbar">\
                            <h1>'+response[i].title+'</h1>\
                            <small>'+response[i].date+'</small>\
                        </div><hr>\
                        <p>'+response[i].message+'</p>\
                    </div>\
                ')
                }
            }
            
        })
    }
    announcementDisplay()

} )
