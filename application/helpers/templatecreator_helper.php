<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');



if (!function_exists('templategen')) {


    function templategen($params) {
        $template="";
        $template.= '<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F5F5" align="center">
  <tbody><tr>
    <td align="center" valign="top">
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F5F5" align="center">
  <tbody><tr>
    <td align="center" valign="top">

</td>
</tr></tbody></table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F5F5">
  <tbody><tr>
    <td align="center" valign="top" style="padding-top:40px;padding-left:20px;padding-right:20px;padding-bottom:20px"><table width="600" border="0" cellpadding="0" cellspacing="0" class="m_1715268996095180341m_-6796249331205974811mobemailfullwidth" align="center">
      <tbody><tr>
        <td align="left"><a href="'. base_url().'"><img src="'. base_url('webres/assets/images/logo.png').'" width="120" height="45" border="0" alt="PacesPrep" style="display:block;color:#111111;font-family:Arial,sans-serif;font-size:14px" class="CToWUd"></a></td>
      </tr>
    </tbody></table></td>
  </tr>
</tbody></table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F5F5">
  <tbody><tr>
    <td align="center" valign="top" style="padding-left:20px;padding-right:20px"><table width="600" border="0" cellpadding="0" cellspacing="0" class="m_1715268996095180341m_-6796249331205974811mobemailfullwidth" align="center">
      <tbody><tr>
        <td bgcolor="#ffffff" align="left" style="padding-left:40px;padding-top:50px;padding-bottom:15px;padding-right:40px;line-height:40px;font-size:34px"><font face="Boing-Bold, Arial Black, Arial, sans-serif" color="#2b2b2b" style="font-size:34px;line-height:40px">Thanks for your registration,';
        
        
        $template.=$params['student_fname'];
        
        $template.='</font></td>
      </tr>
    </tbody></table></td>
  </tr>
</tbody></table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F5F5">
  <tbody><tr>
    <td align="center" valign="top" style="padding-left:20px;padding-right:20px"><table width="600" border="0" cellpadding="0" cellspacing="0" class="m_1715268996095180341m_-6796249331205974811mobemailfullwidth" align="center" bgcolor="#ffffff">
      <tbody><tr>
        <td style="padding-top:0px;padding-bottom:40px;padding-left:40px;padding-right:40px"><table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
        <tbody><tr>
            <td valign="middle" align="left" style="padding-right:0px;padding-left:0px;padding-top:10px;padding-bottom:0px;line-height:22px;font-size:16px"><font style="font-size:16px;line-height:22px" face="Arial, sans-serif" color="#2b2b2b">Heres your confirmation for registration 000';
        
   $template.=$params['studentid'];
   
   $template.='</font></td>
          </tr>                    
        </tbody></table></td>
      </tr>
    </tbody></table></td>
  </tr>
</tbody></table>


<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F5F5">
  <tbody><tr>
    <td align="center" valign="top" style="padding-left:20px;padding-right:20px">
		<table width="600" border="0" cellpadding="0" cellspacing="0" class="m_1715268996095180341m_-6796249331205974811mobemailfullwidth" align="center" bgcolor="#ffffff">
      <tbody><tr>
        <td style="padding-top:0px;padding-bottom:20px;padding-left:20px;padding-right:20px">
				<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
        <tbody><tr>
            <td valign="middle" align="left" style="padding-right:20px;padding-left:20px;padding-top:20px;line-height:26px;font-size:21px"><font style="font-size:21px;line-height:26px" face="Boing-Bold, Arial Black, Arial, sans-serif" color="#00a63f">
           Regisiter Number:</font> <font style="font-size:21px;line-height:26px" face="Boing-Bold, Arial Black, Arial, sans-serif" color="#2b2b2b">000';
   
   $template.=$params['studentid'].'
      <font></td>
          </tr>                    
        </tbody></table></td>
      </tr>
    </tbody></table></td>
  </tr>
</tbody></table>


<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F5F5">
  <tbody><tr>
    <td align="center" valign="top" style="padding-left:20px;padding-right:20px"><table width="600" border="0" cellpadding="0" cellspacing="0" class="m_1715268996095180341m_-6796249331205974811mobemailfullwidth" align="center" bgcolor="#ffffff">    
      <tbody><tr>
        <td style="padding-bottom:20px;padding-left:10px;padding-right:10px"><table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
          <tbody><tr>
            
            <td valign="top" align="center" bgcolor="#ffffff" style="padding-right:0px;padding-left:0px;padding-top:20px;padding-bottom:20px"><font style="font-size:14px;line-height:21px" face="Arial, sans-serif" color="#2b2b2b">
            <table style="table-layout:fixed;width:580px;border-collapse:collapse" cellspacing="0" cellpadding="0" border="0">
  <tbody>


<tr style="width:100%">
    <td style="padding:6px 6px 6px 18px;border-collapse:collapse;border-left:1px solid #cccccc;border-bottom:1px solid #cccccc;width:30px;vertical-align:top">
      <div style="width:100%;height:100%;overflow:hidden;font-family:Arial,sans-serif;font-size:14px">
Course     </div>
      
      <table border="0" cellspacing="0" cellpadding="0">
        <tbody><tr>
          <td align="center" style="padding:5px 5px 5px 0px">
            <table border="0" cellspacing="0" cellpadding="0" bgcolor="#008a32">
              </table>
          </td>
        </tr>
      </tbody></table>
    </td>
    <td style="text-align: left; padding-top:6px;line-height: 150%;padding-left:20px;padding-top:6px;border-collapse:collapse;border-left:1px solid #cccccc;border-bottom:1px solid #cccccc;width:98px;vertical-align:top" align="center">
      <div style="width:100%;height:100%;overflow:hidden;font-family:Arial,sans-serif;font-size:14px">';
   
   $template.=$params['coursename'];
   $template.='              </div>
    </td>
    
    
  </tr>

  <tr style="width:100%">
    <td style="padding:6px 6px 6px 18px;border-collapse:collapse;border-left:1px solid #cccccc;border-bottom:1px solid #cccccc;width:30px;vertical-align:top">
      <div style="width:100%;height:100%;overflow:hidden;font-family:Arial,sans-serif;font-size:14px">
Event       </div>
      
      <table border="0" cellspacing="0" cellpadding="0">
        <tbody><tr>
          <td align="center" style="padding:5px 5px 5px 0px">
            <table border="0" cellspacing="0" cellpadding="0" bgcolor="#008a32">
              </table>
          </td>
        </tr>
      </tbody></table>
    </td>
    <td style="text-align: left; padding-top:6px;line-height: 150%;padding-left:20px;padding-top:6px;border-collapse:collapse;border-left:1px solid #cccccc;border-bottom:1px solid #cccccc;width:98px;vertical-align:top" align="center">
      <div style="width:100%;height:100%;overflow:hidden;font-family:Arial,sans-serif;font-size:14px">';
   
   $template.=$params['event_title'];
   
   $template.='</div>
    </td>
    
    
  </tr>

  <tr style="width:100%">
    <td style="padding:6px 6px 6px 18px;border-collapse:collapse;border-left:1px solid #cccccc;border-bottom:1px solid #cccccc;width:30px;vertical-align:top">
      <div style="width:100%;height:100%;overflow:hidden;font-family:Arial,sans-serif;font-size:14px">
Venue       </div>
      
      <table border="0" cellspacing="0" cellpadding="0">
        <tbody><tr>
          <td align="center" style="padding:5px 5px 5px 0px">
            <table border="0" cellspacing="0" cellpadding="0" bgcolor="#008a32">
              </table>
          </td>
        </tr>
      </tbody></table>
    </td>
    <td style="text-align: left; padding-top:6px;line-height: 150%;padding-left:20px;padding-top:6px;border-collapse:collapse;border-left:1px solid #cccccc;border-bottom:1px solid #cccccc;width:98px;vertical-align:top" align="center">
      <div style="width:100%;height:100%;overflow:hidden;font-family:Arial,sans-serif;font-size:14px"> <a target="_blank" href="https://www.google.com/maps/place/'.$params['venu'].' ">';
   
   $template.=$params['venu'];
   
   $template.='</a></div>
    </td>
    
    
  </tr>


  <tr style="width:100%">
    <td style="padding:6px 6px 6px 18px;border-collapse:collapse;border-left:1px solid #cccccc;border-bottom:1px solid #cccccc;width:30px;vertical-align:top">
      <div style="width:100%;height:100%;overflow:hidden;font-family:Arial,sans-serif;font-size:14px">
          Student Info: 
        </div>
      
      <table border="0" cellspacing="0" cellpadding="0">
        <tbody><tr>
          <td align="center" style="padding:5px 5px 5px 0px">
            
          </td>
        </tr>
      </tbody></table>
    </td>
    <td style="text-align: left; padding-top:6px;line-height: 150%;padding-left:20px;border-collapse:collapse;border-left:1px solid #cccccc;border-bottom:1px solid #cccccc;width:98px;vertical-align:top" align="center">
      <div style="width:100%;height:100%;overflow:hidden;font-family:Arial,sans-serif;font-size:14px">';
   
      $template.=$params['student_fname'].' '.$params['student_lname'].'<br>';

      $template.=$params['postalAddress'].'<br>';
      
      $template.=$params['nationality'].'<br>';
      
      $template.=$params['student_email'].'<br>';

      $template.=$params['student_contactno'].'<br>';
      
      
      $template.='</div>
    </td>
    
    
  </tr>
  <tr style="width:100%">
    <td style="padding:6px 6px 6px 18px;border-collapse:collapse;border-left:1px solid #cccccc;border-bottom:1px solid #cccccc;width:30px;vertical-align:top">
      <div style="width:100%;height:100%;overflow:hidden;font-family:Arial,sans-serif;font-size:14px">
Status       </div>
      
      <table border="0" cellspacing="0" cellpadding="0">
        <tbody><tr>
          <td align="center" style="padding:5px 5px 5px 0px">
            <table border="0" cellspacing="0" cellpadding="0" bgcolor="#008a32">
              </table>
          </td>
        </tr>
      </tbody></table>
    </td>
    <td style="text-align: left; padding-top:6px;line-height: 150%;padding-left:20px;padding-top:6px;border-collapse:collapse;border-left:1px solid #cccccc;border-bottom:1px solid #cccccc;width:98px;vertical-align:top" align="center">
      <div style="width:100%;height:100%;overflow:hidden;font-family:Arial,sans-serif;font-size:14px">
                <font style="color: green;font-weight: bold;">Confirmed</font>
              </div>
    </td>
    
    
  </tr>
  <tr style="width:100%">
    <td colspan=2 style="text-align: left; padding-top:60px;line-height: 150%;padding-left:20px;padding-right: 20px; height: 100px; background-color: #1abc9c; border-collapse:collapse;border-left:1px solid #cccccc;border-bottom:1px solid #cccccc;width:100px;vertical-align:top">
      <div style="width:100%;height:100%;overflow:hidden;font-family:Arial,sans-serif;font-size:14px;color: white;">
This email serves as your registration confirmation. Please show this ticket on the Event Registration desk.        </div>
      
    </td>
    
    
    
  </tr>
  

  
  
  
</tbody></table>"';


   
        
        //printv($key,$num_str);
        return $template;
    }

}


