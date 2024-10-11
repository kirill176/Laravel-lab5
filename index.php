<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Математичні обчислення</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Математичні обчислення</h1>

        <!-- Форма для введення числа -->
        <div class="form-container">
            <h2>Знайти кількість прямокутних трикутників</h2>
            <form method="POST" action="index.php#result-triangle-count">
                <input type="hidden" name="form" value="triangleCount">
                <label for="limit">Введіть максимальну довжину сторони:</label>
                <input type="number" name="limit" id="limit" value="<?= isset($_POST['limit']) ? $_POST['limit'] : '' ?>" required>
                <button type="submit">Обчислити</button>
            </form>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['form']) && $_POST['form'] == "triangleCount") {
                $limit = $_POST['limit'];
                $count = 0;

                // Перебір всіх можливих a, b, c менших за limit
                for ($a = 1; $a < $limit; $a++) {
                    for ($b = $a; $b < $limit; $b++) {  // b починається з a, щоб уникнути дублювань
                        $c = sqrt($a * $a + $b * $b);
                        // Перевіряємо, чи є c цілим числом і чи не більше воно за limit
                        if ($c == floor($c) && $c < $limit) {
                            $count++;
                        }
                    }
                }

                echo "<div id='result-triangle-count' class='result'>";
                echo "<h3>Кількість прямокутних трикутників:</h3>";
                echo "<p>Кількість прямокутних трикутників зі сторонами, меншими за $limit: <strong>$count</strong></p>";
                echo "</div>";
            }
            ?>
        </div>
    </div>
</body>
</html>