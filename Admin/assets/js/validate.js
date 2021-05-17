function validate(){
    if( document.addAdminForm.lastname.value == "" ) {
        alert( "Please provide your lastname!" );
        document.addAdminForm.lastname.focus() ;
        return false;
     }

     if( document.addAdminForm.firstname.value == "" ) {
        alert( "Please provide your firstname!" );
        document.addAdminForm.firstname.focus() ;
        return false;
     }

     if( document.addAdminForm.email.value == "" ) {
        alert( "Please provide your email!" );
        document.addAdminForm.email.focus() ;
        return false;
     }

     if( document.addAdminForm.username.value == "" ) {
        alert( "Please provide your username!" );
        document.addAdminForm.username.focus() ;
        return false;
     }

     if( document.addAdminForm.password.value == "" ) {
        alert( "Please provide your password!" );
        document.addAdminForm.password.focus() ;
        return false;
     }

     if( document.addAdminForm.gender.value == "" ) {
        alert( "Please choose your gender" );
        document.addAdminForm.gender.focus() ;
        return false;
     }

     var email = document.addAdminForm.email.value;
     var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
     if(!email.match(emailExp)){
        alert( "Please provide your correct email!" );
        document.addAdminForm.email.focus() ;
        return false;
     }

     return true;
}