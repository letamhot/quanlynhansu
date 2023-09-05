<?php 

    include('../../connection/connection.php');

    if(isset($_POST['btnLuuDonVi']))
    {
        $id = $_POST['id'];
        $tenDonVi = $_POST['tenDonVi'];
        $ngayThanhLap = $_POST['ngayTL'];
        $diaChi = $_POST['diaChi'];
        $idCha  = $_POST['tenDonViCha'];

        if(isset($_FILES['avatar'])) 
        {
            $errors = array();
            $file_name = $_FILES['avatar'] ['name'];
            $file_size = $_FILES['avatar'] ['name'];
            $file_tmp = $_FILES['avatar'] ['tmp_name'];
            $file_type = $_FILES['avatar'] ['type'];
    
            $arr = explode('.', $file_name);
            $file_ext = strtolower(end($arr));
            $expensions = array("jpeg", "jpg", "png","mp4","webp","");
    
            if(in_array($file_ext, $expensions) === false)
            {
    
                $errors[]= "Chỉ cho upload file ở dạng JPG, PNG và JPEG";
            }
            if($file_size > 372244480) 
            {
                $errors[] = "Chỉ cho phép upload file dưới 2MB";
            }
            if (empty($errors) == true) 
            {
            move_uploaded_file($file_tmp,"../images/imageDV/".$file_name);

            // Lệnh update
            if($file_name == null || $file_name == ""){
                $sql = "UPDATE donvi SET idCha = '".$idCha."', tenDonVi = '".$tenDonVi."', ngayThanhLap = '".$ngayThanhLap."',
                diaChi= '".$diaChi."' WHERE id= '".$id."' ";
            }
            else{
                $sql = "UPDATE donvi SET idCha = '".$idCha."', tenDonVi = '".$tenDonVi."', ngayThanhLap = '".$ngayThanhLap."',
                diaChi= '".$diaChi."', anhDV = '".$file_name."' WHERE id= '".$id."' ";
            }
               
                mysqli_query($conn, $sql);
                header('location:../indexDonVi.php');
            }
            else 
            {
                print_r($errors);
            }
        }
    }
    //Ngắt kết nối dữ liệu với db
    include('../../connection/closedatabase.php');
?>