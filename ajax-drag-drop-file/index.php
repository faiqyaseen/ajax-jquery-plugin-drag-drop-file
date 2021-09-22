<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dropzone.css">
    <style>
        .dropzone{
            border: 1px dashed black;
        }
    </style>
</head>

<body>
    <div class="container">

        <header>
            <div class="row justify-content-center bg-warning p-5">
                <div class="col-md-6">
                    <h3>DRAG & DROP UPLOAD FILES USING DROPZONEJS WITH PHP </h3>
                </div>
            </div>
        </header>

        <div class="row mt-2 justify-content-center">
            <div class="col-md-8">
                
                    <form class="dropzone" id="file_upload">
                    </form>
                    <button class="btn btn-primary mt-1" id="uploadBtn">Upload</button>
                
            </div>
            <div class="message col-md-10"></div>
        </div>

    </div>



    <script src="js/jquery.js"></script>
    <script src="js/dropzone.js"></script>
    <!-- <script src="js/bootstrap.bundle.min.js"></script> -->
    <script>
        Dropzone.autoDiscover = false;
        // With Javascript
        var myDropzone = new Dropzone("#file_upload", { 
            url: "code.php",
            parallelUploads : 3,
            uploadMultiple : true,
            acceptedFiles : '.png,.jpg,.jpeg',
            autoProcessQueue : false,
            success : function(file, response){
                // $(".message").html(response);
                if(response == 'extension error or name error'){
                    alert("extension error or name error");
                }else if(response == 'query-fail'){
                    alert("query-fail");
                }else if(response == 'true'){
                    alert("true");
                }
            }
        }
        );
       
            $("#uploadBtn").click(function(){
                myDropzone.processQueue();
            })
           
        
    </script>
</body>

</html>