<?php
    class Helper{
        //function to redirect to certain page in certain time
        public function redirect($url,$time=0){
            if($url=='back' && isset($_SERVER['HTTP_REFERER'])){
                $url = $_SERVER['HTTP_REFERER'];
            }
            header("REFRESH:$time;url=$url");
            exit();
        }
        // function to get page name
        public function getPageName(){
            $curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1); 
            $curPageName = substr($curPageName,0,strpos($curPageName,".")); 
            return $curPageName;
        }
    }
    $helper = new Helper();
?>