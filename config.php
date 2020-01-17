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

$SearchFor["/STEAM_[0-9]+:[0-9]+:[0-9]+/"] = array(
    "Type" => "AUTHENT",
    "Risk" => 2,
    "Desc" => "Presence of SteamID"
);

$SearchFor["/http.Post/"] = array(
    "Type" => "NETWORK",
    "Risk" => 4,
    "Desc" => "HTTP server call"
);
$SearchFor["/http.Fetch/"] = array(
    "Type" => "NETWORK",
    "Risk" => 4,
    "Desc" => "HTTP server call"
);

$SearchFor["/CompileString/"] = array(
    "Type" => "DYNCODE",
    "Risk" => 3,
    "Desc" => "Dynamic code execution"
);

$SearchFor["/RunString/"] = array(
    "Type" => "DYNCODE",
    "Risk" => 3,
    "Desc" => "Dynamic code execution"
);

$SearchFor["/RunStringEx/"] = array(
    "Type" => "DYNCODE",
    "Risk" => 3,
    "Desc" => "Dynamic code execution"
);

$SearchFor["/removeip/"] = array(
    "Type" => "BANMGMT",
    "Risk" => 2,
    "Desc" => "Unban by IP address"
);

$SearchFor["/removeid/"] = array(
    "Type" => "BANMGMT",
    "Risk" => 2,
    "Desc" => "Unban by SteamID"
);

$SearchFor["/banip/"] = array(
    "Type" => "BANMGMT",
    "Risk" => 2,
    "Desc" => "Ban by IP SteamID"
);

$SearchFor["/writeid/"] = array(
    "Type" => "BANMGMT",
    "Risk" => 2,
    "Desc" => "Writing bans to disk"
);

$SearchFor["/file.Read/"] = array(
    "Type" => "FILESYS",
    "Risk" => 2,
    "Desc" => "Reading file contents"
);

$SearchFor["/file.Delete/"] = array(
    "Type" => "FILESYS",
    "Risk" => 2,
    "Desc" => "Reading deletion"
);

$SearchFor["/file.Write/"] = array(
    "Type" => "FILESYS",
    "Risk" => 2,
    "Desc" => "File writing"
);

$SearchFor["/0[xX][0-9a-fA-F]+/"] = array(
    "Type" => "OBFUSC",
    "Risk" => 4,
    "Desc" => "Obfuscated / encrypted code"
);

$SearchFor["/\\[0-9]+\\[0-9]+/"] = array(
    "Type" => "OBFUSC",
    "Risk" => 4,
    "Desc" => "Obfuscated / encrypted code"
);

$SearchFor["/\\[xX][0-9a-fA-F][0-9a-fA-F]/"] = array(
    "Type" => "OBFUSC",
    "Risk" => 4,
    "Desc" => "Obfuscated / encrypted code"
);

$SearchFor["/getfenv/"] = array(
    "Type" => "MISC",
    "Risk" => 1,
    "Desc" => "Call to getfenv()"
);

$SearchFor["/getfenv/"] = array(
    "Type" => "MISC",
    "Risk" => 1,
    "Desc" => "Call to getfenv()"
);

$SearchFor["/_G/"] = array(
    "Type" => "MISC",
    "Risk" => 1,
    "Desc" => "References global table"
);

$SearchFor["/rcon_password/"] = array(
    "Type" => "RCON",
    "Risk" => 5,
    "Desc" => "Reading or Setting the Server's RCON"
);
