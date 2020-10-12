<!DOCTYPE html>
<?php 
function tax_amount ($salary=0,$tax=0){
    return (($salary*$tax)/100);
}
if(!empty($_POST["submit"])){
    $salary=$_POST["salary"];
    $type=$_POST["type"];
    $tax_free_allowance=$_POST["tax_free_allowance"];
    
    if($type=="monthly"){
       $salary=$salary*12;
       $tax_free_allowance=$tax_free_allowance*12;
    }

    if($salary > 10000){
        $social_security_fee= tax_amount($salary,4);
    } else {
        $social_security_fee= 0;
    }

    if($salary > 50000){
        $tax_amount= tax_amount($salary,45);
    }else if($salary > 25000){
        $tax_amount= tax_amount($salary,30);
    }else if($salary > 10000){
        $tax_amount =tax_amount($salary,11);
    }else {
        $tax_amount=0;
    }
    $total_salary=$salary + $tax_free_allowance;
    $salary_after_tax= $total_salary - $tax_amount - $social_security_fee;

    if($type=="monthly"){
        $monthly_social_security_fee= $social_security_fee/12;
        $monthly_tax_amount= $tax_amount/12;
        $monthly_total_salary= $total_salary/12;
        $monthly_salary_after_tax= $salary_after_tax/12;
        $tax_amount='';
        $social_security_fee='';
        $total_salary='';
        $salary_after_tax='';
        $checked_monthly="checked";
    }else {
        $checked="checked";
    }
    
} else {
    $checked="checked";
}




?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="POST">
    <input type="number" placeholder="Salary in USD" name="salary" value="<?=@$salary?>">
    <label >
        <input type="radio" name="type" value="yearly" <?=@$checked?>>
        yearly
    </label>
    <label >
        <input type="radio" name="type" value="monthly" <?=@$checked_monthly?>>
        monthly
    </label>
    <input type="number" placeholder="Tax Free Allowance in USD" name="tax_free_allowance" value="<?=@$tax_free_allowance?>">
    <button name="submit" value="submit">Submit</button>
    </form>
    <table>
    <thead>
    <th></th>
    <th>Yearly</th>
    <th>Monthly</th>
    </thead>
    <tbody>
    <tr>
    <td>Total salary</td>
    <td><?=@$total_salary?></td>
    <td><?=@$monthly_total_salary?></td>
    </tr>
    
    <tr>
    <td>Tax amount</td>
    <td><?=@$tax_amount?></td>
    <td><?=@$monthly_tax_amount?></td>
    </tr>
    
    <tr>
    <td>Social security fee</td>
    <td><?=@$social_security_fee?></td>
    <td><?=@$monthly_social_security_fee?></td>
    </tr>
    
    <tr>
    <td>Salary after tax</td>
    <td><?=@$salary_after_tax?></td>
    <td><?=@$monthly_salary_after_tax?></td>
    </tr>
    
    </tbody>
    
    </table>
</body>
</html> 