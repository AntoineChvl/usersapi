<?php 
Require_once 'config.php';
Class BDD
{
	//PDO connection is reached from the singleton class

    private $bdoConnexion;
    private $request;

    public function __construct()
    {
        try {
            $this->bdoConnexion = singleton::getInstance();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

	//get all rows
	public Function index($table)
	{

            try {
                /*TODO : Find if there is an ID and do a prepared request according to the case */
                $this->request = $this->bdoConnexion->query("SELECT * FROM users");

                echo json_encode($this->request->fetchAll());

            }
            catch (PDOException $e) {
                echo $e->getMessage();
                exit;
            }
	}


    public Function show($table, $key)
    {

        try {
            /*TODO : Find if there is an ID and do a prepared request according to the case */
            $this->request = $this->bdoConnexion->prepare("SELECT * FROM users WHERE id = :id");
            $this->request->bindParam(':id', $key);
            $this->request->execute();

            echo json_encode($this->request->fetchAll());

        }
        catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }

	//update selected table 
	public Function putAction($table, $key, $set)
	{
		
		try {
			/*TODO : prepare the request for one row update */
			
			
		}
		catch (PDOException $e) {
    		echo $e->getMessage();
    	exit;
		}

	}

	//insert a row from selected table
	public Function postAction($table, $set)
	{
		
		try{
			/*TODO : prepare the request for one row insert */

            echo "APPEL DE POST";
			
		}
		catch (PDOException $e) {
    		echo $e->getMessage();
    	exit;
		}

	}

	//delete a row from selected table
	public Function deleteAction($table, $key)
	{
		try{
			/*TODO : prepare the request for one row delete */
			
		}
		catch (PDOException $e) {
    		echo $e->getMessage();
    	exit;
		}

	}


}
?>