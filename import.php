<?php
include_once 'db.php';
class importFile{
    private $handle;
    public function openFile($file_name = 'test.txt'){
        $this->handle = fopen($file_name, 'rt');
    }
    public function closeFile(){
        fclose($this->handle);
    }
    public function readLine() {
        if ($this->handle) {
            $return = array();
            if (($buffer = fgets($this->handle)) !== false) {
                $return = $this->lineProcessing($buffer);
            }
            return $return;
        }
    }
    public function readLines($count) {
        $return = array();
        for ($index = 0; $index < $count; $index++) {
            $return[] = $this->readLine();
        }
        return $return;
    }    
    public function readFile() {
        if ($this->handle) {
            $return = array();
            while (($buffer = fgets($this->handle)) !== false) {
                $return[] = $this->lineProcessing($buffer);
            }
            return $return;
        }
    }
    private function lineProcessing($line, $terminated = "\t") {
        $line = explode($terminated,$line);
        return $line;
    }
}

$arrayNames =  array(
                'alternateNameId', 
                'geonameid', 
                'isolanguage', 
                'alternate_name', 
                'isPreferredName', 
                'isShortName', 
                'isColloquial', 
                'isHistoric'
            );

$db = new db();

$importData[] = array(
    'alternateNameId' => '21', 
    'geonameid' => '2', 
    'isolanguage' => '3', 
    'alternate_name' => '4', 
    'isPreferredName' => '5',
    'isShortName' => '6', 
    'isColloquial' => '7',
    'isHistoric' => '8'
);

$importData[] = array(
    'alternateNameId' => '721', 
    'geonameid' => '2', 
    'isolanguage' => '3', 
    'alternate_name' => '4', 
    'isPreferredName' => '5',
    'isShortName' => '6', 
    'isColloquial' => '7',
    'isHistoric' => '8'
);

$db->insert($importData,$arrayNames, 'alternate_names');