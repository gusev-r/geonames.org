<?php

class db {

    function __construct() {
        
    }

    public function insert($importData, $arrayNames,$tableName) {

        $servername = "localhost";
        $username = "root";
        $password = "123123";
        $dbname = "test";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $implodeName = $this->implodeName($arrayNames,array('before'=>':', 'after'=>', '));
            $stmt = $conn->prepare("INSERT INTO $tableName(".implode(',', $arrayNames).") VALUES(".$implodeName.")");

            foreach ($arrayNames as $key => $value) {
                $stmt->bindParam(':'.$value, $$value);
            }
            foreach ($importData as $row) {
                extract($row);
                $stmt->execute();
            }
            echo "New records created successfully";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }
    
    private function implodeName($arrayNames, $glue = array('before' => '', 'after' => '',)) {
        $stringName = '';
        $before = $glue['before'];
        $after = $glue['after'];

        $array = $arrayNames;
        $arrayLength = count($array);
        $counter = 0;
        foreach($array as $k => $value){
            $counter++;
            if($counter == $arrayLength){
                $stringName.=  $before . $value;
            }else{
                $stringName.=  $before . $value . $after;
            }
        }
        return $stringName;
    }
}
