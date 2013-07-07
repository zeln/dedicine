<?php
    $files = getDirectoryList($currentDirectory);
    if(!count($files))
    {
?>
        <div class="noFiles">Aucun fichier</div>
<?php } else { ?>
    <table class="table table-condensed">
    <tbody>
        <?php

        $index = 0;
        foreach($files as $time => $fileArr)
        {
            if(isset($littleList) && $littleList && $index == 5)
                break;
            $fileName = $fileArr["name"];
            if(isset($littleList) && $littleList)
            {
                $fileName = substr($fileArr["name"], 0, 35);
                if(strlen($fileArr["name"]) > 35)
                    $fileName .= "...";
            }

            $link = $currentDirectory . "/" . $fileArr["name"];
            if($fileArr["type"] == "folder")
                $link = "/parsedirectory.php?path=" . urlencode($link);
            else
            {
                $link = str_replace("?", "%3f", $link);
            }

        ?>
            <tr onclick="window.location = '<?php echo $link; ?>';">
                <td class="iconContainer <?php if($index == 0) echo "first"; ?>"><span class="icon <?php echo $fileArr["type"] ?>"></span></td>
                <td class="name <?php if($index == 0) echo "first"; ?>"><?php echo $fileName; ?></td>
                <td class="date <?php if($index == 0) echo "first"; ?>"><?php echo $fileArr["date"]; ?></td>
            </tr>
        <?php
            $index++;
        }
        ?>
    </tbody>
    </table>
<?php } ?>