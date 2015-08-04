!function($){$.extend(mejs.MepDefaults,{loopText:"Repeat On/Off",shuffleText:"Shuffle On/Off",nextText:"Next Track",prevText:"Previous Track",playlistText:"Show/Hide Playlist"}),$.extend(MediaElementPlayer.prototype,{buildloop:function(t,e,l,s){var o=this,i=$('<div class="mejs-button mejs-loop-button '+(t.options.loop?"mejs-loop-on":"mejs-loop-off")+'"><button type="button" aria-controls="'+t.id+'" title="'+t.options.loopText+'"></button></div>').appendTo(e).click(function(e){t.options.loop=!t.options.loop,$(s).trigger("mep-looptoggle",[t.options.loop]),t.options.loop?i.removeClass("mejs-loop-off").addClass("mejs-loop-on"):i.removeClass("mejs-loop-on").addClass("mejs-loop-off")});o.loopToggle=o.controls.find(".mejs-loop-button")},loopToggleClick:function(){var t=this;t.loopToggle.trigger("click")},buildshuffle:function(t,e,l,s){var o=this,i=$('<div class="mejs-button mejs-shuffle-button '+(t.options.shuffle?"mejs-shuffle-on":"mejs-shuffle-off")+'"><button type="button" aria-controls="'+t.id+'" title="'+t.options.shuffleText+'"></button></div>').appendTo(e).click(function(e){t.options.shuffle=!t.options.shuffle,$(s).trigger("mep-shuffletoggle",[t.options.shuffle]),t.options.shuffle?i.removeClass("mejs-shuffle-off").addClass("mejs-shuffle-on"):i.removeClass("mejs-shuffle-on").addClass("mejs-shuffle-off")});o.shuffleToggle=o.controls.find(".mejs-shuffle-button")},shuffleToggleClick:function(){var t=this;t.shuffleToggle.trigger("click")},buildprevtrack:function(t,e,l,s){var o=this,i=$('<div class="mejs-button mejs-prevtrack-button mejs-prevtrack"><button type="button" aria-controls="'+t.id+'" title="'+t.options.prevText+'"></button></div>').appendTo(e).click(function(e){$(s).trigger("mep-playprevtrack"),t.playPrevTrack()});o.prevTrack=o.controls.find(".mejs-prevtrack-button")},prevTrackClick:function(){var t=this;t.prevTrack.trigger("click")},buildnexttrack:function(t,e,l,s){var o=this,i=$('<div class="mejs-button mejs-nexttrack-button mejs-nexttrack"><button type="button" aria-controls="'+t.id+'" title="'+t.options.nextText+'"></button></div>').appendTo(e).click(function(e){$(s).trigger("mep-playnexttrack"),t.playNextTrack()});o.nextTrack=o.controls.find(".mejs-nexttrack-button")},nextTrackClick:function(){var t=this;t.nextTrack.trigger("click")},buildplaylist:function(t,e,l,s){var o=this,i=$('<div class="mejs-button mejs-playlist-button '+(t.options.playlist?"mejs-hide-playlist":"mejs-show-playlist")+'"><button type="button" aria-controls="'+t.id+'" title="'+t.options.playlistText+'"><span>Todo</span></button></div>').appendTo(e).click(function(e){t.options.playlist=!t.options.playlist,$(s).trigger("mep-playlisttoggle",[t.options.playlist]),t.options.playlist?(l.children(".mejs-playlist").show(),i.removeClass("mejs-show-playlist").addClass("mejs-hide-playlist")):(l.children(".mejs-playlist").hide(),i.removeClass("mejs-hide-playlist").addClass("mejs-show-playlist"))});o.playlistToggle=o.controls.find(".mejs-playlist-button")},playlistToggleClick:function(){var t=this;t.playlistToggle.trigger("click")},buildplaylistfeature:function(t,e,l,s){var o=$('<div class="mejs-playlist mejs-layer"><ul class="mejs"></ul></div>').appendTo(l);t.options.playlist||o.hide(),"bottom"==t.options.playlistposition?o.css("top",t.options.audioHeight+"px"):o.css("bottom",t.options.audioHeight+"px");var i=function(t){var e=t.split("/");return e.length>0?decodeURIComponent(e[e.length-1]):""},n=[];$("#"+t.id).find(".mejs-mediaelement source").each(function(t,e){if(""!=$.trim(this.src)){var l={};l.source=$.trim(this.src),""!=$.trim(this.title)?l.name=$.trim(this.title):l.name=i(l.source),n.push(l)}});for(var a in n)l.find(".mejs-playlist > ul").append('<li data-url="'+n[a].source+'" title="'+n[a].name+'">'+n[a].name+"</li>");l.find("li:first").addClass("current played"),l.find(".mejs-playlist > ul li").click(function(e){$(this).hasClass("current")?t.play():($(".mejs-duration-container li").remove(),$(this).clone().prependTo(".mejs-duration-container"),$(this).addClass("played"),t.playTrack($(this)))}),s.addEventListener("ended",function(e){t.playNextTrack()},!1)},playNextTrack:function(){var t=this,e=t.layers.find(".mejs-playlist > ul > li"),l=e.filter(".current"),s=e.not(".played");if(s.length<1&&(l.removeClass("played").siblings().removeClass("played"),s=e.not(".current")),t.options.shuffle)var o=Math.floor(Math.random()*s.length),i=s.eq(o);else{var i=l.next();i.length<1&&t.options.loop&&(i=l.siblings().first())}1==i.length&&(i.addClass("played"),t.playTrack(i))},playPrevTrack:function(){var t=this,e=t.layers.find(".mejs-playlist > ul > li"),l=e.filter(".current"),s=e.filter(".played").not(".current");if(s.length<1&&(l.removeClass("played"),s=e.not(".current")),t.options.shuffle)var o=Math.floor(Math.random()*s.length),i=s.eq(o);else{var i=l.prev();i.length<1&&t.options.loop&&(i=l.siblings().last())}1==i.length&&(l.removeClass("played"),t.playTrack(i))},playTrack:function(t){var e=this;e.pause(),e.setSrc(t.attr("data-url")),e.load(),e.play(),t.addClass("current").siblings().removeClass("current")},playTrackURL:function(t){var e=this,l=e.layers.find(".mejs-playlist > ul > li"),s=l.filter('[data-url="'+t+'"]');e.playTrack(s)}})}(mejs.$);