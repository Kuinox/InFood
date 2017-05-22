var error=false;
function is_PC()
	{
	if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent))
		{
		return false
	}
	else
		{
		return true
	}
}
function is_int(value)
	{
	if((parseFloat(value)==parseInt(value,10))&&!isNaN(value))
		{
		return true
	}
	else
		{
		return false
	}
}
function valid_email(eml)
	{ /*
	var re=/^(([^<>()[\]\\.,;
	:\s@\"]+(\.[^<>()[\]\\.,;
	:\s@\"]+)*)|(\".+\"))@((\[[0-9]*/
		{
		1,3
	}
	\.[0-9]
		{
		1,3
	}
	\.[0-9]
		{
		1,3
	}
	\.[0-9]
		{
		1,3
	}
	\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]
		{
		2,
	}
	))$/;
	if(re.test(eml))
		{
		return false
	}
	else
		{
		return true
	}
}
function d2h(d)
	{
	return d.toString(16)
}
function h2d(h)
	{
	return parseInt(h,16)
}
function stringToHex(tmp)
	{
	var str='',i=0,tmp_len=tmp.length,c;
	for(;
	i<tmp_len;
	i+=1)
		{
		c=tmp.charCodeAt(i);
		str+=d2h(c)
	}
	return str
}
function hexToString(tmp)
	{
	var arr=tmp.match(/.
		{
		2
	}
	/g),str='',i=0,arr_len=arr.length,c;
	for(;
	i<arr_len;
	i+=1)
		{
		c=String.fromCharCode(h2d(arr[i]));
		str+=c
	}
	return str
}
function TriggeredKey(e)
	{
	e=e||window.event;
	var keycode;
	if(window.event)
		{
		keycode=event.which?window.event.which:window.event.keyCode
	}
	if(!keycode)
		{
		keycode=e.which
	}
	return keycode
}
function detect_anchor(static_id)
	{
	var hash=location.hash.replace('#','');
	if(hash!='')
		{
		var regex_create=new RegExp(static_id+"([0-9]+)$","gi");
		if(regex_create.test(hash))
			{
			var number_comment=hash.replace(regex_create,'$1');
			return number_comment
		}
		return
	}
}
function remove_url_parameter(url,parameter)
	{
	var urlparts=url.split('?');
	if(urlparts.length>=2)
		{
		var prefix=encodeURIComponent(parameter)+'=';
		var pars=urlparts[1].split(/[&;
		]/g);
		for(var i=pars.length;
		i-->0;
		)
			{
			if(pars[i].lastIndexOf(prefix,0)!==-1)
				{
				pars.splice(i,1)
			}
		}
		url=urlparts[0]+(pars.length>0?'?'+pars.join('&'):"");
		return url
	}
	else
		{
		return url
	}
}
function white_header_floating(marge_top_action)
	{
	if(!$('#menu_white_background').length)
		{
		return
	}
	var top=$('#menu_white_background').offset().top-marge_top_action;
	$(window).scroll(function(event)
		{
		var y=$(this).scrollTop();
		if(y>=top)
			{
			var height_menu_white_background=$('#menu_white_background').height();
			$('#menu_white_background').addClass('fixed');
			$('#contener_menu_padding').addClass('fixed');
			$('#contener_plus').addClass('fixed');
			$("#menu_white_background_replace_float").css('height',height_menu_white_background+'px');
			$('#menu_white_background_replace_float').show()
		}
		else
			{
			$('#menu_white_background_replace_float').hide();
			$('#menu_white_background').removeClass('fixed');
			$('#contener_menu_padding').removeClass('fixed');
			$('#contener_plus').removeClass('fixed')
		}
	}
	)
}
function back_to_top()
	{
	var marge_bottom_initial=parseInt($('#back_to_top').css("margin-bottom"),10);
	$(window).on('resize scroll',function()
		{
		var top_to_footer=$('#footer_html').offset().top;
		var y=$(this).scrollTop();
		var scrollBottom=$(this).scrollTop()+$(this).height();
		var base_width=$("#header_black").width();
		var window_width=$(this).width();
		var left_width_rest=(window_width-base_width)/2;
		var back_to_top_width_with_marge=$("#back_to_top").outerWidth(true);
		if(y>1000&&left_width_rest>back_to_top_width_with_marge)
			{
			$("#back_to_top").show();
			if(scrollBottom>top_to_footer)
				{
				var marge_bottom=(scrollBottom-top_to_footer)+marge_bottom_initial;
				$("#back_to_top").css("margin-bottom",marge_bottom+"px")
			}
			else
				{
				$("#back_to_top").css("margin-bottom","30px")
			}
		}
		else
			{
			$("#back_to_top").hide()
		}
	}
	)
}
function following_menu_on_scroll(id_menu_v,id_content_v,ajustement_height,ajustement_margin_top)
	{
	var id_content_div=$(id_content_v);
	var id_menu_div=$(id_menu_v);
	if(!id_menu_div.length||!id_content_div.length)
		{
		return
	}
	var top=id_menu_div.offset().top-ajustement_margin_top;
	$(window).scroll(function(event)
		{
		var height_content_div=id_content_div.height()+ajustement_height;
		var height_menu_div=id_menu_div.height();
		if(height_menu_div<=height_content_div)
			{
			var y=$(this).scrollTop();
			var top_decalage=$(this).scrollTop()-top;
			if($(window).scrollTop()+height_menu_div>id_content_div.offset().top+height_content_div)
				{
				var margin_top=height_content_div-height_menu_div;
				id_menu_div.css('margin-top',margin_top+'px')
			}
			else
				{
				id_menu_div.css('margin-top','auto');
				if(y>=top)
					{
					id_menu_div.css('margin-top',top_decalage+'px')
				}
				else
					{
					id_menu_div.css('margin-top','auto')
				}
			}
		}
	}
	)
}
function switch_display(id_show,id_hide,status,id_comment,id_thread)
	{
	var id_form=0;
	var name_form="report_comment_form_";
	var name_form_mp="report_mp_form_";
	if(status=="show")
		{
		if(id_comment)
			{
			if(id_thread)
				{
				$(id_show+" #comment_id").val(id_comment);
				$(id_show+" #article_id").val(id_thread);
				$(id_show+" form").attr("id",name_form+id_comment);
				$(id_show+" form").attr("name",name_form+id_comment);
				$(id_show+" .bouton_valider_signalement").attr('onclick',"validate_report('"+id_comment+"');
				")
			}
			else
				{
				$(id_show+" #pm_id").val(id_comment);
				$(id_show+" form").attr("id",name_form_mp+id_comment);
				$(id_show+" form").attr("name",name_form_mp+id_comment);
				$(id_show+" .bouton_valider_signalement").attr('onclick',"validate_report_mp('"+id_comment+"');
				")
			}
		}
		$(id_show).addClass("active");
		$('#overlay').css("visibility","visible");
		$('#overlay').css("opacity","1")
	}
	if(status=="hide")
		{
		$(id_hide).removeClass("active");
		$('#overlay').css("visibility","hidden");
		$('#overlay').css("opacity","0")
	}
	if(status=="switch")
		{
		if(id_hide=="#motdepasse_part"||id_show=="#motdepasse_part")
			{
			$(id_show).show();
			$(id_hide).hide()
		}
		else
			{
			$(id_show).addClass("active");
			$(id_hide).removeClass("active")
		}
	}
}
function status_button(e,id_input)
	{
	if($(e).hasClass('yes_part'))
		{
		$('#'+id_input).val(1);
		$(e).addClass('yes');
		$(e).parents().children(".no_part").removeClass('no')
	}
	else if($(e).hasClass('no_part'))
		{
		$('#'+id_input).val(0);
		$(e).addClass('no');
		$(e).parents().children(".yes_part").removeClass('yes')
	}
	auto_check_option_bar_instore()
}
function change_status_button(e)
	{
	if($(e).find("input").val()==1)
		{
		$(e).find("input").val(0);
		$(e).find(".no_part").addClass('no');
		$(e).find(".yes_part").removeClass('yes')
	}
	else if($(e).find("input").val()==0)
		{
		$(e).find("input").val(1);
		$(e).find(".yes_part").addClass('yes');
		$(e).find(".no_part").removeClass('no')
	}
	auto_check_option_bar_instore()
}
function auto_check_option_bar_instore()
	{
	if($("#contener_parametre #instore_deal_status").length&&$("#contener_parametre #instore_deal_status").val()==1)
		{
		$("#bloc_restriction_regionale").css("opacity",1);
		$("#bloc_restriction_regionale > a").attr("onclick","change_status_button(this);
		");
		$("#bloc_restriction_regionale .bouton_contener_border div").css("cursor","pointer");
		if($("#contener_parametre #filter_region").length&&$("#contener_parametre #filter_region").val()==1)
			{
			$("#bloc_region_departement").css("opacity",1);
			$("#bloc_region_departement #button_select_region").attr("onclick","option_bar_list_region_display();
			");
			$("#bloc_region_departement #button_select_region").css("cursor","pointer")
		}
		else if($("#contener_parametre #filter_region").length&&$("#contener_parametre #filter_region").val()==0)
			{
			$("#bloc_region_departement").css("opacity",0.6);
			$("#bloc_region_departement #button_select_region").attr("onclick","");
			$("#bloc_region_departement #button_select_region").css("cursor","default")
		}
	}
	else if($("#contener_parametre #instore_deal_status").length&&$("#contener_parametre #instore_deal_status").val()==0)
		{
		$("#bloc_restriction_regionale").css("opacity",0.6);
		$("#bloc_restriction_regionale > a").attr("onclick","");
		$("#bloc_restriction_regionale .bouton_contener_border div").css("cursor","default");
		$("#bloc_region_departement").css("opacity",0.6);
		$("#bloc_region_departement #button_select_region").attr("onclick","");
		$("#bloc_region_departement #button_select_region").css("cursor","default")
	}
}
function close_div_on_body(array_id_dont_close,id_to_close)
	{
	$('body').click(function(e)
		{
		var target=$(e.target);
		for(var prop in array_id_dont_close)
			{
			if(target.parents().andSelf().is(array_id_dont_close[prop]))
				{
				return
			}
		}
		$(id_to_close).hide()
	}
	)
}
function verif_champs_obligatoire(element)
	{
	if($(element).find("input, textarea").length&&!$.trim($(element).find("input, textarea").val()))
		{
		$(element).addClass('error');
		error=true
	}
	else if($(element).find("input, textarea").length&&$.trim($(element).find("input, textarea").val()))
		{
		$(element).removeClass('error')
	}
}
function get_tube_color_with_temperature(temperature)
	{
	var red=0;
	var green=0;
	var blue=0;
	var color="";
	if(temperature>=0&&temperature<=50)
		{
		red=67;
		green=244;
		blue=67;
		red=red+Math.round((177*temperature)/50);
		color=red+","+green+","+blue
	}
	else if(temperature>50&&temperature<=100)
		{
		red=244;
		green=244;
		blue=67;
		temperature=temperature-50;
		green=green-Math.round((177*temperature)/50);
		color=red+","+green+","+blue
	}
	else if(temperature>100)
		{
		red=244;
		green=67;
		blue=67;
		color=red+","+green+","+blue
	}
	return color
}
has_voted_here=false;
function deal_vote_up_value()
	{
	return 1
}
function deal_vote_down_value()
	{
	return 1
}
function vote_click(page,deal_id,is_new,hot_rank,choice)
	{
	var new_hot_rank=0;
	if(choice=="cold")
		{
		if(page=="deal_details"&&has_voted_here)return;
		new_hot_rank=parseInt(hot_rank-deal_vote_up_value(),10);
		has_voted_here=true
	}
	else if(choice=="hot")
		{
		if(page=="deal_details"&&has_voted_here)return;
		new_hot_rank=parseInt(hot_rank+deal_vote_down_value(),10);
		has_voted_here=true
	}
	else
		{
		new_hot_rank=parseInt(hot_rank,10)
	}
	if(page=="index")
		{
		vote_display_index(deal_id,is_new,new_hot_rank,hot_rank,choice)
	}
	else if(page=="deal_details")
		{
		vote_display_deal_detail(deal_id,is_new,new_hot_rank,hot_rank,choice)
	}
}
function vote_display_index(deal_id,is_new,new_hot_rank,hot_rank,choice)
	{
	if(choice)
		{
		if(new_hot_rank>=0)
			{
			var decoded=$('<div/>').html("&nbsp;
			"+new_hot_rank+"°").text();
			$("#vote_part_"+deal_id+" .temperature_div p").get(0).lastChild.nodeValue=decoded
		}
		else
			{
			$("#vote_part_"+deal_id+" .temperature_div p").get(0).lastChild.nodeValue=new_hot_rank+"°"
		}
	}
	if(!choice&&!is_new)
		{
		$("#vote_part_"+deal_id+" .color_fill").css("height","100%");
		var height_percent=100-hot_rank;
		if(hot_rank>-10&&hot_rank<100)
			{
			$("#vote_part_"+deal_id+" .temperature_div").removeClass("text_color_red");
			$("#vote_part_"+deal_id+" .temperature_div").removeClass("text_color_gele");
			if(hot_rank>=0)
				{
				$("#vote_part_"+deal_id+" .contener_progress_bar").css(
					{
					'background':'#FF7900','background':'-webkit-linear-gradient(#FF7900, #FFB900)','background':'-o-linear-gradient(#FF7900, #FFB900)','background':'-moz-linear-gradient(#FF7900, #FFB900)','background':'-ms-linear-gradient(#FF7900, #FFB900)','background':'-khtml-linear-gradient(#FF7900, #FFB900)','background':'linear-gradient(#FF7900, #FFB900)'
				}
				);
				$("#vote_part_"+deal_id+" .color_fill").animate(
					{
					height:height_percent+"%"
				}
				,"slow")
			}
			else
				{
				$("#vote_part_"+deal_id+" .contener_progress_bar").css("background","#e8e8e8");
				$("#vote_part_"+deal_id+" .color_fill").css("height","0%")
			}
		}
		else if(hot_rank>=100)
			{
			$("#vote_part_"+deal_id+" .temperature_div").addClass("text_color_red");
			$("#vote_part_"+deal_id+" .contener_progress_bar").css(
				{
				'background':'#f44343','background':'-webkit-linear-gradient(#f44343, #FF7900)','background':'-o-linear-gradient(#f44343, #FF7900)','background':'-moz-linear-gradient(#f44343, #FF7900)','background':'-ms-linear-gradient(#f44343, #FF7900)','background':'-khtml-linear-gradient(#f44343, #FF7900)','background':'linear-gradient(#f44343, #FF7900)'
			}
			);
			$("#vote_part_"+deal_id+" .color_fill").css("height","0%")
		}
		else if(hot_rank<=-10)
			{
			$("#vote_part_"+deal_id+" .temperature_div").addClass("text_color_gele");
			$("#vote_part_"+deal_id+" .contener_progress_bar").css(
				{
				'background':'#60C6E6','background':'-webkit-linear-gradient(#60C6E6, #00A9E0)','background':'-o-linear-gradient(#60C6E6, #00A9E0)','background':'-moz-linear-gradient(#60C6E6, #00A9E0)','background':'-ms-linear-gradient(#60C6E6, #00A9E0)','background':'-khtml-linear-gradient(#60C6E6, #00A9E0)','background':'linear-gradient(#60C6E6, #00A9E0)'
			}
			);
			$("#vote_part_"+deal_id+" .color_fill").css("height","0%")
		}
	}
	else if(choice)
		{
		if(is_new)
			{
			$("#vote_part_"+deal_id+" .color_fill").css("height","100%")
		}
		var new_height_percent=100-new_hot_rank;
		if(new_hot_rank>-10&&new_hot_rank<100)
			{
			$("#vote_part_"+deal_id+" .temperature_div").removeClass("text_color_red");
			$("#vote_part_"+deal_id+" .temperature_div").removeClass("text_color_gele");
			if(new_hot_rank==0)
				{
				$("#vote_part_"+deal_id+" .contener_progress_bar").css(
					{
					'background':'#FF7900','background':'-webkit-linear-gradient(#FF7900, #FFB900)','background':'-o-linear-gradient(#FF7900, #FFB900)','background':'-moz-linear-gradient(#FF7900, #FFB900)','background':'-ms-linear-gradient(#FF7900, #FFB900)','background':'-khtml-linear-gradient(#FF7900, #FFB900)','background':'linear-gradient(#FF7900, #FFB900)'
				}
				);
				$("#vote_part_"+deal_id+" .color_fill").css("height","100%")
			}
			else if(new_hot_rank>0)
				{
				$("#vote_part_"+deal_id+" .contener_progress_bar").css(
					{
					'background':'#FF7900','background':'-webkit-linear-gradient(#FF7900, #FFB900)','background':'-o-linear-gradient(#FF7900, #FFB900)','background':'-moz-linear-gradient(#FF7900, #FFB900)','background':'-ms-linear-gradient(#FF7900, #FFB900)','background':'-khtml-linear-gradient(#FF7900, #FFB900)','background':'linear-gradient(#FF7900, #FFB900)'
				}
				);
				$("#vote_part_"+deal_id+" .color_fill").animate(
					{
					height:new_height_percent+"%"
				}
				,"fast")
			}
			else
				{
				$("#vote_part_"+deal_id+" .contener_progress_bar").css("background","#e8e8e8");
				$("#vote_part_"+deal_id+" .color_fill").css("height","0%")
			}
		}
		else if(new_hot_rank>=100)
			{
			$("#vote_part_"+deal_id+" .temperature_div").addClass("text_color_red");
			$("#vote_part_"+deal_id+" .contener_progress_bar").css(
				{
				'background':'#f44343','background':'-webkit-linear-gradient(#f44343, #FF7900)','background':'-o-linear-gradient(#f44343, #FF7900)','background':'-moz-linear-gradient(#f44343, #FF7900)','background':'-ms-linear-gradient(#f44343, #FF7900)','background':'-khtml-linear-gradient(#f44343, #FF7900)','background':'linear-gradient(#f44343, #FF7900)'
			}
			);
			$("#vote_part_"+deal_id+" .color_fill").css("height","0%")
		}
		else if(new_hot_rank<=-10)
			{
			$("#vote_part_"+deal_id+" .temperature_div").addClass("text_color_gele");
			$("#vote_part_"+deal_id+" .contener_progress_bar").css(
				{
				'background':'#60C6E6','background':'-webkit-linear-gradient(#60C6E6, #00A9E0)','background':'-o-linear-gradient(#60C6E6, #00A9E0)','background':'-moz-linear-gradient(#60C6E6, #00A9E0)','background':'-ms-linear-gradient(#60C6E6, #00A9E0)','background':'-khtml-linear-gradient(#60C6E6, #00A9E0)','background':'linear-gradient(#60C6E6, #00A9E0)'
			}
			);
			$("#vote_part_"+deal_id+" .color_fill").css("height","0%")
		}
		$("#vote_part_"+deal_id+" .vote_button").attr("onclick","");
		if(choice=="hot")
			{
			$("#vote_part_"+deal_id+" .up").addClass("voted");
			$("#vote_part_"+deal_id+" .down").addClass("blocked")
		}
		else if(choice=="cold")
			{
			$("#vote_part_"+deal_id+" .up").addClass("blocked");
			$("#vote_part_"+deal_id+" .down").addClass("voted")
		}
	}
	if(choice)
		{
		vote_ajax(deal_id,choice)
	}
}
function vote_display_deal_detail(deal_id,is_new,new_hot_rank,hot_rank,choice)
	{
	if(choice)
		{
		if(new_hot_rank>=0)
			{
			var decoded=$('<div/>').html("&nbsp;
			"+new_hot_rank+"°").text();
			$(".vote_div_deal_index .temperature_div p").get(0).lastChild.nodeValue=decoded
		}
		else
			{
			$(".vote_div_deal_index .temperature_div p").get(0).lastChild.nodeValue=new_hot_rank+"°"
		}
		$("#floatant_title .title_part .degre").text(new_hot_rank+"°")
	}
	if(!choice&&!is_new)
		{
		$(".vote_div_deal_index .color_fill").css("height","100%");
		var height_percent=100-hot_rank;
		if(hot_rank>-10&&hot_rank<100)
			{
			$("#floatant_title .title_part .degre").removeClass("text_color_red");
			$("#floatant_title .title_part .degre").removeClass("text_color_gele");
			$(".vote_div_deal_index .temperature_div").removeClass("text_color_red");
			$(".vote_div_deal_index .temperature_div").removeClass("text_color_gele");
			if(hot_rank>=0)
				{
				if(hot_rank>=0)
					{
					$("#vote_part_"+deal_id+" .contener_progress_bar").css(
						{
						'background':'#FF7900','background':'-webkit-linear-gradient(#FF7900, #FFB900)','background':'-o-linear-gradient(#FF7900, #FFB900)','background':'-moz-linear-gradient(#FF7900, #FFB900)','background':'-ms-linear-gradient(#FF7900, #FFB900)','background':'-khtml-linear-gradient(#FF7900, #FFB900)','background':'linear-gradient(#FF7900, #FFB900)'
					}
					);
					$("#vote_part_"+deal_id+" .color_fill").animate(
						{
						height:height_percent+"%"
					}
					,"slow")
				}
				else
					{
					$("#vote_part_"+deal_id+" .contener_progress_bar").css("background","#e8e8e8");
					$("#vote_part_"+deal_id+" .color_fill").css("height","0%")
				}
			}
			else
				{
				$(".vote_div_deal_index .contener_progress_bar").css("background","#dadada");
				$(".vote_div_deal_index .color_fill").css("height","0%")
			}
		}
		else if(hot_rank>=100)
			{
			$("#floatant_title .title_part .degre").addClass("text_color_red");
			$(".vote_div_deal_index .temperature_div").addClass("text_color_red");
			$("#vote_part_"+deal_id+" .temperature_div").addClass("text_color_red");
			$("#vote_part_"+deal_id+" .contener_progress_bar").css(
				{
				'background':'#f44343','background':'-webkit-linear-gradient(#f44343, #FF7900)','background':'-o-linear-gradient(#f44343, #FF7900)','background':'-moz-linear-gradient(#f44343, #FF7900)','background':'-ms-linear-gradient(#f44343, #FF7900)','background':'-khtml-linear-gradient(#f44343, #FF7900)','background':'linear-gradient(#f44343, #FF7900)'
			}
			);
			$("#vote_part_"+deal_id+" .color_fill").css("height","0%")
		}
		else if(hot_rank<=-10)
			{
			$("#floatant_title .title_part .degre").addClass("text_color_gele");
			$(".vote_div_deal_index .temperature_div").addClass("text_color_gele");
			$("#vote_part_"+deal_id+" .contener_progress_bar").css(
				{
				'background':'#60C6E6','background':'-webkit-linear-gradient(#60C6E6, #00A9E0)','background':'-o-linear-gradient(#60C6E6, #00A9E0)','background':'-moz-linear-gradient(#60C6E6, #00A9E0)','background':'-ms-linear-gradient(#60C6E6, #00A9E0)','background':'-khtml-linear-gradient(#60C6E6, #00A9E0)','background':'linear-gradient(#60C6E6, #00A9E0)'
			}
			);
			$("#vote_part_"+deal_id+" .color_fill").css("height","0%")
		}
	}
	else if(choice)
		{
		if(is_new)
			{
			$("#vote_part_"+deal_id+" .color_fill").css("height","100%")
		}
		var new_height_percent=100-new_hot_rank;
		if(new_hot_rank>-10&&new_hot_rank<100)
			{
			$("#floatant_title .title_part .degre").removeClass("text_color_red");
			$("#floatant_title .title_part .degre").removeClass("text_color_gele");
			$(".vote_div_deal_index .temperature_div").removeClass("text_color_red");
			$(".vote_div_deal_index .temperature_div").removeClass("text_color_gele");
			if(new_hot_rank==0)
				{
				$("#vote_part_"+deal_id+" .contener_progress_bar").css(
					{
					'background':'#FF7900','background':'-webkit-linear-gradient(#FF7900, #FFB900)','background':'-o-linear-gradient(#FF7900, #FFB900)','background':'-moz-linear-gradient(#FF7900, #FFB900)','background':'-ms-linear-gradient(#FF7900, #FFB900)','background':'-khtml-linear-gradient(#FF7900, #FFB900)','background':'linear-gradient(#FF7900, #FFB900)'
				}
				);
				$("#vote_part_"+deal_id+" .color_fill").css("height","100%")
			}
			else if(new_hot_rank>0)
				{
				$("#vote_part_"+deal_id+" .contener_progress_bar").css(
					{
					'background':'#FF7900','background':'-webkit-linear-gradient(#FF7900, #FFB900)','background':'-o-linear-gradient(#FF7900, #FFB900)','background':'-moz-linear-gradient(#FF7900, #FFB900)','background':'-ms-linear-gradient(#FF7900, #FFB900)','background':'-khtml-linear-gradient(#FF7900, #FFB900)','background':'linear-gradient(#FF7900, #FFB900)'
				}
				);
				$("#vote_part_"+deal_id+" .color_fill").animate(
					{
					height:new_height_percent+"%"
				}
				,"fast")
			}
			else
				{
				$("#vote_part_"+deal_id+" .contener_progress_bar").css("background","#e8e8e8");
				$("#vote_part_"+deal_id+" .color_fill").css("height","0%")
			}
		}
		else if(new_hot_rank>=100)
			{
			$("#floatant_title .title_part .degre").addClass("text_color_red");
			$(".vote_div_deal_index .temperature_div").addClass("text_color_red");
			$("#vote_part_"+deal_id+" .contener_progress_bar").css(
				{
				'background':'#f44343','background':'-webkit-linear-gradient(#f44343, #FF7900)','background':'-o-linear-gradient(#f44343, #FF7900)','background':'-moz-linear-gradient(#f44343, #FF7900)','background':'-ms-linear-gradient(#f44343, #FF7900)','background':'-khtml-linear-gradient(#f44343, #FF7900)','background':'linear-gradient(#f44343, #FF7900)'
			}
			);
			$("#vote_part_"+deal_id+" .color_fill").css("height","0%")
		}
		else if(new_hot_rank<=-10)
			{
			$("#floatant_title .title_part .degre").addClass("text_color_gele");
			$(".vote_div_deal_index .temperature_div").addClass("text_color_gele");
			$("#vote_part_"+deal_id+" .contener_progress_bar").css(
				{
				'background':'#60C6E6','background':'-webkit-linear-gradient(#60C6E6, #00A9E0)','background':'-o-linear-gradient(#60C6E6, #00A9E0)','background':'-moz-linear-gradient(#60C6E6, #00A9E0)','background':'-ms-linear-gradient(#60C6E6, #00A9E0)','background':'-khtml-linear-gradient(#60C6E6, #00A9E0)','background':'linear-gradient(#60C6E6, #00A9E0)'
			}
			);
			$("#vote_part_"+deal_id+" .color_fill").css("height","0%")
		}
		$("#vote_part_"+deal_id+" .vote_button").attr("onclick","");
		$('#floatant_title .vote_button').attr("onclick","");
		if(choice=="hot")
			{
			$("#vote_part_"+deal_id+" .up").addClass("voted");
			$("#vote_part_"+deal_id+" .down").addClass("blocked");
			$('#floatant_title .up').addClass("voted");
			$('#floatant_title .down').addClass("blocked")
		}
		else if(choice=="cold")
			{
			$("#vote_part_"+deal_id+" .up").addClass("blocked");
			$("#vote_part_"+deal_id+" .down").addClass("voted");
			$('#floatant_title .up').addClass("blocked");
			$('#floatant_title .down').addClass("voted")
		}
	}
	if(choice)
		{
		vote_ajax(deal_id,choice)
	}
}
function vote_ajax(deal_id,choice)
	{
	var url=WWW_ROOT+'/ajax/deals/vote-temperature';
	$.post(url,
		{
		deal_id:deal_id,temperature:choice,vote_temperature:1
	}
	,function(data)
		{
		if((typeof data!='object')||!('ok'in data))
			{
			return false
		}
		if(!data.ok)
			{
			if(!('error'in data))
				{
				return false
			}
			alert(data.error);
			return false
		}
		else
			{
			return false
		}
	}
	,'json').error(function()
		{
	}
	);
	return false
}
function hide_pin(pin_id,deal_id)
	{
	var url=WWW_ROOT+'/deals/hide-pin';
	$.post(url,
		{
		pin_id:pin_id,hide_pin:1
	}
	,function(data)
		{
		if((typeof data!='object')||!('ok'in data))
			{
			return false
		}
		if(!data.ok)
			{
			if(!('error'in data))
				{
				return false
			}
			alert(data.error);
			return false
		}
		else
			{
			$("#deal_id_"+deal_id).slideToggle("fast",function()
				{
			}
			);
			return false
		}
	}
	,'json').error(function()
		{
	}
	);
	return false
}
function save_deal_index(deal_id,save_value)
	{
	var data_save=
		{
		deal_id:deal_id
	};
	var id_button="#save_button_"+deal_id;
	if(save_value==1)
		{
		var url=WWW_ROOT+'/ajax/deals/unsave-deal';
		data_save.unsave_deal="1";
		$(id_button).removeClass('active');
		$(id_button).attr('onclick',"save_deal_index('"+deal_id+"', 0);
		")
	}
	else
		{
		var url=WWW_ROOT+'/ajax/deals/save-deal';
		data_save.save_deal="1";
		$(id_button).addClass('active');
		$(id_button).attr('onclick',"save_deal_index('"+deal_id+"', 1);
		")
	}
	var res=false;
	$.ajax(
		{
		type:'POST',url:url,data:data_save,success:function(data)
			{
			if((typeof data!='object')||!('ok'in data))
				{
				return false
			}
			if(!data.ok)
				{
				if(!('error'in data))
					{
					return false
				}
				alert('Echec: '+data.error);
				return false
			}
			else
				{
				res=true;
				return true
			}
		}
		,dataType:'json',async:false
	}
	).error(function()
		{
		return false
	}
	);
	return res
}
function quote_ajax(comment_id,article_id,what)
	{
	if(what==1)
		{
		var url=WWW_ROOT+'/ajax/deals/fetch-quote';
		var data_quote=
			{
			deal_id:article_id,post_id:comment_id
		}
	}
	else if(what==2)
		{
		var url=WWW_ROOT+'/ajax/forum/fetch-quote';
		var data_quote=
			{
			thread_id:article_id,post_id:comment_id
		}
	}
	var res=false;
	$.post(url,data_quote,function(data)
		{
		if((typeof data!='object')||!('ok'in data))
			{
			return false
		}
		if(!data.ok)
			{
			if(!('errors'in data))
				{
				return false
			}
			return false
		}
		else
			{
			var id=document.getElementById('add_comment'),textedebut=id.value.substring(0,id.selectionStart),textefin=id.value.substring(id.selectionEnd,id.length),texteselection=id.value.substring(id.selectionStart,id.selectionEnd).toString(),position_curseur=textedebut.length+textefin.length+texteselection.length+data.quote.length;
			id.value+=data.quote;
			id.focus();
			id.setSelectionRange(position_curseur,position_curseur);
			res=true;
			return true
		}
	}
	,'json').error(function()
		{
		return false
	}
	);
	return res
}
function like_comment(post_id,deal_id)
	{
	var url=WWW_ROOT+'/ajax/deals/like-post';
	$.post(url,
		{
		deal_id:deal_id,post_id:post_id,post_like:1
	}
	,function(data)
		{
		if((typeof data!='object')||!('ok'in data))
			{
			return false
		}
		if(!data.ok)
			{
			if(!('errors'in data))
				{
				return false
			}
			return false
		}
		else
			{
			var aime_pluriel="";
			if(data.new_likes.length>1)
				{
				aime_pluriel="aiment ça."
			}
			else
				{
				aime_pluriel="aime ça."
			}
			$("#like_"+post_id).attr('onclick',"unlike_comment('"+post_id+"', '"+deal_id+"');
			");
			$("#like_"+post_id).html('<img src="'+IMAGES_ROOT+'/deals/ic_like.png" />Je n\'aime plus');
			if(data.new_likes.length==1||data.new_likes.length==2)
				{
				$("#likecounter_"+post_id).html('<img src="'+IMAGES_ROOT+'/deals/ic_like_green.png"><span>'+data.new_likes_rasterized+'</span> '+aime_pluriel)
			}
			else
				{
				$("#likecounter_"+post_id).html('<img src="'+IMAGES_ROOT+'/deals/ic_like_green.png"><span class="like_tipsy" original-title="'+data.new_likes_rasterized+'" >'+data.new_likes.length+' personnes</span> '+aime_pluriel)
			}
			$('.like_tipsy').tipsy(
				{
				gravity:'n',opacity:1
			}
			);
			return false
		}
	}
	,'json').error(function()
		{
	}
	);
	return false
}
function like_comment_forum(post_id,thread_id)
	{
	var url=WWW_ROOT+'/ajax/forum/like-post';
	$.post(url,
		{
		thread_id:thread_id,post_id:post_id,post_like:1
	}
	,function(data)
		{
		if((typeof data!='object')||!('ok'in data))
			{
			return false
		}
		if(!data.ok)
			{
			if(!('errors'in data))
				{
				return false
			}
			return false
		}
		else
			{
			var aime_pluriel="";
			if(data.new_likes.length>1)
				{
				aime_pluriel="aiment ça."
			}
			else
				{
				aime_pluriel="aime ça."
			}
			$("#like_"+post_id).attr('onclick',"unlike_comment_forum('"+post_id+"', '"+thread_id+"');
			");
			$("#like_"+post_id).html('<img src="'+IMAGES_ROOT+'/deals/ic_like.png" />Je n\'aime plus');
			if(data.new_likes.length==1||data.new_likes.length==2)
				{
				$("#likecounter_"+post_id).html('<img src="'+IMAGES_ROOT+'/deals/ic_like_green.png"><span>'+data.new_likes_rasterized+'</span> '+aime_pluriel)
			}
			else
				{
				$("#likecounter_"+post_id).html('<img src="'+IMAGES_ROOT+'/deals/ic_like_green.png"><span class="like_tipsy" original-title="'+data.new_likes_rasterized+'" >'+data.new_likes.length+' personnes</span> '+aime_pluriel)
			}
			$('.like_tipsy').tipsy(
				{
				gravity:'n',opacity:1
			}
			);
			return false
		}
	}
	,'json').error(function()
		{
	}
	);
	return false
}
function unlike_comment(post_id,deal_id)
	{
	var url=WWW_ROOT+'/ajax/deals/unlike-post';
	$.post(url,
		{
		deal_id:deal_id,post_id:post_id,post_unlike:1
	}
	,function(data)
		{
		if((typeof data!='object')||!('ok'in data))
			{
			return false
		}
		if(!data.ok)
			{
			if(!('errors'in data))
				{
				return false
			}
			return false
		}
		else
			{
			var aime_pluriel="";
			if(data.new_likes.length>1)
				{
				aime_pluriel="aiment ça."
			}
			else
				{
				aime_pluriel="aime ça."
			}
			$("#like_"+post_id).attr('onclick',"like_comment('"+post_id+"', '"+deal_id+"');
			");
			$("#like_"+post_id).html('<img src="'+IMAGES_ROOT+'/deals/ic_like.png" />J\'aime');
			if(data.new_likes.length<1)
				{
				$("#likecounter_"+post_id).html('')
			}
			else if(data.new_likes.length==1||data.new_likes.length==2)
				{
				$("#likecounter_"+post_id).html('<img src="'+IMAGES_ROOT+'/deals/ic_like_green.png"><span>'+data.new_likes_rasterized+'</span> '+aime_pluriel)
			}
			else
				{
				$("#likecounter_"+post_id).html('<img src="'+IMAGES_ROOT+'/deals/ic_like_green.png"><span class="like_tipsy" original-title="'+data.new_likes_rasterized+'" >'+data.new_likes.length+' personnes</span> '+aime_pluriel)
			}
			$('.like_tipsy').tipsy(
				{
				gravity:'n',opacity:1
			}
			);
			return false
		}
	}
	,'json').error(function()
		{
	}
	);
	return false
}
function unlike_comment_forum(post_id,thread_id)
	{
	var url=WWW_ROOT+'/ajax/forum/unlike-post';
	$.post(url,
		{
		thread_id:thread_id,post_id:post_id,post_unlike:1
	}
	,function(data)
		{
		if((typeof data!='object')||!('ok'in data))
			{
			return false
		}
		if(!data.ok)
			{
			if(!('errors'in data))
				{
				return false
			}
			return false
		}
		else
			{
			var aime_pluriel="";
			if(data.new_likes.length>1)
				{
				aime_pluriel="aiment ça."
			}
			else
				{
				aime_pluriel="aime ça."
			}
			$("#like_"+post_id).attr('onclick',"like_comment_forum('"+post_id+"', '"+thread_id+"');
			");
			$("#like_"+post_id).html('<img src="'+IMAGES_ROOT+'/deals/ic_like.png" />J\'aime');
			if(data.new_likes.length<1)
				{
				$("#likecounter_"+post_id).html('')
			}
			else if(data.new_likes.length==1||data.new_likes.length==2)
				{
				$("#likecounter_"+post_id).html('<img src="'+IMAGES_ROOT+'/deals/ic_like_green.png"><span>'+data.new_likes_rasterized+'</span> '+aime_pluriel)
			}
			else
				{
				$("#likecounter_"+post_id).html('<img src="'+IMAGES_ROOT+'/deals/ic_like_green.png"><span class="like_tipsy" original-title="'+data.new_likes_rasterized+'" >'+data.new_likes.length+' personnes</span> '+aime_pluriel)
			}
			$('.like_tipsy').tipsy(
				{
				gravity:'n',opacity:1
			}
			);
			return false
		}
	}
	,'json').error(function()
		{
	}
	);
	return false
}
function save_deal(deal_id,save_value)
	{
	var data_save=
		{
		deal_id:deal_id
	};
	if(save_value==1)
		{
		var url=WWW_ROOT+'/ajax/deals/unsave-deal';
		data_save.unsave_deal="1"
	}
	else
		{
		var url=WWW_ROOT+'/ajax/deals/save-deal';
		data_save.save_deal="1"
	}
	var res=false;
	$.ajax(
		{
		type:'POST',url:url,data:data_save,success:function(data)
			{
			if((typeof data!='object')||!('ok'in data))
				{
				return false
			}
			if(!data.ok)
				{
				if(!('error'in data))
					{
					return false
				}
				alert('Echec: '+data.error);
				return false
			}
			else
				{
				if(save_value==1)
					{
					$("#save_deal_"+deal_id).attr('onclick',"save_deal('"+deal_id+"', 0);
					");
					$("#save_deal_"+deal_id).removeClass("active")
				}
				else
					{
					$("#save_deal_"+deal_id).attr('onclick',"save_deal('"+deal_id+"', 1);
					");
					$("#save_deal_"+deal_id).addClass("active")
				}
				res=true;
				return true
			}
		}
		,dataType:'json',async:false
	}
	).error(function()
		{
		return false
	}
	);
	return res
}
function expire_deal(deal_id,current_status)
	{
	var url=WWW_ROOT+'/ajax/deals/report-expire-status';
	var res=false;
	$.ajax(
		{
		type:'POST',url:url,data:
			{
			deal_id:deal_id,current_status:current_status,report_expire_status:1
		}
		,success:function(data)
			{
			if((typeof data!='object')||!('ok'in data))
				{
				return false
			}
			if(!data.ok)
				{
				if(!('error'in data))
					{
					return false
				}
				alert('Echec: '+data.error);
				return false
			}
			else
				{
				if(current_status==0&&current_status!=data.current_status)
					{
					$("#expire_deal_"+deal_id).removeClass("expire");
					$("#expire_deal_"+deal_id).addClass("reactive");
					$("#deal_details").addClass("expired");
					$("#floatant_title").addClass("expired");
					$(".addon-element").remove();
					$("#image_link_to_deal").after("<div class=\"addon-element expired\" ><p>Expiré</p></div>");
					$("#floatant_title span.degre").after("<span class='expire' >Expiré</span>");
					$("#expire_deal_"+deal_id).attr('onclick',"expire_deal('"+deal_id+"', 1);
					");
					$('.vote_div_deal_index .vote_button').attr("onclick","");
					$('#floatant_title .vote_button').attr("onclick","")
				}
				else if(current_status==1&&current_status!=data.current_status)
					{
					$("#expire_deal_"+deal_id).removeClass("reactive");
					$("#expire_deal_"+deal_id).addClass("expire");
					$("#deal_details").removeClass("expired");
					$("#floatant_title").removeClass("expired");
					$(".addon-element").remove();
					$("#floatant_title span.expire").remove();
					$("#expire_deal_"+deal_id).attr('onclick',"expire_deal('"+deal_id+"', 0);
					")
				}
				else if(current_status==0)
					{
					if(data.remaining_report_needed>1)
						{
						alert("Votre demande d'expiration a bien été prise en compte. Il manque désormais le clic de "+data.remaining_report_needed+" autres utilisateurs pour expirer le deal.")
					}
					else
						{
						alert("Votre demande d'expiration a bien été prise en compte. Il manque désormais le clic d'un autre utilisateur pour expirer le deal.")
					}
					$("#expire_deal_"+deal_id).attr('onclick','alert("Votre demande d\'expiration a déjà été prise en compte, merci d\'attendre l\'action d\'autres utilisateurs.");
					')
				}
				else if(current_status==1)
					{
					if(data.remaining_report_needed>1)
						{
						alert("Votre demande de réactivation a bien été prise en compte. Il manque désormais le clic de "+data.remaining_report_needed+" autres utilisateurs pour réactiver le deal.")
					}
					else
						{
						alert("Votre demande de réactivation a bien été prise en compte. Il manque désormais le clic d'un autre utilisateur pour réactiver le deal.")
					}
					$("#expire_deal_"+deal_id).attr('onclick','alert("Votre demande de réactivation a déjà été prise en compte, merci d\'attendre l\'action d\'autres utilisateurs.");
					')
				}
				res=true;
				return true
			}
		}
		,dataType:'json',async:false
	}
	).error(function()
		{
		return false
	}
	);
	return res
}
function affichage_selection(page,parent_tag)
	{
	var name_select_region=new Array();
	var compteur=0;
	if(page=="index")
		{
		if($(parent_tag+" .categorie.national").children("input").is(':checked')&&$(parent_tag+" .categorie.national").children("input").is(':disabled'))
			{
			name_select_region[compteur]=$(parent_tag+" .categorie.national").children("span").text();
			compteur++
		}
	}
	$(parent_tag+' .list_div label').each(function(e)
		{
		if(!$(this).children("input").is(':disabled'))
			{
			if($(this).children("input").is(':checked'))
				{
				name_select_region[compteur]=$(this).children("span").text();
				compteur++
			}
		}
	}
	);
	var res="";
	if(name_select_region.length>0)
		{
		res=name_select_region.join(", ")
	}
	else
		{
		res="Aucune sélection"
	}
	$(parent_tag+' .text_part span').text(res)
}
function magic_check(page,parent_tag)
	{
	var all_checked=false;
	var one_is_checked_without_national=false;
	var national_is_checked_and_active=false;
	if(page=="post_deal")
		{
		if($(parent_tag+" .categorie.national").children("input").is(':checked'))
			{
			$(parent_tag+" .list_div label").children("input").prop("disabled",true);
			$(parent_tag+" .categorie.national").children("input").prop("disabled",false);
			all_checked=true
		}
		else
			{
			$(parent_tag+" .list_div label").children("input").prop("disabled",false);
			all_checked=false
		}
	}
	$(parent_tag+" .list_div label.categorie").each(function(e)
		{
		var element=$(this).next();
		if($(this).children("input").is(':checked'))
			{
			while(element.hasClass('sous_categorie'))
				{
				element.children("input").prop("disabled",true);
				element=element.next()
			}
		}
		else
			{
			while(element.hasClass('sous_categorie'))
				{
				if(page=="post_deal")
					{
					if(all_checked)
						{
						element.children("input").prop("disabled",true);
						element=element.next()
					}
					else
						{
						element.children("input").prop("disabled",false);
						element=element.next()
					}
				}
				else if(page=="index")
					{
					element.children("input").prop("disabled",false);
					element=element.next()
				}
			}
		}
		element=element.next()
	}
	);
	if(page=="index")
		{
		$(parent_tag+" .list_div label").each(function(e)
			{
			if($(parent_tag+" .categorie.national").children("input").is(':checked')&&$(parent_tag+" .categorie.national").children("input").is(':enabled'))
				{
				national_is_checked_and_active=true
			}
			if($(this).children("input").is(':checked')&&$(this).children("input").is(':enabled'))
				{
				$(this).addClass("active");
				if(!$(this).hasClass("national"))
					{
					one_is_checked_without_national=true
				}
			}
			else
				{
				$(this).removeClass("active")
			}
		}
		);
		if(one_is_checked_without_national)
			{
			$(parent_tag+" .categorie.national").children("input").prop("checked",true);
			$(parent_tag+" .categorie.national").children("input").prop("disabled",true)
		}
		else if(!national_is_checked_and_active)
			{
			$(parent_tag+" .categorie.national").children("input").prop("disabled",false)
		}
		if($(parent_tag+" .categorie.national").children("input").is(':checked'))
			{
			$(parent_tag+" .categorie.national").addClass("active")
		}
		else
			{
			$(parent_tag+" .categorie.national").removeClass("active")
		}
	}
	else if(page=="post_deal")
		{
		$(parent_tag+" .list_div label").each(function(e)
			{
			if($(this).children("input").is(':checked')&&$(this).children("input").is(':enabled'))
				{
				$(this).addClass("active")
			}
			else
				{
				$(this).removeClass("active")
			}
		}
		)
	}
	affichage_selection(page,parent_tag)
}
function validate_connexion()
	{
	error=false;
	error_text="Des champs obligatoires n’ont pas été remplis, ou l’ont été incorrectement.";
	$("#login_part .flag.obligatoire").each(function()
		{
		verif_champs_obligatoire(this)
	}
	);
	if(!error)
		{
		$("#login_part .spinner_validate").show();
		return try_login_ajax()
	}
	else
		{
		$("#login_part .message_erreur_header").slideDown("fast");
		$("#login_part .message_erreur_header p").text(error_text)
	}
}
function try_login_ajax()
	{
	var username=document.getElementById('username_login').value,
    password=document.getElementById('password_login').value;
    var rememberme=document.getElementById('rememberme_login').checked;
    var url=WWW_ROOT+'/ajax/handlesession';
	$.post(url,
		{
		username:username,password:password,rememberme:rememberme,login_form_post:1
	}
	,function(data)
		{
		if((typeof data!='object')||!('ok'in data))
			{
			document.login_form.removeAttribute('onSubmit');
			document.login_form.submit();
			return false
		}
		if(!data.ok)
			{
			if(!('errors'in data))
				{
				document.login_form.removeAttribute('onSubmit');
				document.login_form.submit();
				return false
			}
			var member_verified=1;
			for(var i=0;
			i<data.errors.length;
			i++)
				{
				if(data.codes[i]=="non_verified_member")
					{
					member_verified=0
				}
				else
					{
					$("#login_part .spinner_validate").hide();
					$("#login_part .message_erreur_header").slideDown("fast");
					$("#login_part .message_erreur_header p").text(data.errors[i])
				}
			}
			if(data.codes.length==1&&member_verified==0)
				{
				window.location=WWW_ROOT+"/member/you-are-not-activated"
			}
			return false
		}
		else
			{
			var post_token=document.getElementById('login_form_post');
			post_token.value=2;
			document.login_form.removeAttribute('onSubmit');
			document.login_form.submit();
			return false
		}
	}
	,'json').error(function()
		{
		document.login_form.removeAttribute('onSubmit');
		document.login_form.submit()
	}
	);
	return false
}
function try_register_ajax()
	{
	var username=document.register_form.username.value,email=document.register_form.email.value,url=WWW_ROOT+'/ajax/account/check-register-fields',res=false;
	$.ajax(
		{
		type:'POST',url:url,data:
			{
			username:username,email:email
		}
		,success:function(data)
			{
			if((typeof data!='object')||!('ok'in data))
				{
				document.register_form.submit();
				return false
			}
			if(!data.ok)
				{
				if(!('errors'in data))
					{
					document.register_form.submit();
					return false
				}
				for(var i=0;
				i<data.errors.length;
				i++)
					{
					if(data.error_codes[i]=='login_already_exists')
						{
						$('#pseudo_register').parents(".flag.obligatoire").addClass("error")
					}
					if(data.error_codes[i]=='email_already_exists')
						{
						$('#email_register').parents(".flag.obligatoire").addClass("error")
					}
					$("#popup_center_register .message_erreur_header").slideDown("fast");
					$("#popup_center_register .message_erreur_header p").text(data.errors[i])
				}
				return false
			}
			else
				{
				$('#pseudo_register').parents(".flag.obligatoire").removeClass("error");
				$('#email_register').parents(".flag.obligatoire").removeClass("error");
				res=true;
				return true
			}
		}
		,dataType:'json',async:false
	}
	).error(function()
		{
		return false
	}
	);
	return res
}
function validate_inscription()
	{
	error=false;
	var error_text="Des champs obligatoires n’ont pas été remplis, ou l’ont été incorrectement.";
	$("#popup_center_register .flag.obligatoire").each(function()
		{
		verif_champs_obligatoire(this)
	}
	);
	if($('#email_register').val()&&valid_email($('#email_register').val()))
		{
		error=true;
		error_text="Cette adresse e-mail n'est pas valide.";
		$('#email_register').parents(".flag.obligatoire").addClass("error")
	}
	if($('#password_register').val()&&$('#cpassword_register').val()&&$('#password_register').val()!=$('#cpassword_register').val())
		{
		error=true;
		error_text="Les mots de passe insérés sont différents.";
		$('#password_register').parents(".flag.obligatoire").addClass("error");
		$('#cpassword_register').parents(".flag.obligatoire").addClass("error")
	}
	if($('#password_register').val()&&$('#password_register').val().length<6)
		{
		error=true;
		error_text="Votre mot de passe doit contenir plus de 5 caractères.";
		$('#password_register').parents(".flag.obligatoire").addClass("error")
	}
	if($('#pseudo_register').val()&&$('#pseudo_register').val().length>15)
		{
		error=true;
		error_text="Votre pseudo ne doit pas contenir plus de 15 caractères.";
		$('#pseudo_register').parents(".flag.obligatoire").addClass("error")
	}
	if($('#pseudo_register').val()&&$('#pseudo_register').val().length<3)
		{
		error=true;
		error_text="Votre pseudo doit contenir plus de 2 caractères.";
		$('#pseudo_register').parents(".flag.obligatoire").addClass("error")
	}
	if(!error)
		{
		if(try_register_ajax())
			{
			$("#popup_center_register .message_erreur_header").hide();
			$("#popup_center_register .enter_validate").attr('onclick',"");
			$("#popup_center_register .spinner_validate").show();
			document.register_form.submit()
		}
	}
	else
		{
		$("#popup_center_register .message_erreur_header").slideDown("fast");
		$("#popup_center_register .message_erreur_header p").text(error_text)
	}
}
function validate_forgot_password()
	{
	error=false;
	var error_text="Des champs obligatoires n’ont pas été remplis, ou l’ont été incorrectement.";
	$("#motdepasse_part .flag.obligatoire").each(function()
		{
		verif_champs_obligatoire(this)
	}
	);
	if($('#email_forgot').val()&&valid_email($('#email_forgot').val()))
		{
		error=true;
		error_text="Cette adresse e-mail n'est pas valide.";
		$('#email_forgot').parents(".flag.obligatoire").addClass("error")
	}
	if(!error)
		{
		$("#motdepasse_part .message_erreur_header").hide();
		$("#motdepasse_part .enter_validate").attr('onclick',"");
		$("#motdepasse_part .spinner_validate").show();
		document.forgot_password_form.submit()
	}
	else
		{
		$("#motdepasse_part .message_erreur_header").slideDown("fast");
		$("#motdepasse_part .message_erreur_header p").text(error_text)
	}
}
function validate_contact()
	{
	error=false;
	var error_text="Des champs obligatoires n’ont pas été remplis, ou l’ont été incorrectement.";
	$("#contact_form .flag").each(function()
		{
		verif_champs_obligatoire(this)
	}
	);
	if(!error)
		{
		$("#contact_left_contener .message_erreur_header").hide();
		$("#contact_left_contener .validate_button_form").attr('onclick',"");
		$("#contact_left_contener .spinner_validate").show();
		document.contact_form.submit()
	}
	else
		{
		$("#contact_left_contener .message_erreur_header").slideDown("fast");
		$("#contact_left_contener .message_erreur_header p").text(error_text)
	}
}
function pseudo_key(event)
	{
	var inp=String.fromCharCode(TriggeredKey(event));
	if(TriggeredKey(event)==8||TriggeredKey(event)==0||TriggeredKey(event)==118||TriggeredKey(event)==120||TriggeredKey(event)==99||TriggeredKey(event)==97||TriggeredKey(event)==122||TriggeredKey(event)==121)
		{
		inp="0"
	}
	if(!event&&window.event)
		{
		event=window.event
	}
	if(!/[a-zA-Z0-9-_.]/.test(inp))
		{
		event.returnValue=false;
		event.cancelBubble=true
	}
	if(!/[a-zA-Z0-9-_.]/.test(inp))
		{
		event.preventDefault();
		event.stopPropagation()
	}
}
function ajax_notification()
	{
	var url=WWW_ROOT+'/ajax/clear-all-notifications';
	$.ajax(
		{
		type:'POST',url:url,data:
			{
			clear_all_notifications:1
		}
		,success:function(data)
			{
			if((typeof data!='object')||!('ok'in data))
				{
				return false
			}
			if(!data.ok)
				{
				if(!('errors'in data))
					{
					return false
				}
				return false
			}
			else
				{
				$('#open_notification span').remove();
				$('#notification_box').remove();
				$('#view_all_notification_button').remove();
				$('#notifications').append('<div id="no_notification_div"><div><img src="'+IMAGES_ROOT+'/header/img_header_no_notification.png"></div><p>Vous n\'avez aucune notification.</p><p>Vous retrouverez ici toutes les notifications liées à vos deals, alertes et commentaires.</p></div>');
				return true
			}
		}
		,dataType:'json',async:false
	}
	).error(function()
		{
		return false
	}
	)
}
function switch_tab(switch_id_div)
	{
	$("#"+switch_id_div).slideToggle("fast",function()
		{
	}
	)
}
function delete_comment(post_id)
	{
	var con=confirm('Etes vous sûr(e) de vouloir supprimer ce commentaire ?');
	if(con)
		{
		document.forms["delete_com_"+post_id].submit()
	}
}
function validate_report(comment_id)
	{
	error=false;
	error_text="Des champs obligatoires n’ont pas été remplis, ou l’ont été incorrectement.";
	if(comment_id)
		{
		$(".popup_center_signalement.comment .flag.obligatoire").each(function()
			{
			verif_champs_obligatoire(this)
		}
		)
	}
	else
		{
		$(".popup_center_signalement.deal .flag.obligatoire").each(function()
			{
			verif_champs_obligatoire(this)
		}
		)
	}
	if(!error)
		{
		if(comment_id)
			{
			$(".popup_center_signalement.comment .message_erreur_header").hide();
			$(".popup_center_signalement.comment .bouton_valider_signalement").attr('onclick',"");
			$("#report_comment_form_"+comment_id).submit()
		}
		else
			{
			$(".popup_center_signalement.deal .message_erreur_header").hide();
			$(".popup_center_signalement.deal .bouton_valider_signalement").attr('onclick',"");
			$("#report_deal_form").submit()
		}
	}
	else
		{
		if(comment_id)
			{
			$(".popup_center_signalement.comment .message_erreur_header").slideDown("fast");
			$(".popup_center_signalement.comment .message_erreur_header p").text(error_text)
		}
		else
			{
			$(".popup_center_signalement.deal .message_erreur_header").slideDown("fast");
			$(".popup_center_signalement.deal .message_erreur_header p").text(error_text)
		}
	}
}
function validate_comment()
	{
	error=false;
	error_text="Des champs obligatoires n’ont pas été remplis, ou l’ont été incorrectement.";
	$("#discussed .flag.obligatoire").each(function()
		{
		verif_champs_obligatoire(this)
	}
	);
	if(!error)
		{
		$("#discussed .message_erreur_header").hide();
		$("#discussed .validate_form a").attr('onclick',"");
		$("#discussed .spinner_validate").show();
		if(typeof document.forms.comment_form.deal_id!='undefined')
			{
			var v=sessionStorage.getItem('comment_for_deal_'+document.forms.comment_form.deal_id.value);
			if(v)
				{
				sessionStorage.removeItem('comment_for_deal_'+document.forms.comment_form.deal_id.value)
			}
		}
		else if(typeof document.forms.comment_form.thread_id!='undefined')
			{
			var v=sessionStorage.getItem('comment_for_thread_'+document.forms.comment_form.thread_id.value);
			if(v)
				{
				sessionStorage.removeItem('comment_for_thread_'+document.forms.comment_form.thread_id.value)
			}
		}
		$(document.comment_form).trigger('submit')
	}
	else
		{
		$("#discussed .message_erreur_header").slideDown("fast");
		$("#discussed .message_erreur_header p").text(error_text)
	}
}
function validate_edit_comment(comment_id)
	{
	error=false;
	$("#commentaire_div_textarea_"+comment_id+" .flag.obligatoire").each(function()
		{
		verif_champs_obligatoire(this)
	}
	);
	if(!error)
		{
		$("#commentaire_div_textarea_"+comment_id+" .validate_form a").attr('onclick',"");
		$("#commentaire_div_textarea_"+comment_id+" .spinner_validate").show();
		$("#formedit_"+comment_id).trigger('submit')
	}
	else
		{
		alert("Vous devez entrer un commentaire.")
	}
}
function ajouterBBcode(code,id_area)
	{
	var id=document.getElementById(id_area),regex=/\[(.*)\](.*)\[(.*)\]/gi,resultat=regex.test(code),textedebut=id.value.substring(0,id.selectionStart),textefin=id.value.substring(id.selectionEnd,id.length),texteselection=id.value.substring(id.selectionStart,id.selectionEnd).toString(),text_image_valide='Le lien que vous avez inséré ne correspond pas à une image. Pour obtenir le bon lien : faites un clic droit sur l\'image puis afficher l\'image',reg_verif_image=/(\.jpg|\.png|\.gif|\.jpeg|\.bmp)/gi;
	if(resultat)
		{
		var selection_window=window.getSelection().toString(),reg_match=/\[(.*)\](.*)\[(.*)\]/gi,matching=reg_match.exec(code);
		var reg_image=/img/gi,matching_image=reg_image.test(matching[1]);
		var reg_quote=/citer pseudo=/gi,matching_quote=reg_quote.test(matching[1]);
		if(selection_window)
			{
			if(matching_image)
				{
				var matching_image_verif=reg_verif_image.test(selection_window);
				if(matching_image_verif)
					{
					var position_curseur=matching[1].length+2+textedebut.length+selection_window.length+matching[3].length+2;
					id.value=textedebut+'['+matching[1]+']'+selection_window+'['+matching[3]+']'+textefin
				}
				else
					{
					alert(text_image_valide);
					var position_curseur=textedebut.length
				}
			}
			else if(matching_quote)
				{
				var contenu=window.prompt('Veuillez insérez le nom de la personne que vous souhaitez citer :','');
				if(contenu!=null&&contenu!="")
					{
					var quote_part_1=matching[1].replace(/citer pseudo=exemple/g,'citer pseudo="'+contenu+'"');
					var position_curseur=quote_part_1.length+2+textedebut.length+selection_window.length+matching[3].length+2;
					id.value=textedebut+'['+quote_part_1+']'+selection_window+'['+matching[3]+']'+textefin
				}
				else
					{
					var position_curseur=textedebut.length
				}
			}
			else
				{
				var position_curseur=matching[1].length+2+textedebut.length+selection_window.length+matching[3].length+2;
				id.value=textedebut+'['+matching[1]+']'+selection_window+'['+matching[3]+']'+textefin
			}
		}
		else if(texteselection)
			{
			if(matching_image)
				{
				var matching_image_verif=reg_verif_image.test(texteselection);
				if(matching_image_verif)
					{
					var position_curseur=matching[1].length+2+textedebut.length+texteselection.length+matching[3].length+2;
					id.value=textedebut+'['+matching[1]+']'+texteselection+'['+matching[3]+']'+textefin
				}
				else
					{
					alert(text_image_valide);
					var position_curseur=textedebut.length
				}
			}
			else if(matching_quote)
				{
				var contenu=window.prompt('Veuillez insérez le nom de la personne que vous souhaitez citer :','');
				if(contenu!=null&&contenu!="")
					{
					var quote_part_1=matching[1].replace(/citer pseudo=exemple/g,'citer pseudo="'+contenu+'"');
					var position_curseur=quote_part_1.length+2+textedebut.length+texteselection.length+matching[3].length+2;
					id.value=textedebut+'['+quote_part_1+']'+texteselection+'['+matching[3]+']'+textefin
				}
				else
					{
					var position_curseur=textedebut.length
				}
			}
			else
				{
				var position_curseur=matching[1].length+2+textedebut.length+texteselection.length+matching[3].length+2;
				id.value=textedebut+'['+matching[1]+']'+texteselection+'['+matching[3]+']'+textefin
			}
		}
		else
			{
			if(matching_image)
				{
				var contenu=window.prompt('Veuillez insérer le lien vers votre image ci-dessous :','');
				if(contenu!=null&&contenu!="")
					{
					var matching_image_verif=reg_verif_image.test(contenu);
					if(matching_image_verif)
						{
						var position_curseur=matching[1].length+2+textedebut.length+contenu.length+matching[3].length+2;
						id.value=textedebut+'['+matching[1]+']'+contenu+'['+matching[3]+']'+textefin
					}
					else
						{
						alert(text_image_valide);
						var position_curseur=textedebut.length
					}
				}
				else
					{
					var position_curseur=textedebut.length
				}
			}
			else if(matching_quote)
				{
				var contenu=window.prompt('Veuillez insérez le nom de la personne que vous souhaitez citer :','');
				if(contenu!=null&&contenu!="")
					{
					var quote_part_1=matching[1].replace(/citer pseudo=exemple/g,'citer pseudo="'+contenu+'"');
					var position_curseur=quote_part_1.length+2+textedebut.length;
					id.value=textedebut+'['+quote_part_1+']'+selection_window+'['+matching[3]+']'+textefin
				}
				else
					{
					var position_curseur=textedebut.length
				}
			}
			else
				{
				var position_curseur=matching[1].length+2+textedebut.length;
				id.value=textedebut+matching[0]+textefin
			}
		}
	}
	else
		{
		if(texteselection)
			{
			var position_curseur=textedebut.length+texteselection.length+code.length;
			id.value=textedebut+texteselection+code+textefin
		}
		else
			{
			var position_curseur=textedebut.length+code.length;
			id.value=textedebut+code+textefin
		}
	}
	id.setSelectionRange(position_curseur,position_curseur);
	id.focus()
}
function footer_white_on_bottom()
	{
	var height_restant=$(window).height()-$("#end_white_background").offset().top;
	if(height_restant>0)
		{
		$(".absolute_footer").css("height",height_restant+"px")
	}
}
function setCookie(c_name,value,exdays)
	{
	var exdate=new Date();
	exdate.setDate(exdate.getDate()+exdays);
	var c_value=escape(value)+((exdays==null)?"":";
	 path=/;
	 expires="+exdate.toUTCString());
	document.cookie=c_name+"="+c_value
}
function close_header_message()
	{
	$(".close_button_header_message").hide();
	$("#header_message").slideToggle("fast",function()
		{
		setCookie("header_message_seen",'existe',1);
		$("#header_message").parents(".mouai").hide()
	}
	)
}
function close_cookies_message()
	{
	$("#cookies_message").slideToggle("fast",function()
		{
		setCookie("header_cookies_seen",'existe',360);
		$("#cookies_message").parents(".mouai").hide();
		$("#cookies_message_close").hide()
	}
	)
}
function getCookie(cookie_name)
	{
	return document.cookie.indexOf(cookie_name)
}
function knows_mobile_apps_exist()
	{
	localStorage.setItem("knows_mobile_apps_exist","Et ils virent que c'était beau.")
}
function header_BF_message_seen()
	{
	$("#BF_banner_index").slideToggle("fast",function()
		{
		localStorage.setItem("header_BF_message_seen","Et ils virent que c'était beau mais plus maintenant.")
	}
	)
}
function show_message_mobile_device(browser_type)
	{
	if(browser_type=='windowsphone')
		{
		var url=confirm("Voulez-vous télécharger l'application Windows Phone, ou continuer directement sur le site ?");
		if(url==true)
			{
			knows_mobile_apps_exist();
			var url=window.location.href='https://www.microsoft.com/en-us/store/apps/dealabs-wp/9nblggh5xjsg';
			url.show()
		}
		else
			{
			knows_mobile_apps_exist()
		}
	}
	else
		{
		knows_mobile_apps_exist()
	}
}
function get_mobile_browser_type()
	{
	var res='failed';
	url=WWW_ROOT+'/ajax/check_mb';
	$.ajax(
		{
		type:'GET',url:url,success:function(data)
			{
			res=data;
			show_message_mobile_device(res);
			return true
		}
		,async:true
	}
	).error(function()
		{
		res='failed';
		return false
	}
	)
}
function autocomplete_username(input)
	{
	cache=
		{
	};
	$("#"+input).autocomplete(
		{
		minLength:3,messages:
			{
			noResults:'',results:function()
				{
			}
		}
		,source:function(request,response)
			{
			var term=request.term;
			if(term in cache)
				{
				response(cache[term]);
				return
			}
			var url=WWW_ROOT+'/ajax/profile/auto-suggest-members';
			$.post(url,
				{
				username:request.term,auto_suggest_members:1
			}
			,function(data)
				{
				if((typeof data!='object')||!('ok'in data))
					{
					return false
				}
				if(!data.ok)
					{
					if(!('errors'in data))
						{
						return false
					}
					return false
				}
				else
					{
					if(data.users.length)
						{
						cache[term]=data.users;
						response(data.users);
						tags=data.users
					}
					return false
				}
			}
			,'json').error(function()
				{
				response([])
			}
			)
		}
	}
	)
}
function autocomplete_deals(input,form,click_validates)
	{
	cache=
		{
	};
	$("#"+input).autocomplete(
		{
		minLength:3,messages:
			{
			noResults:'',results:function()
				{
			}
		}
		,source:function(request,response)
			{
			var term=request.term;
			if(term in cache)
				{
				response(cache[term]);
				return
			}
			var url=WWW_ROOT+'/ajax/deals/autocomplete';
			$.post(url,
				{
				request:request.term,
			}
			,function(data)
				{
				if((typeof data!='object')||!('ok'in data))
					{
					return false
				}
				if(!data.ok)
					{
					if(!('errors'in data))
						{
						return false
					}
					return false
				}
				else
					{
					if(data.suggestions.length)
						{
						cache[term]=data.suggestions;
						response(data.suggestions);
						tags=data.suggestions
					}
					return false
				}
			}
			,'json').error(function()
				{
				response([])
			}
			)
		}
		,select:function(event,ui)
			{
			if(click_validates)
				{
				$("input#"+input).val(ui.item.value);
				$("#"+form).submit()
			}
		}
	}
	)
}
function autocomplete_forum_threads(input,form,click_validates)
	{
	cache=
		{
	};
	$("#"+input).autocomplete(
		{
		minLength:3,messages:
			{
			noResults:'',results:function()
				{
			}
		}
		,source:function(request,response)
			{
			var term=request.term;
			if(term in cache)
				{
				response(cache[term]);
				return
			}
			var url=WWW_ROOT+'/ajax/forum-threads/autocomplete';
			$.post(url,
				{
				request:request.term,
			}
			,function(data)
				{
				if((typeof data!='object')||!('ok'in data))
					{
					return false
				}
				if(!data.ok)
					{
					if(!('errors'in data))
						{
						return false
					}
					return false
				}
				else
					{
					if(data.suggestions.length)
						{
						cache[term]=data.suggestions;
						response(data.suggestions);
						tags=data.suggestions
					}
					return false
				}
			}
			,'json').error(function()
				{
				response([])
			}
			)
		}
		,select:function(event,ui)
			{
			if(click_validates)
				{
				$("input#"+input).val(ui.item.value);
				$("#"+form).submit()
			}
		}
	}
	)
}
function premiere_visite()
	{
	var introguide=introJs();
	var startbtn=$('#premiere_visite_button');
	introguide.setOptions(
		{
		steps:[
			{
			element:'#premiere_visite',intro:'Bienvenue dans la visite guidée de <b>Dealabs</b>, la 1ère communauté française centrée autour du partage de bons plans !',position:'left'
		}
		,
			{
			element:'.postdeal_button_rightbar',intro:'Pour commencer, vous pouvez partager un deal avec la communauté en cliquant sur ce bouton.',position:'left'
		}
		,
			{
			element:'section > article.deal_index_article',intro:'Voici ensuite la façon dont s\'affichent les deals une fois qu\'ils ont été postés.',position:'bottom'
		}
		,
			{
			element:'section > article.deal_index_article .vote_div_deal_index',intro:'La température affichée sur chacun des deals matérialise les votes émis par la communauté et représente leur intérêt : plus une température est élevée, plus le deal est intéressant. Vous pouvez cliquer sur les flèches pour voter.',position:'left'
		}
		,
			{
			element:'.button_type_deal.hot',intro:'Cet onglet affiche les derniers deals ayant dépassé 100°.',position:'bottom'
		}
		,
			{
			element:'.button_type_deal.new',intro:'Et cet autre onglet affiche quant à lui les derniers deals partagés par la communauté, quelle que soit leur température.',position:'bottom'
		}
		,
			{
			element:'#forum_tab',intro:'Enfin, le site dispose également d\'un forum sur lequel vous pouvez discuter des deals mais aussi d\'autres sujets avec les membres de la communauté.',position:'bottom'
		}
		,
			{
			element:'#member_div',intro:'La visite est terminée, n\'hésitez pas à nous rejoindre :) ! Pour plus d\'informations, nous vous invitons à consulter notre <a href="'+WWW_ROOT+'/page/faq-aide" >FAQ</a>.',position:'bottom'
		}
		]
	}
	);
	startbtn.on('click',function(e)
		{
		e.preventDefault();
		_gaq.push(['_trackEvent','button','click','tutorial-button']);
		window.location.href='#header_black';
		introguide.start()
	}
	);
	introguide.oncomplete(function()
		{
	}
	);
	introguide.onexit(function()
		{
	}
	)
}
function ajax_stop_forum_thread_notification(thread_id,has_new_stuff)
	{
	var url=WWW_ROOT+'/ajax/disable-notifications',res=false;
	$.ajax(
		{
		type:'POST',url:url,data:
			{
			thread_id:thread_id,see_forum_forever:1
		}
		,success:function(data)
			{
			if((typeof data!='object')||!('ok'in data))
				{
				return false
			}
			if(!data.ok)
				{
				if(!('errors'in data))
					{
					return false
				}
				return false
			}
			else
				{
				var thread_class=has_new_stuff?'bold':'';
				var a_selector="#thread_id_"+thread_id+" .left_cat_part .title a";
				var div_selector="#thread_id_"+thread_id+" div.disable_notification";
				$(a_selector).removeClass();
				$(a_selector).addClass(thread_class);
				$(div_selector).hide();
				res=true;
				return true
			}
		}
		,dataType:'json',async:false
	}
	).error(function()
		{
		return false
	}
	);
	return res
}
function amIaCrawlerBot()
	{
	var botPattern="(googlebot\/|Googlebot-Mobile|Googlebot-Image|Google favicon|Mediapartners-Google|bingbot|slurp|java|wget|curl|Commons-HttpClient|Python-urllib|libwww|httpunit|nutch|phpcrawl|msnbot|jyxobot|FAST-WebCrawler|FAST Enterprise Crawler|biglotron|teoma|convera|seekbot|gigablast|exabot|ngbot|ia_archiver|GingerCrawler|webmon |httrack|webcrawler|grub.org|UsineNouvelleCrawler|antibot|netresearchserver|speedy|fluffy|bibnum.bnf|findlink|msrbot|panscient|yacybot|AISearchBot|IOI|ips-agent|tagoobot|MJ12bot|dotbot|woriobot|yanga|buzzbot|mlbot|yandexbot|purebot|Linguee Bot|Voyager|CyberPatrol|voilabot|baiduspider|citeseerxbot|spbot|twengabot|postrank|turnitinbot|scribdbot|page2rss|sitebot|linkdex|Adidxbot|blekkobot|ezooms|dotbot|Mail.RU_Bot|discobot|heritrix|findthatfile|europarchive.org|NerdByNature.Bot|sistrix crawler|ahrefsbot|Aboundex|domaincrawler|wbsearchbot|summify|ccbot|edisterbot|seznambot|ec2linkfinder|gslfbot|aihitbot|intelium_bot|facebookexternalhit|yeti|RetrevoPageAnalyzer|lb-spider|sogou|lssbot|careerbot|wotbox|wocbot|ichiro|DuckDuckBot|lssrocketcrawler|drupact|webcompanycrawler|acoonbot|openindexspider|gnam gnam spider|web-archive-net.com.bot|backlinkcrawler|coccoc|integromedb|content crawler spider|toplistbot|seokicks-robot|it2media-domain-crawler|ip-web-crawler.com|siteexplorer.info|elisabot|proximic|changedetection|blexbot|arabot|WeSEE:Search|niki-bot|CrystalSemanticsBot|rogerbot|360Spider|psbot|InterfaxScanBot|Lipperhey SEO Service|CC Metadata Scaper|g00g1e.net|GrapeshotCrawler|urlappendbot|brainobot|fr-crawler|binlar|SimpleCrawler|Livelapbot|Twitterbot|cXensebot|smtbot|bnf.fr_bot|A6-Indexer|ADmantX|Facebot|Twitterbot|OrangeBot|memorybot|AdvBot|MegaIndex|SemanticScholarBot|ltx71|nerdybot|xovibot|BUbiNG|Qwantify|archive.org_bot|Applebot|TweetmemeBot|crawler4j|findxbot|SemrushBot|yoozBot|lipperhey|y!j-asr|Domain Re-Animator Bot|AddThis)";
	var re=new RegExp(botPattern,'i');
	return re.test(navigator.userAgent)
}
function set_header_annoucement()
	{
	if(amIaCrawlerBot())
		{
		return
	}
	if(!(getCookie("header_cookies_seen")>=0))
		{
		$("#header_cookies_seen").addClass("mouai");
		$("#header_cookies_seen").show();
		var $cookie_html=$('<div id="cookies_message" style="border:none;
		 background-color:#000000;
		" ><div class="structure" style="border:none;
		  background-color:#000000;
		 padding:5px 15px;
		" ><a style="display:block;
		 float:right;
		 margin:8px 0px 8px 70px;
		" id="cookies_message_close" href="javascript:close_cookies_message();
		" ><img width="14" height="14" src="https://static.dealabs.com/images/header/icon_header_cookies_close.png"></a><p style="line-height:15px;
		 overflow:hidden;
		 color:#c3c3c3;
		 font-size:0.9em;
		" >En poursuivant votre navigation sur ce site, vous acceptez l’utilisation de Cookies pour réaliser des statistiques de navigation, pour vous permettre de vous connecter par les réseaux sociaux et vous y faciliter le partage d’informations. <a style="color:#c3c3c3;
		 text-decoration: underline;
		" href="'+WWW_ROOT+'/page/police-vie-privee#cookies" >En savoir plus</a>.</p></div></div>');
		$("#header_cookies_seen").append($cookie_html)
	}
	if(!(getCookie("header_message_seen")>=0))
		{
		$("#header_message_seen").show()
	}
}
function show_onload_popup_idealo()
	{
	var idealo_id=detect_anchor("idealoProduct_");
	if(idealo_id)
		{
		fetch_idealo_product_and_display_it(idealo_id,0)
	}
	else
		{
		return
	}
}
function close_idealo_popup()
	{
	$("body").click(function(event)
		{
		if(event.target.id=="idealo_product_detail")
			{
			$("#idealo_product_detail").removeClass("modal");
			$('#overlay_idealo').css("visibility","hidden");
			$('#overlay_idealo').css("opacity","0");
			$("#idealo_product_detail").html("");
			$("body").removeClass("no_overflow");
			history.replaceState("",document.title,window.location.pathname+window.location.search)
		}
	}
	)
}
function close_idealo_popup_button()
	{
	$("#idealo_product_detail").removeClass("modal");
	$('#overlay_idealo').css("visibility","hidden");
	$('#overlay_idealo').css("opacity","0");
	$("#idealo_product_detail").html("");
	$("body").removeClass("no_overflow");
	history.replaceState("",document.title,window.location.pathname+window.location.search)
}
function fetch_idealo_product_and_display_it(product_id,offset)
	{
	if(offset)
		{
		$("#see_more_merchants_"+product_id).attr("onclick","");
		$("#see_more_merchants_"+product_id).text("Chargement...")
	}
	else
		{
		$("#loader_"+product_id).show();
		$("#button_show_popup_"+product_id).attr("onclick","")
	}
	$.ajax(
		{
		'url':WWW_ROOT+'/idealo/item-detail','type':'GET','data':
			{
			'product_id':product_id,'offset':offset
		}
		,dataType:'json','success':function(data)
			{
			if((typeof data!='object')||!('ok'in data))
				{
				return false
			}
			if(!('error'in data))
				{
				return false
			}
			if(data.error)
				{
				return false
			}
			if(!('result'in data))
				{
				return false
			}
			if(offset)
				{
				offset=offset+15;
				$("#put_results .see_more").remove();
				var result=$(''+data.result+'');
				$('#put_results').append(result.find('#put_results').html());
				$("#see_more_merchants_"+product_id).attr("onclick","fetch_idealo_product_and_display_it("+product_id+", "+offset+")");
				$("#see_more_merchants_"+product_id).text("Voir plus de résultats")
			}
			else
				{
				$("#idealo_product_detail").addClass("modal");
				$('#overlay_idealo').css("visibility","visible");
				$('#overlay_idealo').css("opacity","1");
				$("#idealo_product_detail").html(data.result);
				$("body").addClass("no_overflow");
				$("#loader_"+product_id).hide();
				$("#button_show_popup_"+product_id).attr("onclick","fetch_idealo_product_and_display_it("+product_id+")");
				history.replaceState(null,null,'#idealoProduct_'+product_id)
			}
		}
	}
	)
}
function fetch_idealo_search_suggestion_banner_and_display_it(search_term,offset)
	{
	$(".see_more a").attr("onclick","");
	$(".see_more a").text("Chargement...");
	$.ajax(
		{
		'url':WWW_ROOT+'/idealo/search-suggestion','type':'GET','data':
			{
			'query':search_term,'offset':offset
		}
		,dataType:'json','success':function(data)
			{
			if((typeof data!='object')||!('ok'in data))
				{
				return false
			}
			if(!('error'in data))
				{
				return false
			}
			if(data.error)
				{
				return false
			}
			if(!('result'in data))
				{
				return false
			}
			if(data.result)
				{
				if(offset)
					{
					offset=offset+12;
					$(".see_more").hide();
					$("#idealo_suggestions").append(data.result);
					$(".see_more a").attr("onclick","fetch_idealo_search_suggestion_banner_and_display_it(\""+search_term+"\", "+offset+")");
					$(".see_more a").text("Voir plus de résultats")
				}
				else
					{
					$("#idealo_suggestions").html(data.result)
				}
			}
			else
				{
			}
		}
	}
	)
}
function get_local_storage_key_for_merchant_voucher_display_merchant(merchant_id)
	{
	return'I_have_seen_a_code_from_merchant_'+merchant_id
}
function get_local_storage_key_for_merchant_voucher_display_reducfr(reduc_id)
	{
	return'I_have_seen_a_code_from_reducfr_'+reduc_id
}
function get_local_storage_key_for_merchant_voucher_display_reducfr_by_merchant(merchant_id)
	{
	return'I_have_seen_a_code_from_merchant_reducfr_'+merchant_id
}
function get_local_storage_key_for_merchant_voucher_display_deal(deal_id)
	{
	return'I_have_seen_a_code_from_deal_'+deal_id
}
function should_i_show_the_voucher_code_of_a_merchant_deal(deal_id)
	{
	if(!deal_id)
		{
		return false
	}
	d=localStorage.getItem(get_local_storage_key_for_merchant_voucher_display_deal(deal_id));
	if(!d)
		{
		return false
	}
	d=JSON.parse(d);
	return d['expiration']>new Date().getTime()
}
function should_i_show_the_voucher_code_of_a_merchant_merchant(merchant_id)
	{
	if(!merchant_id)
		{
		return false
	}
	d=localStorage.getItem(get_local_storage_key_for_merchant_voucher_display_merchant(merchant_id));
	if(!d)
		{
		return false
	}
	d=JSON.parse(d);
	return d['expiration']>new Date().getTime()
}
function should_i_show_the_voucher_code_of_a_reducfr_voucher(reduc_id)
	{
	if(!reduc_id)
		{
		return false
	}
	d=localStorage.getItem(get_local_storage_key_for_merchant_voucher_display_reducfr(reduc_id));
	if(!d)
		{
		return false
	}
	d=JSON.parse(d);
	return d['expiration']>new Date().getTime()
}
function should_i_show_the_voucher_code_of_a_reducfr_merchant(merchant_id)
	{
	if(!merchant_id)
		{
		return false
	}
	d=localStorage.getItem(get_local_storage_key_for_merchant_voucher_display_reducfr_by_merchant(merchant_id));
	if(!d)
		{
		return false
	}
	d=JSON.parse(d);
	return d['expiration']>new Date().getTime()
}
function should_i_show_the_voucher_code_of_a_reducfr_voucher_merchant(reduc_id,merchant_id)
	{
	merchant_id=parseInt(merchant_id,10);
	return should_i_show_the_voucher_code_of_a_reducfr_voucher(reduc_id)||should_i_show_the_voucher_code_of_a_reducfr_merchant(merchant_id)
}
function should_i_show_the_voucher_code_of_a_merchant(deal_id,merchant_id)
	{
	deal_id=parseInt(deal_id,10);
	merchant_id=parseInt(merchant_id,10);
	return should_i_show_the_voucher_code_of_a_merchant_deal(deal_id)||should_i_show_the_voucher_code_of_a_merchant_merchant(merchant_id)
}
function mark_a_merchant_as_having_its_voucher_code_displayed(deal_id_or_reduc_id,merchant_id,is_from_reducfr)
	{
	is_from_reducfr=typeof is_from_reducfr!=='undefined'?is_from_reducfr:false;
	if(is_from_reducfr)
		{
		var reduc_id=deal_id_or_reduc_id;
		var reduc_id_data=
			{
			'data':reduc_id,'expiration':(new Date().getTime()+60*60*24*7*1000)
		};
		localStorage.setItem(get_local_storage_key_for_merchant_voucher_display_reducfr(reduc_id),JSON.stringify(reduc_id_data));
		if(merchant_id)
			{
			var reduc_merchant_id_data=
				{
				'data':merchant_id,'expiration':(new Date().getTime()+60*60*24*7*1000)
			};
			localStorage.setItem(get_local_storage_key_for_merchant_voucher_display_reducfr_by_merchant(merchant_id),JSON.stringify(reduc_merchant_id_data))
		}
	}
	else
		{
		var deal_id=parseInt(deal_id_or_reduc_id,10);
		merchant_id=parseInt(merchant_id,10);
		var deal_id_data=
			{
			'data':deal_id,'expiration':(new Date().getTime()+60*60*24*7*1000)
		};
		localStorage.setItem(get_local_storage_key_for_merchant_voucher_display_deal(deal_id),JSON.stringify(deal_id_data));
		if(merchant_id)
			{
			var merchant_id_data=
				{
				'data':merchant_id,'expiration':(new Date().getTime()+60*60*24*7*1000)
			};
			localStorage.setItem(get_local_storage_key_for_merchant_voucher_display_merchant(merchant_id),JSON.stringify(merchant_id_data))
		}
	}
}
function open_url_voucher_code(e,url,deal_id_or_reduc_id,merchant_id,index,is_from_reducfr)
	{
	is_from_reducfr=typeof is_from_reducfr!=='undefined'?is_from_reducfr:false;
	$(e).parent().hide();
	if(is_from_reducfr)
		{
		mark_a_merchant_as_having_its_voucher_code_displayed(deal_id_or_reduc_id,merchant_id,is_from_reducfr)
	}
	else
		{
		mark_a_merchant_as_having_its_voucher_code_displayed(deal_id_or_reduc_id,merchant_id)
	}
	var current_url=window.location.toString();
	current_url=current_url.split("#")[0];
	current_url=remove_url_parameter(current_url,'open_modal');
	if(index)
		{
		window.open(url,"_self");
		window.open(current_url+"#deal_id_"+deal_id_or_reduc_id,"_blank")
	}
	else
		{
		window.open(url,"_self");
		if(is_from_reducfr)
			{
			window.open(current_url+'?open_modal='+deal_id_or_reduc_id,"_blank")
		}
		else
			{
			window.open(current_url,"_blank")
		}
	}
}
function open_url_voucher_code_get_deal(deal_id,merchant_id)
	{
	$("#voucher_code_"+deal_id).find("div.hidden").hide();
	mark_a_merchant_as_having_its_voucher_code_displayed(deal_id,merchant_id)
}
var calendar=
	{
	total_button_in_calendar:42,set_date:function(jour,mois,annee)
		{
		this.current_day=jour;
		this.current_month=mois;
		this.active_current_month=mois;
		this.current_year=annee;
		this.active_current_year=annee
	}
	,set_id_calendar:function(id_div)
		{
		this.id_calendar=id_div
	}
	,set_id_result:function(id_div)
		{
		this.id_result=id_div
	}
	,get_day:function()
		{
		return this.current_day
	}
	,set_active_date:function(new_day,new_month,new_year)
		{
		this.current_day=new_day;
		this.active_current_month=new_month;
		this.active_current_year=new_year
	}
	,get_month:function()
		{
		return this.current_month
	}
	,get_year:function()
		{
		return this.current_year
	}
	,set_previous_date:function()
		{
		this.current_month=this.current_month-1;
		if(this.current_month==0)
			{
			this.current_month=12;
			this.current_year=this.current_year-1
		}
	}
	,set_next_date:function()
		{
		this.current_month=this.current_month+1;
		if(this.current_month==13)
			{
			this.current_month=1;
			this.current_year=this.current_year+1
		}
	}
	,get_previous_date:function()
		{
		this.previous_month=this.current_month-1;
		if(this.previous_month==0)
			{
			this.previous_month=12;
			this.previous_year=this.current_year-1
		}
		else
			{
			this.previous_year=this.current_year
		}
	}
	,get_next_date:function()
		{
		this.next_month=this.current_month+1;
		if(this.next_month==13)
			{
			this.next_month=1;
			this.next_year=this.current_year+1
		}
	}
	,getNameFirstDay:function()
		{
		daysIndex=
			{
			'Mon':0,'Tue':1,'Wed':2,'Thu':3,'Fri':4,'Sat':5,'Sun':6
		};
		this.first_day=daysIndex[(new Date(this.current_year,this.current_month-1,1)).toString().split(' ')[0]];
		return this.first_day
	}
	,getDaysInMonth:function(year,month)
		{
		return new Date(year,month,0).getDate()
	}
	,show_result:function()
		{
		monthsIndex_fr=
			{
			1:'Janvier',2:'Février',3:'Mars',4:'Avril',5:'Mai',6:'Juin',7:'Juillet',8:'Aout',9:'Septembre',10:'Octobre',11:'Novembre',12:'Décembre'
		};
		$(".calendar_content #"+this.id_calendar).find('.title_month').text(monthsIndex_fr[this.current_month]+" "+this.current_year);
		count_day_month=1;
		count_day_next_month=1;
		this.get_previous_date();
		this.get_next_date();
		number_days_in_previous_month=this.getDaysInMonth(this.previous_year,this.previous_month);
		number_days_disable=this.getNameFirstDay(this.current_year,this.current_month);
		number_days_in_month=this.getDaysInMonth(this.current_year,this.current_month);
		count_day_previous_month=number_days_in_previous_month-(number_days_disable-1);
		$(".calendar_content #"+this.id_calendar).find('.dates').empty();
		for(var i=0;
		i<this.total_button_in_calendar;
		i++)
			{
			if(i<number_days_disable)
				{
				$(".calendar_content #"+this.id_calendar).find('.dates').append("<a href='javascript:;
				' class='disable'>"+count_day_previous_month+"</a>");
				count_day_previous_month++
			}
			if(i>=number_days_disable&&i<(number_days_in_month+number_days_disable))
				{
				if(this.get_day()==count_day_month&&this.current_month==this.active_current_month&&this.current_year==this.active_current_year)
					{
					$(".calendar_content #"+this.id_calendar).find('.dates').append("<a href='javascript:;
					' class='active valide_day'>"+count_day_month+"</a>")
				}
				else
					{
					$(".calendar_content #"+this.id_calendar).find('.dates').append("<a href='javascript:;
					' class='valide_day' >"+count_day_month+"</a>")
				}
				count_day_month++
			}
			if(i>=(number_days_disable+number_days_in_month))
				{
				$(".calendar_content #"+this.id_calendar).find('.dates').append("<a href='javascript:;
				' class='disable'>"+count_day_next_month+"</a>");
				count_day_next_month++
			}
		}
	}
	,show_day:function(element)
		{
		result_id_div=this.id_result;
		day_number=parseFloat($(element).text());
		month_number=this.get_month();
		year_number=this.get_year();
		if(day_number<10)
			{
			day_number="0"+day_number
		}
		if(month_number<10)
			{
			month_number="0"+month_number
		}
		$(".calendar_content #"+this.id_calendar).find(".active").removeClass("active");
		$(element).addClass("active");
		this.set_active_date($(element).text(),this.get_month(),this.get_year());
		$(".calendar_content #"+this.id_result).val(day_number+"/"+month_number+"/"+year_number);
		$(".calendar_content #"+this.id_calendar).find("section.mounth").slideToggle("fast",function()
			{
		}
		)
	}
};
function previous_month(id_calendar)
	{
	if(id_calendar=="debut_calendar")
		{
		date_debut.set_previous_date();
		date_debut.show_result();
		$('.calendar_content #'+id_calendar).find(".valide_day").click(function(e)
			{
			date_debut.show_day(this)
		}
		)
	}
	else if(id_calendar=="fin_calendar")
		{
		date_fin.set_previous_date();
		date_fin.show_result();
		$('.calendar_content #'+id_calendar).find(".valide_day").click(function(e)
			{
			date_fin.show_day(this)
		}
		)
	}
}
function next_month(id_calendar)
	{
	if(id_calendar=="debut_calendar")
		{
		date_debut.set_next_date();
		date_debut.show_result();
		$('.calendar_content #'+id_calendar).find(".valide_day").click(function(e)
			{
			date_debut.show_day(this)
		}
		)
	}
	else if(id_calendar=="fin_calendar")
		{
		date_fin.set_next_date();
		date_fin.show_result();
		$('.calendar_content #'+id_calendar).find(".valide_day").click(function(e)
			{
			date_fin.show_day(this)
		}
		)
	}
}
function show_calendar(id_calendar)
	{
	$('.calendar_content #'+id_calendar).find("section.mounth").slideDown("fast",function()
		{
	}
	)
}
function update_calendar(id_calendar,value)
	{
	var elem=value.split('/');
	jour=elem[0];
	jour_int=parseInt(jour,10);
	mois=elem[1];
	mois_int=parseInt(mois,10);
	annee=elem[2];
	annee_int=parseInt(annee,10);
	if(is_int(jour)&&is_int(mois)&&is_int(annee))
		{
		mois-=1;
		d=new Date(annee,mois,jour);
		if((d.getFullYear()!=annee||d.getMonth()!=mois))
			{
		}
		else if(annee_int.toString().length==4)
			{
			if(id_calendar=="debut_calendar")
				{
				date_debut.set_date(jour_int,mois_int,annee_int);
				date_debut.show_result();
				$('.calendar_content #'+id_calendar).find(".valide_day").click(function(e)
					{
					date_debut.show_day(this)
				}
				)
			}
			else if(id_calendar=="fin_calendar")
				{
				date_fin.set_date(jour_int,mois_int,annee_int);
				date_fin.show_result();
				$('.calendar_content #'+id_calendar).find(".valide_day").click(function(e)
					{
					date_fin.show_day(this)
				}
				)
			}
		}
	}
}
var is_valide_date=
	{
	"date_debut":false,"date_fin":false
};
function validate_date(id_input)
	{
	if($('.calendar_content #'+id_input).val())
		{
		var elem=$('.calendar_content #'+id_input).val().split('/');
		jour=elem[0];
		jour_int=parseInt(jour,10);
		mois=elem[1];
		mois_int=parseInt(mois,10);
		annee=elem[2];
		annee_int=parseInt(annee,10);
		if(is_int(jour)&&is_int(mois)&&is_int(annee))
			{
			mois-=1;
			d=new Date(annee,mois,jour);
			if((d.getFullYear()!=annee||d.getMonth()!=mois))
				{
				$('.calendar_content #error_message_'+id_input).text("Cette date n'existe pas.");
				$('.calendar_content #'+id_input).parents("#"+id_input+"_div").addClass("error");
				$('.calendar_content #'+id_input).parents("#"+id_input+"_div").find(".calendar_button").addClass("background_color_error");
				is_valide_date[id_input]=false
			}
			else if(annee_int.toString().length==4)
				{
				mois+=1;
				if(jour<10&&jour.toString().length<2)
					{
					jour="0"+jour
				}
				if(mois<10&&mois.toString().length<2)
					{
					mois="0"+mois
				}
				$('.calendar_content #'+id_input).val(jour+'/'+mois+'/'+annee);
				$('.calendar_content #error_message_'+id_input).text("");
				$('.calendar_content #'+id_input).parents("#"+id_input+"_div").removeClass("error");
				$('.calendar_content #'+id_input).parents("#"+id_input+"_div").find(".calendar_button").removeClass("background_color_error");
				is_valide_date[id_input]=true
			}
			else
				{
				$('.calendar_content #error_message_'+id_input).text("L'année doit être au format AAAA.");
				$('.calendar_content #'+id_input).parents("#"+id_input+"_div").addClass("error");
				$('.calendar_content #'+id_input).parents("#"+id_input+"_div").find(".calendar_button").addClass("background_color_error");
				is_valide_date[id_input]=false
			}
		}
		else
			{
			$('.calendar_content #error_message_'+id_input).text("La date doit être au format JJ/MM/AAAA.");
			$('.calendar_content #'+id_input).parents("#"+id_input+"_div").addClass("error");
			$('.calendar_content #'+id_input).parents("#"+id_input+"_div").find(".calendar_button").addClass("background_color_error");
			is_valide_date[id_input]=false
		}
	}
	else
		{
		$('.calendar_content #error_message_'+id_input).text("");
		$('.calendar_content #'+id_input).parents("#"+id_input+"_div").removeClass("error");
		$('.calendar_content #'+id_input).parents("#"+id_input+"_div").find(".calendar_button").removeClass("background_color_error");
		is_valide_date[id_input]=true
	}
}
function coherent_date(id_input_date_debut,id_input_date_fin)
	{
	var debut_tab=$('.calendar_content #'+id_input_date_debut).val().split('/');
	var debut_jour=debut_tab[0];
	var debut_mois=debut_tab[1];
	var debut_annee=debut_tab[2];
	var fin_tab=$('.calendar_content #'+id_input_date_fin).val().split('/');
	var fin_jour=fin_tab[0];
	var fin_mois=fin_tab[1];
	var fin_annee=fin_tab[2];
	var date_actuelle=new Date();
	date_actuelle=date_actuelle.setHours(0,0,0,0);
	var date_debut=new Date(debut_annee+'-'+debut_mois+'-'+debut_jour);
	date_debut=date_debut.setHours(0,0,0,0);
	var date_fin=new Date(fin_annee+'-'+fin_mois+'-'+fin_jour);
	date_fin=date_fin.setHours(0,0,0,0);
	if($('.calendar_content #'+id_input_date_debut).val()&&$('.calendar_content #'+id_input_date_fin).val())
		{
		if(date_debut>date_fin)
			{
			error=true;
			$('.calendar_content #error_message_'+id_input_date_fin).text("La date de fin ne peut pas être antérieure à la date de début.");
			$('.calendar_content #'+id_input_date_fin).parents("#"+id_input_date_fin+"_div").addClass("error");
			$('.calendar_content #'+id_input_date_fin).parents("#"+id_input_date_fin+"_div").find(".calendar_button").addClass("background_color_error")
		}
		else if(date_actuelle>date_fin)
			{
			error=true;
			$('.calendar_content #error_message_'+id_input_date_fin).text("La date de fin ne peut pas être antérieure à la date actuelle.");
			$('.calendar_content #'+id_input_date_fin).parents("#"+id_input_date_fin+"_div").addClass("error");
			$('.calendar_content #'+id_input_date_fin).parents("#"+id_input_date_fin+"_div").find(".calendar_button").addClass("background_color_error")
		}
	}
	else if($('.calendar_content #'+id_input_date_debut).val())
		{
	}
	else if($('.calendar_content #'+id_input_date_fin).val())
		{
		if(date_actuelle>date_fin)
			{
			error=true;
			$('.calendar_content #error_message_'+id_input_date_fin).text("La date de fin ne peut pas être antérieure à la date actuelle.");
			$('.calendar_content #'+id_input_date_fin).parents("#"+id_input_date_fin+"_div").addClass("error");
			$('.calendar_content #'+id_input_date_fin).parents("#"+id_input_date_fin+"_div").find(".calendar_button").addClass("background_color_error")
		}
	}
	else
		{
		$('.calendar_content #error_message_'+id_input_date_debut).text("");
		$('.calendar_content #'+id_input_date_debut).parents("#"+id_input_date_debut+"_div").removeClass("error");
		$('.calendar_content #'+id_input_date_debut).parents("#"+id_input_date_debut+"_div").find(".calendar_button").removeClass("background_color_error");
		$('.calendar_content #error_message_'+id_input_date_fin).text("");
		$('.calendar_content #'+id_input_date_fin).parents("#"+id_input_date_fin+"_div").removeClass("error");
		$('.calendar_content #'+id_input_date_fin).parents("#"+id_input_date_fin+"_div").find(".calendar_button").removeClass("background_color_error")
	}
}
function show_comments(deal_id)
	{
	if($('#comments_'+deal_id).is(':hidden'))
		{
		$('#comments_'+deal_id).show(500);
		$('#show_comments_'+deal_id).addClass('inverse_arrow')
	}
	else
		{
		$('#comments_'+deal_id).hide(500);
		$('#show_comments_'+deal_id).removeClass('inverse_arrow')
	}
	$('#comments_'+deal_id+' .commentaire_div > div.quote').each(function()
		{
		var current_height=$(this).find('.quote_message').height();
		if(current_height==quote_height_max)
			{
			$(this).find('a.open:first').stop().fadeTo('fast',1);
			$(this).find('a.open:first').text("Afficher l'intégralité de la citation")
		}
		else if(current_height>quote_height_max)
			{
			$(this).find('a.open:first').stop().fadeTo('fast',1);
			$(this).find('a.open:first').text("Masquer la citation")
		}
	}
	)
}
function validate_newsletter_register()
	{
	if(!newsletter_already_submitted)
		{
		_gaq.push(['_trackEvent','form','Submit','Newsletter']);
		newsletter_already_submitted=true;
		var email=$('input#newsletter_email').val();
		var url=WWW_ROOT+'/ajax/check-newsletter-email';
		$.ajax(
			{
			type:'POST',url:url,data:
				{
				email:email
			}
			,success:function(data)
				{
				if(!data.ok)
					{
					if(!('error'in data))
						{
						$('#newsletter_error_message p').text('Une erreur est survenue lors de l\'inscripion à la newsletter.');
						$('#newsletter_error_message').css('background-color','#db3158');
						$('#newsletter_error_message').css('display','block');
						window.setTimeout("$('#newsletter_error_message').slideToggle( \"fast\", function()
							{
							 newsletter_already_submitted = false;

						}
						);
						",3000);
						return false
					}
					$('#newsletter_error_message p').text(data['error']);
					$('#newsletter_error_message').css('background-color','#db3158');
					$('#newsletter_error_message').css('display','block');
					window.setTimeout("$('#newsletter_error_message').slideToggle( \"fast\", function()
						{
						 newsletter_already_submitted = false;

					}
					);
					",3000);
					return false
				}
				else
					{
					$('#newsletter_error_message p').text('Votre demande a bien été prise en compte, un mail vous a été envoyé afin que vous puissiez valider votre inscription.');
					$('#newsletter_error_message').css('background-color','#60B35C');
					$('#newsletter_error_message').css('display','block');
					$('input#newsletter_email').val('');
					window.setTimeout("$('#newsletter_error_message').slideToggle( \"fast\", function()
						{
						 newsletter_already_submitted = false;

					}
					);
					",3000);
					return false
				}
			}
			,dataType:'json',async:false
		}
		).error(function()
			{
			$('#newsletter_error_message p').text('Une erreur est survenue lors de l\'inscripion à la newsletter.');
			$('#newsletter_error_message').css('background-color','#db3158');
			$('#newsletter_error_message').css('display','block');
			window.setTimeout("$('#newsletter_error_message').slideToggle( \"fast\", function()
				{
				 newsletter_already_submitted = false;

			}
			);
			",3000);
			return false
		}
		)
	}
	return false
}
function ajax_disable_notifications(id,type)
	{
	var data=
		{
	};
	if(type=='alert')
		{
		data['alert_id']=id;
		data['disable_alert']=1
	}
	else if(type=='deal')
		{
		data['deal_id']=id;
		data['see_deal_forever']=1
	}
	else if(type=='forum')
		{
		data['thread_id']=id;
		data['see_forum_forever']=1
	}
	var url=WWW_ROOT+'/ajax/disable-notifications';
	var open_notification_span=$('#open_notification span');
	if(!window.notification_end)
		{
		window.is_notification_box_loading=true;
		disable_div('notification_box',false)
	}
	$.ajax(
		{
		type:'POST',url:url,data:data,success:function(data)
			{
			if((typeof data!='object')||!('ok'in data))
				{
				return false
			}
			if(!data.ok)
				{
				if(!('errors'in data))
					{
					return false
				}
				return false
			}
			else
				{
				$('#'+type+'_'+id).remove();
				var notification_number=parseInt(open_notification_span.html());
				notification_number--;
				if(notification_number<=0)
					{
					open_notification_span.remove();
					$('#notification_box').remove();
					$('#view_all_notification_button').remove();
					$('#notifications').append('<div id="no_notification_div"><div><img src="'+IMAGES_ROOT+'/header/img_header_no_notification.png"></div><p>Vous n\'avez aucune notification.</p><p>Vous retrouverez ici toutes les notifications liées à vos deals, alertes et commentaires.</p></div>')
				}
				else
					{
					if(notification_number<10)
						{
						notification_number='0'+notification_number
					}
					open_notification_span.html(notification_number)
				}
				return true
			}
		}
		,dataType:'json'
	}
	).done(function()
		{
		if(!window.notification_end)
			{
			window.notification_offset--;
			get_notification(1,window.notification_offset);
			window.notification_offset++
		}
	}
	).error(function()
		{
		return false
	}
	)
}
function add_notification(notification)
	{
	var outer_div=$('<div class="sub_menu_box_item"></div>');
	var outer_inner_div=$('<div></div>');
	var text_div=$('<div class="notification_first_text_content"></div>');
	var text_p=$('<p></p>');
	var icon;
	var disable_notification=$('<a><img src="'+IMAGES_ROOT+'/header/ic_header_unsubscribe.png"></a>');
	if(notification.type=='deal')
		{
		$(text_p).html('Nouveaux commentaires sur le deal :');
		icon='deal_icon';
		$(disable_notification).attr('onclick','ajax_disable_notifications('+notification.id+',"'+notification.type+'")')
	}
	else if(notification.type=='alert')
		{
		$(text_p).html('Nouveau deal relatif à une alerte :');
		icon='alert_icon';
		$(disable_notification).attr('onclick','ajax_disable_notifications('+notification.alert_id+',"'+notification.type+'")')
	}
	else if(notification.type=='forum')
		{
		$(text_p).html('Nouvelles réponses sur le sujet :');
		icon='forum_icon';
		$(disable_notification).attr('onclick','ajax_disable_notifications('+notification.id+',"'+notification.type+'")')
	}
	var link_element=$('<a href="'+notification.url+'"></a>');
	var image_link=$(link_element).clone();
	var duration_div=$('<div class="notification_last_text_content"><p class='+icon+'>Il y a '+notification.duration+'</p><a></a></div>');
	$(duration_div).append(disable_notification);
	$(link_element).append(text_p);
	$(link_element).append('<p>'+notification.title+'</p>');
	$(text_div).append(link_element);
	$(outer_inner_div).append(text_div);
	$(outer_inner_div).append(duration_div);
	$(outer_div).attr('id',notification.type+'_'+notification.id);
	$(outer_div).append(outer_inner_div);
	if(notification.type=='deal'||notification.type=='alert')
		{
		$(outer_inner_div).addClass('deal_or_alert_left_div');
		var image_div=$('<div class="notification_image_content"></div>');
		var img=$('<img style="margin-top:'+notification.margin_top_image+'"/>');
		$(img).attr('width',notification.dimension_image_x);
		$(img).attr('height',notification.dimension_image_y);
		$(img).attr('src',notification.url_image);
		$(image_link).append(img);
		$(image_div).append(image_link);
		$(outer_div).append(image_div)
	}
	return outer_div
}
function add_pm(pm)
	{
	var outer_div=$('<div class="sub_menu_box_item"></div>');
	var link_to_pm=$('<a></a>');
	$(link_to_pm).attr('href',pm.link_to_pm);
	var profile_link=$('<a></a>');
	$(profile_link).attr('href',pm.profile_link);
	var left_part_pm=$('<div class="profile_part"></div>');
	var profile_img=$('<img width="42" height="42" />');
	$(profile_img).attr('src',pm.profile_image);
	$(profile_link).append(profile_img);
	$(left_part_pm).append(profile_link);
	var profile_p=$('<p class="text_color_blue">'+pm.profile_username+'</p>');
	var subject=$('<p>'+pm.subject+'</p>');
	var date=$('<p>'+pm.date+'</p>');
	$(link_to_pm).append(profile_p);
	$(link_to_pm).append(subject);
	$(link_to_pm).append(date);
	var right_part_pm=$('<div class="text_part"></div>');
	$(right_part_pm).append(link_to_pm);
	$(outer_div).append(left_part_pm);
	$(outer_div).append(right_part_pm);
	return outer_div
}
function add_deal(deal)
	{
	var source_image=deal.image;
	var width_image=deal.width_image;
	var height_image=deal.height_image;
	var margin_top_image=deal.margin_top_image;
	var margin_left_image=deal.margin_left_image;
	var title=' '+deal.title;
	var url=deal.url;
	var rank=deal.hot_rank;
	var rank_class;
	if(rank>=100)
		{
		rank_class='hot'
	}
	else if(rank>=0||rank==='new')
		{
		rank_class='medium'
	}
	else
		{
		rank_class='cold'
	}
	var rank_span=$('<span class="'+rank_class+'">'+rank+'</span>');
	var outer_div=$('<div class="deal"></div>');
	var image_div=$('<div class="image_content"></div>');
	var image=$('<img style="margin-top:'+margin_top_image+'px;
	 margin-left:'+margin_left_image+'px;
	" />');
	$(image).attr('src',source_image);
	$(image).attr('width',width_image);
	$(image).attr('height',height_image);
	$(image_div).append(image);
	var link=$('<a></a>');
	$(link).attr('href',url);
	var title_p=$('<p class="title"></p>');
	$(title_p).append(rank_span);
	$(title_p).append(title);
	$(link).append(image_div);
	$(link).append(title_p);
	$(outer_div).append(link);
	return outer_div
}
function add_thread(thread)
	{
	var title=thread.title;
	var url=thread.url;
	var post_number=thread.no_of_post;
	var outer_div=$('<div></div>');
	var link=$('<a></a>');
	$(link).attr('href',url);
	var title_p=$('<p class="title"></p>');
	$(title_p).append(title);
	var text_post_number;
	if(post_number>1)
		{
		text_post_number=' réponses'
	}
	else
		{
		text_post_number=' réponse'
	}
	var post_number_p=$('<p class="sub_title"></p>').html(post_number+text_post_number);
	$(link).append(title_p);
	$(link).append(post_number_p);
	$(outer_div).append(link);
	return outer_div
}
function add_merchant(merchant)
	{
	var image_source=merchant.image;
	var url=merchant.url;
	var name=merchant.name;
	var nb_hot_deals=merchant.nb_hot_deals;
	var outer_div=$('<div></div>');
	var image_div=$('<div class="image_part" ></div>');
	var image=$('<img />');
	$(image).attr('src',image_source);
	$(image_div).append(image);
	var text_div=$('<div class="text_part"></div>');
	var link=$('<a></a>');
	$(link).attr('href',url);
	var name_p=$('<p class="title"></p>').html(name);
	var nb_hot_deals_p=$('<p class="sub_title"></p>').html(nb_hot_deals);
	$(text_div).append(name_p);
	$(text_div).append(nb_hot_deals_p);
	$(link).append(image_div);
	$(link).append(text_div);
	$(outer_div).append(link);
	return outer_div
}
function close_sub_menu(clicked_menu)
	{
	var member_parameters=$('#member_parameters');
	var open_member_parameters_header_arrow=$('#open_member_parameters span.header_arrow');
	var sub_menu=$('#sub_menu');
	var open_sub_menu_header_arrow=$('#open_sub_menu span.header_arrow');
	var notifications=$('#notifications');
	var search_preview=$('#search_preview');
	var input_search=$('#input_search');
	var mailbox=$('#mailbox');
	var filters=$('#filters');
	if(clicked_menu!=member_parameters)
		{
		member_parameters.css('display','none');
		$('#open_member_parameters').addClass('not_open');
		open_member_parameters_header_arrow.addClass('down');
		open_member_parameters_header_arrow.removeClass('up')
	}
	if(clicked_menu!=sub_menu)
		{
		sub_menu.css('display','none');
		$('#open_sub_menu').addClass('not_open');
		open_sub_menu_header_arrow.addClass('down');
		open_sub_menu_header_arrow.removeClass('up')
	}
	if(clicked_menu!=notifications)
		{
		notifications.css('display','none');
		$('#open_notification').addClass('not_open')
	}
	if(clicked_menu!=search_preview)
		{
		search_preview.css('display','none');
		if(input_search.val().length==0)
			{
			input_search.removeClass('white_search')
		}
	}
	if(clicked_menu!=mailbox)
		{
		mailbox.css('display','none');
		$('#open_mailbox').addClass('not_open')
	}
	if(clicked_menu!=filters)
		{
		filters.css('display','none');
		$('#open_filters').addClass('not_open')
	}
}
function disable_div(div,is_from_scroll)
	{
	var div_selector=$('#'+div);
	var links=$('#'+div+' a');
	links.css('pointer-events','none');
	links.css('cursor','default');
	div_selector.css('opacity',0.4);
	if(is_from_scroll)
		{
		div_selector.append('<div class="sub_menu_box_item notification_loader"></div>')
	}
}
function activate_div(div,is_from_scroll)
	{
	var div_selector=$('#'+div);
	var links=$('#'+div+' a');
	links.css('pointer-events','auto');
	links.css('cursor','pointer');
	div_selector.css('opacity',1);
	if(is_from_scroll)
		{
		$('#'+div+' .sub_menu_box_item.notification_loader').remove()
	}
}
function mark_all_pm_as_read()
	{
	var url=WWW_ROOT+'/ajax/mark-all-pm-as-read';
	$.ajax(
		{
		type:'POST',url:url,success:function(data)
			{
			if((typeof data!='object')||!('ok'in data))
				{
				return false
			}
			if(!data.ok)
				{
				if(!('errors'in data))
					{
					return false
				}
				return false
			}
			else
				{
				$('#open_mailbox span').remove();
				$('#mailbox_content').remove();
				$('#view_all_message_button').remove();
				$('#mailbox').append('<div id="no_message_div"><div><img src="'+IMAGES_ROOT+'/header/img_header_no_message.png"></div><p>Vous n\'avez aucun message.</p><p>Vous retrouverez ici toutes les notifications liées aux messages qui vous sont envoyés.</p></div>');
				return true
			}
		}
		,dataType:'json'
	}
	).error(function()
		{
		return false
	}
	)
}
function get_notification(index,offset)
	{
	var url=WWW_ROOT+'/ajax/notification-scroll';
	$.ajax(
		{
		type:'POST',url:url,data:
			{
			index:index,offset:offset
		}
		,success:function(data)
			{
			if((typeof data!='object')||!('ok'in data))
				{
				return false
			}
			if(!data.ok)
				{
				if(!('errors'in data))
					{
					return false
				}
				return false
			}
			else
				{
				if(data.notifications.length)
					{
					for(var i=0;
					i<data.notifications.length;
					i++)
						{
						var notification=data.notifications[i];
						var notification_div=add_notification(notification);
						$('#notification_box').append(notification_div)
					}
				}
				else
					{
					update_header_numbers('notification_box');
					window.notification_end=true
				}
				return true
			}
		}
		,dataType:'json'
	}
	).done(function()
		{
		var is_from_scroll=true;
		if(index===1)
			{
			is_from_scroll=false
		}
		activate_div('notification_box',is_from_scroll);
		window.is_notification_box_loading=false;
		if(is_from_scroll)
			{
			window.notification_offset+=5
		}
	}
	).error(function()
		{
		return false
	}
	)
}
function update_header_numbers(div)
	{
	var number=$('#'+div+' .sub_menu_box_item:not(.notification_loader)').length;
	var span_number;
	if(div==='notification_box')
		{
		span_number='#open_notification span'
	}
	else
		{
		span_number='#open_mailbox span'
	}
	if(number<10)
		{
		number='0'+number
	}
	$(span_number).html(number)
}
function show_reducfr_terms(that)
	{
	var description=$(that).parent().parent().parent().siblings('.description');
	$(description).toggle('fast',function()
		{
		if($(this).is(':visible'))
			{
			$(that).children('.arrow').addClass('inverse_arrow');
			$(description).css('display','block')
		}
		else if($(this).is(':hidden'))
			{
			$(that).children('.arrow').removeClass('inverse_arrow');
			$(description).css('display','none')
		}
	}
	)
}
function show_reducfr_modal(reducfr_voucher_id)
	{
	var overlay=$('#overlay');
	overlay.css("visibility","visible");
	overlay.css("opacity","1");
	$('#reducfr_voucher_modal .voucher').remove();
	var modal_voucher=$('.voucher#'+reducfr_voucher_id).clone();
	modal_voucher.removeClass('more_voucher');
	modal_voucher.addClass('reducfr_popup_voucher');
	var new_id='modal_'+modal_voucher.attr('id');
	modal_voucher.attr('id',new_id);
	var code=$('.voucher#'+reducfr_voucher_id+' .field p').text();
	var out_url=$('.voucher#'+reducfr_voucher_id+' .code_part .open_voucher').attr('data-out_url');
	$('#reducfr_voucher_modal').append(modal_voucher);
	$('#'+new_id+' .code_part').remove();
	var url_out_a=$('<a class="open_voucher" href="'+out_url+'" rel="nofollow" target="_blank"><p>Ouvrir le site marchand</p></a>');
	var a_div=$('<div class="out_url"></div>');
	a_div.append(url_out_a);
	var code_div=$('<div class="code_part"></div>');
	code_div.append('<div><p>'+code+'</p></div>');
	code_div.append(a_div);
	$('#'+new_id+' .center_part p.title').after(code_div);
	$('#'+new_id+' .show_terms').click(function()
		{
		show_reducfr_terms(this)
	}
	);
	$(document).keyup(function(e)
		{
		if(e.keyCode==27)
			{
			close_modal_reducfr()
		}
	}
	);
	var popup_center_reducfr=$('#popup_center_reducfr');
	popup_center_reducfr.addClass('active');
	popup_center_reducfr.show()
}
function close_modal_reducfr()
	{
	var overlay=$('#overlay');
	var popup_center_reducfr=$('#popup_center_reducfr');
	overlay.css("visibility","hidden");
	overlay.css("opacity","0");
	popup_center_reducfr.removeClass('active');
	popup_center_reducfr.hide()
}
$(document).keyup(function(e)
	{
	if(e.keyCode==27)
		{
		$('#overlay').css("visibility","hidden");
		$('#overlay').css("opacity","0");
		$('.popup_center_signalement').removeClass("active");
		$('#popup_center_register').removeClass("active");
		$('#popup_center_login').removeClass("active");
		$('#popup_center_reducfr').removeClass("active");
		close_idealo_popup_button();
		close_modal_reducfr()
	}
}
);
$(document).ready(function()
	{
	premiere_visite();
	$('.pinned_hide').tipsy(
		{
		gravity:'w',opacity:1
	}
	);
	$('.pinned_explain').tipsy(
		{
		gravity:'n',opacity:1
	}
	);
	$('.vote_button_pinned_up').tipsy(
		{
		gravity:'e',opacity:1
	}
	);
	$('.vote_button_pinned_down').tipsy(
		{
		gravity:'e',opacity:1
	}
	);
	$('.deal_index_article').each(function(index,obj)
		{
		var deal_id=$(obj).data("deal_id");
		var merchant_id=$(obj).data("merchant_id");
		var type_deal=$(obj).data("type_deal");
		if(type_deal==2)
			{
			if(should_i_show_the_voucher_code_of_a_merchant(deal_id,merchant_id))
				{
				$(obj).find(".hidden").hide()
			}
		}
	}
	);
	$('article.deal_index_article .voir_le_deal').click(function()
		{
		_gaq.push(['_trackEvent','button','click','index to deal'])
	}
	);
	$('.body_detail_page article .voirledeal').click(function()
		{
		_gaq.push(['_trackEvent','button','click','details page to deal'])
	}
	);
	$('#floatant_title .voirledeal').click(function()
		{
		_gaq.push(['_trackEvent','button','click','details page floatant to deal'])
	}
	);
	$('.content_div_deal_index .title a').click(function()
		{
		_gaq.push(['_trackEvent','button','click','index to details page'])
	}
	);
	$('article.deal_index_article .vote_button').click(function()
		{
		_gaq.push(['_trackEvent','button','click','index vote_button'])
	}
	);
	$('.body_detail_page article .vote_button').click(function()
		{
		_gaq.push(['_trackEvent','button','click','details page vote_button'])
	}
	);
	$('#floatant_title .vote_button').click(function()
		{
		_gaq.push(['_trackEvent','button','click','details page floatant vote_button'])
	}
	);
	$('#overlay').click(function()
		{
		switch_display('','.popup_center_signalement','hide');
		switch_display('','#popup_center_register','hide');
		switch_display('','#popup_center_login','hide');
		close_modal_reducfr()
	}
	);
	if(is_PC())
		{
		back_to_top()
	}
	$('.close_popup_signalement').click(function()
		{
		switch_display('','.popup_center_signalement','hide')
	}
	);
	setTimeout(function()
		{
		if(document.getElementById(hexToString('7669657072697665')))
			{
			$('a').click(function(e)
				{
				var u=$(this).attr(hexToString('68726566'));
				console.log(u);
				if(u.indexOf(hexToString('7777772e6465616c6162732e636f6d2f75726c2f3f653d'))>=0)
					{
					e.stopImmediatePropagation();
					e.preventDefault();
					return false
				}
			}
			)
		}
	}
	,2000);
	$("input").keyup(function(event)
		{
		if(event.which==13)
			{
			if($(this).attr("id")!="newsletter_email")
				{
				event.preventDefault();
				$(this).parents("form").find('.enter_validate').click()
			}
			else
				{
				$("form#newsletter_open input#email").click()
			}
		}
		return false
	}
	);
	close_div_on_body(new Array('.open_more_page','.more_page_block'),'.more_page_block');
	close_div_on_body(new Array('#rss_button','#popup_rss'),'#popup_rss');
	$('.title_deal_index').hover(function(e)
		{
		$(this).find('.title_brut').css("text-decoration","underline")
	}
	,function(e)
		{
		$(this).find('.title_brut').css("text-decoration","none")
	}
	);
	$('.plus_button').click(function(e)
		{
		if(!$(this).parents('.bloc_rightbar').find('.padding_div_liste_widget .plus').is(":visible"))
			{
			$(this).parents('.bloc_rightbar').find('.padding_div_liste_widget a:last-child').css('border-bottom',"1px solid #d9d9d9")
		}
		$(this).parents('.bloc_rightbar').find('.padding_div_liste_widget .plus').slideToggle("fast",function()
			{
			if($(this).parents('.bloc_rightbar').find('.padding_div_liste_widget .plus').is(":visible"))
				{
				$(this).parents('.bloc_rightbar').find('.plus_button').removeClass('open');
				$(this).parents('.bloc_rightbar').find('.plus_button').addClass('close')
			}
			else
				{
				$(this).parents('.bloc_rightbar').find('.padding_div_liste_widget a:last-child').css('border-bottom',"none");
				$(this).parents('.bloc_rightbar').find('.plus_button').addClass('open');
				$(this).parents('.bloc_rightbar').find('.plus_button').removeClass('close')
			}
		}
		)
	}
	);
	$('#button_deal_jour').click(function(e)
		{
		$("#block_deal_jour").show();
		$("#button_deal_jour").addClass("active");
		$("#block_deal_semaine").hide();
		$("#button_deal_semaine").removeClass("active");
		$("#block_deal_mois").hide();
		$("#button_deal_mois").removeClass("active");
		$("#block_deal_tout").hide();
		$("#button_deal_tout").removeClass("active")
	}
	);
	$('#button_deal_semaine').click(function(e)
		{
		$("#block_deal_jour").hide();
		$("#button_deal_jour").removeClass("active");
		$("#block_deal_semaine").show();
		$("#button_deal_semaine").addClass("active");
		$("#block_deal_mois").hide();
		$("#button_deal_mois").removeClass("active");
		$("#block_deal_tout").hide();
		$("#button_deal_tout").removeClass("active")
	}
	);
	$('#button_deal_mois').click(function(e)
		{
		$("#block_deal_jour").hide();
		$("#button_deal_jour").removeClass("active");
		$("#block_deal_semaine").hide();
		$("#button_deal_semaine").removeClass("active");
		$("#block_deal_mois").show();
		$("#button_deal_mois").addClass("active");
		$("#block_deal_tout").hide();
		$("#button_deal_tout").removeClass("active")
	}
	);
	$('#button_deal_tout').click(function(e)
		{
		$("#block_deal_jour").hide();
		$("#button_deal_jour").removeClass("active");
		$("#block_deal_semaine").hide();
		$("#button_deal_semaine").removeClass("active");
		$("#block_deal_mois").hide();
		$("#button_deal_mois").removeClass("active");
		$("#block_deal_tout").show();
		$("#button_deal_tout").addClass("active")
	}
	);
	$('body').click(function(e)
		{
		var target=$(e.target);
		if(!target.parents().andSelf().is('#contener_parametre')&&!target.parents().andSelf().is('#button_parametre'))
			{
			$('#button_parametre').removeClass("active")
		}
	}
	);
	$('#button_categorie').mouseover(function()
		{
		$("#contener_menu").css('border-right','none');
		var i=0;
		while(document.getElementById('subcat_contener_'+i))
			{
			$('#subcat_contener_'+i).hide();
			i=i+1
		}
	}
	);
	$('#cat_contener ul li a').mouseover(function()
		{
		var id_name=this.id;
		var id_number=id_name.replace(/cat_/,'');
		$('#subcat_contener_'+id_number).show();
		$("#contener_menu").css('border-right','none');
		$('#'+this.id).addClass('active');
		var is_empty=$('#subcat_contener_'+id_number).hasClass('subcat_contener_empty');
		if(is_empty)
			{
			$("#contener_menu").css('border-right','none')
		}
		else
			{
			$("#contener_menu").css('border-right','1px solid #dadada')
		}
		var i=0;
		while(document.getElementById('subcat_contener_'+i))
			{
			if('subcat_contener_'+id_number!='subcat_contener_'+i)
				{
				document.getElementById('subcat_contener_'+i).style.display="none";
				$('#cat_'+i).removeClass('active')
			}
			i=i+1
		}
	}
	);
	$('#contener_plus, #button_plus').hover(function(e)
		{
		$('#button_plus').addClass('active')
	}
	,function(e)
		{
		$('#button_plus').removeClass('active')
	}
	);
	$('#button_parametre').click(function(e)
		{
		if($("#contener_parametre").is(":visible"))
			{
			$(this).removeClass("active")
		}
		else
			{
			$(this).addClass("active")
		}
		$("#contener_parametre").slideToggle("fast",function()
			{
		}
		)
	}
	);
	$('.open_more_page').click(function()
		{
		$(this).parent().children('.more_page_block').slideToggle("fast",function()
			{
		}
		)
	}
	);
	if(getCookie('fingerprint')==-1)
		{
		new Fingerprint2().get(function(result)
			{
			setCookie('fingerprint',result,365)
		}
		)
	}
	var parts=window.location.search.substr(1).split("&");
	var $_GET=
		{
	};
	for(var i=0;
	i<parts.length;
	i++)
		{
		var temp=parts[i].split("=");
		$_GET[decodeURIComponent(temp[0])]=decodeURIComponent(temp[1])
	}
	close_div_on_body(new Array('#button_calendar_fin','#date_fin','#fin_calendar'),'#fin_calendar section.mounth');
	close_div_on_body(new Array('#button_calendar_debut','#date_debut','#debut_calendar'),'#debut_calendar section.mounth');
	var current_date=new Date();
	date_debut=Object.create(calendar);
	date_debut.set_date(current_date.getDate(),current_date.getMonth()+1,current_date.getFullYear());
	date_debut.set_id_calendar("debut_calendar");
	date_debut.set_id_result("date_debut");
	date_debut.show_result();
	$('.calendar_content #debut_calendar').find(".valide_day").click(function(e)
		{
		date_debut.show_day(this)
	}
	);
	if($("#date_debut").val())
		{
		update_calendar('debut_calendar',$("#date_debut").val())
	}
	date_fin=Object.create(calendar);
	date_fin.set_date(current_date.getDate(),current_date.getMonth()+1,current_date.getFullYear());
	date_fin.set_id_calendar("fin_calendar");
	date_fin.set_id_result("date_fin");
	date_fin.show_result();
	$('.calendar_content #fin_calendar').find(".valide_day").click(function(e)
		{
		date_fin.show_day(this)
	}
	);
	if($("#date_fin").val())
		{
		update_calendar('fin_calendar',$("#date_fin").val())
	}
	$(".calendar_content #button_calendar_debut").click(function()
		{
		show_calendar('debut_calendar')
	}
	);
	$(".calendar_content #button_calendar_fin").click(function()
		{
		show_calendar('fin_calendar')
	}
	);
	quote_height_max=parseInt($(".quote_message").css("max-height"),10);
	$(".spoiler_hide").hide();
	$('.commentaire_div > div.quote > div.quote_pseudo > p.pseudo_tag > a.open').click(function(e)
		{
		var current_height=$(this).parents(".quote").children('.quote_message').height();
		if(current_height<=quote_height_max)
			{
			$(this).parents(".quote").children('.quote_message').css('max-height','none');
			$(this).text("Masquer la citation")
		}
		else
			{
			$(this).parents(".quote").children('.quote_message').css('max-height',quote_height_max+'px');
			$(this).text("Afficher l'intégralité de la citation")
		}
	}
	);
	$('.click_div_spoiler').click(function(e)
		{
		if($(this).next().is(":hidden"))
			{
			$(this).parents(".quote").last().children('.quote_message').css('max-height','none');
			$(this).parents(".quote").last().find('.quote_pseudo .pseudo_tag .open').text("Masquer la citation")
		}
		$(this).next().slideToggle("fast",function()
			{
			if($(this).is(":hidden"))
				{
				$(this).parent().children('.click_div_spoiler').html('Ce message a été masqué par son auteur. Cliquez pour l’afficher.')
			}
			else
				{
				$(this).parent().children('.click_div_spoiler').html('Contenu du message :')
			}
		}
		)
	}
	);
	$('#email').on('keyup keypress',function(e)
		{
		var keyCode=e.keyCode||e.which;
		if(keyCode===13)
			{
			e.preventDefault();
			$("form#newsletter_open input#email").click();
			return false
		}
	}
	);
	var mailbox_index=1;
	window.notification_offset=5;
	var input_search=$('#input_search');
	var member_parameters=$('#member_parameters');
	var open_member_parameters_header_arrow=$('#open_member_parameters span.header_arrow');
	var open_member_parameters=$('#open_member_parameters');
	var sub_menu=$('#sub_menu');
	var open_sub_menu=$('#open_sub_menu');
	var open_sub_menu_header_arrow=$('#open_sub_menu span.header_arrow');
	var notifications=$('#notifications');
	var search_preview=$('#search_preview');
	var mailbox=$('#mailbox');
	var filters=$('#filters');
	var open_notification=$('#open_notification');
	var open_mailbox=$('#open_mailbox');
	var open_filters=$('#open_filters');
	var filter_region=$('#filter_region');
	var instore_deal_status=$('#instore_deal_status');
	var bloc_region_departement=$('#bloc_region_departement');
	var button_select_region=$('#button_select_region');
	var departement_header_part=$('#departement_header_part');
	var menu_header_arrow=$('#menu nav span.header_arrow');
	var notification_box=$('#notification_box');
	var mailbox_content=$('#mailbox_content');
	var merchant_search_preview_box=$('#merchant_search_preview_box');
	var deal_search_preview_box=$('#deal_search_preview_box');
	var thread_search_preview_box=$('#thread_search_preview_box');
	var delete_query=$('#searchform span.delete_query');
	var merchant_search_preview=$('#merchant_search_preview');
	var deal_search_preview=$('#deal_search_preview');
	var thread_search_preview=$('#thread_search_preview');
	var is_mailbox_loading=false;
	var mail_end=false;
	window.is_notification_box_loading=false;
	window.notification_end=false;
	$(window).click(function(event)
		{
		if(typeof InstallTrigger==='undefined'||(!event.which||(event.which!==3&&event.which!==2)))
			{
			member_parameters.css('display','none');
			open_member_parameters.addClass('not_open');
			open_member_parameters_header_arrow.removeClass('up');
			open_member_parameters_header_arrow.addClass('down');
			sub_menu.css('display','none');
			open_sub_menu.addClass('not_open');
			open_sub_menu_header_arrow.addClass('down');
			open_sub_menu_header_arrow.removeClass('up');
			notifications.css('display','none');
			open_notification.addClass('not_open');
			search_preview.css('display','none');
			if(input_search.val().length==0)
				{
				input_search.removeClass('white_search')
			}
			mailbox.css('display','none');
			open_mailbox.addClass('not_open');
			filters.css('display','none');
			open_filters.addClass('not_open')
		}
	}
	);
	open_member_parameters.click(function(event)
		{
		event.stopPropagation();
		if($(this).hasClass('not_open'))
			{
			close_sub_menu(member_parameters);
			member_parameters.css('display','block');
			$(this).removeClass('not_open');
			open_member_parameters_header_arrow.removeClass('down');
			open_member_parameters_header_arrow.addClass('up')
		}
		else
			{
			member_parameters.css('display','none');
			$(this).addClass('not_open');
			open_member_parameters_header_arrow.removeClass('up');
			open_member_parameters_header_arrow.addClass('down')
		}
	}
	);
	filter_region.click(function()
		{
		if($(this).prop('checked')&&instore_deal_status.prop('checked'))
			{
			bloc_region_departement.css('opacity',1);
			button_select_region.on('click',function()
				{
				option_bar_list_region_display()
			}
			);
			button_select_region.css('cursor','pointer')
		}
		else
			{
			departement_header_part.hide();
			bloc_region_departement.css('opacity',0.4);
			button_select_region.prop('onclick',null).off('click');
			button_select_region.css('cursor','default')
		}
	}
	);
	instore_deal_status.click(function()
		{
		if($(this).prop('checked'))
			{
			filter_region.attr("disabled",false);
			filter_region.parent().parent().css('opacity',1);
			if(filter_region.prop('checked'))
				{
				bloc_region_departement.css('opacity',1);
				button_select_region.on('click',function()
					{
					option_bar_list_region_display()
				}
				);
				button_select_region.css('cursor','pointer')
			}
		}
		else
			{
			filter_region.prop("checked",false);
			filter_region.attr("disabled",true);
			departement_header_part.hide();
			bloc_region_departement.css('opacity',0.4);
			filter_region.parent().parent().css('opacity',0.4);
			button_select_region.prop('onclick',null).off('click');
			button_select_region.css('cursor','default')
		}
	}
	);
	open_sub_menu.click(function(event)
		{
		event.stopPropagation();
		if($(this).hasClass('not_open'))
			{
			close_sub_menu(sub_menu);
			sub_menu.css('display','block');
			$(this).removeClass('not_open');
			menu_header_arrow.addClass('up');
			menu_header_arrow.removeClass('down')
		}
		else
			{
			sub_menu.css('display','none');
			$(this).addClass('not_open');
			menu_header_arrow.addClass('down');
			menu_header_arrow.removeClass('up')
		}
	}
	);
	open_notification.click(function(event)
		{
		event.stopPropagation();
		if($(this).hasClass('not_open'))
			{
			close_sub_menu(notifications);
			notifications.css('display','block');
			$(this).removeClass('not_open')
		}
		else
			{
			notifications.css('display','none');
			$(this).addClass('not_open')
		}
	}
	);
	open_mailbox.click(function(event)
		{
		event.stopPropagation();
		if($(this).hasClass('not_open'))
			{
			close_sub_menu(mailbox);
			mailbox.css('display','block');
			$(this).removeClass('not_open')
		}
		else
			{
			mailbox.css('display','none');
			$(this).addClass('not_open')
		}
	}
	);
	open_filters.click(function(event)
		{
		event.stopPropagation();
		if($(this).hasClass('not_open'))
			{
			close_sub_menu(filters);
			filters.css('display','block');
			$(this).removeClass('not_open')
		}
		else
			{
			filters.css('display','none');
			$(this).addClass('not_open')
		}
	}
	);
	filters.click(function(event)
		{
		event.stopPropagation()
	}
	);
	input_search.focus(function(event)
		{
		close_sub_menu(member_parameters);
		input_search.addClass('white_search')
	}
	);
	search_preview.click(function(event)
		{
		event.stopPropagation()
	}
	);
	input_search.click(function(event)
		{
		event.stopPropagation()
	}
	);
	notifications.click(function(event)
		{
		event.stopPropagation()
	}
	);
	mailbox.click(function(event)
		{
		event.stopPropagation()
	}
	);
	sub_menu.click(function(event)
		{
		event.stopPropagation()
	}
	);
	notification_box.scroll(function()
		{
		if(notification_box[0].scrollHeight-notification_box.scrollTop()<=notification_box.outerHeight()&&!window.is_notification_box_loading&&!window.notification_end)
			{
			window.is_notification_box_loading=true;
			disable_div('notification_box',true);
			get_notification(5,window.notification_offset)
		}
	}
	);
	mailbox_content.scroll(function()
		{
		if(mailbox_content[0].scrollHeight-mailbox_content.scrollTop()<=mailbox_content.outerHeight()&&!is_mailbox_loading&&!mail_end)
			{
			var url=WWW_ROOT+'/ajax/mailbox-scroll';
			is_mailbox_loading=true;
			disable_div('mailbox_content',true);
			$.ajax(
				{
				type:'POST',url:url,data:
					{
					index:mailbox_index
				}
				,success:function(data)
					{
					if((typeof data!='object')||!('ok'in data))
						{
						return false
					}
					if(!data.ok)
						{
						if(!('errors'in data))
							{
							return false
						}
						return false
					}
					else
						{
						if(data.pms.length)
							{
							for(var i=0;
							i<data.pms.length;
							i++)
								{
								var pm=data.pms[i];
								var pm_div=add_pm(pm);
								mailbox_content.append(pm_div)
							}
							mailbox_index++
						}
						else
							{
							update_header_numbers('mailbox_content');
							mail_end=true
						}
						return true
					}
				}
				,dataType:'json'
			}
			).done(function()
				{
				activate_div('mailbox_content',true);
				is_mailbox_loading=false
			}
			).error(function()
				{
				return false
			}
			)
		}
	}
	);
	input_search.focus(function()
		{
		search_preview.width(Math.ceil(input_search.outerWidth()));
		input_search.width(Math.ceil(input_search.width()));
		search_preview.css('display','block');
		merchant_search_preview.css('display','none');
		deal_search_preview.css('display','none');
		thread_search_preview.css('display','none')
	}
	);
	input_search.keyup(function()
		{
		if($(this).val().length==0)
			{
			delete_query.css('display','none');
			delete_query.css('float','')
		}
		else
			{
			delete_query.css('float','right');
			delete_query.css('display','block')
		}
		if($(this).val().length>2)
			{
			var searchform=$('#searchform');
			searchform.addClass('loading');
			input_search.css('spinner_validate');
			var search=$(this).val();
			var url=WWW_ROOT+'/ajax/search-preview';
			$.ajax(
				{
				type:'POST',url:url,data:
					{
					search:search
				}
				,success:function(data)
					{
					if((typeof data!='object')||!('ok'in data))
						{
						return false
					}
					if(!data.ok)
						{
						if(!('errors'in data))
							{
							return false
						}
						return false
					}
					else
						{
						searchform.removeClass('loading');
						close_sub_menu(search_preview);
						input_search.addClass('white_search');
						search_preview.width(Math.ceil(input_search.outerWidth()));
						input_search.width(Math.ceil(input_search.width()));
						merchant_search_preview.css('display','none');
						deal_search_preview.css('display','none');
						thread_search_preview.css('display','none');
						merchant_search_preview_box.empty();
						deal_search_preview_box.empty();
						thread_search_preview_box.empty();
						if(data.deals.length)
							{
							for(var i=0;
							i<data.deals.length;
							i++)
								{
								var deal=data.deals[i];
								var deal_div=add_deal(deal);
								deal_search_preview_box.append(deal_div);
								$('a#search_all_deals').attr('href',WWW_ROOT+'/search/?q='+search);
								deal_search_preview.css('display','block')
							}
						}
						else
							{
							deal_search_preview.css('display','none')
						}
						if(data.threads.length)
							{
							for(var i=0;
							i<data.threads.length;
							i++)
								{
								var thread=data.threads[i];
								var thread_div=add_thread(thread);
								thread_search_preview_box.append(thread_div);
								$('a#search_all_threads').attr('href',WWW_ROOT+'/forum/search/?q='+search);
								thread_search_preview.css('display','block')
							}
						}
						else
							{
							thread_search_preview.css('display','none')
						}
						if(data.merchants.length)
							{
							for(var i=0;
							i<data.merchants.length;
							i++)
								{
								var merchant=data.merchants[i];
								var merchant_div=add_merchant(merchant);
								merchant_search_preview_box.append(merchant_div);
								merchant_search_preview.css('display','block')
							}
						}
						else
							{
							merchant_search_preview.css('display','none')
						}
						if(!data.deals.length&&!data.threads.length&&data.merchants.length)
							{
							merchant_search_preview_box.css('border-bottom','none')
						}
						else
							{
							merchant_search_preview_box.css('border-bottom','1px solid #d1d5db')
						}
						if(!data.merchants.length&&data.deals.length)
							{
							deal_search_preview.css('border-top','1px solid #d1d5db')
						}
						else
							{
							deal_search_preview.css('border-top','none')
						}
						search_preview.css('display','block');
						return true
					}
				}
				,dataType:'json',async:true
			}
			).error(function()
				{
				return false
			}
			)
		}
		if($(this).val().length==0)
			{
			merchant_search_preview_box.empty();
			deal_search_preview_box.empty();
			thread_search_preview_box.empty();
			merchant_search_preview.css('display','none');
			deal_search_preview.css('display','none');
			thread_search_preview.css('display','none')
		}
	}
	);
	if(input_search.val().length>0)
		{
		delete_query.css('float','right');
		delete_query.css('display','block')
	}
	$('#close_report_message').click(function()
		{
		$('.confirm_message').slideToggle("fast",function()
			{
		}
		)
	}
	);
	delete_query.click(function(event)
		{
		event.stopPropagation();
		input_search.val('');
		delete_query.css('display','none');
		merchant_search_preview_box.empty();
		deal_search_preview_box.empty();
		thread_search_preview_box.empty();
		merchant_search_preview.css('display','none');
		deal_search_preview.css('display','none');
		thread_search_preview.css('display','none')
	}
	);
	$("#advanced_search_deal").click(function()
		{
		$(this).prop('href',WWW_ROOT+'/advanced-search/?q='+input_search.val())
	}
	);
	$("#advanced_search_thread").click(function()
		{
		$(this).prop('href',WWW_ROOT+'/forum/advanced-search/?q='+input_search.val())
	}
	);
	$('.show_terms').click(function()
		{
		show_reducfr_terms(this)
	}
	);
	$('.voucher').each(function(index,obj)
		{
		var reduc_id=$(obj).data('reduc_id');
		var merchant_id=$(obj).data('merchant_id');
		if(should_i_show_the_voucher_code_of_a_reducfr_voucher_merchant(reduc_id,merchant_id))
			{
			$(obj).find(".hidden").hide();
			$(obj).find(".to_display").show();
			$(obj).find(".open_voucher").attr("onclick","show_reducfr_modal('"+obj.id+"');
			");
			$(obj).find(".field").removeClass("dashed")
		}
	}
	);
	$('#see_more_less_reducfr_vouchers').click(function()
		{
		var see_more_less_reducfr_vouchers_p=$('#see_more_less_reducfr_vouchers p');
		if(see_more_less_reducfr_vouchers_p.hasClass('more'))
			{
			$('.voucher.more_voucher').show();
			see_more_less_reducfr_vouchers_p.text('VOIR MOINS DE CODES PROMO');
			see_more_less_reducfr_vouchers_p.removeClass('more')
		}
		else
			{
			$('.voucher.more_voucher').hide();
			see_more_less_reducfr_vouchers_p.text('VOIR PLUS DE CODES PROMO');
			see_more_less_reducfr_vouchers_p.addClass('more')
		}
	}
	);
	$('#card_info .center .show_more').click(function()
		{
		if($('#card_info .center .additional_info div.disabled').is(':visible'))
			{
			$('#card_info .center .additional_info div.disabled').toggle('fast',function()
				{
				$('#card_info .center .show_more img').removeClass('inverse_arrow');
				$(this).hide()
			}
			)
		}
		else
			{
			$('#card_info .center .additional_info div.disabled').toggle('fast',function()
				{
				$('#card_info .center .show_more img').addClass('inverse_arrow');
				$(this).show()
			}
			)
		}
	}
	);
	$('.mydealz_rain').click(function()
		{
		if($('#let_it_mydealz').length)
			{
			$(this).addClass('start');
			$(this).text('Relancer la pluie');
			stopTheSnow();
			localStorage.setItem('mydealz_rain',0)
		}
		else
			{
			$(this).removeClass('start');
			$(this).text('Arrêter la pluie');
			init();
			localStorage.setItem('mydealz_rain',1)
		}
	}
	);
	if(localStorage.getItem('mydealz_rain')==0)
		{
		$('.mydealz_rain').addClass('start');
		$('.mydealz_rain').text('Relancer la pluie')
	}
}
);
$(window).on('load',function()
	{
	var logo=$('#logo');
	$('#sub_menu').css('margin-left',$('#open_sub_menu').position().left+logo.outerWidth()+parseInt(logo.css('margin-right')));
	footer_white_on_bottom()
}
);
$(window).on('resize',function()
	{
	footer_white_on_bottom()
}
);
