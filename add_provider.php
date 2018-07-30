<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Provider</title>

     <link rel="stylesheet" type="text/css"  href="css/bootstrap.min.css" /> 
     <link rel="stylesheet" href="css/animate.css">
     
     <link rel="stylesheet" type="text/css"  href="https://cdnjs.cloudflare.com/ajax/libs/hamburgers/0.9.3/hamburgers.min.css">
     <link rel="stylesheet" type="text/css"  href="node_modules/animsition/dist/css/animsition.min.css">
     <link rel="stylesheet" type="text/css"  href="node_modules/select2/dist/css/select2.min.css">
     <link rel="stylesheet" type="text/css"  href="node_modules/daterangepicker/daterangepicker.css">
     <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
     <link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" action="con_add_provider.php" method="post" >
				<span class="contact100-form-title">
					Add Provider
				</span>

				<label class="label-input100" for="name">Provider Name *</label>
				<div class="wrap-input100  validate-input" data-validate="Type Provider Name">
					<input id="name" class="input100" type="text" name="name" placeholder="Provider Name">
					<span class="focus-input100"></span>
                </div>
                
                <label class="label-input100" for="cid">Provider CID *</label>
				<div class="wrap-input100  validate-input" data-validate="Type Provider CID">
					<input id="cid"class="input100" type="text" name="cid" placeholder="Provider CID">
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="bandwidth">Bandwidth(Mbps) *</label>
				<div class="wrap-input100 validate-input" data-validate = "Type Your Bandwidth">
					<input id="bandwidth" class="input100" type="text" name="bandwidth" placeholder="Bandwidth(Mbps)">
					<span class="focus-input100"></span>
				</div>
                
                <label class="label-input100" for="pid">Provider ID *</label>
				<div class="wrap-input100 validate-input" data-validate = "Provider ID is required">
                    <!-- <input id="pid" class="input100" name="pid" placeholder="Type Your Provider ID"></input>-->
                    <select  id="pid" class=" selectpicker select100" name="pid" placeholder="Select Your Provider ID" >
                    <option></option>
                        <option>UIH</option>
                        <option>Symphony</option>
                        <option>3BB</option>
                        <option>CAT</option>
                        <option>TOT</option>
                        
                    </select>
                        
					<span class="focus-input100"></span> 
				</div>

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn" type="submit">
						Submit
					</button>
				</div>
			</form>

			<div class="contact100-more flex-col-c-m" >
				<!-- <div class="flex-w size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-map-marker"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							Address
						</span>

						<span class="txt2">
							Mada Center 8th floor, 379 Hudson St, New York, NY 10018 US
						</span>
					</div>
				</div> -->

				<!-- <div class="dis-flex size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-phone-handset"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							Lets Talk
						</span>

						<span class="txt3">
							+1 800 1236879
						</span>
					</div>
				</div> -->

				<!-- <div class="dis-flex size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-envelope"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							General Support
						</span>

						<span class="txt3">
							contact@example.com
						</span>
					</div>
				</div> -->
			</div>
		</div>
	</div>



	<div id="dropDownSelect1"></div>
    <script src="js/bootstrap.min.js"></script>
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/animsition/dist/js/animsition.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="node_modules/select2/dist/js/select2.min.js"></script>
    <script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
    <script src="node_modules/daterangepicker/daterangepicker.js"></script>
    <script src="node_modules/moment/min/moment.min.js"></script>
    <script src="js/main.js"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
	</script>
   </body>
</html>