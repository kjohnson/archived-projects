<style>
	#img_list {
	  background-color: #ccc;
	  min-width: 100%;
	  min-height: 50px;
	}
	#img_list li {
		list-style-type: none;
		display: inline;
	}
	#img_list img {
		max-width: 200px;
	}
</style>

<div id="fuel_main_content_inner">

	<div class="row">
	  <div class="small-12 columns">

	    <h1>Dropbox Chooser Demo</h1>
	    <p class="instructions">This view is located in the fuel/modules/chooser/views/_admin/ folder.</p>

	    <div id="dropbox-container">
	    	<!-- add button here -->
	    </div>

	    <hr>

	    <ul id="img_list" class="small-block-grid-1 medium-block-grid-2 large-block-grid-3">
	    <!-- add images here -->
	    </ul>

	  </div>
	</div>	

</div>

<script type="text/javascript" src="https://www.dropbox.com/static/api/2/dropins.js" id="dropboxjs" data-app-key="0aci2snop4eu2qc"></script>

<script type="text/javascript">
/**
 * Chooser (Drop Box)
 * https://www.dropbox.com/developers/dropins/chooser/js
 */
options = {
    success: function(files) {
      files.forEach(function(file) {
        import_to_model(file);
      });
    },
    cancel: function() {
      //optional
    },
    linkType: "direct", // "preview" or "direct"
    multiselect: true, // true or false
    extensions: ['.png', '.jpg'],
};

var button = Dropbox.createChooseButton(options);
document.getElementById("dropbox-container").appendChild(button);

function import_to_model(file) {
	$.post( "chooser/import", { name: file.name, link: file.link, thumbnailLink: file.thumbnailLink, icon: file.icon } )
		.done(function( data ) {
			alert( "Photos Added" );
		});
}
</script>