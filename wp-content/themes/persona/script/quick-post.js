//////////////////////////////////////////////////////
// Persona Quick Post
//////////////////////////////////////////////////////

jQuery(document).ready(function($) {

	//////////////////////////////////////////////////////
	// New Status
	//////////////////////////////////////////////////////

	$('body').on('keydown', function(e){
		
		var key = (e.keyCode ? e.keyCode : e.which);

		if ($(e.target).is('input, textarea')) {
			return;
		}

		if (key == 78){
			e.preventDefault();
			if($('body').hasClass('quick-status-active')){
				return;
			}
			$('body').addClass('quick-status-active');
			var $popup = $('#new-status-popup');
			$('body').prepend('<div class="persona-overlay"></div>');
			$popup.addClass('show');
			$popup.children('textarea').focus();
		}

	});

	$('body').on('click', '.new-post-popup a.close.enable, div.persona-overlay.close', function(e){
		e.preventDefault();
		$('body').removeClass('quick-status-active');
		$('#new-status-popup').addClass('hide');
		setTimeout(function(){ $('.persona-overlay').remove(); $('#new-status-popup').removeClass('hide show');}, 300);
	});

	$('body').on('click', '.new-post-popup a.close, div.persona-overlay', function(e){
		e.preventDefault();
	});


	$('#new-status-popup input.status-title, #new-status-popup textarea.new-status').on('input', function(){
		var title  = $('#new-status-popup input.status-title').val();
		var status = $('#new-status-popup textarea.new-status').val();

		if (title == '' || status == ''){
			$('#new-status-popup a.submit').removeClass('enable').addClass('disable');
		} else {
			$('#new-status-popup a.submit').removeClass('disable').addClass('enable');
		}
	});

	$('body').on('click', '#new-status-popup a.submit.disable', function(e){
		e.preventDefault();
	});

	$('body').on('click', '#new-status-popup a.submit.enable', function(e){
		e.preventDefault();
		var $this   = $(this);
		var $title  = $this.siblings('input.status-title');
		var $status = $this.siblings('textarea.new-status');
		var $close  = $('#new-status-popup a.close.enable');

		var title   = $title.val();
		var status  = $status.val();

		$close.removeClass('enable');
		$title.attr('disabled', 'disabled');
		$status.attr('disabled', 'disabled');

		$this.removeClass('enable');
		$title.addClass('loading');

		if (title != '' && status != ''){
			$.ajax({
				type: 'POST',
				dataType: 'json',
				url: persona_quick.ajaxurl,
				data: { 'action': 'persona_new_status_post', 
						'post_title': title,
						'post_content': status,
						'security': persona_quick.nonce },
				success: function(data){
					$title.val($title.data('value')).removeClass('loading').removeAttr('disabled');
					setTimeout(function(){ $status.val('').removeAttr('disabled');  }, 400);
					$this.addClass('disable');
					$close.addClass('enable').trigger('click');
				}
			});
		}

	});

	//////////////////////////////////////////////////////
	// Background Pattern
	//////////////////////////////////////////////////////

	$('#background-pattern-picker li a').on('click', function(e){
		e.preventDefault();
		$this = $(this);
		$this.addClass('selected').parent().siblings().children().removeClass('selected');
		$('body').css('background-image', 'url(' + $this.data('location') + ')');
		$('#background-pattern-picker .save-pattern.disabled').removeClass('disabled').addClass('enabled');
	});

	$('li#wp-admin-bar-persona-background-pattern .ab-item').on('hover', function(){
		var $patternList = $('div#background-pattern-picker').find('li');
		$.each($patternList.children('a'), function() {
			$(this).css('background-image', 'url(' + $(this).data('location') + ')');
		});
	});

	$('#background-pattern-picker').on('click', '.save-pattern.disabled', function(e){
		e.preventDefault();
	});

	$('#background-pattern-picker').on('click', '.save-pattern.enabled', function(e){
		e.preventDefault();

		$(this).removeClass('enabled').addClass('disabled');

		$.ajax({
			type: 'POST',
			dataType: 'json',
			url: persona_quick.ajaxurl,
			data: { 'action': 'persona_background_pattern', 
					'background_pattern': $('#background-pattern-picker li a.selected').data('id'),
					'security': persona_quick.nonce }
		});
	});

});