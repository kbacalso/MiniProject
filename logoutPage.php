<table style="width: 60%;" align='center'>
    <tr>
        <td style='border: none; width: 50%; text-align: left'>
            <?php
                if ( isset($_SESSION['admin']) && basename($_SERVER['PHP_SELF']) != "mainMenu.php" )
                    echo "<a href='mainMenu.php'>Back to Menu</a>";
                else
                    echo "&nbsp;";
            ?>
        </td>

        <td style="border: none; width: 50%; text-align: right">
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
                <input type="hidden" name="logout" value="YES"/>
                <input type="submit" value="Logout"/>
            </form>
        </td>
    </tr>
</table>