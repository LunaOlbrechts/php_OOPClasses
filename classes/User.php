<?php

class User{
    private $firstName;
    private $lastName;
    private $email;


   
    

    /**
     * Get the value of firstName
     */ 
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */ 
    public function setFirstName($firstName)
    {
        if(empty($firstName)){
            throw new Exception("First name cannot be empty");
        }
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get the value of lastName
     */ 
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */ 
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function save(){

        try {
            $conn = new PDO('mysql:host=localhost;dbname=oopdemo', "root", "");
            $statement = $conn->prepare(`INSERT INTO users (firstName, lastName, email) VALUES (:firstName, :lastName, :email)`);
            //$conn = NULL;
            $firstName = $this->getFirstName();
            $lastName = $this->getLastName();
            $email = $this->getEmail();
        
            $statement->bindValue(":firstName", $firstName);
            $statement->bindValue(":lastName", $lastName);
            $statement->bindValue(":email", $email);

            $result = $statement->execute();

            var_dump($result);
            var_dump($statement);
            var_dump($firstName);
            var_dump($lastName);
            var_dump($email);

            //return result
            return $result;
                
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
       

/*

        //connection
        $conn = new PDO('mysql:host=localhost;dbname=oopdemo', "root", "");
        //insert query
        $statement = $conn->prepare(`INSERT INTO users (firstName, lastName, email) VALUES (:firstName, :lastName, :email)`);
        
        $firstName = $this->getFirstName();
        $lastName = $this->getLastName();
        $email = $this->getEmail();
       
        $statement->bindValue(":firstName", $firstName);
        $statement->bindValue(":lastName", $lastName);
        $statement->bindValue(":email", $email);

        $result = $statement->execute();

        var_dump($result);

        //return result
        return $result;*/
        
    }
}

