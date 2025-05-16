<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Калькулятор</title>
  <style>
    #calc { width: 200px; margin: 50px auto; }
    #display { width: 100%; height: 40px; font-size: 20px; text-align: right; margin-bottom: 10px; }
    .btn { width: 45px; height: 45px; font-size: 20px; margin: 2px; }
    #buttons { display: flex; flex-wrap: wrap; }
  </style>
</head>
<body>

<div id="calc">
  <input type="text" id="display" disabled value="<?= isset($_GET['result']) ? $_GET['result'] : '' ?>">
  <div id="buttons">
    <button class="btn" onclick="press('1')">1</button>
    <button class="btn" onclick="press('2')">2</button>
    <button class="btn" onclick="press('3')">3</button>
    <button class="btn" onclick="press('+')">+</button>

    <button class="btn" onclick="press('4')">4</button>
    <button class="btn" onclick="press('5')">5</button>
    <button class="btn" onclick="press('6')">6</button>
    <button class="btn" onclick="press('-')">-</button>

    <button class="btn" onclick="press('7')">7</button>
    <button class="btn" onclick="press('8')">8</button>
    <button class="btn" onclick="press('9')">9</button>
    <button class="btn" onclick="press('*')">*</button>

    <button class="btn" onclick="press('0')">0</button>
    <button class="btn" onclick="press('(')">(</button>
    <button class="btn" onclick="press(')')">)</button>
    <button class="btn" onclick="press('/')">/</button>

    <button class="btn" onclick="clearDisplay()">C</button>
    <button class="btn" onclick="calculate()">=</button>
  </div>
</div>

<form id="calcForm" method="post" style="display:none">
  <input type="hidden" name="val" id="val">
</form>

<script>
  function press(symbol) {
    document.getElementById('display').value += symbol;
  }
  function clearDisplay() {
    document.getElementById('display').value = '';
  }
  function calculate() {
    document.getElementById('val').value = document.getElementById('display').value;
    document.getElementById('calcForm').submit();
  }
</script>

<?php




echo "Млосердов Николай Сергеевич 241-321 Домашнее задание: уравнение.";
echo "<BR>";
session_start();

function isnum($x) {
  if (!$x) return false;
  if ($x[0] == '.' || $x[0] == '0') return false;
  if ($x[strlen($x) - 1] == '.') return false;
  for ($i = 0, $p = false; $i < strlen($x); $i++) {
    if (!in_array($x[$i], ['0','1','2','3','4','5','6','7','8','9','.'])) return false;
    if ($x[$i] == '.') {
      if ($p) return false;
      else $p = true;
    }
  }
  return true;
}

function calculate($val) {
  if (!$val) return 'Выражение не задано!';
  if (isnum($val)) return $val;

  $args = explode('+', $val);
  if (count($args) > 1) {
    $sum = 0;
    for ($i = 0; $i < count($args); $i++) {
      $arg = calculate($args[$i]);
      if (!isnum($arg)) return $arg;
      $sum += $arg;
    }
    return $sum;
  }

  $args = explode('-', $val);
  if (count($args) > 1) {
    $sub = calculate($args[0]);
    if (!isnum($sub)) return $sub;
    for ($i = 1; $i < count($args); $i++) {
      $arg = calculate($args[$i]);
      if (!isnum($arg)) return $arg;
      $sub -= $arg;
    }
    return $sub;
  }

  $args = explode('*', $val);
  if (count($args) > 1) {
    $mul = 1;
    for ($i = 0; $i < count($args); $i++) {
      $arg = calculate($args[$i]);
      if (!isnum($arg)) return $arg;
      $mul *= $arg;
    }
    return $mul;
  }

  $args = explode('/', $val);
  if (count($args) > 1) {
    $div = calculate($args[0]);
    if (!isnum($div)) return $div;
    for ($i = 1; $i < count($args); $i++) {
      $arg = calculate($args[$i]);
      if (!isnum($arg) || $arg == 0) return 'Деление на 0!';
      $div /= $arg;
    }
    return $div;
  }

  return 'Недопустимые символы';
}

function calculateSq($val) {
  while (strpos($val, '(') !== false) {
    $open = strrpos($val, '(');
    $close = strpos($val, ')', $open);
    if ($close === false) return 'Ошибка скобок!';
    $inner = substr($val, $open + 1, $close - $open - 1);
    $res = calculateSq($inner);
    if (!isnum($res)) return $res;
    $val = substr($val, 0, $open) . $res . substr($val, $close + 1);
  }
  return calculate($val);
}

if (isset($_POST['val'])) {
  $res = calculateSq($_POST['val']);
  if (!isset($_SESSION['history'])) $_SESSION['history'] = [];
  $_SESSION['history'][] = $_POST['val'] . ' = ' . $res;
  header("Location: ?result=" . urlencode($res));
  exit;
}

if (isset($_SESSION['history'])) {
  echo "<hr><h4>История:</h4><ul>";
  foreach ($_SESSION['history'] as $expr) {
    echo "<li>" . htmlspecialchars($expr) . "</li>";
  }
  echo "</ul>";
}


require_once '../hw5_Eval/index.php';

if (file_exists(__DIR__ . '/../Task/expression.txt')) {
  $expr = file_get_contents(__DIR__ . '/../Task/expression.txt');
  $res = calculateTrigExpression($expr);
  echo "<hr><b>Результат из файла expression.txt:</b> " . $res;

}

function calculateTrigExpression($expr) {
  $expr = preg_replace('/\s+/', '', $expr);
  $pattern = '/(sin|cos|tan|cot)\((\-?[0-9.]+)\)/i';
  while (preg_match($pattern, $expr, $matches)) {
    $func = $matches[1];
    $val = $matches[2];
    $result = computeTrig($func, $val);
    if (!is_numeric($result)) return $result;
    $expr = str_replace($matches[0], $result, $expr);
  }

  $expr = str_replace(['--', '++', '-+', '+-'], ['+', '+', '-', '-'], $expr);
  try {
    eval('$result = ' . $expr . ';');
    return $result;
  } catch (Throwable $e) {
    return 'Ошибка в выражении!';
  }
}
?>
</body>
</html>