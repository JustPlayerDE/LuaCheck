<h1>LuaCheck:</h1>
<p>Welcome to the LuaChecker! this site will check your code for maybe harmful code</p>
<p>I build this site in my freetime for checking my scripts before i add him to the Server</p>
<p>but first i want to say: please note that this site do not can warn you about Backdoors or something it says only what inside</p>
<p>Im open for reports how i can make it better or what are buggy ^^</p>
<br />
<form action="?p=check" method="post" enctype="multipart/form-data">
    <h4>Check Your Code (Max 2Mb, ZIP):</h4>
    <input class="control-label col-sm-5" type="file" name="datei"> <input type="submit" name="lelelrs">
</form>
<br>
<p>Please note that we do not save any content that you upload! the only space in time where your file are located is in the default PHP temporary storage in a by the Doctor secured Box named "Tardis" ;)</p>
<p>(officialy Lima City named and a host from my site)</p>
<p>However, please report any errors! and <b>I am not liable for any damage by the scripts that you uploaded</b></p>


<p>Version:</p>
<pre>1.0.0 ALPHA</pre>


<a href="#" onclick="toggle_visibility('Advanced');">Show some Debug information</a>
<pre id="Advanced" style="display:none;">
<?
echo '$_SESSION:';
print_r($_SESSION);
echo '<br>$_POST:';
print_r($_POST);
?>
</pre>

<script type="text/javascript">
    function toggle_visibility(id) {
        var e = document.getElementById(id);
        if (e.style.display == 'block')
            e.style.display = 'none';
        else
            e.style.display = 'block';
    }
</script>