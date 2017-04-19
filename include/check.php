<?



$SearchFor   = Array();
$SearchFor[] = "/STEAM_[0-9]+:[0-9]+:[0-9]+/";
$SearchFor[] = "/http.Post/";
$SearchFor[] = "/http.Fetch/";
$SearchFor[] = "/CompileString/";
$SearchFor[] = "/RunString/";
$SearchFor[] = "/removeip/";
$SearchFor[] = "/removeid/";
$SearchFor[] = "/banip/";
$SearchFor[] = "/writeid/";
$SearchFor[] = "/file.Read/";
$SearchFor[] = "/file.Delete/";
$SearchFor[] = "/0[xX][0-9a-fA-F]+/";
$SearchFor[] = "/\\[0-9]+\\[0-9]+/";
$SearchFor[] = "/\\[xX][0-9a-fA-F][0-9a-fA-F]/";
$SearchFor[] = "/getfenv/";
$SearchFor[] = "/_G\[/";
$SearchFor[] = "/rcon_password/";
$SearchFor[] = "/SetUserGroup/";


$SearchFor["/SetUserGroup/"]['Type'] = "USERMGMT";
$SearchFor["/SetUserGroup/"]['Risk'] = "3";
$SearchFor["/SetUserGroup/"]['Desc'] = "Setting user Group";

$SearchFor["/STEAM_[0-9]+:[0-9]+:[0-9]+/"]['Type'] = "AUTHENT";
$SearchFor["/STEAM_[0-9]+:[0-9]+:[0-9]+/"]['Risk'] = "2";
$SearchFor["/STEAM_[0-9]+:[0-9]+:[0-9]+/"]['Desc'] = "Presence of Steam ID";

$SearchFor["/http.Post/"]['Type'] = "NETWORK";
$SearchFor["/http.Post/"]['Risk'] = "4";
$SearchFor["/http.Post/"]['Desc'] = "HTTP server call";

$SearchFor["/http.Fetch/"]['Type'] = "NETWORK";
$SearchFor["/http.Fetch/"]['Risk'] = "4";
$SearchFor["/http.Fetch/"]['Desc'] = "HTTP server call";

$SearchFor["/CompileString/"]['Type'] = "DYNCODE";
$SearchFor["/CompileString/"]['Risk'] = "3";
$SearchFor["/CompileString/"]['Desc'] = "Dynamic code execution";

$SearchFor["/RunString/"]['Type'] = "DYNCODE";
$SearchFor["/RunString/"]['Risk'] = "3";
$SearchFor["/RunString/"]['Desc'] = "Dynamic code execution";

$SearchFor["/removeip/"]['Type'] = "BANMGMT";
$SearchFor["/removeip/"]['Risk'] = "2";
$SearchFor["/removeip/"]['Desc'] = "Unban by IP address";

$SearchFor["/removeid/"]['Type'] = "BANMGMT";
$SearchFor["/removeid/"]['Risk'] = "2";
$SearchFor["/removeid/"]['Desc'] = "Unban by Steam ID";

$SearchFor["/banip/"]['Type'] = "BANMGMT";
$SearchFor["/banip/"]['Risk'] = "2";
$SearchFor["/banip/"]['Desc'] = "Ban by IP address";


$SearchFor["/writeid/"]['Type'] = "BANMGMT";
$SearchFor["/writeid/"]['Risk'] = "2";
$SearchFor["/writeid/"]['Desc'] = "Writing bans to disk";

$SearchFor["/file.Read/"]['Type'] = "FILESYS";
$SearchFor["/file.Read/"]['Risk'] = "2";
$SearchFor["/file.Read/"]['Desc'] = "Reading file contents";

$SearchFor["/file.Delete/"]['Type'] = "FILESYS";
$SearchFor["/file.Delete/"]['Risk'] = "2";
$SearchFor["/file.Delete/"]['Desc'] = "File deletion";

$SearchFor["/file.Write/"]['Type'] = "FILESYS";
$SearchFor["/file.Write/"]['Risk'] = "2";
$SearchFor["/file.Write/"]['Desc'] = "File writing";

$SearchFor["/0[xX][0-9a-fA-F]+/"]['Type'] = "OBFUSC";
$SearchFor["/0[xX][0-9a-fA-F]+/"]['Risk'] = "4";
$SearchFor["/0[xX][0-9a-fA-F]+/"]['Desc'] = "Obfuscated / encrypted code";

$SearchFor["/\\[0-9]+\\[0-9]+/"]['Type'] = "OBFUSC";
$SearchFor["/\\[0-9]+\\[0-9]+/"]['Risk'] = "4";
$SearchFor["/\\[0-9]+\\[0-9]+/"]['Desc'] = "Obfuscated / encrypted code";

$SearchFor["/\\[xX][0-9a-fA-F][0-9a-fA-F]/"]['Type'] = "OBFUSC";
$SearchFor["/\\[xX][0-9a-fA-F][0-9a-fA-F]/"]['Risk'] = "4";
$SearchFor["/\\[xX][0-9a-fA-F][0-9a-fA-F]/"]['Desc'] = "Obfuscated / encrypted code";

$SearchFor["/getfenv/"]['Type'] = "MISC";
$SearchFor["/getfenv/"]['Risk'] = "1";
$SearchFor["/getfenv/"]['Desc'] = "Call to getfenv()";

$SearchFor["/_G\[/"]['Type'] = "MISC";
$SearchFor["/_G\[/"]['Risk'] = "1";
$SearchFor["/_G\[/"]['Desc'] = "References global table";



$SearchFor["/rcon_password/"]['Type'] = "RCON";
$SearchFor["/rcon_password/"]['Risk'] = "5";
$SearchFor["/rcon_password/"]['Desc'] = "Reading or Setting the Server's RCON";



$TotalRisk   = 0;
$TotalFounds = 0;


?>
<center><h1>This Addon has an Risk level of:</h1></center>
<?


$Highest = 0;
$Treffer = array();
if (isset($_FILES['datei']) && !empty($_POST['lelelrs'])) {
    if (!$_FILES['datei']['type'] == "zip" OR $_FILES["datei"]["size"] > 2000000) {
        echo '<meta http-equiv="refresh" content="0; URL=' . $_SERVER['PHP_SELF'] . '">';
        die();
    }
    
    
    $zip = zip_open($_FILES['datei']['tmp_name']);
    
    if ($zip) {
        
        
        while ($zip_entry = zip_read($zip)) {
            
            $FName = explode(".", zip_entry_name($zip_entry));
            $FName = $FName[1];
            if ($FName == "lua")
                if (zip_entry_open($zip, $zip_entry)) {
                    
                    $Line = 0;
                    $file = explode("\n", zip_entry_read($zip_entry));
                    foreach ($file as $t) {
                        $line = $Line++;
                        foreach ($SearchFor as $SearchThis) {
                            
                            //if(!preg_match("/\/\//",$t, $treffer))
                            if (preg_match($SearchThis, $t, $treffer)) {
                                
                                
                                
                                $Treffer[] = Array(
                                    'Found' => $t,
                                    'Path' => zip_entry_name($zip_entry),
                                    'Type' => $SearchFor[$SearchThis]['Type'],
                                    'Desc' => $SearchFor[$SearchThis]['Desc'],
                                    'Risk' => $SearchFor[$SearchThis]['Risk'],
                                    'Line' => $Line
                                );
                                
                                $TotalFounds++;
                                $TotalRisk = $TotalRisk + $SearchFor[$SearchThis]['Risk'];
                                if ($SearchFor[$SearchThis]['Risk'] > $Highest)
                                    $Highest = $SearchFor[$SearchThis]['Risk'];
                                
                            }
                        }
                    }
                    
                  
                    
                    zip_entry_close($zip_entry);
                }
            
            
        }
    }
    unlink($_FILES['datei']['tmp_name']);
    
?><pre id="Advanced" style="display:none;"><?
    foreach ($Treffer as $L)
        echo "Found: " . $L['Type'] . " - " . $L['Path'] . ":" . $L['Line'] . " - <B>(" . $L['Desc'] . ")</b> Risk:<font color='#b3002d'><b>" . $L['Risk'] . "</b></font> &#9;&#9;<font color='#424251'>" . $L['Found'] . "</font>";
?></pre><h1><center>average: <b><?= round((($TotalRisk / $TotalFounds) * 2), 0) / 2; ?></b><br>highest level <b><?= $Highest; ?></b></h1></center><br><center>Use it at your own risk!<br><a href="#" onclick="toggle_visibility('Advanced');">Toggle Advanced Log</a></center><?
    zip_close($zip);
    
} else {
    header("Location: /?p=home");
}

?>


<script type="text/javascript">
<!--
    function toggle_visibility(id) {
       var e = document.getElementById(id);
       if(e.style.display == 'block')
          e.style.display = 'none';
       else
          e.style.display = 'block';
    }
//-->
</script>