<svg width="200" height="200" class="my-svg">       
     <image xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icons/<?php the_field('my_icon'); ?>.svg" width="200" height="200"/>    
</svg> 

<?php if( have_rows('my_icons') ):?>
		<div class="icon-list">
		<?php while( have_rows('my_icons') ): the_row(); ?>

			<div data-src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icons/<?php the_sub_field('my_icon'); ?>.svg" class="my-icon">

			</div>

		<?php endwhile; ?>
		</div>
	<?php endif; ?>
	
	<script>


		// Get all elements with the class 'my-icon'
var icons = document.getElementsByClassName('my-icon');

// Loop through each icon
for (var i = 0; i < icons.length; i++) {
  (function(icon) {
    // Get the URL of the SVG file from the 'data-src' attribute
    var url = icon.getAttribute('data-src');

    // Create a new XMLHttpRequest
    var xhr = new XMLHttpRequest();

    // Configure the request
    xhr.open('GET', url, true);

    // Set the responseType to document
    xhr.responseType = 'document';

    // Once the request loads, replace the current icon's innerHTML with the response's documentElement
    xhr.onload = function() {
      if (this.status === 200) {
        // Get the SVG element from the response
        var svgElement = this.response.documentElement;

        // Set the width and height attributes
        svgElement.setAttribute('width', '50px');
        svgElement.setAttribute('height', '50px');

        // Replace the current icon's innerHTML with the modified SVG
        icon.innerHTML = svgElement.outerHTML;
      } else {
        console.error('Request failed. Returned status of ' + this.status);
      }
    };

    // Send the request
    xhr.send();
  })(icons[i]); // Ensure this line is outside the function scope.
}

	</script>