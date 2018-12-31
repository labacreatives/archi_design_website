<?php
/**
 * Created by PhpStorm.
 * Project: ADONIAS
 * Date: 11/22/2018
 * Time: 11:34 AM
 */
require_once('..\..\config\init.php');

class ProjectController {
    private static $_instance,$current_Project;
    private $database;

    private function __construct() {
        $this->database = DatabaseController::getInstance();
    }

    static function getInstance(){
        if (!isset(self::$_instance)){
            self::$_instance = new ProjectController();
        }
        return self::$_instance;
    }


    static function  getCurrentProject(){
        return self::$current_Project;
    }

    static function removeCurrentProject(){
        self::$current_Project = NULL;
    }

    static function currentProjectExists(){
        return isset(self::$current_Project) && Session::exists('Project_id');
    }

    function addProject(Project $new_Project){
        return $this->database->insert('Projects',array('name','description','image_path','image_name','client','type','price'),
            array(
                $new_Project->getProjectName(),
                $new_Project->getDescription(),
                $new_Project->getImagePath(),
                $new_Project->getImageName(),
                $new_Project->getClient(),
                $new_Project->getType(),
                $new_Project->getPrice(),
            )
        );
    }


    function getProjectByName($name){
        $result = $this->database->select('Projects',array('*'),"WHERE name = '{$name}' AND enabled = true;");
        if(count($result)==1){
            $found_Project = $result[0];
            $Project = new Project();
            $Project->setId         ($found_Project['id'         ]);
            $Project->setProjectName($found_Project['name'       ]);
            $Project->setDescription($found_Project['description']);
            $Project->setImagePath  ($found_Project['image_path' ]);
            $Project->setType       ($found_Project['type'       ]);
            $Project->setClient     ($found_Project['client'     ]);
            $Project->setPrice      ($found_Project['price'      ]);
            $Project->setCreatedAt  ($found_Project['created_at' ]);
            $Project->setUpdatedAt  ($found_Project['updated_at' ]);
            return $Project;
        }
        return false;
    }

    function getProject($id){
        $result = $this->database->select('Projects',array('*'),"WHERE id = '{$id}';");
        if(count($result)==1){
            return $result[0];
        }
        return false;
    }

    function getProjects(){
        $projects = $this->database->select('projects',array('*'),"WHERE enabled = true");
        return count($projects) > 0 ? $projects : false;
    }

    function updateProject(Project $Project){

        $id            = $Project->getId();
        $name          = $Project->getProjectName();
        $description   = $Project->getDescription();
        $image_path    = $Project->getImagePath();
        $type          = $Project->getImagePath();
        $client        = $Project->getClient();
        $price         = $Project->getPrice();


        return $this->database->update('Projects',array('description','image_path','type','client','price'),
            array($description,$image_path,$type,$client,$price),"WHERE id = '{$id}'");
    }

    private function ProjectExists($column,$value){
        $result = $this->database->select('Projects',array($column),"WHERE {$column}='{$value}';");
        if($result && count($result)== 1){
            return true;
        }
        return false;
    }

}
