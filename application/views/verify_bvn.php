<html>

    <head>

        <title>BVN Verification</title>

        <!--<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->

        <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    </head>

    <body>

        <div class="container">

            <div class="row">



                <div class="panel panel-default" style="margin-top: 4%; width: 50%;">

                    <div class="panel-heading" style="font-weight: bold; font-size: 25px;">BVN Verification</div>
                    <small style="color: red; font-size: 14px; font-weight: bold;">Note: This API is in test mode</small>
                    <div class="panel-body">


                        <?= form_open(base_url(), array("class" => "form-inline")) ?>

                        <div class="form-group">

                            <label for="exampleInputName2">Enter Your BVN</label>

                            <input type="number" maxlength="11" name="bvnNum" class="form-control" id="bvnNum" placeholder="Enter Valid BVN" required="" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">

                        </div>

                        <button type="submit" class="btn btn-primary" onclick="showMe()">Verify BVN</button>

                        <?= form_close() ?>
                        
                        <p><?= $display?></p>
                        
                        
                       
                        
                    </div>
                    
                </div>

            </div>

        </div>

    </body>



    <script src="<?= base_url() ?>assets/js/bootstrap.min.js"  crossorigin="anonymous"></script>


</html>

