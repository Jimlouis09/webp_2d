<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tuition Fee Calculator</title>

<style>
body{
    font-family: Arial, Helvetica, sans-serif;
    background:#f4f6f9;
    margin:0;
    padding:30px;
}

.container{
    width:800px;
    margin:auto;
    background:#fff;
    padding:25px;
    border-radius:10px;
    box-shadow:0 0 10px rgba(0,0,0,.2);
}

h2{
    text-align:center;
    color:#1565c0;
}

label{
    font-weight:bold;
}

input, select{
    width:100%;
    padding:10px;
    margin-top:5px;
    margin-bottom:15px;
    border:1px solid #ccc;
    border-radius:5px;
    box-sizing:border-box;
}

button{
    width:100%;
    padding:12px;
    background:#1565c0;
    color:white;
    border:none;
    border-radius:5px;
    font-size:16px;
    cursor:pointer;
}

button:hover{
    background:#0d47a1;
}

table{
    width:100%;
    margin-top:20px;
    border-collapse:collapse;
}

table, th, td{
    border:1px solid #ccc;
}

th{
    background:#1565c0;
    color:white;
    padding:10px;
}

td{
    padding:10px;
}
</style>

</head>
<body>

<div class="container">

<h2>Tuition Fee Calculator</h2>

<form method="POST">

    <label>Student Name</label>
    <input type="text" name="name" required>

    <label>Total Tuition Fee</label>
    <input type="number" name="tuition" required>

    <label>Discount</label>
    <select name="discount" required>
        <option value="">-- Select Discount --</option>
        <option value="10">10%</option>
        <option value="20">20%</option>
        <option value="50">50%</option>
        <option value="100">100%</option>
    </select>

    <label>Months to Pay</label>
    <input type="number" name="months" min="1" required>

    <button type="submit" name="compute">
        Compute Tuition
    </button>

</form>
<?php 

    if (isset($_POST["compute"])){
        
        $name = $_POST["name"];
        $tuition = $_POST["tuition"];
        $discount = $_POST["discount"];
        $discountr = $discount / 100;
        $mtp = $_POST["months"];

        $high = "HIGH MONTHLY PAYMENT";
        $moder = "MODERATE MONTHLY PAYMENT";
        $afford = "AFFORDABLE MONTHLY PAYMENT";

        $style1 = "color: green;";
        $style2 = "color: red;";
        $style3 = "color: yellow;";

        $discounta = $tuition * $discountr;
        $balanceamount = $tuition - $discounta;
        $mpayment = $balanceamount / $mtp;

        if($mpayment < 5000){
           $status = "<span style='$style1'>$afford</span>";
        }
        elseif($mpayment <= 9999){
           $status = "<span style='$style3'>$moder</span>";
        }
        else{
            $status = "<span style='$style2'>$high</span>";
        }
?>
<table>

<tr>
    <th colspan="2">Tuition Fee Summary</th>
</tr>

<tr>
    <td>Student Name</td>
    <td><?php echo $name;?></td>
</tr>

<tr>
    <td>Total Tuition Fee</td>
    <td>₱<?php echo number_format($tuition,2)?></td>
</tr>

<tr>
    <td>Discount Rate</td>
    <td><?php echo $discount ."%"?></td>
</tr>

<tr>
    <td>Discount Amount</td>
    <td><?php echo "<span style='color: green;'>" ."₱" . number_format($discounta, 2) . "</span>"; ?></td>

</tr>

<tr>
    <td>Balance After Amount</td>
    <td>₱<?php echo number_format($balanceamount, 2)?></td>
</tr>

<tr>
    <td>Months to Pay</td>
    <td><?php echo "$mtp Month(s)"?></td>
</tr>

<tr>
    <td>Monthly Payment</td>
    <td><strong>₱<?php echo number_format($mpayment, 2)?></strong></td>
</tr>

<tr>
    <td>Payment Status</td>
    <td><strong><?php echo $status;?></strong></td>
</tr>

</table>
<?php
    }

?>

</div>

</body>
</html>