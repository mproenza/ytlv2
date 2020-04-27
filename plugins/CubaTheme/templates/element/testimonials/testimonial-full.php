<?php 
use App\Util\TimeUtil;
use App\Util\PathUtil;
use App\Model\Entity\TestimonialsReply;
?>

<?php
if(!isset($shareReview)) $shareReview = true;
if(!isset($linkToProfile)) $linkToProfile = false;
if(!isset($driverReplies)) $driverReplies = array();

$hasProfile = true;//isset($driver) && isset ($driver->drivers_profile) && !empty($driver->drivers_profile);
$reviewHasImage = isset($testimonial->image_filepath) && $testimonial->image_filepath;
?>

<div class="media-container-row" id="<?php echo $testimonial->id; ?>">
    
    <div class="media-content px-3 align-self-center mbr-white py-2">
        <p class="mbr-author-name pt-4 mb-2 mbr-fonts-style display-6">
            <?php echo $testimonial->author?>
            <?php if($testimonial->country != null && !empty($testimonial->country)):?>
            <span style="font-weight: normal;"><?php echo __d('testimonials', 'de {0}', '<b>'.$testimonial->country.'</b>')?></span>
            <?php endif;?>
        </p>
        <p class="mbr-author-desc mbr-fonts-style display-6 text-muted">
           <?php echo __d('testimonials', 'Escrita el {0}', TimeUtil::prettyDate($testimonial->created, false))?>
        </p>
        <?php if ($reviewHasImage): ?>
        <div class="mbr-figure pl-lg-5 d-xs-block d-sm-block d-lg-none d-md-block" style="width: 100%;">
            <img class=""  src='<?php echo PathUtil::getFullPath($testimonial->image_filepath) ?>' alt="" title=""/>
        </div>
    <?php endif ?>
        <p class="mbr-text testimonial-text mbr-fonts-style display-7">
            <span style="font-style: normal;">
                <?php echo preg_replace("/(\r\n|\n|\r)/", "<br/>", $testimonial->text);?>
            </span>
        </p>
        
        <?php if($linkToProfile && $hasProfile):?>
            <p class="mbr-author-desc mbr-fonts-style display-6">
                <?php 
                $driver_name = $driver->drivers_profile->driver_name;
                $driver_avatar = PathUtil::getFullPath($driver->drivers_profile->avatar_filepath);

                if($driver['active']) $driver_hint = $this->Html->link('<code><big>'.$driver_name.'</big></code>', array('controller'=>'drivers', 'action'=>'profile', $driver->drivers_profile->driver_nick), array('escape'=>false));
                else $driver_hint = '<b>'.$driver_name.'</b>';
                ?>
                <img src="<?php echo $driver_avatar?>" class="info" title="<?php echo $driver_name?>" style="max-width:60px"/>
                <?php echo $this->Html->link(__d('testimonials', 'Ver perfil de {0}', $driver_name), array('controller'=>'drivers', 'action'=>'profile', $driver->drivers_profile->driver_nick), array('class'=>'btn btn-success display-4', 'escape'=>false))?>
            </p>
        <?php endif;?>
        
        <?php if($shareReview && $hasProfile):?>
            <?php
            
            $share_img = 
                $reviewHasImage?
                    PathUtil::getFullPath($testimonial->image_filepath):
                    $driver->drivers_profile->featured_img_url;
                    
            $reviewUrl = Cake\Routing\Router::url([
                'language'=>$testimonial->lang, 
                'controller' => 'drivers', 'action' => 'profile', $driver->drivers_profile->driver_nick,
                '?'=>array('see-review'=>$testimonial->id), 
                '_full'=>true]);
            ?>
            <br>
            <p class="mbr-author-desc mbr-fonts-style display-4">
                <a  style="padding:4px; padding-left: 7px;background-color: #1877f2;color: #FFFFFF !important;text-decoration: none;border-radius:5px"
                    href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $reviewUrl ?>" 
                    target="_blank"
                    title="Facebook">
                    <b><small><span class="fa fa-facebook"></span></small></b>
                </a>&nbsp;            
                <a  style="padding:4px;background-color: #bd081c;color: #FFFFFF !important;text-decoration: none;border-radius:5px"
                    href="https://pinterest.com/pin/create/button/?url=<?php echo $reviewUrl ?>&media=<?php echo $share_img ?>&description=<?php echo __d('testimonials', 'Testimonio de {0} sobre su chofer en Cuba, {1}', $testimonial->author, $driver->drivers_profile->driver_name)?>" 
                    target="_blank"
                    title="Pinterest">
                    <b><small><span class="fa fa-pinterest"></span></small></b>
                </a>&nbsp;
                <a  style="padding:4px;background-color: #1da1f2;color: #FFFFFF !important;text-decoration: none;border-radius:5px"
                    href="https://twitter.com/intent/tweet?url=<?php echo $reviewUrl ?>"
                    target="_blank"
                    title="Twitter">
                    <b><small><span class="fa fa-twitter"></span></small></b>
                </a>
            </p>
        <?php endif?>
        
    </div>
    
    <?php if ($reviewHasImage): ?>
        <div class="mbr-figure pl-lg-5 d-none d-lg-block" style="width: 100%;">
            <img src='<?php echo PathUtil::getFullPath($testimonial->image_filepath) ?>' alt="" title=""/>
        </div>
    <?php endif ?>
</div>

<?php foreach($driverReplies as $reply):?>
    <?php if($reply->state == TestimonialsReply::$statesValues['approved']): ?>
        <?php echo $this->element('testimonials/testimonial-reply-full', array('reply'=>$reply,'driver'=>$driver))?>
    <?php endif; ?>
<?php endforeach;?>