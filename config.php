<?php
$Config['FileSize'] = 1024; // Max file size in bytes
$Config['FileTypes'] = array( // What files should be checked? You can add "*" to check every file
    "lua"
);
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
    "Desc" => "HTTP POST call, Can be used to update analytics or to load external code."
);
$SearchFor["/http.Fetch/"] = array(
    "Type" => "NETWORK",
    "Risk" => 4,
    "Desc" => "HTTP GET call, Can be used to load external code."
);

$SearchFor["%^(?:(?:https?|ftp)://)(?:\S+(?::\S*)?@|\d{1,3}(?:\.\d{1,3}){3}|(?:(?:[a-z\d\x{00a1}-\x{ffff}]+-?)*[a-z\d\x{00a1}-\x{ffff}]+)(?:\.(?:[a-z\d\x{00a1}-\x{ffff}]+-?)*[a-z\d\x{00a1}-\x{ffff}]+)*(?:\.[a-z\x{00a1}-\x{ffff}]{2,6}))(?::\d+)?(?:[^\s]*)?$%iu"] = array(
    "Type" => "NETWORK",
    "Risk" => 4,
    "Desc" => "Presence of an URL/URI, can be used for update notifications or backdoors."
);

$SearchFor["/util.AddNetworkString/"] = array(
    "Type" => "NETWORK",
    "Risk" => 2,
    "Desc" => "Register netStrings, mostly used to network simple data but can also be used to create exploits."
);

$SearchFor["/net.Receive/"] = array(
    "Type" => "NETWORK",
    "Risk" => 2,
    "Desc" => "Receiving netStrings, mostly used to network simple data but can also be used to use exploits."
);

$SearchFor["/CompileString/"] = array(
    "Type" => "DYNCODE",
    "Risk" => 3,
    "Desc" => "Dynamic code execution, Mostly used for DRMs"
);

$SearchFor["/RunString/"] = array(
    "Type" => "DYNCODE",
    "Risk" => 3,
    "Desc" => "Dynamic code execution, used to run code. (Possible backdoor)"
);

$SearchFor["/RunStringEx/"] = array(
    "Type" => "DYNCODE",
    "Risk" => 3,
    "Desc" => "Dynamic code execution, used to run code. (Possible backdoor)"
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
    "Desc" => "File deletion"
);

$SearchFor["/file.Write/"] = array(
    "Type" => "FILESYS",
    "Risk" => 2,
    "Desc" => "File writing"
);

$SearchFor["/0[xX][0-9a-fA-F]+/"] = array(
    "Type" => "OBFUSC",
    "Risk" => 4,
    "Desc" => "Obfuscated / encrypted code, mostly used in DRMs or backdoors"
);

$SearchFor["/\\[0-9]+\\[0-9]+/"] = array(
    "Type" => "OBFUSC",
    "Risk" => 4,
    "Desc" => "Obfuscated / encrypted code, mostly used in DRMs or backdoors"
);

$SearchFor["/\\[xX][0-9a-fA-F][0-9a-fA-F]/"] = array(
    "Type" => "OBFUSC",
    "Risk" => 4,
    "Desc" => "Obfuscated / encrypted code, mostly used in DRMs or backdoors"
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

$SearchFor["/LocalPlayer():ConCommand/"] = array(
    "Type" => "MISC",
    "Risk" => 2,
    "Desc" => "Running Console Commands on client"
);

$SearchFor["/rcon_password/"] = array(
    "Type" => "RCON",
    "Risk" => 5,
    "Desc" => "Access to rcon_password, this file should be checked! (Can be used to access your server's RCON (Remote Console)"
);
