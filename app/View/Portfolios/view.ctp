<div  class="clearfix container topmargin3">
    <div style="margin-left:0;" class="pull-left span12">
        <div class="well">
            <div class="banner"></div>

            <?php
            $portfolio = $portfolioModel['Portfolio'];
            $category = $portfolioModel['Category'];
            ?>

            <div class="fontcolor1 span11 topmargin1">
                <select class="fontsize1" onchange="location.href = $(this).val()">
                    <?php
                    foreach ($portfolioList as $item) :
                        $url = $this->Html->url(array(
                            'action' => 'view',
                            $portfolio['sponsee_id'], $item['Portfolio']['id']
                        ));

                        $selectedAttr = ($item['Portfolio']['id'] === $portfolio['id']) ? 'selected' : '';
                        echo "<option value=\"{$url}\" {$selectedAttr}>{$item['Category']['description']}</option>";
                    endforeach;
                    ?>
                </select>
                <hr style="border:dashed 1px #ccc;">
            </div>
            <div class="span11">
                <p style="text-align:justify;">
                    <?php echo $portfolio['description'] ?>
                </p>
            </div>

            <div style="margin-left:32px;" class="span11">
                <ul class="thumbnails">
                    <?php
                    foreach ($portfolioModel['Folders'] as $folder) :
                        $url = $this->Html->url(array(
                            'controller' => 'PortfolioImageFolders',
                            'action' => 'index',
                            $folder['id']
                        ));
                        ?>

                        <li>
                            <a href="<?php echo $url ?>" class="thumbnail">
                                <img src="<?php echo "{$this->webroot}/img/portfolio/folder-icon.png" ?>"
                                     width="150px"/>
                                <div class="text-center"><?php echo $folder['name'] ?></div>
                            </a>
                        </li>

                        <?php
                    endforeach;
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>
