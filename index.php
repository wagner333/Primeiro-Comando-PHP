<?php 
  session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        h2{
            background-color: #069;
            width: 100%;
            padding: 20px;
            text-align: center;
            color: white;
        }
        .carrinho-container{
            display: flex;
        }
        .produto{
            width:33.3%;
        }
        .produto img{
            max-width: 100%;
        }
        .produto a{
            display: block;
            width: 100%;
            padding: 10px;
            color: white;
            background-color: #5fb382;
            text-align: center;
            text-decoration: none;
        }
    </style>
</head>
<body>
 <h2>Carrinho com PHP</h2>
<div class="carrinho-container">




<?php 

$items = array(['nome'=>'Curso1','imagem'=>'item1.png','preco'=>'200'],
['nome'=>'Curso1','imagem'=>'item2.png','preco'=>'200'],
['nome'=>'Curso1','imagem'=>'item3.png','preco'=>'200']);



foreach($items as $key => $value){
?>
   <div class="produto">
    <img src="<?php echo $value['imagem']?>"/>
    <a href="?adicionar=<?php echo $key ?>">adicionar ao acarrinho</a>
   </div>
<?php 
   }
?>
     </div>  
     
     <?php 
      if(isset($_get['adicionar'])){

         $idProduto = (int)$_GET['adicionar'];
         if(isset($items[$idProduto])){
            if(isset($_SESSION[$idProduto])){
                $_SESSION[$idProduto]['quantidade']++;
            }else{
                $_SESSION[$idProduto] = array('quantidade'=>1,'nome'=>$items[$idProduto]['nome'],'preco' => $items[$idProduto][
                    'preco']);
            }
            echo '<p>adicionado</p>';
         } else {
            die('voce n pode adicionar');
         }
      }
     
     ?>
</body>
</html>
