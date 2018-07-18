<?php

    //This class is the base class for all controllers
    Class Controller{
        
        //Methods
        //MODELS
        //Calls models
        public function model($model){
            
            //require de model
            require_once "../app/models/".$model.".php";
            
            //return model object
            return new $model();
        }//End function model
        
        
        //VIEWS
        //Calls views
        public function render($view, $data = ""){
            
            //the data passed through $data can be accessed inside the view

            require_once "../app/views/".$view.".php";
            
        }//End function render
        
        
    }//End class Controller
