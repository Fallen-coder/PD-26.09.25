<?php
class Book{
    public $title;
    public $author;
    public $status;

    public function __construct($title,$author,$status){
        $this->title=$title;
        $this->author=$author;
        $this->status=$status;
    }
    public function display($id =null){
        echo "ID: {$id} // Title: ". $this->title . " // Author: " . $this->author. " // status: " . $this->status. "\n\n";
    }
    public function setstatus($status){
        if( $status =="A"||$status =="a"){
            $books["status"]="available";
            echo "status changed";
        }elseif ($status =="N"||$status =="n") {
            $books["status"]="not available";
            echo "status changed";
        }else{
            echo "no such thing exist";
        }
    }
}
