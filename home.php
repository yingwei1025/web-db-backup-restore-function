<html>

<head>
    <title>Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>

    <br>
    <center>
        <h1>Backup Restore Database Function</h1>
        <small>Design by Chua Ying Wei 2017</small>
    </center>
    <hr>
    <br>

    <div class="container">
        <div class="col-md-3">
            <form method="post" action="backup.php">
                <button type="submit" name="backup" title="Save database to server" class="btn btn-success"> Backup Now <span class="glyphicon glyphicon-cloud-download"></span>
                </button>
            </form>
        </div>
        <!-- col-md-3 -->

        <div class="col-md-3">
            <form method="post" action="backupdownload.php">
                <button type="submit" name="download" title="Download database to local" class="btn btn-primary btn-info"> Download Backup <span class="glyphicon glyphicon-download-alt"></span>
                </button>
            </form>
        </div>
        <!-- col-md-3 -->

        <div class="col-md-6">

            <form class="form-horizontal" action="import.php" method="post" name="upload_excel" enctype="multipart/form-data">
                <fieldset>

                    <!-- Form Name -->
                    <legend>Restore Backup</legend>

                    <!-- File Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="filebutton">Select File</label>
                        <div class="col-md-8">
                            <input type="file" name="file" id="file" accept=".sql" class="form-control" required>
                        </div>
                    </div>

                    <!-- Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="singlebutton">Import File</label>
                        <div class="col-md-2">
                            <button type="submit" title="Restore backup" id="submit" name="Import" class="btn btn-sm btn-primary button-loading" data-loading-text="Loading...">Import <i class="fa fa-upload" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>

                </fieldset>
            </form>


        </div>
        <!-- col-md-6 -->
        
    </div>
    <!-- container -->


</body>

</html>