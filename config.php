<?php
$Config['Max_Allowed_Bytes_Per_Upload'] = 2000000; // The Max file size allowed per Uploaded File
$Config['Search_For_The_File'] = "lua"; // What for files need to be checked? (only one type, sorry)

//  Here you can use the expression for a item and the information about it

// New style
$SearchFor["/SetUserGroup/"] = array(
    "Type" => "USERMGMT",
    "Risk" => 3,
    "Desc" => "Setting user Group"
);

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
