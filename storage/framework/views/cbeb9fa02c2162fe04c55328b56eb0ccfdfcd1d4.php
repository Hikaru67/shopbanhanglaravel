<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Facebook Messenger - By James Harris</title>
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/normalize.css')); ?>">
</head>

<body>

<div class="wrapper-mobile">
    <div class="mobile"><img src="<?php echo e(asset('uploads/lone-logo.svg')); ?>">Not available on Tablet or Mobile devices.</div>
</div>

<div class="wrapper">
    <header>
        <div class="container">
            <div class="left"><img src="<?php echo e(asset('uploads/logo.svg')); ?>"></div>
            <div class="middle">
                <h3>Theresa Hudson</h3>
                <p>Messenger</p>
            </div>
            <div class="right">
                <div class="username">
                    <div class="settings"><img src="<?php echo e(asset('uploads/settings.svg')); ?>"></div>Patrcia Fields</div>
                <div class="avatar"><img src="<?php echo e(asset('uploads/avatar.png')); ?>"></div>
            </div>
        </div>
    </header>
    <main style="max-height: 500px">
        <div class="col-left">
            <div class="col-content">
                <div class="messages">
                    <li>
                        <div class="avatar">
                            <div class="avatar-image">
                                <div class="status online"></div><img src="<?php echo e(asset('uploads/avatar-2.png')); ?>"></div>
                        </div>
                        <h3>Nancy Scott</h3>
                        <p>Be there soon.</p>
                    </li>
                    <li>
                        <div class="avatar">
                            <div class="avatar-image">
                                <div class="status offline"></div><img src="<?php echo e(asset('uploads/avatar-3.png')); ?>"></div>
                        </div>
                        <h3>Cynthia Castro</h3>
                        <p>You: Yep, let's do it!</p>
                    </li>
                    <li>
                        <div class="avatar">
                            <div class="avatar-image">
                                <div class="status online"></div><img src="<?php echo e(asset('uploads/avatar-4.png')); ?>"></div>
                        </div>
                        <h3>Philip Nelson</h3>
                        <p>How does it look? I started making it a while ago</p>

                    </li>

                    <li>
                        <div class="avatar">
                            <div class="avatar-image">
                                <div class="status online"></div><img src="<?php echo e(asset('uploads/avatar-5.png')); ?>"></div>
                        </div>
                        <h3>Theresa Hudson</h3>
                        <p>Goddamn Aliens! &#128514;</p>
                    </li>

                </div>
            </div>
        </div>

        <div class="col">
            <div class="col-content">
                <section class="message">
                    <div class="grid-message">
                        <div class="col-message-received">
                            <div class="message-received">
                                <p>Ok.</p>
                            </div>
                            <div class="message-received">
                                <p>Do you play EVE Online?</p>
                            </div>
                        </div>
                        <div class="col-message-sent">
                            <div class="message-sent">
                                <p>Not anymore.</p>
                            </div>
                        </div>


                    </div>
                </section>
            </div>

            <div class="col-foot">
                <div class="compose">
                    <input placeholder="Type a message">
                    <div class="compose-dock">
                        <div class="dock"><img src="<?php echo e(asset('uploads/picture.svg')); ?>"><img src="<?php echo e(asset('uploads/smile.svg')); ?>"></div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-right">
            <div class="col-content">
                <div class="user-panel">
                    <div class="avatar">
                        <div class="avatar-image">
                            <div class="status online"></div><img src="<?php echo e(asset('uploads/avatar.png')); ?>"></div>
                        <h3>Theresa Hudson</h3>
                        <p>London, United Kingdom</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

</body>

</html>
<?php /**PATH /home/hikaru/learn-php/shopbanhanglaravel/resources/views/pages/customer/messenger.blade.php ENDPATH**/ ?>