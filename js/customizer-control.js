(function( $ ) {
    wp.customize.bind( 'ready', function() {
        var customize = this;
        /**
         * This file adds some LIVE to the Theme Customizer live preview. To leverage
         * this, set your custom settings to 'postMessage' and then add your handling
         * here. Your javascript should grab settings from customizer controls, and
         * then make any necessary changes to the page using jQuery.
         */
         // Update the site title in real time...
        

         var customize = wp.customize;

             customize.previewer.bind( 'preview-edit', function( data ) {
                 var data = JSON.parse( data );
                     var control = customize.control( data.name );

                     control.focus();
             } );
    } );
})( jQuery );
