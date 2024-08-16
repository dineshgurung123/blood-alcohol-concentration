<?php

$weight = $_POST['weight'];
$unit = $_POST['unit'];
$gender = $_POST['gender'];
$drinks = $_POST['drinks'];
$alcohol = $_POST['alcohol_content'];
$time = $_POST['time_elapsed'];





function calculateBac($alcohol, $unit,  $gender, $weight, $time)
{
     $genderValue = ($gender == 'male' ? 0.73 : 0.66);


if ($unit == "kg") {
    $weight = $weight * 2.20462;

}   

    return ($alcohol * 5.14) / ($weight * $genderValue) - (0.015 * $time);
}
// else if($unit == 'lbs'){
//     return ($alcohol*5.14) / ($weight*0.73) - 0.015 * $time;   

// }

//     }

//     else if($gender == 'female'){


// if($unit == "kg"){


//     $weight = $weight * 2.20462;

//     return ($alcohol * 5.14) / ($weight * $genderValue) - (0.015 * $time);

// }
// else if($unit == "lbs"){
//     return ($alcohol*5.14) / ($weight*0.73) - 0.015 * $time;   
// }

//     }


$result = calculateBac($alcohol,$unit, $gender, $weight, $time);

$check = ($result > 0.08) ? "Not safe to drive" : "Safe to drive";

header("Location: index.php?bac=" . urlencode(round($result, 4)) 
    . "&message=" . urlencode($check));
exit;  

?>
