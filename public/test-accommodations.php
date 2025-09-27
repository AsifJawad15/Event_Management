<?php
// Test accommodation data
require_once __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$request = Illuminate\Http\Request::createFromGlobals();
$response = $kernel->handle($request);

// Test database connection
try {
    $pdo = new PDO('sqlite:' . __DIR__ . '/../database/database.sqlite');
    echo "Database connection: OK<br>";

    $stmt = $pdo->query("SELECT COUNT(*) as count FROM accommodations");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "Accommodations count: " . $result['count'] . "<br><br>";

    $stmt = $pdo->query("SELECT * FROM accommodations");
    $accommodations = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<h3>Accommodations Data:</h3>";
    foreach($accommodations as $acc) {
        echo "<div style='border:1px solid #ccc; padding:10px; margin:10px 0;'>";
        echo "<strong>ID:</strong> " . $acc['id'] . "<br>";
        echo "<strong>Name:</strong> " . $acc['name'] . "<br>";
        echo "<strong>Description:</strong> " . substr($acc['description'], 0, 100) . "...<br>";
        echo "<strong>Photo:</strong> " . $acc['photo'] . "<br>";
        echo "<strong>Address:</strong> " . $acc['address'] . "<br>";
        echo "<strong>Email:</strong> " . $acc['email'] . "<br>";
        echo "<strong>Phone:</strong> " . $acc['phone'] . "<br>";
        echo "<strong>Website:</strong> " . $acc['website'] . "<br>";
        echo "</div>";
    }

} catch(Exception $e) {
    echo "Database error: " . $e->getMessage();
}
