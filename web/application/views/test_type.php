<table class="table ">
        <thead class="thead-color">
            <tr style="color: aliceblue">
            <th scope="col">รหัส</th>
            <th scope="col">รายการ</th>
            <th scope="col">รายละเอียด</th>
            </tr>
        </thead>
        <tbody>
            
            <?php foreach ($query as $rows) { ?>
               
                <tr>
                <td><?php echo $rows->type_id; ?></td>
                <td><?php echo $rows->type_name; ?></td>
                <td>
                   
                    <a class="btn btn-info" href="<?php echo site_url('type/devices/').$rows->type_id;?>" role="button">
                       รายละเอียด 
                    </a>
                    <input type="hidden" value="ดูรายละเอียด">
                </td>
                </tr>
                
            <?php } ?>
           
        </tbody>
        </table>