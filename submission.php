<?php
//Template Name: Submission

get_header();
?>
<div class="container">
<div class="row-fluid">
<div class="span8">
<div  id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 

<div  <?php post_class('post'); ?>>
<div class="clear"></div>
<div class="entry-content">
<?php sensitive_post_thumb('wpeden-responsive-post-thumb'); ?>  
<?php
$page = get_page_by_title('Submissions');
echo $page->post_content;
?>
</div>
<body>
<div class="container">
    <!-- The file upload form used as target for the file upload widget -->
    <form id="fileupload" action="file_upload.php" method="POST" enctype="multipart/form-data">
        <!-- Redirect browsers with JavaScript disabled to the origin page -->
        <noscript><input type="hidden" name="redirect" value="http://blueimp.github.com/jQuery-File-Upload/"></noscript>
        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
        <textarea class="field span8" rows="20" name="contents" wrap="physical" placeholder="Enter subject contents here." required></textarea>
	<div style="float:right;">
	<img src="/wp-content/uploads/2013/06/AudreyII.jpg" width=380 />
	<br />Drag and drop files onto my mouth to upload them!
	</div>
        <div class="row fileupload-buttonbar">
            <div class="span7 submission">
                <!-- The fileinput-button span is used to style the file input field as button -->

	<button class="upload btn btn-info">
	    <!--<i class="icon-plus icon-white"></i>-->
	    <label for="realupload">Add files... </label>
	    <div class="fakeupload">
        	<input type="text" name="fakeupload" /> <!-- browse button is here as background -->
	    </div>
	    <input type="file" name="upload" id="realupload" class="realupload" onchange="this.form.fakeupload.value = 	this.value;" />
	</button>

               <!-- <span class="btn btn-info">
                    <i class="icon-plus icon-white"></i>
                    <span>Add files...</span>
                    <input type="file" name="files[]" multiple style="opacity:0;">
                </span> -->
                <button type="submit" class="btn btn-primary">
                    <i class="icon-upload icon-white"></i>
                    <span>Start upload</span>
                </button>
                <!-- The loading indicator is shown during file processing -->
                <span class="fileupload-loading"></span>
            </div>
            <!-- The global progress information -->
            <div class="span5 fileupload-progress fade">
                <!-- The global progress bar -->
                <div class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                    <div class="bar" style="width:0%;"></div>
                </div>
                <!-- The extended global progress information -->
                <div class="progress-extended">&nbsp;</div>
            </div>
        </div>
        <!-- The table listing the files available for upload/download -->
        <table role="presentation" class="table table-striped"><tbody class="files" data-toggle="modal-gallery" data-target="#modal-gallery"></tbody></table>
    </form>
    <br>
</div>
<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td>
            <span class="preview"></span>
        </td>
        <td>
            <p class="name">{%=file.name%}</p>
            {% if (file.error) { %}
                <div><span class="label label-important">Error</span> {%=file.error%}</div>
            {% } %}
        </td>
        <td>
            <p class="size">{%=o.formatFileSize(file.size)%}</p>
            {% if (!o.files.error) { %}
                <div class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="bar" style="width:0%;"></div></div>
            {% } %}
        </td>
        <td>
            {% if (!o.files.error && !i && !o.options.autoUpload) { %}
                <button class="btn btn-primary start">
                    <i class="icon-upload icon-white"></i>
                    <span>Start</span>
                </button>
            {% } %}
            {% if (!i) { %}
                <button class="btn btn-warning cancel">
                    <i class="icon-ban-circle icon-white"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
        <td>
            <span class="preview">
                {% if (file.thumbnail_url) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" data-gallery="gallery" download="{%=file.name%}"><img src="{%=file.thumbnail_url%}"></a>
                {% } %}
            </span>
        </td>
        <td>
            <p class="name">
                <a href="{%=file.url%}" title="{%=file.name%}" data-gallery="{%=file.thumbnail_url&&'gallery'%}" download="{%=file.name%}">{%=file.name%}</a>
            </p>
            {% if (file.error) { %}
                <div><span class="label label-important">Error</span> {%=file.error%}</div>
            {% } %}
        </td>
        <td>
            <span class="size">{%=o.formatFileSize(file.size)%}</span>
        </td>
        <td>
            <button class="btn btn-danger delete" data-type="{%=file.delete_type%}" data-url="{%=file.delete_url%}"{% if (file.delete_with_credentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                <i class="icon-trash icon-white"></i>
                <span>Delete</span>
            </button>
            <input type="checkbox" name="delete" value="1" class="toggle">
        </td>
    </tr>
{% } %}
</script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="/jQuery-File-Upload-master/js/vendor/jquery.ui.widget.js"></script>
<!-- The Templates plugin is included to render the upload/download listings -->
<script src="http://blueimp.github.com/JavaScript-Templates/tmpl.min.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="http://blueimp.github.com/JavaScript-Load-Image/load-image.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="http://blueimp.github.com/JavaScript-Canvas-to-Blob/canvas-to-blob.min.js"></script>
<!-- Bootstrap JS and Bootstrap Image Gallery are not required, but included for the demo -->
<script src="http://blueimp.github.com/cdn/js/bootstrap.min.js"></script>
<script src="http://blueimp.github.com/Bootstrap-Image-Gallery/js/bootstrap-image-gallery.min.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="/jQuery-File-Upload-master/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="/jQuery-File-Upload-master/js/jquery.fileupload.js"></script>
<!-- The File Upload processing plugin -->
<script src="/jQuery-File-Upload-master/js/jquery.fileupload-process.js"></script>
<!-- The File Upload image resize plugin -->
<script src="/jQuery-File-Upload-master/js/jquery.fileupload-resize.js"></script>
<!-- The File Upload validation plugin -->
<script src="/jQuery-File-Upload-master/js/jquery.fileupload-validate.js"></script>
<!-- The File Upload user interface plugin -->
<script src="/jQuery-File-Upload-master/js/jquery.fileupload-ui.js"></script>
<!-- The main application script -->
<script src="/jQuery-File-Upload-master/js/main.js"></script>
<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE8+ -->
<!--[if gte IE 8]><script src="js/cors/jquery.xdr-transport.js"></script><![endif]-->
</body> 
</html>




</div>
</div>
</div>
</div>
</div>

<?php
get_footer();
?>