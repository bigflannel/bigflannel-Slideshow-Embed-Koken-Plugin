<?php

	class bigflannelSlideshowEmbed extends KokenPlugin {
	
	    function __construct() {
	        $this->register_shortcode('bigflannel_slideshow_embed', 'render');
	    }
	    
	    function render($attributes) {
	    	$slideUnique = md5(uniqid(rand(), true));
	    	return <<<HTML
<div class="k-content-embed bigflannel-slideshow-embed">
	<div class="main-content">
		<koken:pulse source="album" filter:id="{$attributes['album']}" jsvar="pulse{$slideUnique}" group="albums-{$slideUnique}" next="#sldshw-next{$slideUnique}" previous="#sldshw-prev{$slideUnique}" toggle="#sldshw-play{$slideUnique}" link_to="lightbox" autostart="false" />
	</div>
	<ul class="nav-content">
		<li class="sldshw-prev">
			<a href="#" id="sldshw-prev{$slideUnique}" title="{{ language.previous }}" data-bind-to-key="left">&larr;&nbsp;</a>
		</li>
		<li class="sldshw-play">
			<a href="#" id="sldshw-play{$slideUnique}" title="Toggle" data-bind-to-key="space">Loading</a>
		</li>
		<li class="sldshw-next">
			<a href="#" id="sldshw-next{$slideUnique}" title="{{ language.next }}" data-bind-to-key="right">&nbsp;&rarr;</a>
		</li>
	</ul>
	<div class="text-content">
		<h1 id="content-title{$slideUnique}" class="content-title">
			<a href="#" id="content-link{$slideUnique}" title="">&nbsp;</a>
		</h1>
		<div id="content-caption{$slideUnique}" class="content-caption" class="header-light">
			&nbsp;
		</div>
	</div>
	<script>
		pulse{$slideUnique}.on( 'start', function() {
			$('#sldshw-play{$slideUnique}').addClass('waiting');
			playState{$slideUnique}(pulse{$slideUnique}.options.autostart);
		});
		pulse{$slideUnique}.on( 'dataloaded', function() {
			$('#sldshw-play{$slideUnique}').removeClass('waiting');
		});
		pulse{$slideUnique}.on( 'playing', function(isPlaying) {
			playState{$slideUnique}(isPlaying);
		});
		pulse{$slideUnique}.on( 'transitionstart', function(e) {
			var data = e.data,
				title = $('#content-title{$slideUnique}'),
				caption = $('#content-caption{$slideUnique}'),
				link = $('#content-link{$slideUnique}');
			link.attr("href", data.url);
			if (data.title.length > 1 ) {
				title.html( data.title );
			} else {
				title.html( data.filename );
			}
			link.attr("title", data.title || data.filename );
			if (data.caption.length > 1) {
				caption.html( data.caption );
			} else {
				caption.html( '&nbsp;' );
			}
			$('#sldshw-play{$slideUnique}').removeClass('waiting');
		});
		pulse{$slideUnique}.on( 'waiting', function() {
			$('#sldshw-play{$slideUnique}').addClass('waiting');
		});
		function playState{$slideUnique}(playing) {
			var el = $('#sldshw-play{$slideUnique}');
			if (playing) {
				el.html('{{ language.pause }}');
			} else {
				el.html('{{ language.play }}');
			}
		}
	</script>
</div>
HTML;
		}
		
	}
