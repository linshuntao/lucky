<?php
/**
 * 西藏承亿抽奖系统
 * 林少能
 * 10832126@qq.com
 */
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title>来宾拍照</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css" />
    <script type="text/javascript" src="webcam.js"></script>
    <script type="text/javascript" src="jquery-1.8.3.min.js"></script>
    <style type="text/css">
        #cam {
            float: left;
            width: 450px;
            height: 360px;
            margin: 50px
        }

        .btn {
            height: 28px;
            line-height: 28px;
            border: 1px solid #d3d3d3;
            margin-top: 10px;
            background: url(btn_bg.gif) repeat-x;
            cursor: pointer
        }

        #results {
            margin-top: 50px;
        }
    </style>
</head>
<body>
<div id="main">
    <h2 class="top_title">
        来宾拍照
    </h2>
    <div id="cam">
        <script language="JavaScript">
            webcam.set_api_url('action.php?uid=<?php echo time();?>');
            webcam.set_quality(100); // JPEG quality (1 - 100)
            webcam.set_shutter_sound(true); // play shutter click sound
            document.write(webcam.get_html(420, 340, 420, 340));//webcam.get_html(width, height, server_width, server_height)
        </script>

        <p style="text-align: center">
            <input type="button" value="配置摄像头" class="btn" onclick="webcam.configure();">
            &nbsp;&nbsp;
            <input type=button value="点击这里拍照" class="btn"
                   onclick="take_snapshot();">
            &nbsp;&nbsp;
            <input type="button" value="重新拍照" class="btn"
                   onclick="webcam.reset();">
        </p>


        <script language="JavaScript">
            webcam.set_hook('onComplete', 'my_completion_handler');

            function take_snapshot() {
                // take snapshot and upload to server
                document.getElementById('results').innerHTML = '<h4>正在上传...</h4>';
                webcam.snap();
            }

            function my_completion_handler(msg) {
                // extract URL out of PHP output
                if (msg.match(/(http\:\/\/\S+)/)) {
                    var image_url = RegExp.$1;
                    // show JPEG image in page
                    document.getElementById('results').innerHTML = '<h4>Upload Successful!</h4>' + '<img src="' + msg + '">';

                } else {
                    alert("PHP Error:" + msg);
                }
            }
        </script>
    </div>
    <div id="results">
    </div>
</div>
<a href="../index.php">抽奖</a>
</body>
</html>
