<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require('../../../../wp-blog-header.php');

define("IMAGE_PATH", '../images/user_avatar/');

$action = $_POST['action'];
$data = $_POST['data'];

if (isset($_POST['picture_link']))
    $picture_link = $_POST['picture_link'];
else
    $picture_link = null;

if (isset($_POST['activate']))
    $activate = $_POST['activate'];
else
    $activate = null;

$user_id = bp_loggedin_user_id();
MapAction::performAction($action, $user_id, $data, $picture_link, $activate);

/////////////////////////////////////////////
class MapAction {

    public static function performAction($action, $user_id, $data = null, $picture_link = null, $activate = null) {
        switch ($action) {
            case 'saveavatar':
                self::saveAvatar($user_id, $data, $picture_link);
                break;
            case 'loadavatar':
                self::loadAvatar($user_id);
                break;
            case 'activateavatar':
                self::activateavatar($user_id, $data, $picture_link, $activate);
                break;
            case 'getactivatedavatarurl':
                self::getactivatedavatarurl($user_id);
                break;
        }
    }

    public static function createPngOnServer($imagedata,$user_id) {
        list($type, $imagedata) = explode(';', $imagedata);
        list(, $imagedata) = explode(',', $imagedata);
        $image_path=IMAGE_PATH . $user_id.'_img.png';

        file_put_contents($image_path, base64_decode($imagedata));
        $image_path=get_template_directory_uri().'/images/user_avatar/'. $user_id.'_img.png';
        return $image_path;        
    }

    public static function saveAvatar($user_id, $detail, $picture_link) {
        $detail = json_encode($detail);
        $date = date('Y-m-d H:i:s');
        //$conn = DbConnection::openConnection();
        global $wpdb;
        $row = $wpdb->get_results("SELECT * FROM user_avatar WHERE user_id = {$user_id}");
        $image_path=self::createPngOnServer($picture_link,$user_id);
        if ($row) {
            $data = array(
                'detail' => $detail,
                'picture_link' => $image_path,
                'updated_ts' => $date
            );
            $wpdb->update('user_avatar', $data, array('user_id' => $user_id));
            echo json_encode(array('updated' => true,
                'picture_link' => $image_path
            ));
        } else {
            $data = array(
                'user_id' => $user_id,
                'detail' => $detail,
                'picture_link' => $image_path,
                'created_ts' => $date,
                'updated_ts' => $date
            );
            $wpdb->insert('user_avatar', $data);
            echo json_encode(array('insert' => true,
                'picture_link' => $image_path
            ));
        }
    }

    public static function loadAvatar($user_id) {
        //$conn = DbConnection::openConnection();        
        //$query="select * from `user_avatar` where `user_id`='".$user_id."'";

        global $wpdb;
        $row = $wpdb->get_results("SELECT * FROM user_avatar WHERE user_id = {$user_id}");


        /* $result=  mysqli_query($conn, $query);
          $row=null;
          if ($result){
          $row = $result->fetch_assoc();
          }

          mysqli_close($conn); */
        if ($row) {
            echo json_encode($row['0']->detail);
        } else {
            echo json_encode(array('noavatar' => true));
        }
    }

    public static function activateavatar($user_id, $detail, $picture_link, $activate) {
        $detail = json_encode($detail);
        $date = date('Y-m-d H:i:s');
        global $wpdb;
        
         $image_path=self::createPngOnServer($picture_link,$user_id);
        
        $row = $wpdb->get_results("SELECT * FROM user_avatar WHERE user_id = {$user_id}");
        if ($row) {
            $data = array(
                'activated' => $activate,
                'picture_link' => $image_path,
                'updated_ts' => $date
            );
            $wpdb->update('user_avatar', $data, array('user_id' => $user_id));
        } else {
            $data = array(
                'user_id' => $user_id,
                'detail' => $detail,
                'picture_link' => $image_path,
                'activated' => $activate,
                'created_ts' => $date,
                'updated_ts' => $date
            );
            $wpdb->insert('user_avatar', $data);
        }
        echo json_encode(array('finished' => true));
    }

    public static function getactivatedavatarurl($user_id) {
        global $wpdb;
        $activate = 'Y';
        $row = $wpdb->get_results("SELECT * FROM user_avatar WHERE activated='$activate' and user_id = {$user_id}");
        if ($row) {
            echo ($row['0']->picture_link);
        } else {
            echo "noavatar";
        }
    }

    public static function getActivatedAvatarlink($user_id) {
        global $wpdb;
        $activate = 'Y';
        $row = $wpdb->get_results("SELECT * FROM user_avatar WHERE activated={$activate} and user_id = {$user_id}");
        if ($row)
            return $row['0']->picture_link;
        return false;
    }

}

//////////////////////////////////////////////
class DbConnection {

    public static function openConnection() {
        $host = 'localhost';
        $dbname = 'avatar_game'; //theflubq_avata_game
        $username = 'root'; //theflubq_avauser
        $password = 'root'; //rehan123

        $conn = mysqli_connect($host, $username, $password, $dbname);
        if (mysqli_connect_errno()) {
            echo mysqli_connect_error();
            exit();
        }
        return $conn;
    }

}
