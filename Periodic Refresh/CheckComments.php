<?php       
    header("Cache-control: No-Cache");
    header("Expires: Fri, 30 Oct 2009 14:19:41 GMTPragma: No-Cache");
    
    //database information
    $sDBServer = "localhost";
    $sDBName = "class";
    $sDBUsername = "root";
    $sDBPassword = "";

    //create the SQL query string
    $sSQL = "select CommentId,Name,LEFT(Message, 50) as ShortMessage from BlogComments order by Date desc limit 0,1";

    $oLink = mysql_connect($sDBServer,$sDBUsername,$sDBPassword);
    @mysql_select_db($sDBName) or die("-1|| || ");
        
    if($oResult = mysql_query($sSQL) and mysql_num_rows($oResult) > 0) {
        $aValues = mysql_fetch_array($oResult,MYSQL_ASSOC);
        echo $aValues['CommentId']."||".$aValues['Name']."||".$aValues['ShortMessage'];
    } else {
        echo "-1|| || ";
    }
    
    mysql_free_result($oResult);
    mysql_close($oLink);
?>