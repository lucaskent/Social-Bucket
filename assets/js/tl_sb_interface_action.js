let socialId='', tl_sb_type, formattedJson={}, parentObject=null, socialType=null, previewArea='';
(function($){	
	//Onload effects
	$(document).ready(function(){
		var tl_sb_form=$('.tl-sb-form');
		socialType=$('.tl-sb-social-text.active').data('name');
		socialId=$('.tl-sb-social-text.active').data('id');			
		let deformattedJson=$('#tl-prev-obj-value').val();
			if(deformattedJson.trim().length>0){
			   // console.log(typeof deformattedJson);
				formattedJson=JSON.parse(deformattedJson);
			}	
		$('.tl-sb-icon-data').text($('#tl-prev-obj-value').val());
		var activeFormType=tl_sb_form.find('.tl-sb-socialtype.active');
		parentObject=activeFormType;
		previewArea=parentObject.find(".atl-sb-preview-area");
		tl_sb_type='.'+parentObject.data('name');
		$('.tl-sb-table').children().removeClass('active');
		$('.tl-sb-preview-'+socialType).addClass('active');
		/*$('.tl-sb-data-row.active').find('.tl-sb-innertab').each(function(){
			if($(this).html().length>0){
				$(this).show();
			}else{
				$(this).hide();
			}
		});*/
		if(previewArea.find('div').hasClass('tl-sb-icon-head')){
			previewArea.find('h3').hide();
			parentObject.find('.tl-sb-setting-area').show();
		}else{
			previewArea.find('h3').show();
			parentObject.find('.tl-sb-setting-area').hide();
		}	
		//Tagging triology event
		$('.tl-sb-social-type').find('.tl-sb-social-text').on('click', function(){
			if($(this).hasClass('active')){											//If click on the selected tag
				return;																// return nothing and make no action
			}else{	
				$(this).siblings().add(activeFormType).removeClass('active');		//
				$(this).addClass('active');											//
				var tl_sb_template=$(this).data('type');							//
				tl_sb_form.find('.'+tl_sb_template).addClass('active');
				parentObject=tl_sb_form.find('.'+tl_sb_template);
				previewArea=parentObject.find(".atl-sb-preview-area");
				tl_sb_type='.'+tl_sb_template;
				socialType=$(this).data('name');
				$('.tl-sb-table').children().removeClass('active');
				$('.tl-sb-preview-'+socialType).addClass('active');
				/*$('.tl-sb-data-row.active').find('.tl-sb-innertab').each(function(){
					if($(this).html().length>0){
						$(this).show();
					}else{
						$(this).hide();
					}
				});*/
			}
		});
		
		
		$('.add-new-btn-block').on('click', function(){		
			socialType = $('.tl-sb-social-text.active').data('name');
			let href=$(this).find('.tl-sb-anchor-btn').attr('href');
			$(this).find('.tl-sb-anchor-btn').attr('href', href+'&type='+socialType);
		});	
		$('.tl-sb-socialtype').find('.tl-sb-float-text').on('click', function(){
			$(this).siblings().removeClass('active');			
			$(this).addClass('active');
			$('.tl-sb-float-inline').hide();
			$('.tl-sb-float-sidebar').show();
			if($(this).data('type')=='inline'){
				$('.tl-sb-float-inline').show();
				$('.tl-sb-float-sidebar').hide();
			}
		});
		$('.tl-sb-botton-icon').on('click', function(){
			let icon_props={};
			icon_props.previewArea=previewArea;
			icon_props.icon_size=parentObject.find('.tl-sb-follow-icon-size-default').val();
			icon_props.icon_bgShape=parentObject.find('.tl-sb-follow-shape').val();
			icon_props.name=$(this).data('name');
			if($(this).hasClass('no-icon')){
				tl_cb_iconAction.appendIcon(icon_props);
				$(this).removeClass('no-icon');
				$(this).addClass('active');
			}else{
				$(this).addClass('no-icon');
				$(this).removeClass('active');
				tl_cb_iconAction.removeIcon($(this), previewArea);
			}
			if(previewArea.find('div').hasClass('tl-sb-icon-head')){
				previewArea.find('h3').hide();
				parentObject.find('.tl-sb-setting-area').show();
			}else{
				previewArea.find('h3').show();
				parentObject.find('.tl-sb-setting-area').hide();
			}		
		});
		parentObject.find('.tl-sb-follow-icon-size-default').on('change', function(){
			let value=$(this).val(), _this=parentObject.find(".atl-sb-preview-area");
			_this.find('.tl-sb-icon').attr('height', value);
			_this.find('.tl-sb-icon').attr('width', value);
			_this.find('.tl-star').find('img').css('height', value/6+'px');
			tl_cb_iconAction.tl_sb_tempSave($(this).data('save'), value);		
		});
		$(document).on('change', '.tl-sb-follow-icon-bgcolor-hover', function(){
			tl_cb_iconAction.tl_sb_tempSave($(this).data('save'), $(this).val());
		});
		$(document).on('change', '.tl-sb-follow-icon-bgcolor-default', function(){
			let value=$(this).val();
			let target=$(this).closest('.tl-sb-iconLocator').data('name');
			parentObject.find(".atl-sb-preview-area").find('#'+target).find('.tl-sb-bg').css('fill', value);
			tl_cb_iconAction.tl_sb_tempSave($(this).data('save'), value);
		});
		
		$(document).on('change', '.tl-sb-follow-icon-color-hover', function(){
			tl_cb_iconAction.tl_sb_tempSave($(this).data('save'), $(this).val());
		});
		$(document).on('change', '.tl-sb-follow-icon-color-default', function(){
			let value=$(this).val();
			let target=$(this).closest('.tl-sb-iconLocator').data('name');
			parentObject.find(".atl-sb-preview-area").find('#'+target).find('.tl-sb-fg').css('fill', value);
			tl_cb_iconAction.tl_sb_tempSave($(this).data('save'), value);
		});
		parentObject.find('.tl-sb-follow-shape').on('change', function(){
			let body_data, icon, icon_bgColor, bgset, icon_size, icon_bgShape, typeOfIconBG, icon_color;
			body_data=$('.tl-sb-icon-data').text();
			body_data=JSON.parse(body_data);
			icon_bgShape=$(this).val();
			typeOfIconBG=tl_cb_iconAction.typeOfIconBG(icon_bgShape);
			icon_size=parentObject.find('.tl-sb-follow-icon-size-default').val();
			parentObject.find(".atl-sb-preview-area").find('.tl-sb-icon-head').each(function(){
				icon=$(this).data('name');
				icon_bgColor=checkValue(body_data, [socialType], [socialId], ['icons'], [icon], ['bgcolor'], ['bydefault'])||'';
				icon_color=checkValue(body_data, [socialType], [socialId], ['icons'], [icon], ['color'], ['bydefault'])||'#ffffff';
				icon_bgColor=tl_cb_iconAction.defaultIconBg(icon, icon_bgColor);
				bgset=window[typeOfIconBG][icon](icon_size, icon_color, icon_bgColor);
				$(this).find('.tl-sb-icon-wrapper').html(bgset);			
			});
		});
		parentObject.find('.tlsb-placement-key').find('span').on('click', function(){
			if($(this).hasClass('active')) return;
			let data_type	=	$(this).data('type');
			$(this).siblings().removeClass('active');
			$(this).addClass('active');
			$(this).parent().nextAll().hide();
			$(this).closest('.tlsb-placement-wrapper').find('.'+data_type).show();
			
		});
		parentObject.find('.definedslug-opt :radio').on('change', function(){
			$(this).parents('.definedslug').next('.tl-sb-share-customslug').hide();
			if($(this).val()=='customslug'){
				$(this).parents('.definedslug').next('.tl-sb-share-customslug').show();
			}
		});
		$(document).on('change', '.tl-sb-follow-isSticky', function(){
			let block=$(this).closest('.sb-block-value-block').find('.tl-sb-follow-icon-stickyPos');
			block.hide();
			if($(this).is(':checked')){
				block.show();
				//tl_cb_iconAction.tl_sb_tempSave($(this).data('save'), value);
			}
		});
		$(document).on('input', '.tl-sb-icon-url', function(){
			tl_cb_iconAction.tl_sb_tempSave($(this).data('save'), $(this).val());
		});
		$(document).on('click', '.tl-sb-icon-head', function(e){
			e.stopPropagation();
			let icon=$(this).data('name');
			let body_data=$('.tl-sb-icon-data').text();
			 body_data=JSON.parse(body_data);
			 let args={};
			 args.name=icon;
			if(body_data[socialType] && body_data[socialType] && body_data[socialType][socialId] && body_data[socialType][socialId]['icons'][icon]){
				args=(body_data[socialType][socialId]['icons'][icon]);	
				args.name=icon;
			}
			tl_cb_iconAction.openIconSetting(args);
		});
		
		$(document).on('click', '.tl-sb-submit-button', function(){
			let _id=$('.tl-sb-social-text').data('id');
			tl_cb_iconAction.immediateSave();
			let body_data=$('.tl-sb-icon-data').text();
			json_data=JSON.parse(body_data);
			let data={'action': 'tl_sb_ajax_cb_action', 'social_data':json_data};
			$.post(tl_sb_php_data.ajax_uri, data, function(response){
				success();
				setTimeout(function(){success();},2000);
				tl_cb_iconAction.ajaxCallbac();
				setTimeout(function(){window.location.assign('admin.php?page=tl-social-bucket&type='+socialType)},2000);
			});
		});
		$(document).on('click', '#tl_sb_sgroup_delete', function(){
			let _id=$(this).data('id');		
			let data={'action': 'tl_sb_ajax_cb_delete', 'social_id':parseInt(_id), 'socialType':socialType};
			$.post(tl_sb_php_data.ajax_uri, data, function(response) {
				alert('Data has been deleted Sussecfully: ' + response);
				window.location.assign('admin.php?page=tl-social-bucket&type='+socialType);
			});
		});
		$('.atl-sb-preview-area').sortable({
			cursor:'move',
		});
		
		$('.copy-this').unbind('click').on('click', function(){
			theShortcode = $(this).parents('div.tl-sb-shortcode').find('.tl-sb-the-shortcode');
			copyToClipboard(theShortcode);
			$(this).parents('div.tl-sb-shortcode').find('span.copied-to-clipboard').show();
			$(this).parents('div.tl-sb-shortcode').find('span.copied-to-clipboard').fadeOut(3000);
		});
		$(document).on('change', '.tl-sb-follow-addStar', function(){
			let value='', _this, icon_size;
			icon_size=parentObject.find('.tl-sb-follow-icon-size-default').val();
			_this=$(this);
			if(_this.is(':Checked')){
				value='5';				
			}	
			tl_sb_generateIconProperty.tl_generateStar(value, icon_size);
		});
			
		// Only for preview
		 $(document).on('mouseenter', '.tl-sb-icon-head', function(){
			let icon=$(this).data('name');
			let body_data=$('.tl-sb-icon-data').text();
			 body_data=JSON.parse(body_data);
			let icon_color=checkValue(body_data, [socialType], [socialId], ['icons'], [icon], ['color'], ['hover'])||'#ffffff';
			let bg_color=checkValue(body_data, [socialType], [socialId], ['icons'], [icon], ['bgcolor'], ['hover'])||tl_sb_generateIconProperty.onHoverColor(icon, null);
			$(this).find('.tl-sb-bg').each(function(){
				var attr=$(this).attr("style");
				if (typeof attr !== typeof undefined && attr !== false){
					$(this).css('fill', bg_color);
				}
			});		
			$(this).find('.tl-sb-fg').each(function(){
				var attr=$(this).attr("style");
				if (typeof attr !== typeof undefined && attr !== false){
					$(this).css('fill', icon_color);
				}
			});		
		});
		$(document).on('mouseleave', '.tl-sb-icon-head', function(){
			let icon=$(this).data('name');
			let body_data=$('.tl-sb-icon-data').text();
			 body_data=JSON.parse(body_data);
			let icon_color=checkValue(body_data, [socialType], [socialId], ['icons'], [icon], ['color'], ['bydefault'])||'#ffffff';
			let bg_color=checkValue(body_data, [socialType], [socialId], ['icons'], [icon], ['bgcolor'], ['bydefault'])||tl_cb_iconAction.defaultIconBg(icon, null);
			$(this).find('.tl-sb-bg').each(function(){
				var attr=$(this).attr("style");
				if (typeof attr !== typeof undefined && attr !== false) {
					$(this).css('fill', bg_color);
				}
			}); 
			$(this).find('.tl-sb-fg').each(function(){
				var attr=$(this).attr("style");
				if (typeof attr !== typeof undefined && attr !== false){
					$(this).css('fill', icon_color);
				}
			});
		});
		tl_cb_iconAction.createRangeSlider();
		$('.tl-sb-slider').slider();
		$('.tl-sb-value').on('change', function(){
			$(this).siblings('.tl-sb-slider').slider( "option", "value", $(this).val());
		});
	});
})(jQuery);
function copyToClipboard(element) {
	var $temp = jQuery("<input>");
	jQuery("body").append($temp);
	$temp.val(jQuery(element).val()).select();
	document.execCommand('copy');
	$temp.remove();
}

function success(){
  jQuery('.message').toggleClass('comein');
  jQuery('.save-msg').toggleClass('inactive-display');
  jQuery('.check').toggleClass('scaledown');
}

function checkValue(){	
var statickey;
	var argsVal=arguments[0];
	var i=1;
	do{
		argsVal=argsVal[arguments[i]];	
		if(argsVal){
			statickey=argsVal;		
			i++;
		}else{
			statickey=false;		
			i=arguments.length;
			}
	}while(i<arguments.length)
	return statickey;
}