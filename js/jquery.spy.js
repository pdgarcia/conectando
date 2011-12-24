$.fn.simpleSpy = function(limit, interval, data) {
    limit = limit || 3;
    interval = interval || 4000;
    function getSpyItem($source) {
        var $items = $source.find('> li');
        if ($items.length <= 1) {
            $source.load(data);
        } else if ($items.length == 0) {
            return false;
        }
        return $items.filter(':first').remove();
    }
    return this.each(function() {
        var $list = $(this),
        running = true,
        height = "80px";
        var $source = $('<ul />').hide().appendTo('body');
        $list.parent().css({
            height: height * limit
        });
        $list.find('> li').filter(':gt(' + (limit - 1) + ')').appendTo($source);
        $list.bind('stop',
        function() {
            running = false;
        }).bind('start',
        function() {
            running = true;
        });
        function spy() {
            if (running) {
                var $item = getSpyItem($source);
                if ($item != false) {
                    var $insert = $item.css({
                        height: 0,
                        opacity: 0,
                    }).prependTo($list);
                    $list.find('> li:last').animate({
                        opacity: 0
                    },
                    1500,
                    function() {
                        $insert.animate({
                            height: height
                        },
                        1500).animate({
                            opacity: 1
                        },
                        1500);
                        $(this).remove();
                    });
                }
            }
            setTimeout(spy, interval);
        }
        spy();
    });
};