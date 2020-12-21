<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Cons {
    // use this class for constants. like flags and useful in functions, it's more easy than applyiong directtly on funtions
        const EMAIL_ENABLE = TRUE;
        
        const STATUS_ACTIVE= 1;
        const STATUS_BLOCK = 2;
        
        const DATA_TYPE_PROJECT = 1;
        const DATA_TYPE_PRODUCT = 2;
        const DATA_TYPE_NEWS = 3;
        const DATA_TYPE_HOME_BANNER = 4;
         
        
        const APP_LANGUAGE_ENGLISH = 'Eng';
        const APP_LANGUAGE_MALAYALAM = 'Mal';
        const APP_LANGUAGE_ARABIC = 'Arb';
    
        const upload_folder_root = 'uploads';
        const upload_folder_post_image = 'uploads/posts';
    
        const appHead = "";
        const appName = '';
        const common_title = "";
        const session_key = 'USER_SESSION_KEY';
        const feedbackmessageKey = 'MESSAGE';
        const param_passing_through_session = 'PARAMS_IN_SESSION';    
        const currenPage_KEY = 'CURRENTPAGE';
        
    
    
        const errorcode_success = 0;
    
        const errorindex_code = 'errorcode';
        const errorindex_message = 'errormessage';
        const res_value = 'values';
        const res_value1 = 'values1';
        const res_value2 = 'values2';
        const res_value3 = 'values3';
        
        
        
        const errorMessage_db_same_value_not_update_error = "Values not changed/Data not updated to database";
        const errorMessage_db_general_error = "Operaion failed/Data not updated to database";
        const errorMessage_db_general_success = "Operation successful/Data  updated to database";
        const errormessage_nosession = 'No session found!';
        const errormessage_success = 'Action successfully completed';
        const errormessage_valuemissing = 'Some input value missing';
        const errormessage_validationfailed = 'Please fill all required data properly';
        const errormessage_data_notfound = 'Requested data not found, can not process this request';
        
        const errormessage_contctfeedback = 'Thank you for your message. We reply within 24 hours ';
    
       const seo_index = 'seo';
        
}
