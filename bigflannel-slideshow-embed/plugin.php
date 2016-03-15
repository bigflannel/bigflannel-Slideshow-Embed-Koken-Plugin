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
		<koken:pulse source="album" filter:id="{$attributes['album']}" jsvar="pulse{$slideUnique}" group="albums-{$slideUnique}" next="#sldshw-next{$slideUnique}" previous="#sldshw-prev{$slideUnique}" toggle="#sldshw-play{$slideUnique}" link_to="advance" autostart="false" />
	</div>
	<ul class="nav-content">
		<li>
			<a href="#" id="sldshw-prev{$slideUnique}" class="sldshw-prev" title="{{ language.previous }}" data-bind-to-key="left">&larr;&nbsp;{{ language.previous }}</a>
		</li>
		<li>
			<a href="#" id="sldshw-play{$slideUnique}" class="sldshw-play" title="Toggle" data-bind-to-key="space">Loading</a>
		</li>
		<li>
			<a href="#" id="sldshw-next{$slideUnique}" class="sldshw-next" title="{{ language.next }}" data-bind-to-key="right">{{ language.next }}&nbsp;&rarr;</a>
		</li>
	</ul>
	<div class="text-content">
		<a href="#" id="content-link{$slideUnique}" title="">
			<h1 id="content-title{$slideUnique}" class="content-title">&nbsp;</h1>
		</a>
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
				title.html( '&nbsp;' );
			}
			link.attr("title", data.title );			
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