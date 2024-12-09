<?php

namespace Core;

class Validator
{
  public static function string($value, $min = 2, $max = INF)
  {
    $value = trim($value);

    return strlen($value) >= $min && strlen($value) <= $max;
  }

  public static function email(string $value): bool
  {
    return filter_var($value, FILTER_VALIDATE_EMAIL);
  }


  public static function password($value, $min = 4, $max = 10)
  {
    $value = trim($value);

    // Comprueba la longitud
    if (strlen($value) < $min || strlen($value) > $max) {
      return false;
    }

    // Comprueba al menos una mayúscula
    if (!preg_match('/[A-Z]/', $value)) {
      return false;
    }

    return true;
  }

  public static function greaterThan(int $value, int $graterThan): bool
  {
    return $value > $graterThan;
  }
}

// $password = "Hola123";

// if (Validator::password($password)) {
//     echo "La contraseña es válida.";
// } else {
//     echo "La contraseña debe tener entre 4 y 10 carácteres y al menos una mayúscula.";
// }
