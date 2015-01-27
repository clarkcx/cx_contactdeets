(function() {

    tinymce.create('tinymce.plugins.deets_email', {
        init : function(ed, url) {
                // Register command for when button is clicked
                ed.addCommand('cx_contactdeets_insert_email', function() {
                    selected = tinyMCE.activeEditor.selection.getContent();

                    if( selected ){
                        //If text is selected when button is clicked
                        //Wrap shortcode around it.
                        //content =  '[shortcode]'+selected+'[/shortcode]';
                        alert("Sorry, this won't work if you have selected text. Please click the place you'd like the thing to appear and then press this button again.");
                        content = content;
                    }else{
                        content =  '[contact-email]';
                    }

                    tinymce.execCommand('mceInsertContent', false, content);
                });

            // Register buttons - trigger above command when clicked
            ed.addButton('deets_email', {title : 'Insert a link to your email address. See "Settings > Contact Details" for help.', cmd : 'cx_contactdeets_insert_email', image: url + '/buttons/mce-email.png' });
        },   
    });
    
    tinymce.create('tinymce.plugins.deets_phone', {
         init : function(ed, url) {
                 // Register command for when button is clicked
                 ed.addCommand('cx_contactdeets_insert_phone', function() {
                     selected = tinyMCE.activeEditor.selection.getContent();
 
                     if( selected ){
                         //If text is selected when button is clicked
                         //Wrap shortcode around it.
                         //content =  '[shortcode]'+selected+'[/shortcode]';
                         alert("Sorry, this won't work if you have selected text. Please click the place you'd like the thing to appear and then press this button again.");
                         content = content;
                     }else{
                         content =  '[contact-phone]';
                     }
 
                     tinymce.execCommand('mceInsertContent', false, content);
                 });
 
             // Register buttons - trigger above command when clicked
             ed.addButton('deets_phone', {title : 'Insert a clickable link to your phone number. See "Settings > Contact Details" for help.', cmd : 'cx_contactdeets_insert_phone', image: url + '/buttons/mce-phone.png' });
         },   
     });
     
     tinymce.create('tinymce.plugins.deets_address', {
       init : function(ed, url) {
               // Register command for when button is clicked
               ed.addCommand('cx_contactdeets_insert_address', function() {
                   selected = tinyMCE.activeEditor.selection.getContent();

                   if( selected ){
                       //If text is selected when button is clicked
                       //Wrap shortcode around it.
                       //content =  '[shortcode]'+selected+'[/shortcode]';
                       alert("Sorry, this won't work if you have selected text. Please click the place you'd like the thing to appear and then press this button again.");
                       content = content;
                   }else{
                       content =  '[contact-address]';
                   }

                   tinymce.execCommand('mceInsertContent', false, content);
               });

           // Register buttons - trigger above command when clicked
           ed.addButton('deets_address', {title : 'Insert a link to your postal address. See "Settings > Contact Details" for help.', cmd : 'cx_contactdeets_insert_address', image: url + '/buttons/mce-address.png' });
       },   
   });
   
   tinymce.create('tinymce.plugins.deets_tw', {
        init : function(ed, url) {
                // Register command for when button is clicked
                ed.addCommand('cx_contactdeets_insert_twitter', function() {
                    selected = tinyMCE.activeEditor.selection.getContent();

                    if( selected ){
                        //If text is selected when button is clicked
                        //Wrap shortcode around it.
                        //content =  '[shortcode]'+selected+'[/shortcode]';
                        alert("Sorry, this won't work if you have selected text. Please click the place you'd like the thing to appear and then press this button again.");
                        content = content;
                    }else{
                        content =  '[social-twitter]';
                    }

                    tinymce.execCommand('mceInsertContent', false, content);
                });

            // Register buttons - trigger above command when clicked
            ed.addButton('deets_tw', {title : 'Insert a link to your Twitter page. See "Settings > Contact Details" for help.', cmd : 'cx_contactdeets_insert_twitter', image: url + '/buttons/mce-tw.png' });
        },   
    });
    
    tinymce.create('tinymce.plugins.deets_fb', {
            init : function(ed, url) {
                    // Register command for when button is clicked
                    ed.addCommand('cx_contactdeets_insert_facebook', function() {
                        selected = tinyMCE.activeEditor.selection.getContent();
    
                        if( selected ){
                            //If text is selected when button is clicked
                            //Wrap shortcode around it.
                            //content =  '[shortcode]'+selected+'[/shortcode]';
                            alert("Sorry, this won't work if you have selected text. Please click the place you'd like the thing to appear and then press this button again.");
                            content = content;
                        }else{
                            content =  '[social-facebook]';
                        }
    
                        tinymce.execCommand('mceInsertContent', false, content);
                    });
    
                // Register buttons - trigger above command when clicked
                ed.addButton('deets_fb', {title : 'Insert a link to your Facebook page. See "Settings > Contact Details" for help.', cmd : 'cx_contactdeets_insert_facebook', image: url + '/buttons/mce-fb.png' });
            },   
        });
        
        tinymce.create('tinymce.plugins.deets_gplus', {
             init : function(ed, url) {
                     // Register command for when button is clicked
                     ed.addCommand('cx_contactdeets_insert_gplus', function() {
                         selected = tinyMCE.activeEditor.selection.getContent();
     
                         if( selected ){
                             //If text is selected when button is clicked
                             //Wrap shortcode around it.
                             //content =  '[shortcode]'+selected+'[/shortcode]';
                             alert("Sorry, this won't work if you have selected text. Please click the place you'd like the thing to appear and then press this button again.");
                             content = content;
                         }else{
                             content =  '[social-gplus]';
                         }
     
                         tinymce.execCommand('mceInsertContent', false, content);
                     });
     
                 // Register buttons - trigger above command when clicked
                 ed.addButton('deets_gplus', {title : 'Insert a link to your Google Plus page. See "Settings > Contact Details" for help.', cmd : 'cx_contactdeets_insert_gplus', image: url + '/buttons/mce-gplus.png' });
             },   
         });
    
    // Register our TinyMCE plugin
    // first parameter is the button ID1
    // second parameter must match the first parameter of the tinymce.create() function above
    tinymce.PluginManager.add('deets_email', tinymce.plugins.deets_email);
    tinymce.PluginManager.add('deets_phone', tinymce.plugins.deets_phone);
    tinymce.PluginManager.add('deets_address', tinymce.plugins.deets_address);
    tinymce.PluginManager.add('deets_tw', tinymce.plugins.deets_tw);
    tinymce.PluginManager.add('deets_fb', tinymce.plugins.deets_fb);
    tinymce.PluginManager.add('deets_gplus', tinymce.plugins.deets_gplus);
})();