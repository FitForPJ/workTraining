<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("button").click(function(){
        $('#link').attr('value', 'new value');
    });
});
</script>
</head>
<body>

<p><b>Note:</b> Check and uncheck the checkbox and then click the button to refresh content.</p>
<button>Check value of attr() and prop()</button>
<br><br>

<input type = 'text' value = 'http://www.link.com' id = 'link' />
<label for="check1">Check me</label>
<p id="p1"></p>

</body>
</html>