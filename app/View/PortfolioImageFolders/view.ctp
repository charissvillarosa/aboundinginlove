<div  class="clearfix container topmargin3">
    <div style="margin-left:0;" class="pull-left span12">
        <div class="well">
            <div class="banner"></div>


            <?php
            $folder = $folderModel['PortfolioImageFolder'];
            $portfolio = $folderModel['Portfolio'];
            $portfolioCategory = $folderModel['PortfolioCategory'];

            $portfolioUrl = $this->Html->url(array(
                'controller' => 'portfolios',
                'action' => 'listing',
                $portfolio['sponsee_id']
            ));
            ?>

            <div class="fontcolor1 span11 topmargin1">
                <ol class="breadcrumb pull-left">
                    <li>
                        <a href="<?php echo $portfolioUrl ?>">
                            <?php echo $portfolioCategory['description'] ?>
                        </a>
                        <span class="divider"> / </span>
                    </li>
                    <li class="active">
                        <span class="fontsize1">
                            <?php echo $folder['name'] ?>
                        </span>
                    </li>
                </ol>

                <div class="pull-right">
                    <?php

                    echo $this->Html->link(
                        '<i class="icon-upload icon-white"></i> Upload Image',
                        array('controller' => 'PortfolioImages', 'action' => 'upload', $folder['id']),
                        array('class' => 'btn btn-info', 'escape' => false)
                    );

                    ?>
                </div>
                <div class="clearfix"></div>
                <hr style="border:dashed 1px #ccc;">
            </div>

            <?php include 'image-tiles.ctp'; ?>
        </div>
    </div>
</div>
