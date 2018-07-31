<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8"/>
    <title>Horizontal Menu</title>

    <!-- Stylesheets -->
    <!-- call Less file with Less.js or use Less App in Mac -->
    <!--    <link rel="stylesheet" href="less/style.less" type="text/less" media="screen"/>-->
    <link rel="stylesheet" href="css/style.css" media="screen"/>


    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="js/menu.js"></script>
    <script>
        jQuery(function($) {
            // you can call this way
            var myMenu = new HorizontalMenu('#myMenu');
            myMenu.init();
            // or this jQueryfied way
            $('#myMenu2').horizontalMenu();
        });
    </script>

</head>
<body>
<div class="pageCenter">
    <!-- Header -->
    <header id="top">
        <h1><a href="#">Horizontal Menu</a></h1>
    </header>

    <section class="maincontent">
    <div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="tab" role="tabpanel">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab">Section 1</a></li>
                    <li role="presentation"><a href="#Section2" aria-controls="profile" role="tab" data-toggle="tab">Section 2</a></li>
                    <li role="presentation"><a href="#Section3" aria-controls="messages" role="tab" data-toggle="tab">Section 3</a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content tabs">
                    <div role="tabpanel" class="tab-pane fade in active" id="Section1">
                        <h3>Section 1</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce semper, magna a ultricies volutpat, mi eros viverra massa, vitae consequat nisi justo in tortor. Proin accumsan felis ac felis dapibus, non iaculis mi varius.</p>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="Section2">
                        <h3>Section 2</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce semper, magna a ultricies volutpat, mi eros viverra massa, vitae consequat nisi justo in tortor. Proin accumsan felis ac felis dapibus, non iaculis mi varius.</p>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="Section3">
                        <h3>Section 3</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce semper, magna a ultricies volutpat, mi eros viverra massa, vitae consequat nisi justo in tortor. Proin accumsan felis ac felis dapibus, non iaculis mi varius.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    </section>

    <footer id="bottom">
        <div class="air line">
            leo@balter.com.br
        </div>
    </footer>
</div>

<script>
</script>
</body>
</html>