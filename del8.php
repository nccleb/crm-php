<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php'); ?>
  <link rel="stylesheet" href="css/stylei.css">
  <link rel="stylesheet" href="css/stylei2.css">
  <link rel="stylesheet" href="css/whatsappButton.css" />
  <script src="js/test371.js"></script>

<style>
body {
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    background-color: #f8fafc;
    margin: 0;
    padding: 20px;
}

.jumbotron {
    max-width: 600px;
    margin: 50px auto;
    background: white;
    border-radius: 12px;
    padding: 40px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    border: 1px solid #e5e7eb;
}

table {
    width: 100%;
    border: none;
}

#form {
    font-size: 18px;
    color: #1f2937;
    font-weight: 600;
    text-align: center;
    margin-bottom: 25px;
    padding: 20px;
    background-color: #fef3c7;
    border-radius: 8px;
    border-left: 4px solid #f59e0b;
}

.whatsappbutton {
    background-color: #dc2626;
    color: white;
    border: none;
    padding: 12px 24px;
    font-size: 16px;
    font-weight: 600;
    border-radius: 8px;
    cursor: pointer;
    margin: 0 8px;
    min-width: 100px;
    transition: all 0.2s ease;
}

.whatsappbutton:hover {
    background-color: #b91c1c;
    transform: translateY(-1px);
}

button.whatsappbutton {
    background-color: #6b7280;
}

button.whatsappbutton:hover {
    background-color: #4b5563;
}

input[type="hidden"] {
    display: none;
}

td {
    text-align: center;
    vertical-align: top;
}

@media (max-width: 480px) {
    .jumbotron {
        margin: 20px auto;
        padding: 25px;
    }
    
    .whatsappbutton {
        display: block;
        width: 100%;
        margin: 8px 0;
    }
}
</style>
</head>

<body>
<div class="jumbotron"> 
   <table>
    <tr>
     <td valign="top"> 
      <p id="form">ARE YOU SURE YOU WANT TO DELETE ALL THE DATA AND KEEP LAST 30 DAYS ?</p> 
      <form method="post" action="<?php echo htmlspecialchars("del88.php");?>" id="form">
       <p><input type="hidden" name="id" id="bp" size="11"></p><br/>   
       <input type="submit" class="whatsappbutton" value="YES" id="form">
       <button type="button" id="form" class="whatsappbutton" onclick="quit()">NO</button>
      </form><br/><br/>
     </td>
     <td></td>
    </tr>
   </table>
</div>
</body>
</html>