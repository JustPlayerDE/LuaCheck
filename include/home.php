<h1>LuaCheck:</h1>
<p>With this tool you can scan a Addon (zip) for basic functions which can be used to create backdoors or exploits</p>
<p>This tool <b>cant</b> detect real backdoors or exploits, it only tells you where you <b>may</b> find them</p>
<br />
<form action="?p=check" method="post" enctype="multipart/form-data">

    <?php
    if (isset($_GET["invalid"])) {
    ?>
        <div class="alert alert-warning" role="alert">
            The file you uploaded was invalid!
        </div>
    <?php
    }
    if (isset($_GET["error"])) {
    ?>
        <div class="alert alert-warning" role="alert">
            There was an error with your file.
        </div>
    <?php
    }
    ?>
    <fieldset class="form-group">
        <label for="file">Choose your file. <small>Max file size: <?= $Config['FileSize'] / 1024; ?> KBytes</small></label>
        <input class="form-control col-sm-5" id="file" type="file" name="datei">
    </fieldset>
    <input type="submit" name="submit_file" class="btn btn-block" value="Upload & Check">

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