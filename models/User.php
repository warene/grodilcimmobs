<?php
require('Database.php');
class User
{ 
	private $nom;
	private $email;
	private $phone;
	private $password;
	private $profil;
	private $status;

     
     public function __construct($nom=null,$email=null,$phone=null,$password=null,$profil=null,$status=null){
     	$this->nom = $nom;
     	$this->email = $email;
     	$this->phone = $phone;
     	$this->password = $password;
     	$this->profil = $profil;
     	$this->status = $status;
     	$this->bd = Database::getConnexion();
     }

	public function create()
	{
		$ins = $this->bd->prepare("INSERT INTO users(nom,email,numero,password,profil,status)VALUES(?,?,?,?,?,?)");
		$ins->execute(array($this->nom,$this->email,$this->phone,$this->password,$this->profil,$this->status));

	}

	public function commande($email, $module, $prix, $filiere, $niveau, $etablissement, $localisation, $salle, $date_soutenance)
	{
		$ins = $this->bd->prepare("INSERT INTO commandes(email,module,prix,filiere,niveau,etablissement,localisation,salle,date_soutenance,date_commande)VALUES(?,?,?,?,?,?,?,?,?,NOW())");
		$ins->execute(array($email, $module, $prix, $filiere, $niveau, $etablissement, $localisation, $salle, $date_soutenance));

	}

	public function addimmeuble($nom,$localisation,$description,$email)
	{
		$ins = $this->bd->prepare("INSERT INTO immeubles(nom,localisation,description,user)VALUES(?,?,?,?)");
		$ins->execute(array($nom,$localisation,$description,$email));

	}

	public function addUser($nom,$email,$pass,$status,$immeuble)
	{
		$ins = $this->bd->prepare("INSERT INTO users(nom,email,password,status,immeuble)VALUES(?,?,?,?,?)");
		$ins->execute(array($nom,$email,$pass,$status,$immeuble));

	}

	public function addAppartement($numero,$niveau,$status,$description,$id_immeuble,$email)
	{
		$ins = $this->bd->prepare("INSERT INTO appartements(numero,niveau,status,description,id_immeuble,user)VALUES(?,?,?,?,?,?)");
		$ins->execute(array($numero,$niveau,$status,$description,$id_immeuble,$email));

	}

	public function addLocataire($noml,$email,$cni,$id_immeuble,$id_appartement)
	{
		$ins = $this->bd->prepare("INSERT INTO locataires(nom,email,cni,id_immeuble,id_appartement)VALUES(?,?,?,?,?)");
		$ins->execute(array($noml,$email,$cni,$id_immeuble,$id_appartement));

	}

	public function addDocument($docs_dest2,$nom,$locataire,$immeuble)
	{
		$ins = $this->bd->prepare("INSERT INTO documents(document,nom,locataire,immeuble)VALUES(?,?,?,?)");
		$ins->execute(array($docs_dest2,$nom,$locataire,$immeuble));

	}

	public function show()
	{
		$req = $this->bd->query("SELECT * FROM users ORDER BY id ASC");
		$result = $req->fetchAll();

		return $result;
	}

	public function showById($id)
	{
		$req = $this->bd->query("SELECT * FROM users WHERE id = '$id'");
		$result = $req->fetch();

		return $result;
	}

	public function infos($email)
	{
		$req = $this->bd->query("SELECT * FROM users WHERE email = '$email'");
		$result = $req->fetch();

		return $result;
	}

	public function verifEmail($email)
	{
		$req = $this->bd->prepare("SELECT * FROM users WHERE email = ?");
		$req->execute(array($email));
		$count = $req->rowCount();

		return $count;
	}

	public function modif($id)
	{
		$req = $this->bd->prepare("UPDATE users SET identifiant = ? WHERE id=?");
		$result = $req->execute(array($this->identifiant,$id));

		$req = $this->bd->prepare("UPDATE users SET statut = ? WHERE id=?");
		$result = $req->execute(array($this->statut,$id));

		$req = $this->bd->prepare("UPDATE users SET pass = ? WHERE id=?");
		$result = $req->execute(array($this->pass,$id));

	}

	public function access($id,$access)
	{
		$req = $this->bd->prepare("UPDATE users SET access = ? WHERE id=?");
		$result = $req->execute(array($access,$id));

	}

	public function updateAppartement($status,$id_appartement)
	{
		$req = $this->bd->prepare("UPDATE appartements SET status = ? WHERE id=?");
		$result = $req->execute(array($status,$id_appartement));

	}

	public function deletes($id)
	{
		$req = $this->bd->prepare("DELETE FROM users WHERE id=?");
		$req->execute(array($id));
	}

	public function delLocataire($id)
	{
		$req = $this->bd->prepare("DELETE FROM locataires WHERE id=?");
		$req->execute(array($id));
	}

	public function connect($user,$pass)
	{
		$req = $this->bd->query("SELECT * FROM users WHERE email = '$user' AND password = '$pass'");
		$result = $req->rowCount();

		return $result;
	}

	public function showServices()
	{
		$req = $this->bd->query("SELECT * FROM services");
		$result = $req->fetchAll();

		return $result;
	}

	public function showImmeubles()
	{
		$req = $this->bd->query("SELECT * FROM immeubles");
		$result = $req->fetchAll();

		return $result;
	}

	public function showImmeublesById($id)
	{
		$req = $this->bd->query("SELECT * FROM immeubles WHERE id='$id'");
		$result = $req->fetchAll();

		return $result;
	}

	public function showLocataires()
	{
		$req = $this->bd->query("SELECT * FROM locataires");
		$result = $req->fetchAll();

		return $result;
	}

	public function showLocatairesById($id)
	{
		$req = $this->bd->query("SELECT * FROM locataires WHERE id_immeuble = '$id'");
		$result = $req->fetchAll();

		return $result;
	}

	public function showAppartement($id)
	{
		$req = $this->bd->query("SELECT * FROM appartements WHERE id_immeuble = '$id'");
		$result = $req->fetchAll();

		return $result;
	}

	public function showDocument()
	{
		$req = $this->bd->query("SELECT * FROM documents");
		$result = $req->fetchAll();

		return $result;
	}

	public function showUsers()
	{
		$status = 'locataire';
		$req = $this->bd->query("SELECT * FROM users WHERE status != '$status'");
		$result = $req->fetchAll();

		return $result;
	}

	public function showDocument2($id)
	{
		$req = $this->bd->query("SELECT * FROM documents WHERE locataire='$id'");
		$result = $req->fetchAll();

		return $result;
	}

	public function showDocument3($id)
	{
		$req = $this->bd->query("SELECT * FROM documents WHERE immeuble='$id'");
		$result = $req->fetchAll();

		return $result;
	}

	public function totalLocataire()
	{
		$req = $this->bd->query("SELECT * FROM locataires");
		// $result = $req->fetchAll();
		$count = $req->rowCount();

		return $count;
	}

	public function totalImmeuble()
	{
		$req = $this->bd->query("SELECT * FROM immeubles");
		// $result = $req->fetchAll();
		$count = $req->rowCount();

		return $count;
	}

	public function totalDocument()
	{
		$req = $this->bd->query("SELECT * FROM documents");
		// $result = $req->fetchAll();
		$count = $req->rowCount();

		return $count;
	}

	public function getLocataire($idapart)
	{
		$req = $this->bd->query("SELECT nom as nomlocataire FROM locataires WHERE id = '$idapart'");
		$result = $req->fetch();

		return $result;
	}

	public function getLocataire2($email)
	{
		$req = $this->bd->query("SELECT id as idl FROM locataires WHERE email = '$email'");
		$result = $req->fetch();

		return $result;
	}

	public function getIdAppart($id)
	{
		$req = $this->bd->query("SELECT * FROM locataires WHERE id = '$id'");
		$result = $req->fetch();

		return $result;
	}

	public function getAppartement($id)
	{
		$req = $this->bd->query("SELECT *  FROM appartements WHERE id = '$id'");
		$result = $req->fetch();

		return $result;
	}


}
?>
