<?php
session_start();
//session_destroy();

if($_SERVER['REQUEST_METHOD']=='POST')
{
    if(isset($_POST['Add_To_Cart']))
    {
        if(isset($_SESSION['cart']))
        {
            $myItems = array_column($_SESSION['cart'], 'Item_Name');
            if(in_array($_POST['Item_Name'], $myItems))
            {
                echo "<script>
                alert('Item Already Added');
                window.location.href='store.php'
                </script>";
            }
             else
           //else
            {
                $count = count($_SESSION['cart']);
                $_SESSION['cart'][$count] = array('Item_Name'=>$_POST['Item_Name'], 'Price'=> $_POST['Price'], 'Quantity'=>1);
                echo "<script>
                        alert('Item Added');
                        window.location.href='store.php'; 
                    </script>";
                //print_r($_SESSION['cart']);
            }
        }
        else
        {
            $_SESSION['cart'][0]=array('Item_Name'=>$_POST['Item_Name'], 'Price'=> $_POST['Price'], 'Quantity'=>1);
            echo "<script>
                    alert('Item Added!');
                    window.location.href='store.php'; 
                </script>";
        }
    }
    if(isset($_POST['Remove_Item']))
    {
        foreach($_SESSION['cart'] as $key=> $value)
        {
           // print_r($key);
           if($value['Item_Name'] == $_POST['Item_Name'])
           {
               unset($_SESSION['cart'][$key]);
               $_SESSION['cart'] = array_values($_SESSION['cart']);
               echo" <script>
                    alert('Item Removed');
                    window.location.href = 'cart.php';
               </script>";
            }
           
        }
    }
}