var playlist;

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
	
	$(".arrowBottom").live("click",function() {
		
		playListMove("down");
	});
	$(".arrowTop").live("click",function() {
		
		playListMove("up");
	});
	
	$(".playButton").live("click",function(e) {	
	  e.preventDefault();
		videoLayerOpen();
	});
	
	$(".closeButton").live("click",function(e) {	
	  e.preventDefault();
		videoLayerClose();
	});
	
	
});

function checkArrowVisibility() {
	
	if ($(".playList ul li").length > 3) {
		
		$(".arrowBottom").fadeIn(300);
		$(".arrowTop").fadeIn(300);
	}
	else {
		
		$(".arrowBottom").fadeOut(300);
		$(".arrowTop").fadeOut(300);
	}
}

function playListMove(direction) {
	
	if ($(".playList ul li").length > 3) {
	
		switch (direction) {
			
			case "down":
				
				$(".playList ul").animate({
					
					scrollTop: "+=" + 170
				});
				break;
				
			case "up":
			
				$(".playList ul").animate({
					
					scrollTop: "-=" + 170
				});
				break;
		}
	}
}

function removeDraggableFromItemsByCookie() {
	
	refs = playlist.split("-");
	
	for (var i = 0; i < refs.length; i++) {
		
		$(".is_shown li[ref='" + refs[i] + "']").css("opacity", 0.5);
		$(".is_shown li[ref='" + refs[i] + "']").draggable("destroy");
		$(".is_shown li[ref='" + refs[i] + "']").removeClass("item");
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
	
	if ($(elem).parent().hasClass("page") || $(elem).parent()[0].tagName == "BODY") {
	
		$(elem).addClass("open");
		$(elem).css("z-index","550");
		$(elem).find(".images").css("z-index","600");
		$(elem).find(".box").css("z-index","650");
		
		$(elem).find(".images").animate({
				
			height: '475',
			top: '-160px'
		},500);
		$(elem).find(".info").animate({
			
			width: '400',
			opacity: 1
		},500);
		$(".overlay").fadeIn(300);
	}
}

function close_box(elem) {
	
	$(elem).removeClass("open");
	
	$(elem).find(".images").animate({
			
		height: '150',
		top: '0'
	},500);
	$(elem).find(".info").animate({
		
		width: '0',
		opacity: 0
	},500);
	$(".overlay").fadeOut(300, function() {
		
		$(elem).css("z-index","auto");
		$(elem).find(".images").css("z-index","auto");
		$(elem).find(".box").css("z-index","auto");
	});
	//IF WE ARE ON MAPS
	if ((elem).parent()[0].tagName == "BODY") {
		
		$(elem).fadeOut(300, function() {
			
			$(this).remove();
		});
	}
}

function changeObjectsInGrid(num) {
	
	$(".page").each(function() {
		
		i = 1;
		
		if ($(this).is(":last-child")) {
			
			i=0;
		}
		else {
		}
		
		$(this).find("li").each(function() {
		
			$(this).show();
			
			if (i>=num) {
				
				if ($(this).hasClass("arrow")) {
					
				}
				else {
					$(this).hide();
				}
			}
			i++;
		});
	});
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

function videoLayerOpen() {	
	
	$('.videoLayer').show().animate({
    opacity: 1,
    left: '-=50',
    right: '-=50',
    top: '-=50',
    bottom: '-=50'
  }, 250, function() {
  });
	
}

function videoLayerClose() {
	$('.videoLayer').animate({
    opacity: 0,
    left: '+=50',
    right: '+=50',
    top: '+=50',
    bottom: '+=50'
  }, 250, function() {
  	$(this).hide();
  });
}
