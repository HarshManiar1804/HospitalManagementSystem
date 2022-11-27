<?php
 
//importing dbDetails file
require 'db1.php';

$id=$_GET['id'];
$type=$_GET['type'];
$Fname=$_GET['name'];

//this is our upload folder
$upload_path = 'AndroidPdfUpload/';
 
//Getting the server ip
$server_ip = gethostbyname(gethostname());
 
//creating the upload url
$upload_url = 'http://'.$server_ip.'/AdminLTE-3.0.5/'.$upload_path;
 //echo $upload_url;
//response array
$response = array();
 
 
if($_SERVER['REQUEST_METHOD']=='POST'){
 
    //checking the required parameters from the request
    if(isset($_POST['name']) and isset($_FILES['pdf']['name'])){
 
        //connecting to the database
        $con = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die('Unable to Connect...');
 
        //getting name from the request
        $name = $_POST['name'];

        $name = str_replace(' ', '-', $name);
 
        //getting file info from the request
        $fileinfo = pathinfo($_FILES['pdf']['name']);
 
        //getting the file extension
        $extension = $fileinfo['extension'];
 
        //file url to store in the database
        $file_url = $upload_url . $name;
 
        //file path to upload in the server
        $file_path = $upload_path . $name;;
        //trying to save the file in the directory

        try{
            //saving the file
            move_uploaded_file($_FILES['pdf']['tmp_name'],$file_path);
            //$sql = "INSERT INTO `INS_PDFUpload`.`pdfs` (`ID, `PDFName`, `PDFURL`) VALUES (NULL, '$name','$file_url');";
             $sql = "insert into files(ID,PDFURL,UserEmail,ReportType,PDFName) values(NULL,'$file_url','$id','$type','$Fname')";
            //adding the path and name to database
            if(mysqli_query($con,$sql)){
 
                //filling response array with values
                $response['error'] = false;
                $response['PDFURL'] = $file_url;
                $response['PDFName'] = $name;
            }
            
            //if some error occurred
        }catch(Exception $e){
            echo $response['error'];
            $response['error']=true;
            $response['message']=$e->getMessage();
        } 
        //closing the connection
        mysqli_close($con);
    }else{
        $response['error']=true;
        $response['message']='Please choose a file';
    }
    
    //displaying the response
    echo json_encode($response);
}
 

function getFileName(){
    $con = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die('Unable to Connect...');
    $sql = "SELECT max(id) as id FROM files";
    $result = mysqli_fetch_array(mysqli_query($con,$sql));
 
    mysqli_close($con);
    if($result['id']==null)
        return 1;
    else
        return ++$result['id'];
}