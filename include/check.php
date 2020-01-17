<div class="container text-center">
    <div class="row">
        <p class="h2">This Addon is rated as:</p>
    </div>
    <div class="row">
        <?php if (count($Data["Hits"]) > 0) { ?>
            <p class="h3">Total Hits: <b><?= count($Data["Hits"]); ?></b></p>
            <p class="h3">average risk: <b><?= round((($Data["risk"]["total"] / count($Data["Hits"])) * 2), 0) / 2; ?></b> / 5</p>
            <p class="h3">highest risk: <b><?= $Data["risk"]["highest"]; ?></b> / 5</p>
        <?php } else { ?>
            <p class="h3"><small>may</small> Secure to use, at least we found nothing here</p>
        <?php } ?>
        <p class="h6">Disclaimer: You can only be 100% s(ec)ure if you check it yourself</p>
    </div>
    <div class="row">
        <button onclick="toggle_visibility('Advanced');" class="btn btn-secondary">Open Log</button>
        <button id="downloadButton" class="btn btn-secondary">Download Log (CSV)</button>
    </div>
</div>
<script>
    function download(filename, elementId, mimeType) {
        var elementHtml = document.getElementById(elementId).innerHTML;
        var link = document.createElement('a');
        mimeType = mimeType || 'text/plain';

        link.setAttribute('download', filename);
        link.setAttribute('href', 'data:' + mimeType + ';charset=utf-8,' + encodeURIComponent(elementHtml));
        link.click();
    }
    $('#downloadButton').click(function() {
        download("log.csv", 'Advanced', 'text/plain');
    });
</script>

<pre id="Advanced" style="display:none;">
<?php
echo "Path|Line|Type|Description|Risk\n";
foreach ($Data["Hits"] as $Hit) {
    echo $Hit["Path"] . "|" . $Hit["Line"] . "|" . $Hit["Type"] . "|" . $Hit["Desc"] . "|" . $Hit["Risk"] . "\n";
}
?>
</pre>