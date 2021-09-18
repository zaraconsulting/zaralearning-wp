class CourseCategoryFilter
{
    constructor()
    {
        this.events();
    }

    events = () =>
    {
        document.querySelectorAll('.term-link').forEach( el =>
            {
                el.addEventListener( 'click', ( e ) =>
                {
                    // e.preventDefault();
                    let tax_term = el.getAttribute('data-term');
                    this.getPostsByCategory( tax_term );
                } );
            });
    }

    getPostsByCategory = ( termSlug ) =>
    {
        
        const data = { 'term': termSlug }
        const xhttp = new XMLHttpRequest();
        xhttp.open( 'POST' , `${ courseData.root_url }/wp-json/app/v1/course/category/` );
        xhttp.setRequestHeader( "X-WP-Nonce",  courseData.nonce );
        xhttp.setRequestHeader( "Content-Type",  'application/json;charset:UTF-8' );
        xhttp.send( JSON.stringify( data ) );
    }

}

const courseCategoryPosts = new CourseCategoryFilter();