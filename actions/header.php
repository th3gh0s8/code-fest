<style>
    .center{
        display: flex;
        align-items: center;
        justify-content: center;
        justify-content: space-between;
        background-color: activeborder;
    }
    .menu{
        display: flex;
        align-items: center;
        justify-content: center;
        justify-content: space-between;
        width: 350px;
        list-style-type: none;
    }


</style>


<header class="center">
    <div style="width:25%" ><h2>CODEFEST-2021</h2></div>
    <div style="width:60%">
        <ul class="menu">
            <a href="./index.php"> <li>home</li></a>
            <a href="advancedSearch.php"> <li>advanced search</li></a>
            <li>about us</li>
            <li>contact us</li>
        </ul>
    </div>
    <div style="width:20%" >login/register</div>
</header><hr>
   <?php
            if (isset($_GET['msg'])) {
                ?>
            <p style="color: red"><?php echo $_GET['msg']; ?></p>

                <?php
            }
            ?>
<hr>