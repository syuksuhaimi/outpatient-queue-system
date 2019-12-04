@extends('layouts.staffMain')

@section('content')

    <section class="wrapper site-min-height">
    <div id="callarea" class="row" style="line-height:1.23">
        <div class="col m4">
            <div class="card-panel center-align" style="margin-bottom:0">
                <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="dmbox">
                    <span id="num1" style="font-size:85px;font-weight:bold;line-height:1.45">{{ $data[1]['queueId'] }}</span><br>
                    <small id="cou1" style="font-size:35px">{{ $data[1]['room'] }}</small>
                </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="dmbox">
                    <span id="num2" style="font-size:85px; font-weight:bold;line-height:1.45">{{ $data[2]['queueId'] }}</span><br>
                    <small id="cou2" style="font-size:35px">{{ $data[2]['room'] }}</small>
                </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="dmbox">
                    <span id="num3" style="font-size:85px;font-weight:bold;line-height:1.45">{{ $data[3]['queueId'] }}</span><br>
                    <small id="cou3" style="font-size:35px">{{ $data[3]['room'] }}</small>
                </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-4 col-sm-12">
        <div class="dmbox">
            <div class="card-panel center-align" style="margin-bottom:0">
                <span style="font-size:45px">Your Number</span><br>
                <span id="num0" style="font-size:185px;color:red;font-weight:bold;line-height:1.5">{{ $data[0]['queueId'] }}</span><br>
                <span style="font-size:40px">Please proceed to</span><br>
                <span id="cou0" style="font-size:80px; color:red;line-height:1.5">{{ $data[0]['room'] }}</span>
            </div>
        </div>
        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript"></script>
    <script>
        $(function() {
            $('#main-content').css({'min-height': $(window).height()-114+'px'});
        });
        $(window).resize(function() {
            $('#main-content').css({'min-height': $(window).height()-114+'px'});
        });

        // (function($){
        //     $.extend({
        //         playSound: function(){
        //           return $("<embed src='"+arguments[0]+".mp3' hidden='true' autostart='true' loop='false' class='playSound'>" + "<audio autoplay='autoplay' style='display:none;' controls='controls'><source src='"+arguments[0]+".mp3' /><source src='"+arguments[0]+".ogg' /></audio>").appendTo('body');
        //         }
        //     });
        // })(jQuery);

        function checkcall() {
            $.ajax({
                type: "GET",
                // url: "{{ url('assets/files/display') }}",
                cache: false,
                success: function(response) {
                    s = JSON.parse(response);
                    if (curr!=s[0].queueId) {
                        $("#callarea").fadeOut(function(){
                            $('#num0').html(s[0].queueId);
                            $("#cou0").html(s[0].room);
                            $('#num1').html(s[1].queueId);
                            $("#cou1").html(s[1].room);
                            $('#num2').html(s[2].queueId);
                            $("#cou2").html(s[2].room);
                            $('#num3').html(s[3].queueId);
                            $("#cou3").html(s[3].room);
                        });
                        $("#callarea").fadeIn();
                        // if (curr!=0) {
                        //     var bleep = new Audio();
                        //     bleep.src = '{{ url('assets/sound/sound1.mp3') }}';
                        //     bleep.play();

                        //     window.setTimeout(function() {
                        //         msg1 = '{!! trans('messages.display.token') !!} '+s[0].queueId+' {!! trans('messages.display.please') !!} {!! trans('messages.display.proceed_to') !!} '+s[0].room;
                                
                        //     }, 800);
                        // }
                        curr = s[0].queueId;
                    }
                }
            });
        }

        window.setInterval(function() {
            checkcall();
        }, 3000);

        $(document).ready(function() {
            $.ajax({
                type: "GET",
                // url: "{{ url('assets/files/display') }}",
                cache: false,
                success: function(response) {
                    s = JSON.parse(response);
                    curr = s[0].queueId;
                }
            });
            checkcall();
        });
    </script>
@endsection