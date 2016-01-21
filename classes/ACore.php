<?php
abstract class ACore {
    
    protected $db;
    
    public function __construct() {
        $this->db = mysql_connect(HOST, USER, PSWD);
        if(!$this->db) {
            exit("<h3 style='color: red; text-align: center; margin: 250 auto;'>Fucking_Невозможно установить соединение с БД.</h3><br />" . mysql_error());
        }
        if(!mysql_select_db(DB, $this->db)) {
            exit("<h3 style='color: red; text-align: center; margin: 250 auto;'>Paragwaj_Запрашиваемой БД не существует.<br />" . mysql_error());
        }
        mysql_query("SET NAMES utf8");
    }
    
    protected function get_header() {
        include 'templates/header.php';
    }
    
    protected function get_menu() {
        $row = $this->menu_array();
        include 'templates/menu.php';
    }
    
    protected function menu_array() {
        $query = "SELECT `title`, `title_url` FROM `menu`";
        $result = mysql_query($query);
        if(!$result) {
            exit(mysql_error());
        }
        $row = array();
        for($i = 0; $i < mysql_num_rows($result); $i++) {
            $row[] = mysql_fetch_array($result, MYSQL_ASSOC);
        }
        return $row;
    }

    abstract function get_content();
    
     protected function get_pagination() {
        include 'templates/pagination.php';
    }
    
    protected function get_right_sidebar() {
        
        $query = "SELECT * FROM `categories`";
        $result = mysql_query($query);
        
        if(!$result) {
            exit(mysql_error());
        }

        include 'templates/right_sidebar.php';
    }
    
    protected function get_footer() {
        include 'templates/footer.php';
    }

    
    public function get_body() {
        $this->get_header();
        $this->get_menu();
        $this->get_content();
        $this->get_pagination();
        $this->get_right_sidebar();
        $this->get_footer();
    }
}