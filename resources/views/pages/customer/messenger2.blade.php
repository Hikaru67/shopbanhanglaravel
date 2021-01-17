<!DOCTYPE html>
<html class='' lang="">
<head>
    <title></title>
{{--
    <script src='//production-assets.codepen.io/assets/editor/live/console_runner-079c09a0e3b9ff743e39ee2d5637b9216b3545af0de366d4b9aad9dc87e26bfd.js'></script>
    <script src='//production-assets.codepen.io/assets/editor/live/events_runner-73716630c22bbc8cff4bd0f07b135f00a0bdc5d14629260c3ec49e5606f98fdd.js'></script>
    <script src='//production-assets.codepen.io/assets/editor/live/css_live_reload_init-2c0dc5167d60a5af3ee189d570b1835129687ea2a61bee3513dee3a50c115a77.js'></script>
--}}
    <meta charset='UTF-8'>
    <meta name="robots" content="noindex">
    <link rel="shortcut icon" type="image/x-icon" href="//production-assets.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" />
    <link rel="mask-icon" type="" href="//production-assets.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg" color="#111" />
    <link rel="canonical" href="https://codepen.io/emilcarlsson/pen/ZOQZaV?limit=all&page=74&q=contact+" />
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,300' rel='stylesheet' type='text/css'>
{{--    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">--}}
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <!------ Include the above in your HEAD tag ---------->

{{--    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">--}}

    <!------ Include the above in your HEAD tag ---------->
    <script>try{Typekit.load({ async: true });}catch(e){}</script>
    <link rel="stylesheet" href="{{asset('frontend/css/style2.css')}}">
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'><link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>
    <style class="cp-pen-styles">

    </style>
</head>

<body>
<!--

A concept for a chat interface.

Try writing a new message! :)


Follow me here:
Twitter: https://twitter.com/thatguyemil
Codepen: https://codepen.io/emilcarlsson/
Website: http://emilcarlsson.se/

-->

<div id="frame">
    <div id="sidepanel">
        <div id="profile">
            <div class="wrap">
                <img id="profile-img" src="{{$customer['avatar']}}" class="online" alt="" />
                <p>{{$customer['customer_name']}}</p>
                <i class="fa fa-chevron-down expand-button" aria-hidden="true"></i>
                <div id="status-options">
                    <ul>
                        <li id="status-online" class="active"><span class="status-circle"></span> <p>Online</p></li>
                        <li id="status-away"><span class="status-circle"></span> <p>Away</p></li>
                        <li id="status-busy"><span class="status-circle"></span> <p>Busy</p></li>
                        <li id="status-offline"><span class="status-circle"></span> <p>Offline</p></li>
                    </ul>
                </div>
                <div id="expanded">
                    <label for="twitter"><i class="fa fa-facebook fa-fw" aria-hidden="true"></i></label>
                    <input name="twitter" type="text" value="mikeross" />
                    <label for="twitter"><i class="fa fa-twitter fa-fw" aria-hidden="true"></i></label>
                    <input name="twitter" type="text" value="ross81" />
                    <label for="twitter"><i class="fa fa-instagram fa-fw" aria-hidden="true"></i></label>
                    <input name="twitter" type="text" value="mike.ross" />
                </div>
            </div>
        </div>
        <div id="search">
            <label for=""><i class="fa fa-search" aria-hidden="true"></i></label>
            <input type="text" placeholder="Search contacts..." />
        </div>
        <div id="contacts">

            <ul>
                @foreach($list_customer as $key => $customer_c)
                    @if(!isset($new[$customer_c->customer_id]))
                        {{$new[$customer_c->customer_id] = ''}}
                        <a href="/messenger/{{$customer_c->customer_id}}">
                            <li class="contact">
                                <div class="wrap">
                                    <span class="contact-status online"></span>
                                    <img src="{{$customer_c->avatar}}" alt="" />
                                    <div class="meta">
                                        <p class="name">{{$customer_c->customer_name}}</p>
                                        <p class="preview" id="preview{{$customer_c->customer_id}}">{{$customer_c->content}}</p>
                                    </div>
                                </div>
                            </li>
                        </a>
                    @endif
                @endforeach
            </ul>
        </div>
        <div id="bottom-bar">
            <button id="addcontact"><i class="fa fa-user-plus fa-fw" aria-hidden="true"></i> <span>Add contact</span></button>
            <button id="settings"><i class="fa fa-cog fa-fw" aria-hidden="true"></i> <span>Settings</span></button>
        </div>
    </div>
    <div class="content">
        <div class="contact-profile">
            <img src="{{$receiver['avatar']}}" alt="" />
            <p>{{$receiver['customer_name']}}</p>
            <div class="social-media">
                <i class="fa fa-facebook" aria-hidden="true"></i>
                <i class="fa fa-twitter" aria-hidden="true"></i>
                <i class="fa fa-instagram" aria-hidden="true"></i>
            </div>
        </div>
        <div class="messages">
            <ul>
                @foreach($list_message as $key => $message)
                    @if($message->customer_id==$customer['customer_id'])
                        <li class="sent">
                            <img src="{{$customer['avatar']}}" alt="" />
                            <p>{{$message->content}}</p>
                        </li>
                    @else
                        <li class="replies">
                            <img src="{{$receiver['avatar']}}" alt="" />
                            <p>{{$message->content}}</p>
                        </li>
                    @endif
                @endforeach

            </ul>
        </div>
        <div class="message-input">
            <div class="wrap">
                {{--<label>
                    <input type="text" name="customer_id" value="{{$customer['customer_id']}}" hidden="">
                    <input type="text" name="receiver_id" value="{{$receiver['customer_id']}}" hidden="">
                </label>--}}
                {{csrf_field()}}
                <input type="text" name="content" placeholder="Write your message..." />
                <i class="fa fa-paperclip attachment" aria-hidden="true"></i>
                <button class="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>
</div>
{{--<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script>--}}
<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/3.0.5/socket.io.js"></script>
<script >
    $(".messages").animate({ scrollTop: $(document).height()+10000 }, "fast");

    $("#profile-img").click(function() {
        $("#status-options").toggleClass("active");
    });

    $(".expand-button").click(function() {
        $("#profile").toggleClass("expanded");
        $("#contacts").toggleClass("expanded");
    });

    $("#status-options ul li").click(function() {
        $("#profile-img").removeClass();
        $("#status-online").removeClass("active");
        $("#status-away").removeClass("active");
        $("#status-busy").removeClass("active");
        $("#status-offline").removeClass("active");
        $(this).addClass("active");

        if($("#status-online").hasClass("active")) {
            $("#profile-img").addClass("online");
        } else if ($("#status-away").hasClass("active")) {
            $("#profile-img").addClass("away");
        } else if ($("#status-busy").hasClass("active")) {
            $("#profile-img").addClass("busy");
        } else if ($("#status-offline").hasClass("active")) {
            $("#profile-img").addClass("offline");
        } else {
            $("#profile-img").removeClass();
        };

        $("#status-options").removeClass("active");
    });

    function newMessage() {
        var message = $('input[name="content"]').val();
        if($.trim(message) == '') {
            return false;
        }

        $.ajax({
            url: '{{url('/add-message')}}',
            method: 'POST',
            data:{customer_id: "{{$customer['customer_id']}}", receiver_id: "{{$receiver['customer_id']}}", content: message, _token: "{{ csrf_token() }}"},
            success:function(){
                $('<li class="sent"><img src="{{$customer['avatar']}}" alt="" /><p>' + message + '</p></li>').appendTo($('.messages ul'));
                $('input[name="content"]').val(null);
                $('.contact.active .preview').html('<span>You: </span>' + message);
                $(".messages").animate({ scrollTop: $(document).height()+10000 }, "fast");
            }
        });
    };
    var socket = io('http://127.0.0.1:6001')
    socket.on('laravel_database_chat:message', function (data){
        console.log(data)

        if($('#'+data.id).length == 0){
            // console.log($('#'+data.id))
            if(data.customer_id == "{{$receiver['customer_id']}}" && data.customer_id!="{{$customer['customer_id']}}"){
                $('<li class="replies"><img src="{{$receiver['avatar']}}" alt="" /><p>' + data.content + '</p></li>').appendTo($('.messages ul'));
                $('input[name="content"]').val(null);
                $('.contact.active .preview').html(data.content);
                $(".messages").animate({ scrollTop: $(document).height()+10000 }, "fast");
            }
        }
    })

    $('.submit').click(function() {
        newMessage();
    });

    $(window).on('keydown', function(e) {
        if (e.which == 13) {
            newMessage();
            return false;
        }
    });
    //# sourceURL=pen.js



</script>
<script src="{{asset('frontend/js/jquery.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.prettyPhoto.js')}}"></script>
<script src="https://use.typekit.net/hoy3lrg.js"></script>
{{--<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>--}}

</body>
</html>
