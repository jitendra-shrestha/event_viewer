<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Event Viewer | Dashboard</title>

    <link href="public/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="public/assets/css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <link href="public/assets/css/animate.css" rel="stylesheet">
    <link href="public/assets/css/style.css" rel="stylesheet">

    <link href="public/assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">

      <!-- Data Tables -->
      <link href="public/assets/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="public/assets/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
    <link href="public/assets/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">

     <!-- dropify -->
     <link href="public/assets/js/plugins/dropify/css/dropify.min.css" rel="stylesheet">
     <link href="public/assets/js/plugins/dropify/css/dropify.css" rel="stylesheet">


    <script>
            function donotloadme()
        {
          var character =  document.getElementById('checkname').value;
          var req;
          if(window.XMLHttpRequest)
          {
            req = new XMLHttpRequest();
            
          }
          else req = new ActiveXObject("Microsoft.XMLHTTP");
          req.onreadystatechange = function()
          {
            if(req.readyState==4)
            {
          
              document.getElementById('usernamecheck').innerHTML = req.responseText;
          //		document.getElementById('but').disabled=true;
            }
          }
        req.open("GET", "check.php?uname="+character, true)
        req.send();
        }
      </script>
</head>


               