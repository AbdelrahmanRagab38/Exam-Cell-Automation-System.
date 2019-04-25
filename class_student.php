<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of class_student
 *
 * @author Wael
 */
include_once 'Class_user.php';
include_once 'DbConnection.php';
include_once 'class_course.php';
include_once 'class_registered_course_report.php';
include_once 'Email_Config.php';

class class_student extends Class_user {
    private $student_code;
    public  function __construct($user_id) {
        if($user_id!=""){
                    parent::__construct($user_id);
                    $Db_object=new DbConnection();
                    $select_user_SQL="SELECT * FROM `students`  where users_id=$user_id";
                    $data=$Db_object->get_row($select_user_SQL);
                    $this->student_code=$data['St_code'];
        
        }
        }
        
  public function register_course($course,$year,$term){
      $Db_object=new DbConnection();
      $count=0;
      for($row=0;$row<count($course);$row++){
      $table="student_course_registration";
      $data=array("st_code"=>$this->student_code, "course_id"=>$course[$row]->get_id(), "year"=>$year,"term"=>$term);
      $insert_value= $Db_object->insert($table, $data);
       if($insert_value){
          $count++;
      }
      }
    if($count==count($course)){
        return TRUE;
    }
  }
  public function get_registered_courses(){
            $Db_object=new DbConnection();
            $get_register="SELECT * FROM `student_course_registration` where st_code=$this->student_code";
            $result=$Db_object->database_query($get_register);
            $data=$Db_object->database_all_array($result);
            $courses=array();
            for($row=0;$row<count($data);$row++){
                $register=$data[$row];
                //echo $register[1];
                $courses[]=new class_course($register[1]);
            }
            return  $courses;
  }
  
      public function get_registered_courses_report(){
                   $courses=  $this->get_registered_courses();
                   $data_array=array();
                   for($row=0;$row<count($courses);$row++){
                       $course_details=array();
                        $course=$courses[$row];
                     // $course_details[]=$course->arabic_name;
                       $course_details[]=$course->english_name;
                       $course_details[]=$course->englis_code;
                       $course_details[]=$course->num_credit_hours;
                       $data_array[]=$course_details;
                   }
                    $pdf=new class_registered_course_report();
                    
                    $pdf->AddPage();
                    $pdf->EventTable($data_array);                    
                    //$pdf->SetFont("Arial", "B", "20");
                    $pdf->Ln(5);
                    $pdf->SetFont("Arial", "I", "15");
                    $pdf->cell(91,10,"signature :.............",0,1);
                    $pdf->Output();
} 
public function recieve_confirmation_email_for_register_subjects(){
                        $email_body="Welcome :".$this->first_name."<br>";
                        $email_body.="<table><tr><td>Course Arabic Name</td><td>Course English Name</td><td>Credit Hours</td></tr>'";
                        $courses=  $this->get_registered_courses();
                        for($row=0;$row<count($courses);$row++){
                            $course=$courses[$row];
                        $email_body .='<tr><td>'.$course->arabic_name.'</td><td>'.$course->english_name.'</td><td>'.$course->num_credit_hours.'</td></tr>';
                       
                   }
                        $email_body.="</table>";
                        $email_body.="<br><center><font color='blue'><font face='Times New Roman' size='2'><i>© All Copyrights Reserved For <a href='l' title='http://localhost/PhpProject1/login_App_1/login.php'>FCI</i></font></a></font></center>";
                        $subject="Course Registration";
                        SendEmail($this->email, $subject, $email_body);
}
}

