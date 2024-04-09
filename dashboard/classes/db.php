<?PHP
require_once 'config.php';
class DB
{
    public $conn;
    private function __construct()
    {
        try{
            $m_DB_Name = $GLOBALS['config']['DB'];
            $m_DB_Server_Name = $GLOBALS['config']['DB_Host'];
            $m_DB_User = $GLOBALS['config']['DB_User'];
            $m_DB_Password = $GLOBALS['config']['DB_Pass'];
            $m_DB_Port = $GLOBALS['config']['DB_Port'];

            $this->conn = mysqli_connect ($m_DB_Server_Name, $m_DB_User,$m_DB_Password);
            mysqli_set_charset($this->conn,'latin1');
            if ($this->conn)
            {
                if (!mysqli_select_db ($this->conn,$m_DB_Name))
                {
                    throw new Exception("Cannot find: ". $m_DB_Name );
                }
            }
            else
            {
                throw new Exception("Can't connect.");
            }
        }catch (Exception $e){
            echo "Exception : " . $e->getMessage() . "<\ br>";
            echo "Code: " . $e->getCode() . "<\ br>";
        }
        
    }

    public static function DB_Conn ()
    {
        static $temp_DB = null;
        if (!isset($temp_DB))
        {
            $temp_DB = new DB();
        }
        return $temp_DB->conn;
    }
    public static function DB_Read ($db_Query, $conn)
    {
        $db_Cursor = mysqli_query( $conn,$db_Query);
        return $db_Cursor;
    }
    public static function DB_Fetch ($db_Cursor)
    {
        return mysqli_fetch_assoc($db_Cursor);
    }

    public static function DB_Query($db_Query, $conn)
    {
        $output = mysqli_query($conn, $db_Query);
        return mysqli_num_rows($output);
    }
    public static function DB_Insert_Or_Update($db_Query, $conn)
    {
        $output = mysqli_query($conn,$db_Query);
        return intval(mysqli_insert_id($conn));
    }
}
?>