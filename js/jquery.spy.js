$.fn.simpleSpy=function(a,b,c){function d(a){var b=a.find("> li");if(b.length<=1){a.load(c)}else if(b.length==0){return false}return b.filter(":first").remove()}a=a||3;b=b||4e3;return this.each(function(){function h(){if(e){var a=d(g);if(a!=false){var i=a.css({height:0,opacity:0}).prependTo(c);c.find("> li:last").animate({opacity:0},1500,function(){i.animate({height:f},1500).animate({opacity:1},1500);$(this).remove()})}}setTimeout(h,b)}var c=$(this),e=true,f="80px";var g=$("<ul />").hide().appendTo("body");c.parent().css({height:f*a});c.find("> li").filter(":gt("+(a-1)+")").appendTo(g);c.bind("stop",function(){e=false}).bind("start",function(){e=true});h()})}