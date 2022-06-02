<?php
function rdm_mdp($nb_car, $chaine = 'azertyuiopqsdfghjklmwxcvbn123456789')
{
    $nb_lettres = strlen($chaine) - 1;
    $generation = '';
    for($i=0; $i < $nb_car; $i++)
    {
        $pos = mt_rand(0, $nb_lettres);
        $car = $chaine[$pos];
        $generation .= $car;
    }
    return $generation;
}
function age($date)
{
  return (int) ((time() - strtotime($date)) / 3600 / 24 / 365);
}

function send($msg,$email){
  $to      = $email;
  $subject = 'validate code';
  $message = $msg;
  $headers = 'From: no-reply@g-shame.fr'       . "\r\n" .
               'Reply-To: contact@g-shame.go.yj.fr' . "\r\n" .
               'X-Mailer: PHP/' . phpversion();

  mail($to, $subject, $message, $headers);
}

// function since($ladate){
//   $minutes = ;
//   $heures = ;
//   $jours = ;
//   $semaines = ;
//   $mois = ;
//   if ($minutes <60){
//     $depuis = $ldate;
//     echo "il y a :".$depuis."minutes";
//   }elseif($heures < 24 && $minutes > 60){
//     $depuis = $ldate;
//     echo "il y a :".$depuis."heures";
//   }elseif($heures>24 && $minutes>60){
//     $depuis = $ldate;
//     echo "il y a :".$depuis."jours";
//   }elseif($jours>7){
//     $depuis = $ldate;
//     echo "il y a :".$depuis."semaines";
//   }elseif($semaines>4){
//     $depuis = $ldate;
//     echo "il y a :".$depuis."mois";
//   }elseif($mois>12){
//     $depuis = $ldate;
//     echo "il y a :".$depuis."ans";
// }
