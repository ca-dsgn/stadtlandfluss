var playlist = "";
var playListScrollTop;

$(document).ready(function() {
	
	if (get_cookie("playlist") == null) {
		
		set_cookie("playlist","");
	}
	playlist = get_cookie("playlist");
	
	matrixDraggable();
	
	removeDraggableFromItemsByCookie();
	addDraggableToItems(".page .item");
	matrixArrows();
	playListSortable();
	
	$(".arrow.right").live("click",function() {
		
		matrixMove("right");
	});
	$(".arrow.left").live("click",function() {
		
		matrixMove("left");
	});
	
	resizeGridByWindowWidth();
	positionGrid();
	
	$(window).resize(function() {
		
		resizeGridByWindowWidth();
		positionGrid();
	});
	addItemListeners();
	
	$(".overlay").bind("mouseup", function() {
		
		close_box($(".open"));
	});
	
	$(".playlistDown").live("click",function() {
		
		playListMove("down");
	});
	$(".playlistUp").live("click",function() {
		
		playListMove("up");
	});
	
	$(".playButton").live("click",function(e) {	
	
		e.preventDefault();
		videoLayerOpen(e);
	});
	
	$(".closeButton").live("click",function(e) {
			
		e.preventDefault();
		videoLayerClose(e);
	});
	$("#pageNav > li").mouseenter(function() {
		
		var li = $(this);
		
		$(this).addClass("has_focus");
		
		setTimeout(function(){
				
		  if ($(li).hasClass("has_focus")) {
			   
			$(li).find("ul").slideDown(300);
		  }
		}, 500);
	}).mouseleave( function() {
		
		$(this).find("ul").slideUp();
		$(this).removeClass("has_focus");
	});
	
});

function checkArrowVisibility() {
	
	if ($(".playList ul li").length > 3) {
		
		$(".playlistDown").fadeIn(300);
	}
	else {
		
		$(".playlistDown").fadeOut(300);
		$(".playlistUp").fadeOut(300);
	}
}

function playListMove(direction) {
	
	if ($(".playList ul li").length > 3) {
	
		switch (direction) {
			
			case "down":
				
				$(".playList ul").animate({
					
					scrollTop: "+=" + 170
				}, function() {
					
					$(this).css("background-image","url(img/playlist.png)");
					
					if (($(".playList ul li").length - 3)*170 == $(".playList ul").scrollTop()) {
					
						$(".playList .playlistDown").hide();	
						$(".playList .playlistUp").fadeIn(300);
					}
					if ($(".playList ul").scrollTop() <= ($(".playList ul li").length - 3)*170) {
					
						$(".playList .playlistUp").fadeIn(300);
					}
					playListScrollTop = $(".playList ul").scrollTop();
				});
				$(".playList ul").css("background-image","none");
				break;
				
			case "up":
			
				$(".playList ul").animate({
					
					scrollTop: "-=" + 170
				}, function() {
					
					$(this).css("background-image","url(img/playlist.png)");
					
					if ($(".playList ul").scrollTop() == 0) {
					
						$(".playList .playlistUp").hide();	
						$(".playList .playlistDown").fadeIn(300);
					}
					if ($(".playList ul").scrollTop() <= ($(".playList ul li").length - 3)*170) {
					
						$(".playList .playlistDown").fadeIn(300);
					}
					playListScrollTop = $(".playList ul").scrollTop();
				});
				$(".playList ul").css("background-image","none");
				break;
		}
	}
}

function removeDraggableFromItemsByCookie() {
	
	if (playlist) {
		refs = playlist.split("-");
		
		for (var i = 0; i < refs.length; i++) {
			
			$(".is_shown li[ref='" + refs[i] + "']").css("opacity", 0.5);
			$(".is_shown li[ref='" + refs[i] + "']").draggable("destroy");
			$(".is_shown li[ref='" + refs[i] + "']").removeClass("item");
		}
	}
}

function addItemListeners() {
	
	$(".page .item").live("mouseup", function() {
		
		if ($(this).parent().hasClass("is_shown")) {
			
			if (!$(this).hasClass("ui-sortable-helper") && !$(this).parent().parent().hasClass("ui-draggable-dragging")) {
				
				open_box($(this));
			}
		}
		
	});
	$(".maps_item").live("mouseenter",function() {
		
		$(this).find(".info").animate({
			
			width: '220'
		});
	});
	$(".maps_item").live("mouseleave",function() {
		
		$(this).find(".info").animate({
			
			width: '0'
		});
	});
	$(".maps_item .left").live("mouseenter",function() {
		
		$(this).find(".title").fadeOut(300);
		$(this).find(".playButton").animate({
			
			width: 75,
			height: 75,
			'margin-left': 73,
			'margin-top': 37
		},300);
		
		$(this).find(".playButton").css("background-image", "url('img/playButton.png')");	
	});
	$(".maps_item .left").live("mouseleave",function() {
		
		$(this).find(".title").fadeIn(300);
		$(this).find(".playButton").animate({
			
			width: 40,
			height: 40,
			'margin-left': 175,
			'margin-top': 100
		},300);
		$(this).find(".playButton").css("background-image", "url('img/playButtonSmallOver.png')");	
	});
}

function close_item_box() {
	$(".maps_item").fadeOut(300, function() {
		
		$(this).remove();
	});
}

function removeItemListeners() {
	
	$(".page .item").die("mouseup");
}

function resizeGridByWindowWidth() {
	
	if ((".gridContainer").length > 0) {
			
		if (parseInt($(".page").width()) < 960) {
			
			changeObjectsInGrid(9);
		}
		else {
			changeObjectsInGrid(12);
		}
	}
}

function get_cookie(name) {
	var cookiename = name + "="; 
	var ca = document.cookie.split(';'); 
	
	for(var i=0;i < ca.length;i++) {
		var c = ca[i];  
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(cookiename) == 0) return c.substring(cookiename.length,c.length);
	}
	return null;
}

function set_cookie(name, value) {

	ablauf = new Date();
	infuenfTagen = ablauf.getTime() + (2 * 60 * 60 * 1000); //2 hours
	ablauf.setTime(infuenfTagen);

	document.cookie = name + "=" + value + "; expires=" + ablauf.toGMTString() + "; path=/";
}

function open_box(elem) {
	
	if (($(elem).parent().hasClass("page") || $(elem).parent()[0].tagName == "BODY") && !$(".overlay").is(":visible")) {
	
		$(elem).addClass("open");
		$(elem).css("z-index","550");
		$(elem).find(".images").css("z-index","600");
		$(elem).find(".box").css("z-index","650");
		
		$(elem).find(".images").delay(300).animate({
				
			height: '510',
			top: '-180px',
			opacity: 1
		},500);
		$(elem).find(".info").delay(300).animate({
			
			width: '400',
			opacity: 1
		},500);
		
		left_calc = 0;
		top_calc = 0;
		
		position_left = ($(elem).offset().left-10 - ($(window).width()-$("#gridContent .wrapper").width())/2)/240;
		position_top = ($(elem).offset().top-10 - $(".is_shown").offset().top)/170;
		
		switch (position_top) {
			
			case 0:
			
				top_calc+= 170;
				break;
			case 1:
			
				top_calc+= 0;
				break;
			case 2:
				
				top_calc-= 170;
				break;
		}
		
		switch (position_left) {
			
			case 0:
			
				left_calc+= 240;
				break;
			case 1:
			
				left_calc+= 0;
				break;
			case 2:
				
				left_calc-= 240;
				break;
			case 3:
			
				left_calc-= 240+240;
				break;
		}
		
		$(elem).animate({
			left: left_calc,
			top: top_calc
		});
		$(".overlay").fadeIn(300);
	}
}

function close_box(elem) {
	
	$(elem).removeClass("open");
	
	$(elem).find(".images").animate({
			
		height: '150',
		top: '0',
		opacity: 0
	},500);
	$(elem).find(".info").animate({
		
		width: '0',
		opacity: 0
	},500);
	$(".overlay").delay(300).fadeOut(300, function() {
		
		$(elem).css("z-index","auto");
		$(elem).find(".images").css("z-index","auto");
		$(elem).find(".box").css("z-index","auto");
	});
	
	if ($(".overlay").is(":visible")) {
		
		$(elem).animate({
			left: 0,
			top: 0
		});
	}
}

function open_maps_item(elem) {
	
	$(elem).fadeIn(300);
}

function changeObjectsInGrid(num) {
	
	// NOW MAKE A NEW SORT OF ALL ELEMENTS THAT ARE HIDDEN TO PLACE THEM ON THE NEXT PAGE
	items = Array();
	
	$(".page > .item").each(function() {
		
		items.push($(this));
		$(this).remove();
	});
	
	// Remove all right buttons to add them dynamically again
	
	$(".page > .right").each(function() {
		
		$(this).remove();
	});
	
	count_items = items.length;
	
	next_page_arrow = false;
	
	last_page = 1;
	
	switch (num) {
		
		case 9:
			
			for (i=1;i<=count_items;i++) {
				
				if (i<=8) {
					
					$(".page:nth-child(1)").append(items[i-1]);
				}
				else {
					
					current_page = Math.ceil((i-8)/7)+1;
					
					if (next_page_arrow) {
						
						$(".page:nth-child(" + (current_page-1) + ")").append('<li class="arrow right"></li>');
						
						next_page_arrow = false;
					}
					
					if ($(".page:nth-child(" + current_page + ")").length > 0) {
						
						if (last_page != current_page) {
							
							next_page_arrow = true;
							last_page = current_page;
						}
						
						$(".page:nth-child(" + current_page + ")").append(items[i-1]);
					}
					else {
						
						new_page = '<ul class="page" id="' + current_page + '" style="opacity: 0;">'
						new_page+= '<li class="arrow left"></li>';
						new_page+= '</ul>';
						
						$(".page:last-child").after(new_page);
						
						$(".page:nth-child(" + current_page + ")").append(items[i-1]);
					}
				}
				
			}
			break;
		case 12:
		
			for (i=1;i<=count_items;i++) {
				
				if (i<=11) {
					
					$(".page:nth-child(1)").append(items[i-1]);
				}
				else {
					
					current_page = Math.ceil((i-11)/10)+1;
					
					if (next_page_arrow) {
						
						$(".page:nth-child(" + (current_page-1) + ")").append('<li class="arrow right"></li>');
						next_page_arrow = false;
					}
					
					if ($(".page:nth-child(" + current_page + ")").length > 0) {
						
						$(".page:nth-child(" + current_page + ")").append(items[i-1]);
						
						if (last_page != current_page) {
							
							next_page_arrow = true;
							last_page = current_page;
						}
					}
					else {
						
						new_page = '<ul class="page" id="' + current_page + '" style="opacity: 0;">'
						new_page+= '<li class="arrow left"></li>';
						new_page+= '</ul>';
						
						$(".page:last-child").after(new_page);
						
						$(".page:nth-child(" + current_page + ")").append(items[i-1]);
					}
				}
				
			}
			break;
	}
	
	addDraggableToItems(".page .item");
}

function positionGrid() {
	
	current_width = $(".page").width();
	
	if ((".gridContainer").length > 0) {
	
		i=0;
		y=0;
		
		$(".page").each(function() {
			
			if ($(this).hasClass("is_shown")) {
				
				y=i;
			}
			i++;
		});
	}
	
	$(".slider").css("left","-" + y*current_width + "px");
}

function addToPlayList(ref) {
	
	seperator = "-";
	
	if (playlist == "") {
		
		seperator = "";
	}
	playlist += seperator + ref;
	set_cookie("playlist",playlist);
}

function removeFromPlayList(ref) {
	
	refs = playlist.split("-");
	
	new_playlist = "";
	seperator = "-";
	
	for (var i = 0; i < refs.length; i++) {
		
		if (refs[i] != ref) {
			
			new_playlist+= refs[i] + seperator;
		}
	}
	new_playlist = new_playlist.substr(0,new_playlist.length-1);
	
	playlist = new_playlist;
	
	set_cookie("playlist",playlist);
}

function playListSortable() {
	
	$(".playList ul").sortable({
		revert: true,
		start: function(event,ui) {
			
			y_original = event.screenX;
			ready_to_kill = false;
			
			if ($(".playList > ul > li").length > 3) {
				
				$(".playList > ul").scrollTop(playListScrollTop);
			}
			else {
				
				$(".playList > ul").scrollTop(0);
			}
		},
		stop: function(event, ui) {
			$(ui.item).bind("mouseup", function() {
				
				open_box(ui.item);
			});
		},
		receive: function(event,ui) {
			
			if ($(this).find("li").length > 0) {
				
				$(this).parent().find(".info").fadeOut(300);
			}
			$(".is_shown li[ref='" + $(ui.item).attr("ref") + "']").animate({ opacity: 0.5 },300);
			$(".is_shown li[ref='" + $(ui.item).attr("ref") + "']").removeClass("item");
			$(".is_shown li[ref='" + $(ui.item).attr("ref") + "']").draggable("destroy");
			
			$(".is_shown li[ref='" + $(ui.item).attr("ref") + "']").unbind("mouseup");
			
			addToPlayList($(ui.item).attr("ref"));
			
			checkArrowVisibility();
		},
		remove: function(event, ui) {
		},
		over: function(event, ui) {
		},
		out: function(event, ui) {
			
			ready_to_kill = true;
		},
		sort: function(event, ui) {
			
			if (ready_to_kill) {
				
				if (y_original - event.pageX > 250 || y_original - event.pageX < -250) {
					
					if (ready_to_kill) {
						
						ready_to_kill = false;
					
						$(".page").each(function() {
							
							$(this).find("li").each(function() {
							
								if ($(this).attr("ref") == $(ui.item).attr("ref")) {
								
									$(this).animate({
										
										opacity: 1
									},300, function() {
										
										addDraggableToItems($(this));
										$(this).addClass("item");
									});
								}
							});
						});
						
						ui.item.addClass("delete_this");
						
						ui.item.fadeOut(300, function() {
							
							removeFromPlayList($(ui.item).attr("ref"));
							$(this).remove();
						});
						ui.placeholder.slideUp(300, function() {
								
							$(this).remove();
							$(".playList ul").sortable("cancel");
							
							$(".delete_this").remove();
							
							checkArrowVisibility();
								
							if ($(".playList ul li").length == 0) {
								
								$(".playList").find(".info").fadeIn(300);
							}
						});
						playListScrollTop = playListScrollTop-170;
						if ($(".playList ul li").length > 3) {
							
							$(".playList ul").scrollTop(playListScrollTop);
						}
					}
				}
			}
		}
	});
}

function matrixDraggable() {
	
	current_width = $(".page").width();
			
	$(".slider").draggable({
		
		axis: 'x',
		stop: function(event,ui) {
	
			i=0;
			y=0;
			
			$(".page").each(function() {
				
				if ($(this).hasClass("is_shown")) {
					
					y=i;
				}
				i++;
			});
			
			moving_factor = ($(window).width()-$("#gridContent .wrapper").width())/2 - ui.offset.left - (y*current_width);
			
			if (moving_factor > 0) {
				
				if (moving_factor > 100) {
					
					//WANTS TO GO LEFT
					matrixMove("right");
				}
				else {
					
					$(".slider").animate({
						
						left: "-" + y*current_width
					}, 100);
				}
			}
			if (moving_factor < 0) {
				
				if (moving_factor < -100) {
					
					//WANTS TO GO RIGHT
					matrixMove("left");
				}
				else {
					
					$(".slider").animate({
						
						left: "-" + y*current_width
					}, 300);
				}
			}
		}
	});
}

function addDraggableToItems(selector) {
	
	$(selector).draggable({
		start: function(event, ui) {
			
			//close_box(ui.item);
			close_box($(".is_shown li[ref='" + $(ui.helper).attr("ref") + "']"));
			removeItemListeners();
			
		},
		stop: function() {
			addItemListeners();
		},
		connectToSortable: ".playList ul",
		distance: 5,
		placeholder: "placeholder",
		helper: "clone",
		revert: 300,
		items: 'li.item'
	});
}

function matrixMove(direction) {
	
	i=0;
	y=0;
	
	$(".page").each(function() {
		
		if ($(this).hasClass("is_shown")) {
			
			y=i;
		}
		i++;
	});
	
	current_width = $(".page").width();
	
	if (direction == "left") {
		
		y--;
	}
	if (direction == "right") {
		
		y++;
	}
	
	page = y+1;
	
	$(".naviPages ul li").removeClass("current");
	$(".naviPages ul li:nth-child(" + page + ")").addClass("current");
	
	switch(direction) {
		
		case "right":
		
			if ($(".is_shown").next().length > 0) {
					
				$(".slider").animate({
					left: "-" + current_width*y
				});
	
				$(".is_shown").next().addClass("next_to_show");
				$(".is_shown").animate({
					
						opacity: 0
					
					},100, function() {
					
					$(this).removeClass("is_shown");
					$(".next_to_show").addClass("is_shown");
					$(".is_shown").removeClass("next_to_show");
					$(".is_shown").animate({
						
						opacity: 1
					});
				});
			}
			else {
				
				$(".slider").animate({
					left: "-" + current_width*(y-1)
				});
			}
			break;
			
		case "left":
		
			if ($(".is_shown").prev().length > 0) {
				
				$(".slider").animate({
					left: "-" + current_width*y,
					opacity: 1
				});
				
				$(".is_shown").prev().addClass("next_to_show");
				$(".is_shown").animate({
					
						opacity: 0
					
					},300, function() {
					
					$(this).removeClass("is_shown");
					$(".next_to_show").addClass("is_shown");
					$(".is_shown").removeClass("next_to_show");
					$(".is_shown").animate({
						
						opacity: 1
					});
				});
			}
			else {
				
				$(".slider").animate({
					left: "-" + current_width*(y+1)
				});
			}
			break;
	}
}

function matrixArrows() {
	
	$(".page").each(function() {
		
		if ($(this).attr("id") != 1) {
			
			$(this).prepend('<li class="arrow left"></li>');
		}
		if ($(this).attr("id") != $(".page").last().attr("id")) {
			
			$(this).append('<li class="arrow right"></li>');
		}
	});
	
}

function videoLayerOpen(event) {
	
	video_src = $(event.srcElement).find(".video_src").val();
	
	$('.videoLayer').show().animate({
		opacity: 1
	},300, function() {
		$('.videoPlayer').show();
		
		html = '<object';
      	html+= '<param value="' + video_src + '" name="movie">';
        html+= '<param value="opaque" name="wmode">';
        html+= '<param value="true" name="allowFullScreen">';
        html+= '<param value="always" name="allowScriptAccess">';
        html+= '<embed style="width: 100%; height: 100%" allowscriptaccess="always" allowfullscreen="true" type="application/x-shockwave-flash" src="' + video_src + '" wmode="opaque">';
      	html+= '</object>';
		
		$('.videoPlayer object').replaceWith(html);
			
	});
}

function videoLayerClose(event) {
	$('.videoLayer').animate({
		opacity: 0
	}, 300, function() {
		$('.videoLayer, .videoPlayer').hide();
	});
}
