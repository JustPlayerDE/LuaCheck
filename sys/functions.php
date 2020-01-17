<?php

function maininclude()
{
    $o = "";
    $page = "";
    $s = "";
    $sel = "";
    $page = isset($_GET['p']) ? $_GET['p'] : '';
    $s = array();

    $s[] = 'home';
    $s[] = 'check';
    if (!empty($page)) {
        if (in_array($page, $s)) {
            if (file_exists('./include/' . $page . '.php')) {
                $o = $page;
            } else {
                $o = 'home';
            }
        } else {
            $o = 'home';
        }
    } else {
        $o = 'home';
    }
    return $o . '.php';
}

function getURL()
{
    $protocol = strpos(strtolower($_SERVER['SERVER_PROTOCOL']), 'https')
        === FALSE ? 'http' : 'https';
    $host     = $_SERVER['HTTP_HOST'];
    $script   = $_SERVER['SCRIPT_NAME'];

    return $protocol . '://' . $host . $script;
}

function CheckZIP($file)
{
    global $Config;
    global $SearchFor;

    $Return["Hits"] = array();
    $Return["risk"] = array(
        "total" => 0,
        "highest" => 0,
    );
    try {
        $zip = zip_open($file);
        if ($zip) {
            while ($zip_entry = zip_read($zip)) {
                $FName = pathinfo(zip_entry_name($zip_entry));

                if (isset($FName["extension"]) && (in_array('*', $Config['FileTypes']) || in_array($FName["extension"], $Config['FileTypes']))) {
                    if (zip_entry_open($zip, $zip_entry)) {
                        $Line = 0;
                        $file = explode("\n", zip_entry_read($zip_entry));
                        foreach ($file as $LineString) {
                            $Line++;
                            foreach ($SearchFor as $SearchThis => $ItemInfo) {
                                //if(!preg_match("/\/\//",$t, $treffer))
                                if (preg_match($SearchThis, $LineString)) {
                                    $Return["Hits"][] = array(
                                        'Found' => $LineString,
                                        'Path' => zip_entry_name($zip_entry),
                                        'Type' => $ItemInfo['Type'],
                                        'Desc' => $ItemInfo['Desc'],
                                        'Risk' => $ItemInfo['Risk'],
                                        'Line' => $Line
                                    );

                                    $Return["risk"]["total"] = $Return["risk"]["total"] + $ItemInfo['Risk'];
                                    if ($ItemInfo['Risk'] > $Return["risk"]["highest"]) {
                                        $Return["risk"]["highest"] = $ItemInfo['Risk'];
                                    }
                                }
                            }
                        }

                        zip_entry_close($zip_entry);
                    }
                }
            }
            zip_close($zip);
        }
        return $Return;
    } catch (Exception $e) {
        header("Location: " . getURL() . "/?error");
        exit();
    }
}
