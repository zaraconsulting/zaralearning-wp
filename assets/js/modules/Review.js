class Review
{
    constructor()
    {
        this.form = document.querySelector('#course-comment-form');
        this.events();
    }
    
    events = () =>
    {
        this.form.addEventListener( 'submit', ( e ) => {
            e.preventDefault();
            this.createReview( e );
            document.location.reload();
        } );
    }
    
    createReview = ( e ) => 
    {
        
        const course_id = document.querySelector( '#course-comment-form #course_id' ).value;
        const name = document.querySelector( '#course-comment-form #name' ).value;
        const email = document.querySelector( '#course-comment-form #email' ).value;
        const rating = document.querySelector( '#course-comment-form #rating' ).value;
        const comment = document.querySelector( '#course-comment-form #comment' ).value;
        const customFormData = { course_id, name, email, rating, comment };
        // const formData = {
        //     'title': name,
        //     'content': comment,
        //     'status': 'publish',
        // }
        // console.log(formData)
        
        const xhttp = new XMLHttpRequest();
        // xhttp.open( 'POST' , `${ courseData.root_url }/wp-json/course/v1/reviews/${ formData.course_id }` );
        xhttp.open( 'POST' , `${ courseData.root_url }/wp-json/app/v1/reviews` );
        xhttp.setRequestHeader( "X-WP-Nonce",  courseData.nonce );
        xhttp.setRequestHeader( "Content-Type",  'application/json;charset:UTF-8' );
        // xhttp.send( JSON.stringify( formData ) ); 
        xhttp.send( JSON.stringify( customFormData ) ); 

    }
}

const review = new Review();