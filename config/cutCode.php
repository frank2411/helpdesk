  private function getDefaultDbConnection(){
    $host = $this->getHost();
    $user = $this->getUser();
    $pass = $this->getPass();
    $dbName = $this->getDb();
    return @mysqli_connect($host,$user,$pass,$dbName);
  }

  private $host="localhost";
  private $user="francesco";
  private $pass="admin";
  private $dbName="help_desk_db";


  //set db variable for custom db connection
  public function setDb($value){
    $this->dbName = $value;
    return $this;
  }
  //get db variable
  public function getDb(){
    return $this->dbName;
  } 
  //set user variable for custom db connection
  public function setUser($value){
    $this->user = $value;
    return $this;
  }
  //get user variable
  public function getUser(){
    return $this->user;
  }
  //set db pass
  public function setPass($value){
    $this->pass = $value;
    return $this;
  }
  //get db pass
  public function getPass(){
    return $this->pass;
  }
  //set db host
  public function setHost($value){
    $this->host = $value;
    return $this;
  }
  //get db host
  public function getHost(){
    return $this->host;
  }
  //end of variables for db connections

