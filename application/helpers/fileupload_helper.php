<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');




if (!function_exists('uploadbookImage')) {

    function uploadbookImage($uploadreq, $uploadfolder = Cons::upload_folder_root, $fileType = 'img') {
        $uploadFileindex = $uploadreq['uploadfileIndex'];
        $prefix = "image_nutrition_";
        $CI = & get_instance();
        $CI->load->library('upload'); // load library 
        $res = array();
        $key = null;
        $key = ($key == null) ? rand(1, 10000) : $key . uniqid('_id_');

        if (isset($uploadreq) && $uploadreq != null) {
            if (!is_dir($uploadfolder)) {
                mkdir($uploadfolder, 0777, TRUE);
            }
            $fileConfig['upload_path'] = $uploadfolder;
            if ($fileType === 'img') {
                $fileConfig['max_size'] = (1024 * 4); // 4mb file size
                // image only
                $fileConfig['allowed_types'] = 'gif|jpg|png|jpeg';
            } else {
                $fileConfig['max_size'] = (1024 * 1); // 1mb file size
                // image only
                $fileConfig['allowed_types'] = 'pdf|doc|docx|txt';
            }
            $fileConfig['create_thumb'] = TRUE;
            $fileConfig['overwrite'] = TRUE;


            $uploadfilename = $_FILES[$uploadFileindex]['name'];

            $filename = preg_replace('/[^A-Za-z0-9. -]/', '', $uploadfilename);
            $filename = preg_replace('/\\s+/', '-', $filename);
            $filename = preg_replace('/\.[^.]+$/', '', $filename);

          

            $fileinfo = pathinfo($uploadfilename);

            if (isset($fileinfo['extension'])) {
                $ext = $fileinfo['extension'];
                $fileConfig['file_name'] =  $prefix .$filename .'_' . $key . '.' . $ext;
                $CI->upload->initialize($fileConfig);
                if (!$CI->upload->do_upload($uploadFileindex)) {
                    $error = $CI->upload->display_errors();

                    $res[Cons::errorindex_message] = 'This image not supported...'; //$error . " Supported file format (gif|jpg|png|jpeg) , Max image size, 4000X4000 and Max Size 3.5 MB";
                    $res[Cons::errorindex_code] = 100;
                } else {

                    $result['uploadedFileInfo'] = array('upload_data' => $CI->upload->data());

                    $filepath = $fileConfig['upload_path'] . '/' . $fileConfig['file_name'];
                    $res[Cons::res_value] = $filepath;
                    $res[Cons::errorindex_message] = 'Succcess';
                    $res[Cons::errorindex_code] = Cons::errorcode_success;
                }
            } else {
                $res[Cons::errorindex_code] = 11;
                $res[Cons::errorindex_message] = 'Invalid image';
            }
        } else {
            $res[Cons::errorindex_code] = 10;
            $res[Cons::errorindex_message] = 'File data is empty';
        }
        printv($res);

        return $res;
    }

}



if (!function_exists('base64fileupload')) {

    function base64fileupload($base64, $key, $uploadfolder = Cons::profileimage_upload_folder) {
        $res = array();
        if ($base64 != null && $key != null) {
            if (!is_dir($uploadfolder)) {
                mkdir($uploadfolder, 0777, TRUE);
            }

            $uploadfileCompltepath = $uploadfolder . DIRECTORY_SEPARATOR . $key . '.png';
            $ifp = fopen($uploadfileCompltepath, "wb"); // open file with wb mode
            fwrite($ifp, base64_decode($base64));
            fclose($ifp);
            $res[Cons::errorcodeIndex] = Cons::errorcodeSuccess;
            $res[Cons::errormessageIndex] = 'success';
            $res[Cons::resValue] = $uploadfileCompltepath;
        } else {
            $res[Cons::errorcodeIndex] = 10;
            $res[Cons::errormessageIndex] = 'File data is empty';
        }
        return $res;
    }

}
    