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

function CheckZIP($file)
{
    global $Config;
    global $SearchFor;
    global $Whitelisted;

    $Return["Hits"] = array();
    $Return["risk"] = array(
        "total" => 0,
        "highest" => 0,
    );
    $BreakCurrent = false;

    $zip = zip_open($file);
    if ($zip) {
        while ($zip_entry = zip_read($zip)) {

            $FName = pathinfo(zip_entry_name($zip_entry));

            if (isset($FName["extension"]) && $FName["extension"] == $Config['Search_For_The_File'])
                if (zip_entry_open($zip, $zip_entry)) {

                    $Line = 0;
                    $file = explode("\n", zip_entry_read($zip_entry));
                    foreach ($file as $t) {
                        $Line++;
                        foreach ($SearchFor as $SearchThis => $ItemInfo) {
                            //if(!preg_match("/\/\//",$t, $treffer))
                            if (preg_match($SearchThis, $t, $treffer)) {

                                foreach ($Whitelisted as $IgnoreThis) {
                                    if (preg_match($IgnoreThis, zip_entry_name($zip_entry))) {
                                        $BreakCurrent = true;
                                    }
                                }

                                if ($BreakCurrent) {
                                    continue;
                                }



                                $Return["Hits"][] = array(
                                    'Found' => $t,
                                    'Path' => zip_entry_name($zip_entry),
                                    'Type' => $SearchFor[$SearchThis]['Type'],
                                    'Desc' => $SearchFor[$SearchThis]['Desc'],
                                    'Risk' => $SearchFor[$SearchThis]['Risk'],
                                    'Line' => $Line
                                );

                                $Return["risk"]["total"] = $Return["risk"]["total"] + $SearchFor[$SearchThis]['Risk'];
                                if ($SearchFor[$SearchThis]['Risk'] > $Return["risk"]["highest"])
                                    $Return["risk"]["highest"] = $SearchFor[$SearchThis]['Risk'];
                            }
                        }
                    }

                    zip_entry_close($zip_entry);
                }
        }
        zip_close($zip);
    }
    return $Return;
}
