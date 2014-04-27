<?php

	class bigflannelSlideshowEmbed extends KokenPlugin {
	
	    function __construct() {
	        $this->register_shortcode('bigflannel_slideshow_embed', 'render');
	    }
	    
	    function render($attributes) {
	    	return <<<HTML
<div class="k-content-embed">
	<ul id="nav-content">
		<li>
			<a href="#" id="sldshw-prev" title="Previous" data-bind-to-key="left">&larr;&nbsp;Prev</a>
		</li>
		<li>
			<a href="#" id="sldshw-play" title="Pause" data-bind-to-key="space">Pause</a>
		</li>
		<li>
			<a href="#" id="sldshw-next" title="Next" data-bind-to-key="right">Next&nbsp;&rarr;</a>
		</li>
	</ul>
	<div class="main-content">
		<koken:pulse source="album" filter:id="{$attributes['album']}" jsvar="pulse" group="albums" next="#sldshw-next" previous="#sldshw-prev" toggle="#sldshw-play" link_to="advance" />
	</div>
	<script>
		pulse.on( 'start', function() {
			$('#sldshw-play').addClass('waiting');
			playState(pulse.options.autostart);
		});
		pulse.on( 'dataloaded', function() {
			$('#sldshw-play').removeClass('waiting');
		});
		pulse.on( 'playing', function(isPlaying) {
			var el = $('#sldshw-play');
			playState(isPlaying);
		});
		pulse.on( 'waiting', function() {
			$('#sldshw-play').addClass('waiting');
		});
		function playState(playing) {
			var el = $('#sldshw-play');
			if (playing) {
				el.html('Pause');
			} else {
				el.html('Play');
			}
		}
	</script>
</div>
HTML;
		}
		
	}
