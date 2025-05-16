<?php
function computeTrig($func, $value) {
  $value = deg2rad($value);

  switch (strtolower($func)) {
    case 'sin': return sin($value);
    case 'cos': return cos($value);
    case 'tan': return tan($value);
    case 'cot':
      $tan = tan($value);
      if ($tan == 0) return 'Деление на 0!';
      return 1 / $tan;
    default: return 'Неизвестная функция!';
  }
}

?>