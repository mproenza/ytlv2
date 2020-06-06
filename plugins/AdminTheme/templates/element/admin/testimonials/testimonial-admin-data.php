<?php
use \App\Util\TimeUtil;
?>

<?php
if (!isset($width)) $width = 100;
if (!isset($height)) $height = 100;

if (!isset($isReverse)) $isReverse = false;
if (!isset($bgColor)) $bgColor = 'default';

if (!isset($nameAsLink)) $nameAsLink = true;
?>

<div> <!--style="font-family:'Engagement', cursive"-->
    <blockquote class='<?php if($isReverse) echo 'blockquote-reverse'?>' style="padding: 0px">
        <div class="alert bg-<?php echo $bgColor?>">
            <?php
            if($testimonial['country'] != null && !empty($testimonial['country']))
                $intro = __d('testimonials', '{0} de {1} escribió el {2}', '<b>'.$testimonial['author'].'</b>', '<b>'.$testimonial['country'].'</b>', TimeUtil::prettyDate($testimonial['created'], false));
            else
                $intro = __d('testimonials', '{0} escribió el {2}', '<b>'.$testimonial['author'].'</b>', TimeUtil::prettyDate($testimonial['created'], false));


            ?>

            <?php $about = null?>
            <?php if(isset($driver) && isset ($driver['profile']) && !empty($driver['profile'])):?>
                <?php
                $driver_name = $driver['profile']['driver_name'];

                $driver_avatar = \App\Util\PathUtil::getFullPath($driver['profile']['avatar_path']);
                ?>

                <?php

                if($driver['active'] && $nameAsLink) $driver_hint = $this->Html->link('<code><big>'.$driver_name.'</big></code>', array('controller'=>'drivers', 'action'=>'profile', $driver['profile']['slug']), array('escape'=>false));
                else $driver_hint = '<b>'.$driver_name.'</b>';

                $about = __d('testimonials', 'comentario sobre %s', $driver_hint.' <img src="'.$driver_avatar.'"class="info" title="'.$driver_name.'" style="max-width:30px"/> ')?>
            <?php endif?>

            <footer><big><?php echo $intro?></big> <?php if($about):?><span class="pull-right" style="font-size: 8pt"><?php echo $about?></span><?php endif?></footer>
            <br/>
            <span style="font-size: 11pt"><?php echo preg_replace("/(\r\n|\n|\r)/", "<br/>", $testimonial['text']);?></span>

            <?php if ($testimonial['image_filepath']): ?>
                <?php $src = \App\Util\PathUtil::getFullPath($testimonial['image_filepath']);?>
                <div style="max-width:640px">
                    <br/>
                    <span><img src='<?php echo $src ?>' class='img-responsive' style='max-width: <?php echo $width?>%; max-height: <?php echo $height?>%'/></span>
                </div>
            <?php endif ?>
        </div>
    </blockquote>
</div>
