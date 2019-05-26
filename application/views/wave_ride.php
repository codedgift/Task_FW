<DOCTYPE html>
    <html>
        <head>
            <title>Wave Ride</title>
            <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
            <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        </head>
        <body>

            <div class="container">
                <div class="row">

                    <h1 class="text-center" style="font-family: arial black; padding: 20px; font-weight: bold;"> <i class="fa fa-car"></i>Welcome to WaveRide</h1>

                    <center><a href="#" onclick="myFun()" id="hideMe" class="btn btn-sm btn-primary"><i class="fa fa-arrow-right"></i> Click here to ride with us</a></h3></center>

                    <div id="showMe" class="panel panel-default" style=" display: none; margin: 0px auto; width: 50%;">
                        <div class="panel-body">
                            
                            <p class="text-center">Your Current Location is <span style="font-weight: bold"> Egbeda </span></p>
                            
                            <center>
                                
                                <form class="form-inline" id="myForm" action="<?= site_url('app/ajaxRequest')?>" method="POST">
                                    <div class="form-group">
                                        <label for="exampleInputName2">Enter Destination</label>

                                        <input id="myPlace" type="text" maxlength="11" name="destination" class="form-control" placeholder="Enter Destination" required="">
                                        <button type="submit" class="btn btn-primary">Proceed</button>
                                    </div>
                                </form>
                                
                                
                                <div class="panel panel-default" id="paymentSection" style="display: none; margin-top: 3%;">
                                    <div class="panel-body">
                                        <p id="destination" style="font-weight: bold;"></p>
                                        
                                        <!--Rave API Begins from here-->
                                        <form>
                                            <script src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
                                            <button class="btn btn-primary" type="button" onClick="payWithRave()">Pay Now &#8358;2000</button>
                                        </form>

                                        <script>
                                            const API_publicKey = "FLWPUBK-e65461b384fa336b158a8c33e75ac48f-X";

                                            function payWithRave() {
                                                var x = getpaidSetup({
                                                    PBFPubKey: API_publicKey,
                                                    customer_email: "codedgift@gmail.com",
                                                    amount: 2000,
                                                    currency: "NGN",
                                                    txref: "rave-123456",
                                                    subaccounts: [
                                                      {
                                                        id: "RS_17705CD6BA2763868F38482D104ADA3C" // This assumes you have setup your commission on the dashboard.
                                                      }
                                                    ],
                                                    meta: [{
                                                        metaname: "WaveRide",
                                                        metavalue: "1551234"
                                                    }],
                                                    onclose: function() {},
                                                    callback: function(response) {
                                                        var txref = response.tx.txRef; // collect flwRef returned and pass to a 					server page to complete status check.
                                                        console.log("This is the response returned after a charge", response);
                                                        if (
                                                            response.tx.chargeResponseCode == "00" ||
                                                            response.tx.chargeResponseCode == "0"
                                                        ) {
                                                            // redirect to a success page
                                                        } else {
                                                            // redirect to a failure page.
                                                        }

                                                        x.close(); // use this to close the modal immediately after payment.
                                                    }
                                                });
                                            }
                                        </script>
                                        
                                        <!--Rave API Ends here-->
                                    </div>
                                  </div>
                            </center>
                        </div>
                        <div class="panel-footer text-center">All Right Reserved WaveRide <?= date('Y')?></div>
                    </div>
                </div>
            </div>
        </body>

        <script src="<?= base_url() ?>assets/js/jquery-2.2.4.min.js"  crossorigin="anonymous"></script>
        <script src="<?= base_url() ?>assets/js/bootstrap.min.js"  crossorigin="anonymous"></script>

        <script>
            
            function myFun() {
                document.getElementById("hideMe").style.display = "none";
                document.getElementById("showMe").style.display = "block";
            }
            
            function showMore(){
                document.getElementById('dest').style.display = "block";
            }
            
            $("#myForm").submit(function(event){
                event.preventDefault(); //prevent default action 
                var post_url = $(this).attr("action"); //get form action url
                var request_method = $(this).attr("method"); //get form GET/POST method
                var form_data = $(this).serialize(); //Encode form elements for submission

                $.ajax({
                        url : post_url,
                        type: request_method,
                        data : form_data
                }).done(function(response){ //
                        document.getElementById('paymentSection').style.display = "block";
                        $("#destination").html(response);
                });
            });
        </script>
    </html>
