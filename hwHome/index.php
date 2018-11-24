<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>hackweb | hwHome</title>
<style>
body{
    text-align: center;
    color: #444;
    font-size: 16px;
    font-family: arial,sans-serif;
    background-color: #fff;
}
input[type="text"] {
    width: calc(100% - 30px);
    background-color: #fff;
    /* -webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,0.16), 0 0 0 1px rgba(0,0,0,0.08);
    -moz-box-shadow: 0 2px 2px 0 rgba(0,0,0,0.16), 0 0 0 1px rgba(0,0,0,0.08);
    box-shadow: 0 2px 2px 0 rgba(0,0,0,0.16), 0 0 0 1px rgba(0,0,0,0.08); */
    border: none;
    border: 0.5px solid rgba(0,0,0,0.16);
    margin: 8px auto;
    margin-bottom: 5px;
    padding: 10px 8px;
    color: rgba(0,0,0,.87);
    word-wrap: break-word;
    outline: none;
    display: flex;
    flex: 100%;
    font-size: 14px;    
    max-width: 484px; 
}
input[type="submit"]{
    background-image: -webkit-gradient(linear,left top,left bottom,from(#f5f5f5),to(#f1f1f1));
    background-image: -webkit-linear-gradient(top,#f5f5f5,#f1f1f1);
    -webkit-border-radius: 2px;
    -webkit-user-select: none;
    background-color: #f2f2f2;
    border: 1px solid #f2f2f2;
    border-radius: 2px;
    color: #444;
    cursor: pointer;
    font-family: arial,sans-serif;
    font-size: 13px;
    font-weight: bold;
    margin: 11px 4px;
    min-width: 54px;
    padding: 8px 16px;
    text-align: center;    
    -webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,0.16), 0 0 0 1px rgba(0,0,0,0.08);
    -moz-box-shadow: 0 2px 2px 0 rgba(0,0,0,0.16), 0 0 0 1px rgba(0,0,0,0.08);
    box-shadow: 0 2px 2px 0 rgba(0,0,0,0.16), 0 0 0 1px rgba(0,0,0,0.08);
    outline: none !important;
}
h1{
    font-family: "Verdana";
    color: #212529;
    margin-top: 100px;
    margin-bottom: 0px;
}
.primary{
    color: #4885ed;
}
.secondary{
    color: #212529;
}
label{
    font-size: 14px;
}
a{
    text-decoration:none;
}
.btn{
    background-image: -webkit-gradient(linear,left top,left bottom,from(#f5f5f5),to(#f1f1f1));
    background-image: -webkit-linear-gradient(top,#f5f5f5,#f1f1f1);
    -webkit-border-radius: 2px;
    -webkit-user-select: none;
    background-color: transparent;
    border: 1px solid #f2f2f2;
    border-radius: 2px;
    color: #444;
    cursor: pointer;
    font-family: arial,sans-serif;
    font-size: 13px;
    font-weight: bold;
    margin: 11px 4px;
    min-width: 54px;    
    text-align: center;    
    -webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,0.16), 0 0 0 1px rgba(0,0,0,0.08);
    -moz-box-shadow: 0 2px 2px 0 rgba(0,0,0,0.16), 0 0 0 1px rgba(0,0,0,0.08);
    box-shadow: 0 2px 2px 0 rgba(0,0,0,0.16), 0 0 0 1px rgba(0,0,0,0.08);
    outline: none !important;
}
</style>
<script src="./hwHome/jquery.js"></script>
</head>
<body>

<a href="https://www.hackweb.it">
    <h1>
        <strong>
            <span class="primary">hack</span><span class="secondary">web </span>
            <!-- <span class="primary">h</span><span class="secondary">w</span><span class="">Home</span> -->
        </strong>
    </h1>
</a>
<p>
    <strong>hwHome</strong>
    <br>    
    <form method="post" action="<?php echo htmlspecialchars('/hwHome/');?>">
        <label for="name">Name</label>        
        <input autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" type="text" id="name" name="c" value="<?php echo @$_GET['s']; ?>">        
        <input type="submit" name="submit" id="turnon" value="Send"> 
    </form>
    <br>
    <!-- <div>
        <?php
        //require_once(__DIR__.'/wake.php');
        ?>
    </div> -->
    <div id="ping"></div>
    <br>
    <div id="status"></div>
</p>

<script>
function ping(){
    $.get( "./hwHome/ping.php", function(data) {
        $('#ping').html(data);
    });
}

$(function(){
    // ping
    ping();
    window.setInterval(function(){
        ping();        
    }, 10000);    

    // hibernate
    $('body').on('click', '#hibernate', function(){
        $.get( "./hwHome/hibernate.php", function(data) {
            $('#status').html(data);
        });
    });

    // turn on
    $('#turnon').click(function(e){
        e.preventDefault();
        $.post( "./hwHome/wake.php?c=002", { c: $('#name').val() }, function(data) {
            $('#status').html(data);
        });
    });
});
</script>

</body>
</html>