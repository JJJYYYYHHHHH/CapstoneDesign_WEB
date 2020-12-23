<?
    include "db.php"; 
    $sido = $_GET['sido']; 

?>

<select name="gugun" id="gugun" onchange="getDong(this.value);" >
                <option value="">구군을 선택하세요. </option> 
                <?
                    $db2 -> where ("sido",$sido); 
                    $db2 -> groupBy("gugun");
                    $list = $db2->get("capstone_address"); 

                    foreach($list as $data){
                    ?>
                    <option value="<?=$data['gugun']?>"><?=$data['gugun']?></option> 
                    <? 
                    
                    }
                ?>
            </select> 


 