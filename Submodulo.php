<?php


include_once('ConexaoBD.php');
class Submodulo {
    private $idsubmodulo;
    private $nome; 
    private $modulo; 
    private $idmodulo;
    
    function getIdmodulo() {
        return $this->idmodulo;
    }

    function setIdmodulo($idmodulo) {
        $this->idmodulo = $idmodulo;
    }

        
    function getIdsubmodulo() {
        return $this->idsubmodulo;
    }

    function getNome() {
        return $this->nome;
    }

    function getModulo() {
        return $this->modulo;
    }

    function setIdsubmodulo($idsubmodulo) {
        $this->idsubmodulo = $idsubmodulo;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setModulo($modulo) {
        $this->modulo = $modulo;
    }

    function __construct($idsubmodulo = null, $nome = null, $modulo = null, $idmodulo = null) {
        $this->idsubmodulo = $idsubmodulo;
        $this->nome = $nome;
        $this->modulo = $modulo;
        $this->idmodulo = $idmodulo;
    }

    public function lista(){
        try {
            $sql  = "SELECT b.idsubmodulo,b.nosubmodulo, nomodulo  FROM tbsubmodulo AS b
INNER JOIN tbmodulo AS i
ON b.idmodulo = i.idmodulo ORDER BY nosubmodulo";
            $conn = ConexaoBD::conecta();
            $sql  = $conn->query($sql);
            $res = array();  
            while($row = $sql->fetch(PDO::FETCH_OBJ)) {
                $submodulo = new Submodulo();              
                $submodulo->setIdsubmodulo($row->idsubmodulo); 
                $submodulo->setNome($row->nosubmodulo); 
                $submodulo->setModulo($row->nomodulo);
                $res[] = $submodulo;
            }
            return $res;
        } catch (Exception $e) {
             echo "ERRO: ".$e->getMessage()."<br><br>";
        }     
    }
    
    public function consulta($idsubmodulo){
        try {
            $sql  = "SELECT idsubmodulo, nosubmodulo FROM tbsubmodulo WHERE idsubmodulo = ".$idsubmodulo." ORDER BY Nosubmodulo";
            $conn = ConexaoBD::conecta();
            $sql  = $conn->query($sql);

            $res = array();  
            while($row = $sql->fetch(PDO::FETCH_OBJ)) {
                $submodulo = new submodulo();                
                $submodulo->setIdsubmodulo($row->idsubmodulo);
                $submodulo->setNome($row->nosubmodulo);
                
                $res[] = $submodulo;
            }
            return $res;
        } catch (Exception $e) {
             return "ERRO: ".$e->getMessage()."<br><br>";
        }     
    }
    
    public function altera($nome,$modulo, $codigo){
        try {
            $sql = "UPDATE Tbsubmodulo
                       SET nosubmodulo = ?,
                       idmodulo =?
                       
                     WHERE idsubmodulo = ?"; 
            $conn = ConexaoBD::conecta();

            $stm = $conn->prepare($sql);
            $stm->bindParam(1, $nome);
            $stm->bindParam(2, $modulo);
            $stm->bindParam(3, $codigo);
            $stm->execute();
            return 1; 
	} catch (Exception $e) {
            return 0; 
        } //try-catch     
    } //método altera
    
    public function insere($nosubmodulo, $idmodulo){
      try {
        $sql = "INSERT INTO Tbsubmodulo(nosubmodulo, idmodulo)
                VALUES (?, ?)";
        $conn = ConexaoBD::conecta();

        $stm  = $conn->prepare($sql);              
        $stm->bindParam(1, $nosubmodulo);
        $stm->bindParam(2, $idmodulo); 
  
	$stm->execute();
        return 1;
      } catch (Exception $e) {
        return 0; 
      }     
    } //método insere
    
    public function exclui($codigo){
      try {
	      $sql = "DELETE FROM Tbsubmodulo WHERE Idsubmodulo = ?"; 
	      $conn = ConexaoBD::conecta();
                                       
	      $stm = $conn->prepare($sql);
	      $stm->bindParam(1, $codigo);
	      $stm->execute();
              return 1; 
	    } catch (Exception $e) {
              return 0; 
      } //try-catch     
    } //método exclui

    
}
