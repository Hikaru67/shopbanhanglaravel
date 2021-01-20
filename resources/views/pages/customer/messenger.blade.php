<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Facebook Messenger - By Noname</title>
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/normalize.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'><link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>

</head>

<body>

<div class="wrapper-mobile">
    <div class="mobile"><img src="{{asset('uploads/lone-logo.svg')}}">Not available on Tablet or Mobile devices.</div>
</div>

<div class="wrapper">
    <header>
        <div class="container">
            <div class="left"><img src="{{asset('uploads/logo.svg')}}"></div>
            <div class="middle">
{{--                <h3>Theresa Hudson</h3>--}}
                <p>Messenger</p>
            </div>
            <div class="right">
                <div class="username">
                    <div class="settings"><img src="{{asset('uploads/settings.svg')}}"></div>
                    {{$customer['customer_name']}}</div>
                <div class="avatar"><img src="{{$customer['avatar']}}"></div>
            </div>
        </div>
    </header>
    <main style="max-height: 500px">
        <div class="col-left">
            <div class="col-content">
                {{--<div id="search">
                    <label for=""><i class="fa fa-search" aria-hidden="true"></i></label>
                    <input type="text" placeholder="Search contacts..." />
                </div>--}}
                <div class="messages">

                    @foreach($list_conversation as $key => $customer_c)

                        {{--@if(!isset($new[$customer_c->customer_id]))--}}
                            <a style="text-decoration: none; background: grey" href="/messenger2/{{$customer_c->id}}">
                                <li>
                                    <div class="avatar">
                                        <div class="avatar-image">
                                            <div class="status online"></div><img src="{{$customer_c->avatar}}"></div>
                                    </div>
                                    <h3>{{$customer_c->customer_name}}</h3>
                                    @if($customer_c->last_user == $customer['customer_id'])
                                        <p id="preview{{$customer_c->id}}"><span>Bạn: </span>{{$customer_c->preview}}</p>
                                    @else
                                        <p id="preview{{$customer_c->id}}">{{$customer_c->preview}}</p>
                                    @endif

                                </li>
                            </a>
                        {{--@endif--}}
                    @endforeach

                    {{--<li>
                        <div class="avatar">
                            <div class="avatar-image">
                                <div class="status offline"></div><img src="{{asset('uploads/avatar-3.png')}}"></div>
                        </div>
                        <h3>Cynthia Castro</h3>
                        <p>You: Yep, let's do it!</p>
                    </li>--}}

                </div>
            </div>
        </div>

        <div class="col">
            <div class="col-content">
                <section class="message">
                    <div class="grid-message">
                        @foreach($list_message as $key => $message)
                            @if($message->sender_id==$customer['customer_id'])
                                <div class="col-message-sent">
                                    <div class="message-sent">
                                        <p>{{$message->content}}</p>
                                    </div>
                                </div>
                            @else
                                <div class="col-message-received">
                                    <div class="message-received">
                                        {{$message->content}}
                                    </div>
                                </div>
                            @endif
                        @endforeach

                    </div>
                </section>
            </div>

            <div class="col-foot" >
                <div class="compose" >
                    <form method="POST" enctype="multipart/form-data">
                        <input type="text" name="content" id="content" placeholder="Aa">
                        <div class="compose-dock" >
                            <div class="dock" >
                                {{--<input type="file" name="image_content" value="asd">--}}

                                <div class="input-group mb-3" style="float: left">
                                    <input type="file" class="form-control"  name="content_image" id="content_image" style="display: none">
                                    <label class="input-group-text" for="content_image">
                                        <img name="upload_img" id="upload_img" src="{{asset('uploads/picture.svg')}}">
                                    </label>
                                </div>

                                <img src="{{asset('uploads/smile.svg')}}">

                                <button class="submit" id="submit_btn" style="display: none"></button>
                                <label class="input-group-text" for="submit_btn">
                                    <img class="icon" id="send_img" src="https://e7.pngegg.com/pngimages/891/367/png-clipart-computer-icons-symbol-send-email-button-miscellaneous-blue.png" alt="">
                                </label>

                            </div>

                        </div>
                    </form>


                </div>
            </div>

        </div>

        <div class="col-right">
            <div class="col-content">
                <div class="user-panel">
                    <div class="avatar">
                        <div class="avatar-image">
                            <div class="status online"></div><img src="{{$receiver['avatar']}}"></div>
                        <h3>{{$receiver['customer_name']}}</h3>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/3.0.5/socket.io.js"></script>
<script>
    $(".col-content").animate({ scrollTop: $(".col-content").height()*10}, "fast");

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

    $(document).ready(function (e) {
        $('#content_image').on('change', function (e){
            var file = $(this)[0].files[0];
            var upload = new Upload(file);

            // maby check size or type here with upload.getSize() and upload.getType()

            // execute upload
            upload.doUpload();
            console.log(file);
           /* let img = $('#content_image').val();
            console.log('<img class="img-thumbnail" src="'+img+'" alt="">');
            $('<img class="img-thumbnail" src="'+img+'" alt="">').appendTo($('#content'));*/
        });

        $('#content_image').on('submit', function (e) {

            console.log('asd');
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                type:'POST',
                url: $(this).attr('add-message'),
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                success:function(data){
                    console.log("success");
                    console.log(data);
                },
                error: function(data){
                    console.log("error");
                    console.log(data);
                }
            });
        })
    });


    function newMessage() {
        let message = $('input[name="content"]').val();

        if($.trim(message) == '') {
            return false;
        }

        $.ajax({
                url: '{{url('/add-message')}}',
            method: 'POST',
            data:{sender_id: "{{$customer['customer_id']}}", conversation_id: "{{$conversation_id}}", content: message, _token: "{{ csrf_token() }}"},
            success:function(){
                $('<div class="col-message-sent"><div class="message-sent"><p>'+ message +'</p></div></div>').appendTo($('.grid-message'));
                {{--$('<li class="sent"><img src="{{$customer['avatar']}}" alt="" /><p>' + message + '</p></li>').appendTo($('.messages ul'));--}}
                $('input[name="content"]').val(null);
                $('#preview{{$conversation_id}}').html('<span>Bạn: </span>' + message);
                $(".col-content").animate({ scrollTop: $('.col-content').height()*10}, "slow");
            }
        });
    };
    var socket = io('http://127.0.0.1:6001')
    socket.on('laravel_database_chat:message', function (data){
        console.log(data)

        if($('#'+data.id).length == 0){
            // console.log($('#'+data.id))
            if(data.sender_id!="{{$customer['customer_id']}}"){
                {{--$('<li class="replies"><img src="{{$receiver['avatar']}}" alt="" /><p>' + data.content + '</p></li>').appendTo($('.messages ul'));--}}
                $('<div class="col-message-received"><div class="message-received"><p>'+ data.content+ '</p></div></div>').appendTo($('.grid-message'));
                $('input[name="content"]').val(null);
                console.log(data.conversation_id);
                // $('.contact.active .preview').html(data.content);
                $('#preview'+data.conversation_id).html(data.content);
                $(".col-content").animate({ scrollTop: $(".col-content").height()*10}, "fast");

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
</body>

</html>
