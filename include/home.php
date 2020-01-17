<h1>LuaCheck:</h1>
<p>With this tool you can scan a Addon (zip) for basic functions which can be used to create backdoors or exploits</p>
<p>This tool <b>cant</b> detect real backdoors or exploits, it only tells you where you <b>may</b> find them</p>
<br />
<form action="?p=check" method="post" enctype="multipart/form-data">
    <input class="control-label col-sm-5" type="file" name="datei">
    <input type="submit" name="submit_file">
</form>

<script type="text/javascript">
    function toggle_visibility(id) {
        var e = document.getElementById(id);
        if (e.style.display == 'block')
            e.style.display = 'none';
        else
            e.style.display = 'block';
    }
</script>