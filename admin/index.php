<?php 

include "fungsi.php";
include "header.php";

session_start();
if(!isset($_SESSION['login'])) {
    header('location:auth/login.php');
    exit;
}

        if(isset($_GET['page'])){
            $page = $_GET['page'];
 
            switch ($page) {
                case 'object':
                  include "object.php";
                  break;
                case 'admin':
                  include "admin.php";
                  break;
                case 'form':
                  include "form.php";
                  break;
                case 'tambah_object':
                  include "tambah_object.php";
                  break;
                case 'tambah_admin':
                  include "tambah_admin.php";
                  break;
                case 'edit_object':
                  include "edit_object.php";
                  break;
                case 'edit_admin':
                  include "edit_admin.php";
                  break;
                default:
                  include "object.php";
                  break;
            }
        }

include "footer.php";
?>
        