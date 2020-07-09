<?php
class PersonData {
	public static $tablename = "person";
	public function PersonData(){
		$this->title = "";
		$this->email = "";
		$this->image = "";
		$this->password = "";
		$this->is_public = "0";
		$this->created_at = "NOW()";
	}



	public function add(){
		$sql = "insert into ".self::$tablename." (code,image,password,name,lastname,address,phone,email,kind,created_at) ";
		$sql .= "value (\"$this->code\",\"$this->image\",\"$this->password\",\"$this->name\",\"$this->lastname\",\"$this->address\",\"$this->phone\",\"$this->email\",$this->kind,$this->created_at)";
		return Executor::doit($sql);
	}

	public function add_alumn(){
		$sql = "insert into ".self::$tablename." (code,image,password,name,lastname,address,phone,email,kind,parent_id,created_at) ";
		$sql .= "value (\"$this->code\",\"$this->image\",\"$this->password\",\"$this->name\",\"$this->lastname\",\"$this->address\",\"$this->phone\",\"$this->email\",3,$this->parent_id, $this->created_at)";
		return Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto PersonData previamente utilizamos el contexto
	public function update_active(){
		$sql = "update ".self::$tablename." set last_active_at=NOW() where id=$this->id";
		Executor::doit($sql);
	}

	public function update_passwd(){
		$sql = "update ".self::$tablename." set password=\"$this->password\" where id=$this->id";
		Executor::doit($sql);
	}


	public function update(){
		$sql = "update ".self::$tablename." set name=\"$this->name\",lastname=\"$this->lastname\",address=\"$this->address\",phone=\"$this->phone\",email=\"$this->email\" where id=$this->id";
		Executor::doit($sql);
	}

	public function update_alumn(){
		$sql = "update ".self::$tablename." set name=\"$this->name\",lastname=\"$this->lastname\",address=\"$this->address\",phone=\"$this->phone\",email=\"$this->email\",parent_id=$this->parent_id where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new PersonData());
	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PersonData());
	}

	public static function getAllByPersonId($id){
		$sql = "select * from ".self::$tablename." where parent_id=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PersonData());
	}

	public static function getAlumns(){
		$sql = "select * from ".self::$tablename." where kind=3 order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PersonData());
	}

	public static function getParents(){
		$sql = "select * from ".self::$tablename." where kind=2 order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PersonData());
	}
	public static function getTeachers(){
		$sql = "select * from ".self::$tablename." where kind=1 order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PersonData());
	}

	public static function getAllUnActive(){
		$sql = "select * from client where last_active_at<=date_sub(NOW(),interval 3 second)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PersonData());
	}


	public function getUnreads(){ return MessageData::getUnreadsByClientId($this->id); }


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where title like '%$q%' or email like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PersonData());
	}


}

?>