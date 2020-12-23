<?
    include "db.php"; 
    $gugun = $_GET['gugun']; 

?>

<select name="addr"  >
                <option value="">동을 선택하세요. </option> 
                <?
                    $db2 -> where ("gugun",$gugun); 
                    $db2 -> groupBy("dong");
                    $list = $db2->get("capstone_address"); 

                    foreach($list as $data){
                    ?>
                    <option value="<?=$data['addr']?>"><?=$data['dong']?></option> 
                    <? 
                    
                    }
                ?>
            </select> 


 