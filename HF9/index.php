<?php

function query($url)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPGET, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response_json = curl_exec($ch);
    curl_close($ch);
    $response = json_decode($response_json, false);

    return $response;
}

if (isset($_POST['submit'])) {
    if (isset($_POST['id'])) {

        $url = "https://fakestoreapi.com/carts/user/" . $_POST['id'];
        $data = query($url);
        $sum = 0;

        foreach ($data as $cart) {
            foreach ($cart->products as $product) {
                $process = query("https://fakestoreapi.com/products/" . $product->productId);
                $sum = $sum + $process->price * $product->quantity;
            }
        }

        echo "A(z)" . $_POST['id'] . ". felhasználó kosarának összértéke: " . $sum;
    }
}

?>

<form action="index.php" method="post">
    <input type="number" name="id" placeholder="Add meg az ID-t...">
    <input type="submit" name="submit" value="Összérték kiszámolása">
</form>