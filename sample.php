<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Expires" content="3600">
</head>

<header>
    <title>seqret key</title>
</header>

<h1>大切な情報を暗号化</h1>
<h2>walletアドレスの大切な情報を暗号化して、保存しましょう</h2>
<br>
<h3>walletアドレス & 秘密鍵を暗号化します</h3>

<form action="sample.php" method="post">
    <div>
        <label for=" name">wallet address:</label>
        <input type="text" id="address" name="address">
        <label for="message">秘密鍵:</label>
        <input type="text" id="seqret" name="seqret">
        <input type="submit" name="send" value="暗号化">
    </div>
</form>

<?php
        if (isset($_POST['send'])) {
            $address= $_POST['address'];
            $addresskey='address';
            $seqret = $_POST['seqret'];
            $seqretkey='key';

            $encryptaddress = openssl_encrypt($address,'aes-256-ecb',$addresskey);
            $encryptseqret = openssl_encrypt($seqret,'aes-256-ecb',$seqretkey);
            echo 'walletaddress: ' . $encryptaddress;
            echo '<br>秘密鍵: ' . $encryptseqret;
        }
    ?>



<h3>walletアドレス & 秘密鍵を複合します</h3>
<form action="sample.php" method="post">
    <div>
        <label for="name">wallet address:</label>
        <input type="text" id="putaddress" name="putaddress">
        <label for="message">秘密鍵:</label>
        <input type="text" id="putseqret" name="putseqret">
        <input type="submit" name="fukugou" value="複合">
    </div>
</form>

<?php
        if (isset($_POST['fukugou'])) {
            $puaddress= $_POST['putaddress'];
            $addresskey='address';
            $putseqret = $_POST['putseqret'];
            $seqretkey='key';

            $encryptputaddress = openssl_decrypt($puaddress,'aes-256-ecb',$addresskey);
            $encryptputseqret = openssl_decrypt($putseqret,'aes-256-ecb',$seqretkey);
            echo 'walletaddress: ' . $encryptputaddress;
            echo '<br>秘密鍵:' . $encryptputseqret;
        }
    ?>


<h3>トランザクション履歴</h3>
<input type="button" onclick="location.href= 'https://etherscan.io'" value="Etherscan">
<input type="button" onclick="location.href= 'https://polygonscan.com'" value="Polygonscan">

<footer>
    <p>Github:@FFK588</p>
</footer>

</html>