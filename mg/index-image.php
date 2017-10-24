
<center>

<?php include "khead.php" ?>
<p>
</p>

  <!-- file uploading form -->
  <form action="imgfunction.php" method="post" enctype="multipart/form-data">
    <label>
      <span>Choose image</span>
      <input type="file" name="uploaded_file" accept="image/*" />
    </label>
    <input type="submit" value="Upload" />
  </form>


    <p> </p><br /> 
<?php include "kfoot.php" ?>