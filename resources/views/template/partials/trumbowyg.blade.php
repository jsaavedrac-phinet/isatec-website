<link rel="stylesheet" href="{{asset('plugins/trumbowyg/ui/trumbowyg.min.css')}}" media="none" onload="if(media!='all')media='all'">
<noscript><link rel="stylesheet" href="{{asset('plugins/trumbowyg/ui/trumbowyg.min.css')}}"></noscript>
<script type="text/javascript" src="{{ asset('plugins/trumbowyg/trumbowyg.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/trumbowyg/langs/es.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/trumbowyg/plugins/upload/trumbowyg.upload.js') }}"></script>
<script type="text/javascript">
	var path ="/admin/upload_images";
	const tb = $('.trumbowyg').trumbowyg({
		lang: 'es',
		resetCss: true,
		imageWidthModalEdit: true,
		removeformatPasted: true,
        tagsToRemove: ['script'],
		btnsDef: {
        // Create a new dropdown
            image: {
                dropdown: ['insertImage','upload'],
                ico: 'insertImage'
            },
            formattingEdit: {
                dropdown: ['h2', 'h3', 'h4'],
                ico: 'p'
            },
	    },
	    // Redefine the button pane
	    btns: [
	        // ['viewHTML'],
	        // ['formatting'],
            ['formattingEdit'],
	        ['strong', 'em', 'del'],
	        ['superscript', 'subscript'],
	        ['link'],
	        // ['image'],
	        // ['video'], // Our fresh created dropdown
	        ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
	        ['unorderedList', 'orderedList'],
	        // ['horizontalRule'],
	        // ['removeformat'],
	        // ['fullscreen']
	    ],
		    plugins: {
		        // Add imagur parameters to upload plugin for demo purposes
		        upload: {
		            serverPath: path,
		            fileFieldName: 'image',
		            urlPropertyName: 'url',
		            imageWidthModalEdit: true
		        },
			    // video: {
			    //         serverPath: path_video,
			    //         fileFieldName: 'video',
			    //         headers: {
			    //             'Authorization': 'Client-ID xxxxxxxxxxxx'
			    //         },
			    //         urlPropertyName: 'url'
			    //     }
	    }
		});

</script>
