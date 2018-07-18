<?php

    //APP class is the main class which breaks the URL
    class App{
        
        //Atributes
        protected $controller = 'home';
        protected $method     = 'index';
        protected $params     = [];


        //Constructor
        public function __construct()
        {
            //receive and parse url
            $url = $this->parseUrl();
            
            //CONTROLER
            //verify if the controller exists
            if (file_exists("../app/controllers/".$url[0].".php")){

                $this->controller = $url[0];
                unset($url[0]);
                
            }//end verification if the controller exists
            
            require_once "../app/controllers/".$this->controller.".php";
            
            $this->controller = new $this->controller;
            
            
            //METHOD
            //verify if the method was passed and exist
            if (isset($url[1])){
                
                //verify if the method exist
                if (method_exists($this->controller, $url[1])){
                   
                    $this->method = $url[1];
                    unset($url[1]);
                    
                }//end verification if method exist
                
            }//End verification of method 
            
            //PARAMS
            //verif if params exists
            $this->params = $url ? array_values($url) : [];
            
            //call method
            call_user_func_array([$this->controller, $this->method], $this->params);
            
        }//End constructios
        
        //Methods
        public function parseUrl(){
            
            //verify is there is params on url
            if (isset($_GET['url'])){
                
                return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
                
            }//End verification if exists GET URL
            
        }//End function parseUrl
        
    }//End class App
