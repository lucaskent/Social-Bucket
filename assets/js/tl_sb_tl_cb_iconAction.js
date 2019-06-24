var tl_cb_iconAction=(function($){
	return{
		appendIcon:function(_this){
			this.callbackForAppending(_this);
			this.openIconSetting(_this);
		},
		callbackForAppending:function(args){
			 let icon, background, icon_size, icon_color, icon_bgColor, icon_bgShape, iconType, starVal, iconhtml, iconDisplay;
			 if($('#tl-sb-follow-addStar').is(':Checked')){
				 starVal='5';
			 }
			 iconType=args.name?args.name:'facebook';
			 icon_size=args.icon_size?args.icon_size:40;
			 icon_bgShape=args.icon_bgShape?args.icon_bgShape:'circle';
			 background=this.typeOfIconBG(icon_bgShape);			 
			 icon_color=args.icon_color?args.icon_color:'#ffffff';
			 switch(iconType){
				case 'facebook':
				icon_bgColor=args.icon_bgColor?args.icon_bgColor:'#4267b2';
				icon=window[background].facebook(icon_size, icon_color, icon_bgColor);
				iconDisplay='Facebook';
				break;
				case 'twitter':
				icon_bgColor=args.icon_bgColor?args.icon_bgColor:'#38A1F3';				
				icon=window[background].twitter(icon_size, icon_color, icon_bgColor);
				iconDisplay='Twitter';				
				break;
				case 'linkedin':
				icon_bgColor=args.icon_bgColor?args.icon_bgColor:'#0077B5';
				icon=window[background].linkedin(icon_size, icon_color, icon_bgColor);	
				iconDisplay='Linkedin';
				break;
				case 'pinterest':
				icon_bgColor=args.icon_bgColor?args.icon_bgColor:'#BD081C';				
				icon=window[background].pinterest(icon_size, icon_color, icon_bgColor);	
				iconDisplay='Pinterest';
				break;
				case 'instagram':
				icon_bgColor=args.icon_bgColor?args.icon_bgColor:'#e4405f';				
				icon=window[background].instagram(icon_size, icon_color, icon_bgColor);	
				iconDisplay='Instagram';
				break;
				case 'youtube':
				icon_bgColor=args.icon_bgColor?args.icon_bgColor:'#cd201f';				
				icon=window[background].youtube(icon_size, icon_color, icon_bgColor);	
				iconDisplay='You Tube';
				break;
				case 'googlemybusiness':
				icon_bgColor=args.icon_bgColor?args.icon_bgColor:'#B2B3B5';				
				icon=window[background].googlemybusiness(icon_size, icon_color, icon_bgColor);	
				iconDisplay='Google My Business';
				break;
				case 'yelp':
				icon_bgColor=args.icon_bgColor?args.icon_bgColor:'#af0606';				
				icon=window[background].yelp(icon_size, icon_color, icon_bgColor);	
				iconDisplay='Yelp';
				break;
				case 'tumblr':
				icon_bgColor=args.icon_bgColor?args.icon_bgColor:'#44546A';				
				icon=window[background].tumblr(icon_size, icon_color, icon_bgColor);	
				iconDisplay='Tumblr';				
				break;
				case 'buffer':
				icon_bgColor=args.icon_bgColor?args.icon_bgColor:'#168EEA';				
				icon=window[background].buffer(icon_size, icon_color, icon_bgColor);	
				iconDisplay='Buffer';
				break;
				case 'whatsapp':
				icon_bgColor=args.icon_bgColor?args.icon_bgColor:'#0CB742';				
				icon=window[background].whatsapp(icon_size, icon_color, icon_bgColor);	
				iconDisplay='whatsApp';
				break;
				case 'reddit':
				icon_bgColor=args.icon_bgColor?args.icon_bgColor:'#FF4500';				
				icon=window[background].reddit(icon_size, icon_color, icon_bgColor);	
				iconDisplay='Reddit';
				break;
			}
				
				let settingsarea=$('.tl-sb-setting-area').find('.tl-sb-icon-name-list');
				
				$('<div class="tl-sb-icon-head" id="tl_sb_fe_'+iconType+'" data-name="'+iconType+'" data-save="'+socialType+'>'+socialId+'>icons>'+iconType+'>content"><div class="tl-sb-icon-wrapper">'+icon+'</div><div class="starwrap"></div></div>').appendTo(args.previewArea);
				
				$('<li class="tl-sb-icon-head pg-icon-'+iconType+'" id="tl_sb_fe_'+iconType+'" data-name="'+iconType+'" data-save="'+socialType+'>'+socialId+'>icons>'+iconType+'>content">'+iconDisplay+'</li>').appendTo(settingsarea); 
				tl_sb_generateIconProperty.tl_generateStar(starVal, icon_size);
				
		},
		iconDisplayName:function(iconType){
			let iconDisplay;
			switch(iconType){
				case 'facebook':
				iconDisplay='Facebook';
				break;
				case 'twitter':
				iconDisplay='Twitter';				
				break;
				case 'linkedin':
				iconDisplay='Linkedin';
				break;
				case 'pinterest':
				iconDisplay='Pinterest';
				break;
				case 'instagram':
				iconDisplay='Instagram';
				break;
				case 'youtube':	
				iconDisplay='You Tube';
				break;
				case 'googlemybusiness':
				iconDisplay='Google My Business';
				break;
				case 'yelp':					
				iconDisplay='Yelp';
				break;
				case 'tumblr':
				iconDisplay='Tumblr';
				break;
				case 'buffer':
				iconDisplay='Buffer';
				break;
				case 'whatsapp':
				iconDisplay='whatsApp';
				break;
				case 'reddit':
				iconDisplay='Reddit';
				break;
			}
			return iconDisplay;
		},
		typeOfIconBG:function(icon_bgShape){
			let background;
			switch(icon_bgShape){
				case 'Circle':
				background='tl_sb_circle';
				break;
				case 'Square':
				background='tl_sb_square';
				break;
				case 'Rounded Square':
				background='tl_sb_roundedsquare';
				break;
				case 'Rectangle':
				background='tl_sb_circle';
				break;
				case 'Rounded Rectangle':
				background='tl_sb_circle';
				break;
				case 'Oval':
				background='tl_sb_circle';
				break;
				case 'Hexagon':
				background='tl_sb_hexagon';
				break;
				case 'Solid Home':
				background='tl_sb_circle';
				break;
				case 'Transparent Circle':
				background='tl_sb_circle';
				break;
				case 'Transparent Home':
				background='tl_sb_circle';
				break;
				case 'Circle Border':
				background='tl_sb_circle';
				break;
				default:
				background='tl_sb_circle';				
				break;
			}			
			return background;
		},
		defaultIconBg:function(iconname, args){
			let icon_bgColor;
			 switch(iconname){
				case 'facebook':
				icon_bgColor=args?args:'#4267b2';
				break;
				case 'twitter':
				icon_bgColor=args?args:'#38A1F3';
				break;
				case 'linkedin':
				icon_bgColor=args?args:'#0077B5';
				break;
				case 'pinterest':
				icon_bgColor=args?args:'#BD081C';
				break;
				case 'instagram':
				icon_bgColor=args?args:'#e4405f';
				break;
				case 'youtube':
				icon_bgColor=args?args:'#cd201f';
				break;
				case 'googlemybusiness':
				icon_bgColor=args?args:'#B2B3B5';
				break;
				case 'yelp':
				icon_bgColor=args?args:'#af0606';
				break;
				case 'tumblr':
				icon_bgColor=args?args:'#44546A';
				break;
				case 'buffer':
				icon_bgColor=args?args:'#168EEA';
				break;
				case 'whatsapp':
				icon_bgColor=args?args:'#0CB742';
				break;
				case 'reddit':
				icon_bgColor=args?args:'#FF4500';
				break;
			}
			return icon_bgColor;
		},
		removeIcon:function(_this, previewArea){
			let iconType=_this.data('name');
			let settingsarea=$('.tl-sb-setting-area').find('.tl-sb-icon-name-list');
			previewArea.find('.tl-sb-icon-head').each(function(e){
				if($(this).data('name')==iconType){
					$(this).remove();
				}
			});
			settingsarea.find('.tl-sb-icon-head').each(function(e){
				if($(this).data('name')==iconType){
					$(this).remove();
				}
			});
		},
		attachColorPicker: function(oldValue){
			oldValue = oldValue?oldValue:'';
			let color_fields = $('.tl-colorpicker');
			for(var i=0; i<color_fields.length; i++){
				$(color_fields[i]).spectrum({
					color: oldValue,
					showInput: true,
					showAlpha:true,
					allowEmpty: true,
					className: "full-spectrum",
					showInitial: true,
					showPalette: true,
					showSelectionPalette: true,
					maxSelectionSize: 20,
					preferredFormat: "hex",
					showButtons: false,
					move: function (color){
						if(color){
							let ele = color._originalInput.ele;
							ele.val(color).change();
						}
					},
					change: function(color){
						$(color_fields[i]).val(color).change();
					},
					palette: ['rgb(26, 188, 156)', 'rgb(46, 204, 113)', 'rgb(52, 152, 219)', 'rgb(155, 89, 182)', 'rgb(52, 73, 94)', 'rgb(22, 160, 133)', 'rgb(39, 174, 96)', 'rgb(41, 128, 185)', 'rgb(142, 68, 173)', 'rgb(44, 62, 80)', 'rgb(241, 196, 15)', 'rgb(230, 126, 34)', 'rgb(231, 76, 60)', 'rgb(236, 240, 241)', 'rgb(149, 165, 166)', 'rgb(243, 156, 18)', 'rgb(211, 84, 0)', 'rgb(192, 57, 43)', 'rgb(189, 195, 199)', 'rgb(127, 140, 141)', 'rgb(0,0,0)', 'rgb(68,68,68)' ]
				});
			}
		},
		openIconSetting:function(args){
			let iconurl, icon, iconname, iconcolordefault, iconcoloronhover, iconbg, iconbgonHover, html;
			this.saveSetting();
			 iconurl				=	args && args.url?args.url:'';
			 icon				=	args && args.icon?args.icon:'';
			 iconname			=	args && args.name?args.name:'iconname';
			 iconDisplayName	=	this.iconDisplayName(iconname);
			 iconcolordefault	=	args && args.color && args.color.bydefault?args.color.bydefault:'#ffffff';
			 iconcoloronhover	=	args && args.color && args.color.hover?args.color.hover:'#ffffff';
			 iconbg				=	args && args.bgcolor && args.bgcolor.bydefault?args.bgcolor.bydefault:this.defaultIconBg(iconname, null);
			 iconbgonHover		=	args && args.bgcolor && args.bgcolor.hover?args.bgcolor.hover:tl_sb_generateIconProperty.onHoverColor(iconname, null);
			 html				=	'';
			
			$('.tl-sb-preview-area').find('.tl-sb-icon-head').each(function(){
				
				if($(this).data('name')==iconname){
					$(this).addClass('active');
				}else{
					$(this).removeClass('active');
				}
			});
			$('.tl-sb-setting-area').find('.tl-sb-icon-head').each(function(){
				
				if($(this).data('name')==iconname){
					$(this).addClass('active');
				}else{
					$(this).removeClass('active');
				}
			});
			if(socialType=='share'){
			html+='<div class="tl-sb-setting-area-d">'+
					'<div class="tl-sb-iconLocator" data-name="tl_sb_fe_'+iconname+'">'+					
						'<div class="sb-row-block">'+
							'<div class="tl-sb-col sb-block-left"><label>'+iconDisplayName+'\'s Color:</label></div>'+
							'<div class="tl-sb-col sb-block-right">'+
								'<div class="sb-block-value">'+
									'<div class="sb-block-value-label">'+
										'<span>Default</span>'+
									'</div>'+
									'<div class="sb-block-value-block">'+
										'<input class="tl-sb-follow-icon-color-default tl-colorpicker tl-color-input tl-ice" type="text" value="'+iconcolordefault+'" style="display: none;" data-save="'+socialType+'>'+socialId+'>icons>'+iconname+'>color>bydefault">'+
									'</div>'+
								'</div>'+
								'<div class="sb-block-value">'+
									'<div class="sb-block-value-label">'+
										'<span>Hover</span>'+
									'</div>'+
									'<div class="sb-block-value-block">'+
										'<div class="tl-control-field-inputwrap color-input">'+
											'<input class="tl-sb-follow-icon-color-hover tl-colorpicker tl-color-input tl-ice" type="text" value="'+iconcoloronhover+'" style="display: none;" data-save="'+socialType+'>'+socialId+'>icons>'+iconname+'>color>hover">'+
										'</div>'+
									'</div>'+
								'</div>'+
							'</div>'+
						'</div>'+
						'<div class="sb-row-block">'+
							'<div class="tl-sb-col sb-block-left"><label>'+iconDisplayName+'\'s Background Color:</label></div>'+
							'<div class="tl-sb-col sb-block-right">'+
								'<div class="sb-block-value">'+
									'<div class="sb-block-value-label">'+
										'<span>Default</span><br>'+									
									'</div>'+
									'<div class="sb-block-value-block">	'+													
										'<input class="tl-sb-follow-icon-bgcolor-default tl-colorpicker tl-color-input tl-ice" type="text" value="'+iconbg+'" style="display: none;" data-save="'+socialType+'>'+socialId+'>icons>'+iconname+'>bgcolor>bydefault">'+
									'</div>'+
								'</div>'+
								'<div class="sb-block-value">'+
									'<div class="sb-block-value-label">'+
										'<span>On Hover</span>'+
									'</div>'+
									'<div class="sb-block-value-block">'+
										'<input class="tl-sb-follow-icon-bgcolor-hover tl-colorpicker tl-color-input tl-ice" type="text" value="'+iconbgonHover+'" style="display: none;" data-save="'+socialType+'>'+socialId+'>icons>'+iconname+'>bgcolor>hover">'+
									'</div>'+
								'</div>'+
							'</div>'+
						'</div>'+
					'</div>'+
				'</div>';
			}else{
				html+='<div class="tl-sb-setting-area-d">'+
						'<div class="tl-sb-iconLocator" data-name="tl_sb_fe_'+iconname+'">'+
							'<div class="sb-row-block">'+
								'<div class="tl-sb-col sb-block-left"><label>'+iconDisplayName+'\'s Url:</label></div>'+
								'<div class="tl-sb-col sb-block-right">'+
									'<div class="sb-block-value">'+
										'<div class="sb-block-value-block">'+
											'<div class="tl-control-field-inputwrap color-input">'+
												'<input class="tl-sb-icon-url tl-sb-setting-'+iconname+'" type="textarea" row="1" cols="50" value="'+iconurl+'" data-save="'+socialType+'>'+socialId+'>icons>'+iconname+'>url"></textarea>'+
											'</div>'+
										'</div>'+
									'</div>'+
								'</div>'+
							'</div>'+
							'<div class="sb-row-block">'+
								'<div class="tl-sb-col sb-block-left"><label>'+iconDisplayName+'\'s Color:</label></div>'+
								'<div class="tl-sb-col sb-block-right">'+
									'<div class="sb-block-value">'+
										'<div class="sb-block-value-label">'+
											'<span>Default</span>'+
										'</div>'+
										'<div class="sb-block-value-block">'+
											'<input class="tl-sb-follow-icon-color-default tl-colorpicker tl-color-input tl-ice" type="text" value="'+iconcolordefault+'" style="display: none;" data-save="'+socialType+'>'+socialId+'>icons>'+iconname+'>color>bydefault">'+
										'</div>'+
									'</div>'+
									'<div class="sb-block-value">'+
										'<div class="sb-block-value-label">'+
											'<span>Hover</span>'+
										'</div>'+
										'<div class="sb-block-value-block">'+
											'<div class="tl-control-field-inputwrap color-input">'+
												'<input class="tl-sb-follow-icon-color-hover tl-colorpicker tl-color-input tl-ice" type="text" value="'+iconcoloronhover+'" style="display: none;" data-save="'+socialType+'>'+socialId+'>icons>'+iconname+'>color>hover">'+
											'</div>'+
										'</div>'+
									'</div>'+
								'</div>'+
							'</div>'+
							'<div class="sb-row-block">'+
								'<div class="tl-sb-col sb-block-left"><label>'+iconDisplayName+'\'s Background Color:</label></div>'+
								'<div class="tl-sb-col sb-block-right">'+
									'<div class="sb-block-value">'+
										'<div class="sb-block-value-label">'+
											'<span>Default</span><br>'+									
										'</div>'+
										'<div class="sb-block-value-block">	'+													
											'<input class="tl-sb-follow-icon-bgcolor-default tl-colorpicker tl-color-input tl-ice" type="text" value="'+iconbg+'" style="display: none;" data-save="'+socialType+'>'+socialId+'>icons>'+iconname+'>bgcolor>bydefault">'+
										'</div>'+
									'</div>'+
									'<div class="sb-block-value">'+
										'<div class="sb-block-value-label">'+
											'<span>On Hover</span>'+
										'</div>'+
										'<div class="sb-block-value-block">'+
											'<input class="tl-sb-follow-icon-bgcolor-hover tl-colorpicker tl-color-input tl-ice" type="text" value="'+iconbgonHover+'" style="display: none;" data-save="'+socialType+'>'+socialId+'>icons>'+iconname+'>bgcolor>hover">'+
										'</div>'+
									'</div>'+
								'</div>'+
							'</div>'+
						'</div>'+
					'</div>';
			}
			$('.tl-sb-setting-area').find('.tl-settings-right').html(html);
			this.attachColorPicker();
		},
		savePreviewArea:function(){
			let clonned, _this, tempArr=new Array();			
			parentObject.find('.atl-sb-preview-area').find('.tl-sb-icon-head').each(function(){
				_this = $(this);
				tempArr.push(_this.data('name'));
				clonned = _this.clone(false);
				let p=clonned.wrap('<div></div>').parent().html();
				tl_cb_iconAction.tl_sb_tempSave(_this.data('save'), p);
			});
			this.removeIfNotExist(tempArr);
		},
		removeIfNotExist:function(tempArr){
			let _id, previousArr=[];
			_id=$('.tl-sb-social-text').hasClass('active')?$('.tl-sb-social-text').data('id'):'';
			previousArr=formattedJson[socialType][_id]['icons'];
			for(k in previousArr){
				if(tempArr.indexOf(k) == -1)
				{
					delete formattedJson[socialType][_id]['icons'][k];
				}
			}
		},
		tl_sb_tempSave:function(path, value){
			let ar, selector;
			if(!path || !value){return;}
			ar = path.split('>');
			if(typeof formattedJson == 'undefined') formattedJson = {};
			for(var i=0; i<ar.length; i++){
				switch(i){
					case 0:
						if(typeof formattedJson[ar[0]] == 'undefined')	formattedJson[ar[0]] = {};
						if(i==ar.length-1) {
							if(value.length>0){								
								formattedJson[ar[0]] = value;								
							}else{
								delete formattedJson[ar[0]];								
							}
						}						
						break;
					
					case 1:
						if(typeof formattedJson[ar[0]][ar[1]] == 'undefined')	formattedJson[ar[0]][ar[1]] = {};
						
						if(i==ar.length-1) {
							if(value.length>0){
								formattedJson[ar[0]][ar[1]] = value;								
							}else{
								delete formattedJson[ar[0]][ar[1]];							
							}
						}
						break;
						
					case 2:
						if(typeof formattedJson[ar[0]][ar[1]][ar[2]] == 'undefined')	formattedJson[ar[0]][ar[1]][ar[2]] = {};
						
						if(i==ar.length-1) {
							if(value.length>0){
								formattedJson[ar[0]][ar[1]][ar[2]] = value;								
							}else{
								delete formattedJson[ar[0]][ar[1]][ar[2]];								
							}
						}
						break;
					
					case 3:
						if(typeof formattedJson[ar[0]][ar[1]][ar[2]][ar[3]] == 'undefined')	formattedJson[ar[0]][ar[1]][ar[2]][ar[3]] = {};
						
						if(i==ar.length-1) {							
							if(value.length>0){
								formattedJson[ar[0]][ar[1]][ar[2]][ar[3]] =value;								
							}else{
								delete formattedJson[ar[0]][ar[1]][ar[2]][ar[3]];								
							}
						}
						break;
					
					case 4:
						if(typeof formattedJson[ar[0]][ar[1]][ar[2]][ar[3]][ar[4]] == 'undefined')	formattedJson[ar[0]][ar[1]][ar[2]][ar[3]][ar[4]] = {};
						
						if(i==ar.length-1) {
							if(value.length>0){
								formattedJson[ar[0]][ar[1]][ar[2]][ar[3]][ar[4]] =value;							
							}else{
								delete formattedJson[ar[0]][ar[1]][ar[2]][ar[3]][ar[4]];							
							}
						}
						break;
					case 5:
						if(typeof formattedJson[ar[0]][ar[1]][ar[2]][ar[3]][ar[4]][ar[5]] == 'undefined')	formattedJson[ar[0]][ar[1]][ar[2]][ar[3]][ar[4]][ar[5]] = {};
						
						if(i==ar.length-1){
							if(value.length>0){
								formattedJson[ar[0]][ar[1]][ar[2]][ar[3]][ar[4]][ar[5]] =value;							
							}else{
								delete formattedJson[ar[0]][ar[1]][ar[2]][ar[3]][ar[4]][ar[5]];							
							}
						}
						break;
					case 6:
						if(typeof formattedJson[ar[0]][ar[1]][ar[2]][ar[3]][ar[4]][ar[5]][ar[6]] == 'undefined')	formattedJson[ar[0]][ar[1]][ar[2]][ar[3]][ar[4]][ar[5]][ar[6]] = {};
						
						if(i==ar.length-1){
							if(value.length>0){
								formattedJson[ar[0]][ar[1]][ar[2]][ar[3]][ar[4]][ar[5]][ar[6]] =value;							
							}else{
								delete formattedJson[ar[0]][ar[1]][ar[2]][ar[3]][ar[4]][ar[5]][ar[6]];							
							}
						}
						break;
					case 6:
						if(typeof formattedJson[ar[0]][ar[1]][ar[2]][ar[3]][ar[4]][ar[5]][ar[6]][ar[7]] == 'undefined')	formattedJson[ar[0]][ar[1]][ar[2]][ar[3]][ar[4]][ar[5]][ar[6]][ar[7]] = {};
						
						if(i==ar.length-1){
							if(value.length>0){
								formattedJson[ar[0]][ar[1]][ar[2]][ar[3]][ar[4]][ar[5]][ar[6]][ar[7]] =value;							
							}else{
								delete formattedJson[ar[0]][ar[1]][ar[2]][ar[3]][ar[4]][ar[5]][ar[6]][ar[7]];							
							}
						}
						break;
				}
			}			
		},
		createRangeSlider:function(){
			var args = {};
			var _this = null;
			var range_sliders = $('.tl-sb-slider');
			for(var i=0; i<range_sliders.length; i++){
				_this = $(range_sliders[i]);
				if(_this.data('min')) args.min		= parseInt(_this.data('min'));
				if(_this.data('max')) args.max 		= parseInt(_this.data('max'));
				if(_this.data('step')) args.step 	= parseInt(_this.data('step'));
				if(_this.data('value')) args.value 	= parseInt(_this.data('value'));
				
				args.slide = function(e, u){
					$(e.target).next('.tl-sb-value').val(u.value).change();
				}
				_this.slider(args);	
			}
		},
		
		immediateSave:function(){
			this.savePreviewArea();
			this.tl_sb_tempSave(parentObject.find('.tl-sb-follow-group-name').data('save'), parentObject.find('.tl-sb-follow-group-name').val());
 			this.tl_sb_tempSave(parentObject.find('.tl-sb-follow-icon-size-default').data('save'), parentObject.find('.tl-sb-follow-icon-size-default').val());
			this.tl_sb_tempSave(parentObject.find('.tl-sb-follow-shape').data('save'), parentObject.find('.tl-sb-follow-shape').val());
			this.tl_sb_tempSave(parentObject.find('.tl-sb-follow-isSticky').data('save'), parentObject.find('.tl-sb-follow-isSticky').is(':checked')?'Checked':false);
			this.tl_sb_tempSave(parentObject.find('.tl-sb-follow-icon-stickyPos').data('save'), parentObject.find('.tl-sb-follow-icon-stickyPos').val());
			this.tl_sb_tempSave(parentObject.find('.tl-sb-icon-link-open-tab').data('save'), parentObject.find('.tl-sb-icon-link-open-tab').val());
			this.tl_sb_tempSave(parentObject.find('.tl-sb-follow-addStar').data('save'), parentObject.find('.tl-sb-follow-addStar').is(':checked')?'Checked':false);
			this.tl_sb_tempSave(parentObject.find('.tl-sb-icon-padding').data('save'), parentObject.find('.tl-sb-icon-padding').val());
			this.tl_sb_tempSave(parentObject.find('.definedslug').data('save'), parentObject.find('.definedslug').find('input:checked').val());
			this.tl_sb_tempSave(parentObject.find('.tl-sb-share-customslug').data('save'), parentObject.find('.tl-sb-share-customslug').val());
			tl_sb_generateIconProperty.sortingOrder(socialType+'>'+socialId+'>settings>ordering');
			tl_sb_generateIconProperty.sharePlacement();
			this.saveSetting();
		},
		saveSetting:function(){
			$('.tl-sb-icon-data').text(JSON.stringify(formattedJson));
		},
		ajaxCallbac:function(){
			formattedJson=null;
			$('.tl-sb-icon-data').text('');
			$('#tl-prev-obj-value').val('');
		},
	}
})(jQuery);
