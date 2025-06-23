

<header class="header">
    
    <div>
        
        
        <ul>
            
            <li>Home</li>
            <li>Search</li>
            <li>About Us</li>
            <li>Contact Us</li>
            
        </ul>
        
    </div>
    <div>Login Register</div>
    
</header><hr>

<?php 
if(isset($_GET['msg'])){
 ?>

 <p style="color: red;"><?php echo $_GET['msg'] ?></p>
 <hr>
 <?php 
 } ?>