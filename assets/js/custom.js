let frontPageForm = document.querySelector( '#front-page-contact-form' );
frontPageForm.addEventListener( 'submit', function ( e )
{
    e.preventDefault();

    // When finished
    window.location.reload();
} );

// setTimeout(() => {
//     document.querySelector('.counter-seconds').innerText = '86,400';
//     document.querySelector('.counter-minutes').innerText = '1,440';
//     document.querySelector('.counter-hours').innerText = '24';
//     document.querySelector('.counter-days').innerText = '365';
// }, 3000)

// Remove the Google Maps Directions card
let googleMapsCard = document.querySelectorAll( '.place-card.place-card-large' );
console.log( googleMapsCard );
console.log( 'hi' );