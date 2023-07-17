<?
class Db
{
    private $con;
    private static $dbcon;
    /*************************************************************************** */
    public static function getInstance($options = null)
    {
        if (self::$dbcon == null) {
            self::$dbcon = new Db($options);
            // echo "New Instance<br>";
        }
        return self::$dbcon;
    }
    /*************************************************************************** */
    private function __construct($options)
    {
        if ($options) {
            $servername = $options['host'];
            $username = $options['user'];
            $password = $options['pass'];
            $dbname = $options['db'];
        } else {
            global $config;
            $servername = $config['db']['host'];
            $username = $config['db']['user'];
            $password = $config['db']['pass'];
            $dbname = $config['db']['dbname'];
        }
        $this->con = new mysqli($servername, $username, $password, $dbname);
        if ($this->con->connect_error) {
            echo "Connection failed: " . $this->con->connect_error;
            exit;
        }
        $this->con->query("SET NAMES 'utf8'");
    }
    /*************************************************************************** */
    public function connection($sql)
    {
        return  $this->con;
    }
    /*************************************************************************** */
    public function first($sql)
    {
        $result = $this->doquery($sql);
        if ($result == null) {
            return null;
        }
        return $result[0];
    }
    /*************************************************************************** */
    public function doquery($sql)
    {
        $result = $this->con->query($sql);
        $records = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $records[] = $row;
            }
        } else {

            return null;
        }
        return $records;
    }
    /*************************************************************************** */
    public function insert($sql)
    {
        $rowupdate = $this->con->query($sql);
        return $rowupdate;
    }
    /*************************************************************************** */
    public function update($sql)
    {
        $id = $this->con->query($sql);
        return $id;
    }
    /*************************************************************************** */
    public function close()
    {
        $this->con->close();
    }
}
