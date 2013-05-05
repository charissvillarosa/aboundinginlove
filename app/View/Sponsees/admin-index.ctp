<div class="container">
    <div style="background: #fff;" class="logincontent well">
        <table class="table table-hover">
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Country</th>
                <th>Map Location</th>
                <th>Information / Biography</th>
                <th>Birtd Date</th>
                <th>Primary Id</th>
            </tr>

            <?php
            foreach ($sponseeList as $item) :
                $sponsee = $item['Sponsee'];
                ?>
                <tr>
                    <td><?php echo $sponsee['firstname'] .' '. $sponsee['middlename'] .' '. $sponsee['lastname'] ?></td>
                    <td><?php echo $sponsee['address'] ?></td>
                    <td><?php echo $sponsee['country'] ?></td>
                    <td><?php echo $sponsee['maplocation'] ?></td>
                    <td>
                        <?php 
                            $info = $sponsee['information'];
                            echo $this->Text->truncate($info, 50, array('exact' => false));
                        ?>
                    </td>
                    <td><?php echo $sponsee['birthdate'] ?></td>
                    <td><?php echo $sponsee['primaryimage'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <?php echo $this->Paginator->numbers(); ?>
        <?php echo $this->Paginator->prev('« Previous', null, null, array('class' => 'disabled')); ?>
        <?php echo $this->Paginator->next('Next »', null, null, array('class' => 'disabled')); ?>
        <?php echo $this->Paginator->counter(); ?>
    </div>
</div>