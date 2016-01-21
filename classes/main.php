<?php
class main extends ACore {
    public function get_content() {
        
        $query = "SELECT * FROM `articles`";
        $result = mysql_query($query);
        
        if(!$result) {
            exit();
        }
        include 'templates/content.php';
    }
}