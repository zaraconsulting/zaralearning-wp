let frontPageForm = document.querySelector( '#front-page-contact-form' );
frontPageForm.addEventListener( 'submit', function( e ) {
    e.preventDefault();

    // When finished
    window.location.reload();
} );