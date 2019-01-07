<?php

require_once 'CrudUser.php';

class Users extends CrudUser {
    protected $table = 'tblUser';

    function howMany($typed){
        $sql="SELECT count(*) as total FROM $this->table WHERE tblUser_name LIKE '%".$typed."%' OR tblUser_email LIKE '%".$typed."%';";
        $stm = DB::prepare($sql);
        $stm->execute();
        return $stm->fetch();
    }

    function checkVersion($id){
        $sql="SELECT tblUser_version as version FROM $this->table WHERE tblUser_id='".$id."';";
        $stm = DB::prepare($sql);
        $stm->execute();
        return $stm->fetch();
    }

    public function findUnit($id) {
        $sql = "SELECT * FROM $this->table WHERE tblUser_id = :id";
        $stm = DB::prepare($sql);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        $stm->execute();
        return $stm->fetch();
    }

    public function findUnitJoin($id) {
        $sql = "SELECT tu.tblUser_id as idU, ".
        "tu.tblUser_name, ".
        "tu.tblUser_email, ".
        "tu.tblUser_fone, ".
        "tu.tblUser_password, ".
        "tu.tblUser_salary, ".
        "tu.tblUser_IdRole_tblRole, ".
        "tu.tblUser_picture, ".
        "tu.tblUser_idManager_tblUser, ".
        "tu.tblUser_notes, ".
        "tu.tblUser_sex, ".
        "tu.tblUser_day, ".
        "tu.tblUser_breed, ".
        "tu.tblUser_version, ".
        "tg.tblUser_id as idG, ".
        "tg.tblUser_name as ManagerName ".
        "FROM $this->table as tu ".
        "LEFT JOIN $this->table as tg ON ".
        "tu.tblUser_idManager_tblUser=tg.tblUser_id ".
        "WHERE tu.tblUser_id = :id";
        $stm = DB::prepare($sql);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        $stm->execute();
        return $stm->fetch();
    }

    public function findAll() {
        $sql = "SELECT * FROM $this->table";
        $stm = DB::prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    }

    public function findAllSelect($typed,$page,$order,$type) {
	    if(!isset($ordem))
			$ordem="tblUser_id";
		if(!isset($tipo))
		    $tipo="ASC";
        $sql = "SELECT * FROM $this->table WHERE tblUser_nome LIKE '%".$typed."%' OR tblUser_email LIKE '%".$typed."%' ORDER BY ".$order." ".$type." LIMIT ".$page.",10;";
        $stm = DB::prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    }

    public function findLast() {
        $sql = "SELECT tblUser_id FROM $this->table Order by tblUser_id DESC LIMIT 1";
        $stm = DB::prepare($sql);
        $stm->execute();
        return $stm->fetch();
    }

	public function findOne($name) {
        $sql = "SELECT * FROM $this->table WHERE tblUser_nome=$this->name";
        $stm = DB::prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    }

    public function insert() {
        $sql = "INSERT INTO $this->table (
          tblUser_name,
          tblUser_email,
          tblUser_fone,
          tblUser_password,
          tblUser_salary,
          tblUser_IdRole_tblRole,
          tblUser_picture,
          tblUser_idManager_tblUser,
          tblUser_notes,
          tblUser_sex,
          tblUser_day,
          tblUser_breed,
          tblUser_registerUser,
          tblUser_registerDate
        )
        VALUES (
          :bdpName,
          :bdpEmail,
          :bdpFone,
          :bdpPassword,
          :bdpSalary,
          :bdpRole,
          :bdpPicture,
          :bdpIdManager,
          :bdpNotes,
          :bdpSex,
          :bdpday,
          :bdpBreed,
          :bdpRegisterUser,
          :bdpRegisterDate)";
        $stm = DB::prepare($sql);
        $stm->bindParam(':bdpName', $this->name);
        $stm->bindParam(':bdpEmail', $this->email);
        $stm->bindParam(':bdpFone', $this->fone);
        $stm->bindParam(':bdpPassword', $this->password);
        $stm->bindParam(':bdpSalary', $this->salary);
        $stm->bindParam(':bdpRole', $this->role);
        $stm->bindParam(':bdpPicture', $this->picture);
        $stm->bindParam(':bdpIdManager', $this->idManager);
        $stm->bindParam(':bdpNotes', $this->notes);
        $stm->bindParam(':bdpSex', $this->sex);
        $stm->bindParam(':bdpday', $this->day);
        $stm->bindParam(':bdpBreed', $this->breed);
        $stm->bindParam(':bdpRegisterUser', $this->registerUser);
        $stm->bindParam(':bdpRegisterDate', $this->registerDate);
        if(!$stm->execute()){
            return false;
        }else{
            return true;
        }
    }

    public function update($id,$version) {
      $how=$this->verificaVersao($id);
      if($how->versao==$version){
        $version++;
        $sql = "UPDATE $this->table SET
        tblUser_name = :bdpName,
        tblUser_email = :bdpEmail,
        tblUser_fone = :bdpFone,
        tblUser_password = :bdpPassword,
        tblUser_salary = :bdpSalary,
        tblUser_IdRole_tblRole	 = :bdpRole,
        tblUser_picture = :bdpPicture,
        tblUser_idManager_tblUser = :bdpIdManager,
        tblUser_notes = :bdpNotes,
        tblUser_sex = :bdpSex,
        tblUser_day = :bdpday,
        tblUser_breed = :bdpBreed,
        tblUser_updateUser = :bdpUpdateUser,
        tblUser_version = :bdpVersion WHERE tblUser_id = :id";

        $stm = DB::prepare($sql);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        $stm->bindParam(':bdpName', $this->name);
        $stm->bindParam(':bdpEmail', $this->email);
        $stm->bindParam(':bdpFone', $this->fone);
        $stm->bindParam(':bdpPassword', $this->password);
        $stm->bindParam(':bdpSalary', $this->salary);
        $stm->bindParam(':bdpRole', $this->role);
        $stm->bindParam(':bdpPicture', $this->picture);
        $stm->bindParam(':bdpIdManager', $this->idManager);
        $stm->bindParam(':bdpNotes', $this->notes);
        $stm->bindParam(':bdpSex', $this->sex);
        $stm->bindParam(':bdpday', $this->day);
        $stm->bindParam(':bdpBreed', $this->breed);
        $stm->bindParam(':bdpUpdateUser', $this->updateUser);
        $stm->bindParam(':bdpVersion', $version);
        if(!$stm->execute()){
            return false;
        }else{
            return true;
        }
      }else{
        return 2;
      }
    }

    public function delete($id) {
        $sql = "DELETE FROM $this->table WHERE tblUser_id = :id";
        $stm = DB::prepare($sql);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        return $stm->execute();
    }

}
