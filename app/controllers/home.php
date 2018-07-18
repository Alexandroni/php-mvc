<?php

    //All controllers extends the main class Controller
    class Home extends Controller{
        
        public function index($data = ""){
            
            //calls model teste
            $modelObj = $this->model("ModelTest");
            //set an atribute
            $modelObj->atributeTest = $data;
            //calls an method from model
            $test = $modelObj->teste($data);
            
            //call a view
            $this->render("home/index", $modelObj);
            
        }//End function index
        
        public function secondFunction($data = ""){
            
            //sdo ..
            
        }//End function secondFunction
        
    }//End class Home
