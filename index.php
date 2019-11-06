<?php
include "BDD_base.php";

Class API
{

    private $table;
    private $key;
    private $method;
    private $request;
    private $table_array;
    private $bdd;



    //initialize the request
    function __construct()
    {
        $this->reqArgs();
    }

    // provides the response
    function reqArgs()
    {
        // get the HTTP method, path and body of the request

        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->request = $_SERVER['REQUEST_URI'];

        if ($this->request){

            // retrieve the table and key from the path
            $this->table_array = explode('/', $this->request);
            if(count($this->table_array) == 2) {
                $this->table = $this->table_array[0];
                $this->key = $this->table_array[1];
            } else {
                $this->table = $this->table_array[1];
                $this->key = $this->table_array[2];
            }


        }


        if($this->method){
            $this->bdd = new BDD();

            switch($this->method)
            {
                case 'GET':
                    if(count($this->table_array) == 2)
                    {
                        $this->bdd->index($this->table);
                    } else
                    {
                        $this->bdd->show($this->table, $this->key);
                    }
                    break;
                case 'POST':

                    break;






            }




        }
    }
}

new API();

?>