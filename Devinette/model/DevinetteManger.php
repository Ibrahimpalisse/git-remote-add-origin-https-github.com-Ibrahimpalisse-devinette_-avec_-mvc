<?php



class DevinetteManger
{

    private $bdd;
 
    public function __construct()
    {
        $this->bdd = new PDO("mysql:host=localhost;dbname=devinette", "root", "");
    }
    
    public function findAll()
    {
    
        $bdd =  $this->bdd;
        $query = "SELECT * FROM devinette";
        $bdd =
        $raq = $bdd->prepare($query);
        $raq->execute();
        
        $devinettes = [];
        
        while ($row = $raq->fetch(PDO::FETCH_ASSOC)) {

            $devinette = new Devinette();
            $devinette->setId( $row['id']);
            $devinette->setName($row['name']);
            $devinette->setQuestion($row['question']);
            $devinette->setAnswer($row['answer']);
            $devinette->setCreatedAt($row['created_at']);

        
            $devinettes[] = $devinette;
        }

        return $devinettes;
    }



    public function find($id)
    {
        $sql = "SELECT * FROM devinette WHERE id = :id";
        $raq = $this->bdd->prepare($sql);
        $raq->bindParam(':id', $id, PDO::PARAM_INT);
        $raq->execute();
        $row = $raq->fetch(PDO::FETCH_ASSOC);
    
     
        $devinette = new Devinette();
            $devinette->setId( $row['id']);
            $devinette->setName($row['name']);
            $devinette->setQuestion($row['question']);
            $devinette->setAnswer($row['answer']);
            $devinette->setCreatedAt($row['created_at']);

            return $devinette;
    }
}