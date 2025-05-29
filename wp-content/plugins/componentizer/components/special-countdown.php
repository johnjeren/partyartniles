<? /* title:: Event Countdown
description:: A countdown timer
variables:: $date_time
exvars:: {"date_time": "Y/m/d H:i:s"}
***/?>
<!-- Start: CountDown area -->
<div class="count_down fadeInDown animated" data-wow-offset="120" data-wow-duration="1.5s">
</div>
<!-- End: CountDown area -->
<div class="clearfix">
</div>

<script src="/js/jquery.countdown.js"></script>
<script>
        $('.count_down').countdown({
            end_time: '<?=@$date_time?>',
            wrapper: function(unit){
                var wrpr = $('<div></div>').
                    addClass(unit.toLowerCase()+'_wrapper').
                    addClass('col-sm-3').
                    addClass('col-xs-3').
                    addClass('col-md-3').
                    addClass('custom');
                var background = $('<div></div>').
                    addClass('background').
                    addClass('time').
                    appendTo(wrpr);

                $('<span class="counter style_all"></span>').appendTo(background);
                $('<span class="title">'+unit+'</span>').appendTo(background);
                return wrpr;
            }
        });
</script>
