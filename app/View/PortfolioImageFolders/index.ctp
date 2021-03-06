<div  class="clearfix container topmargin3">
    <div style="margin-left:0;" class="pull-left span12">
        <div class="well">
            <div class="banner"></div>


            <?php
            $portfolio = $folderModel['Portfolio'];
            $portfolioCategory = $folderModel['PortfolioCategory'];

            $portfolioListUrl = $this->Html->url(array(
                'controller' => 'portfolios',
                'action' => 'index'
            ));

            $portfolioUrl = $this->Html->url(array(
                'controller' => 'portfolios',
                'action' => 'view',
                $portfolio['sponsee_id'], $portfolio['id']
            ));
            ?>

            <div class="fontcolor1 span11 topmargin1">
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo $portfolioListUrl ?>">
                            Sponsees Portfolio
                        </a>
                        <span class="divider"> / </span>
                    </li>
                    <li>
                        <a href="<?php echo $portfolioUrl ?>">
                            <?php echo $portfolioCategory['description'] ?>
                        </a>
                        <span class="divider"> / </span>
                    </li>
                    <li class="active">
                        <span class="fontsize1">
                            <?php echo $folderModel['PortfolioImageFolder']['name'] ?>
                        </span>
                    </li>
                </ol>
                <hr style="border:dashed 1px #ccc;">
            </div>

            <?php include 'image-tiles.ctp'; ?>
        </div>
    </div>
</div>
