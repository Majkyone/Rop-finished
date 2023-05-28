<?php 
    session_start();
    include 'C:\xampp\htdocs\ROP\connect.php';
    $product_id = array_column($_SESSION['cart'], 'product_id');
    $query_products = "SELECT * FROM products";
    $result = mysqli_query($con, $query_products);
    $amount = array_column($_SESSION['cart'],  'amount');
?>
<!DOCTYPE html>
<html style="box-sizing: border-box;"><body style="box-sizing:border-box;background:white;">
<div class="container cart-page" style="box-sizing:border-box;margin-top:50px;margin-bottom:20px;">
        <table style="box-sizing:border-box;width:100%;border-collapse:collapse;">
<tr style="box-sizing: border-box;">
<th style="box-sizing:border-box;font-size:15px;text-align:left;padding:5px;color:#e0ac1c;background:#2d2a30;font-weight:normal;">Produkt</th>
                <th style="box-sizing:border-box;font-size:15px;text-align:left;padding:5px;color:#e0ac1c;background:#2d2a30;font-weight:normal;">Množstvo</th>
                <th style="box-sizing:border-box;font-size:15px;text-align:left;padding:5px;color:#e0ac1c;background:#2d2a30;font-weight:normal;">Celková cena</th>
            </tr>
<?php $index = 0;
 
                $total = 0;
                if(isset($_SESSION['cart'])){ 
                while ($row = mysqli_fetch_assoc($result)){
 
                    foreach ($product_id as $id) {
                        if($row['id_product'] == $id){ ?><form method="post" style="box-sizing:border-box;min-height:50vh;">
                            <tr style="box-sizing: border-box;">
                                <td style="box-sizing:border-box;padding:10px 5px;">
                                    <div class="cart-info" style="box-sizing:border-box;display:flex;flex-wrap:wrap;">
                                        <a  style="box-sizing:border-box;text-decoration:none;"><img src="/ROP/admin_site/<?php echo $row['image']?>" alt style="box-sizing:border-box;height:80px;margin-right:10px;"></a>
                                        <div style="box-sizing: border-box;">
                                            <a  style="box-sizing:border-box;text-decoration:none;"><p style="font-size: 15px;text-decoration:none;" class="product-name"><?php echo $row['title']  ?></p></a>
                                            <p style="box-sizing:border-box;font-size:15px;"><?php echo number_format($row['price'],2,","," "), ' &euro;' ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td style="box-sizing:border-box;padding:10px 5px;">
                                <input name="change" type="number" value="<?php echo $amount[$index];?>" min="1" max="10" readonly style="box-sizing:border-box;width:40px;height:30px;padding:5px;">
                                </td>
                                <td style="box-sizing:border-box;padding:10px 5px;"><?php $full_price = $amount[$index] * $row['price'];
                                    echo number_format($full_price,2,","," "), ' &euro;' ?></td>
                            </tr>
                            </form> 
                        <?php $index = $index + 1;
                            $total = $total + $full_price;
                        }?><?php }?><?php }?><?php } ?>
</table>
<div class="total-price" style="box-sizing:border-box;display:grid;justify-items:end;">
            <table style="box-sizing:border-box;width:100%;border-collapse:collapse;border-top:3px solid #e0ac1c;max-width:350px;">
<?php if (isset($_SESSION['cart'])) { ?><tr style="box-sizing: border-box;">
<td style="box-sizing:border-box;padding:10px 5px;">Bez dane</td>
                        <td style="box-sizing:border-box;padding:10px 5px;"><?php echo number_format($total * 0.8,2,","," "), ' &euro;'?></td>
                    </tr>
<tr style="box-sizing: border-box;">
<td style="box-sizing:border-box;padding:10px 5px;">Da&#328;</td>
                        <td style="box-sizing:border-box;padding:10px 5px;"><?php echo number_format($total - ($total * 0.8),2,","," "), ' &euro;'?></td>
                    </tr>
<tr style="box-sizing: border-box;background: #2d2a30;">
<td style="box-sizing:border-box;padding:10px 5px;color: #e0ac1c;">K &uacute;hrade</td>
                        <td style="box-sizing:border-box;padding:10px 5px;color: #e0ac1c;"><?php echo number_format($total,2,","," "), ' &euro;'?></td>
                    </tr>
<?php }?>
</table>
</div>
    </div>
</body></html>