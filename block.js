// block.js
( function( blocks, element ) {
    var el = element.createElement;
    const { withSelect } = wp.data;
    
    function CreateImage( props ) {
        var src = props.src;
        var alt = props.alt;
 
        return el( 'img', {
            src: src,
            alt: alt
        } );
    }
    
    blocks.registerBlockType( 'nforced-uk/random-image', {
        title: 'Random Image',
        icon: 'format-image',
        category: 'common',
        attributes: {
            mediaId: {
                type: 'string',
                source: 'attribute',
                attribute: 'alt',
                selector: 'img'
            }
        },
        
        edit: withSelect((select, props) => {
            let mediaId = wp.data.select( 'core/editor' ).getEditedPostAttribute( 'featured_media' );
	    
            const { getMedia } = select('core/editor'); 
            let mediaImage = mediaId ? getMedia(mediaId) : null;

            return { mediaImage: mediaImage, mediaId: mediaId, props };
        })(({ mediaId, mediaImage, props }) => {
            
            if (typeof mediaImage === 'undefined') {
                return '';
            }
            
            return CreateImage({ src: mediaImage.source_url, alt: mediaId });
        }),
 
        save: function(props) {
            return null;
        }
    });
} )(
    window.wp.blocks,
    window.wp.element,
    window.wp.editor,
    window.wp.data,
);